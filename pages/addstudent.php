<?php
  require_once('../include/system-description.php');
   require_once('../include/sessionstart.php');
?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <?php require_once('../include/head.php'); ?>
    </head>

    <body style="overflow-x: hidden;">

        <div id="wrapper">

            <!-- Navigation -->
            <?php require_once('../include/navdiv-title.php'); ?>
        </div>
        <!-- /#wrapper -->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add Student</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          <h4>Student Profile</h4>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                          <div class="row">
                              <div class="col-lg-6">
                                <form name= "input" action= "addstudent_2.php" method= "post">
                                    <div class="form-group">
                                        <label>Student ID</label>
                                        <input class="form-control" placeholder="Enter student's ID" name="StudentID" required data-validation-required-message>
                                        <p class="help-block"></p>
                                    </div>
                                <div class="form-group">
                                        <label>Last Name</label>
                                        <input class="form-control" placeholder="Enter student's last name" name="Lname" required data-validation-required-message>
                                        <p class="help-block"></p>
                                    </div>
                                <div class="form-group">
                                        <label>First Name</label>
                                        <input class="form-control" placeholder="Enter student's first name" name="Fname" required data-validation-required-message>
                                        <p class="help-block"></p>
                                    </div>
                                <div class="form-group">
                                        <label>Middle Name</label>
                                        <input class="form-control" placeholder="Enter student's middle name" name="Mname">
                                        <p class="help-block"></p>
                                    </div>
                                <div class="form-group">
                                <label>Gender</label><br>
                                <input type= "radio" name= "gender" value="Male"/> Male <p class="help-block"></p>
                                <input type= "radio" name= "gender" value="Female"/> Female <p class="help-block"></p>
                                <div class="form-group">
                                        <label>Address</label>
                                        <input class="form-control"  placeholder="Enter Address" name="Address">
                                        <p class="help-block"></p>
                                    </div>

                                <!-- Dropdown with db -->
                                <div class='form-group'>
                                <label>Level Code</label>
                                <br /><select name='code' style="padding: 5px; cursor: pointer; width: 50%;">
                                <option selected='true' disabled> Choose Code </option>
                                <?php
                                  require_once('connection.php');
                                  $cn = new connection();
                                  $conn = $cn->connectDB($_SESSION['database']);

                                  $query = "SELECT * from level";
                                  $result = mysqli_query($conn, $query) or die('
                                  Error: ' . mysqli_error());

                                  while ($row = mysqli_fetch_row($result)) {
                                    $code = $row[0];
                                    $level = $row[1];
                                    $section = $row[2];
                                    echo "<option value='$code'>$level - $section</option>";
                                  }
                                  $cn->closeDB();
                                ?>
                                </select>
                                </div>
                                <div class='form-group'>
                                  <label>School Year</label>
                                  <br /><select name='schoolyear' style="padding: 5px; cursor: pointer; width: 50%;">
                                  <option selected='true' disabled> Choose School Year </option>
                                  <?php
                                    require_once('connection.php');
                                    $cn = new connection();
                                    $conn = $cn->connectDB($_SESSION['database']);

                                    $query = "SELECT * from school_year";
                                    $result = mysqli_query($conn, $query) or die('
                                    Error: ' . mysqli_error());

                                    while ($row = mysqli_fetch_row($result)) {
                                      $syID = $row[0];
                                      $sy = $row[1];
                                      echo "<option value='$syID'>$sy</option>";
                                    }
                                    $cn->closeDB();
                                  ?>
                                  </select>
                                </div>
                                <div class="form-group">
                                        <label>Date Enrolled</label>
                                        <br /><input type= "date" name= "enrolled" value="yyyy-mm-dd" style="padding: 5px; cursor: pointer; font-size: 100%; width: 50%;">
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
