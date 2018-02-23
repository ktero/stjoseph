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
                    <h1 class="page-header">Add Payment</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Student Payment
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form action= "addpayment.php" method= "post">
                                        <div class="form-group">
                                            <label>Student ID</label>
                                            <input class="form-control" name="StudentID" required data-validation-required-message>
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
                                                require_once('connection.php');
                                                $cn = new connection();
                                                $conn = $cn->connectDB();

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
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

	<!-- Footer -->
        <footer class="text-center" style="bottom: 0; width: 100%; background-color: #fff; font-size: 10px">
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
