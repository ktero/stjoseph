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
                    <h1 class="page-header">Edit records</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Edit student profile</h4>
                            <p>Click edit to view more of the student's information</p>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Full Name</th>
                                        <th>Gender</th>
                                        <th>Year Level</th>
                                        <th>School Year</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                  <?php
                    require_once('connection.php');
                    $cn   = new connection();
                    $conn = $cn->connectDB($_SESSION['database']);


										$query = 'SELECT * FROM student';
										$result = mysqli_query($conn, $query) or die('Error: ' .mysqli_error($conn));

										while($row = mysqli_fetch_row($result))
										{
									?>
                                        <tr>
                                            <td>
                                                <?php echo $row[0]; ?>
                                            </td>
                                            <td>
                                                <?php echo $row[2] . ' ' . $row[3] . ' ' . $row[1]; ?>
                                            </td>
                                            <td>
                                                <?php echo $row[4]; ?>
                                            </td>
                                            <td>
                                                <?php
                                                  $q = "SELECT * FROM level WHERE Level_code='$row[6]'";
                                                  $r = mysqli_query($conn, $q) or die('Error query: ' . mysqli_error($conn));
                                                  if($rw = mysqli_fetch_row($r))
                                                    echo $rw[1] . ' - ' . $rw[2];
                                                ?>
                                            </td>
                                            <td>
                                                <?php echo $row[8]; ?>
                                            </td>
                                            <td>
                                                <a href='edit_student.php?studentedit_key=<?php echo $row[0]; ?>' class='btn btn-default' style='background-color: #69EC6B;'> Edit </a>
                                            </td>
                                            <td>
                                                <a href='delete_student.php?studentedit_key=<?php echo $row[0]; ?>' class='btn btn-default'  style='background-color: #EA6565;' onclick="return confirm('Are you sure you want to delete this record?');"> Delete </a>
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
