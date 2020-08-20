<?php
include 'conn.php';
    
if(isset($_POST['add']))
{
        $emp_id=$_POST['emp_id'];
        $task_name=$_POST['task_name'];
        $desc=$_POST['desc'];
        $status=$_POST['status'];
        $deadline=$_POST['deadline'];
        $query="INSERT INTO tasks(emp_id,task_name,description,status,deadline) values($emp_id,'$task_name','$desc','$status','$deadline')";

        if($con->query($query)==true)
        {
            echo "inserted successfully <br/>";
        }else
        {
         die($con->error);
        }
}
    
?>