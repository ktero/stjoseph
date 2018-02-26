<?php
     require_once('../include/sessionstart.php');
  ?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
      <?php require_once('../include/head.php'); ?>
  </head>

  <header style="padding: 0; margin: 0;">
      <div id="wrapper">
          <?php require_once('../include/navdiv-title.php'); ?>
      </div>
  </header>

  <body>

      <div id="wrapper">

          <!-- Navigation -->
          <!-- PHP -->
          <?php
                      require_once('connection.php');
                      $cn = new connection();
                      $conn = $cn->connectDB($_SESSION['database']);

                      $orig_code = isset($_POST['orig_code']) ? mysqli_real_escape_string($conn, $_POST['orig_code']) : '';
                      $code = isset($_POST['code']) ? mysqli_real_escape_string($conn, $_POST['code']) : '';
                      $year = isset($_POST['year']) ? mysqli_real_escape_string($conn, $_POST['year']) : '';
                      $section = isset($_POST['section']) ? mysqli_real_escape_string($conn, $_POST['section']) : '';

                      if($year == '' || $section == '') {
                        echo '<meta http-equiv="refresh" content="0;url=editrecords_class.php" />';
                      }
                      else if(isset($year, $section))
                      {
                        $query= "UPDATE level SET Year_level = '$year', Section = '$section' WHERE Level_code = '$orig_code'";
                        $result= mysqli_query($conn, $query) or die('Error: ' .mysqli_error($conn));
                        $cn->closeDB();
                      }
            ?>
              <!-- Confirmation Message -->
              <div id="page-wrapper" align="Center" style="padding-top: 100px">
              <h1> Successfully Updated </h1>
              <a href='addclass.php' class="btn btn-default" role="button" style="background-color: lightblue; text-align: right"> Add New </a>
              <a href='adminrecords.php' class="btn btn-default" role="button" style="background-color: lightblue; text-align: right"> View Level and Student Records  </a>
              </div>
              <!-- Footer -->
              <hr>
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
      </div>
  </body>

  </html>
