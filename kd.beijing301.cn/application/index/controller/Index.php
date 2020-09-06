<?php
namespace app\index\controller;

class Index
{

    public function hello($name = 'ThinkPHP5')
    {
        return 'hello,' . $name;
    }
    
    public function get_hash_table($table,$userid){
     $str = crc32($userid);  
     if($str<0){  
     $hash = "0".substr(abs($str), 0, 1);  
     }else{
     $hash = substr($str, 0, 2);  
     }  
      
     return $table."_".$hash;  
    }
    public function doc()
    {
            echo $this->get_hash_table('message','user1');     //结果为message_10  
            echo $this->get_hash_table('message','user2');    //结果为message_13
    }
}
