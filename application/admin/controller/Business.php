<?php
/**
 * 商务合作栏目
 * Created by PhpStorm.
 * User: TianPeng Ao
 * Date: 2018/3/9
 * Time: 10:16
 */
namespace app\admin\controller;
use think\Controller;
use think\Db;
class Business extends Controller
{
    public function __construct($request = null){
        parent::__construct($request);
        if (session('id') != 1){
            $this->error('请勿非法操作！');
        }
    }

    //首页
    public function index(){
        if (empty(session('name'))){
            return $this->fetch('/index/login');die();
        }
        $data = Db::name('business')->where('id',1)->find();
        $this->assign('data',$data);
        return $this->fetch();
    }

    //更新商务合作模块
    public function upd(){
        $data['time'] = time();
        $data['titd'] = $_POST['titd'];
        $data['titd1'] = $_POST['titd1'];
        $data['titd2'] = $_POST['titd2'];
        $data['titd3'] = $_POST['titd3'];
        $file = request()->file('image');
        if (!empty($file)) {
            $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads/');
            if($info){
                $path = '/uploads/'.$info->getSaveName();
                $path = str_replace("\\","/",$path);
                $data['img'] = $path;
            }else{
                echo 'LOGO上传出错！';die();
            }
        }
        $file1 = request()->file('image1');
        if (!empty($file1)) {
            $info1 = $file1->move(ROOT_PATH . 'public' . DS . 'uploads/');
            if($info1){
                $path1 = '/uploads/'.$info1->getSaveName();
                $path1 = str_replace("\\","/",$path1);
                $data['img1'] = $path1;
            }else{
                echo 'LOGO上传出错！';die();
            }
        }
        $res = Db::name('business')->where('id',1)->update($data);
        if (!$res){
            $this->error('提交失败！请稍后再试');
        }else{
            $this->success('提交成功','index');
        }
        return $this->fetch();

    }
}