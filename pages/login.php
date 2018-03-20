<!--
CSLP Project: St. Joseph High School of Talakag Profiling and Financial System.
Brief Description: A small profiling and financial system that track student records and transactions.

Developers:
- Jamrod Buat
- Philip Endiape
- Marvin Fuentes (Project leader)
- Justine Fumar
- Kenneth Tero

Copyright © 2017-2018 All rights reserved.
-->
<?php
    session_start();
    // Redirect back to index page if user has logged in
    if(isset($_SESSION['id']))
      header('Location: index.php?');
    // Initialize session variables
    function setSessionVariables($row) {
        $_SESSION['id'] = $row['user_id'];
        $_SESSION['fname'] = $row['fname'];
        $_SESSION['lname'] = $row['lname'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['pnumber'] = $row['pnumber'];
        $_SESSION['age'] = $row['age'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['password'] = $row['password'];

        // Set session time and expiration.
        $_SESSION['start'] = time(); // Time logged in.
        $_SESSION['expire'] = $_SESSION['start'] + (30 * 60); // Time of expiration of session.
        header('Location: login.php?login=success');
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once('../include/head.php'); ?>
</head>

<body style="overflow-x: hidden;">

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-body">
                        <center style="padding: 0px; margin: 0px;">
                          <img src="graphics/logo_sjhs.png" alt="sjhs-logo" height="250px" />
                        </center>
                        <form method="post" name="aform" target="_top" role="form">
                <fieldset>
                                <div class="form-group">
                                    <label>Username:</label>
                                    <input class="form-control" placeholder="Username" name="username" type="Username" autofocus>
                                </div>
                                <div class="form-group">
                                    <label>Password:</label>
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <!--
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                -->
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" name="submit" value="Enter" class="btn btn-lg btn-success btn-block">
                            </fieldset>
                        </form>
<?php
    // Perform input validation process.
    if(isset($_POST['submit'])) {
        // Set up database connection/
        require_once('connection.php');
        $cn = new connection();
        $conn = $cn->connectDB();
        // error_reporting(E_ALL ^ E_NOTICE);


        $user = isset($_POST['username']) ? mysqli_real_escape_string($conn, $_POST['username']) : '';
        $pass = isset($_POST['password']) ? mysqli_real_escape_string($conn, $_POST['password']) : '';

		    if(empty($user) || empty($pass)) {
            echo "<br /><center><p>You must fill up these fields</p></center>";
        }
        else if (!empty($user) && !empty($pass)) {
            // Perform verification procedures
            $query = "SELECT * FROM account WHERE username = '$user'";
            $result = mysqli_query($conn, $query);
            $resultCheck = mysqli_num_rows($result);

            if ($resultCheck > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    // De-hash password
                    $hashCheck = password_verify($pass, $row['password']);
                    if($user == $row['username']) {
                        if($hashCheck == true) {
                            // Login user
                            setSessionVariables($row);
                        } else {
                          echo "<br /><center><p>Invalid username or password.</p></center>";
                        }
                    } else {
                      echo "<br /><center><p>Invalid username or password.</p></center>";
                    }
                }
            } else {
              header('Location: login.php?login=user-not-found');
            }
        }
	   }

     /* In case of error:
      *  if($pass == $row['password']) {
      *    setSessionVariables($row);
      *  }
      *
      */
?>
                    </div>
                </div>
            </div>
        </div>
    </div>
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

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
