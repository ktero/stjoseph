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
  $conn = $cn->connectDB();

  $ID = isset($_GET['id']) ? mysqli_real_escape_string($conn, $_GET['id']) : '-1';
  $schoolyear = isset($_GET['schoolyear']) ? mysqli_real_escape_string($conn, $_GET['schoolyear']) : '-1';
  $level = isset($_GET['level']) ? mysqli_real_escape_string($conn, $_GET['level']) : '-1';

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
                            <h4>Choose year level and school year</h4>
                            <h5>Transaction history of the student in that year level throughout the school year .</h5>
                          </div>
                          <div class="panel-body">
                            <form action="student_ledger.php" method="get">
                              <input type="hidden" name="id" value="<?php echo $ID; ?>">
                              <div class="form-group">
                                  <label>Level name</label><br />
                                  <select name='level' style="padding: 5px; cursor: pointer; width: 50%;" required>
                                    <option selected='true' disabled>Choose Level</option>
                                    <?php
                                      $qLevel = "SELECT * from level";
                                      $rLevel = mysqli_query($conn, $qLevel) or die('
                                      Error: ' . mysqli_error());

                                      while ($rowLevel = mysqli_fetch_row($rLevel)) {
                                        if($rowLevel[0] != 'G0a') {
                                          $code = $rowLevel[0];
                                          $lvl = $rowLevel[1];
                                          $section = $rowLevel[2];
                                          echo "<option value='$code'>$lvl - $section</option>";
                                        }
                                      }
                                    ?>
                                  </select>
                                  <p class="help-block"></p>
                              </div>
                              <div class="form-group">
                                <label>School Year</label><br />
                                <select name='schoolyear' style="padding: 5px; cursor: pointer; width: 50%;">
                                <option disabled="disabled" selected="selected">Choose School Year</option>
                                    <?php
                                        $q2 = "SELECT * FROM school_year";
                                        $r2 = mysqli_query($conn, $q2) or die('Error: ' . mysqli_error($conn));
                                        while ($y = mysqli_fetch_row($r2)) {
                                          if($y[0] != 1) {
                                            $syID = $y[0];
                                            $sy = $y[1];
                                            echo "<option value='$syID'>$sy</option>";
                                          }
                                        }
                                    ?>
                                "</select>
                              </div>
                              <button type="submit" style ="background-color:lightblue" name="submit" class="btn btn-default" value="submit">Search</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
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
                                              $r = mysqli_query($conn, "SELECT * FROM level WHERE Level_code = '$level'") or die('Error: ' . mysqli_error($conn));
                                              if ($y = mysqli_fetch_row($r))
                                                echo $y[1] . " - " . $y[2];
                                            ?>
                                        </h5>
                                        <h5 style="margin-left: 15px;">School Year:
                                            <?php
                                              $getSY = mysqli_query($conn, "SELECT School_Year FROM school_year WHERE ID = '$schoolyear'") or die('Error: ' . mysqli_error($conn));
                                              if ($syres = mysqli_fetch_row($getSY))
                                                echo $syres[0];
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

								$payque = "SELECT student_pay_fees.*, fees.Description FROM student_pay_fees LEFT JOIN fees ON student_pay_fees.Fee_code = fees.Fee_code WHERE StudentID = '$ID' AND SY_ID = '$schoolyear' AND Level_code = '$level'";
								$payres = mysqli_query($conn, $payque) or die("Error query: ".mysqli_error($conn));

								while($payrow = mysqli_fetch_row($payres))
								{
									$pr4 = number_format($payrow[6], 2, '.', ',&nbsp;');
							?>
                                                <tr>
                                                    <td>
                                                        <?php echo $payrow[5]; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $payrow[7]; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $payrow[8]; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $pr4; ?>
                                                    </td>
                                                    <?php



										if($level == 'G7a' || $level == 'G7b') {
											$code = "SELECT SUM(Amount) AS Amount FROM fees WHERE Fee_code NOT IN ('Gr8', 'Gr9', 'Gr10', 'Gr11', 'Gr12', 'MF26', 'MF27', 'MF28', 'MF29', 'MF30', 'MF31', 'MF32')";
										} else if($level == 'G8a' || $level == 'G8b') {
											$code = "SELECT SUM(Amount) AS Amount FROM fees WHERE Fee_code NOT IN ('Gr7', 'Gr9', 'Gr10', 'Gr11', 'Gr12', 'MF27', 'MF26', 'MF28', 'MF29', 'MF30', 'MF31', 'MF32')";
										} else if($level == 'G9a' || $level == 'G9b') {
											$code = "SELECT SUM(Amount) AS Amount FROM fees WHERE Fee_code NOT IN ('Gr7', 'Gr8', 'Gr10', 'Gr11', 'Gr12', 'MF27', 'MF26', 'MF28', 'MF29', 'MF30', 'MF31', 'MF32')";
										} else if($level == 'G10a' || $level == 'G10b')
											$code = "SELECT SUM(Amount) AS Amount FROM fees WHERE Fee_code NOT IN ('Gr7', 'Gr8', 'Gr9',  'Gr11', 'Gr12', 'MF29', 'MF30', 'MF31', 'MF32')";
                    else if($level == 'G11a' || $level == 'G11b') {
  										$code = "SELECT SUM(Amount) AS Amount FROM fees WHERE Fee_code NOT IN ('Gr7', 'Gr8', 'Gr9',  'Gr10', 'Gr12', 'MF27', 'MF26', 'MF28', 'MF29', 'MF30', 'MF31', 'MF32')";
                    } else if($level == 'G12a' || $level == 'G12b') {
  										$code = "SELECT SUM(Amount) AS Amount FROM fees WHERE Fee_code NOT IN ('Gr7', 'Gr8', 'Gr9', 'Gr10', 'Gr11', 'MF27', 'MF26', 'MF28')";
                    }



										$balres = mysqli_query($conn, $code) or die("Error: ".mysqli_error($conn));


									while($bal = mysqli_fetch_row($balres))
									{
										$baltot = $bal[0];
									}
									$result = mysqli_query($conn, "SELECT SUM(Payment) AS totsum FROM student_pay_fees WHERE StudentID = '$ID' AND SY_ID = '$schoolyear'  AND Level_code = '$level'");
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
                                        <a href="accounts.php?id=<?php echo $ID; ?>&schoolyear=<?php echo $schoolyear; ?>&sy=<?php echo $syres[0]; ?>&level=<?php echo $level; ?>" style="font-size: 20px;">View Statement of Account</a>
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
