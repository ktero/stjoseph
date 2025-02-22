<?php
  require_once('../include/system-description.php');
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
            <?php require_once('../include/navdiv-title.php'); ?>
        </div>
        <!-- /#wrapper -->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit assessment</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          Assessment Profile
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                          <div class="row">
                              <div class="col-lg-6">
                                <?php

                                    require_once('connection.php');
                                    $cn = new connection();
                                    $conn = $cn->connectDB();
                                    error_reporting(E_ALL ^ E_NOTICE);

                                    $edit_key = isset($_GET['feecode']) ? mysqli_real_escape_string($conn, $_GET['feecode']) : '';

                                    $query= "SELECT * FROM fees WHERE Fee_code = '$edit_key'";
                                    $result= mysqli_query($conn, $query) or die ('Error: '.mysqli_error($conn));


                                    echo "<form action='updateassessment_form.php' method='post'>";

                                        if (mysqli_num_rows($result)>0)
                                        {
                                            while($row = mysqli_fetch_row($result))
                                            {

                                            echo "<input type='hidden' name='orig_sid' value='".$row[0]."'>";
                                            echo "<div class='form-group'>
                                                <label>Fee code</label>
                                                <input name='code' class='form-control' value='".$row[0]."' data-validation-required-message>
                                                </div>";
                                            echo "<div class='form-group'>
                                                <label>Description</label>
                                                <input name='description' class='form-control' value='".$row[1]."' data-validation-required-message>
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
                                        <a href='editrecords_assessment.php' class='btn btn-default' role='button' style='background-color: lightblue; text-align: right'> Back </a>
                                        </div>";
                                        }

                                        echo "<button type='submit' style='background-color:lightblue' class='btn btn-default'>Submit</button>";
                                    echo "</form>";
                                    $cn->closeDB();
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
