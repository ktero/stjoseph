<?php
    require_once('../include/sessionstart.php');
    require_once('connection.php');
    $cn = new connection();
    $conn = $cn->connectDB($_SESSION['database']);

    // Declare variables for data relocation
    $code = 'G0a';
    $edit_key = isset($_GET['levelcode']) ? mysqli_real_escape_string($conn, $_GET['levelcode']) : '';
    $query1 = "DELETE FROM level WHERE Level_code = '".$edit_key."'";

    if(mysqli_query($conn, $query1) == true) {
      header('Location:editrecords_class.php?result=record_deleted');
    } else {
      $query2 = "UPDATE student SET Level_code = '$code' WHERE Level_code = '$edit_key'";
      if(mysqli_query($conn, $query2) == true) {

        $query3 = "DELETE FROM level WHERE Level_code = '".$edit_key."'";
        if(mysqli_query($conn, $query3) == true) {
          header('Location:editrecords_class.php?result=record_deleted');
        } else
          header('Location:editrecords_class.php?result=invalid_action_2');
      } else
        header('Location:editrecords_class.php?result=invalid_action_1');
    }

    $cn->closeDB();
?>
