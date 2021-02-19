<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from bootstrapmaster.com/live/metro/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Jan 2018 16:56:12 GMT -->
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">

		<title>Admin login panel</title>

	<meta name="description" content="Metro Admin Template.">
	<meta name="author" content="Łukasz Holeczek">
	<meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
	<!-- end: Meta -->
	
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->
	
	<!-- start: CSS -->
	<link id="bootstrap-style" href="{{asset('backend1/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{asset('backend1/css/bootstrap-responsive.min.css')}}" rel="stylesheet">
	<link id="base-style" href="{{asset('backend1/css/style.css')}}" rel="stylesheet">
	<link id="base-style-responsive" href="{{asset('backend1/css/style-responsive.css')}}" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
	<!-- end: CSS -->
	

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<link id="ie-style" href="css/ie.css" rel="stylesheet">
	<![endif]-->
	
	<!--[if IE 9]>
		<link id="ie9style" href="css/ie9.css" rel="stylesheet">
	<![endif]-->
		
	<!-- start: Favicon -->
	<link rel="shortcut icon" href="{{URL::to('backend1/img/favicon.ico')}}">

	<style type="text/css">
			body { background: url(backend1/img/bg-login.jpg) !important; }
	</style>
</head>
<body>
	

	<div class="container-fluid-full">
		<div class="row-fluid">
					
			<div class="row-fluid">
				<div class="login-box">
					<div class="icons">
						<a href="index.html"><i class="halflings-icon home"></i></a>
						<a href="#"><i class="halflings-icon cog"></i></a>
					</div>

					<p class="alter-danger">
						<?php 
							$message = Session::get('message');
							if($message){
								echo $message;
								Session::put('message', null);
							}
							
						 ?>
					</p>

					<h2>Admin Login Panel</h2>
					<form class="form-horizontal" action="{{ route('admin.dashboard') }}" method="post">
						 @csrf
						<fieldset>
							
							<div class="input-prepend" title="Username">
								<span class="add-on"><i class="halflings-icon user"></i></span>
								<input class="input-large span10" name="admin_email" id="username" type="email" placeholder="Email"/>
							</div>
							<div class="clearfix"></div>

							<div class="input-prepend" title="Password">
								<span class="add-on"><i class="halflings-icon lock"></i></span>
								<input class="input-large span10" name="admin_password" id="password" type="password" placeholder="Password"/>
							</div>
							
							
							

							<div class="button-login">	
								<button type="submit" class="btn btn-primary">Login</button>
							</div>
							<div class="clearfix"></div>
					</form>
					<hr>
					<h3>Forgot Password?</h3>
					<p>
						No problem, <a href="#">click here</a> to get a new password.
					</p>	
				</div><!--/span-->
			</div><!--/row-->
			

	</div><!--/.fluid-container-->
	
		</div><!--/fluid-row-->

<!-- start: JavaScript-->

		<script src="{{asset('backend1/js/jquery-1.9.1.min.js')}}"></script>
	<script src="{{asset('backend1/js/jquery-migrate-1.0.0.min.js')}}"></script>
	
		<script src="{{asset('backend1/js/jquery-ui-1.10.0.custom.min.js')}}"></script>
	
		<script src="{{asset('backend1/js/jquery.ui.touch-punch.js')}}"></script>
	
		<script src="{{asset('backend1/js/modernizr.js')}}"></script>
	
		<script src="{{asset('backend1/js/bootstrap.min.js')}}"></script>
	
		<script src="{{asset('backend1/js/jquery.cookie.j')}}s"></script>
	
		<script src="{{asset('backend1/js/fullcalendar.min.js')}}"></script>
	
		<script src="{{asset('backend1/js/jquery.dataTables.min.js')}}"></script>

		<script src="{{asset('backend1/js/excanvas.js')}}"></script>
	<script src="{{asset('backend1/js/jquery.flot.js')}}"></script>
	<script src="{{asset('backend1/js/jquery.flot.pie.js')}}"></script>
	<script src="{{asset('backend1/js/jquery.flot.stack.js')}}"></script>
	<script src="{{asset('backend1/js/jquery.flot.resize.min.js')}}"></script>
	
		<script src="{{asset('backend1/js/jquery.chosen.min.js')}}"></script>
	
		<script src="{{asset('backend1/js/jquery.uniform.min.js')}}"></script>
		
		<script src="{{asset('backend1/js/jquery.cleditor.min.js')}}"></script>
	
		<script src="{{asset('backend1/js/jquery.noty.js')}}"></script>
	
		<script src="{{asset('backend1/js/jquery.elfinder.min.js')}}"></script>
	
		<script src="{{asset('backend1/js/jquery.raty.min.js')}}"></script>
	
		<script src="{{asset('backend1/js/jquery.iphone.toggle.js')}}"></script>
	
		<script src="{{asset('backend1/js/jquery.uploadify-3.1.min.js')}}"></script>
	
		<script src="{{asset('backend1/js/jquery.gritter.min.js')}}"></script>
	
		<script src="{{asset('backend1/js/jquery.imagesloaded.js')}}"></script>
	
		<script src="{{asset('backend1/js/jquery.masonry.min.js')}}"></script>
	
		<script src="{{asset('backend1/js/jquery.knob.modified.js')}}"></script>
	
		<script src="{{asset('backend1/js/jquery.sparkline.min.js')}}"></script>
	
		<script src="{{asset('backend1/js/counter.js')}}"></script>
	
		<script src="{{asset('backend1/js/retina.js')}}"></script>

		<script src="{{asset('backend1/js/custom.js')}}"></script>
	<!-- end: JavaScript-->
</body>
</html>