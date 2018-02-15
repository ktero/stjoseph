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
    </div>
</header>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <!-- PHP -->
<?php

	require_once('connection.php');
    $cn = new connection();
    $conn = $cn->connectDB();

        
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
            <div data-role="footer" data-position="fixed" align="center">
                <p>St. Joseph High School</p>
                <p>Santiago St., Talakag, Bukidnon</p>
                <p>Project Team</p>
                <p>(Am`is, Bobadilla, Doutan, Jamero, Lapuz, Malaya, Palacios, Papa, Serra, Tabogga)</p>
                <p>Copyright &copy; 2017</p>
            </div>
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