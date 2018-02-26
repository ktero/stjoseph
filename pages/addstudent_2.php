<?php
   require_once('../include/sessionstart.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once('../include/head.php'); ?>
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php require_once('../include/navdiv-title.php'); ?>
	<!-- PHP -->
	<?php

    require_once('connection.php');
    $cn = new connection();
    $conn = $cn->connectDB($_SESSION['database']);


	$StudentID = isset($_POST['StudentID']) ? mysqli_real_escape_string($conn, $_POST['StudentID']) : '';

	$Lname = isset($_POST['Lname']) ? mysqli_real_escape_string($conn, $_POST['Lname']) : '';

	$Fname = isset($_POST['Fname']) ? mysqli_real_escape_string($conn, $_POST['Fname']) : '';

	$Mname = isset($_POST['Mname']) ? mysqli_real_escape_string($conn, $_POST['Mname']) : '';

	$Gender = isset($_POST['gender']) ? mysqli_real_escape_string($conn, $_POST['gender']) : '';

	$Address = isset($_POST['Address']) ? mysqli_real_escape_string($conn, $_POST['Address']) : '';

	$code = isset($_POST['code']) ? mysqli_real_escape_string($conn, $_POST['code']) : '';

	$Date = isset($_POST['enrolled']) ? mysqli_real_escape_string($conn, $_POST['enrolled']) : '';

	$SY = isset($_POST['SY']) ? mysqli_real_escape_string($conn, $_POST['SY']) : '';

  // Validate data
	if($StudentID == '' || $Lname == '' || $Fname == '' || $Mname == '' || $Gender == '' || $Address == '' || $code == '' || $Date == '' || $SY == '')
		echo '<meta http-equiv="refresh" content="0;url=addstudent.php" />';
	else if(isset($StudentID, $Lname, $Fname, $Mname, $Gender, $Address, $code, $Date, $SY))
	{
    // Upload data into database
		$query= "INSERT into student values('$StudentID','$Lname','$Fname','$Mname','$Gender','$Address','$code','$Date','$SY')";
		$result= mysqli_query($conn, $query);

		$cn->closeDB();
	}
	?>
	<!-- End PHP -->

	<!-- Confirmation Message -->
	<div id="page-wrapper" align="Center" style="padding-top: 100px">
	<h1> Successfully Added </h1>
	<a href='addstudent.php' class="btn btn-default" role="button" style="background-color: lightblue; text-align: right"> Add New </a>

  <a href='adminrecords.php' class="btn btn-default" role="button" style="background-color: lightblue; text-align: right"> View Level and Student Records  </a>
	</div>

	 <!-- Footer -->
        <footer class="text-center" style="position: fixed; bottom: 0; width: 100%; background-color: #fff; font-size: 10px">
            <div class="row">
                <?php require_once('../include/footer.php'); ?>
            </div>
        </footer>
	<!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
