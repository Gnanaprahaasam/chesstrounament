<?php 
session_start();
if (!isset($_SESSION["admin"])) {
	header('Location: admin.php');
	exit;
}

require_once('connection.php');

$sql1 ="SELECT * FROM committee";
$result1 = mysqli_query($con,$sql1);
$sql2 ="SELECT * FROM member";
$result2 = mysqli_query($con,$sql2);
$sql3 ="SELECT * FROM role";
$result3 = mysqli_query($con,$sql3);
$select=0;
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $committee=$_REQUEST['dtype'];
    $role=$_REQUEST['role'];
    $test="SELECT *FROM committee where committee='$committee'";
    $test1= mysqli_query($con,$test);
    $test2=mysqli_num_rows($test1);
    $TEST="SELECT *FROM role where `role`='$role'";
    $TEST1= mysqli_query($con,$TEST);
    $TEST2=mysqli_num_rows($TEST1);
    if($test2 !=0)
    {
        $sql ="SELECT * FROM member where committee='$committee'";
        $result = mysqli_query($con,$sql);
        $select +=1;
    }
    else if($TEST2 !=0)
    {
        $sql ="SELECT * FROM member where `role`='$role'";
        $result = mysqli_query($con,$sql);
        $select +=1;
    }
}

    

?>


<html>
<head>
    <title>committee & Members List</title>
</head>
<style>
   body{
		background-image: url("chessicon.jpg");
    	background-size: cover;
    	
	}
    table{
        background:transparent;
        width: 80%;
        height:20%;
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
<p><?php echo'Admin:'.$_SESSION['admin']. "";?></p>
<center>
<h1>Committee and Memebers Details</h1><br>

<div style="text-align:right">
    <p><a href="add_member.php" class="add"><input type="submit" name="submit" class="add" value="Add-member"></a>
    <a href="add_schedule.php" class="schedule"><input type="submit" name="submit" class="submit" value="Add-schedule"></a>
    <a href="logout.php" class="logout"><input  type="submit" name="submit" class ="logout" value="logout"></a></p>
</div>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
<div style="text-align:right">   
    <p>Select the committee:<select name="dtype">
                <?php
                echo '<option value=\"select\">select</option>';
                while ($row1 =  mysqli_fetch_assoc($result1)) 
                {
                    echo '<option value="'.$row1['committee'].'">'.$row1['committee'].'</option>';
                }
                
                ?></select>
    <input  type="submit" name="submit" value="Search"></p>
    <p>Select the Role:<select name="role">
                <?php
                echo "<option value=\"select\">select</option>";
                while ($row3 =  mysqli_fetch_assoc($result3)) 
                {
                    echo '<option value="'.$row3['role'].'">'.$row3['role'].'</option>';
                }
                
                ?></select>
    <input  type="submit" name="submit" value="Search"></p>
    
</div>
<hr>
<br><br><br>


	<table border="1" >		
    <?php 

       if($select==1) 
       {
        echo"<tr>";
        echo"<td><h2> S_No </h2></td>";
        echo"<td><h2> Name </h2></td>";
        echo"<td><h2> Member_Id</h2></td>";
        echo"<td><h2> Role </h2></td> ";
        echo"<td><h2> Gender </h2></td>";
        echo"<td><h2> Contact No </h2></td>";
        echo"<td><h2> Department </h2></td>";
        echo"<td><h2> Committee </h2></td>";
        echo"<td><h2> Modify</h2></td>";
        echo"</tr>";       
    
        $no=0;    
            while($row = mysqli_fetch_assoc($result))
                {
                    $no+=1;
                    echo "<tr>";
                    $ref=$row['m_id'];
                    $_SESSION['ref']=$ref;
                    echo"<td>".$no."</td>";
                    echo "<td>".$row['name']."</td>";
                    echo"<td>".$row['m_id']."</td>";
                    echo "<td>".$row['role']."</td>";
                    echo "<td>".$row['gender']."</td>";
                    echo "<td>".$row['contact']."</td>";
                    echo "<td>".$row['department']."</td>";
                    echo "<td>".$row['committee']."</td>";
                    echo "<td><a href=\"modify.php\" name=\"modify\">Modify</a></td>";             
                    echo "</tr>";
                }
        echo "</table> \n";		
        }       
        else 
        {
            echo"<tr>";
            echo"<td><b> S_No </b></td>";
            echo"<td><b> Name </b></td>";
            echo"<td><b> Member_Id</b></td>";
            echo"<td><b> Role </b></td> ";
            echo"<td><b> Gender </b></td>";
            echo"<td><b> Contact No </b></td>";
            echo"<td><b> Department </b></td>";
            echo"<td><b> Committee </b></td>";
            echo"</tr>";       
        
            $no=0;    
                while($row2 = mysqli_fetch_assoc($result2))
                    {
                        $no+=1;
                        echo "<tr>";
                        echo"<td>".$no."</td>";
                        echo "<td>".$row2['name']."</td>";
                        echo"<td>".$row2['m_id']."</td>";
                        echo "<td>".$row2['role']."</td>";
                        echo "<td>".$row2['gender']."</td>";
                        echo "<td>".$row2['contact']."</td>";
                        echo "<td>".$row2['department']."</td>";
                        echo "<td>".$row2['committee']."</td>";
                        #echo "<td>".$row['date']."</td>";
                        #echo "<td>".$row['work']."</td>";
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