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
                    <h1 class="page-header">Monthly Report</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          <h4>Current Monthly Report</h4>
                          <p>Choose a school year for the monthly report and it will automatically generate using the current month and year as reference. This report may not be the same as the original monthly report but it can serve as a guide if ever you decide to stick with the original format.</p>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                          <div class="row">
                              <div class="col-lg-6">
                                  <form name= "input" action= "addreport.php" method= "post">
                                    <input type="hidden" class="form-control" name="month" value="<?php echo date('n'); ?>">
                                    <input type="hidden" class="form-control" name="year" value="<?php echo date('Y'); ?>">
                                    <div class="form-group">
                                      <label>School Year</label><br />
                                      <select name="schoolyear" style="padding: 5px; cursor: pointer; width: 50%;" required data-validation-required-message>
                                        <option selected='true' disabled>
                                          Choose school year
                                        </option>
                                        <?php
                                          require_once('connection.php');
                                          $cn = new connection();
                                          $conn = $cn->connectDB($_SESSION['database']);

                                          $SyQuery = "SELECT * FROM school_year";
                                          $SyResult = mysqli_query($conn, $SyQuery) or die('Error: ' .mysqli_error($conn));
                                          while($getSY = mysqli_fetch_row($SyResult)) {
                                            if($getSY[0] != 1)
                                              echo "<option value='$getSY[0]'>$getSY[1]</option>";
                                          }
                                        ?>
                                      </select>
                                    </div>
                                    <!-- Submit Button -->
                                    <button type="submit" style ="background-color:lightblue" class="btn btn-default" value="submit">Generate report</button>
                                  </form>
                              </div>
                              <!-- /.col-lg-6 (nested) -->
                          </div>
                          <!-- /.row (nested) -->
                      </div>
                            <!-- /.table-responsive -->
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                              <h4>Search for a Monthly Report</h4>
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                              <div class="row">
                                  <div class="col-lg-6">
                                      <form name= "input" action= "addreport.php" method= "post">
                                        <!-- <input type="hidden" class="form-control" name="year" value="<?php // echo date('Y'); ?>"> -->
                                        <div class="form-group">
                                          <label>School Year</label><br />
                                          <select name="schoolyear" style="padding: 5px; cursor: pointer; width: 50%;" required data-validation-required-message>
                                            <option selected='true' disabled>
                                              Choose school year
                                            </option>
                                            <?php
                                              require_once('connection.php');
                                              $cn = new connection();
                                              $conn = $cn->connectDB($_SESSION['database']);

                                              $SyQuery1 = "SELECT * FROM school_year";
                                              $SyResult1 = mysqli_query($conn, $SyQuery1) or die('Error: ' .mysqli_error($conn));
                                              while($getSY1 = mysqli_fetch_row($SyResult1)) {
                                                if($getSY1[0] != 1)
                                                  echo "<option value='$getSY1[0]'>$getSY1[1]</option>";
                                              }
                                            ?>
                                          </select>
                                        </div>
                                        <div class="form-group">
                                          <label>Enter month: </label><br />
                                          <select name="month" style="padding: 5px; cursor: pointer; width: 50%;" required data-validation-required-message>
                                            <option selected='true' disabled>
                                              Choose a month
                                            </option>
                                            <option value="1">January</option>
                                            <option value="2">February</option>
                                            <option value="3">March</option>
                                            <option value="4">April</option>
                                            <option value="5">May</option>
                                            <option value="6">June</option>
                                            <option value="7">July</option>
                                            <option value="8">August</option>
                                            <option value="9">September</option>
                                            <option value="10">October</option>
                                            <option value="11">November</option>
                                            <option value="12">December</option>
                                          </select>
                                        </div>
                                        <div class="form-group">
                                          <label>Enter year</label>
                                          <input class="form-control" name="year" required data-validation-required-message>
                                          <p class="help-block"></p>
                                        </div>
                                        <button type="submit" style ="background-color:lightblue" class="btn btn-default" value="submit">Generate report</button>
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
