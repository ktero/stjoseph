<?php
    session_start();
    // Session validation
    if(isset($_SESSION['username'])) {
      $user = $_SESSION['username'];
      $dbname = 'sjhs1819';

      $timeNow = time(); // Check time now.
      if($timeNow > $_SESSION['expire']) {
        session_destroy();
        header('Location: login.php?cmd=session-expired');
      }
    } else {
      header('Location: login.php?cmd=please-login');
    }
?>
