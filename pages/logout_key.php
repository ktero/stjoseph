<?php
    session_start();
    require_once('connection.php');
    $cn   = new connection();
    $conn = $cn->connectDB();

    $dbName = $cn->getDatabaseName(); // Retrive database name
    exec("C:/xampp/mysql/bin/mysqldump -u root ".$dbName." > C:/xampp/htdocs/stjoseph/databasebackup/".$dbName."_backup.sql");

    session_destroy();
    header('Location: login.php');
?>
