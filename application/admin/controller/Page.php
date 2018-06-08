<?php
/**
 * 户型模块
 * Created by PhpStorm.
 * User: lanell
 * Date: 2017/8/1
 * Time: 10:00
 */
namespace app\admin\controller;
use think\Controller;
use think\Db;
use app\admin\model\Building as B;
class Page extends Controller
{
    public function __construct($request = null)
    {
        parent::__construct($request);
        if (session('id') != 1){
            $this->error('请勿非法操作！');
        }
    }
    //户型管理首页
    public function index(){
        if (empty(session('name'))){
            return $this->fetch('/index/login');die();
        }
        $b = new B();
        $tid = input('param.tid/d');
        if ($tid == 1){
            $data = $b->select();
        }else{
            $data = $b->select1($tid);
        }
        $this->assign('data',$data);
        return $this->fetch();
    }

    //添加户型
    public function add(){
        if (empty(session('name'))){
            return $this->fetch('/index/login');die();
        }
        return $this->fetch();
    }
    //背景图和优势内容
    public function you(){
        if (empty(session('name'))){
            return $this->fetch('/index/login');die();
        }
        $data = Db::name('you')->where('id',1)->find();
        $this->assign('data',$data);
        return $this->fetch();
    }
    //背景图和优势内容更新
    public function youup(){
        $data['time'] = time();
        $data['titd'] = $_POST['titd'];
        $data['titdd'] = $_POST['titdd'];
        $data['titd1'] = $_POST['titd1'];
        $data['titd2'] = $_POST['titd2'];
        $data['titd3'] = $_POST['titd3'];
        $data['titd4'] = $_POST['titd4'];
        $data['titd5'] = $_POST['titd5'];
        $data['miaosu1'] = $_POST['miaosu1'];
        $data['miaosu2'] = $_POST['miaosu2'];
        $data['miaosu3'] = $_POST['miaosu3'];
        $data['miaosu4'] = $_POST['miaosu4'];
        $data['miaosu5'] = $_POST['miaosu5'];
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
        $res = Db::name('you')->where('id',1)->update($data);
        if (!$res){
            $this->error('提交失败！请稍后再试');
        }else{
            $this->success('提交成功','index');
        }
        return $this->fetch();
    }

    //添加户型
    public function insert(){
        $data = $_POST;
        if(empty($_POST['title'])){
            $this->error('名称不能为空！');die();
        }else{
            $data['title'] = $_POST['title'];
        }
        if(!empty($_POST['tab'])){
            $data['tab'] = $_POST['tab'];
        }
        if(empty($_POST['content'])){
            $this->error('描述不能为空！');die();
        }else{
            $data['content'] = $_POST['content'];
        }
        if(empty($_POST['sort'])){
            $this->error('所属房型不能为空！');die();
        }else{
            $data['sort'] = $_POST['sort'];
        }
        if(empty($_POST['living'])){
            $this->error('室厅卫不能为空！');die();
        }else{
            $data['living'] = $_POST['living'];
        }
        if(empty($_POST['area'])){
            $this->error('面积不能为空！');die();
        }else{
            $data['area'] = $_POST['area'];
        }
        if(!empty($_POST['rec'])){
            $data['rec'] = $_POST['rec'];
        }
        if(!empty($_POST['sarea'])){
            $data['sarea'] = $_POST['sarea'];
        }
        if(!empty($_POST['money'])){
            $data['money'] = $_POST['money'];
        }else{
            $this->error('总价不能为空！');die();
        }
        if(!empty($_POST['av_price'])){
            $data['av_price'] = $_POST['av_price'];
        }else{
            $this->error('均价不能为空!');die();
        }
        $file = request()->file('image');
		// 移动到框架应用根目录/public/uploads/ 目录下
		if (!empty($file)) {
			$info = $file->move(ROOT_PATH . 'public' . DS . 'uploads/');
			if($info){
				$path = '/uploads/'.$info->getSaveName();
				$data['picture'] = $path;
			}else{
				echo 'LOGO上传出错！';die();
			}
		}
        $b = new B();
        $res = $b->insert($data);
        if (!$res){
            $this->error('添加失败！');die();
        }else{
            $this->success('添加成功','index?tid=1&page=1');
        }
    }

    //修改户型
    public function edit()
    {
        if (empty(session('name'))){
            return $this->fetch('/index/login');die();
        }
        $id = input('param.id/d');
        $b = new B();
        $data = $b->find($id);
        $this->assign('data',$data);
        return $this->fetch();
    }

    //修改户型
    public function update()
    {
        $id = input('param.id/d');
        $b = new B();
        $data = $_POST;
        if(empty($_POST['title'])){
            $this->error('名称不能为空！');die();
        }
        if(empty($_POST['tab'])){
            $this->error('标签不能为空！');die();
        }
        if(empty($_POST['living'])){
            $this->error('室厅卫不能为空！');die();
        }
        if(empty($_POST['content'])){
            $this->error('描述不能为空！');die();
        }
        if(empty($_POST['sort'])){
            $this->error('排序不能为空！');die();
        }
        if(empty($_POST['sarea'])){
            $this->error('赠送面积不能为空！');die();
        }
        if(empty($_POST['money'])){
            $this->error('总价不能为空！');die();
        }
        if(empty($_POST['av_price'])){
            $this->error('均价不能为空！');die();
        }
        $file = request()->file('image');
		// 移动到框架应用根目录/public/uploads/ 目录下
		if (!empty($file)) {
			$info = $file->move(ROOT_PATH . 'public' . DS . 'uploads/');
			if($info){
				$path = '/uploads/'.$info->getSaveName();
				$data['picture'] = $path;
			}else{
				echo 'LOGO上传出错！';die();
			}
		}
        $res = $b->edit($id,$data);
        if (!$res){
            $this->success('提交成功','index?tid=1&page=1');
        }else{
            $this->success('提交成功','index?tid=1&page=1');
        }
    }

    //删除户型
    public function del()
    {
        $id = $_REQUEST['id'];
        $b = new B();
        $res = $b->del($id);
        if (!$res){
            echo json_encode(['status'=>0,'msg'=>'删除失败！请稍后再试']);
        }else{
            echo json_encode(['status'=>1,'msg'=>'删除成功']) ;
        }
    }
}