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
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Receipt Records</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          <h4>Choose school year</h4>
                          <h5>Receipt records in that specific school year.</h5>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                          <form action="paymentrecords.php" method="get">
                            <input type="hidden" name="id" value="<?php echo $ID; ?>">
                            <div class="form-group">
                              <label>School Year</label><br />
                              <select name='schoolyear' style="padding: 5px; cursor: pointer; width: 50%;">
                              <option disabled="disabled" selected="selected">Choose School Year</option>
                              <option value="">View all</option>
                                  <?php
                                      require_once('connection.php');
                                      $cn = new connection();
                                      $conn = $cn->connectDB();

                                      $q2 = "SELECT * FROM school_year";
                                      $r2 = mysqli_query($conn, $q2) or die('Error: ' . mysqli_error($conn));
                                      while ($y = mysqli_fetch_row($r2)) {
                                        if($y[0] != 1) {
                                          $syID = $y[0];
                                          $sy = $y[1];
                                          echo "<option value='$syID'>$sy</option>";
                                        }
                                      }
                                      $cn->closeDB();
                                  ?>
                              "</select>
                            </div>
                            <button type="submit" style ="background-color:lightblue" name="submit" class="btn btn-default" value="submit">Search</button>
                          </form>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Receipt Records</h4>
                            <p>Click on the student's ID number to see their financial transactions and current balance.</p>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Offical Receipt Number</th>
                                        <th>Student ID</th>
                                        <th>Fee</th>
                                        <th>Description</th>
                                        <th>Amount</th>
                                        <th>Receipt Date</th>
                                        <th>School Year</th>
                                        <th>Operation</th>
                                        <!--
                                        <th>Section</th>
                                        <th>Year Level</th>
                                        <th>Balance</th>
                                        -->
                                </thead>
                                <tbody>
                <?php
                    require_once('connection.php');
                    $cn   = new connection();
                    $conn = $cn->connectDB();

                    $sy = isset($_GET['schoolyear']) ? mysqli_real_escape_string($conn, $_GET['schoolyear']) : '';

                    if($sy == '' || empty($sy)) {
										  $query = "SELECT * FROM receipt";
                    } else {
                      $query = "SELECT * FROM receipt WHERE SY_ID = '$sy'";
                    }
										$result = mysqli_query($conn, $query);

										while($row = mysqli_fetch_row($result))
										{
									?>
                          <?php
                            $query = "SELECT * FROM school_year";
                            $res = mysqli_query($conn, $query);
                            while ($r = mysqli_fetch_row($res)) {
                              if($r[0] == $row[6])
                                $showSY = $r[0];
                            }
                          ?>

                                        <tr>
                                            <td>
                                                <?php echo $row[0]; ?>
                                            </td>
                                            <td>
                                              <?php
                                                $levelQuery = "SELECT student_pay_fees.Level_code FROM student_pay_fees WHERE student_pay_fees.StudentID = '$row[1]' AND student_pay_fees.SY_ID = '$showSY'";
                                                $resLevel = mysqli_query($conn, $levelQuery) or die('Error: ' .mysqli_error($conn));

                                                if($resLevel == true) {
                                                  if($rowLevel = mysqli_fetch_row($resLevel))
                                                    $level = $rowLevel[0];
                                                }
                                              ?>
                                              <a href="student_ledger.php?id=<?php echo $row[1]; ?>&level=<?php echo $level; ?>&schoolyear=<?php echo $row[6]; ?>">
                                                  <?php echo $row[1]; ?>
                                              </a>
                                            </td>
                                            <td>
                                                <?php echo $row[2]; ?>
                                            </td>
                                            <td>
                                                <?php echo $row[3]; ?>
                                            </td>
                                            <td>
                                                <?php echo number_format($row[4], 2, '.', ',&nbsp'); ?>
                                            </td>
                                            <td>
                                                <?php echo $row[5]; ?>
                                            </td>
                                            <td>
                                              <?php
                                                $query2 = "SELECT * FROM school_year";
                                                $res2 = mysqli_query($conn, $query2);
                                                while ($r2 = mysqli_fetch_row($res2)) {
                                                  if($r2[0] == $row[6])
                                                    echo $r2[1];
                                                }
                                              ?>
                                            </td>
                                            <td>
                                                <a href='delete_transaction.php?receiptID=<?php echo $row[7]; ?>' class='btn btn-default'  style='background-color: #EA6565;'> Delete this receipt</a>
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
