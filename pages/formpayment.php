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
                    <h1 class="page-header">Fee</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Student Payment
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6" style="padding-bottom: 40px">
								<?php
                                    require_once('connection.php');
                                    $cn = new connection();
                                    $conn = $cn->connectDB();
									
									$sid = isset($_POST['StudentID']) ? $_POST['StudentID'] : '';
									$orn = isset($_POST['ORNo']) ? $_POST['ORNo'] : '';
									$code = isset($_POST['code']) ? $_POST['code'] : '';
									$desc = isset($_POST['description']) ? $_POST['description'] : '';
									$amount = isset($_POST['amount']) ? $_POST['amount'] : '';
									
									if(isset($_POST['submit']))
									{
										if( $sid == '' || $orn == '' || $code == '' || $amount == '' )
										{
											echo "<h4 style='border: thin solid #f77; border-radius: 8px; padding: 10px; background-color: #f77; color: white;'>Please fill-up everything.</h4>";
										}
										else if( $sid != '' || $orn != '' || $code != '' || $amount != '' )
										{
											$add = "INSERT INTO receipt SET ReceiptNo='$orn', StudentID='$sid', Fee_code='$code', Description='$desc', Amount='$amount'";
											$result = mysqli_query($conn, $add) or die("Error: ".mysqli_error($conn));
										}
									}
								?>
								<div style="float: left;">
                                    <form method="post" action="formpayment.php">
										<div><b>Student ID: <input type="text" name="StudentID"></div><br></b>
										<div><b>OR Number: <input type="text" name="ORNo"></div></b>
										<br>
                                        <!-- Dropdown with db -->
										<div class="form-group">
										<label>Fees</label>
                                            <select name="code">
											<option disabled="disabled" selected="selected">Choose Code</option>
												<?php
													$query= "SELECT * from fees";
													$result= mysqli_query($conn, $query) or die ("Not Found: ". mysqli_error($conn));
													
													while ($row= mysqli_fetch_row($result)) {
                                                        $desc = $row[1];
    													$code = $row[0];

														echo "<option value='$code'> $desc </option>";
													}
												?>
											</select>
                                        </div>
										<!-- End here -->
										<div class="form-group">
                                            <label>Amount</label>
                                            <input class="form-group" name="amount">
                                            <p class="help-block"></p>
                                        </div>
										
										<input type="submit" name="submit" style ="background-color:lightblue" class="btn btn-default" value="Add"><br>
								</div>
				<br>
				<div class="row">
                <div class="col-lg-14" style="left: 115%; top: 0; position: absolute;">
                    <div class="panel panel-default">
                        <div class="panel-heading" >
                            All Records Fees
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table style="position: relative; width: 90%" class="table table-striped table-bordered table-hover" >
                                <thead>
                                    <tr>
										<th>Student&nbsp;ID</th>
										<th>OR&nbsp;Number</th>
                                        <th>Fee&nbsp;Code</th>
										<th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
										<?php
											$am = 0;
											$totam = 0;
											$query = "SELECT * FROM receipt";
											$result = mysqli_query($conn, $query) or die("Error: ".mysqli_error($conn));
											
											while($row = mysqli_fetch_row($result))
											{
												$am = $row[4];
												$am = number_format($am, 2, '.', ',&nbsp;');
												if(isset($_POST['enter']))
												{
													$tra = "INSERT INTO student_pay_fees SET StudentID='".$row[1]."', Fee_code='".$row[2]."', Payment='".$row[4]."', ORNo='".$row[0]."'";
													$del = "DELETE FROM receipt WHERE ReceiptNo=".$row[0];
													mysqli_query($conn, $tra) or die("Error: ".mysqli_error($conn));
													mysqli_query($conn, $del) or die("Error: ".mysqli_error($conn));
													echo "<meta http-equiv='refresh' content='0' />";
												}
										?>
									<tr>
										<td><?php echo $row[1]; ?></td>
										<td><?php echo $row[0]; ?></td>
										<td><?php echo $row[2]; ?></td>
										<td><strong>&#x20B1;&nbsp;<?php echo $am; ?></strong></td>
									</tr>
										<?php
												$totam = $totam + $row[4];
											}
											$totam = number_format($totam, 2, '.', ',&nbsp;');
                                    
                                            $cn->closeDB();
										?>
								</tbody>
                            </table>
                           
                            <div><b>Total: <u>&nbsp;&#x20B1; <?php echo $totam; ?>&nbsp;</u></div><br>
							<div>
								<td valign="bottom" align="">
									<form method="post" action="formpayment.php">
										<input type="submit" name="enter" value="Enter" style="border: thin solid #eee; background-color: #add8e6; padding: 8px; border-radius: 5px">
									</form>
								</td>
							</div>
						</div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
			</div>
			
           
                                    </form>	
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
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
<br>
<br>
<br>
<br>
<br>

                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
																 <div class="btn btn-default" style="float:left;" role="button">
                <a href="home.php">View Student Records</a>
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
                <div class="col-lg-12 text-center">
				<hr>
                    <p>St. Joseph High School</p>
					<p>Santiago St., Talakag, Bukidnon</p>
					<p>Project Team</p>
					<p>(Am`is, Bobadilla, Doutan, Jamero, Lapuz, Malaya, Palacios, Papa, Serra, Tabboga)</p>
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
