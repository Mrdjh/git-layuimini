<?php
namespace app\index\model;
use \think\DB;
class Sale extends \think\Model
{
    protected $table = 'kd_sale';
    
    public function updateSaleOrder($time,$good_price,$uid)
    {
        $coun = DB::name($this->table)->where('id',$uid)->field('count_price')->find();
        $data = [
            //修改销售开单时间
            'kd_time'=>$time,
            //原本价格+上该订单价格
            'count_price'=>$coun['count_price'] + $good_price,
            ];
        //查出当前sale uid所属的id 进行修改相关数据
        DB::name($this->table)
        ->where('id',$uid)
        ->update($data);
    }
}