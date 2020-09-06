<?php
namespace app\index\controller;
use think\DB;
class Login
{
    public function dologin()
    {
        $res = DB::name('kd_user')->where('username',input('username'))->find();
        if($res['password'] !==md5(input('password')))
        {
            return json(['msg'=>'403']);
        }else{
                cookie('userinfo',$res);
                return json(['msg'=>'200']);
                
        }
    }
}