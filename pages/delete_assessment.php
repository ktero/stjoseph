<?php

    require_once('connection.php');
    $cn = new connection();
    $conn = $cn->connectDB();

    $edit_key = isset($_GET['feecode']) ? $_GET['feecode'] : '';
    $query= "DELETE FROM fees WHERE Fee_code='".$edit_key."'";
    mysqli_query($conn, $query);

    $cn->closeDB();
    header('Location:editrecords_assessment.php');
?>
