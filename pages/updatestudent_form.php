<?php
   require_once('../include/sessionstart.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once('../include/head.php'); ?>
</head>

<header style="padding: 0; margin: 0;">
    <div id="wrapper">
        <?php require_once('../include/navdiv-title.php'); ?>
    </div>
</header>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <!-- PHP -->
<?php

	require_once('connection.php');
    $cn = new connection();
    $conn = $cn->connectDB($_SESSION['database']);


	$orig_sid = isset($_POST['orig_sid']) ? mysqli_real_escape_string($conn, $_POST['orig_sid']) : '';

    $sid = isset($_POST['sid']) ? mysqli_real_escape_string($conn, $_POST['sid']) : '';

    $lname = isset($_POST['lname']) ? mysqli_real_escape_string($conn, $_POST['lname']) : '';

	$fname = isset($_POST['fname']) ? mysqli_real_escape_string($conn, $_POST['fname']) : '';

	$mname = isset($_POST['mname']) ? mysqli_real_escape_string($conn, $_POST['mname']) : '';

	$gender = isset($_POST['gender']) ? mysqli_real_escape_string($conn, $_POST['gender']) : '';

	$addr = isset($_POST['addr']) ? mysqli_real_escape_string($conn, $_POST['addr']) : '';

	$code = isset($_POST['code']) ? mysqli_real_escape_string($conn, $_POST['code']) : '';

	$denrolled = isset($_POST['denrolled']) ? mysqli_real_escape_string($conn, $_POST['denrolled']) : '';

	$sy = isset($_POST['sy']) ? mysqli_real_escape_string($conn, $_POST['sy']) : '';


	$query = "UPDATE student SET StudentID='$sid', Lname='$lname', Fname='$fname', Mname='$mname', Gender='$gender', Address='$addr', Level_code='$code', Date_enrolled='$denrolled', School_Year='$sy' WHERE StudentID=$orig_sid";

	mysqli_query($conn, $query) or die ("Error query: " . mysqli_error($conn));
	$cn->closeDB();
?>
            <!-- Confirmation Message -->
            <div id="page-wrapper" align="Center" style="padding:100px">
                <h1> Successfully Updated </h1>
                <a href='resultedit_student.php' class="btn btn-default" role="button" style="background-color: lightblue; text-align: right"> Update New Student</a>
            </div>
            <!-- Footer -->
            <hr>
            <footer>
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
    </div>
</body>

</html>
