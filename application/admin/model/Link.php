<?php
/**
 * Created by PhpStorm.
 * User: TianPeng Ao
 * Date: 2017/8/8
 * Time: 13:06
 */

namespace app\admin\model;

use think\Db;
use think\Model;
class Link extends Model
{
    //添加职位内容
    public function insert($data){
        return Db::name('link')->insert($data);
    }

    //修改职位内容
    public function edit($id,$data){
        return Db::name('link')->where('id',$id)->update($data);
    }

    //添加职位内容
    public function select($count){
        return Db::name('link')->order('date_time')->paginate(10,$count);
    }

    //查询所有职位总数
    public function conent(){
        return Db::name('link')->count('id');
    }

    //删除职位
    public function del($id){
        return Db::name('link')->where('id',$id)->delete();
    }
    //查询指定职位
    public function find($id){
        return Db::name('link')->where('id',$id)->find();
    }
}