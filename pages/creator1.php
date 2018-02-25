<?php
require_once('../include/sessionstart2.php');
require_once('connection.php');
    $cn   = new connection();
    $conn = $cn->connectDB('');
    if(isset($_POST['submit']))
    {
        if(isset($_POST['dname']))
        {
            $dname = $_POST['dname'];
            $temp = $_POST['input'];
            if(mysqli_query($conn,"CREATE DATABASE ".$dname) == TRUE)
            {
                exec("D:/xampp/mysql/bin/mysqldump -u root ".$temp." > temp.sql");
                exec("D:/xampp/mysql/bin/mysql -u root ".$dname." < temp.sql");
                $conn = $cn->connectDB($dname);
                mysqli_query($conn,"DELETE FROM student_pay_fees");
                mysqli_query($conn,"DELETE FROM receipt");
                session_destroy();
                header('Location: login.php?=createSuccess');
            }
        }
    }
    header('Location: creator.php?=creationFailed');
?>
