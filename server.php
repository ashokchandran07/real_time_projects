<?php 
//	session_start();

	// variable declaration
	$company_name = "";
	$email    = "";
	$errors = array(); 
	$_SESSION['success'] = "";

	// connect to database
	$db = mysqli_connect('localhost', 'root', '', 'ucproject');

	// REGISTER USER
	if (isset($_POST['reg_user'])) {
		// receive all input values from the form
		$company_name = mysqli_real_escape_string($db, $_POST['company_name']);
		$contactno = mysqli_real_escape_string($db,$_POST['contactno']);
		$state = mysqli_real_escape_string($db, $_POST['state']);
		$address = mysqli_real_escape_string($db, $_POST['address']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$contact_person_name = mysqli_real_escape_string($db, $_POST['contact_person_name']);
		$district = mysqli_real_escape_string($db, $_POST['district']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
		$website = mysqli_real_escape_string($db, $_POST['website']);
		
		// form validation: ensure that the form is correctly filled
		if (empty($company_name)) { array_push($errors, "Username is required"); }
		if (empty($contactno)) { array_push($errors, "Contactno is required"); }
		if (empty($state)) { array_push($errors, "State is required"); }
		if (empty($address)) { array_push($errors, "Address is required"); }
		if (empty($email)) { array_push($errors, "Email is required"); }
		if (empty($contact_person_name)) { array_push($errors, "Contect Person Name is required"); }
		if (empty($district)) { array_push($errors, "District is required"); }
		if (empty($website)) { array_push($errors, "Website is required"); }
		if (empty($password_1)) { array_push($errors, "Password is required"); }

		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}

		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$password = md5($password_1);//encrypt the password before saving in the database
			$query="INSERT INTO register_table(company_name,contactno,state,address,email,contact_person_name,district,password,website) 
				VALUES ('$company_name','$contactno','$state','$address','$email','$contact_person_name','$district','$password','$website')";
			mysqli_query($db, $query);
			echo "<script type='text/javascript'>alert('result obtained');</script>";
//			$_SESSION['companyname'] = $companyname;
	//		$_SESSION['success'] = "You are now logged in";
			header('location: signin.php');
		}

	}

	// ... 

	// LOGIN USER
	if (isset($_POST['login_user'])) {
		echo "<script type='text/javascript'>alert('Entered in correct function');</script>";
		$user_name = mysqli_real_escape_string($db, $_POST['user_name']);
		$password = mysqli_real_escape_string($db, $_POST['password']);
		if (empty($user_name)) {
			array_push($errors, "Username is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}
		if (count($errors) == 0) {
			//$password = md5($password);
			$query = "SELECT * FROM registeru_table WHERE user_name='$user_name' AND password='$password'";
			$results = mysqli_query($db, $query);
			$row=mysqli_num_rows($results);
			echo "<script type='text/javascript'>alert($password+'  '+$user_name);</script>";
			if($row==1)
			{
				echo "<script type='text/javascript'>alert('You are loggned in as user');</script>";
				include 'student.html';
			}
			else {
				array_push($errors, "Wrong username/password combination");
			include 'signin.php';
			}
		}
	}

	#LOGIN COMPANY
	if (isset($_POST['login_company'])) {
		echo "<script type='text/javascript'>alert('Entered in company function');</script>";
		$company_name = mysqli_real_escape_string($db, $_POST['company_name']);
		$password = mysqli_real_escape_string($db, $_POST['password']);
		if (empty($company_name)) {
			array_push($errors, "Company Username is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}
		echo "<script type='text/javascript'>alert('Entered 1');</script>";
		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM register_table WHERE company_name='$company_name' AND password='$password'";
			echo "<script type='text/javascript'>alert('Entered 2');</script>";
			$results = mysqli_query($db, $query);
			echo "<script type='text/javascript'>alert('Entered 3');</script>";
			$row=mysqli_num_rows($results);
			if($row==1)
			{
				echo "<script type='text/javascript'>alert('You are loggned in as company user');</script>";
				include 'index123.php';
			}
			else {
				array_push($errors, "Wrong username/password combination");
			include 'signin.php';
			}
		}
	}
?>

