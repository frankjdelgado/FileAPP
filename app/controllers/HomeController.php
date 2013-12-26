<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		return View::make('hello');
	}

	public function hellofucker()
	{
		return View::make('hellofucker');
	}

	public function login(){

		$user = new User();
		$user -> name = 'Test Name';
		$user -> last_name = 'Test Last Name';
		$user -> email = 'TestEmail@email.com';
		$user -> password = Hash::make('12345678');
		$user -> birthday = '1990-10-23';
		$user -> folder = 'Folder-'.$user -> name .'-'.$user -> birthday;
		// $user -> sem_acquire(sem_identifier)ve(); // Realiza Insert o Update
		
		return View::make('home.login');
	}

	public function logout(){
		Auth::logout();
		return Redirect::to('/login')->with('message','Cierra sesion');
	}


	public function main(){
		echo 'Hola '.Auth::user()->name.' '.Auth::user()->last_name;
		echo '<br>';
		echo '<a href="'.URL::to('/file').'">'.'Ver Archivos<a/>';
		echo '<br>';
		echo '<a href="'.URL::to('/logout').'">'.'Cerrar Sesion<a/>';
		echo '<br>';
		echo '<a href="'.URL::route('file.create').'">'.'Subir Archivo<a/>';

	}



	public function authenticate()
	{
		
		$rules = array(
			'email' 	=> 'required|email',
			'password' 	=> 'required|min:8'
		);
		// get has all
		$validator = Validator::make(Input::all(),$rules);

		if(! $validator->fails()){

			$user = array(
				'email' => Input::get('email'),
				'password' => Input::get('password')
			);

			// Autenticacion  de inicio de sesion
			// Verifica que los datos corresponden
			// se inicia si los datos corresponden, crea cookie and shit

			if(Auth::attempt($user)){
				return Redirect::to('/main');
			}else{
				// With pasa una variable de sesion llamada message  que contiene el texto indicado
				return Redirect::to('/login')->with('message','Error en email o clave');
			}

		}else{
			// Mostrar errores de los formularios en la vista
			return Redirect::to('/login')->withInput()->withErrors($validator);
		}
	}




}