<?php
namespace app\http\responses;

class Response implements IResponse
{
    /**
     * @var $data
     * the data to return
     */
    private $data;
    /**
     * @var  $status_code
     * the status code to retur
     */
    private $status_code;
    public function __construct($data,$status_code=200)
    {
        $this->data=$data;
        $this->status_code = $status_code;
    }

    public function toJson()
    {
        header("Content-Type: application/json");
        http_response_code($this->status_code);
        return json_encode($this->data);
    }

    public function __toString()
    {
        return $this->toJson();
    }

    public function file()
    {

    }
}