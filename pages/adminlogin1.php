<?php
	
    require_once('connection.php');
    $cn = new connection();
    $conn = $cn->connectDB();
	
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <?php require_once('../include/head.php') ?>
    </head>

    <body>

        <div style="text-align: center;">
            <div style="box-sizing: border-box; display: inline-block; width: auto; max-width: 450px; background-color: #FFFFFF; border: 2px solid #0361A8; border-radius: 5px; box-shadow: 0px 0px 8px #0361A8; margin: 20px auto auto;">
                <div style="background: #0361A8; border-radius: 5px 5px 0px 0px; padding: 15px;"><span style="font-family: verdana,arial; color: #D4D4D4; font-size: 1.00em; font-weight:bold;">Enter your login and password</span></div>
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
                    <form method="post" name="aform" action="adminlogin1.php">
                        <input type="hidden" name="action" value="login">
                        <input type="hidden" name="hide" value="">
                        <table class='center'>
                            <tr>
                                <td>First name:</td>
                                <td><input type="text" name="firstname"></td>
                            </tr>
                            <tr>
                                <td>Last name:</td>
                                <td><input type="text" name="lastname"></td>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td><input type="text" name="email"></td>
                            </tr>
                            <tr>
                                <td>Phone number:</td>
                                <td><input type="number" name="phonenumber"></td>
                            </tr>
                            <tr>
                                <td>Age:</td>
                                <td><input type="text" name="age"></td>
                            </tr>
                            <tr>
                                <td>Username:</td>
                                <td><input type="text" name="username"></td>
                            </tr>
                            <tr>
                                <td>Password:</td>
                                <td><input type="password" name="password"></td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td><input name="submit" type="submit" value="Enter"></td>
                            </tr>

                            <?php
    if(isset($_POST['submit']))
	{
        
        $user = mysqli_real_escape_string($conn, $_POST['username']);
        $pass = mysqli_real_escape_string($conn, $_POST['password']);
        $fname = mysqli_real_escape_string($conn, $_POST['firstname']);
        $lname = mysqli_real_escape_string($conn, $_POST['lastname']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $pnumber = mysqli_real_escape_string($conn, $_POST['phonenumber']);
        $age = mysqli_real_escape_string($conn, $_POST['age']);
        
		if(empty($user) || empty($pass)|| empty($fname)|| empty ($lname)|| empty ($email)|| empty ($pnumber)|| empty ($age))
		{
			echo "<p>You must fill up these fields</p>";
		}
		else if((!empty($user)) && (!empty($fname)) && (!empty($lname)) && (!empty($email)) && (!empty($pnumber)) && (!empty($age)))
		{
			$query = 'insert into account set fname="'.$fname.'", lname="'.$lname.'", email="'.$email.'", pnumber="'.$pnumber.'", age="'.$age.'", username="'.$user.'", password="'.password_hash($pass, PASSWORD_DEFAULT).'"';
			mysqli_query($conn, $query);
			header("location:/stjoseph/pages/adminlogin.php");
		}
	}
    $cn->closeDB();
?>

                        </table>
                    </form>
                </div>
            </div>
        </div>
        <!-- /#wrapper -->

        <!-- Footer -->
        <footer class="text-center" style="position: fixed; bottom: 0; width: 100%; background-color: #fff; font-size: 10px">
            <div class="row">
                <div class="text-center">
                    <hr>
                    <p>St. Joseph High School</p>
                    <p>Santiago St., Talakag, Bukidnon</p>
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

    </body>

    </html>