<?php
session_start();
if (!isset($_SESSION["admin"])) {
	header('Location: admin.php');
	exit;
}
require_once('connection.php');
	
$sql ="SELECT * FROM committee";
$result = mysqli_query($con,$sql);

$msg="";
$msg1="";
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$committee = $_POST['dtype'];
	$member_Id = $_POST['m_id'];
	$name = $_POST['name'];
	$gender = $_POST['gender'];
	$role = $_POST['role'];
	#$date = $_POST['date'];
	$contact = $_POST['contact'];
	$department = $_POST['department'];
	#$work = $_POST['work'];      
	

		$query = mysqli_query($con,"SELECT * FROM `member` WHERE m_id='$member_Id'");
		$nn = mysqli_num_rows($query);
		if($nn == 0 && !preg_match('/^ *$/', $member_Id))
		{
			$sql1 ="INSERT INTO `member` (`name`,`m_id`,`gender`,`role`,`contact`,`department`,`committee`) 
			VALUES ('$name', '$member_Id', '$gender', '$role', '$contact', '$department', '$committee')";
			if(!mysqli_query($con,$sql1))
				{
					echo "Error in insert data: " . $sql1. "<br>" . mysqli_error($con);
				}
			else
			{
				$msg= 'Committee-Members Details are inserted successfully';
			}
		}
		else{
			$msg1= 'Given data are not inserted and member ID already exists';
		}
}
?>

<html>
<head><title>Adding Members</title></head>
<style>
    body{
		background-image: url("chessicon.jpg");
    	background-size: cover;    	
	}
	table{
        height:50%;
        border-radius: 12px;
        border-collapse: collapse;
        border-color:lightblue;
        background:transparent;  
		color: midnightblue;
        font-family: "Times New Roman",Serif;
        text-align: left;
		font-size: 16px;
    }
    th, td {
        
        padding: 8px;
		border-radius: 12px;
		border-collapse: collapse;
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
<h1>Add Committe-Members Details</h1>
<div style="text-align:right">
	<p><a href="view.php" class="back"><input type="submit" name="submit" class="back" value="Bact to admin"></a>
	<a href="add_schedule.php" class="schedule"><input type="submit" name="submit" class="submit" value="Add-schedule"></a>
	<a href="logout.php" class="logout"><input  type="submit" name="submit" class ="logout" value="logout"></a></p>
	
</div>
<hr>
<br><br>
<form action="<?php  echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
  <table>
    <tr>
	   <th>Select Committee: </th>
	   <td><select name="dtype">
					<?php
						while ($row =  mysqli_fetch_assoc($result)) {
                         echo '<option value="'.$row['committee'].'">'.$row['committee'].'</option>';
			            }
					?>
			</select>
		</td>
	</tr>
    <tr>
	    <th>Member_Id: </th>
		<td><input type="text" name="m_id"></td>
	</tr>
    <tr>
	   <th>Name: </th>
	   <td><input type="text" name="name"></td>
	</tr>
	<tr>
	   <th>Gender: </th>
	   <td><select name="gender">
					<option>Male</option>
					<option>Female</option>
				</select>
		</td>
	</tr>
    <tr>
	    <th>Role: </th>
		<td><select name="role">
					<option>CA Convener</option>
					<option>LO Convener</option>
					<option>Co-Convener</option>
					<option>Student Volunteers</option>
				</select></td>
	</tr>
	<!--<tr>
	    <th>Register Date: </th>
		<td><input type="date" name="date"></td>
	</tr>-->
	<tr>
	    <th>contact: </th>
		<td><input type="text" name="contact"></td>
	</tr>
    <tr>
	    <th>Department: </th>
		<td><input type="text" name="department"></td>
	</tr>
	<!--<tr>
	    <th>work Details: </th>
		<td><textarea rows='3' cols='30' name="work"></textarea></td>
	</tr>	-->
	
	<tr>
	    <th> </th>
		<td><input type="submit" name="submit" value="Submit"></td>
	</tr>
  </table>
</form>
<br><br>
<hr>
<footer>
<P style="color:green"><?php echo $msg ; ?></p>
<p style="color:red"><?php echo $msg1 ; ?></p>
</footer>

</center>
</html>
