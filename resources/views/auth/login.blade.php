<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<title>Login</title>
	<link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/logo_sistem.png')}}">
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
							<h1>Login</h1>
							<p class="account-subtitle">Akses Halaman Dashboard</p>
							@if (session('status'))
							<div class="text-danger mb-2">{{ session('status')}}
							</div>
							@endif
							<form action="{{ route('login')}}" method="POST">
								@csrf
								@error('username')
								<div class="text-danger">{{ $message }}</div>
								@enderror
								<div class="form-group">
									<input class="form-control @error ('username') border-danger @enderror" type="text"
										placeholder="Username" name="username" value="{{ old('username')}}">
								</div>
								@error('password')
								<div class="text-danger">{{ $message }}</div>
								@enderror
								<div class="form-group">
									<input class="form-control @error ('password') border-danger @enderror"
										type="password" placeholder="Password" name="password">
								</div>
								<div class="form-group">
									<button class="btn btn-primary btn-block" type="submit">Login</button>
								</div>
								<div class="form-group">
									<a href="{{ route('home')}}" class="btn btn-info btn-block"><i class="fa fa-home"></i> Home</a>
								</div>
							</form>
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