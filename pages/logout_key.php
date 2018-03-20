<?php
    session_start();
    require_once('connection.php');
    $cn   = new connection();
    $conn = $cn->connectDB();
    
    $dbName = $cn->getDatabaseName(); // Retrive database name
    exec("D:/xampp/mysql/bin/mysqldump -u root ".$dbName." > D:/xampp/htdocs/stjoseph/databasebackup/".$dbName."_backup.sql");

    session_destroy();
    header('Location: login.php');
?>
