<?php
/**
 * 新闻
 * Created by PhpStorm.
 * User: lanell
 * Date: 2017/8/1
 * Time: 10:13
 */
namespace app\admin\model;
use think\Db;
use think\Model;
class Column extends Model
{
    //添加快报内容
    public function insert($data){
        return Db::name('new')->insert($data);
    }

    //查询所有快报
    public function select(){
        return Db::name('new')->order('time desc')->paginate(10);
    }

    //修改选择快报内容
    public function edit($id,$data){
        return Db::name('new')->where('id',$id)->update($data);
    }

    //查询修改选择的快报
    public function find($id){
        return Db::name('new')->where('id',$id)->find();
    }

     //查询快报总数
    public function selc(){
        return Db::name('new')->count('id');
    }

    //删除快报
    public function del($id){
        return Db::name('new')->where('id',$id)->delete();
    }

    // public function upd($id,$data){
    //     return Db::name('new')->where('id',$id)->update($data);
    // }

    //设置主页显示
    public function setzhuye($id){
        return Db::name('new')->where('zhuye',$id)->update(['zhuye'=>'0']);
    }

    //设置排行显示
    public function setpaihang($id){
        return Db::name('new')->where('paihang',$id)->update(['paihang'=>'0']);
    }

    //设置推荐显示
    public function settuijin($id){
        return Db::name('new')->where('tuijin',$id)->update(['tuijin'=>'0']);
    }
}