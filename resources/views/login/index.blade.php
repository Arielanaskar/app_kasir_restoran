<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>Login</title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- FontAwesome JS-->
    <script defer src="/plugins/fontawesome/js/all.min.js"></script> 
    <link id="theme-style" rel="stylesheet" href="/css/portal.css">
	<link rel="stylesheet" href="/css/style.css">
    <link rel="shortcut icon" href="/images/logofood.ico"> 

</head> 

<body class="app app-login p-0">    	
    <div class="row g-0 app-auth-wrapper">
	    <div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
		    <div class="d-flex flex-column align-content-end">
			    <div class="app-auth-body mx-auto">	
				    <div class="app-auth-branding mb-4">
						<a class="app-logo" href="index.html">
							<img class="logo-icon me-2" src="/images/logofood.png" alt="logo">
						</a>
					</div>
					<h2 class="auth-heading text-center mb-5">Login to FOODOSO</h2>
                    @if (session()->has('LoginError'))
                    <div class="alert alert-danger alert-dismissible fade show p-2" role="alert">
                        Login Failed
                        <button type="button" class="btn-close p-2 mt-1" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
			        <div class="auth-form-container text-start">
						<form class="auth-form login-form" action="/login" method="POST">
                            @csrf         
							<div class="email mb-3">
								<label class="sr-only" for="signin-username">Username</label>
								<input id="signin-username" name="username" type="text" class="form-control signin-username" placeholder="Username" required="required" autofocus>
							</div>
							<div class="password mb-3">
								<label class="sr-only" for="signin-password">Password</label>
								<input id="signin-password" name="password" type="password" class="form-control signin-password" placeholder="Password" required="required">
								<div class="extra mt-3 row justify-content-between">
									<div class="col-6">
										<div class="form-check">
											<input class="form-check-input" type="checkbox" value="" id="RememberPassword">
											<label class="form-check-label" for="RememberPassword">
											Remember me
											</label>
										</div>
									</div>
								</div>
							</div>
							<div class="text-center">
								<button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">Log In</button>
							</div>
						</form>
					</div>
			    </div>
		    </div>
	    </div>
	    <div class="col-12 col-md-5 col-lg-6 h-100 auth-background-col">
		    <div class="auth-background-holder">

		    </div>
		    <div class="auth-background-mask"></div>
		    <div class="auth-background-overlay p-3 p-lg-5">
			    <div class="d-flex flex-column align-content-end h-100">
				    <div class="h-100"></div>
				    <div class="overlay-content p-3 p-lg-4 rounded">
					    <h5 class="mb-3 overlay-title">Motivation for today</h5>
					    <div>Our task is not only to serve delicious food but also to provide friendly and efficient service. Focus on good service quality and success will follow.</div>
				    </div>
				</div>
		    </div>
	    </div>
    </div>
    <script src="/plugins/bootstrap/js/bootstrap.min.js"></script>  
</body>
</html> 

