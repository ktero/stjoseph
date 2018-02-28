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
                        <h3 class="panel-title">School Year Database</h3>
                    </div>
                    <div class="panel-body">
                        <form method="POST" name="input" action="../include/dbchecker.php">
                <fieldset>
                                <div class="form-group">

                                </div>
                                <div class="form-group">
                                    <label>Select school year database:</label><br />
                                    <?php
                                        require_once('connection.php');
                                        $cn   = new connection();
                                        $conn = $cn->connectDB('');
                                        $set = mysqli_query($conn, "SHOW DATABASES");
                                        $dbs = array();
                                        while($db = mysqli_fetch_row($set)){
                                            if(substr_compare($db[0], 'sjhs', 0, 3) == 0)
                                                $dbs[] = $db[0];
                                        }
                                    ?>
                                    <select name="input"  style="width: 100%; padding: 5px; cursor: pointer;">
                                        <?php foreach ($dbs as $value):  ?>
                                        <option value="<?php echo $value; ?>"><?php echo $value; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <style type="text/css" >button:hover, a:hover{text-decoration: none;}</style>
                                <button type="submit" name="submit" class="btn btn-lg btn-success btn-block">Use School Year</button>
                                <br>
                                <a href="creator.php" style="color:white"><button type="button" name="create" class="btn btn-lg btn-success btn-block">Create new School Year Database</button></a>

                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
   <hr>

        \
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
