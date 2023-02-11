<?php
session_start();
if (!isset($_SESSION["admin"])) {
	header('Location: admin.php');
	exit;
}
require_once('connection.php');

$sol="";
$sql= "SELECT * from schedule";
$result=mysqli_query($con,$sql);
$nn=mysqli_num_rows($result);

$ss= $_SESSION['sid'];

$delete="DELETE FROM schedule where `s_no`= '$ss'";
    if(!mysqli_query($con,$delete))
    {
        echo"Error in delete data: " . $delete. "<br>" . mysqli_error($con);
    }
    else
    {
        $sol="Data will be removed successfully";
    }

?>

<html>
<head><title>Update Schedule</title></head>
<style>
    body{
        background-image: url("chessicon.jpg");
        background-size: cover;    	
    }
       
    input[type='submit'] {
        background-color:#0097a7 ;
        border: none;
        color: white;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
    }
    input[type='submit']:hover {
        background-color: lightblue; 
        color: white;
    }
    footer{        
        font-family: "Georgia",Serif;	
    }
</style>
<center>
    <br><br><br>
<hr>
<?php  echo "<h2>".$sol."</h2>" ?>
<hr>
<a href="add_schedule.php" class="back"><input  type="submit" name="submit" class ="back" value="Back"></a>

</center> 
</html>
