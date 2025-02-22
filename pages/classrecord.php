<?php
require_once('../include/system-description.php');
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
            <?php
                require_once('connection.php');
                $cn   = new connection();
                $conn = $cn->connectDB();

                $edit_key = isset($_GET['id']) ? mysqli_real_escape_string($conn, $_GET['id']) : '';
             ?>
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
                              <?php
                                  $query = "SELECT * FROM level WHERE Level_code = '$edit_key'";
                                  $result = mysqli_query($conn, $query) or die('Error: ' .mysqli_error($conn));
                                  while ($row = mysqli_fetch_row($result))
                                    echo "Class record of " .$row[1]. " - " . $row[2];
                              ?>
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Id Number</th>
                                            <th>First Name</th>
                                            <th>Middle Name</th>
                                            <th>Last Name</th>
                                            <!--
                                            <th>Section</th>
                                            <th>Year Level</th>
                                            <th>Balance</th>
                                            -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                          $query = "SELECT * FROM student WHERE Level_code = '$edit_key'";
                                          $result = mysqli_query($conn, $query) or die('Error: ' .mysqli_error($conn));
                                          while ($row = mysqli_fetch_row($result)) {
                    									?>
                                              <tr>
                                                  <td>
                                                      <a href="student_ledger.php?id=<?php echo $row[0]; ?>&level=<?php echo $row[6]; ?>&schoolyear=<?php echo $row[8]; ?>">
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
                        <tfoot>
                          <tr>
                            <td valign="bottom" align="right">
                              <a href="adminrecords.php" id="someButton" class="btn btn-default pull-right" align="right">
                               Back
                             </a>
                            </td>
                          </tr>
                        </tfoot>
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
