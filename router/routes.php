<?php

use app\http\controllers\Controller;
use router\Router;


/**
 * @the_first_one
 * 21/06/2021
 */
Router::get('/',[Controller::class,'test']);
Router::get('/something',[Controller::class,'something']);