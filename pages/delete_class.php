<?php
    require_once('connection.php');
    $cn = new connection();
    $conn = $cn->connectDB();

    $edit_key = isset($_GET['levelcode']) ? mysqli_real_escape_string($conn, $_GET['levelcode']) : '';

    $query = "DELETE FROM level WHERE Level_code = '".$edit_key."'";
    mysqli_query($conn, $query) or die('Error: ' . mysqli_error($conn));

    $cn->closeDB();
    header('Location:editrecords_class.php?editrecords_class=successdelete');
?>
