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
	<!-- PHP -->

<!-- Confirmation Message -->
	<div id="page-wrapper" align="Center" style="padding:100px">
	<?php

			$connection= mysqli_connect('localhost','root','');
			mysqli_select_db($connection,'sjhs');


				$Fee_code = isset($_POST['code']) ? $_POST['code'] : '';
				$Description = isset($_POST['description']) ? $_POST['description'] : '';
				$Amount = isset($_POST['amount']) ? $_POST['amount'] : '';


				$query= "UPDATE fees SET Fee_code='".$Fee_code."', Description='".$Description."', Amount='".$Amount."' where Fee_code='".$Fee_code."'";

			 $result= mysqli_query($connection, $query) or die("Error: " . mysqli_error($connection));
			 mysqli_close($connection);

?>
	<h1> Successfully Updated </h1>
	<a href='editrecords_assessment.php' class="btn btn-default" role="button" style="background-color: lightblue; text-align: right"> Update New Assessment</a>
	</div>
	 <!-- Footer -->
        <footer class="text-center" style="position: fixed; bottom: 0; width: 100%; background-color: #fff; font-size: 10px">
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
