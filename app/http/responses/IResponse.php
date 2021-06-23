<?php

namespace app\http\responses;

interface IResponse
{
    public function toJson();

    public function file();
}