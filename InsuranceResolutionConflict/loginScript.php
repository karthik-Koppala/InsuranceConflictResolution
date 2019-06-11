 <?php
session_start();

	$userName = "";
	$email    = "";
	$errors = array(); 
	$_SESSION['success'] = "";
	$errorMessage = "<p style =\"color:red;font-size:15px;\"> Wrong userName/password combination </p>";
	$con = mysqli_connect('karthikdb.csgmn0ynrc1b.ap-south-1.rds.amazonaws.com:3306', 'KarthikDB', 'lathakvmk', 'InsuranceConflict');
	if (isset($_POST['login_user'])) {
		$userName = mysqli_real_escape_string($con, $_POST['userName']);
		$password = mysqli_real_escape_string($con, $_POST['password']);

		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM admin WHERE userName='$userName' AND password='$password'";
			$results = mysqli_query($con, $query);
			if (mysqli_num_rows($results) == 1) {
				$_SESSION['userName'] = $userName;
				header('location: index.php');
			}else {
				array_push($errors, $errorMessage);
			}
		}
	}

?>