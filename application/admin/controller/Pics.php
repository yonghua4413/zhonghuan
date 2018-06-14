<?php
/**
 * 相册模块
 * Created by PhpStorm.
 * User: ttitt
 * Date: 2018/6/12
 * Time: 16:21
 */
namespace app\admin\controller;
use think\Controller;
use think\Db;
use app\admin\model\Pics as B;
use app\admin\model\Pic as P;
class Pics extends Controller
{
    public function __construct($request = null)
    {
        parent::__construct($request);
        if (session('id') != 1){
            $this->error('请勿非法操作！');
        }
    }
    //相册管理首页
    public function index(){
        if (empty(session('name'))){
            return $this->fetch('/index/login');die();
        }
        $b = new B();
        $p = new P();
        $data = $b->selectpics();
        for ($i = 0; $i<count($data); $i++){
            $res = $p->selectpic($data[$i]['id']);
            if(!$res){
                $data[$i]['picsimg'] = '';
            }else{
                $data[$i]['picsimg'] = $res[0]['url'];
            }
        }
        $this->assign('data',$data);
        return $this->fetch();
    }
    public function add(){
        $b = new B();
        $data['name'] = $_POST['name'];
        if($data['name'] == ''){
            $this->error('添加失败！相册名不能为空');
            return $this->fetch();
        }
        $res = $b->insert($data);
        if(!$res){
            $this->error('添加失败！请稍后再试');
        }else{
            $this->success('添加成功','index');
        }
        return $this->fetch();
    }
    public function addpic(){
        $p = new P();
        $id = $_GET['id'];
        $this->assign('id', $id);
        $pic = $p->selectpic($id);
        $this->assign('pic',$pic);
        return $this->fetch();
    }
    //上传图片
    public function update(){
        $p = new P();
        $data = $_POST;
        $pic = request()->file('pic');
        if (!empty($pic)) {
            $info6 = $pic->move(ROOT_PATH . 'public' . DS . 'uploads/');
            if($info6){
                $path6 = '/uploads/'.$info6->getSaveName();
                $path6 = str_replace("\\","/",$path6);
                $data['url'] = $path6;
            }else{
                echo 'LOGO上传出错！';die();
            }
        }
        if(!isset($data['url'])){
            $this->error('请先添加相片');
        }else{
            $res = $p->insert($data);
            if(!$res){
                $this->error('添加相片失败！请稍后再试');
            }else{
                $this->success('提交成功');
            }
        }
        return $this->fetch();
    }
    //删除图片
    public function del(){
        $p = new P();
        $data = $_GET;
        $res = $p->edit($data['id'], ['is_del'=> 1]);
        if(!$res){
            $this->error('删除照片失败！请稍后再试');
        }else{
            $this->success('删除照片成功');
        }
    }
    //删除相册
    public function delpics(){
        $b = new B();
        $p = new P();
        $data = $_GET;
        $res = $p->selectpic($data['id']);
        if(!$res){
            $res = $b->edit($data['id'], ['is_del'=> 1]);
            if(!$res){
                $this->error('删除相册失败！请稍后再试');
            }else{
                $this->success('删除相册成功');
            }
        }else{
            $this->error('该相册还有照片，无法删除');
        }
    }
}