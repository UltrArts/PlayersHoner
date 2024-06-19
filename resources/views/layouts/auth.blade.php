<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets/img/favicon/favicon-32x32.png')}}">
	<link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/img/favicon/favicon-16x16.png')}}">
	<link rel="manifest" href="{{asset('assets/img/favicon/site.webmanifest')}}">
	
	@livewireStyles
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('assets/css/login.css')}}">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
	{{-- <link rel="stylesheet" href="assets/css/ready.css"> --}}
	{{-- <link rel="stylesheet" href="assets/css/demo.css"> --}}

</head>
<body>
	@yield('content')

	

	@livewireScripts
</body>
</html>