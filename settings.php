<html>
<head>
	<title>settings</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style>
		body{
			background-image:url("images1/settings.gif");
			background-repeat: no-repeat;
			background-size: 200px 300px;
			background-position: center;
			background-color: aliceblue;
		}
		p{
			color: blueviolet;
			font-family: sans-serif;
			text-align: center;
			font-size: 20px;
		}
	</style>
</head>
<body>
	<div class="container">
	<h3>Enter Password to Change</h3>	
	<form method="POST" action="">
		<center><table class="table-condensed">
			<tr><th><label>Password:</label></th></tr>
			<tr><td>current Password:</td><td><input type="password" id="current" placeholder="enter current password" name="password" required/></td></tr><br/>
			<tr><td>New Password:</td><td><input type="password" id="pass" placeholder="enter new password" name="passwordn" required/></td></tr><br/>
	<tr><td>Re-type Password:</td><td><input type="password" id="c_pass"  placeholder="Retype the password" name="con_password" required/></td></tr><br/>
			</table></center>
		<center><input type="submit" value="submit" onclick="Confirm();"/></center>
	</form>
	<script>
	function Confirm() 
	{
      var pass=document.getElementById("pass").value;
      var confPass=document.getElementById("c_pass").value;
      if(pass != confPass) {
		 alert('password mismatch')
        //document.getElementById("error").innerHTML='password mismatch';
      }
    else if(pass == confPass && pass!="")
    {
        alert('password changed successfully');
		//document.getElementById('error').innerHTML='password changed successfully';
    }
	else{
		alert('password should be entered')
		//document.getElementById("error").innerHTML='password should be entered';
		}
	}
	</script>
	</div>
	<p id="error"></p>
</body>
</html>
<?php
echo "<script type='text/javascript'>alert('Entered in company function');</script>";
$company_name = "";
$email    = "";
$errors = array(); 
$_SESSION['success'] = "";

$db = mysqli_connect('localhost', 'root', '', 'ucproject');

if (isset($_POST['pass_change'])) {
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $new_password = mysqli_real_escape_string($db, $_POST['passwordn']);
	$query = "SELECT password FROM registeru_table WHERE password=$password";
	//                    $results = mysqli_query($db,$query) or die('Query failed: ' . mysql_error());
						if ( mysqli_num_rows($results) > 0 ) {
						echo "<script type='text/javascript'>alert($password);</script>";
						if($row=mysqli_fetch_assoc($results))
						{
							echo "<script type='text/javascript'>alert('Confirm to Save the change');</script>";
							$pcquery = "UPDATE registeru_table SET `password`='$passwordn' WHERE `password`='$password'";
							if(mysqli_query($db,$pcquery))
							{
								echo "<script type='text/javascript'>alert('Password changed successfully');</script>";
							}
						}}
                }
?>