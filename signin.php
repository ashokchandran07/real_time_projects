<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Company Login</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="">
		<div class="phpkida-main">
			<h2>Login</h2>
			<form method="post" action="server.php">
				<?php include('errors.php'); ?>
				<input type="text" id="" class="ggg" name="company_name" required="" placeholder="CompanyName" >
				<input type="password" id="" class="ggg" name="password" required="" placeholder="Password">
				<input type="submit" value="submit" name="login_company">
				<p>
					Not yet a member? <a href="signup.html">Sign up</a>
				</p>
			</form>
		</div>
	</div>
</body>
</html>