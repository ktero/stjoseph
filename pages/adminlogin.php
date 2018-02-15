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
        echo "<meta http-equiv='refresh' content='0;url=/stjoseph/pages/index.php' />";
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once('../include/head.php'); ?>
</head>

<body>
    <div style="text-align: center;">
        <div style="box-sizing: border-box; display: inline-block; width: auto; max-width: 450px; background-color: #FFFFFF; border: 2px solid #0361A8; border-radius: 5px; box-shadow: 0px 0px 8px #0361A8; margin: 20px auto auto;">
            <div style="background: #0361A8; border-radius: 5px 5px 0px 0px; padding: 15px;"><span style="font-family: verdana,arial; color: #D4D4D4; font-size: 1.00em; font-weight:bold;">Enter your username and password</span></div>
            <div style="background: ; padding: 15px" id="ap_style">
                <style type="text/css" scoped>
                    #ap_style td {
                        text-align: left;
                        font-family: verdana, arial;
                        color: #064073;
                        font-size: 1.00em;
                    }

                    #ap_style input {
                        border: 1px solid #CCCCCC;
                        border-radius: 5px;
                        color: #666666;
                        display: inline-block;
                        font-size: 1.00em;
                        padding: 5px;
                    }

                    #ap_style input[type="text"],
                    input[type="password"] {
                        width: 100%;
                    }

                    #ap_style input[type="button"],
                    #ap_style input[type="reset"],
                    #ap_style input[type="submit"] {
                        height: auto;
                        width: auto;
                        cursor: pointer;
                        box-shadow: 0px 0px 5px #0361A8;
                        float: right;
                        text-align: right;
                        margin-top: 10px;
                        margin-left: 7px;
                    }

                    #ap_style table.center {
                        margin-left: auto;
                        margin-right: auto;
                    }

                    #ap_style .error {
                        font-family: verdana, arial;
                        color: #D41313;
                        font-size: 1.00em;
                    }
                </style>
                <form method="post" name="aform" target="_top">
                    <input type="hidden" name="action" value="login">
                    <input type="hidden" name="hide" value="">
                    <table class='center'>
                        <tr>
                            <td>Username:</td>
                            <td><input type="text" name="username"></td>
                        </tr>
                        <tr>
                            <td>Password:</td>
                            <td><input type="password" name="password"></td>
                        </tr>
<?php
    // Perform input validation process.
    if(isset($_POST['submit']))
	{
        // Set up database connection/
        require_once('connection.php');
        $cn = new connection();
        $conn = $cn->connectDB();
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
        $cn->closeDB();
	}
?>
                            <tr>
                                <td>&nbsp;</td>
                                <td><input name="submit" type="submit" value="Enter"></td>
                            </tr>
                            <tr>
                                <td colspan=2>&nbsp;</td>
                            </tr>
                            <tr>
                                <td colspan=2>Not a member yet? <a href="adminlogin1.php">Register here</a>.</td>
                            </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
    <!-- removed </div> -->

    <!-- Footer -->
    <footer class="text-center" style="position: absolute; bottom: 0; width: 100%; background-color: #fff; font-size: 10px">
        <?php require_once('../include/footer.php'); ?>
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