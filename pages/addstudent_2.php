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
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a> <img src="sjhs.png" style="width:40px;height:40px;"> </a> <a href="index.php">St. Joseph High School</a>
            </div>
            <!-- /.navbar-header -->
            <?php require_once('../include/account-section.php'); ?>
            <!-- /.navbar-top-links -->
            <?php require_once('../include/side-bar-options.php'); ?>
            <!-- /.navbar-static-side -->
        </nav>
	<!-- PHP -->
	<?php

    require_once('connection.php');
    $cn = new connection();
    $conn = $cn->connectDB();


	$StudentID = isset($_POST['StudentID']) ? mysqli_real_escape_string($conn, $_POST['StudentID']) : '';

	$Lname = isset($_POST['Lname']) ? mysqli_real_escape_string($conn, $_POST['Lname']) : '';

	$Fname = isset($_POST['Fname']) ? mysqli_real_escape_string($conn, $_POST['Fname']) : '';

	$Mname = isset($_POST['Mname']) ? mysqli_real_escape_string($conn, $_POST['Mname']) : '';

	$Gender = isset($_POST['gender']) ? mysqli_real_escape_string($conn, $_POST['gender']) : '';

	$Address = isset($_POST['Address']) ? mysqli_real_escape_string($conn, $_POST['Address']) : '';

	$code = isset($_POST['code']) ? mysqli_real_escape_string($conn, $_POST['code']) : '';

	$Date = isset($_POST['enrolled']) ? mysqli_real_escape_string($conn, $_POST['enrolled']) : '';

	$SY = isset($_POST['SY']) ? mysqli_real_escape_string($conn, $_POST['SY']) : '';

	if($StudentID == '' || $Lname == '' || $Fname == '' || $Mname == '' || $Gender == '' || $Address == '' || $code == '' || $Date == '' || $SY == '')
		echo '<meta http-equiv="refresh" content="0;url=addstudent.php" />';

	else if(isset($StudentID, $Lname, $Fname, $Mname, $Gender, $Address, $code, $Date, $SY))
	{
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
