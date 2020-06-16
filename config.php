<?php
//Functions
include_once("functions.php");

//300 seconds = 5 minutes execution time
ini_set('max_execution_time', 300);

//overrides the default PHP memory limit.
ini_set('memory_limit', '-1');

//include pdo helper class to use common methods
include_once("class/class.pdohelper.php");

//include pdo class wrapper
include_once("class/class.pdowrapper.php");

//include posts class
include_once("class/Posts.php");

//database connection setings
$dbConfig = array("host"=>"localhost", "dbname"=>"arkusnexus", "username"=>"root", "password"=>"");

//get instance of PDO Wrapper object
$db = new PdoWrapper($dbConfig);

// get instance of PDO Helper object
$helper = new PDOHelper();

// set error log mode true to show error on screen or false to log in log file
$db->setErrorLog(false);

error_reporting(E_ALL ^ E_NOTICE);
?>