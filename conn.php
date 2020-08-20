<?php

$serverName='localhost';
$dbUser='id14660058_root';
$dbPassword='01120640612Ak$';
$dbName='id14660058_employee_system';    

$con=new mysqli($serverName,$dbUser,$dbPassword,$dbName);

if($con->connect_error)
{
   die($con->connect_error);
}

?>