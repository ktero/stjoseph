<?php
    
    require_once('connection.php');
    $cn = new connection();
    $conn = $cn->connectDB();
    
    $edit_key = isset($_GET['studentedit_key']) ? $_GET['studentedit_key'] : '';
    $query= "DELETE FROM student WHERE StudentID='".$edit_key."'";
    mysqli_query($conn, $query);

    $cn->closeDB();
    header('Location:editstudent.php');
?>