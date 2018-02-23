<?php
    require_once('../include/sessionstart.php');
    require_once('connection.php');
    $cn = new connection();
    $conn = $cn->connectDB($_SESSION['database']);

    $edit_key = isset($_GET['studentedit_key']) ? mysqli_real_escape_string($conn, $_GET['studentedit_key']) : '';

    $query1 = "DELETE FROM receipt WHERE StudentID = '".$edit_key."'";
    mysqli_query($conn, $query1);

    if(mysqli_query($conn, $query1) == true) {
      $query2 = "DELETE FROM student_pay_fees WHERE StudentID='".$edit_key."'";
      mysqli_query($conn, $query2);

      if(mysqli_query($conn, $query2) == true) {
        $query3 = "DELETE FROM student WHERE StudentID='".$edit_key."'";
        mysqli_query($conn, $query3);
      } else {
        header('location: editrecords_student.php?resultedit_student=invalid');
      }
    } else {
      header('location: editrecords_student.php?resultedit_student=invalid');
    }

    $cn->closeDB();
    header('Location:resultedit_student.php?resultedit_student=successdelete');
?>
