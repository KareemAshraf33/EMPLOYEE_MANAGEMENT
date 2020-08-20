 <?php

$mysqli=new mysqli('localhost','root','','employee_system')or die(mysqli_error($mysqli));


if(isset($_GET['delete']))
{
    $id=$_GET['delete'];
    $mysqli->query("DELETE FROM tasks WHERE task_id=$id") or die($mysqli->error());
    header("location: allTasks.php");
}


if(isset($_GET['done']))
{
    $id=$_GET['done'];
    $mysqli->query("UPDATE tasks SET status ='completed' WHERE task_id=$id") or die($mysqli>error());
    header("location: myTasks.php");
    
}
if(isset($_GET['back']))
{
    $id=$_GET['back'];
    $mysqli->query("UPDATE tasks SET status ='in process' WHERE task_id=$id") or die($mysqli>error());
    header("location: myTasks.php");
    
}


?>