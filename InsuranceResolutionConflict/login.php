<?php include('loginScript.php') ?>
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
    		line-height: 1.4;
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
            padding: 18px 50px;
            text-decoration: none;
            font-size: 16px
        }

        li a:hover:not(.active) {
            background-color: #111;
        }

        .logo{
            padding-right: 20%;
        }

        .active {
            background-color: #4CAF50;
        }
        
        .btn {
            padding: 10px;
            font-size: 15px;
            color: white;
            background: #5F9EA0;
            border: none;
            border-radius: 5px;
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

    <form method="post" action="login.php">
        <?php include('errors.php'); ?>
        <div class="input-group">
            <label for="userName">UserName: </label>
            <input type="text" name="userName" class="inp" required>
        </div>
        <br>
        <div class="input-group">
            <label for="password">Password: </label>
            <input type="password" name="password" class="inp" required>
        </div>
        <br>
        <div class="input-group">
            <button type="submit" class="btn" name="login_user">Login</button>
        </div>
        <p>
            Not yet a member? <a href="adminRegistration.php">Sign up</a>
        </p>
    </form>

</body>
</html>