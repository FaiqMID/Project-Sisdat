<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Login Dashboard</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
	  <link rel="stylesheet" href="plugins/fonts/sanspro.css">
	  <!-- Font Awesome -->
	  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
	  <!-- icheck bootstrap -->
	  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	  <!-- Theme style -->
	  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  </head>
  <body class="login-page">
	<div class="login-box">
	  <div class="card card-outline card-primary">
		<div class="card-header text-center">
		  <a href="#" class="h1"><b>Dashboard</b>Rapat</a>
		</div>
		<div class="card-body">
		  <p class="login-box-msg">Silahkan Login</p>

		  <form action="systems/dologin.php" method="post">
			<div class="input-group mb-3">
			  <input type="text" class="form-control" name="userId" placeholder="User Id">
			  <div class="input-group-append">
				<div class="input-group-text">
				  <span class="fas fa-envelope"></span>
				</div>
			  </div>
			</div>
			<div class="input-group mb-3">
			  <input type="password" class="form-control" name="userPasswd" placeholder="Password">
			  <div class="input-group-append">
				<div class="input-group-text">
				  <span class="fas fa-lock"></span>
				</div>
			  </div>
			</div>
			<div class="row">
			  <div class="col-8">
				<div class="icheck-primary">
				  <input type="checkbox" id="remember">
				  <label for="remember">
					Ingat Login
				  </label>
				</div>
			  </div>
			  <div class="col-4">
				<button type="submit" class="btn btn-primary btn-block">Login</button>
			  </div>
			</div>
		  </form>
		</div>
	  </div>
	</div>
	<script src="plugins/jquery/jquery.min.js"></script>
	<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="dist/js/adminlte.min.js"></script>
  </body>
</html>