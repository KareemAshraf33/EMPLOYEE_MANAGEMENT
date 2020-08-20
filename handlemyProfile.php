<?php
include 'validation.php';
$serverName='localhost';
$dbUser='root';
$dbPassword='';
$dbName='employee_system';    

$con=new mysqli($serverName,$dbUser,$dbPassword,$dbName);

if($con->connect_error)
{
   die($con->connect_error);
}

if(isset($_POST['send']))
{
    $fname=$_POST['firstName'];
    $lname=$_POST['lastName'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $city=$_POST['city'];
    $gender=$_POST['gender'];
    $phone=$_POST['phone'];
    $query="UPDATE employees SET name='$fname',email='$email',password='$password',phone='$phone',city='$city',gender='$gend' WHERE id =$id";
    $con->query($query);
    header("Location: myProfile.php");
}

$fname=modifyInput($fname);
$lname=modifyInput($lname);
$email=modifyInput($email);
$password=modifyInput($password);
$city=modifyInput($city);
$gender=modifyInput($gender);
$phone=modifyInput($phone);

$isvalid=validateloginForm($fname,$lname,$email,$password,$city,$gender,$phone);
if($isvalid){
    
    $query="";
    $con->query($query);
}



?>