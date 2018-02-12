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

            <?php require_once('../include/side-bar-options.php'); ?>
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
				
                    <h1 class="page-header">Delete Records</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
			
			<!-- PHP CODE HERE -->
			<div class="container" style="padding:200px 10px 20 px 10px">
			<?php
			
            require_once('connection.php');
            $cn = new connection();
            $conn = $cn->connectDB();
                
			$search_value = isset($_POST['StudentID']) ?$_POST['StudentID'] : '';
			
			$query = "SELECT * FROM student WHERE StudentID LIKE '$search_value%' ";
			$result = mysqli_query($conn, $query);
			
			echo "<ol>";
				if (mysqli_num_rows($result)>0)
				{
					while($row = mysqli_fetch_row($result))
					{
						?>
						<table border="1" cellpadding="10" width="80%">
							<tr style="padding: 5px;">
								<th>Student ID</th>
								<th>Last Name</th>
								<th>First Name</th>
								<th>Middle Name</th>
								<th>Gender</th>
								<th>Address</th>
								<th>Section</th>
								<th>Date Enrolled</th>
								<th>School Year</th>
							</tr>
							<tr class="text-center">
								<td><?php echo $row[0]; ?></td>
								<td><?php echo $row[1]; ?></td>
								<td><?php echo $row[2]; ?></td>
								<td><?php echo $row[3]; ?></td>
								<td><?php echo $row[4]; ?></td>
								<td><?php echo $row[5]; ?></td>
								<td><?php echo $row[6]; ?></td>
								<td><?php echo $row[7]; ?></td>
								<td><?php echo $row[8]; ?></td>
							</tr>
							
							<a href='delete_student.php?studentedit_key=<?php echo $row[0]; ?>' class='btn btn-default' style='background-color: lightblue'> Delete </a>
						</table>
						<?php
					}
				}
			else
			{
				echo "Student Record Not Found";
				
			}
			echo "</ol>";
			mysqli_free_result($result);
			mysqli_close($conn);
				
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
