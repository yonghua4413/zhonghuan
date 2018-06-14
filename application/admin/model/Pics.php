<?php
/**
 * 相册
 * Created by PhpStorm.
 * User: lanell
 * Date: 2017/8/1
 * Time: 9:28
 */
namespace app\admin\model;
use think\Db;
use think\Model;
class Pics extends Model
{
    //添加户型
    public function insert($data){
        return Db::name('pics')->insert($data);
    }

    //查询所有户型
    public function select(){
        return Db::name('pics')->select();
    }

    //按房型查询户型
    public function selectpics(){
        return Db::name('pics')->where('is_del', 0)->select();
    }

    //修改选择的户型
    public function edit($id,$data){
        return Db::name('pics')->where('id',$id)->update($data);
    }

    //查询修改选择的户型
    public function find($id){
        return Db::name('pics')->where('id',$id)->find();
    }

    //删除户型
    public function del($id){
        return Db::name('pics')->where('id',$id)->delete();
    }
}