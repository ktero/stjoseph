<?php
    session_start();
    function setSessionVariables($row) {
        $_SESSION['id'] = $row['user_id'];
        $_SESSION['fname'] = $row['fname'];
        $_SESSION['lname'] = $row['lname'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['pnumber'] = $row['pnumber'];
        $_SESSION['age'] = $row['age'];
        $_SESSION['username'] = $row['username'];
        header('Location: switcher.php?login=success');
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once('../include/head.php'); ?>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
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
    if(isset($_POST['submit']))
	{
        // Set up database connection/
        require_once('connection.php');
        $cn = new connection();
        $conn = $cn->connectDB('sjhs');
        // error_reporting(E_ALL ^ E_NOTICE);


        $user = isset($_POST['username']) ? mysqli_real_escape_string($conn, $_POST['username']) : '';

        $pass = isset($_POST['password']) ? mysqli_real_escape_string($conn, $_POST['password']) : '';

        /*
        $user = mysqli_real_escape_string($conn, $_POST['username']);
        $pass = mysqli_real_escape_string($conn, $_POST['password']);
        */

		if(empty($user) || empty($pass)) {
            echo "<p>You must fill up these fields</p>";
        }
        else if (!empty($user) && !empty($pass)) {

            $query = "SELECT * FROM account WHERE username = '$user'";
            $result = mysqli_query($conn, $query);
            $resultCheck = mysqli_num_rows($result);

            if ($resultCheck > 0) {

                if($row = mysqli_fetch_assoc($result)) {

                    $hashCheck = password_verify($pass, $row['password']);
                    if($user == $row['username']) {
                        if($pass == $row['password']) {
                            // Login user
                            setSessionVariables($row);
                        }
                        else if($hashCheck == true) {
                            // Login user
                            setSessionVariables($row);
                        }
                    }
                }
            }
             /*
            $query = mysqli_query($conn,'select * from account');
            while($row = mysqli_fetch_row($query))
            {
                if((!empty($user)) && (!empty($pass)))
                {
                    if($user==$row[6] && $pass==$row[7])
                    {
                        echo "<meta http-equiv='refresh' content='0;url=/stjoseph/pages/index.php' />";
                    }
                }
            }
            */
        }
	}
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
                <div class="col-lg-12 text-center">
                    <p>St. Joseph High School</p>
					<p>Santiago St., Talakag, Bukidnon</p>
					<p>Project Team</p>
					<p>Project Team: (Am`is, Bobadilla, Doutan, Jamero, Lapuz, Malaya, Palacios, Papa, Serra, Tabboga)</p>
					<p>Copyright &copy; 2017</p>
                </div>
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
