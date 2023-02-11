<?php
session_start();
if (!isset($_SESSION["admin"])) {
    header('Location: admin.php');
    exit;
}

require_once('connection.php');
$sql1 ="SELECT * FROM committee";
$result1 = mysqli_query($con,$sql1);

$msg="";
$errmsg="";
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$id="";
	$setmid="";
	$sql ="SELECT * FROM member";
	$result = mysqli_query($con,$sql);
	$sname=$_REQUEST['sname'];
	while($row = mysqli_fetch_array($result))
	{
		$name= $row['m_id'];
		if($sname == $name)
		{
            $setName = $row['name'];
            $setGen = $row['gender'];
			$setPhn = $row['contact'];
			$setDept = $row['department'];
			$setmid = $row['m_id'];			
			$setcom = $row['committee'];
            $setroll= $row['role'];
						
		}
		
	}
	

	$id=$setmid;
	if($sname==$id)
	{	
		$mid = $id;   
		if($_REQUEST['doption'] == "Update Member Info")
		{
			$committee = $_REQUEST['dtype'];
			$name = $_REQUEST['name'];
			$gender = $_REQUEST['gender'];
			$phone = $_REQUEST['contact'];
            $mid= $_REQUEST['mid'];
            $role = $_REQUEST['role'];  
			$dept = $_REQUEST['department'];  


			$query = mysqli_query($con,"SELECT * FROM `member` WHERE m_id='$mid'");
			$nn = mysqli_num_rows($query);
			if($nn != 0)
			{
				$sql3 ="UPDATE `member` SET `name`='$name',`gender`='$gender',`contact`='$phone',`department`='$dept',`committee`='$committee',`role`='$role' WHERE m_id='$mid'";
				if(!mysqli_query($con,$sql3))
					{
						echo "Error in login: " . $sql3 . "<br>" . mysqli_error($con);
					}

				else
				{
					$msg= 'Data Successfully Updated';
                    $setName="";
                    $setDept ="";
                    $setGen = "";
                    $setPhn ="";
                    $setmid ="";
                    $setroll ="";
					$setcom ="";
				}
			}
		
		}
		else if($_REQUEST['doption'] == "Remove Mmeber Info")
		{
			$usql= "DELETE FROM `member` WHERE m_id='$mid'";
				if(!mysqli_query($con,$usql))
				{
					echo "Error: " . $usql . "<br>" . mysqli_error($con);
				}
				
			
				else
				{
					$msg= "Successfully Deleted";
					$setName="";
                    $setDept ="";
                    $setGen = "";
                    $setPhn ="";
                    $setmid ="";
                    $setroll ="";
					$setcom ="";
				}
				
		}
	}
	else
	{	
		$errmsg = "ID not found";
		$setName="";
		$setDept ="";
		$setGen = "";
		$setPhn ="";
		$setmid ="";
		$setroll ="";
		$setcom ="";
	}
}
else
{
	$setName="";
	$setDept ="";
	$setGen = "";
	$setPhn ="";
	$setmid ="";
	$setroll ="";
	$setcom ="";
}
?>

<html>
<head><title> Modify member</title></head>
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
<h1>Modify/Remove member Info</h1>
<div style="text-align:right">
	<p><a href="view.php" class="back"><input type="submit" name="submit" class="back" value="Bact to admin"></a>
	<a href="logout.php" class="logout"><input  type="submit" name="submit" class ="logout" value="logout"></a></p>
	
</div>
<hr>
<br>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
     <table>
		
     <tr>
		    <th>Search Member_Id: </th>
			<td><input type="text" name="sname" value="<?php echo $_SESSION['ref'] ?>"></td>
		</tr>
		<tr>
		    <th>  </th>
            <td><input type="submit" name="search" value="Search"></td>
		</tr>
		<tr>
		    <th>Membe_Id <br><u> (unique Key)</u>: </th>
			<td><input type="text" name="mid" value="<?php echo $setmid ?>">
			</td>
		</tr>
		<tr>
		    <th>Name: </th>
			<td><input type="text" name="name" value="<?php echo $setName ?>">
			</td>
		</tr>
		<tr>
		    <th>Gender: </th>
			<td><select name="gender">
				<?php
				echo '<option value="'.$setGen.'">'.$setGen.'</option>';
				echo '<option>male</option>';
				echo '<option>female</option>';
				?>
			</select>
			</td>
		</tr>
		<tr>
		    <th>Department: </th>
			<td><input type="text" name="department" value="<?php echo $setDept ?>">
			</td>
		</tr>
		<tr>
		    <th>Committee: </th>
			<td><select name="dtype">
				<?php
				echo '<option value="'.$setcom.'">'.$setcom.'</option>';
				while ($row1 =  mysqli_fetch_assoc($result1)) 
				{
					echo '<option value="'.$row1['committee'].'">'.$row1['committee'].'</option>';
				}
				?>
			</select>
			</td>
		</tr>
		
	
		<tr>
		    <th>Contact: </th>
			<td><input type="text" name="contact" value="<?php echo $setPhn ?>">
			</td>
		</tr>
		
		<tr>
		    <th>Department: </th>
			<td><input type="text" name="department" value="<?php echo $setDept ?>">
			</td>
		</tr>
		<tr>
		    <th>Role: </th>
			<td><select name="role">
				<?php
				echo '<option value="'.$setroll.'">'.$setroll.'</option>';
				echo '<option>CA Convener</option>';
				echo '<option>LO Convener</option>';
				echo '<option>Co-Convener</option>';
				echo '<option>Student Volunteers</option>';
				?>
				</select>
			</td>
		</tr>
		<tr>
		    <th>Select an Option: </th>
			<td><select name="doption">
					<option>Update Member Info</option>
					<option>Remove Member Info</option>
				</select>
			</td>
		</tr>
		<tr>
		    <th>  </th>
			<td>
			<input type="submit" name="submit" value="Submit">			
			</td>
		</tr>	
</table>
</form>	
<hr>
<footer>
	<p style="color:green"><?php echo $msg; ?></p>
    <p style="color:red"><?php echo $errmsg; ?></p>
</footer>
    </center>
</html>