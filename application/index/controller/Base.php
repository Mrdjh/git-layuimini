<?php
namespace app\index\controller;
class Base
{
    public function __construct()
    {
        if(!cookie('userinfo'))
        {
            echo '登录失效';
        }
    }
}