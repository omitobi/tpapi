<?php

require_once "vendor/autoload.php";
use Apier\MyAPI;
use Model\User;
use tpLog\MyLog;

/**
 * Created by PhpStorm.
 * User: omitobisam
 * Date: 10.08.16
 * Time: 10:43
 */
// Requests from the same server don't have a HTTP_ORIGIN header

//include 'pre/load.php';



//\MyLog::mylog(LOG_CRIT, "I am very critical again!");

$mylog = new MyLog();
echo json_encode(array("status" => "reached here 1"));
if (!array_key_exists('HTTP_ORIGIN', $_SERVER)) {
    $mylog->logIt(LOG_NOTICE, "Origin does not exist");
    $_SERVER['HTTP_ORIGIN'] = $_SERVER['SERVER_NAME'];
     echo json_encode(array("status" => "reached here 2"));
}
try {
    echo json_encode(array("returned" => array("status" => "reached here", "request" => $_REQUEST['request'], "origin" => $_SERVER['HTTP_ORIGIN'])));
    $mylog->logIt(LOG_NOTICE, "Right before API callS");
    $API = new MyAPI($_REQUEST['request'], $_SERVER['HTTP_ORIGIN']);
    $mylog->logIt(LOG_NOTICE, "Something not working after API callS");
    echo json_encode(array("status" => "reached here"));
    echo $API->processAPI();
    echo json_encode(array("status" => "reached here"));
} catch (Exception $e) {
    echo json_encode(Array('error' => $e->getMessage()));
}
