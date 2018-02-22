<?php
    session_start();
    // Session validation
    if(!isset($_SESSION['username']))
    {
        header('Location: login.php');
    }
    else
    	$_SESSION['database'] = NULL;
?>
