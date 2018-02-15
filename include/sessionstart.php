<?php
    session_start();
    // Session validation
    if(!isset($_SESSION['fname']))
        header('Location: login.php');
    else
        $name = $_SESSION['fname'];
?>