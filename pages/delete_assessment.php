<?php
    
    require_once('connection.php');
    $cn = new connection();
    $conn = $cn->connectDB($_SESSION['database']);
    
    $edit_key = isset($_GET['Fee_code']) ? $_GET['studentedit_key'] : '';
    $query= "DELETE FROM fees WHERE Fee_code='".$edit_key."'";
    mysqli_query($conn, $query);

    $cn->closeDB();
    header('Location:resultedit_assessment.php');
?>