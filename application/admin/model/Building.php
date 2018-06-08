<?php
/**
 * 户型
 * Created by PhpStorm.
 * User: lanell
 * Date: 2017/8/1
 * Time: 9:28
 */
namespace app\admin\model;
use think\Db;
use think\Model;
class Building extends Model
{
    //添加户型
    public function insert($data){
        return Db::name('building')->insert($data);
    }

    //查询所有户型
    public function select(){
        return Db::name('building')->select();
    }

    //按房型查询户型
    public function select1($tid){
        return Db::name('building')->where('sort',$tid)->select();
    }

    //修改选择的户型
    public function edit($id,$data){
        return Db::name('building')->where('id',$id)->update($data);
    }

    //查询修改选择的户型
    public function find($id){
        return Db::name('building')->where('id',$id)->find();
    }

    //删除户型
    public function del($id){
        return Db::name('building')->where('id',$id)->delete();
    }
}