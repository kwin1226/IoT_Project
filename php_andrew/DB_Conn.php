<?php
global $_DB;

/* DB config */
$_DB['host'] = "140.138.77.98";
$_DB['username'] = "bigdata_team04";
$_DB['password'] = "284gj4rm42l3xjp4";
$_DB['dbname'] = "2016_bigdata_team04";

class DB
{
  var $_dbConn = 0;
  var $_queryResource = 0;

  /* Connect to DB */
  function connect_db($host, $user, $pwd, $dbname){
    $dbConn = mysql_connect($host, $user, $pwd);
    if (! $dbConn){
      echo "db connect error !!";
    }

    /* Set Language */
    mysql_query("SET NAMES 'UTF8'"); 

    /* Set DataBase Name*/
    if (! mysql_select_db($dbname, $dbConn)){
       echo "mysql_select_db error !!";
    }

    $this->_dbConn = $dbConn;
    return true;
  }

  /* Close DataBase Connect */
  function closeDB(){
    mysql_close($this->_dbConn);
  }

    /* Set SQL QUERY Operation */
  function runQuery($sql){
   if (! $queryResource = mysql_query($sql, $this->_dbConn)){
     echo "mysql_query error !!";
   }
   $this->_queryResource = $queryResource;
   return $queryResource;
  }

  /* Return query Data  mysql_fetch_array */
  function fetch_array(){
    return mysql_fetch_array($this->_queryResource, MYSQL_ASSOC);
  }
}

?>