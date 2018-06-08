<?php
/**
 * 客户
 * Created by PhpStorm.
 * User: lanell
 * Date: 2017/8/1
 * Time: 9:50
 */
namespace app\admin\model;
use think\Db;
use think\Model;
class Client extends Model{

    //查询所有客户
    public function select($count1){
        return Db::field('*')
            ->table('txone_client')
            ->union('SELECT * FROM txone_client1')
            ->paginate(10,$count1);
    }

    //查询所有客户总数
    public function conent(){
        return Db::name('client')->count('id');
    }

    //查询所有指定客户
    public function select1($tcount){
        return Db::name('client1')->order('time')->paginate(10,$tcount);
    }

    //查询所有指定客户总数
    public function conent1(){
        return Db::name('client1')->count('id');
    }

    //查询所有指定客户
    public function select2($tcount){
        return Db::name('client')->order('time')->paginate(10,$tcount);
    }

    //查询所有指定客户总数
    public function conent2(){
        return Db::name('client')->count('id');
    }

    //删除未联系客户
    public function del($id){
        return Db::name('client')->where('id',$id)->delete();
    }

    //删除已联系客户
    public function del1($id){
        return Db::name('client1')->where('id',$id)->delete();
    }
    //添加已联系客户
    public function inst($data){
        return Db::name('client1')->insert($data);
    }
    //修改客户联系状态
    public function set($id){
        return Db::name('client')->where('id',$id)->update(['is_do'=>1]);
    }

    //查询所有指定客户信息
    public function sect($id){
        return Db::name('client')->where('id',$id)->find();
    }

    //查询所有选择客户信息（Excel）
    public function sel1($where){
        return Db::name('client')->where('time','between',$where)->field('id,name,phone')->select();
    }

    //查询所有选择客户信息（Excel）
    public function sel12($where){
        return Db::name('client1')->where('time','between',$where)->field('id,name,phone')->select();
    }

    //查询所有选择客户信息（Excel）
    public function sel1no(){
        return Db::name('client')->field('id,name,phone')->select();
    }

    //查询所有选择客户信息（Excel）
    public function sel12no(){
        return Db::name('client1')->field('id,name,phone')->select();
    }
}