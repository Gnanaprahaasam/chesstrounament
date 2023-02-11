<?php
session_start();
require_once('connection.php');

$sql ="SELECT * FROM Schedule";
$result = mysqli_query($con,$sql);
$nn = mysqli_num_rows($result);


?>



<html>
<head>
    <title>Schedule List</title>
</head>
<style>
    body{
		background-image: url("chessicon.jpg");
    	background-size: cover;
    	
	}
    table{
        width: 50%;
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
    
    footer{        
        font-family: "Georgia",Serif;	
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
</style>

<center>
<h1>Tournament Schedule Details</h1><br>
<hr>
<br>
<div style="text-align:right">
    <p><a href="Home.html" class="home"><input  type="submit" name="submit" class ="home" value="Home"></a>
    <a href="About.html" class="about"><input  type="submit" name="submit" class ="about" value="About"></a>
    <a href="Schedule.php" class="schedule"><input  type="submit" name="submit" class ="schedule" value="Schedule"></a>
    <a href="score.php" class="score"><input  type="submit" name="submit" class ="score" value="Score"></a>
    <a href="Contact.html" class="contact"><input  type="submit" name="submit" class ="contact" value="Contact"></a>
    <a href="logout.php" class="logout"><input  type="submit" name="submit" class ="logout" value="Logout"></a></p>
</div>

<form >

	<table border="1" >		
    <tr style="background:lightgrey">
        <td><h2> Particulars </h2></td>
        <td><h2> Day </h2></td>
        <td><h2> Date </h2></td>
        <td><h2> Time </h2></td> 
    </tr> 
    <?php
        if($nn!=0)
        {
            $no=0;    
            while($row = mysqli_fetch_assoc($result))
            {
                $no+=1;
                echo "<tr>";
                #echo"<td>".$no."</td>";
                echo "<td>".$row['Particulars']."</td>";
                echo"<td>".$row['Day']."</td>";
                echo "<td>".$row['Date']."</td>";
                echo "<td>".$row['Time']."</td>";            
                echo "</tr>";
            }
            echo "</table> \n";    
        }
    ?>
    
	</table>
</form>
<br>
</center>
</html>