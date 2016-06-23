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
	else if ($_POST[delete_Rasp])
		$sql ="DELETE FROM Raspberry WHERE Rasp_ID = '$_POST[delete_Rasp]'";
	else if ($_POST[delete_Sens])
		$sql ="DELETE FROM Sensors WHERE Sens_ID = '$_POST[delete_Sens]'";
	
		
	mysqli_query($conn, $sql);
?>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Data DashBoard | </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- jVectorMap -->
    <link href="css/maps/jquery-jvectormap-2.0.3.css" rel="stylesheet"/>

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <!-- Jquery ui -->
    <link type="text/css" rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css">

        <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.ui/1.11.4/jquery-ui.min.js"></script>

  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title"><i class="fa fa-paw"></i> <span>Data DashBoard</span></a>
            </div>

            <div class="clearfix"></div>

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li>
					<a href="index.php"><i class="fa fa-home"></i> Home</a>
                  </li>
                  <li>
					<a href="form.php"><i class="fa fa-edit"></i> Forms</a>
                  </li>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row tile_count">
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> User</span>
              <div class="count">Howard</div>
              <span class="count_bottom"><i class="green">5mins </i> Last Login</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-clock-o"></i> Time</span>
              <div class="count" id="cur_time">123.50</div>
              <span id="cur_date" class="count_bottom"><i class="green" id="cur_day"><i class="fa fa-sort-asc"></i>3% </i> From last Week</span>
            </div>
       <!--      <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Males</span>
              <div class="count green">2,500</div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Females</span>
              <div class="count">4,567</div>
              <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>12% </i> From last Week</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Collections</span>
              <div class="count">2,315</div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Connections</span>
              <div class="count">7,325</div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
            </div> -->
          </div>
          <!-- /top tiles -->

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="dashboard_graph">

                <div class="row x_title">
                  <div class="col-md-6">
                    <h3><img id="Centi_State" src="images/green-led.png" height="5%" width="5%"> Centigrade/Humidity <small>real-time data</small></h3>
                  </div>
                  <div class="col-md-6">
                    <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                      <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                      <span></span> <b class="caret"></b>
                    </div>
                  </div>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12">
                <iframe id="rickshawChart" src="http://localhost/project2/production/extensions.html" width="100%"; height="600px" frameborder="0" scrolling="no">
                </iframe>
                </div>
                <div class="clearfix"></div>
              </div>
            </div>

          </div>
          <br />
           <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="dashboard_graph">

                <div class="row x_title">
                  <div class="col-md-6">
                    <h3><img id="Vector_State" src="images/green-led.png" height="5%" width="5%"> 3D vectors <small>real-time data</small></h3>
                  </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12 bg-white">
                  <div class="x_title" style="border-bottom:0px;">
                    <div class="clearfix"></div>
                  </div>

                  <div class="col-md-12 col-sm-12 col-xs-6">
                    <div>
                      <p>X-rotation</p>
                      <div class="">
                        <div class="progress progress_sm" style="width: 76%;">
                          <div id="x_bar" class="progress-bar bg-green" role="progressbar" data-transitiongoal="40"></div>
                        </div>
                      </div>
                    </div>
                    <div>
                      <p>Y-rotation</p>
                      <div class="">
                        <div class="progress progress_sm" style="width: 76%;">
                          <div id="y_bar" class="progress-bar bg-green" role="progressbar" data-transitiongoal="60"></div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12 col-sm-12 col-xs-6">
                    <div>
                      <p>Message</p>
                      <div class="" id="Vector_Msg" style="color:red;">

                      </div>
                    </div>
                  </div>

                </div>
                <div class="col-md-9 col-sm-9 col-xs-12">
                <iframe id="vectorChart" src="http://localhost/project2/production/cube_MPU6050.html" width="100%"; height="600px" frameborder="0" scrolling="no">
                </iframe>
                </div>
                <div class="clearfix"></div>
              </div>
            </div>

          </div>

        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Team04 <a href="#"></a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>


    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="../vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="../vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="../vendors/Flot/jquery.flot.js"></script>
    <script src="../vendors/Flot/jquery.flot.pie.js"></script>
    <script src="../vendors/Flot/jquery.flot.time.js"></script>
    <script src="../vendors/Flot/jquery.flot.stack.js"></script>
    <script src="../vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="js/flot/jquery.flot.orderBars.js"></script>
    <script src="js/flot/date.js"></script>
    <script src="js/flot/jquery.flot.spline.js"></script>
    <script src="js/flot/curvedLines.js"></script>
    <!-- jVectorMap -->
    <script src="js/maps/jquery-jvectormap-2.0.3.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="js/moment/moment.min.js"></script>
    <script src="js/datepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

    <script type="text/javascript">
    $(function() {
        setInterval(update, 1000);

        function cb(start, end) {
            var StartDay = start.format("YYYY-MM-DD");
            var EndDay = end.format("YYYY-MM-DD");
            var url = "http://localhost/rickshaw-master/examples/extensions.html?s=" + StartDay + "&e=" + EndDay;
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            $("#rickshawChart").attr("src",url);
        }
        cb(moment().subtract(29, 'days'), moment());

        $('#reportrange').daterangepicker({
            ranges: {
               'Today': [moment(), moment()],
               'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
               'Last 7 Days': [moment().subtract(6, 'days'), moment()],
               'Last 30 Days': [moment().subtract(29, 'days'), moment()],
               'This Month': [moment().startOf('month'), moment().endOf('month')],
               'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
        }, cb);
    });

   function update() { 
     $('#cur_time').html(moment().format('HH:mm:ss'));
     $('#cur_date').text(moment().format('D. MMMM YYYY'));


   }
    </script>

    <!-- Flot -->
    <script>
      $(document).ready(function() {
        var data1 = [
          [gd(2012, 1, 1), 17],
          [gd(2012, 1, 2), 74],
          [gd(2012, 1, 3), 6],
          [gd(2012, 1, 4), 39],
          [gd(2012, 1, 5), 20],
          [gd(2012, 1, 6), 85],
          [gd(2012, 1, 7), 7]
        ];

        var data2 = [
          [gd(2012, 1, 1), 82],
          [gd(2012, 1, 2), 23],
          [gd(2012, 1, 3), 66],
          [gd(2012, 1, 4), 9],
          [gd(2012, 1, 5), 119],
          [gd(2012, 1, 6), 6],
          [gd(2012, 1, 7), 9]
        ];
        $("#canvas_dahs").length && $.plot($("#canvas_dahs"), [
          data1, data2
        ], {
          series: {
            lines: {
              show: false,
              fill: true
            },
            splines: {
              show: true,
              tension: 0.4,
              lineWidth: 1,
              fill: 0.4
            },
            points: {
              radius: 0,
              show: true
            },
            shadowSize: 2
          },
          grid: {
            verticalLines: true,
            hoverable: true,
            clickable: true,
            tickColor: "#d5d5d5",
            borderWidth: 1,
            color: '#fff'
          },
          colors: ["rgba(38, 185, 154, 0.38)", "rgba(3, 88, 106, 0.38)"],
          xaxis: {
            tickColor: "rgba(51, 51, 51, 0.06)",
            mode: "time",
            tickSize: [1, "day"],
            //tickLength: 10,
            axisLabel: "Date",
            axisLabelUseCanvas: true,
            axisLabelFontSizePixels: 12,
            axisLabelFontFamily: 'Verdana, Arial',
            axisLabelPadding: 10
          },
          yaxis: {
            ticks: 8,
            tickColor: "rgba(51, 51, 51, 0.06)",
          },
          tooltip: false
        });

        function gd(year, month, day) {
          return new Date(year, month - 1, day).getTime();
        }
      });
    </script>
    <!-- /Flot -->

    <!-- jVectorMap -->
    <script src="js/maps/jquery-jvectormap-world-mill-en.js"></script>
    <script src="js/maps/jquery-jvectormap-us-aea-en.js"></script>
    <script src="js/maps/gdp-data.js"></script>
    <script>
      $(document).ready(function(){
        $('#world-map-gdp').vectorMap({
          map: 'world_mill_en',
          backgroundColor: 'transparent',
          zoomOnScroll: false,
          series: {
            regions: [{
              values: gdpData,
              scale: ['#E6F2F0', '#149B7E'],
              normalizeFunction: 'polynomial'
            }]
          },
          onRegionTipShow: function(e, el, code) {
            el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
          }
        });
        // $('#rickshawChart').ready(function() {
        //     alert($("#alertLevel").text());
        //     });
       


        $('#rickshawChart').load(function() {
         var $iframe = $(this), 
              $contents = $iframe.contents();
          // console.log($contents.find('#alertLevel').text());
          var frame  = document.getElementById("rickshawChart");
          var txt = frame.contentDocument.getElementById("t1");
          frame.contentWindow.$(txt).change(function(){
            console.log("change");
            $("#Centi_State").attr("src","images/red-led.png");
          });
      });

      $('#vectorChart').load(function() {
         var $iframe = $(this), 
              $contents = $iframe.contents();
          // console.log($contents.find('#alertLevel').text());
          var frame  = document.getElementById("vectorChart");
          var txt_x = frame.contentDocument.getElementById("xdata");
          var txt_y = frame.contentDocument.getElementById("ydata");
          frame.contentWindow.$(txt_x).change(function(){
            var val_x = $contents.find('#xdata').val();
            var val_y = $contents.find('#ydata').val();
            var msg = "";
            // console.log("bar_x:" + Math.abs(Math.round(val_x))+ " val_y:" + Math.abs(Math.round(val_y)));
            if(Math.abs(Math.round(val_x))>35){
              msg += "X-rotation is too high!<br>";
              $("#Vector_Msg").html(msg);
              $('#Vector_State').attr("src","images/red-led.png");
            }
            if(Math.abs(Math.round(val_y)) >33 && Math.abs(Math.round(val_y)) !=321){
              msg += "Y-rotation is too high!<br>";
              $("#Vector_Msg").html(msg);
              $('#Vector_State').attr("src","images/red-led.png");
            }

            // console.log("bar_x:" + val_x + " val_y:" + val_y);
            val_x =  Math.abs(Math.round(val_x * 10));
            val_y =  Math.abs(Math.round(val_y * 10));
            $('#x_bar').css('width', val_x+'%').attr('data-transitiongoal', val_x);
            $('#y_bar').css('width', val_y+'%').attr('data-transitiongoal', val_y);
          });
      });

      });
    </script>
    <!-- /jVectorMap -->

     <!-- Rickshaw Chart -->

    <!-- /bootstrap-daterangepicker -->

    <!-- gauge.js -->
    <script>

      var opts = {
          lines: 12,
          angle: 0,
          lineWidth: 0.4,
          pointer: {
              length: 0.75,
              strokeWidth: 0.042,
              color: '#1D212A'
          },
          limitMax: 'false',
          colorStart: '#1ABC9C',
          colorStop: '#1ABC9C',
          strokeColor: '#F0F3F3',
          generateGradient: true
      };
      var target = document.getElementById('foo'),
          gauge = new Gauge(target).setOptions(opts);

      gauge.maxValue = 6000;
      gauge.animationSpeed = 32;
      gauge.set(3200);
      gauge.setTextField(document.getElementById("gauge-text"));
    </script>

    <!-- /gauge.js -->
  </body>
</html>