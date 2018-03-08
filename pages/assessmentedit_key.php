<?php
require_once('../include/sessionstart.php');
$edit_key= $_GET['assessmentedit_key'];

require_once('connection.php');
$cn = new connection();
$conn = $cn->connectDB();

$query= "SELECT * FROM fees where Fee_code=" .$row[0];

$result= mysqli_query($conn, $query);
mysqli_close($conn);
?>
