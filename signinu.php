<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Student Login</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="">
		<div class="phpkida-main">
			<h2>Login</h2>
			<form method="post" action="server.php">
				<?php include('errors.php'); ?>
				<input type="text" id="" class="ggg" name="user_name" required="" placeholder="UserName" >
				<input type="password" id="" class="ggg" name="password" required="" placeholder="Password">
				<input type="submit" value="submit" name="login_user">
			</form>
		</div>
	</div>
</body>
</html>