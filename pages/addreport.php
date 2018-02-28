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
        <div id="page-wrapper">
            <div class="row"><div class="col-lg-12 text-center">
                    <?php
                      require_once('connection.php');
                      $cn = new connection();
                      $conn = $cn->connectDB($_SESSION['database']);

                      $month = isset($_POST['month']) ? mysqli_real_escape_string($conn, $_POST['month']) : '';
                      $year = isset($_POST['year']) ? mysqli_real_escape_string($conn, $_POST['year']) : '';
                    ?>
                    <h3 style="line-height: 30px;" class="page-header">Saint Joseph High School of Talakag, Bukidnon<br>Monthly Report and Summary Report<br /><?php echo date('F', mktime(0, 0, 0, $month, 10)) . " " . $year; ?></h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

            <!-- Monthly Report -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <center><h4>Monthly Report</h4></center>
                      </div>
                        <div class="panel-body">
                            <!-- Monthly report table -->
                            <table width="100%" class="table table-striped table-bordered table-hover">
                                <thead>
                                  <tr>
                                    <th>OR Number</th>
                                    <th>Receipt Date</th>
                                    <th>Fee Description</th>
                                    <th>Total Amount</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php
                                    $OR = array(); $checkCode = array(); $feeDesc = array(); $feeTotal = array();
                                    $indexC = 0;
                                    $ovamount = 0;

                                    $query = "SELECT * FROM receipt WHERE MONTH(Receipt_Date) = $month AND YEAR(Receipt_Date) = $year";
                                    $result = mysqli_query($conn, $query) or die('Error in query: ' .mysqli_error($conn));

                                    while($row = mysqli_fetch_row($result))
                                    {
                                      if(in_array($row[0], $OR) == false) {
                                        $OR[] = $row[0];
                                        $q1 = "SELECT * FROM receipt WHERE ReceiptNo = $row[0]";

                                        $tamount = 0;
                                        $r1 = mysqli_query($conn, $q1) or die('Error: ' . mysqli_error($conn));
                                        while($rw1 = mysqli_fetch_row($r1)) {
                                  ?>
                                  <tr>
                                    <td>
                                      <?php echo $rw1[0]; ?>
                                    </td>
                                    <td>
                                      <?php echo $rw1[5]; ?>
                                    </td>
                                    <td>
                                      <?php echo $rw1[3]; ?>
                                    </td>
                                    <td>
                                      <?php echo number_format($rw1[4], 2, '.', ',&nbsp;'); ?>
                                    </td>
                                  </tr>
                                  <?php
                                        $tamount = $tamount + $rw1[4];

                                        // Obtaining summary report data starts here
                                        if(in_array($rw1[2], $checkCode) == false) {
                                          $checkCode[] = $row[2];
                                          $feeDesc[$indexC] = $rw1[3];

                                          $getamountQuary = "SELECT SUM(Amount) FROM receipt WHERE Fee_code = '$rw1[2]'";
                                          $r2 = mysqli_query($conn, $getamountQuary) or die('Error quary: ' . mysqli_error($conn));
                                          if($rw2 = mysqli_fetch_row($r2))
                                            $feeTotal[$indexC] = $rw2[0];
                                          $indexC++;
                                        }
                                      }
                                  ?>
                                  <tr>
                                    <td colspan="3" style="text-align:  right;"><strong>Total amount:&nbsp;</strong></td>
                                    <td>
                                      <strong><?php  echo number_format($tamount, 2, '.', ',&nbsp;'); ?></strong>
                                    </td>
                                  </tr>
                                  <?php
                                    }
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
            <!-- Summary Report -->
            <div class="row">
              <div class="col-lg-12">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <center><h4>Summary Report</h4></center>
                  </div>
                  <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover">
                      <thead>
                        <tr>
                          <th>Fee names</th>
                          <th>Total amount for each fee</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          for ($index = 0; $index < count($feeDesc) && $index < count($feeTotal); $index++) {
                        ?>
                        <tr>
                          <td>
                            <?php
                                echo $feeDesc[$index];
                            ?>
                          </td>
                          <td>
                            <?php
                                echo number_format($feeTotal[$index], 2, '.', ',&nbsp;');
                            ?>
                          </td>
                        </tr>
                        <?php
                          }
                          $cn->closeDB();
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
      <div class="no-print">
        <div class="btn btn-default pull-left" role="button">
  				<a href="create_report.php">Back</a>
        </div>
      </div>
      <div class="no-print">
        <td valign="bottom" align="right">
        <button onclick="myFunction()"  class="btn btn-default pull-right" >Print this page</button>
      </div>
<script>
function myFunction() {
    window.print();
}
</script>
<br>
<br>

        <!-- Footer -->
        <div class="no-print">
          <footer class="text-center" style="bottom: 0; width: 100%; background-color: #fff; font-size: 10px">
              <div class="row">
                  <?php require_once('../include/footer.php'); ?>
              </div>
          </footer>
        </div>

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
