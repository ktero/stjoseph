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
                    <h1 class="page-header">Assessment</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
             <tbody>
              <tr>
                <td>
                  <!-- Split button -->
                  <div class="btn-group">
                    <button type="button" class="btn btn-default"><i class=""></i> Year Level</button>
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                      <span class="caret"></span>
                      <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                     <li><a href="AssessmentGrade7a.php">Grade 7</a></li>
                      <li><a href="AssessmentGrade8a.php">Grade 8</a></li>
                      <li><a href="AssessmentGrade9a.php">Grade 9</a></li>
					  <li><a href="AssessmentGrade10a.php">Grade 10</a></li>
                    </div>
					</td>
              </tr>
                
  </tbody>



    </div>
    <!-- /#wrapper -->
	  </div>
    <!-- /#wrapper -->

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
