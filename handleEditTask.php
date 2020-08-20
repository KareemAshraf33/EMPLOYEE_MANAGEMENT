<?php
include 'conn.php';

$task_id=$_GET['task_id'];

if(isset($_POST['Edit']))
    {
    
    $emp_id=$_POST['emp_id'];
    $task_name=$_POST['task_name'];
    $description=$_POST['desc'];
    $status=$_POST['status'];
    $deadline=$_POST['deadline'];
    
    $query3="UPDATE tasks SET 
    emp_id=$emp_id, 
    task_name='$task_name',
    description='$description',
    status='$status',
    deadline='$deadline'
    WHERE task_id=$task_id";
    $result3=$con->query($query3);
    if ($con->query($query3) === TRUE) {
      header('location: allTasks.php');
    } else {
      echo "Error updating record: " . $con->error;
    }
    
    
    }

     $query="SELECT admin_name
     FROM admins"; 
     $result=$con->query($query);
     $row=$result->fetch_assoc();
   
       // select tasks data
         $query2="SELECT * FROM tasks WHERE task_id=$task_id"; 
         $result2=$con->query($query2);
         $row2=$result2->fetch_assoc();

    // get employee name
          $query="SELECT name,id
              FROM employees"; 
          $result=$con->query($query);
    // get all data from tasks
       $query4="select * FROM tasks where task_id=$task_id";
       $result4=$con->query($query4);
       $row4=$result4->fetch_assoc();            
   

?>