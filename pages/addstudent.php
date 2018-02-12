<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once('../include/head.php') ?>
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

            <ul class="nav navbar-top-links navbar-right">
               
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                       
                        <li><a href="adminlogin.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
             <?php require_once('../include/side-bar-options.php'); ?>
            <!-- /.navbar-static-side -->
        </nav>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add Record</h1>
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
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form name= "input" action= "addstudent_2.php" method= "post">
                                        <div class="form-group">
                                            <label>Student ID</label>
                                            <input class="form-control" placeholder="eg. 20140072" name="StudentID" required data-validation-required-message>
                                            <p class="help-block"></p>
                                        </div>
										<div class="form-group">
                                            <label>Last Name</label>
                                            <input class="form-control" placeholder="eg. Dela Cruz" name="Lname" required data-validation-required-message>
                                            <p class="help-block"></p>
                                        </div>
										<div class="form-group">
                                            <label>First Name</label>
                                            <input class="form-control" placeholder="eg. Joseph" name="Fname" required data-validation-required-message>
                                            <p class="help-block"></p>
                                        </div>
										<div class="form-group">
                                            <label>Middle Name</label>
                                            <input class="form-control" placeholder="eg. Santos" name="Mname">
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
												<select name='code'>
												  <option selected='true' disabled> Choose Code </option>
												  <option value='G7a'>G7a</option>
												  <option value='G7b'>G7b</option>
												  <option value='G8a'>G8a</option>
												  <option value='G8b'>G8b</option>
												  <option value='G9a'>G9a</option>
												  <option value='G9b'>G9b</option>
												  <option value='G10a'>G10a</option>
												</select>
											</div>
												
									
										<div class="form-group">
                                            <label>Date Enrolled</label>
                                            <input type= "date" name= "enrolled" value="yyyy-mm-dd">
                                            <p class="help-block"></p>
                                        </div>
										<div class="form-group">
                                            <label>School Year</label>
                                            <input class="form-control" placeholder="eg. 2017-2018" name="SY">
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
	
	<!-- Footer -->
        <footer class="text-center" style="bottom: 0; width: 100%; background-color: #fff; font-size: 10px">
            <div class="row">
                <div class="text-center">
					<hr>
                    <p>St. Joseph High School</p>
					<p>Santiago St., Talakag, Bukidnon</p>
					<p>Project Team: (Am`is, Bobadilla, Doutan, Jamero, Lapuz, Malaya, Palacios, Papa, Serra, Tabboga)</p>
					<p>Copyright &copy; 2017</p>
                </div>
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
