<?php
    session_start();
    // Session validation
    if(!isset($_SESSION['database']))
        header('Location: switcher.php');
    else
    	$user = $_SESSION['username'];
?>
