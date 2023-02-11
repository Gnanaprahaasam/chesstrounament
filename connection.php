<?php

$db="localhost";
$user="root";
$pass="";
$db_name="admin";

$con=new mysqli($db,$user,$pass,$db_name);
if($con->connect_error)
{
    die("Connection failed: " . $con->connect_error);
}


?>