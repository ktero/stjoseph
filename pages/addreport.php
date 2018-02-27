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
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h3 style="line-height: 30px;" class="page-header">Saint Joseph High School of Talakag, INC.<br>Talakag, Bukidnon<br>Monthly Report<br><?php echo date('F Y'); ?></h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <!-- /.panel-heading -->
                        <div class="panel-body">
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
                                    require_once('connection.php');
                                    $cn = new connection();
                                    $conn = $cn->connectDB($_SESSION['database']);

                                    $OR = array();
                                    $ovamount = 0;
                                    $month = isset($_POST['month']) ? mysqli_real_escape_string($conn, $_POST['month']) : '';
                                    $query = "SELECT * FROM receipt WHERE MONTH(Receipt_Date) = $month";
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
                                      }
                                  ?>
                                  <tr>
                                    <td colspan="3" style="text-align:  right;"><strong style="font-size: 16px;">Total amount:&nbsp;</strong></td>
                                    <td>
                                      <strong style="font-size: 16px;"><?php  echo number_format($tamount, 2, '.', ',&nbsp;'); ?></strong>
                                    </td>
                                  </tr>
                                  <?php
                                    }
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
      <div class="no-print">
        <div class="btn btn-default pull-left" role="button">
  				<a href="adminrecords.php">Back</a>
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
