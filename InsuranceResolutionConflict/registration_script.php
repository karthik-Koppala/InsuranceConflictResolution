<?php
session_start();

	$userName = "";
	$email    = "";
	$errors = array(); 
	$_SESSION['success'] = "";

	$con = mysqli_connect('karthikdb.csgmn0ynrc1b.ap-south-1.rds.amazonaws.com:3306', 'KarthikDB', '', 'InsuranceConflict');

	if (isset($_POST['reg_user'])) {
		$agentID = mysqli_real_escape_string($con, $_POST['agentID']);
		$userName = mysqli_real_escape_string($con, $_POST['userName']);
		$email = mysqli_real_escape_string($con, $_POST['email']);
		$password = mysqli_real_escape_string($con, $_POST['password']);
		$confirmPassword = mysqli_real_escape_string($con, $_POST['confirmPassword']);
		$aadharNo = mysqli_real_escape_string($con, $_POST['aadharNo']);
		$phone = mysqli_real_escape_string($con, $_POST['phone']);
		$compName = mysqli_real_escape_string($con, $_POST['compName']);
		$dateOfRegistration = date("Y-m-d H:i:s");
		
		if ($password != $confirmPassword) {
			array_push($errors, "The two passwords do not match");
		}

		if (count($errors) == 0) {
			$password1 = md5($password);
			$user_query = "INSERT into admin(agentID,userName,email,password,aadharNo,phone,compName,dateOfRegistration) VALUES('$agentID','$userName','$email','$password1','$aadharNo','$phone','$compName','$dateOfRegistration')";
  		
	  		$user_query_submit = mysqli_query($con,$user_query)
			or die(mysqli_error($con));

			$_SESSION['userName'] = $userName;
			$_SESSION['success'] = "You are now logged in";
			header('location: index.php');
		}

	}
?>