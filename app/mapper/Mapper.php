<?php
namespace mapper;

use request\Request;
use router\Router;

class Mapper
{
    public function __invoke()
    {
        $request=new Request();
        $route_instances=Router::getAllInstances();
        $partial_url=$request->getPartialUrl();
        foreach ($route_instances as $instance)
        {
            if($instance->getRoute()=='asdsa')
            {

            }
        }
    }
}