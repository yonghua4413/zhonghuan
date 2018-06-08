<?php
/**
 * Created by PhpStorm.
 * User: TianPeng Ao
 * Date: 2018/3/7
 * Time: 16:52
 */

namespace app\admin\model;
use think\Db;
use think\Model;

class Youshi extends Model
{
    //查询首页内容
    public function sel(){
        return Db::name('yous')->where('id',1)->find();
    }
    //更新首页内容
    public function upd($data){
        return Db::name('yous')->where('id',1)->update($data);
    }
}