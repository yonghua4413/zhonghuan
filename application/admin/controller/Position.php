<?php
/**
 * 益华集团模块
 * Created by PhpStorm.
 * User: lanell
 * Date: 2017/8/1
 * Time: 10:22
 */
namespace app\admin\controller;
use think\Controller;
use think\Db;
use app\admin\model\Position as Po;
class Position extends Controller
{
    public function __construct($request = null)
    {
        parent::__construct($request);
        if(session('id') != 1){
            $this->error('请勿非法操作！');
        }
    }

    //益华集团模块首页
    public function index(){
        if (empty(session('name'))){
            return $this->fetch('/index/login');die();
        }
        $num = 10;
        $b = new Po();
        $count = $b->count();
        $data = $b->select($count);
        $pageNum = ceil($count/$num);
        $page = $data->render();
        $this->assign('data',$data);
        $this->assign('count',$count);
        $this->assign('page',$page);
        $this->assign('pageNum',$pageNum);
        return $this->fetch();
    }

    //添加职位
    public function add(){
        if (empty(session('name'))){
            return $this->fetch('/index/login');die();
        }
        return $this->fetch();
    }

    public function bg(){
        if (empty(session('name'))){
            return $this->fetch('/index/login');die();
        }
        $data = Db::name('bg')->where('id',1)->find();
        $this->assign('data',$data);
        return $this->fetch();
    }
    public function con1(){
        if (empty(session('name'))){
            return $this->fetch('/index/login');die();
        }
        $data = Db::name('con')->select();
        $this->assign('data',$data);
        return $this->fetch();
    }
    //更新内容
    public function updcon1(){
        if (empty(session('name'))){
            return $this->fetch('/index/login');die();
        }
        $id = input('param.id/d');
        $data = Db::name('con')->where('id',$id)->find();
        $this->assign('data',$data);
        return $this->fetch();
    }
    //更新内容
    public function updcon(){
        $id = $_POST['id'];
        $data['title'] = $_POST['title'];
        $data['content'] = $_POST['content'];
        $data['time'] = time();
        $res = Db::name('con')->where('id',$id)->update($data);
        if (!$res){
            $this->error('提交失败！请稍后再试');
        }else{
            $this->success('提交成功','index');
        }
    }

    //更新图片及标题
    public function updbg(){
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
        $res = Db::name('bg')->where('id',1)->update($data);
        if (!$res){
            $this->error('提交失败！请稍后再试');
        }else{
            $this->success('提交成功','index');
        }
        return $this->fetch();

    }

    //添加户型
    public function insert(){

        if(empty($_POST['name'])){
            $this->error('名称不能为空！');die();
        }else{
            $data['name'] = $_POST['name'];
        }
        if(empty($_POST['date_time'])){
            $this->error('发布日期不能为空！');die();
        }else{
            $data['date_time'] = strtotime($_POST['date_time']);
        }
        if(empty($_POST['num'])){
            $this->error('招聘人数不能为空！');die();
        }else{
            $data['num'] = $_POST['num'];
        }
        if(empty($_POST['where1'])){
            $this->error('工作地点不能为空！');die();
        }else{
            $data['where1'] = $_POST['where1'];
        }
        if(empty($_POST['miaosu'])){
            $this->error('职位描述不能为空！');die();
        }else{
            $data['miaosu'] = $_POST['miaosu'];
        }
        if(empty($_POST['content'])){
            $this->error('内容要求不能为空！');die();
        }else{
            $data['content'] = $_POST['content'];
        }
        $b = new Po();
        $res = $b->insert($data);
        if (!$res){
            $this->error('添加失败！');die();
        }else{
            $this->success('添加成功','index?page=1');
        }
    }

    //修改户型
    public function edit()
    {
        if (empty(session('name'))){
            return $this->fetch('/index/login');die();
        }
        $id = input('param.id/d');
        $b = new Po();
        $data = $b->find($id);
        $this->assign('data',$data);
        return $this->fetch();
    }

    //修改户型
    public function update()
    {
        $id = input('param.id/d');
        $b = new Po();
        if(empty($_POST['name'])){
            $this->error('名称不能为空！');die();
        }else{
            $data['name'] = $_POST['name'];
        }
        if(empty($_POST['date_time'])){
            $this->error('发布日期不能为空！');die();
        }else{
            $data['date_time'] = strtotime($_POST['date_time']);
        }
        if(empty($_POST['num'])){
            $this->error('招聘人数不能为空！');die();
        }else{
            $data['num'] = $_POST['num'];
        }
        if(empty($_POST['where1'])){
            $this->error('工作地点不能为空！');die();
        }else{
            $data['where1'] = $_POST['where1'];
        }
        if(empty($_POST['miaosu'])){
            $this->error('职位描述不能为空！');die();
        }else{
            $data['miaosu'] = $_POST['miaosu'];
        }
        if(empty($_POST['content'])){
            $this->error('内容要求不能为空！');die();
        }else{
            $data['content'] = $_POST['content'];
        }
        $res = $b->edit($id,$data);
        if (!$res){
            $this->success('提交成功','index?page=1');
        }else{
            $this->success('提交成功','index?page=1');
        }
    }

    //删除户型
    public function del()
    {
        $id = $_REQUEST['id'];
        $b = new Po();
        $res = $b->del($id);
        if (!$res){
            echo json_encode(['status'=>0,'msg'=>'删除失败！请稍后再试']);
        }else{
            echo json_encode(['status'=>1,'msg'=>'删除成功']) ;
        }
    }
}