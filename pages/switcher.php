<?php
   require_once('../include/sessionstart2.php');
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
                        <form method="POST" name="input" action="../include/dbchecker.php">
                <fieldset>
                                <div class="form-group">
                                    <label>Select School Year:</label>
                                </div>
                                <div class="form-group">
                                    <?php
                                        require_once('connection.php');
                                        $cn   = new connection();
                                        $conn = $cn->connectDB('');
                                        $set = mysqli_query($conn, "SHOW DATABASES");
                                        $dbs = array();
                                        while($db = mysqli_fetch_row($set)){
                                            $dbs[] = $db[0];
                                        }
                                    ?>
                                    <select name="input" style="padding: 5px; cursor: pointer;">
                                        <?php foreach ($dbs as $value):  ?>
                                        <option value="<?php echo $value; ?>"><?php echo $value; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <style type="text/css" >button:hover{text-decoration: none;}</style>
                                <button type="submit" name="submit" class="btn btn-lg btn-success btn-block">Use School Year</button>
                                <button type="submit" name="submit" class="btn btn-lg btn-success btn-block"><a href="creator.php" style="color:white"> Create School New Year </a></button>

                            </fieldset>
                        </form>
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
