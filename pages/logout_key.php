<?php
    session_start();
    exec("C:/xampp/mysql/bin/mysqldump -u root ".$_SESSION['database']." > ".$_SESSION['database']."backup.sql");
    session_destroy();
    header('Location: login.php');
?>