<?php 
    session_start(); 
    
    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['userName']);
        header("location: login.php");
    }
?>

<?php include('registration_script.php') ?>

<!DOCTYPE html>
<html>
<head>
    <title>Insurance Conflict Resolution</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

    <style type="text/css">

        html, body {
            height: 100%;
            width: 100%;
            margin: 0;
            font-family: sans-serif;
            font-weight: 300;
            font-style: normal;
            font-size: 14px;
            line-height: 1.4;
            scroll-behavior: smooth;
        }

        .container { 
            background: url(images/car.jpg) no-repeat fixed; 
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
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

        .search
        {
            display: inline;
            margin-left: 42%;
            color: #ffffff;
            border: 200px 20px 20px 20px;
            font-size: 30px;
            text-shadow: 2px 2px 4px none;
            background-color: #D15155   ;
            box-shadow: 5% 5% black;

        }

        .search:hover {
            background-color: #ffffff;
            color:#D16155;
        }

        .searchButton{
            padding-top: 40%;
            top: 5%;
            bottom: 0;
            width: 100%;
        }

        h1{
            padding-left :43%;
            overflow: hidden;
            background-color: none;
            display: block;
            color: #EA6C5E;
            margin-top: 0%;
        }

        .column-1 {
            width: 100%;
            float: left;
            padding-left: .9375rem;
            padding-right: .9375rem;
            text-align: justify;
            font-family: SegoeUI;
        }

        .row-1 {
            max-width: 1310px;
            margin-left: auto;
            margin-right: auto;
            text-align: justify;
        }

        .shadow{
            margin-top:1%;
            box-shadow: -5px -5px black;
        }

        .text-heading {
            font-size: 18px;
            font-weight: 600;
            line-height: 1.3;
            margin: 0 0 9px;
            font-family: SegoeUI;
        }

        .container-fluid{
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto;
        }

        #ABOUT {padding-top:50px;height:500px;color: #747474; background-color: #f1f1f1; font-size: 1.0em; padding-left: 4%; margin: 0.5%; margin-top: 1%;}
        #POLICY {padding-top:50px;height:500px;color: #747474; background-color: #f1f1f1; font-size: 1.0em; padding-left: 4%; margin: 0.5%; margin-top: 1%;}
        #CONTACT {padding-top:50px;height:500px;color: #747474; background-color: #f1f1f1; font-size: 1.0em; padding-left: 4%; margin: 0.5%; margin-top: 1%;}

    </style>
</head>
<body style="background-color:#5A5454">
    <div class="container" id="HOME">
        <nav>
            <ul>
                <li class="logo"><a href="index.php">LOGO</a></li>   

                <li><a href="#HOME">Home</a></li>
                <li><a href="#ABOUT">About</a></li>
                <li><a href="#POLICY">Policy</a></li>
                <li><a href="#CONTACT">Contact</a></li>

                <?php  if (isset($_SESSION['userName'])) : ?>
                    <li style="float: right;"><a>Welcome <?php echo $_SESSION['userName']; ?></a></li>
                    <li style="float: right;"><a href="index.php?logout='1'" style="color: red;">logout</a></li>
                <?php endif ?>

                <?php  if (!isset($_SESSION['userName'])) : ?>
                    <li style="float: right;"><a href="adminRegistration.php">Register</a></li>
                    <li style="float: right;"><a href="login.php">Log In</a></li>
                <?php endif ?>

            </ul>
        </nav>

        <div class="searchButton">
            <form action="searchPage.php" method="POST">
                <input type="submit" class="search" name="search" value="Vechile Search">  
            </form>
        </div>
        <br><br>
    </div>

    <div id="ABOUT" class="shadow" class="container-fluid">
        <h1>ABOUT</h1>
        <p class="column-1 row-1">
              It is highly common and a mandatory requirement for a vehicle to have an Insurance and there is a complex procedure to claim the insurance especially on vehicle accidents. So, there should be a system for gathering of on the spot information during road accidents. This information should include photos of the site, interviews with eyewitnesses, information on injuries and fatalities, reason for accident, speed, road condition on relative basis, etc. All this data can go into a central database. The responsibility for collecting the data could be given either to police, transport authority, ambulance or even ordinary citizens who volunteer for the same. In the same system, there should also be a provision to submit / exchange Insurance numbers / details in order to settle the dispute if any arising out of accident.          
        </p>
    </div>

    <div id="POLICY" class="shadow" class="container-fluid">
        <h1>POLICY</h1>
        <p class="column-1 row-1">
            Insurance Dispute Resolution by on spot Accident Information reduces the conflict between the client and the insurance company. This would save the valuable time of the client as all the proofs are provided as per the request and the insurance claim made easy without any conflict and can be accessed from anywhere with proper authentication.
        </p>
        


    </div>

    <div id="CONTACT" class="shadow" class="container-fluid">
        <h1>CONTACT</h1>
        <p class="column-1 row-1">

        </p>
        


    </div>

    <footer>
            <h1 style="font-size: 20px;">REFERENCE</h1>
    </footer>

</body>
</html>