<?php

class FileController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//Traerme los registros de una relacion
		$user_files	=	Auth::user()->files()->get()->all();

		if(count($user_files) > 0){

			echo '<ol>';
				foreach ($user_files as $file) {
					echo '<li>';
					echo '<a target="_blank" href=" ' . asset($file->basedir . $file->filename) . ' "> ' . $file->filename . ' </a>';
					echo '</li>';
				}
			echo '</ol>';

		}

		echo '<a href="'.URL::to('main').'">'.'Regresar<a/>';


	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return View::make('files.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//check file existance
		if(Input::hasFile('file')){
			
			try{
				//Move the file
				//public_path() returns the public url of the file
				$destination	= public_path(). '/files/';
				$name			= Auth::user()->name. Input::file('file')->getClientOriginalName();
				
				//En base al tipo de archivo, laravel tratara de adivinar el tipo de extension
				//Por seguridad usamos md5 en el nombre, los nombres pueden tener rutas del servido y las acciones en ese archivo pueden perjudicar
				$name 			= md5($name). '.' . Input::file('file')->guessExtension();
				$file 			= Input::file('file')->move($destination, $name);
				//chmod solo lectura a la carpeta
				//Al aceptar archivos evitar archivos php 

				//Guardar en BDD el registro de archivo
				$fileRecord				= new Filz\File();
				$fileRecord->basedir	= 'files/';
				$fileRecord->filename 	= $name;
				$fileRecord->size 		= $file->getSize();
				$fileRecord->mime_type 	= $file->getMimeType();

				// variable = (condicion)? valor1:valor2;

				$fileRecord->save();

				//Asociando el archivo al usuario autenticado
				Auth::user()->files()->attach($fileRecord->id);

			
				return Redirect::route('file.show',$fileRecord->id);
			
			}catch(Exception $e){

				//
				return Redirect::route('file.create')->with('message',$e->getMessage());

			}

		}else{

			return Redirect::route('file.create')->with('message','Debes subir un archivo');

		}

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
		$file = Filz\File::find($id);

		if($file != null){

			echo '<a href=" '.asset($file->basedir.$file->filename). ' ">Ver archivo</a>';

		}else{
			echo 'El archivo no existe';
		}

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}