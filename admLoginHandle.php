<?php
include 'validation.php';
include 'conn.php';

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