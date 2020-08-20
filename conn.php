<?php

$serverName='localhost';
$dbUser='root';
$dbPassword='';
$dbName='employee_system';    

$con=new mysqli($serverName,$dbUser,$dbPassword,$dbName);

if($con->connect_error)
{
   die($con->connect_error);
}

?>