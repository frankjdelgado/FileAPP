<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>create</title>
</head>
<body>

	@if (Session::has('message'))
		<p>{{Session::get('message')}}</p>
	@endif

	{{Form::open(array(
		'route' => 'file.store',
		'files' => true,
		'method' => 'POST'
	))}}
	
	{{Form::label('file','Sube tu archivo; ')}}

	@if($errors->has('file'))
		{{Form::label('file',$errors->first('file'))}}
	@endif

	{{Form::file('file')}}
	<br>
	{{Form::submit()}}
	
	{{Form::close()}}

	<br>
	<a href="{{URL::to('main')}} ">Regresar</a>

</body>
</html>