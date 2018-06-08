<?php
/**
 * 商铺页管理模块
 * Created by PhpStorm.
 * User: TianPeng Ao
 * Date: 2018/3/8
 * Time: 9:08
 */

namespace app\admin\controller;

use think\Controller;
use think\Db;
class Shangpu extends Controller
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
        $data = Db::name('shangpu')->where('id',1)->find();
        $this->assign('data',$data);
        return $this->fetch();
    }
    //更新内容
    public function upd(){
        $data['time'] = time();
        $data['titd'] = $_POST['titd'];
        $data['tity'] = $_POST['tity'];
        $data['titdd'] = $_POST['titdd'];
        $data['titd1'] = $_POST['titd1'];
        $data['titd2'] = $_POST['titd2'];
        $data['titd3'] = $_POST['titd3'];
        $data['titd4'] = $_POST['titd4'];
        $data['titd5'] = $_POST['titd5'];
        $data['titd6'] = $_POST['titd6'];
        $data['titd7'] = $_POST['titd7'];
        $data['titd8'] = $_POST['titd8'];
        $data['miaosu1'] = $_POST['miaosu1'];
        $data['miaosu2'] = $_POST['miaosu2'];
        $data['miaosu3'] = $_POST['miaosu3'];
        $data['miaosu4'] = $_POST['miaosu4'];
        $data['miaosu5'] = $_POST['miaosu5'];
        $data['miaosu6'] = $_POST['miaosu6'];
        $data['miaosu7'] = $_POST['miaosu7'];
        $data['miaosu8'] = $_POST['miaosu8'];
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
        $file = request()->file('image1');
        if (!empty($file)) {
            $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads/');
            if($info){
                $path = '/uploads/'.$info->getSaveName();
                $path = str_replace("\\","/",$path);
                $data['img1'] = $path;
            }else{
                echo 'LOGO上传出错！';die();
            }
        }
        $file = request()->file('image2');
        if (!empty($file)) {
            $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads/');
            if($info){
                $path = '/uploads/'.$info->getSaveName();
                $path = str_replace("\\","/",$path);
                $data['img2'] = $path;
            }else{
                echo 'LOGO上传出错！';die();
            }
        }
        $file = request()->file('m_img');
        if (!empty($file)) {
            $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads/');
            if($info){
                $path = '/uploads/'.$info->getSaveName();
                $path = str_replace("\\","/",$path);
                $data['m_img'] = $path;
            }else{
                echo 'LOGO上传出错！';die();
            }
        }
        $res = Db::name('shangpu')->where('id',1)->update($data);
        if (!$res){
            $this->error('提交失败！请稍后再试');
        }else{
            $this->success('提交成功','index');
        }
        return $this->fetch();

    }
}