<?php


namespace app\http\requests;


interface IRequest
{
    public function getMethod();

    public function getPayLoad();

    public function getHeaders();

    public function hasHeader($header);

    public function hasAttribute($attribute);

    public function hasAttributes(array $attributes);

    public function invalidate();

    public function isValid();

    public function getFullUrl();

    public function getPartialUrl();
}