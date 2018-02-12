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

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                       
                      
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
                                    <a href="home.html">All Students</a>
                                </li>
								<li>
                                    <a href="ledger.html">Student Ledger</a>
									<li>
									<li>
                                    <a href="accounts.html">Statement of Account</a>
									<li>
								<li>
                                    <a href="formadd.php">Add Records</a>
                                </li>
                                <li>
                                    <a href="formedit_student.html">Edit Records</a>
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
                                    <a href="Assessment.html">Assessment</a>
									<li>
								<li>
                                    <a href="schoolledger.html">School Ledger</a>
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
				
                    <h1 class="page-header">Edit Records</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
<!-- PHP CODE STARTS HERE -->
<?php
			$connection= mysql_connect('localhost','root','');
			mysql_select_db('sjhs');
			
			// Problem: No errors but database doesn't Update
			// Problem: Line 7 to 13
				$StudentID= $_GET['StudentID'];
				$Lname= $_GET['Lname'];
				$Fname= $_GET['Fname'];
				$Mname= $_GET['Mname'];
				$Gender= $_GET['Gender'];
				$Address= $_GET['Address'];
				$Level_code= $_GET['Level_code'];
				
			// Okay na ni nga part
				$Date_enrolled= $_GET['Date_enrolled'];
				$SY= $_GET['SY'];
				
			$query= "UPDATE student SET Lname='$Lname', Fname='$Fname', Mname='$Mname', Gender='$Gender', Address='$Address', Level_code='$Level_code', Date_enrolled='$Date_enrolled', SY='$SY' where StudentID='$StudentID'";
			
				echo "<div id='page-wrapper' align='Center' 			style='padding:100px'>
					<h1> Record Updated </h1>
					<a href='formedit_student.html' class='btn 	btn-default' role='button' style='background-color: lightblue; text-align: right'> Back </a>
					</div>";
				$result= mysql_query($query);
				
?>
<!-- PHP CODE END HERE -->
<hr>

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