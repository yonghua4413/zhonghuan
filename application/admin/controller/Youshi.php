<?php
/**
 * 首页详情页管理
 * Created by PhpStorm.
 * User: TianPeng Ao
 * Date: 2018/3/7
 * Time: 16:18
 */

namespace app\admin\controller;
use think\Controller;
use app\admin\model\Youshi as Y;
class Youshi extends Controller
{
    public function __construct($request = null)
    {
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
        $Y = new Y();
        $data = $Y->sel();
        $this->assign('data',$data);
        return $this->fetch();
    }

    //更新首页详情页
    public function update(){
        $Y = new Y();
        $data['titd'] = $_POST['titd'];
        $data['titx'] = $_POST['titx'];
        $data['tity'] = $_POST['tity'];
        $data['titd1'] = $_POST['titd1'];
        $data['miaosu1'] = $_POST['miaosu1'];
        $data['titd2'] = $_POST['titd2'];
        $data['miaosu2'] = $_POST['miaosu2'];
        $data['titd3'] = $_POST['titd3'];
        $data['miaosu3'] = $_POST['miaosu3'];
        $data['titd4'] = $_POST['titd4'];
        $data['miaosu4'] = $_POST['miaosu4'];
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
        $file2 = request()->file('image2');
        if (!empty($file2)) {
            $info2 = $file2->move(ROOT_PATH . 'public' . DS . 'uploads/');
            if($info2){
                $path2 = '/uploads/'.$info2->getSaveName();
                $path2 = str_replace("\\","/",$path2);
                $data['img2'] = $path2;
            }else{
                echo 'LOGO上传出错！';die();
            }
        }
        $file3 = request()->file('image3');
        if (!empty($file3)) {
            $info3 = $file3->move(ROOT_PATH . 'public' . DS . 'uploads/');
            if($info3){
                $path3 = '/uploads/'.$info3->getSaveName();
                $path3 = str_replace("\\","/",$path3);
                $data['img3'] = $path3;
            }else{
                echo 'LOGO上传出错！';die();
            }
        }
        $file4 = request()->file('image4');
        if (!empty($file4)) {
            $info4 = $file4->move(ROOT_PATH . 'public' . DS . 'uploads/');
            if($info4){
                $path4 = '/uploads/'.$info4->getSaveName();
                $path4 = str_replace("\\","/",$path4);
                $data['img4'] = $path4;
            }else{
                echo 'LOGO上传出错！';die();
            }
        }
        $data['time'] = time();
        $res = $Y->upd($data);
        if (!$res){
            $this->error('提交失败！请稍后再试');
        }else{
            $this->success('提交成功','index');
        }
        return $this->fetch();
    }
}