<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>SIPKADA</title>
	<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/fontawesome/css/all.min.css')}}">
	<link rel="stylesheet" href="{{ asset('assets/css/feathericon.min.css')}}">
	<link rel="stylesheet" href="{{ asset('assets/plugins/morris/morris.css')}}">
	<link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">
</head>

<body>
	<div class="main-wrapper login-body">
		<div class="login-wrapper">
			<div class="container">
				<div class="loginbox">
					<div class="login-left"> <img class="img-fluid" src="{{ asset('assets/img/logo_sistem.png')}}"
							alt="Logo"> </div>
					<div class="login-right">
						<div class="login-right-wrap">
							<h1>SELAMAT DATANG</h1>
							<p class="account-subtitle">SISTEM INFORMASI PEMILIHAN KEPUTUSAN</p>
                            <p class="account-subtitle"><a href="{{ route('login')}}" class="btn btn-primary">Login</a></p>
                            {{-- <button class="btn btn-primary text-center">LOGIN</button> --}}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="{{ asset('assets/js/jquery-3.5.1.min.js')}}"></script>
	<script src="{{ asset('assets/js/popper.min.js')}}"></script>
	<script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
	<script src="{{ asset('assets/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
	<script src="{{ asset('assets/js/script.js')}}"></script>
</body>

</html>