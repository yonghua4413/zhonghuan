<?php
/**
 * Created by PhpStorm.
 * User: TianPeng Ao
 * Date: 2018/3/7
 * Time: 13:29
 * 后台首页管理
 */
namespace app\admin\controller;
use think\Controller;
use app\admin\model\Home as H;
class Home extends Controller
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
        $H = new H();
        $data = $H->sel();
        $this->assign('data',$data);
        return $this->fetch();
    }

    //更新首页模块
    public function update(){
        $H = new H();
        $data = $_POST;
        $data['id'] = 1;
//         $data['titd'] = $_POST['titd'];
//         $data['titx'] = $_POST['titx'];
//         $data['tity'] = $_POST['tity'];
//         $data['titd1'] = $_POST['titd1'];
//         $data['titx1'] = $_POST['titx1'];
//         $data['tity1'] = $_POST['tity1'];
//         $data['titd2'] = $_POST['titd2'];
//         $data['titx2'] = $_POST['titx2'];
//         $data['tity2'] = $_POST['tity2'];
//         $data['titd3'] = $_POST['titd3'];
//         $data['titx3'] = $_POST['titx3'];
//         $data['tity3'] = $_POST['tity3'];
//         $data['titd4'] = $_POST['titd4'];
//         $data['titx4'] = $_POST['titx4'];
//         $data['tity4'] = $_POST['tity4'];
//         $data['address'] = $_POST['address'];
//         $data['title'] = $_POST['title'];
//         $data['keywords'] = $_POST['keywords'];
//         $data['desc'] = $_POST['desc'];
//         $data['t1img'] = $_POST['t1img'];
//         $data['t2img'] = $_POST['t2img'];
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
        $file5 = request()->file('image5');
        if (!empty($file5)) {
            $info5 = $file5->move(ROOT_PATH . 'public' . DS . 'uploads/');
            if($info5){
                $path5 = '/uploads/'.$info5->getSaveName();
                $path5 = str_replace("\\","/",$path5);
                $data['img5'] = $path5;
            }else{
                echo 'LOGO上传出错！';die();
            }
        }
        $file6 = request()->file('image6');
        if (!empty($file6)) {
            $info6 = $file6->move(ROOT_PATH . 'public' . DS . 'uploads/');
            if($info6){
                $path6 = '/uploads/'.$info6->getSaveName();
                $path6 = str_replace("\\","/",$path6);
                $data['img6'] = $path6;
            }else{
                echo 'LOGO上传出错！';die();
            }
        }
        $m_image = request()->file('m_image');
        if (!empty($m_image)) {
            $info6 = $m_image->move(ROOT_PATH . 'public' . DS . 'uploads/');
            if($info6){
                $path6 = '/uploads/'.$info6->getSaveName();
                $path6 = str_replace("\\","/",$path6);
                $data['m_img'] = $path6;
            }else{
                echo 'LOGO上传出错！';die();
            }
        }
        $m_image = request()->file('m_image3');
        if (!empty($m_image)) {
            $info6 = $m_image->move(ROOT_PATH . 'public' . DS . 'uploads/');
            if($info6){
                $path6 = '/uploads/'.$info6->getSaveName();
                $path6 = str_replace("\\","/",$path6);
                $data['m_img3'] = $path6;
            }else{
                echo 'LOGO上传出错！';die();
            }
        }
        $m_image = request()->file('m_image4');
        if (!empty($m_image)) {
            $info6 = $m_image->move(ROOT_PATH . 'public' . DS . 'uploads/');
            if($info6){
                $path6 = '/uploads/'.$info6->getSaveName();
                $path6 = str_replace("\\","/",$path6);
                $data['m_img4'] = $path6;
            }else{
                echo 'LOGO上传出错！';die();
            }
        }
        $m_image = request()->file('m_image5');
        if (!empty($m_image)) {
            $info6 = $m_image->move(ROOT_PATH . 'public' . DS . 'uploads/');
            if($info6){
                $path6 = '/uploads/'.$info6->getSaveName();
                $path6 = str_replace("\\","/",$path6);
                $data['m_img5'] = $path6;
            }else{
                echo 'LOGO上传出错！';die();
            }
        }
        $m_image = request()->file('m_image6');
        if (!empty($m_image)) {
            $info6 = $m_image->move(ROOT_PATH . 'public' . DS . 'uploads/');
            if($info6){
                $path6 = '/uploads/'.$info6->getSaveName();
                $path6 = str_replace("\\","/",$path6);
                $data['m_img6'] = $path6;
            }else{
                echo 'LOGO上传出错！';die();
            }
        }
        $data['time'] = time();
        $res = $H->upd($data);
        if (!$res){
            $this->error('提交失败！请稍后再试');
        }else{
            $this->success('提交成功','index');
        }
        return $this->fetch();
    }

}