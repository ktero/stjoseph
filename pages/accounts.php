<?php

    require_once('../include/sessionstart.php');

    require_once('connection.php');
    $cn = new connection();
    $conn = $cn->connectDB($_SESSION['database']);

    if(isset($_GET['id']))
        $ID = mysqli_real_escape_string($conn, $_GET['id']);
    else
        $ID = '';

    $query = "SELECT `student`.`Lname`,`student`.`Fname`, `student`.`Mname`, `level`.`Year_level`, `level`.`Section` FROM `student`LEFT JOIN `level` ON `student`.`Level_code` =  `level`.`Level_code` WHERE `student`.`StudentID` = '" . $ID . "'";
    $result = mysqli_query($conn, $query) or die("Error: " . mysqli_error($conn));

	$link = $_SERVER['REQUEST_URI'];
	$truncate = isset($_GET['truncate']) ? $_GET['truncate'] : 0;

	if($truncate == 1)
	{
		$trun = "TRUNCATE TABLE `student_pay_fees`";
		mysqli_query($conn, $trun) or die("Error: " . mysqli_error($conn));
	}

    while($gr = mysqli_fetch_row($result))
    {
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
                    <h3 style="line-height: 30px;" class="page-header">Saint Joseph High School of Talakag, INC.<br>Talakag, Bukidnon<br>Statement of Account<br><?php echo date('F Y'); ?></h3>
                </div>
                <div style="margin-bottom: 15px;">
                    Name: <strong> <?php echo $gr[0] . ",&nbsp;" . $gr[1] . "&nbsp;" . $gr[2]; ?> </strong>
                    <br>
                    Year & Section: <strong> <?php echo $gr[3] . " - " . $gr[4]; ?> </strong>
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
                                <tbody>
                                    <?php
                                        switch ($gr[3]) {
                                            case "Grade 7":
                                                $TUITION = "SELECT `fees`.*, SUM(`student_pay_fees`.Payment) AS Payment FROM fees LEFT JOIN `student_pay_fees` ON `fees`.`Fee_code` = `student_pay_fees`.`Fee_code` WHERE `fees`.Fee_code = 'Gr7' AND `student_pay_fees`.StudentID = '".$ID."'";
												$MISC0 = "SELECT SUM(Amount) AS Amount FROM fees WHERE `fees`.Fee_code LIKE 'MF%' AND `fees`.Fee_code NOT IN('MF23','MF24','MF25', 'MF26', 'MF27', 'MF28', 'MF29', 'MF30', 'MF31', 'MF32')";
												$MISC1 = "SELECT SUM(Payment) AS Payment FROM `student_pay_fees` WHERE Fee_code LIKE 'MF%' AND Fee_code NOT IN('MF23', 'MF24', 'MF25', 'MF26', 'MF27', 'MF28', 'MF29', 'MF30', 'MF31', 'MF32') AND StudentID = '".$ID."'";
                                                break;

                                            case "Grade 8":
                                                $TUITION = "SELECT `fees`.*, SUM(`student_pay_fees`.Payment) AS Payment FROM fees LEFT JOIN `student_pay_fees` ON `fees`.`Fee_code` = `student_pay_fees`.`Fee_code` WHERE `fees`.Fee_code = 'Gr8' AND `student_pay_fees`.StudentID = '".$ID."'";
												$MISC0 = "SELECT SUM(Amount) AS Amount FROM fees WHERE `fees`.Fee_code LIKE 'MF%' AND `fees`.Fee_code NOT IN('MF23','MF24','MF25', 'MF26', 'MF27', 'MF28', 'MF29', 'MF30', 'MF31', 'MF32')";
												$MISC1 = "SELECT SUM(Payment) AS Payment FROM `student_pay_fees` WHERE Fee_code LIKE 'MF%' AND Fee_code NOT IN('MF23', 'MF24', 'MF25', 'MF26', 'MF27', 'MF28', 'MF29', 'MF30', 'MF31', 'MF32') AND StudentID = '".$ID."'";
                                                break;

                                            case "Grade 9":
                                                $TUITION = "SELECT `fees`.*, SUM(`student_pay_fees`.Payment) AS Payment FROM fees LEFT JOIN `student_pay_fees` ON `fees`.`Fee_code` = `student_pay_fees`.`Fee_code` WHERE `fees`.Fee_code = 'Gr9' AND `student_pay_fees`.StudentID = '".$ID."'";
												$MISC0 = "SELECT SUM(Amount) AS Amount FROM fees WHERE `fees`.Fee_code LIKE 'MF%' AND `fees`.Fee_code NOT IN('MF23','MF24','MF25', 'MF26', 'MF27', 'MF28', 'MF29', 'MF30', 'MF31', 'MF32')";
												$MISC1 = "SELECT SUM(Payment) AS Payment FROM `student_pay_fees` WHERE Fee_code LIKE 'MF%' AND Fee_code NOT IN('MF23', 'MF24', 'MF25', 'MF26', 'MF27', 'MF28', 'MF29', 'MF30', 'MF31', 'MF32') AND StudentID = '".$ID."'";
                                                break;

                                            case "Grade 10":
                                                $TUITION = "SELECT `fees`.*, SUM(`student_pay_fees`.Payment) AS Payment FROM fees LEFT JOIN `student_pay_fees` ON `fees`.`Fee_code` = `student_pay_fees`.`Fee_code` WHERE `fees`.Fee_code = 'Gr10' AND `student_pay_fees`.StudentID = '".$ID."'";
												$MISC0 = "SELECT SUM(Amount) AS Amount FROM fees WHERE `fees`.Fee_code LIKE 'MF%' AND `fees`.Fee_code NOT IN('MF23','MF24','MF25', 'MF29', 'MF30', 'MF31', 'MF32')";
												$MISC1 = "SELECT SUM(Payment) AS Payment FROM `student_pay_fees` WHERE Fee_code LIKE 'MF%' AND Fee_code NOT IN('MF23', 'MF24', 'MF25', 'MF29', 'MF30', 'MF31', 'MF32') AND StudentID = '".$ID."'";
                        break;
                                            case "Grade 11":
                                                $TUITION = "SELECT `fees`.*, SUM(`student_pay_fees`.Payment) AS Payment FROM fees LEFT JOIN `student_pay_fees` ON `fees`.`Fee_code` = `student_pay_fees`.`Fee_code` WHERE `fees`.Fee_code = 'Gr11' AND `student_pay_fees`.StudentID = '".$ID."'";
                        $MISC0 = "SELECT SUM(Amount) AS Amount FROM fees WHERE `fees`.Fee_code LIKE 'MF%' AND `fees`.Fee_code NOT IN('MF23','MF24','MF25', 'MF26', 'MF27', 'MF28', 'MF29', 'MF30', 'MF31', 'MF32')";
                        $MISC1 = "SELECT SUM(Payment) AS Payment FROM `student_pay_fees` WHERE Fee_code LIKE 'MF%' AND Fee_code NOT IN('MF23', 'MF24', 'MF25', 'MF26', 'MF27', 'MF28', 'MF29', 'MF30', 'MF31', 'MF32') AND StudentID = '".$ID."'";
                        break;
                                            case "Grade 12":
                                                $TUITION = "SELECT `fees`.*, SUM(`student_pay_fees`.Payment) AS Payment FROM fees LEFT JOIN `student_pay_fees` ON `fees`.`Fee_code` = `student_pay_fees`.`Fee_code` WHERE `fees`.Fee_code = 'Gr12' AND `student_pay_fees`.StudentID = '".$ID."'";
                        $MISC0 = "SELECT SUM(Amount) AS Amount FROM fees WHERE `fees`.Fee_code LIKE 'MF%' AND `fees`.Fee_code NOT IN('MF23', 'MF24', 'MF25', 'MF26', 'MF27', 'MF28')";
                        $MISC1 = "SELECT SUM(Payment) AS Payment FROM `student_pay_fees` WHERE Fee_code LIKE 'MF%' AND Fee_code NOT IN('MF23', 'MF24', 'MF25', 'MF26', 'MF27', 'MF28') AND StudentID = '".$ID."'";
                                                break;

                                            default:
                                                echo "Error: Cannot determine Student Year Level.";
                                                break;
                                        }

                                        $row2 = 0;
                                        $row7 = 0;
                                        $miscrow = 0;

                                        $COMP = "SELECT `fees`.*, SUM(`student_pay_fees`.Payment) AS Payment FROM fees LEFT JOIN `student_pay_fees` ON `fees`.`Fee_code` = `student_pay_fees`.`Fee_code` WHERE `fees`.Fee_code = 'CF1' AND `student_pay_fees`.`StudentID` = '".$ID."'";

                                        $NET = "SELECT `fees`.*, SUM(`student_pay_fees`.Payment) AS Payment FROM fees LEFT JOIN `student_pay_fees` ON `fees`.`Fee_code` = `student_pay_fees`.`Fee_code` WHERE `fees`.Fee_code = 'CF2' AND `student_pay_fees`.`StudentID` = '".$ID."'";

                                        $PTA = "SELECT `fees`.*, SUM(`student_pay_fees`.Payment) AS Payment FROM fees LEFT JOIN `student_pay_fees` ON `fees`.`Fee_code` = `student_pay_fees`.`Fee_code` WHERE `fees`.Fee_code = 'MF23' AND `student_pay_fees`.StudentID = '".$ID."'";

                                        $CUT = "SELECT `fees`.*, SUM(`student_pay_fees`.Payment) AS Payment FROM fees LEFT JOIN `student_pay_fees` ON `fees`.`Fee_code` = `student_pay_fees`.`Fee_code` WHERE `fees`.Fee_code = 'MF25' AND `student_pay_fees`.StudentID = '".$ID."'";

                                        $PE = "SELECT `fees`.*, SUM(`student_pay_fees`.Payment) AS Payment FROM fees LEFT JOIN `student_pay_fees` ON `fees`.`Fee_code` = `student_pay_fees`.`Fee_code` WHERE `fees`.Fee_code = 'MF24' AND `student_pay_fees`.StudentID = '".$ID."'";

                                        $SRA = "SELECT `fees`.*, SUM(`student_pay_fees`.Payment) AS Payment FROM fees LEFT JOIN `student_pay_fees` ON `fees`.`Fee_code` = `student_pay_fees`.`Fee_code` WHERE `fees`.Fee_code = 'OF1' AND `student_pay_fees`.StudentID = '".$ID."'";

                                        $BOOK = "SELECT `fees`.*, SUM(`student_pay_fees`.Payment) AS Payment FROM fees LEFT JOIN `student_pay_fees` ON `fees`.`Fee_code` = `student_pay_fees`.`Fee_code` WHERE `fees`.Fee_code IN ('OF2', 'OF3') AND `student_pay_fees`.StudentID = '".$ID."'";

                                        $tuires = mysqli_query($conn, $TUITION) or die("Error: " . mysqli_error($conn));
                                        $compres = mysqli_query($conn, $COMP) or die("Error: " . mysqli_error($conn));
                                        $netres = mysqli_query($conn, $NET) or die("Error: " . mysqli_error($conn));
                                        $miscres0 = mysqli_query($conn, $MISC0) or die("Error: " . mysqli_error($conn));
                                        $miscres1 = mysqli_query($conn, $MISC1) or die("Error: " . mysqli_error($conn));
                                        $ptares = mysqli_query($conn, $PTA) or die("Error: " . mysqli_error($conn));
                                        $cutres = mysqli_query($conn, $CUT) or die("Error: " . mysqli_error($conn));
                                        $peres = mysqli_query($conn, $PE) or die("Error: " . mysqli_error($conn));
                                        $srares = mysqli_query($conn, $SRA) or die("Error: " . mysqli_error($conn));
                                        $bookres = mysqli_query($conn, $BOOK) or die("Error: " . mysqli_error($conn));
                                    ?>
                                    <tr>
                                        <th></th>
                                        <th>Whole Year</th>
                                        <th>Advanced Payment</th>
                                        <th>Balance</th>
                                    </tr>
                                    <tr>
                                        <th>Tuition</th>
                                        <td><?php while($rows = mysqli_fetch_row($tuires)) { $firo = $rows[2]; $firp = $rows[3]; $row2 = number_format($rows[2], 2, '.', ',&nbsp;'); echo $row2; ?></td>
                                        <td><?php $row3 = number_format($rows[3], 2, '.', ',&nbsp;'); echo $row3; ?></td>
                                        <td><?php $balrow = $rows[2] - $rows[3]; $balrow = number_format($balrow, 2, '.', ',&nbsp;');

                                        if($balrow < 0)
                                          $balrow = 0.00;
                                        echo $balrow; } ?></td>
                                    </tr>
                                    <tr>
                                        <th>Computer</th>
                                        <td><?php while($rows = mysqli_fetch_row($compres)) { $seco = $rows[2]; $secp = $rows[3]; $row2 = number_format($rows[2], 2, '.', ',&nbsp;'); echo $row2; ?></td>
                                        <td><?php $row3 = number_format($rows[3], 2, '.', ',&nbsp;'); echo $row3; ?></td>
                                        <td><?php $balrow = $rows[2] - $rows[3]; $balrow = number_format($balrow, 2, '.', ',&nbsp;');

                                        if($balrow < 0)
                                          $balrow = 0.00;
                                        echo $balrow; } ?></td>
                                    </tr>
                                    <tr>
                                        <th>Internet</th>
                                        <td><?php while($rows = mysqli_fetch_row($netres)) { $thiro = $rows[2]; $thirp = $rows[3]; $row2 = number_format($rows[2], 2, '.', ',&nbsp;'); echo $row2; ?></td>
                                        <td><?php $row7 = number_format($rows[3], 2, '.', ',&nbsp;'); echo $row7; ?></td>
                                        <td><?php $balrow = $rows[2] - $rows[3]; $balrow = number_format($balrow, 2, '.', ',&nbsp;');

                                        if($balrow < 0)
                                          $balrow = 0.00;
                                        echo $balrow; } ?></td>
                                    </tr>
                                    <tr>
                                        <th>Miscellaneous</th>
                                        <?php while($rows = mysqli_fetch_row($miscres0)) { $row = $rows[0]; $row0 = number_format($rows[0], 2, '.', ',&nbsp;'); } while($rowss = mysqli_fetch_row($miscres1)) { $roww = $rowss[0]; $row1 = number_format($rowss[0], 2, '.', ',&nbsp;'); } ?>
                                        <td> <?php echo $row0; ?> </td>
                                        <td> <?php echo $row1; ?></td>
                                        <td><?php $balrow = $row - $roww; $balrow = number_format($balrow, 2, '.', ',&nbsp;');

                                        if($balrow < 0)
                                          $balrow = 0.00;
                                        echo $balrow; ?></td>
                                    </tr>
                                    <tr>
                                        <th>PTA</th>
                                        <td><?php while($rows = mysqli_fetch_row($ptares)) { $fouro = $rows[2]; $fourp = $rows[3]; $row2 = number_format($rows[2], 2, '.', ',&nbsp;'); echo $row2; ?></td>
                                        <td><?php $row7 = number_format($rows[3], 2, '.', ',&nbsp;'); echo $row7; ?></td>
                                        <td><?php $balrow = $rows[2] - $rows[3]; $balrow = number_format($balrow, 2, '.', ',&nbsp;');

                                        if($balrow < 0)
                                          $balrow = 0.00;
                                        echo $balrow; } ?></td>
                                    </tr>
                                    <tr>
                                        <th>Books</th>
                                        <td><?php while($rows = mysqli_fetch_row($bookres)) { $fivo = $rows[2]; $fivp = $rows[3]; $row2 = number_format($rows[2], 2, '.', ',&nbsp;'); $row7 = number_format($rows[3], 2, '.', ',*nbsp;'); } echo $row2; ?></td>
                                        <td><?php echo $row7; ?></td>
                                        <td><?php $balrow = $rows[2] - $rows[3]; $balrow = number_format($balrow, 2, '.', ',&nbsp;');

                                        if($balrow < 0)
                                          $balrow = 0.00;
                                        echo $balrow; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Haircut</th>
                                        <td><?php while($rows = mysqli_fetch_row($cutres)) { $sixo = $rows[2]; $sixp = $rows[3]; $row2 = number_format($rows[2], 2, '.', ',&nbsp;'); echo $row2; ?></td>
                                        <td><?php $row7 = number_format($rows[3], 2, '.', ',&nbsp;'); echo $row7; ?></td>
                                        <td><?php $balrow = $rows[2] - $rows[3]; $balrow = number_format($balrow, 2, '.', ',&nbsp;');

                                        if($balrow < 0)
                                          $balrow = 0.00;
                                        echo $balrow; } ?></td>
                                    </tr>
                                    <tr>
                                        <th>MAPEH Uniform</th>
                                        <td><?php while($rows = mysqli_fetch_row($peres)) { $sevo = $rows[2]; $sevp = $rows[3]; $row2 = number_format($rows[2], 2, '.', ',&nbsp;'); echo $row2; ?></td>
                                        <td><?php $row7 = number_format($rows[3], 2, '.', ',&nbsp;'); echo $row7; ?></td>
                                        <td><?php $balrow = $rows[2] - $rows[3]; $balrow = number_format($balrow, 2, '.', ',&nbsp;');

                                        if($balrow < 0)
                                          $balrow = 0.00;
                                        echo $balrow; } ?></td>
                                    </tr>
                                    <tr>
                                        <th>SRA</th>
                                        <td><?php while($rows = mysqli_fetch_row($srares)) { $eigo = $rows[2]; $eigp = $rows[3]; $row2 = number_format($rows[2], 2, '.', ',&nbsp;'); echo $row2; ?></td>
                                        <td><?php $row7 = number_format($rows[3], 2, '.', ',&nbsp;'); echo $row7; ?></td>
                                        <td><?php $balrow = $rows[2] - $rows[3]; $balrow = number_format($balrow, 2, '.', ',&nbsp;');

                                        if($balrow < 0)
                                          $balrow = 0.00;
                                        echo $balrow; } ?></td>
                                    </tr>
                                    <tr>
                                        <th colspan="3" style="text-align: right;"><h4>Total: </h4></th>
                                        <td>
                                            <?php
                                                $equao = $firo + $seco + $thiro + $fouro + $fivo + $sixo + $sevo + $eigo + $row;
                                                $equap = $firp + $secp + $thirp + $fourp + $fivp + $sixp + $sevp + $eigp + $roww;
                                                $equa = $equao - $equap;
                                                $equa = number_format($equa, 2, '.', ',&nbsp;');
                                                if($equa < 0)
                                                  $equa = 0.00;
                                                echo "<h4>".$equa."</h4>";
                                            ?>
                                        </td>
                                    </tr>
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
<?php
    }
    $cn->closeDB();
?>
