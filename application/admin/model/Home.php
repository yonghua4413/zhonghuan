<?php
/**
 * 首页管理模型
 * Created by PhpStorm.
 * User: TianPeng Ao
 * Date: 2018/3/7
 * Time: 13:31
 */
namespace app\admin\model;
use think\Db;
use think\Model;
class Home extends Model
{
    //查询首页内容
    public function sel(){
        return Db::name('home')->where('id',1)->find();
    }
    //更新首页内容
    public function upd($data){
        return Db::name('home')->where('id',1)->update($data);
    }
}