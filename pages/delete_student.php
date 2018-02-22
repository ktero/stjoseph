<?php

    require_once('connection.php');
    $cn = new connection();
    $conn = $cn->connectDB($_SESSION['database']);

    $edit_key = isset($_GET['studentedit_key']) ? mysqli_real_escape_string($conn, $_GET['studentedit_key']) : '';

    $query1 = "DELETE FROM student_pay_fees WHERE StudentID = '".$edit_key."'";
    mysqli_query($conn, $query1);

    if(mysqli_query($conn, $query1) == true) {
      $query2 = "DELETE FROM student WHERE StudentID='".$edit_key."'";
      mysqli_query($conn, $query2);
    } else {
      header('location: resultedit_student.php?resultedit_student=invalid');
    }

    $cn->closeDB();
    header('Location:resultedit_student.php?resultedit_student=successdelete');
?>
