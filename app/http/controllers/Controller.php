<?php
namespace app\http\controllers;

use app\http\responses\Response;


class Controller
{

    public function test()
    {
        return new Response(['message'=>'worked'],403);
    }

    public function something()
    {
        return new Response('something');
    }

}