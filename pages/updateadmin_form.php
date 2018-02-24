<?php
   require_once('../include/sessionstart.php');

   function updateSessionVariables($id, $firstname, $lastname, $email, $contact, $username, $password) {
       $_SESSION['id'] = $id;
       $_SESSION['fname'] = $firstname;
       $_SESSION['lname'] = $lastname;
       $_SESSION['email'] = $email;
       $_SESSION['pnumber'] = $contact;
       $_SESSION['username'] = $username;
       $_SESSION['password'] = $password;
   }
?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <?php require_once('../include/head.php'); ?>
    </head>

    <header style="padding: 0; margin: 0;">
        <div id="wrapper">
            <?php require_once('../include/navdiv-title.php'); ?>
        </div>
    </header>

    <body>

        <div id="wrapper">
<?php
            require_once('connection.php');
            $cn = new connection();
            $conn = $cn->connectDB($_SESSION['database']);

            $hid = isset($_POST['orig_id']) ? mysqli_real_escape_string($conn, $_POST['orig_id']) : '';
            $id = isset($_POST['id']) ? mysqli_real_escape_string($conn, $_POST['id']) : '';
            $firstname = isset($_POST['firstname']) ? mysqli_real_escape_string($conn, $_POST['firstname']) : '';
            $lastname = isset($_POST['lastname']) ? mysqli_real_escape_string($conn, $_POST['lastname']) : '';
            $email = isset($_POST['email']) ? mysqli_real_escape_string($conn, $_POST['email']) : '';
            $contact = isset($_POST['contact']) ? mysqli_real_escape_string($conn, $_POST['contact']) : '';

            $user = isset($_POST['username']) ? mysqli_real_escape_string($conn, $_POST['username']) : '';
            $oldpass = isset($_POST['oldpassword']) ? mysqli_real_escape_string($conn, $_POST['oldpassword']) : '';

            $newpass = isset($_POST['newpassword']) ? mysqli_real_escape_string($conn, $_POST['newpassword']) : '';
            // $conpass = isset($_POST['conpassword']) ? mysqli_real_escape_string($conn, $_POST['conpassword']) : '';

            if($id == '' || $firstname == '' || $lastname == '' || $email == '' || $contact == '' || $user == '' || $oldpass == '' || $newpass == '') {
              echo '<meta http-equiv="refresh" content="0;url=admin_account.php" />';
            }
            else if(isset($id, $firstname, $lastname, $email, $contact, $oldpass, $newpass)) {

              // De-hash password
              $hashCheck  = password_verify($oldpass, $_SESSION['password']);

              // Note: If errors are present, remove if statements.
              if($hashCheck == true) {
                $hashPassword = password_hash($newpass, PASSWORD_DEFAULT);
                $query= "UPDATE account SET user_id = '$id', fname = '$firstname', lname = '$lastname', email = '$email', pnumber = '$contact', username = '$user', password = '$hashPassword'";

                $result = mysqli_query($conn, $query) or die('Error: ' .mysqli_error($conn));

                // Update sessions
                if($result == true)
                  updateSessionVariables($id, $firstname, $lastname, $email, $contact, $user, $hashPassword);
              } else {
                echo '<meta http-equiv="refresh" content="0;url=admin_account.php" />';
              }
              $cn->closeDB();
            }
  ?>


          <div id="page-wrapper" align="Center" style="padding-top: 100px">
          <h1> Successfully Updated Account</h1>
          <a href='admin_account.php' class="btn btn-default" role="button" style="background-color: lightblue; text-align: right"> View Account </a>
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
