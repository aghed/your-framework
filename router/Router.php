<?php
namespace router;


class Router
{
    protected static array $routes=[];
    private  string $route;
    private  array $call_list;
    public function __construct($route,$call_list)
    {
        $this->route = $route;
        $this->call_list = $call_list;
    }

    public static function get($route,array $call_list)
    {
        $new_instance=new Router($route,$call_list);
        static::$routes[]=$new_instance;
        return $new_instance;
    }

    public static function post($route,array $call_list)
    {
        static::$routes[]=new Router($route,$call_list);
    }

    public static function getAllRoutes():array
    {
        return static::$routes;
    }

    public function getRoute()
    {
        return $this->route;
    }

    public static function returnInstance($url)
    {
        $match_url=strtolower($url);
        foreach (static::$routes as $instance) {
            $instance_url=strtolower($instance->getRoute());
            if($instance_url==$match_url)
                return $instance;
        }
        throw new \Exception(ROUTE_NOT_FOUND);
    }

    public function execute()
    {
      return call_user_func($this->call_list);
    }

}