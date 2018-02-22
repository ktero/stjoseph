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
                        <h1 class="page-header">Edit Record</h1>
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
                                        <!-- PHP FORM -->
                                        <?php
									error_reporting(E_ALL ^ E_NOTICE);
                                    
									$edit_key = isset($_GET['assessmentedit_key']) ? mysqli_real_escape_string($conn, $_GET['assessmentedit_key']) : '';
                                        
									require_once('connection.php');
                                    $cn = new connection();
                                    $conn = $cn->connectDB();
									
									$query= "SELECT * FROM fees WHERE Fee_code='".$edit_key."'";
									$result= mysqli_query($conn, $query) or die ('Error in query: '.mysqli_error($conn));
									
									
									echo "<form action='updateassessment_form.php' method='post'>";
									
										if (mysqli_num_rows($result)>0)
										{
											while($row = mysqli_fetch_row($result))
											{
											
											echo "<div class='form-group'>
												<label>Fee Code</label>
												<input class='form-control' value='".$row[0]."' disabled='disabled' data-validation-required-message>
												<input type='hidden' name='code' value='".$row[0]."'>
												</div>";
												
											echo "<div class='form-group'>
												<label>Description</label>
												<input name='desc' class='form-control' value='".$row[1]."' data-validation-required-message>
												</div>";
												
											echo "<div class='form-group'>
												<label>Amount</label>
												<input name='amount' class='form-control' value='".$row[2]."' data-validation-required-message>
												</div>";
											}
										}
										else
										{
										echo"<div id='page-wrapper' align='Center' style='padding:100px'>
										<h1> Record Not Found </h1>
										<a href='editassessment2.php' class='btn btn-default' role='button' style='background-color: lightblue; text-align: right'> Back </a>
										</div>";
										}
										
										echo "<button type='submit' style='background-color:lightblue' class='btn btn-default'>Submit</button>";
									echo "</form>";
									$cn->closeDB();
									?>
                                    </div>
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

        </div>
        <!-- /#wrapper -->

        <hr>

        <!-- Footer -->
        <footer class="text-center" style="bottom: 0; width: 100%; background-color: #fff; font-size: 10px">
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
