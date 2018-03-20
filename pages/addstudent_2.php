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
            <?php

              require_once('connection.php');
              $cn = new connection();
              $conn = $cn->connectDB();


              $StudentID = isset($_POST['StudentID']) ? mysqli_real_escape_string($conn, $_POST['StudentID']) : '';
              $Lname = isset($_POST['Lname']) ? mysqli_real_escape_string($conn, $_POST['Lname']) : '';
              $Fname = isset($_POST['Fname']) ? mysqli_real_escape_string($conn, $_POST['Fname']) : '';
              $Mname = isset($_POST['Mname']) ? mysqli_real_escape_string($conn, $_POST['Mname']) : '';
              $Gender = isset($_POST['gender']) ? mysqli_real_escape_string($conn, $_POST['gender']) : '';
              $Address = isset($_POST['Address']) ? mysqli_real_escape_string($conn, $_POST['Address']) : '';
              $code = isset($_POST['code']) ? mysqli_real_escape_string($conn, $_POST['code']) : '';
              $Date = isset($_POST['enrolled']) ? mysqli_real_escape_string($conn, $_POST['enrolled']) : '';
              $SY = isset($_POST['schoolyear']) ? mysqli_real_escape_string($conn, $_POST['schoolyear']) : '';

              // Validate data
              if(empty($StudentID) || empty($Lname) || empty($Fname) || empty($Mname) || empty($Gender) || empty($Address) || empty($code) || empty($Date))
              	echo '<meta http-equiv="refresh" content="0;url=addstudent.php?cmd=empty-inputs" />';
              else if(isset($StudentID, $Lname, $Fname, $Mname, $Gender, $Address, $code, $Date, $SY))
              {
                // Upload data into database
              	$query= "INSERT into student values('$StudentID','$Lname','$Fname','$Mname','$Gender','$Address','$code','$Date','$SY')";
              	$result= mysqli_query($conn, $query);

              	$cn->closeDB();
          	}
          	?>
        </div>



        <!-- Confirmation Message -->
      	<div id="page-wrapper" align="Center" style="padding-top: 100px">
      	<h1> Successfully Added </h1>
      	<a href='addstudent.php' class="btn btn-default" role="button" style="background-color: lightblue; text-align: right"> Add New </a>

        <a href='adminrecords.php' class="btn btn-default" role="button" style="background-color: lightblue; text-align: right"> View Level and Student Records  </a>
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
