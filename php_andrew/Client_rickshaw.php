<?php
require_once("DB_Conn.php"); 
$db = new DB(); 

/* Call connect_db  */
$db->connect_db(
  $_DB['host'], $_DB['username'], $_DB['password'], $_DB['dbname']);
  date_default_timezone_set("Asia/Taipei");
  $cur_day = date("Y-m-d H:i:s");
  // $startDate = '2016-06-23 01:34:00';
  // $endDate = '2016-06-23 01:56:02';
  $startDate = $_GET["s"];
  $endDate = $_GET["e"];

  /* Set statement QUERY */
  // $sql = "SELECT * FROM DataCollection WHERE Data_time >= '2016-06-16 04:29:19' AND Data_time <= ";
  if(isset($startDate) && $startDate!="" && isset($endDate) && $endDate != ""){
  $startDate = $startDate . " 00:00:00";
  $endDate = $endDate . " 23:59:59";  
  $sql = "SELECT * FROM DataCollection WHERE Data_time >= '" . $startDate . "' AND Data_time <= '" . $endDate . "'";
  }else{
  $sql = "SELECT * FROM DataCollection";
  }
  $db->runQuery($sql); 

  /* Call fetch_array function getData*/
  $array=0;
  while($result = $db->fetch_array()){
    $data[] = array('x' => (int) $result['Data_NUM']-1, 'y' => (float) $result['Data_humidity'], 'z' => $result['Data_time']);
    $data2[] = array('x' => (int) $result['Data_NUM']-1, 'y' => (float) $result['Data_centigrade'], 'z' => $result['Data_time']);
  }
 echo json_encode(array(
 	'Humidity'=>$data,
 	'Centigrade'=>$data2));

/* Close DB  */
$db->closeDB(); 

?>