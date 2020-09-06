<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
function BackCode($data=null,$count=null){
    $layui = [
        'code' => '0',//状态码
        'msg' => 'sucess',//返回信息
        'count' => $count,
        'data' => $data//返回自定义的数据 也可以是url
    ];
    return json($layui);
}

function ErrorCode(){
    $layui = [
        'code' => '403',//状态码
        'msg' => 'error',//返回信息
        'count' => '0',
        'data' => 'null'//返回自定义的数据 也可以是url
    ];
    return json($layui);
}