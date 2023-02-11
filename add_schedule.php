<?php
session_start();
if (!isset($_SESSION["admin"])) {
	header('Location: admin.php');
	exit;
}
require_once('connection.php');

$sql= "SELECT * from schedule";
$result=mysqli_query($con,$sql);
$nn=mysqli_num_rows($result);
if($nn>=0)
{
    $n1=0;
}
$err="";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $part=$_REQUEST["par"];
    $day=$_REQUEST["day"];
    $date=$_REQUEST['date'];
    $time=$_REQUEST["time"];

    
    $insert="INSERT INTO schedule(`Particulars`,`Day`,`Date`,`Time`) values('$part','$day','$date','$time')";
    if(!mysqli_query($con,$insert))
    {
        echo "Error in insert data: " . $insert. "<br>" . mysqli_error($con);
    }
    else{
        $err="Given data is inserted Succesfull";
    }
    

    $sql1= "SELECT * from schedule";
    $result1=mysqli_query($con,$sql1);
    $nn1=mysqli_num_rows($result1);
    if($nn1>$nn)
    {
        $n1=1;
    }
    
}

?>


<html>
<head><title>Update Schedule</title></head>
<style>
    body{
		background-image: url("chessicon.jpg");
    	background-size: cover;    	
	}
   
    table{
        background:transparent;
        width: 70%;
        border-radius: 12px;
        border-collapse: collapse;        
		color: midnightblue;
        font-family: "Times New Roman",Serif;
        text-align: center;
		font-size: 16px;
    }
    th, td {
        
        padding: 8px;
        text-align: center;
        border-bottom: 1px solid #DDD;
    }

    tr:hover {background-color: #D6EEEE;}
	
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
<h1>Add Schedule</h1>
<div style="text-align:right">
	<p><a href="view.php" class="back"><input type="submit" name="submit" class="back" value="Bact to admin"></a>
	<a href="add_member.php" class="member"><input type="submit" name="submit" class="submit" value="Add-Member"></a>
    <a href="logout.php" class="logout"><input  type="submit" name="submit" class ="logout" value="logout"></a></p>
</div>
<br>
<form action="<?php  echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
<p>Particulars <input type="text" name="par">  <label> Day <input List="browser" name="day"><datalist id="browser"><option value="Sunday"><option value="Monday"><option value="Tuesday"><option value="wednesday"><option value="Thrusday"><option value="Friday"><option value="Saturday"> </label> Date <input type="date" name="date">  Time <input type="time" name="time">
<input  type="submit" name="insert" value="Submit"></p>
<hr>
	<table border="1" >		
    <tr>
        <td><h2> Particulars </h2></td>
        <td><h2> Day </h2></td>
        <td><h2> Date </h2></td>
        <td><h2> Time </h2></td>
        <td><h2> changes </h2></td>
    <?php
        if($n1==0)
        {               
            while($row = mysqli_fetch_assoc($result))
            {                
                echo "<tr>";
                $NO=$row['s_no'];
                $_SESSION['sid']=$NO;
                echo "<td>".$row['Particulars']."</td>";
                echo"<td>".$row['Day']."</td>";
                echo "<td>".$row['Date']."</td>";
                echo "<td>".$row['Time']."</td>"; 
                echo "<td><a href=\"delete_schedule.php\" name=\"delete\" >Remove</a></td>";          
                echo "</tr>";
            }
            echo "</table> \n";    
        }
        else if ($n1==1)
        {
            while($row = mysqli_fetch_assoc($result1))
            {                
                echo "<tr>";
                $NO=$row['s_no'];
                $_SESSION['sid']=$NO;
                echo "<td>".$row['Particulars']."</td>";
                echo"<td>".$row['Day']."</td>";
                echo "<td>".$row['Date']."</td>";
                echo "<td>".$row['Time']."</td>"; 
                echo "<td><a href=\"delete_schedule.php\" name=\"delete\" >Remove</a></td>";          
                echo "</tr>";
            }
            echo "</table> \n";
        }
    ?>
    
	</table>
</form>
</form>
</html>