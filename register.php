<?php
session_start();	
require('connection.php');


$err1="";
$err = "";
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$username = $_REQUEST['uname'];
		$password = $_REQUEST['pass'];
		$acctype = $_REQUEST["acctype"];
		$age = $_REQUEST["age"];
		$dob = $_REQUEST["date"];
		$a_no = $_REQUEST["a-no"];
		$fname = $_REQUEST["fname"];
		$address = $_REQUEST["add"];
		$contact = $_REQUEST["contact"];
		$state = $_REQUEST["state"];
		$zip = $_REQUEST["zip"];
		
		$sql = "SELECT * from login WHERE user='$username' and acctype='$acctype'";
		$result = mysqli_query($con,$sql);
		
		
		$nn = mysqli_num_rows($result);
		if($nn == 0 && !preg_match('/^ *$/', $username))
		{
			$sql1 = "INSERT INTO `login` (`user`,`password`,`acctype`)VALUES('$username','$password','$acctype')";
			if(!mysqli_query($con,$sql1))
				{
					echo "Error in insert data: " . $sql1. "<br>" . mysqli_error($con);
				}
				
			$sql2 = "INSERT INTO `participant`(`name`,`age`,`dob`,`a_no`,`add`,`fname`,`contact`,`zip`,`state`)VALUES('$username','$age','$dob','$a_no','$address','$fname','$contact','$zip','$state')";
			if(!mysqli_query($con,$sql2))
				{
					echo "Error in insert data: " . $sql2. "<br>" . mysqli_error($con);
				}
			else{
				$err1='Give Data are inserted successfully';
			}			
		}
		else
		{
			$err='Given data are not inserted and member ID already exists';
			
		}
			
		
	}
?>


<html>
<head>
	<title>Register Page</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
</head>
<center>
<h1>Register Page</h1>

<style>
	body{
		background-image: url("chessicon.jpg");
    	background-size: cover;
	}
	.box{
		background: transparent;
		color: midnightblue;
		top: 10%;
		left: 35%;
		position: absolute;  
		box-sizing: border-box;
		padding: 20px 40px;
		width: 35%;
		
	}
	

	input[type="text"], input[type="password"] ,input[type="email"]
	{
		border: none;
		border-bottom: 1px solid #fff;
		background: transparent;
		outline: none;
		height: 40px;
		color: #673ab7;
		font-size: 16px;
		font-family:"Times New Roman",Serif;
		padding:10px 10px;
		width: 100%;
		margin-bottom: 10px;
	}

	input[type="submit"]
	{
		border: none;
		outline: none;
		height: 40px;
		background: #2196f3;
		color: #fff;
		font-size: 18px;
		font-family:"Courier New",Monospace;
		border-radius: 20px;
		position: center;
		width: 50%;
		margin-bottom: 10px;
	}

	input[type="submit"]:hover
	{
		cursor: pointer;
		background: #0097a7;
	}
	select{
		border: none;
		outline: none;
		background: transparent;
		color: blue;
		font-family:"Times New Roman",Serif;
		font-size: 18px;
		border-radius: 10px;
		position: center;
	}
	select:hover{
		cursor: pointer;
		background: transparent;
	}

	a{
		text-decoration: none;
		font-size: 16px;
		line-height: 20px;
		color: #069818;
	}

	a:hover{
		color: red;
	}

}
</style>
<body>
	<div  class="box">
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
			<table style="text-align:left">
			<tr>
			<th>Account Type:</th>
				<td><input list="browsers" name="acctype">
  					<datalist id="browsers">
    				<option value="admin">
					<option value="user">
					</datalist>
    			</td>	
			</tr>
			<tr>
				<th>User ID:</th>
				<td><input type="text" name="uname" placeholder="Enter Username or ID" required=""></td>
			</tr>
			<tr>
				<th>Password:</th>
				<td><input type="password" name="pass" placeholder="Enter Password" required=""></td>
			</tr>
			<tr>
				<th>Date of Brith:</th>
				<td><input type="date" name="date" required=""></td>
			</tr>
			<tr>
				<th>Age:</th>
				<td><input type="number" name="age"required=""></td>
			</tr>
			<tr>
				<th>Father's Name:</th>
				<td><input type="text" name="fname" placeholder="Enter father's name" required=""></td>
			</tr>
			<tr>
				<th>Address:</th>
				<td><textarea type="text" rows=5  name="add" placeholder="Enter Address" required=""></textarea></td>
			</tr>
			<tr>
				<th>Aadhar number:</th>
				<td><input type="text" name="a-no" placeholder="Enter Aadhar number" required=""></td>
			</tr>
			<tr>
				<th>Contact:</th>
				<td><input type="text" name="contact" placeholder="Enter Contact-number" required=""></td>
			</tr>
			<tr>
				<th>State:</th>
				<td><input type="text" name="state" placeholder="Enter State" required=""></td>
			</tr>
			<tr>
				<th>Zip Code:</th>
				<td><input type="text" name="zip" placeholder="Enter Zip-code" required=""></td>		
			</tr>				
			</table>
			<p style="color:red"><?php echo $err; ?></p>
			<p style="color:green"><?php echo $err1; ?></p>
			<br>
			<input type="submit" name="submit" value="Register">
			<br>
			<a href="index.php">Goto Login</a>
		
		</form>
		
	</div>
</body>
</center>

</html>