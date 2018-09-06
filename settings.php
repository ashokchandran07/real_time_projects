<html>
<head>
	<title>settings</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script>
	function confirmPass() 
	{
      var pass=document.getElementById("pass").value;
      var confPass = document.getElementById("c_pass").value;
      if(pass == confPass) {
        alert('Same password !');
        document.getElementById('error').innerHTML='Same password';
      }}
/*    else
    {
        document.getElementById('error').innerHTML='password changed successfully';
    }
	}*/
	</script>
</head>
<body>
	<div class="container">
	<h3>Enter Password to Change</h3>	
	<form method="POST" action="">
		<center><table class="table-condensed">
			<tr>
				<th>
					<label>Password:</label>
				</th>
			</tr>
			<tr>
				<td>Current Password:</td>
				<td>
					<input type="password" id="pass" placeholder="enter current password" name="password" required/>
				</td>
			</tr>
			<tr>
				<td>New Password:</td>
				<td>
					<input type="password" id="c_pass"  placeholder="enter new password" name="new_password" required/>
				</td>
			</tr>
			<tr>
				<td>
					<input type="submit" value="submit" name="pass_change" onclick="confirmpass()"/>
				</td>
			</tr>
			<tr>
				<td>
					<span id="error"></span>
				</td>
			</tr>
			</table>
		</center>
	</form>
	</div>
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
    $new_password = mysqli_real_escape_string($db, $_POST['new_password']);
	$query = "SELECT password FROM registeru_table WHERE user_name='gk' AND password=$password";
	//                    $results = mysqli_query($db,$query) or die('Query failed: ' . mysql_error());
						if ( mysqli_num_rows($results) > 0 ) {
						echo "<script type='text/javascript'>alert($password);</script>";
						if($row=mysqli_fetch_assoc($results))
						{
							echo "<script type='text/javascript'>alert('Confirm to Save the change');</script>";
							$pcquery = "UPDATE registeru_table SET password='$new_password' WHERE password='$password'";
							if(mysqli_query($db,$pcquery))
							{
								echo "<script type='text/javascript'>alert('Password changed successfully');</script>";
							}
						}}
                }
?>