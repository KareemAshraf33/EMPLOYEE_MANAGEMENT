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

if(isset($_POST['login-submit']))
{
    $email=$_POST['adminemail'];
    $password=$_POST['adminpassword']; 
    
    $username=modifyInput($email);
    $password=modifyInput($password);

   $isvalid=validateEmploginForm($email,$password);
    
    if(empty($email)||empty($password))
        {
          echo "Please fill is the blanks";
        }
    else
    {
       $query="SELECT *FROM admins 
       WHERE email='$email' AND password ='$password'"; 
       $result=$con->query($query);
        
        if($row=$result->fetch_assoc())
        {
            $dbpassword=$row['password'];
            
            if($row['password']== $dbpassword)
            {
                header("Location: allTasks.php");
            }
            else
            {
                echo "incorrect password";
            }
        }
        else
        {
            echo "please check your email";
        }
    }
}


?>