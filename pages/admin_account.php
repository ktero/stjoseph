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
                    <h1 class="page-header">Admin account</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <!-- Sign up for new account -->
            <div class="row">
              <div class="col-lg-12">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4>Sign up for new Administrator account</h4>
                  </div>
                  <div class="panel-body">
                      <a href="pre_sign_up.php" style="background-color:lightblue;" class="btn btn-default">Sign up</a>
                  </div>
                </div>
              </div>
            </div>
            <!-- Administrator profile preview -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          <h4>Profile of <?php echo $_SESSION['fname'] . ' ' . $_SESSION['lname']; ?></h4>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                          <div class="row">
                              <div class="col-lg-6">
                                <?php
                                    require_once('connection.php');
                                    $cn = new connection();
                                    $conn = $cn->connectDB();
                                    error_reporting(E_ALL ^ E_NOTICE);

                                    $ID = $_SESSION['id'];

                                    $query= "SELECT * FROM account WHERE user_id = '$ID'";
                                    $result= mysqli_query($conn, $query) or die ('Error: '.mysqli_error($conn));

                                    while($row = mysqli_fetch_row($result)) {
                                ?>
                                <div class="form-group">
                                  <label>Administrator ID</label>
                                  <input class="form-control" value="<?php echo $row[0]; ?>"  name="id" disabled />
                                  <p class="help-block"></p>
                                </div>
                                <div class="form-group">
                                  <label>Username</label>
                                  <input class="form-control" value="<?php echo $row[5]; ?>" name="username" disabled />
                                  <p class="help-block"></p>
                                </div>
                                <div class="form-group">
                                  <label>First name</label>
                                  <input class="form-control" value="<?php echo $row[1]; ?>" name="firstname" disabled />
                                  <p class="help-block"></p>
                                </div>
                                <div class="form-group">
                                  <label>Last name</label>
                                  <input class="form-control" value="<?php echo $row[2]; ?>" name="lastname" disabled />
                                  <p class="help-block"></p>
                                </div>
                                <div class="form-group">
                                  <label>Email</label>
                                  <input class="form-control" value="<?php echo $row[3]; ?>" name="email" disabled />
                                  <p class="help-block"></p>
                                </div>
                                <div class="form-group">
                                  <label>Contact Number</label>
                                  <input class="form-control" value="<?php echo '0' . $row[4]; ?>" name="contact" disabled />
                                  <p class="help-block"></p>
                                </div>
                                <a href="edit_admin.php?id=<?php echo $row[0]; ?>" style="background-color:lightblue;" class="btn btn-default">Edit this profile</a>
                                <?php
                                  }
                                  $cn->closeDB();
                                ?>
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
