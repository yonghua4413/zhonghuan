<?php
/**
 * 报名窗口
 * Created by PhpStorm.
 * User: TianPeng Ao
 * Date: 2018/3/10
 * Time: 9:31
 */
namespace app\admin\controller;
use think\Controller;
use think\Db;
class Baom extends Controller
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
        $data = Db::name('baom')->where('id',1)->find();
        $this->assign('data',$data);
        return $this->fetch();
    }

    //更新报名窗口背景图及内容
    public function upd(){
        $data['time'] = time();
        $data['titd'] = $_POST['titd'];
        $data['titd1'] = $_POST['titd1'];
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
        $res = Db::name('baom')->where('id',1)->update($data);
        if (!$res){
            $this->error('提交失败！请稍后再试');
        }else{
            $this->success('提交成功','index');
        }
        return $this->fetch();

    }
}