<?php
/**
 * 管理员
 * Created by PhpStorm.
 * User: lanell
 * Date: 2017/8/1
 * Time: 10:25
 */
namespace app\admin\model;
use think\Db;
use think\Model;
class User extends Model
{
    //登录后台查询数据
    public function login($name){
        return Db::name('user')->where('name',$name)->field('id,password,name,admin_rank')->find();
    }

    //查询管理员密码
    public function selectPwd($id){
        return Db::name('user')->where('id',$id)->value('password');
    }

    //设置管理员默认密码
    public function defu($id,$data){
        return Db::name('user')->where('id',$id)->update($data);
    }

    //更新指定管理员
    public function upd($id,$data){
        return Db::name('user')->where('id',$id)->update($data);
    }

    //查询指定管理员
    public function find($id){
        return Db::name('user')->where('id',$id)->find();
    }

    //查询所有管理员
    public function selall(){
        return Db::name('user')->select();
    }

    //查询所有管理员总数
    public function conent(){
        return Db::name('user')->count('id');
    }

    //添加管理员
    public function ins($data){
        return Db::name('user')->insert($data);
    }

    //删除管理员
    public function del($id){
        return Db::name('user')->where('id',$id)->delete();
    }
}