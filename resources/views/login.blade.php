<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Ever Tech</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="{{asset('public/frontend/vendors/images/apple-touch-icon.png')}}">
	<link rel="icon" type="image/png" sizes="32x32" href="{{asset('public/frontend/vendors/images/favicon-32x32.png')}}">
	<link rel="icon" type="image/png" sizes="16x16" href="{{asset('public/frontend/vendors/images/favicon-16x16.png')}}">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/vendors/styles/core.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/vendors/styles/icon-font.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/src/plugins/datatables/css/dataTables.bootstrap4.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/src/plugins/datatables/css/responsive.bootstrap4.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/vendors/styles/style.css')}}">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
</head>
<body>
<div class="login-header box-shadow">
		<div class="container-fluid d-flex justify-content-between align-items-center">
			<div class="brand-logo">
				<a href="login.html">
					<img src="frontend/vendors/images/deskapp-logo.svg" alt="">
				</a>
			</div>
			<div class="login-menu">
				<ul>
					<li><a href="{{URL::to('/register')}}">Register</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6 col-lg-7">
					<img src="public/frontend/vendors/images/login-page-img.png" alt="">
				</div>
				<div class="col-md-6 col-lg-5">
					<div class="login-box bg-white box-shadow border-radius-10">
						<div class="login-title">
							<h2 class="text-center text-primary">Login To DeskApp</h2>
						</div>

							<div class="select-role">
								<div class="btn-group btn-group-toggle" data-toggle="buttons">
									<label class="btn active">
										<input type="radio" name="options" id="admin">
										<div class="icon"><img src="public/frontend/vendors/images/briefcase.svg" class="svg" alt=""></div>
										<span>I'm</span>
										Manager
									</label>
									<label class="btn">
										<input type="radio" name="options" id="user">
										<div class="icon"><img src="public/frontend/vendors/images/person.svg" class="svg" alt=""></div>
										<span>I'm</span>
										Employee
									</label>
								</div>
							</div>
							<form class="sign-up-form form"  action="{{URL::to('/login')}}" enctype="multipart/form-data" method="POST">
								{{csrf_field()}}
								<div class="input-group custom">
									<!-- <input type="text" class="form-control form-control-lg" placeholder="Username" name="username"> -->
									<input class="form-control form-control-lg" name="username"  id="usrname"  type="text" placeholder="Enter your email" required>
									<div class="input-group-append custom">
										<span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
									</div>
								</div>
								<div class="input-group custom">
									<!-- <input type="password" class="form-control form-control-lg" placeholder="**********" name="password"> -->
									<input class="form-control form-control-lg" name="password" id="psw" type="password" placeholder="Enter your password" >
									<div class="input-group-append custom">
										<span class="input-group-text"><i class="dw dw-padlock1"></i></span>
									</div>
								</div>
								<div class="row pb-30">
									<div class="col-6">
										<div class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" id="customCheck1">
											<label class="custom-control-label" for="customCheck1">Remember</label>
										</div>
									</div>
									<div class="col-6">
										<div class="forgot-password"><a href="{{URL::to('/forgotpassword')}}">Forgot Password</a></div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<div class="input-group mb-0">
											<!--
												use code for form submit
												<input class="btn btn-primary btn-lg btn-block" type="submit" value="Sign In">
											-->

											<button class="btn btn-primary btn-lg btn-block" type="submit">Sign in</button>

											</input>
										</div>
										<div class="font-16 weight-600 pt-10 pb-10 text-center" data-color="#707373">OR</div>
										<div class="input-group mb-0">
											<a class="btn btn-outline-primary btn-lg btn-block" href="{{URL::to('/register')}}">Register To Create Account</a>
										</div>
									</div>
								</div>
							</form>
					</div>
				</div>
			</div>
		</div>

	</div>

	<!-- js -->
	<script src="{{asset('public/frontend/vendors/scripts/core.js')}}"></script>
	<script src="{{asset('public/frontend/vendors/scripts/script.min.js')}}"></script>
	<script src="{{asset('public/frontend/vendors/scripts/process.js')}}"></script>
	<script src="{{asset('public/frontend/vendors/scripts/layout-settings.js')}}"></script>
	<script src="{{asset('public/frontend/src/plugins/apexcharts/apexcharts.min.js')}}"></script>
	<script src="{{asset('public/frontend/src/plugins/datatables/js/jquery.dataTables.min.js')}}"></script>
	<script src="{{asset('public/frontend/src/plugins/datatables/js/dataTables.bootstrap4.min.js')}}"></script>
	<script src="{{asset('public/frontend/src/plugins/datatables/js/dataTables.responsive.min.js')}}"></script>
	<script src="{{asset('public/frontend/src/plugins/datatables/js/responsive.bootstrap4.min.js')}}"></script>
	<script src="{{asset('public/frontend/vendors/scripts/dashboard.js')}}"></script>
</body>
</html>
