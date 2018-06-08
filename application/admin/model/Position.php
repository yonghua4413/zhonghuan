<?php
/**
 * 职位
 * Created by PhpStorm.
 * User: lanell
 * Date: 2017/8/1
 * Time: 9:13
 */
namespace app\admin\model;
use think\Db;
use think\Model;
class Position extends Model
{
    //添加职位内容
    public function insert($data){
        return Db::name('position')->insert($data);
    }

    //修改职位内容
    public function edit($id,$data){
        return Db::name('position')->where('id',$id)->update($data);
    }

    //添加职位内容
    public function select($count){
        return Db::name('position')->order('date_time')->paginate(10,$count);
    }

    //查询所有职位总数
    public function conent(){
        return Db::name('position')->count('id');
    }

    //删除职位
    public function del($id){
        return Db::name('position')->where('id',$id)->delete();
    }
    //查询指定职位
    public function find($id){
        return Db::name('position')->where('id',$id)->find();
    }
}