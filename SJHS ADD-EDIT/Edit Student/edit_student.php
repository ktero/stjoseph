<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Transactions</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

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
              <a> <img src="sjhs.png" style="width:40px;height:40px;"> </a> <a href="index.html">St. Joseph High School</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li class="divider"></li>
                        <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                       
                       
                        <li>
                            <a href="#">Student Record<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                 <li>
                                    <a href="home.html">Home</a>
                                </li>
								<li>
                                    <a href="formadd.php">Add Record</a>
                                </li>
                                <li>
                                    <a href="formedit.html">Edit Record</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                       
                        <li>
                            <a href="#">Financial Transactions<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                 <li>
                                    <a href="formpayment.html">Student Payment</a>
                                </li>
								<li>
                                    <a href="Assessment.html">Assessment Card</a>
									</li>
								<li>
                                    <a href="accounts.html">Statement of Accounts</a>
									<li>
                               
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                       
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Record</h1>
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
								
								
                                    <!-- PHP FORM -->
									<?php
									$studentedit_key=$_GET['studentedit_key'];
									$connection= mysql_connect('localhost','root','');
									mysql_select_db('sjhs');
									
									$query= "SELECT * FROM student WHERE StudentID=$studentedit_key";
									$result= mysql_query($query) or die ('Error in query: $query.'.mysql_error());
									
									
									echo "<form role='form' action='update_student.php' method='get'>";
									
										if (mysql_num_rows($result)>0)
										{
											while($row = mysql_fetch_row($result))
											{
											// Notice: Student ID cannot be edited
											echo "<div class='form-group'>
												<label>Student ID</label>
												<input class='form-control' name='StudentID' value= $row[0] readonly>
												</div>";
												
											echo "<div class='form-group'>
												<label>Last Name</label>
												<input class='form-control' name='Lname' value=$row[1] data-validation-required-message>
												</div>";
												
											echo "<div class='form-group'>
												<label>First Name</label>
												<input class='form-control' name='Fname' value= $row[2] data-validation-required-message>
												</div>";
												
											echo "<div class='form-group'>
												<label>Middle Name</label>
												<input class='form-control' name='Mname' value= $row[3]>
												</div>";
												
											echo "<div class='form-group'>
												<label>Gender</label><br>
												<input type='radio' name='Gender' value='male'/>Male<br>
												<input type='radio' name='Gender' value='female'/>Female
												</div>";
												
											echo "<div class='form-group'>
												<label>Address</label>
												<input class='form-control' name='Address' value=$row[5]>
												</div>";
												
											}
										}
										echo "</form>";
										$result= mysql_query($query);
										?>
									
									<!-- PHP CODE FOR DROP DOWN -->
									
									<div class="form-group" action='update_student.php' method='get'>
										<label>Level Code</label>
										<select>
										<option>Choose Code</option>
										<?php
										$connection= mysql_connect('localhost','root','');
										mysql_select_db('sjhs');
									
										$query= "SELECT Level_code FROM level";
										$result= mysql_query($query) or die ('Error in query: $query.'.mysql_error());
										
										while ($row= mysql_fetch_array($result))
											{
											$Level_code = $row['Level_code'];
												echo "<option value='$Level_code' name='Level_code'>$Level_code</option>";
											}
										
										$result= mysql_query($query);
										?>
										</select>
									</div>
									
									<!-- CONTINUATION OF FORM -->
									<?php
									$studentedit_key=$_GET['studentedit_key'];
									$connection= mysql_connect('localhost','root','');
									mysql_select_db('sjhs');
									
									$query= "SELECT * FROM student WHERE StudentID=$studentedit_key";
									$result= mysql_query($query) or die ('Error in query: $query.'.mysql_error());
									
									
									echo "<form role='form' action='update_student.php' method='get'>";
									
										if (mysql_num_rows($result)>0)
										{
											while($row = mysql_fetch_row($result))
											{
											echo "<div class='form-group'>
												<label>Date Enrolled</label>
												<input type='date' name='Date_enrolled' value=$row[7]>
												</div>";
												
											echo "<div class='form-group'>
												<label>School Year</label>
												<input class='form-control' name='SY' value=$row[8]>
												</div>";
	
											}
										}
										
										else
											{
												echo"<div id='page-wrapper' align='Center' style='padding:100px'>
												<h1> Record Not Found </h1>
												<a href='formedit_student.html' class='btn 	btn-default' role='button' style='background-color: lightblue; text-align: right'> Back </a>
												</div>";
											}
										
										echo "<button type='submit' style='background-color:lightblue' class='btn btn-default'>Update Record</button>";
										echo "</form>";
										$result= mysql_query($query);
									?>
									
									<!-- PHP CODE END -->
									
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
				<hr>
					<div data-role="footer" data-position="fixed" align="center">
							<p>St. Joseph High School</p>
							<p>Santiago St., Talakag, Bukidnon</p>
							<p>Project Team</p>
							<p>(Am`is, Bobadilla, Doutan, Jamero, Lapuz, Malaya, Palacios, Papa, Serra, Tabogga)</p>
							<p>Copyright &copy; 2017</p>
					</div>
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
