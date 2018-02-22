<?php
	require_once('../include/sessionstart.php');
    $edit_key= $_GET['studentedit_key'];
    $connection= mysql_connection('localhost','root','');
    mysqli_select_db($connection,$_SESSION['database']);

    $query= "SELECT * FROM student where StudentID=" .$row[0];

    $result= mysqli_query($query);
    mysqli_close($connection);
?>