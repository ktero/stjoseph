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
                    <div class="col-lg-12">
                        <h1 class="page-header">Student Ledger</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
<?php

	require_once('connection.php');
    $cn   = new connection();
    $conn = $cn->connectDB($_SESSION['database']);

  $ID = isset($_GET['id']) ? mysqli_real_escape_string($conn, $_GET['id']) : '-1';

	$query = "SELECT * FROM student WHERE StudentID = '$ID'";
	$result = mysqli_query($conn, $query) or die("Error query: ".mysqli_error($conn));

	$link = $_SERVER['REQUEST_URI'];
	$truncate = isset($_GET['truncate']) ? $_GET['truncate'] : 0;

	if($truncate == 1)
	{
		$trun = "DELETE FROM student_pay_fees WHERE StudentID = '$ID'";
		mysqli_query($conn, $trun) or die("Error: " . mysqli_error($conn));
	}

	if($ID != '-1')
	{
?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <?php
                            while($row = mysqli_fetch_row($result))
                            {
                        ?>
                                        <h4 style="margin-left: 15px;">Student:
                                            <?php echo $row[1] . ", " . $row[2] . " " . $row[3]; ?>
                                        </h4>
                                        <h5 style="margin-left: 15px;">Year Level:
                                            <?php
                                              $r = mysqli_query($conn, "SELECT * FROM level WHERE Level_code = '$row[6]'") or die('Error: ' . mysqli_error($conn));
                                              while ($y = mysqli_fetch_row($r))
                                                echo $y[1] . " - " . $y[2];
                                            ?>
                                        </h5>
                                        <?php } ?>
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>OR Number</th>
                                                <th>Description</th>
                                                <th>Amount Paid</th>
                                                <!--
                                        <th>Debit</th>
                                        <th>Credit</th>
                                        <th>Net Change</th>
										<th>Balance</th>
                                        -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
								$baltot = 0;
								$amtot = 0;

								$payque = "SELECT student_pay_fees.*, fees.Description FROM student_pay_fees LEFT JOIN fees ON student_pay_fees.Fee_code = fees.Fee_code WHERE StudentID = '$ID'";
								$payres = mysqli_query($conn, $payque) or die("Error query: ".mysqli_error($conn));

								while($payrow = mysqli_fetch_row($payres))
								{
									$pr4 = number_format($payrow[4], 2, '.', ',&nbsp;');
							?>
                                                <tr>
                                                    <td>
                                                        <?php echo $payrow[3]; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $payrow[5]; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $payrow[7]; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $pr4; ?>
                                                    </td>
                                                    <?php
									$check = "SELECT * FROM student WHERE StudentID = '$ID'";
									$checkres = mysqli_query($conn, $check) or die("Error: ".mysqli_error($conn));

									while($res = mysqli_fetch_row($checkres))
									{
										if($res[6] == 'G7a' || $res[6] == 'G7b') {
											$code = "SELECT SUM(Amount) AS Amount FROM fees WHERE Fee_code NOT IN ('Gr8', 'Gr9', 'Gr10', 'Gr11', 'Gr12', 'MF26', 'MF27', 'MF28', 'MF29', 'MF30', 'MF31', 'MF32')";
										} else if($res[6] == 'G8a' || $res[6] == 'G8b') {
											$code = "SELECT SUM(Amount) AS Amount FROM fees WHERE Fee_code NOT IN ('Gr7', 'Gr9', 'Gr10', 'Gr11', 'Gr12', 'MF27', 'MF26', 'MF28', 'MF29', 'MF30', 'MF31', 'MF32')";
										} else if($res[6] == 'G9a' || $res[6] == 'G9b') {
											$code = "SELECT SUM(Amount) AS Amount FROM fees WHERE Fee_code NOT IN ('Gr7', 'Gr8', 'Gr10', 'Gr11', 'Gr12', 'MF27', 'MF26', 'MF28', 'MF29', 'MF30', 'MF31', 'MF32')";
										} else if($res[6] == 'G10a' || $res[6] == 'G10b')
											$code = "SELECT SUM(Amount) AS Amount FROM fees WHERE Fee_code NOT IN ('Gr7', 'Gr8', 'Gr9',  'Gr11', 'Gr12', 'MF29', 'MF30', 'MF31', 'MF32')";
                    else if($res[6] == 'G11a' || $res[6] == 'G11b') {
  										$code = "SELECT SUM(Amount) AS Amount FROM fees WHERE Fee_code NOT IN ('Gr7', 'Gr8', 'Gr9',  'Gr10', 'Gr12', 'MF27', 'MF26', 'MF28', 'MF29', 'MF30', 'MF31', 'MF32')";
                    } else if($res[6] == 'G12a' || $res[6] == 'G12b') {
  										$code = "SELECT SUM(Amount) AS Amount FROM fees WHERE Fee_code NOT IN ('Gr7', 'Gr8', 'Gr9', 'Gr10', 'Gr11', 'MF27', 'MF26', 'MF28')";
                    }



										$balres = mysqli_query($conn, $code) or die("Error: ".mysqli_error($conn));
									}

									while($bal = mysqli_fetch_row($balres))
									{
										$baltot = $bal[0];
									}
									$result = mysqli_query($conn, "SELECT SUM(Payment) AS totsum FROM student_pay_fees WHERE StudentID = '$ID'");
									$row = mysqli_fetch_assoc($result);
									$amtot = $row['totsum'];
									$amtot = $baltot - $amtot;
									$baltot = number_format($baltot, 2, '.', ',&nbsp;');
								?>
                                                </tr>
                                                <?php
								}
								$amtot = number_format($amtot, 2, '.', ',&nbsp;');
							     ?>
                                                    <tr>
                                                        <td colspan="3" style="text-align:  right;"><strong>Balance:&nbsp;</strong></td>
                                                        <td><strong>
                                                          <?php
                                                            if($amtot < 0)
                                                              $amtot = 0;
                                                            echo $amtot;
                                                          ?></strong></td>
                                                    </tr>
                                        </tbody>
                                    </table>
                                    <div class="btn btn-default pull-left" role="button">
                                        <a href="adminrecords.php">Back</a>
                                    </div>
                                    <!--
                                    <div class="btn btn-default pull-left" role="button">
                                        <a href="<?php echo $link . '&truncate=1'; ?>" onclick="return confirm('Are you sure you want to delete this record?');">RESET RECORDS</a>
                                    </div>
                                  -->
                                    <div style="float: right">
                                        <a href="accounts.php?id=<?php echo $ID; ?>" style="font-size: 20px;">View Statement of Account</a>
                                    </div>
                                    <!-- /.table-responsive -->

                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <tfoot>
                    </tfoot>
                    <div></div>
            </div>
            <!-- /#wrapper -->
            <hr>
            <?php
	}
	else if($ID == '-1')
	{
		echo "<meta http-equiv='refresh' content='0;url=adminrecords.php'/>";
	}
    $cn->closedB();
?>
                <!-- Footer -->
                <footer>
                    <div class="row">
                        <?php require_once('../include/footer.php'); ?>
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
