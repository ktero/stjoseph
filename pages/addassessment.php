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
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a> <img src="sjhs.png" style="width:40px;height:40px;"> </a> <a href="index.php">St. Joseph High School</a>
            </div>
            <!-- /.navbar-header -->
            <?php require_once('../include/account-section.php'); ?>
            <!-- /.navbar-top-links -->
            <?php require_once('../include/side-bar-options.php'); ?>
            <!-- /.navbar-static-side -->
        </nav>

                <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add Records</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Assessment
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form name= "input" action= "addassessment_2.php" method= "post">
                                        <div class="form-group">
                                            <label>Fee_code</label>
                                            <input class="form-control" placeholder="eg. CF0" name="Fee_code" required data-validation-required-message>
                                            <p class="help-block"></p>
                                        </div>
										<div class="form-group">
                                            <label>Description</label>
                                            <input class="form-control" placeholder="eg. Other fee" name="Description" required data-validation-required-message>
                                            <p class="help-block"></p>
                                        </div>
										<div class="form-group">
                                            <label>Amount</label>
                                            <input class="form-control" placeholder="eg. 0000000000" name="Amount" required data-validation-required-message>
                                            <p class="help-block"></p>
                                        </div>
										
										<!-- Submit Button -->
										<button type="submit" style ="background-color:lightblue" class="btn btn-default" value="submit">Submit</button>
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
	<!-- Footer -->
        <footer class="text-center" style="position: absolute; margin-bottom: 0; width: 100%; background-color: #fff; font-size: 10px">
            <div class="row">
                <?php require_once('../include/footer.php') ?>
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
