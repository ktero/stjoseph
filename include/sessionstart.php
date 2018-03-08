<?php
    session_start();
    // Session validation
    if(!isset($_SESSION['username']))
        header('Location: login.php?cmd=please-login');
    else {
    	$user = $_SESSION['username'];
      $dbname = 'sjhs1819';
    }

    /*
    if(!isset($_SESSION['database']))
        header('Location: switcher.php');
    else {
     $user = $_SESSION['username'];
      $dbname = $_SESSION['database'];
    }
     */
?>
