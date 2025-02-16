<!doctype html>
<html lang="en">
  <head>
  	<title>{{ env('COMPANY_NAME') }} - Admin Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="/admin-login-resource/css/style.css">

	</head>
	<body class="img js-fullheight" style="background-image: url(/admin-login-resource/images/bg.jpg);">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">{{ env('COMPANY_NAME') }}</h2>
				</div>
			</div>
            @include('messagebag')

			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
		      	<h3 class="mb-4 text-center">Admin Login</h3>
 
              
		      	<form action="/admin" method="POST"  class="signin-form">
                    @csrf

		      		<div class="form-group">
		      			<input type="text" class="form-control" placeholder="Email Address" name="email_address" required>
		      		</div>
	            <div class="form-group">
	              <input id="password-field" type="password" class="form-control" placeholder="Password" name = "password" required>
	              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
	            </div>
	            <div class="form-group">
	            	<button type="submit" class="form-control btn btn-primary submit px-3">Sign In</button>
	            </div>
	            <div class="form-group d-md-flex">
	            	<div class="w-50">
		            	<label class="checkbox-wrap checkbox-primary">Remember Me
									  <input type="checkbox" checked>
									  <span class="checkmark"></span>
									</label>
								</div>
								<div class="w-50 text-md-right">
									<a href="#" style="color: #fff">Forgot Password</a>
								</div>
	            </div>
	          </form>
	          <div class="social d-flex text-center">
	          	<a href="{{ route('home-page') }}" class="px-2 py-2 mr-md-1 rounded"><span class="ion-logo-facebook mr-2"></span> Goto Homepage</a>
	          </div>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="/admin-login-resource/js/jquery.min.js"></script>
  <script src="/admin-login-resource/js/popper.js"></script>
  <script src="/admin-login-resource/js/bootstrap.min.js"></script>
  <script src="/admin-login-resource/js/main.js"></script>

	</body>
</html>

