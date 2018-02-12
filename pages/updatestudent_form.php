<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once('../include/head.php') ?>
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

          <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                          <li>
                            <a href="#">Admin Records<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">   
                           <li>
                                    <a href="#">Student<span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                    <a href="addstudent.php">Add Records</a>
                                </li>
                                <li>
                                    <a href="editstudent.php">Edit Records</a>
                                </li>
								</ul>
								
								
								 <!-- /.nav-third-level -->
								
								<li>
                                    <a href="#">Assessment<span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
									 <li>
                                    <a href="addassessment.php">Add Records</a>
                                </li>
								  <li>
                                    <a href="editassessment2.php">Edit Records</a>
                                </li>
														
								</ul>
								</li>
														
								<!-- /.nav-third-level -->
								</li>
									 </ul>
								 <!-- /.nav-second-level -->
						<li>
                            <a href="#">Student Records<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                               <li>
                                    <a href="home.php">All Students</a>
                                </li>
								<li>
                                    
									</li>
									<li>
                                    
									</li>
								
                            </ul>
							   </li>
                            <!-- /.nav-second-level -->
                        <li>
                            <a href="#">Financial Transactions<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
									<li>
                                    <a href="formpayment.php">Student Payment</a>
                                </li>
								<li>
                                    <a href="Assessment.php">Assessment</a>
									</li>
								
                            </ul>
							</li>
                            <!-- /.nav-second-level -->

                        
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
	</div>
</header>

<body>

    <div id="wrapper">

        <!-- Navigation -->
	<!-- PHP -->
<?php

	$connection = mysqli_connect('localhost','root','');
	mysqli_select_db($connection,'sjhs');

	
	$orig_sid = isset($_POST['orig_sid']) ? $_POST['orig_sid'] : '';
	$sid = isset($_POST['sid']) ? $_POST['sid'] : '';
	$lname = isset($_POST['lname']) ? $_POST['lname'] : '';
	$fname = isset($_POST['fname']) ? $_POST['fname'] : '';
	$mname = isset($_POST['mname']) ? $_POST['mname'] : '';
	$gender = isset($_POST['gender']) ? $_POST['gender'] : '';
	$addr = isset($_POST['addr']) ? $_POST['addr'] : '';
	$code = isset($_POST['code']) ? $_POST['code'] : '';
	$denrolled = isset($_POST['denrolled']) ? $_POST['denrolled'] : '';
	$sy = isset($_POST['sy']) ? $_POST['sy'] : '';


	$query = "UPDATE student SET StudentID='$sid', Lname='$lname', Fname='$fname', Mname='$mname', Gender='$gender', Address='$addr', Level_code='$code', Date_enrolled='$denrolled', School_Year='$sy' WHERE StudentID=$orig_sid";
	
	mysqli_query($connection, $query) or die ("Error query: " . mysqli_error($connection));
	mysqli_close($connection);
?>
<!-- Confirmation Message -->
	<div id="page-wrapper" align="Center" style="padding:100px">
	<h1> Successfully Updated </h1>
	<a href='editstudent.php' class="btn btn-default" role="button" style="background-color: lightblue; text-align: right"> Update New Student</a>
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

</body>

</html>
