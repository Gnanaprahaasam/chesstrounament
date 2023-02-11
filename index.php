<?php
session_start();
require("connection.php");

$err="";
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $uname=$_POST["user"];
    $pass=$_POST["pass"];
	
    $sql="SELECT * FROM login ";
    $result=mysqli_query($con,$sql);
   
    while($value=mysqli_fetch_array($result))
    {
		
		$acctype=$value["acctype"];
        if($value["user"]==$uname && $value["password"]==$pass && $acctype=="admin")
        {
            $_SESSION["admin"] = $uname;
            header("location:view.php");
            exit;
        }
		else if($value["user"]==$uname && $value["password"]==$pass && $acctype=="user")
        {
            $_SESSION["admin"] = $uname;
            header("location:Home.html");
            exit;
        }
        else 
        {        
            $err="Given feild name and password is invalid";
        }
    }

}
?>

<html>
<head>
    <title>Login Page</title>
	<!--<ul>
		<li><a href="Home.html">Home</a></li>
		<li><a href="About.html">About</a></li>
		<li><a href="Schedule.php">Schedule</a></li>
		<li><a href="admin.php">Admin</a></li>
		<li><a href="Contact.html">Contact</a></li>
	</ul>-->
</head>
<style>
	   body{
		background-image: url("chessicon.jpg");
    	background-size: cover;
    	
	}
	.box{
		background: transparent;
		color: midnightblue;
		top: 20%;
		left: 40%;
		width: 20%;
		position: absolute;  
		box-sizing: border-box;
		padding: 40px 30px;
	}
	tr:hover {background-color: #D6EEEE;}

	header{
		position: fixed;
		top: 0;
		left: 0;
		width: 100%;
		display: flex;
		justify-content: space-between;
		align-items: center;
		transtion:0.6s;
		padding: 40px 100px;
	}

	ul{
		position: relative;
		display: flex;
		justify-content: center;
		align-items: center;
	}
	li{
		position: relative;
		list-style: none;
	}
	a{
		position: relative;
		margin: 0 15px;
		color:#fff;
		letter-spacing: 2px;
		font-weight: 500px;
		transition: 0.6s;
	}

	input{
		width: 100%;
		margin-bottom: 10px;
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
		position: center;
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
</style>

<body>
<center>
<div class="box">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST" >
        <p>User ID: </p>
        <input type="text" name="user" placeholder="Enter Username or ID" required="">
		<p>Password: </p>
		<input type="password" name="pass" placeholder="Enter Password" required="">
		<!--<p>Account type: </p>
        <select  name="acctype" ><option>admin</option><option>user</option></select>-->
		<p style="color:red"><?php echo $err; ?></p>
		<input type="submit" name="submit" value="Login">
		<br><br>
			<a href="register.php">New to Register!</a>
	</form>
</div>
</center>
</body>
</html>
