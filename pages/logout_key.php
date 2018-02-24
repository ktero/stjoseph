<?php
    session_start();
    require_once('connection.php');
    $cn   = new connection();
    $conn = $cn->connectDB('');
    $set = mysqli_query($conn, "SHOW DATABASES");
    $dbs = array();
    $i = 0;
    while($db = mysqli_fetch_row($set)){
    	$i++;
    	if($i > 4)
        {
    	    $dbs[] = $db[0];
        }
    }
    foreach($dbs as $value):
    	exec("C:/xampp/mysql/bin/mysqldump -u root ".$value." > ".$value."backup.sql");
    endforeach;
    session_destroy();
    header('Location: login.php');
?>
