<?php
	session_start();
	    if(isset($_POST['input'])){
            $_SESSION['database']=$_POST['input'];
            header('Location: ../pages/index.php');
        }
        else
        	header('Location: ../pages/switcher.php');
?>