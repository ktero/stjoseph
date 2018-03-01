<?php
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
                    <h1 class="page-header">Verify administrator</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          <h5>Enter username and password for verifcation procedures.</h5>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                          <div class="row">
                              <div class="col-lg-6">
                                <form name= "input" action= "pre_sign_up.php" method= "post">
                                <input type="hidden" class="form-control" name="id_pass" value="<?php echo $_SESSION['id']; ?>">
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
                                <!-- Go back -->
                                <a href="admin_account.php" style="background-color:lightblue;" class="btn btn-default">Back</a>
                                <!-- Submit Button -->
                                <input type="submit" style ="background-color:lightblue" class="btn btn-default" name="submit"></button>
                                </form>

<?php
  if(isset($_POST['submit'])) {

    require_once('connection.php');
    $cn = new connection();
    $conn = $cn->connectDB($_SESSION['database']);

    $id = isset($_POST['id_pass']) ? mysqli_real_escape_string($conn, $_POST['id_pass']) : '';
    $username = isset($_POST['username']) ? mysqli_real_escape_string($conn, $_POST['username']) : '';
    $password = isset($_POST['password']) ? mysqli_real_escape_string($conn, $_POST['password']) : '';

    $query = "SELECT * FROM account WHERE user_id = '$id' AND username = '$username'";
    $result = mysqli_query($conn, $query);
    if($result == true) {
      if($row = mysqli_fetch_row($result)) {
        // Decrypt password
        $checkPassword = password_verify($password, $_SESSION['password']);
        if($checkPassword == true) {
          echo '<meta http-equiv="refresh" content="0;url=create_admin_account.php?cmd=successful-verification"';
        } else {
          echo '<meta http-equiv="refresh" content="0;url=pre_sign_up.php?cmd=password-not-match"';
        }
      } else {
        echo '<meta http-equiv="refresh" content="0;url=pre_sign_up.php?cmd=account-not-found"';
      }
    } else {
      echo '<meta http-equiv="refresh" content="0;url=pre_sign_up.php?cmd=invalid-administrator"';
    }
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
