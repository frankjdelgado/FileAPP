<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registro</title>
</head>
<body>

	@if(Session::has('message'))
		<p>{{Session::get('message')}}</p>
	@endif

	
	{{Form::open(array(
		'route' => 'user.store',
		'method' => 'post'
	))}}
	<fieldset>
		{{Form::label('name','Nombre: ')}}
		{{Form::text('name',Input::old('name'))}}
	</fieldset>
	<fieldset>
		{{Form::label('last_name','Apellido: ')}}
		{{Form::text('last_name',Input::old('last_name'))}}
	</fieldset>
	<fieldset>
		{{Form::label('email','Email: ')}}
		{{Form::email('email',Input::old('email'))}}
	</fieldset>
	<fieldset>
		{{Form::label('password','Contraseña: ')}}
		@if($errors->has('password'))
			{{Form::label('password',$errors->first('password'))}}
		@endif

		{{Form::password('password')}}
	</fieldset>
	<fieldset>
		{{Form::label('password_confirmation','Confirma tu contraseña: ')}}
		@if($errors->has('password_confirmation'))
			{{Form::label('password_confirmation',$errors->first('password_confirmation'))}}
		@endif

		{{Form::password('password_confirmation')}}
	</fieldset>

	{{Form::submit('Registrar')}}
	{{Form::close()}}
</body>
</html>