<?php
  	session_start();

	if (!isset($_SESSION['userName'])) {
        $_SESSION['msg'] = "You must log in first";
        header('location: login.php');
    }

  	$db = mysqli_connect("karthikdb.csgmn0ynrc1b.ap-south-1.rds.amazonaws.com:3306", "KarthikDB", "lathakvmk", "InsuranceConflict");
	$msg = "";

  
?>
<!DOCTYPE html>
<html>
<head>
<title>Results</title>
<style type="text/css">
   #content{
    width: 50%;
    margin: 20px auto;
    border: 1px solid #cbcbcb;
   }
   form{
    width: 50%;
    margin: 20px auto;
   }
   form div{
    margin-top: 5px;
   }
   #img_div{
    width: 80%;
    padding: 5px;
    margin: 15px auto;
    border: 1px solid #cbcbcb;
   }
   #img_div:after{
    content: "";
    display: block;
    clear: both;
   }
   img{
    float: left;
    margin: 5px;
    width: 300px;
    height: 140px;
   }
</style>
</head>
<body>
<div id="content">
  	<?php
		$sessionSearchBy = $_SESSION['searchBy'];
  		$searchBy = $_GET[$sessionSearchBy];
	  	if (isset($_SESSION['searchBy'])) {
	        $sql = "DESC accident";
	        $result = mysqli_query($db, $sql);
	  		$sql1 = "SELECT * FROM accident where $sessionSearchBy = '$searchBy'";
  			$result1 = mysqli_query($db, $sql1);
	  		
	  		$row1 = mysqli_fetch_array($result1);

	  		while ($row = mysqli_fetch_array($result)) {

	  			if ($row["Field"] == 'photosOfSite') {
	  				echo $row["Field"].' : ';
		  				echo "<div id='img_div'>";
	        				echo "<img src='images/".$row1[$row["Field"]]."' >";
	      				echo "</div>";		
	  			}

	  			elseif ($row["Field"] == 'interview') {
	  				echo $row["Field"].' : ';
		  				echo "<div id='img_div'>";
	        				echo "<video  width='300' height='300' controls>";
	        					echo "<source src='images/".$row1[$row["Field"]]."' type='video/mp4' >";
	      				echo "</div>";
	  			}

	  			else {
		  			echo $row["Field"] .':'. $row1[$row["Field"]].'<br>';
		  			$row1++;
		  		}
	  		}	      		
	    }	
  	?>
</div>
</body>
</html>