<?php
    require_once('../include/sessionstart.php');
    require_once('connection.php');
    $cn = new connection();
    $conn = $cn->connectDB();

    // Declare variables for data relocation
    $id = 1;
    $edit_key = isset($_GET['schoolyear']) ? mysqli_real_escape_string($conn, $_GET['schoolyear']) : '';

    $query1 = "UPDATE student SET School_Year = '$id' WHERE School_Year = '$edit_key'";
    $query2 = "DELETE FROM school_year WHERE ID = '".$edit_key."'";

    if(mysqli_query($conn, $query1) == true && mysqli_query($conn, $query2) == true) {
      header('Location:editrecords_class.php?result=record_deleted');
    } else {
      die('Error query: ' .mysqli_error($conn));
    }
    $cn->closeDB();
?>
