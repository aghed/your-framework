<?php
namespace app\http\requests;


class Request implements IRequest
{
    private $method;
    private $payload;
    private $headers;
    private $valid;
    public function __construct()
    {
        $this->valid=true;
        $this->method=$_SERVER['REQUEST_METHOD'];
        $this->headers=getallheaders();
        switch (strtolower($this->method)){
            case 'get':
                $this->payload=$_GET;
                break;
            case 'delete':
            case 'put':
            case 'post':
                $this->payload=$_POST;
                break;
            default:
                throw new \Exception('unsupported method');
        }
    }

    public function getMethod()
    {
        return $this->method;
    }

    public function getPayLoad()
    {
        return $this->payload;
    }

    public function getHeaders()
    {
        return $this->headers;
    }

    public function hasHeader($header)
    {
        return array_key_exists($header,$this->headers);
    }
    /**
     * @param $attribute
     * check if the request payload has an attribute
     *  in case of array return  associative array with all
     * @return bool
     */
    public function hasAttribute($attribute)
    {
        return array_key_exists($attribute,$this->payload);
    }

    /**
     * @param array $attributes
     * only returns true when all attributes are there
     * @return bool
     */
    public function hasAttributes(array $attributes)
    {
        foreach ($attributes as $attribute) {
            if(!array_key_exists($attribute,$this->payload))
            {
                return false;
            }
        }
        return true;
    }
    public function invalidate()
    {
        $this->valid=false;
    }
    /**
     * check validation
     */
    public function isValid()
    {
        return $this->valid;
    }

    public function getFullUrl()
    {
        return $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    }

    public function getPartialUrl()
    {
        return $_SERVER['REQUEST_URI'];
    }
}