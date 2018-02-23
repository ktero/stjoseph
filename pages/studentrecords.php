<?php
   require_once('../include/sessionstart.php');
?>

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

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Student Records</h1>
					<div style="float: right; margin: 10px;">
						<input type="text" name="search" placeholder="Search" style="border-radius: 4px; border: thin solid rgba(0,0,0,0.5); padding: 5px">
						<input type="submit" value="Search" style="border-radius: 4px; border: thin solid rgba(0,0,0,0.5); padding: 5px; background-color: #add9e7;">
					</div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            All Records
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id Number</th>
                                        <th>First Name</th>
										<th>Last Name</th>
                                        <th>Year & Section</th>
                                    </tr>
                                </thead>
                                <tbody>
									<?php
										$connection = mysqli_connect('localhost', 'root', '');
										mysqli_select_db($connection, $_SESSION['database']);

										$query = 'SELECT * FROM student';
										$result = mysqli_query($connection, $query);

										while($row = mysqli_fetch_row($result))
										{
									?>
											<tr>
												<td><a href="ledger.php?id=<?php echo $row[0]; ?>"><?php echo $row[0]; ?></a></td>
												<td><?php echo $row[2]; ?></td>
												<td><?php echo $row[1]; ?></td>
												<td><?php echo $row[6]; ?></td>
											</tr>
									<?php
										}
									?>
								</tbody>
                            </table>
                            <!-- /.table-responsive -->

                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>

    </div>
    <!-- /#wrapper -->

        <!-- Footer -->
        <footer class="text-center" style="bottom: 0; width: 100%; background-color: #fff; font-size: 10px">
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

    <!-- DataTables JavaScript -->
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>

</body>

</html>
