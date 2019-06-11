<?php include('registration_script.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Registration</title>
</head>
<body>

	<!DOCTYPE html>
<html>
<head>
	<title>Insurance Resolution Conflict</title>

	<style type="text/css">
		body {
    		font-family: sans-serif;
    		font-weight: 300;
    		font-style: normal;
    		font-size: 14px;
    		font-size: .875rem;
    		line-height: 1.4;
    	}

    	form{
  			width: 30%;
  			margin: 0px auto;
  			padding: 20px;
  			border: 1px solid #B0C4DE;
  			background: white;
  			border-radius: 0px 0px 10px 10px;
		}

        .input-group {
  			margin: 10px 0px 10px 0px;
		}	
		.input-group label {
  			display: block;
  			text-align: left;
  			margin: 3px;
		}
		.input-group input {
  			height: 30px;
  			width: 93%;
  			padding: 5px 10px;
  			font-size: 16px;
  			border-radius: 5px;
  			border: 1px solid gray;
		}
        .error {
            width: 92%; 
            margin: 0px auto; 
            padding: 10px; 
            border: 1px solid #a94442; 
            color: #a94442; 
            background: #f2dede; 
            border-radius: 5px; 
            text-align: left;
        }
        .success {
            color: #3c763d; 
            background: #dff0d8; 
            border: 1px solid #3c763d;
            margin-bottom: 20px;
        }

       ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #333;
            }

        li {
            float: left;
        }

        li a {
            display: block;
            color: white;
            text-align: center;
            padding: 18px 45px;
            text-decoration: none;
            font-size: 125%;
        }

        li a:hover:not(.active) {
            background-color: #111;
        }

        .logo{
            padding-right: 20%;
        }

        .active {
            background-color: #EA6C5E;
        }

        li p {
            display: block;
            color: white;
            text-align: center;
            padding: 18px 50px;
            text-decoration: none;
            font-size: 16px
        }

        a{
            text-decoration: none;
        }
	</style>

</head>
<body>
    <header>
        <nav>
            <ul>
                <li class="logo"><a href="index.php">LOGO</a></li>
                <li><a href="index.php#home">Home</a></li>
                <li><a href="index.php#policy">Policy</a></li>
                <li><a href="index.php#contact">Contact</a></li>
                <li><a href="index.php#about">About</a></li>
            </ul>
        </nav>
    </header>

	<form method="post" action="adminRegistration.php">
        <?php include('errors.php'); ?>
		<div class="input-group">
  	  		<label for="agentID">Agent ID </label>
            <input type="text" name="agentID" required="true" required>
  		</div>
  		<div class="input-group">
  	  		<label for="userName">User Name: </label>
            <input type="text" name="userName" required="true" required>
  		</div>
  		<div class="input-group">
  	  		<label for="email">Email Id: </label>
            <input type="email" name="email" required="true" required>
  		</div>
  		<div class="input-group">
  	  		<label for="password">Password: </label>
            <input type="password" name="password" required="true" pattern=".{6,}" required>
  		</div>
  		<div class="input-group">
  	  		<label for="confirmPassword">Confirm Password: </label>
            <input type="password" name="confirmPassword" required="true" pattern=".{6,}" required>
  		</div>
  		<div class="input-group">
  	  		<label for="aadharNo">Aadhar Number: </label>
            <input type="text" name="aadharNo" required="true" required>
  		</div>
  		<div class="input-group">
  	  		<label for="phone">Phone No: </label>
            <input type="text" name="phone" required="true" required>
  		</div>
  		<div class="input-group">
  	  		<label for="compName">Insurance Company: </label>
            <input type="text" name="compName" required="true" required>
  		</div>

  		<div class="input-group">
  	  		<button type="submit" class="btn" name="reg_user">Register</button>
  		</div>
  		<p>
  			Already Registered? <a href="login.php">Log In</a>
  		</p>
  	</form>     

</body>
</html>

</body>
</html>