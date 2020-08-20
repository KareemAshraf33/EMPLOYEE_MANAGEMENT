<?php
include 'conn.php';

$task_id=$_GET['task_id'];

if(isset($_POST['assign']))
    {
    
    $emp_id=$_POST['eid'];
    $task_name=$_POST['pname'];
    $deadline=$_POST['duedate'];
    
    $query="UPDATE tasks SET 
    emp_id=$emp_id, 
    deadline='$deadline'
    WHERE task_id=$task_id";
    $result=$con->query($query);
    if ($con->query($query) === TRUE) {
      header('location: allTasks.php');
    } else {
      echo "Error updating record: " . $con->error;
    }
    
    
    }
    // get employee name and id
    $query3="SELECT name,id
    FROM employees"; 
    $result3=$con->query($query3);
    $row3=$result3->fetch_assoc(); 
// get all data from tasks
    $query4="select * FROM tasks where task_id=$task_id";
    $result4=$con->query($query4);
    $row4=$result4->fetch_assoc();  

?>









