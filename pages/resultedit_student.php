<?php
    session_start();
    $name = $_SESSION['fname'];
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
                        <div class="container" style="padding:200px 10px 20 px 10px; margin-bottom: 20px;">
                            <form name="input" action="resultedit_student.php" method="post" class="form-inline">
                                <div class="form-group">
                                    <label for="StudentID">StudentID:</label>
                                    <input type="text" class="form-control" id="student" name="StudentID" placeholder="eg. 20140000">
                                    <input type='submit' class='btn btn-default' value='Search' style="background-color: lightblue">
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                All Records
                            </div>
                            <div class="panel-body">
                                <table width="100%" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Id Number</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Middle Name</th>
                                            <th>Gender</th>
                                            <th>Address</th>
                                            <th>Year and Section</th>
                                            <th>Date Enrolled</th>
                                            <th>School Year</th>
                                            <th>  </th>
                                            <th>  </th>
                                        </tr>
                                    </thead>
                                    <tbody>
            <?php
                require_once('connection.php');
                $cn   = new connection();
                $conn = $cn->connectDB();

                if(isset($_POST['StudentID']))
                    $search_value = mysqli_real_escape_string($conn, $_POST['StudentID']);
                else
                    echo "<meta http-equiv='refresh' content='0;url=/stjoseph/pages/resultedit_student.php' />";

                $query = 'SELECT * FROM student WHERE StudentID LIKE "%'.$search_value.'%"';
                $result = mysqli_query($conn, $query);

                while($row = mysqli_fetch_row($result))
                {
            ?>
                                            <tr>
                                                <td>
                                                    <?php echo $row[0]; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row[2]; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row[1]; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row[3]; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row[4]; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row[5]; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row[6]; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row[7]; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row[8]; ?>
                                                </td>
                                                <td>
                                                    <a href='edit_student.php?studentedit_key=<?php echo $row[0]; ?>' class='btn btn-default' style='background-color: #69EC6B;'> Edit </a>
                                                </td>
                                                <td>
                                                    <a href='delete_student.php?studentedit_key=<?php echo $row[0]; ?>' class='btn btn-default' style='background-color: #EA6565;'> Delete </a>
                                                </td>
                                            </tr>
                <?php
				    }
                    $cn->closeDB();
                ?>
                                    </tbody>
                                </table>
                                <!-- /.table-responsive -->
                            </div>
                        </div>
                    </div>
                </div>



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
            </div>
        </div>
    </body>

    </html>