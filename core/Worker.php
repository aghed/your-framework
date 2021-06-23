<?php

namespace core;

use app\http\requests\Request;
use router\Router;

require_once ROOT_PATH.'/constants.php';

class Worker
{
    public function start()
    {
        $request=new Request();
        $url=$request->getPartialUrl();
        try {
            $target_route_instance=Router::returnInstance($url);
        }catch (\Exception $e) {
            if($e->getMessage()==ROUTE_NOT_FOUND)
            {
                //MAKE SOME handling
                die();
            }
        }

        return $target_route_instance->execute();
    }
}
