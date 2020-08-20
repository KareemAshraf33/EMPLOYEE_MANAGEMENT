<?php

function modifyInput($data)
{
    $data= htmlspecialchars($data);
    $data= trim($data);
    $data= stripcslashes($data);
    return $data;
}

function validateEmploginForm($email,$password)
{
    $isValidData=true;
    
    if(!filter_var($email,FILTER_VALIDATE_EMAIL))
        {
            echo "this is wrong email format <br/>";
            $isValidData=false;
        }
    
    if(empty($password) || strlen($password)<8)
        {
            echo "this is wrong password format <br/>";
            $isValidData=false;
        }
   return $isValidData;
}

function validateAdminloginForm($email,$password)
{
    $isValidData=true;
    
    if(!filter_var($email,FILTER_VALIDATE_EMAIL))
        {
            echo "this is wrong email format <br/>";
            $isValidData=false;
        }
    
    if(empty($password) || strlen($password)<8)
        {
            echo "this is wrong password format <br/>";
            $isValidData=false;
        }
   return $isValidData;
}

function validateProfileForm($fname,$lname,$email,$password,$city,$gender,$phone)
{
    $isValidData=true;
    
    if(empty($fname))
        {
            echo "this is wrong name format <br/>";
            $isValidData=false;
        }
     if(empty($lname))
        {
            echo "this is wrong name format <br/>";
            $isValidData=false;
        }
    if(!filter_var($email,FILTER_VALIDATE_EMAIL))
        {
            echo "this is wrong email format <br/>";
            $isValidData=false;
        }
    if(empty($password) || strlen($password)<8)
        {
            echo "this is wrong password format <br/>";
            $isValidData=false;
        }
    if(empty($city))
        {
            echo "this is wrong format <br/>";
            $isValidData=false;
        }
    if(empty($gender))
        {
            echo "this is wrong format <br/>";
            $isValidData=false;
        }
     if(!filter_var($email,FILTER_VALIDATE_INT))
        {
            echo "this is wrong phone format <br/>";
            $isValidData=false;
        }
    
   return $isValidData;
}
        

?>