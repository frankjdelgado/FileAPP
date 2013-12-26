<?php

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//Mostrar Vista
		// vista.archivo.blade.php
		return View::make('user.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//Procesa el formulario

		$rules = array(
			'name'					=> 'required',
			'last_name'				=> 'required',
			'email'					=> 'required|email|unique:users,email',
			'password'				=> 'required|confirmed|min:8',
			'password_confirmation' => 'required|same:password'
		);

		$validator = Validator::make(Input::all(), $rules);

		if( !$validator->fails() ){

			$user = new User();
			$user->name=Input::get('name');
			$user->last_name=Input::get('last_name');
			$user->email = Input::get('email');
			$user->password = Hash::make(Input::get('password'));

			try{
				$user->save();
				Auth::login($user);
				return Redirect::to('/main');
			}catch(Exception $e){
				return Redirect::route('user.create')->withInput()->with('message','Se produjo un error');
			}

		}else{
		
			return Redirect::route('user.create')->withInput()->withErrors($validator)->with('message','Error de validacion');

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