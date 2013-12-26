<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
</head>
<body>

	@if( Session::has('message'))
	
		<p>{{Session::get('message')}}</p>

	@endif

	{{ Form::open(array('url' => '/authenticate','method'=> 'POST' ))}}
	
	<fieldset>
		{{ Form::label('email','Email: ')}}

		@if($errors->has('email'))
			{{Form::label('email',$errors->first('email'))}}
		@endif

		{{ Form::text('email')}}
	</fieldset>

	<fieldset>
		{{ Form::label('password','Contraseña: ')}}

		@if($errors->has('password'))
			{{Form::label('password',$errors->first('password'))}}
		@endif

		{{ Form::password('password')}}
	</fieldset>

	{{Form::submit('Iniciar Sesion')}}

	{{Form::close()}}

</body>
</html>