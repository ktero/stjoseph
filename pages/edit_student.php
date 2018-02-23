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

    require_once('connection.php');
    $cn = new connection();
    $conn = $cn->connectDB($_SESSION['database']);

    error_reporting(E_ALL ^ E_NOTICE);

    $edit_key = isset($_GET['studentedit_key']) ? mysqli_real_escape_string($conn, $_GET['studentedit_key']) : '';

    $query= "SELECT * FROM student WHERE StudentID='".$edit_key."'";
    $result= mysqli_query($conn, $query) or die ('Error in query: $query.'.mysqli_error($conn));


    echo "<form action='updatestudent_form.php' method='post'>";

        if (mysqli_num_rows($result)>0)
        {
            while($row = mysqli_fetch_row($result))
            {

            echo "<input type='hidden' name='orig_sid' value='".$row[0]."'>";

            echo "<div class='form-group'>
                <label>Student ID</label>
                <input name='sid' class='form-control' value='".$row[0]."' data-validation-required-message>
                </div>";

            echo "<div class='form-group'>
                <label>Last Name</label>
                <input name='lname' class='form-control' value='".$row[1]."' data-validation-required-message>
                </div>";

            echo "<div class='form-group'>
                <label>First Name</label>
                <input name='fname' class='form-control' value='".$row[2]."' data-validation-required-message>
                </div>";

            echo "<div class='form-group'>
                <label>Middle Name</label>
                <input name='mname' class='form-control' value='".$row[3]."'>
                </div>";

            echo "<div class='form-group'>
                <label>Gender</label><br>";
                if($row[4] == Male)
                {
                    echo "<input name='gender' type='radio' value='Male' checked='checked' />Male<br>
                    <input name='gender' type='radio' value='Female'/>Female";
                }
                else if($row[4] == Female)
                {
                    echo "<input name='gender' type='radio' value='Male'/>Male<br>
                    <input name='gender' type='radio' value='Female' checked='checked' />Female";
                }
                else
                {
                    echo "<input name='gender' type='radio' value='Male'/>Male<br>
                    <input name='gender' type='radio' value='Female'/>Female";
                }
                echo "</div>";

            echo "<div class='form-group'>
                <label>Address</label>
                <input name='addr' class='form-control' value='".$row[5]."'>
                </div>";

            echo "
            <div class='form-group'>
                <label>Level Code</label>
                <select name='code'>
                    <option value='".$row[6]."' selected='true'> ".$row[6]." (Default) </option>
                    <option value='G7a'>G7a</option>
                    <option value='G7b'>G7b</option>
                    <option value='G8a'>G8a</option>
                    <option value='G8b'>G8b</option>
                    <option value='G9a'>G9a</option>
                    <option value='G9b'>G9b</option>
                    <option value='G10a'>G10a</option>
                    <option value='G11a'>G11a</option>
                    <option value='G12a'>G12a</option>
                </select>
            </div>
            ";

            echo "<div class='form-group'>
                <label>Date Enrolled</label>
                <input name='denrolled' type='date' value='".$row[7]."'>
                </div>";

            echo "<div class='form-group'>
                <label>School Year</label>
                <input name='sy' class='form-control' value='".$row[8]."'>
                </div>";

            }
        }
        else
        {
        echo"<div id='page-wrapper' align='Center' style='padding:100px'>
        <h1> Record Not Found </h1>
        <a href='editstudent.php' class='btn btn-default' role='button' style='background-color: lightblue; text-align: right'> Back </a>
        </div>";
        }

        echo "<button type='submit' style='background-color:lightblue' class='btn btn-default'>Submit</button>";
    echo "</form>";
    $cn->closeDB();
?>
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
