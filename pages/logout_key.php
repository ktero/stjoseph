<?php
    session_start();
    require_once('connection.php');
    $cn   = new connection();
    $conn = $cn->connectDB('');
    $set = mysqli_query($conn, "SHOW DATABASES");
    $dbs = array();
    while($db = mysqli_fetch_row($set)){
      if(substr_compare($db[0], "sjhs", 0, 3) == 0)
        $dbs[] = $db[0];
    }
    foreach($dbs as $value):
    	exec("D:/xampp/mysql/bin/mysqldump -u root D:/xampp/htdocs/stjoseph/databasebackup/".$value." > D:/xampp/htdocs/stjoseph/databasebackup/".$value."_backup.sql");
    endforeach;
    session_destroy();
    header('Location: login.php');
?>
