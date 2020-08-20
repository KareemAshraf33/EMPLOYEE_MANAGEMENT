 <?php
session_start();
session_destroy();
//echo "you are logged out <br/>";
header('Location: index.php');
?>