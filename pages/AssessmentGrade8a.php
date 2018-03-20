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
                    <h1 class="page-header">Assessment</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
             <tbody>
              <tr>
                <td>
                  <!-- Split button -->
                  <div class="no-print">
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
                       <li><a href="AssessmentGrade11a.php">Grade 11</a></li>
                       <li><a href="AssessmentGrade12a.php">Grade 12</a></li>

                      </ul>
                    </div>
                  </div>
                </td>
				<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h1> Grade 8 List of Payments </h1>
						</div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Fee Code</th>
                                        <th>Description</th>
										<th>Amount (In Philippine Peso)</th>

                                    </tr>
                                </thead>
                                <tbody>
								<?php
										$tot = 0;
										$tro = 0;

                                        require_once('connection.php');
                                        $cn = new connection();
                                        $conn = $cn->connectDB();

										$query = 'SELECT * FROM fees WHERE Fee_code NOT IN ("Gr7", "Gr9", "Gr10", "Gr11", "Gr12", "MF27", "MF26", "MF28", "MF29", "MF30", "MF31", "MF32")';
										$result = mysqli_query($conn, $query);

										while($row = mysqli_fetch_row($result))
										{
											$tro = $row[2];
											$tro = number_format($tro, 2, '.', ', ');
											?>
											<tr>
												<td><?php echo $row[0]; ?></td>
												<td><?php echo $row[1]; ?></td>
												<td><?php echo $tro; ?></td>
											</tr>
											<?php
												$tot = $tot + $row[2];
										}
										$tot = number_format($tot, 2, '.', ', ');
                                        $cn->closeDB();
									?>
										<tr>
											<td colspan="2" style="text-align: right;"><strong>TOTAL:</strong></td>
											<td>&#x20B1; <?php echo $tot; ?></td>
										</tr>
								</tbody>
                            </table>
                            <!-- /.table-responsive -->

</div>
  </td>
   </tr>
     <tfoot>

   </tr>
   <tr>
     <div class="no-print">
       <td valign="bottom" align="right">
       <button onclick="myFunction()"  class="btn btn-default pull-right" >Print this page</button>
     </div>
         <script>
           function myFunction() {
               window.print();
           }
         </script>
       </td>
     </div>
  </tr>

</tfoot>


    </div>
    <!-- /#wrapper -->
<br>
    <!-- /#wrapper -->

        <!-- Footer -->
        <div class="no-print">
          <footer class="text-center" style="bottom: 0; width: 100%; background-color: #fff; font-size: 10px">
              <div class="row">
                  <?php require_once('../include/footer.php'); ?>
              </div>
          </footer>
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
