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
                    <h1 class="page-header">Edit Student</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          Student Profile
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

                                    $edit_key = isset($_GET['studentedit_key']) ? mysqli_real_escape_string($conn, $_GET['studentedit_key']) : '';

                                    $query= "SELECT * FROM student WHERE StudentID='".$edit_key."'";
                                    $result= mysqli_query($conn, $query) or die ('Error in query: $query.'.mysqli_error($conn));


                                    echo "<form action='updatestudent_form.php' method='post'>";

                                        if (mysqli_num_rows($result)>0)
                                        {
                                            while($row = mysqli_fetch_row($result))
                                            {

                                            echo "<input type='hidden' name='orig_sid' value='".$row[0]."'>";
                                            echo "<input type='hidden' name='orig_code' value='".$row[6]."'>";
                                            echo "<div class='form-group'>
                                                <label>Student ID</label>
                                                <input name='sid' class='form-control' value='".$row[0]."' data-validation-required-message>
                                                </div>";

                                            echo "<div class='form-group'>
                                                <label>Last Name</label>
                                                <input name='lname' class='form-control' value='".$row[1]."' data-validation-required-message>
                                                </div>";

                                            echo "<div class='form-group'>
                                                <label>First Name</label>
                                                <input name='fname' class='form-control' value='".$row[2]."' data-validation-required-message>
                                                </div>";

                                            echo "<div class='form-group'>
                                                <label>Middle Name</label>
                                                <input name='mname' class='form-control' value='".$row[3]."'>
                                                </div>";

                                            echo "<div class='form-group'>
                                                <label>Gender</label><br>";
                                                if($row[4] == Male)
                                                {
                                                    echo "<input name='gender' type='radio' value='Male' checked='checked' />Male<br>
                                                    <input name='gender' type='radio' value='Female'/>Female";
                                                }
                                                else if($row[4] == Female)
                                                {
                                                    echo "<input name='gender' type='radio' value='Male'/>Male<br>
                                                    <input name='gender' type='radio' value='Female' checked='checked' />Female";
                                                }
                                                else
                                                {
                                                    echo "<input name='gender' type='radio' value='Male'/>Male<br>
                                                    <input name='gender' type='radio' value='Female'/>Female";
                                                }
                                                echo "</div>";

                                            echo "<div class='form-group'>
                                                <label>Address</label>
                                                <input name='addr' class='form-control' value='".$row[5]."'>
                                                </div>";
                                            ?>
                                            <div class='form-group'>
                                                <label>Level Code</label><br />
                                                <select name='code' style="padding: 5px; cursor: pointer;">
                                                    <?php
                                                        $q2 = "SELECT * FROM level";
                                                        $r2 = mysqli_query($conn, $q2) or die('Error: ' . mysqli_error($conn));
                                                        while ($y = mysqli_fetch_row($r2)) {
                                                          $code = $y[0];
                                                          $level = $y[1];
                                                          $section = $y[2];
                                                          if($code != $row[6]) {
                                                            echo "<option value='$code'>$level - $section</option>";
                                                          } else {
                                                            echo "<option value='$code' selected='true'>$level - $section </option>";
                                                          }
                                                        }
                                                    ?>
                                                "</select>
                                            </div>
                                            <div class='form-group'>
                                                <label>School Year</label><br />
                                                <select name='schoolyear' style="padding: 5px; cursor: pointer; width: 50%;">
                                                    <?php
                                                        $q2 = "SELECT * FROM school_year";
                                                        $r2 = mysqli_query($conn, $q2) or die('Error: ' . mysqli_error($conn));
                                                        while ($y = mysqli_fetch_row($r2)) {
                                                          $syID = $y[0];
                                                          $sy = $y[1];
                                                          if($syID != $row[8]) {
                                                            echo "<option value='$syID'>$sy</option>";
                                                          } else {
                                                            echo "<option value='$syID' selected='true'>$sy </option>";
                                                          }
                                                        }
                                                    ?>
                                                "</select>
                                            </div>
                                            <?php
                                            echo "<div class='form-group'>
                                                <label>Date Enrolled</label><br />
                                                <input name='denrolled' type='date' value='".$row[7]."' style='padding: 5px; cursor: pointer; width: 50%;'>
                                                </div>";

                                            }
                                        }
                                        else
                                        {
                                        echo"<div id='page-wrapper' align='Center' style='padding:100px'>
                                        <h1> Record Not Found </h1>
                                        <a href='editstudent.php' class='btn btn-default' role='button' style='background-color: lightblue; text-align: right'> Back </a>
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
