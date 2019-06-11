<?php  
    session_start();
    $connect = mysqli_connect("karthikdb.csgmn0ynrc1b.ap-south-1.rds.amazonaws.com:3306", "KarthikDB", "lathakvmk", "InsuranceConflict");
    $searchBy = $_POST["searchBy"];
    $_SESSION['searchBy'] = $searchBy;
    $output = '';
    if(isset($_POST["searchBy"]))
    {
        $sql = "SELECT DISTINCT $searchBy FROM accident";
        $result = mysqli_query($connect, $sql);
        while($row = mysqli_fetch_array($result))
        {
            $output .= 
                '<a href="searchResults.php?'.$searchBy.'='.$row[$searchBy].'" style = "text-decoration:none"> 
                    <div class="col-md-3">
                        <div style="border:1px solid #ccc; padding:20px; margin-bottom:20px; text-align:center;">'.$row[$searchBy].'</div>
                    </div>
                </a>';
        }
        echo $output;
    }
?>