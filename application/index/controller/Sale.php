<?php
namespace app\index\controller;
use app\index\model\Sale as Sales;
class Sale
{
    public function __construct()
    {
        $this->sale = new Sales();
    }
    //查询所有销售人员
    public function findSale($limit,$page)
    {
        $data = $this->sale
        ->limit($limit)->page($page)->order('count_price desc')
        ->select();
        $count = $this->sale->count();
        return BackCode($data,$count);
    }
    //按钮修改员工 工作状态
    public function editstatus()
    {
        $data = [
            'sale_status'=>input('sale_status')
            ];
        $this->sale->save($data,['id'=>input('id')]);
    }
    //选删除销售人员
    public function delAllsale()
    {
        $id = implode(",",input('delarr/a'));
        $a = $this->sale::destroy($id);
        if($a){
            return json(['msg'=>'删除成功','suc'=>'200']);
        }else{
            return json(['msg'=>'删除失败','err'=>'403']);
        }
        
    }
    //添加销售人员
    public function saleAdd()
    {
        $data = [
            'username'=>input('username'),
            'wechat'=>input('wechat'),
            'sale_leve'=>input('sale_leve'),
            'sale_status'=>input('sale_status'),
            'bztext'=>input('bztext')
            ];
        $addsale = new Sales($data);
        if($addsale->save()){
            return json(['suc'=>'200','msg'=>'添加成功']);
        }else{
            return json(['err'=>'403','msg'=>'添加失败']);
        }
    }
    //修改销售人员信息
    public function editSale()
    {
        $data = [
            'username'=>input('username'),
            'wechat'=>input('wechat'),
            'sale_leve'=>input('sale_leve'),
            'bztext'=>input('bztext')
            ];
        $if = $this->sale->save($data,['id'=>input('id')]);
        if($if){
            return json(['msg'=>'修改成功','code'=>'200']);
        }else{
            return json(['msg'=>'修改失败','code'=>'403']);
        }
        
    }
    //搜索指定人员
    public function likesale($word_name)
    {
        $data = $this->sale
        ->where('username','like',"%".$word_name['username']."%")
        ->select();
        if($data)
        {
            return BackCode($data,'10');
        }else{
            return false;
        }
        
    }
}