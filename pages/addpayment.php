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
	<!-- PHP -->
  <?php
                    require_once('connection.php');
                    $cn = new connection();
                    $conn = $cn->connectDB($_SESSION['database']);

                    $sid = isset($_POST['StudentID']) ? mysqli_real_escape_string($conn, $_POST['StudentID']) : '';
                    $orn = isset($_POST['ORNo']) ? mysqli_real_escape_string($conn, $_POST['ORNo']) : '';
                    $code = isset($_POST['code']) ? mysqli_real_escape_string($conn, $_POST['code']) : '';
                    $amount = isset($_POST['amount']) ? mysqli_real_escape_string($conn, $_POST['amount']) : '';

                    if(isset($_POST['submit']))
                    {
                      if( $sid == '' || $orn == '' || $code == '' || $amount == '' )
                      {
                        echo "<h4 style='border: thin solid #f77; border-radius: 8px; padding: 10px;'>Please fill-up everything.</h4>";
                      }
                      else if( $sid != '' || $orn != '' || $code != '' || $amount != '' )
                      {

                        $getDesc = "SELECT * FROM fees WHERE Fee_code = '$code'";
                        $res = mysqli_query($conn, $getDesc) or die('Error:' .mysqli_error($conn));
                        while ($row = mysqli_fetch_row($res)) {
                           $desc = $row[1];
                        }

                        // Insert into receipt
                        $add = "INSERT INTO receipt SET ReceiptNo='$orn', StudentID='$sid', Fee_code='$code', Description='$desc', Amount='$amount'";
                        if(mysqli_query($conn, $add) == true) {
                          // Insert into student_pay_fees
                          $addStudentFee = "INSERT INTO student_pay_fees SET StudentID = '$sid', Fee_code = '$code', Payment = '$amount', ORNo = '$orn'";
                          mysqli_query($conn, $addStudentFee) or die('Error: ' .mysqli_error($conn));
                        } else {
                          die('Error: ' . mysqli_error($conn));
                        }
                      }
                    }
                    $cn->closeDB();
?>
	<!-- End PHP -->

	<!-- Confirmation Message -->
	<div id="page-wrapper" align="Center" style="padding-top: 100px">
	<h1> Successfully Added Payment </h1>
	<a href='studentpayment.php' class="btn btn-default" role="button" style="background-color: lightblue; text-align: right">Add New Payment</a>
  <a href='paymentrecords.php' class="btn btn-default" role="button" style="background-color: lightblue; text-align: right">View Payments</a>
	</div>

	 <!-- Footer -->
        <footer class="text-center" style="position: fixed; bottom: 0; width: 100%; background-color: #fff; font-size: 10px">
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

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
