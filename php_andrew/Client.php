<?php
require_once("DB_Conn.php"); 
$db = new DB(); 

/* Call connect_db  */
$db->connect_db(
  $_DB['host'], $_DB['username'], $_DB['password'], $_DB['dbname']);

  /* Set statement QUERY */
  $sql = "SELECT * FROM DataCollection ";
  $db->runQuery($sql); 

  /* Call fetch_array function getData*/
  $array=0;
  while($result = $db->fetch_array()){
    $data[] = $result;
  }

 echo json_encode($data);

/* Close DB  */
$db->closeDB(); 

?>