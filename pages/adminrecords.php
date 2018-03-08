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
        </div>
        <!-- /#wrapper -->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Level and Student Records</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          <h4>Student Records</h4>
                          <p>Click on the student's ID number to see their financial transactions and current balance.</p>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>ID Number</th>
                                        <th>First Name</th>
                                        <th>Middle Name</th>
                                        <th>Last Name</th>
                                        <th>Gender</th>
                                        <th>Year &amp; Section</th>
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
                                                <a href="student_ledger.php?id=<?php echo $row[0]; ?>&schoolyear=<?php echo $row[8]; ?>">
                                                    <?php echo $row[0]; ?>
                                                </a>
                                            </td>
                                            <td>
                                                <?php echo $row[2]; ?>
                                            </td>
                                            <td>
                                               <?php echo $row[3]; ?>
                                            </td>
                                            <td>
                                                <?php echo $row[1]; ?>
                                            </td>
                                            <td>
                                              <?php echo $row[4]; ?>
                                            </td>
                                            <td>
                                                <?php
                                                      $ys = "SELECT * FROM level WHERE Level_code = '$row[6]'";
                                                      $getYS = mysqli_query($conn, $ys) or die('Error:' .mysqli_error($conn));
                                                      while ($r = mysqli_fetch_row($getYS))
                                                         echo $r[1] . " - " . $r[2];
                                                ?>
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
            <!-- delete -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          <h4>Year Level Records</h4>
                          <p>Click on the year Level's code to see the students enrolled in that level.</p>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Level code</th>
                                        <th>Year level</th>
                                        <th>Section</th>
                                        <th>Number of Students enrolled</th>
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
                    $con   = new connection();
                    $conn = $con->connectDB();

                    $query = 'SELECT * FROM level';
										$result = mysqli_query($conn, $query);

										while($row = mysqli_fetch_row($result))
										{
									?>
                                        <tr>
                                            <td>
                                                <a href="classrecord.php?id=<?php echo $row[0]; ?>">
                                                    <?php echo $row[0]; ?>
                                                </a>
                                            </td>
                                            <td>
                                                <?php echo $row[1] ?>
                                            </td>
                                            <td>
                                                <?php echo $row[2] ?>
                                            </td>
                                            <td>
                                              <?php
                                                  $count = "SELECT COUNT(student.Level_code) FROM student WHERE student.Level_code = '$row[0]'";
                                                  $cres = mysqli_query($conn, $count) or die('Error: ' .mysqli_error($conn));
                                                  while ($re = mysqli_fetch_row($cres))
                                                     echo $re[0];
                                               ?>
                                            </td>
                                        </tr>
                                        <?php
										}
                                        $con->closeDB();
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
            <!-- until here -->
        </div>
        <!-- /#wrapper -->
        <hr>

        <!-- Footer -->
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
