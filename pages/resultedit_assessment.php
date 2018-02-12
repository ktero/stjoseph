<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once('../include/head.php') ?>
</head>

<header style="padding: 0; margin: 0;">
	<div id="wrapper">
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

          <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                          <li>
                            <a href="#">Admin Records<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">   
                           <li>
                                    <a href="#">Student<span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                    <a href="addstudent.php">Add Records</a>
                                </li>
                                <li>
                                    <a href="editstudent.php">Edit Records</a>
                                </li>
								</ul>
								
								
								 <!-- /.nav-third-level -->
								
								<li>
                                    <a href="#">Assessment<span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
									 <li>
                                    <a href="addassessment.php">Add Records</a>
                                </li>
								  <li>
                                    <a href="editassessment2.php">Edit Records</a>
                                </li>
														
								</ul>
								</li>
														
								<!-- /.nav-third-level -->
								</li>
									 </ul>
								 <!-- /.nav-second-level -->
						<li>
                            <a href="#">Student Records<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                               <li>
                                    <a href="home.php">All Students</a>
                                </li>
								
                            </ul>
							   </li>
                            <!-- /.nav-second-level -->
                        <li>
                            <a href="#">Financial Transactions<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
									<li>
                                    <a href="formpayment.php">Student Payment</a>
                                </li>
								<li>
                                    <a href="Assessment.php">Assessment</a>
									</li>
								
                            </ul>
							</li>
                            <!-- /.nav-second-level -->

                        
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
	</div>
</header>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
				
                    <h1 class="page-header">Edit Records</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
			
			<!-- PHP CODE HERE -->
			<div class="container" style="padding:200px 10px 20 px 10px">
			<?php
			
			$search_value = isset($_POST['Fee_code']) ?$_POST['Fee_code'] : '';
			$connection = mysqli_connect ('localhost','root','');
			mysqli_select_db ($connection, 'sjhs');
			
			$query = "SELECT * FROM fees WHERE Fee_code LIKE '%$search_value%' ";
			$result = mysqli_query($connection, $query);
			
			echo "<ol>";
				if (mysqli_num_rows($result)>0)
				{
					while($row = mysqli_fetch_row($result))
					{
						?>
						<table border="1" cellpadding="10" width="80%">
							<tr style="padding: 5px;">
								<th>Fee Code</th>
								<th>Description</th>
								<th>Amount</th>
							
							</tr>
							<tr class="text-center">
								<td><?php echo $row[0]; ?></td>
								<td><?php echo $row[1]; ?></td>
								<td><?php echo $row[2]; ?></td>
						
							</tr>
							
							<a href='edit_assessment.php?assessmentedit_key=<?php echo $row[0]; ?>' class='btn btn-default' style='background-color: lightblue'> Edit </a>
						</table>
						<?php
					}
				}
			else
			{
				echo "Assessment Record Not Found";
				
			}
			echo "</ol>";
			mysqli_free_result($result);
			mysqli_close($connection);
				
			?>
			</div>
			<!-- PHP CODE END -->

			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>


        <!-- Footer -->
        <footer class="text-center" style="position: absolute; padding-right: 400px; margin-bottom: 0; width: 100%; background-color: #fff; font-size: 10px">
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
