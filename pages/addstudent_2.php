<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once('../include/head.php') ?>
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

            <ul class="nav navbar-top-links navbar-right">
               
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                       
                        <li><a href="adminlogin.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

          <?php require_once('../include/side-bar-options.php'); ?>
            <!-- /.navbar-static-side -->
        </nav>
	<!-- PHP -->
	<?php
        
    require_once('connection.php');
    $cn = new connection();
    $conn = $cn->connectDB();
    
	$StudentID = isset($_POST['StudentID']) ? $_POST['StudentID'] : '';
	$Lname = isset($_POST['Lname']) ? $_POST['Lname'] : '';
	$Fname = isset($_POST['Fname']) ? $_POST['Fname'] : '';
	$Mname = isset($_POST['Mname']) ? $_POST['Mname'] : '';
	$Gender = isset($_POST['gender']) ? $_POST['gender'] : '';
	$Address = isset($_POST['Address']) ? $_POST['Address'] : '';
	$code = isset($_POST['code']) ? $_POST['code'] : '';
	$Date = isset($_POST['enrolled']) ? $_POST['enrolled'] : '';
	$SY = isset($_POST['SY']) ? $_POST['SY'] : '';

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
                <div class="text-center">
					<hr>
                    <p>St. Joseph High School</p>
					<p>Santiago St., Talakag, Bukidnon</p>
					<p>Project Team: (Am`is, Bobadilla, Doutan, Jamero, Lapuz, Malaya, Palacios, Papa, Serra, Tabboga)</p>
					<p>Copyright &copy; 2017</p>
                </div>
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
