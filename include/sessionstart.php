<?php
    /*
      CSLP Project: St. Joseph High School of Talakag Profiling and Financial System.
      Brief Description: A small profiling and financial system that track student records and transactions.

      Developers:
      - Jamrod Buat
      - Philip Endiape
      - Marvin Fuentes
      - Justine Fumar
      - Kenneth Tero

      Project started: January 24, 2018
      Project ended: March 9, 2018

      Copyright © 2017-2018 All rights reserved.
     */
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
