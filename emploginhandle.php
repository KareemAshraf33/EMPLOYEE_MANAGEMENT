<?php
include 'validation.php';
include 'conn.php';

if(isset($_POST['login-submit']))
{
    $email=$_POST['email'];
    $password=$_POST['password']; 
    
    $username=modifyInput($email);
    $password=modifyInput($password);

   $isvalid=validateEmploginForm($email,$password);
    
    if(empty($email)||empty($password))
        {
          echo "Please fill is the blanks";
        }
    else
    {
       $query="select *FROM employees 
       WHERE email='$email' AND password ='$password'"; 
       $result=$con->query($query);
        
        if($row=$result->fetch_assoc())
        {
            $dbpassword=$row['password'];
            
            if($row['password']== $dbpassword)
            {
                header("Location: myTasks.php");
            }
            else
            {
                echo "incorrect password";
            }
        }
        else
        {
            echo "please check your email or your Password";
        }
    }
}


?>