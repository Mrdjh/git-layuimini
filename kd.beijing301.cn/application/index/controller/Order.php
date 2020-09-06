<?php
namespace app\index\controller;
use app\index\model\Order as OrderModel;
use app\index\model\Sale as Sales;
class Order
{
    public function __construct()
    {
        $this->order = new OrderModel();
    }
    //查询出所有开单
    public function findOrder($limit,$page)
    {
        $data = $this->order
        ->limit($limit)->page($page)
        ->select();
        $count = $this->order->count();
        return BackCode($data,$count);
    }
    
    //新增订单
    /**
     * uid 订单所属人员id
     */
    public function AddOrder()
    {
        $time = input('kd_time');
        $good_price = input('good_price');
        $uid = input('uid');
        
        $data = [
            'good_price'=>$good_price,
            'uid'=>$uid,
            'sale_user'=>input('username'),
            'kd_time'=>$time,
            'bztext'=>input('bztext'),
            ];
            //存入对象
            $addsale = new OrderModel($data);
            //执行添加到订单表
        if($addsale->save()){
            //添加成功后修改销售人员表 的上次开单时间\总开单数\总开单金额
            $Sale = new Sales();
            $Sale->updateSaleOrder($time,$good_price,$uid);
            return json(['suc'=>'200','msg'=>'添加成功']);
        }else{
            return json(['err'=>'403','msg'=>'添加失败']);
        }
    }
    

    
    
    
}