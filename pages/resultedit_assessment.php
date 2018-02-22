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
