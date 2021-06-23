<?php
//add the autoloader
use app\http\response\Response;

define('ROOT_PATH',dirname(__FILE__));

require_once ROOT_PATH.'/constants.php';

//include vendors
require_once 'vendor/autoload.php';

$worker=new \core\Worker();

$res= $worker->start();
echo $res;
die();