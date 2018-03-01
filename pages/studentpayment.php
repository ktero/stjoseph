<?php
   require_once('../include/sessionstart.php');
?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <?php require_once('../include/head.php'); ?>
    </head>

    <body style="overflow-x: hidden;">

        <div id="wrapper">

            <!-- Navigation -->
            <?php require_once('../include/navdiv-title.php'); ?>
        </div>
        <!-- /#wrapper -->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add Student Payment</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          <h4>Student Payment</h4>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                          <div class="row">
                              <?php
                                require_once('connection.php');
                                $cn = new connection();
                                $conn = $cn->connectDB($_SESSION['database']);
                                $getID = isset($_GET['id']) ? mysqli_real_escape_string($conn, $_GET['id']) : '';
                              ?>
                              <div class="col-lg-6">
                                <form action= "addpayment.php" method= "post">
                                    <div class="form-group">
                                        <label>Student ID</label>
                                        <input class="form-control" name="StudentID" value='<?php if($getID != '') { echo $getID; } ?>'  required data-validation-required-message>
                                        <p class="help-block"></p>
                                    </div>
                <div class="form-group">
                                        <label>Official Receipt Number</label>
                                        <input class="form-control" name="ORNo" required data-validation-required-message>
                                        <p class="help-block"></p>
                </div>
                <div class="form-group">
                                        <label>Fees</label><br />
                                        <select name="code" style="padding: 5px; cursor: pointer;">
                                        <option disabled="disabled" selected="selected">Choose Code</option>
                                          <?php
                                            $query= "SELECT * from fees";
                                            $result= mysqli_query($conn, $query) or die ("Not Found: ". mysqli_error($conn));

                                            while ($row= mysqli_fetch_row($result)) {

                                                $desc = $row[1];
                                                $code = $row[0];

                                              echo "<option value='$code'> $desc </option>";
                                            }
                                            $cn->closeDB();
                                          ?>
                                        </select>
                                        <p class="help-block"></p>
                </div>
                <div class="form-group">
                                        <label>Amount</label>
                                        <input class="form-control" name="amount">
                                        <p class="help-block"></p>
                </div>
                <!-- Submit Button -->
                <button type="submit" style ="background-color:lightblue" name="submit" class="btn btn-default" value="submit">Submit</button>
              </form>
                              </div>
                              <!-- /.col-lg-6 (nested) -->
                          </div>
                          <!-- /.row (nested) -->
                      </div>
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
