<!DOCTYPE html>
<html lang="en">
<?php
	$servername = '140.138.77.98';
	$username = 'bigdata_team04';  //要改
	$password = '284gj4rm42l3xjp4'; 
	$dbname = '2016_bigdata_team04'; //要改
	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	if ($_POST[Sens_name])
		$sql ="INSERT INTO Sensors VALUES('$_POST[Sens_ID]', '$_POST[Sens_name]')";
	else if ($_POST[Rasp_model])
		$sql ="INSERT INTO Raspberry VALUES('$_POST[Rasp_ID]', '$_POST[Rasp_model]')";
	else if ($_GET[delete_Rasp])
		$sql ="DELETE FROM Raspberry WHERE Rasp_ID = '$_GET[delete_Rasp]'";
	else if ($_GET[delete_Sens])
		$sql ="DELETE FROM Sensors WHERE Sens_ID = '$_GET[delete_Sens]'";
	
		
	mysqli_query($conn, $sql);
	mysqli_close($conn);
?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Bootstrap Admin Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

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
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
					<li>
                        <a href="DB_connect.php"><i class="fa fa-fw fa-edit"></i> Forms</a>
					</li>
					<li class="active">
                        <a href="tables.php"><i class="fa fa-fw fa-table"></i> Tables</a>
                    </li>
                    <li>
                        <a href="charts.php"><i class="fa fa-fw fa-bar-chart-o"></i> Charts</a>
                    </li>
                    
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
		

        <div id="page-wrapper">

            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-6">
					<?php echo "ex" . $_POST[delete_Rasp]; ?>
                        <h2>Raspberry</h2>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Rasp_ID</th>
                                        <th>Rasp_model</th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php
									$conn = mysqli_connect($servername, $username, $password, $dbname);
									$Rtable = "Raspberry";  //你們的Table名稱
									$Rsql1 = "SELECT * FROM " .  $Rtable;
									$Rresult = mysqli_query($conn, $Rsql1);
									if (mysqli_num_rows($Rresult) > 0) {
									// output data of each row               $row["屬性名稱"]
										while($Rrow = mysqli_fetch_array($Rresult)) {
											echo '<tr><td>' . $Rrow["Rasp_ID"] . '</td><td>' . $Rrow["Rasp_model"]. '</td></tr>';
										}
									}
								?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>   
					

					<div class="col-lg-6">
						<h2>Sensors</h2>
						<div class="table-responsive">
							<table class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>Sens_ID</th>
										<th>Sens_name</th>
									</tr>
								</thead>
								<tbody>
								<?php
									$conn = mysqli_connect($servername, $username, $password, $dbname);
									$Stable = "Sensors";  //你們的Table名稱
									$Ssql1 = "SELECT * FROM " .  $Stable;
									$Sresult = mysqli_query($conn, $Ssql1);
									if (mysqli_num_rows($Sresult) > 0) {
									// output data of each row               $row["屬性名稱"]
										while($Srow = mysqli_fetch_array($Sresult)) {
											echo '<tr><td>' . $Srow["Sens_ID"] . '</td><td>' . $Srow["Sens_name"]. '</td></tr>';
										}
									}
								?>            
								</tbody>
							</table>
						</div>  
					</div> 
                </div>
                <!-- /.row -->
				
				<div class="row">
                    <div class="col-lg-12">
                        <h2>Connection</h2>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Cont_NUM</th>
                                        <th>Rasp_ID</th>
										<th>Sens_ID</th>
										<th>Cont_time</th>
										<th>Cont_heartbeats</th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php
									$Ctable = "Connection";  //你們的Table名稱
									$Csql = "SELECT * FROM " .  $Ctable;
									$Cresult = mysqli_query($conn, $Csql);
									if (mysqli_num_rows($Cresult) > 0) {
									// output data of each row               $row["屬性名稱"]
										while($Crow = mysqli_fetch_array($Cresult)) {
											echo '<tr><td>' . $Crow["Cont_NUM"] . '</td><td>' . $Crow[Rasp_ID] . '</td><td>' . $Crow["Sens_ID"] . '</td><td>' . $Crow["Cont_time"] . '</td><td>' . $Crow["Cont_heartbeats"] . '</td></tr>';
										}
									}
								?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>   
				</div> 

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
