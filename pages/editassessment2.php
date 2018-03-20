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
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">

                    <h1 class="page-header">Edit Records</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

			<!-- SEARCH STUDENT -->
				<div class="container" style="padding:200px 10px 20 px 10px">
				<form name="input" action="resultedit_assessment.php" method="post" class="form-inline">
					<div class="form-group">
						<label for="Fee_code">Fee Code:</label>
						<input type="text" class="form-control" id="fees" name= "Fee_code" placeholder="eg. CF0">
						<input type='submit' class='btn btn-default' value='Search' style="background-color: lightblue">
					</div>
				</form>
				</div>
			</div>

        <!-- Footer -->
        <footer class="text-center" style="position: fixed; bottom: 0; width: 100%; background-color: #fff; font-size: 10px">
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
