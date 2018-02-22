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
        </div>
        <!-- /#wrapper -->

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Records: Student</h1>
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

                        <style type="text/css">
                            th {

                              font-size: 13px;
                            }
                        </style>

                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Id Number</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Middle Name</th>
                                        <th>Gender</th>
                                        <th>Address</th>
                                        <th>Year &amp; Section</th>
                                        <th>Date enrolled</th>
                                        <th>School Year</th>
                                        <!--
                                        <th>Section</th>
                                        <th>Year Level</th>
                                        <th>Balance</th>
                                        -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        require_once('connection.php');
                                        $cn   = new connection();
                                        $conn = $cn->connectDB();


										$query = 'SELECT * FROM student';
										$result = mysqli_query($conn, $query);

										while($row = mysqli_fetch_row($result))
										{
									?>
                                        <tr>
                                            <td>
                                                <?php echo $row[0]; ?>
                                            </td>
                                            <td>
                                                <?php echo $row[2]; ?>
                                            </td>
                                            <td>
                                                <?php echo $row[1]; ?>
                                            </td>
                                            <td>
                                                <?php echo $row[3]; ?>
                                            </td>
                                            <td>
                                                <?php echo $row[4]; ?>
                                            </td>
                                            <td>
                                                <?php echo $row[5]; ?>
                                            </td>
                                            <td>
                                                <?php echo $row[6]; ?>
                                            </td>
                                            <td>
                                                <?php echo $row[7]; ?>
                                            </td>
                                            <td>
                                                <?php echo $row[8]; ?>
                                            </td>
                                            
                                        </tr>
                                        <?php
										}
                                        $cn->closeDB();
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
        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>St. Joseph High School</p>
                    <p>Santiago St., Talakag, Bukidnon</p>
                    <p>Project Team</p>
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
