<?php
    session_start();
    session_destroy();
    exec("C:/xampp/mysql/bin/mysqldump -u root sjhs > sjhsbackup.sql");
    header('Location: login.php');
?>