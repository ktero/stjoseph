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
            <?php require_once('../include/navdiv-title.php'); ?>
        <?php
            require_once('connection.php');
            $cn = new connection();
            $conn = $cn->connectDB();

            $code = isset($_POST['code']) ? mysqli_real_escape_string($conn, $_POST['code']) : '';
            $year = isset($_POST['year']) ? mysqli_real_escape_string($conn, $_POST['year']) : '';
            $section = isset($_POST['section']) ? mysqli_real_escape_string($conn, $_POST['section']) : '';

            if($year == '' || $section == '') {
              echo '<meta http-equiv="refresh" content="0;url=addclass.php?cmd=empty-inputs" />';
            }
            else if(isset($year, $section))
            {
              $query= "INSERT into level values('$code', '$year', '$section')";
              $result= mysqli_query($conn, $query) or die('Error: ' .mysqli_error($conn));
              $cn->closeDB();
            }
        ?>
        </div>



        <div id="page-wrapper" align="Center" style="padding-top: 100px">
        <h1> Successfully Added </h1>
        <a href='addclass.php' class="btn btn-default" role="button" style="background-color: lightblue; text-align: right"> Add New </a>
        <a href='adminrecords.php' class="btn btn-default" role="button" style="background-color: lightblue; text-align: right"> View Class &amp; Student Records  </a>
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
