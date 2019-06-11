<?php 
    session_start(); 

    if (!isset($_SESSION['userName'])) {
        $_SESSION['msg'] = "You must log in first";
        header('location: login.php');
    }
    
    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['userName']);
        header("location: login.php");
    }
?>

<?php include('registration_script.php') ?>

<?php   
    $connect = mysqli_connect("karthikdb.csgmn0ynrc1b.ap-south-1.rds.amazonaws.com:3306", "KarthikDB", "lathakvmk", "InsuranceConflict");  
    function options($connect)  
    {  
        $output = '';  
        $sql = "DESC accident";
        $result = mysqli_query($connect, $sql);  
        while($row = mysqli_fetch_array($result))  
        {  
            if ($row["Field"] == "photosOfSite") {
                break;
            }
            $output .= '<option value="'.$row["Field"].'">'.$row["Field"].'</option>';  
        }  
        return $output;  
    }  
    function fill_option($connect)  
    {
        $search = $_POST['searchBy'];
        $output = '';  
        $sql = "SELECT * FROM accident";  
        $result = mysqli_query($connect, $sql);  
        while($row = mysqli_fetch_array($result))   
        {   
            if (isset($search)) {
                $output .= '<div class="col-md-3">';  
                $output .= '<div style="border:1px solid #ccc; padding:20px; margin-bottom:20px;">'.$row["$search"].'';  
                $output .=     '</div>';  
                $output .=     '</div>';  
            }
        }  
        return $output;  
    }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Insurance Resolution Conflict</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

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
            background-color: #4CAF50;
        }

        li p {
            display: block;
            color: white;
            text-align: center;
            padding: 18px 50px;
            text-decoration: none;
            font-size: 16px;
        }     


        form{
            width: 30%;
            margin: 10px auto;
            padding: 20px;
            border: 1px solid #B0C4DE;
            background: white;
            border-radius: 0px 0px 10px 10px;
        }

        .input-group {
            margin: 10px 10px 10px 100px;
            align-items: center;
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

    <div>
        <?php if (isset($_SESSION['success'])) : ?>
            <div class="error success" >
                <h3>
                    <?php 
                        echo $_SESSION['success']; 
                        unset($_SESSION['success']);
                    ?>
                </h3>
            </div>
        <?php endif ?>
        
    <header>
        <nav>
            <ul>
                <li class="logo"><a href="index.php">LOGO</a></li>   

                <?php  if (isset($_SESSION['userName'])) : ?>

                    <li><a href="#home">Home</a></li>
                    <li><a href="#policy">Policy</a></li>
                    <li><a href="#contact">Contact</a></li>
                    <li><a href="#about">About</a></li>

                    <li style="float: right;">
                        <a>Welcome <?php echo $_SESSION['userName']; ?></a>
                    </li>

                    <li style="float: right;">
                        <a href="index.php?logout='1'" style="color: red;">logout</a>
                    </li>
                <?php endif ?>

                <?php  if (!isset($_SESSION['userName'])) : ?>
                    <li style="float: right;"><a href="adminRegistration.php">Register</a></li>
                    <li style="float: right;"><a href="login.php">Log In</a></li>
                <?php endif ?>

            </ul>
        </nav>
    </header>

    <form method="post" action="index.php" id="activitystatus" style="align-items: center; justify-content: center;">
        <?php include('errors.php'); ?>
        <div class="input-group">
            <label for="searchBy">Search By</label>
            <select name="searchBy" id="searchBy"> 
                <?php echo options($connect); ?>  
            </select>
        </div>
        <br /><br />  
        <div class="row" id="show_results">
            <?php echo fill_option($connect); ?>
        </div>

        <input type="text" name="searchBox">

    </form>

</body>
</html>

<script>  
    $(document).click(function(){  
        $('#searchBy').change(function(){
            $('#show_results').html("<b>Loading Response...</b>");
            $.post('load_data.php',$('#activitystatus').serialize(), function(data,status1){
                $('#show_results').html(data);
            }).fail(function(){
                //show nothing if form failed
            })  
        });  
    });  
</script>