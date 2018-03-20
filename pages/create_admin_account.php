<?php
  require_once('../include/system-description.php');
   require_once('../include/sessionstart.php');
?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <?php require_once('../include/head.php'); ?>
    </head>

    <body style="overflow-x: hidden;">

        <div id="wrapper">
            <!-- Navigation -->
            <?php require_once('../include/navdiv-title.php'); ?>
        </div>
        <!-- /#wrapper -->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Sign up Account</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          <h4>Admin Account</h4>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                          <div class="row">
                              <div class="col-lg-6">
                                <form name= "input" action= "create_admin_account.php" method= "post">
                                <div class="form-group">
                                        <label>Staff ID</label>
                                        <input type="text" class="form-control" name="StaffID" required data-validation-required-message>
                                        <p class="help-block"></p>
                                </div>
                                <div class="form-group">
                                        <label>First Name</label>
                                        <input type="text" class="form-control" name="Fname" required data-validation-required-message>
                                        <p class="help-block"></p>
                                    </div>
                                <div class="form-group">
                                        <label>Last Name</label>
                                        <input type="text" class="form-control" name="Lname" required data-validation-required-message>
                                        <p class="help-block"></p>
                                </div>
                                <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control"  name="email" required data-validation-required-message>
                                        <p class="help-block"></p>
                                    </div>
                                <div class="form-group">
                                        <label>Contact Number</label>
                                        <input type="text" class="form-control" name="pnumber" required data-validation-required-message>
                                        <p class="help-block"></p>
                                </div>
                                <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" class="form-control" name="username" required data-validation-required-message>
                                        <p class="help-block"></p>
                                </div>
                                <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" name="password" required data-validation-required-message>
                                        <p class="help-block"></p>
                                </div>
                                <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input type="password" class="form-control" name="cpassword" required data-validation-required-message>
                                        <p class="help-block"></p>
                                </div>
                                <!-- Submit Button -->
                                <input type="submit" style ="background-color:lightblue" class="btn btn-default" name="submit"></button>

                                </form>

<?php
  if(isset($_POST['submit'])) {

    require_once('connection.php');
    $cn = new connection();
    $conn = $cn->connectDB();

    $staffID = isset($_POST['StaffID']) ? mysqli_real_escape_string($conn, $_POST['StaffID']) : '';
    $fname = isset($_POST['Fname']) ? mysqli_real_escape_string($conn, $_POST['Fname']) : '';
    $lname = isset($_POST['Lname']) ? mysqli_real_escape_string($conn, $_POST['Lname']) : '';
    $email = isset($_POST['email']) ? mysqli_real_escape_string($conn, $_POST['email']) : '';
    $contact = isset($_POST['pnumber']) ? mysqli_real_escape_string($conn, $_POST['pnumber']) : '';
    $username = isset($_POST['username']) ? mysqli_real_escape_string($conn, $_POST['username']) : '';
    $password = isset($_POST['password']) ? mysqli_real_escape_string($conn, $_POST['password']) : '';
    $checkPass = isset($_POST['cpassword']) ? mysqli_real_escape_string($conn, $_POST['cpassword']) : '';

    if(strcmp($password, $checkPass) == 0) {
      // Encrypt password
      $hashPassword = password_hash($password, PASSWORD_DEFAULT);
      // Insert user details into database
      $query = "INSERT INTO account SET user_id = '$staffID', fname = '$fname', lname = '$lname', email = '$email', pnumber = '$contact', username = '$username', password = '$hashPassword'";

      if(mysqli_query($conn, $query) == true) {
        session_destroy();
        echo '<meta http-equiv="refresh" content="0;url=login.php?cmd=account-created"';
      } else
        echo '<meta http-equiv="refresh" content="0;url=create_admin_account.php?cmd=error"';
    } else
         echo '<meta http-equiv="refresh" content="0;url=create_admin_account.php?cmd=password-not-match"';
  }
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
