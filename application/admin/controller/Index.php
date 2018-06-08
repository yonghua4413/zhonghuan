<?php
namespace app\admin\controller;
/**
 * 新闻中心模块
 * Created by PhpStorm.
 * User: lanell
 * Date: 2017/8/1
 * Time: 10:56
 */
use think\Controller;
use app\admin\model\User as U;
use app\admin\model\Column as C;
use think\Session;
use think\Db;
class Index extends Controller
{
    private function NewModel(){
        return new U;
    }

    //后台新闻管理首页
    public function index(){
        if (empty(session('name'))){
            return $this->fetch('/index/login');die();
        }
        $b = new C();
        $num = 10;
        $data = $b->select();
        $count = $b->selc();
        $pageNum = ceil($count/$num);
        $page = $data->render();
        $this->assign('data',$data);
        $this->assign('count',$count);
        $this->assign('page',$page);
        $this->assign('pageNum',$pageNum);
        return $this->fetch();
    }

    //更新新闻中心图片及标题
    public function updindex(){
        $data = Db::name('newbg')->where('id',1)->find();
        $this->assign('data',$data);
        return $this->fetch();

    }

    //更新新闻中心图片及标题
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
        $res = Db::name('newbg')->where('id',1)->update($data);
        if (!$res){
            $this->error('提交失败！请稍后再试');
        }else{
            $this->success('提交成功','index');
        }
        return $this->fetch();

    }

    //添加新闻页面
    public function add(){
        if (empty(session('name'))){
            return $this->fetch('/index/login');die();
        }
        return $this->fetch();
    }

    //添加新闻
    public function insert(){
        $b = new C();
        if(empty($_POST['title'])){
            $this->error('名称不能为空！');die();
        }else{
            $data['title'] = $_POST['title'];
        }
        if(!empty($_POST['fenlei'])){
            $data['fenlei'] = $_POST['fenlei'];
        }
        if(empty($_POST['tab'])){
            $this->error('标签不能为空！');die();
        }else{
            $data['tab'] = $_POST['tab'];
        }
        if(empty($_POST['come'])){
            $this->error('来源不能为空！');die();
        }else{
            $data['come'] = $_POST['come'];
        }

        if(empty($_POST['miaosu'])){
            $this->error('内容描述不能为空！');die();
        }else{
            $data['miaosu'] = $_POST['miaosu'];
        }
        if(empty($_POST['content'])){
            $this->error('内容不能为空！');die();
        }else{
            $data['content'] = $_POST['content'];
        }

        if(empty($_POST['date_time'])){
            $this->error('新闻日期不能为空！');die();
        }else{
            $data['date_time'] = strtotime($_POST['date_time']);
        }
        $data['is_see'] = session('name');
        $data['is_see1'] = session('name');
        $file = request()->file('image');
        if (!empty($file)) {
            $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads/');
            if($info){
                $path = '/uploads/'.$info->getSaveName();
                $data['img1'] = $path;
            }else{
                echo 'LOGO上传出错！';die();
            }
        }
        $data['time'] = time();
        $res = $b->insert($data);
        if (!$res){
            $this->error('添加失败！请稍后再试');
        }else{
            $this->success('添加成功','index');
        }
    }

    //修改新闻内容页
    public function edit()
    {
        if (empty(session('name'))){
            return $this->fetch('/index/login');die();
        }
        $id = input('param.id/d');
        $b = new C();
        $data = $b->find($id);
        $this->assign('data',$data);
        return $this->fetch();
    }

    //修改新闻内容
    public function update()
    {
        $b = new C();
        $id = $_POST['id'];
        if(empty($_POST['title'])){
            $this->error('名称不能为空！');die();
        }else{
            $data['title'] = $_POST['title'];
        }
        $data['is_see1'] = session('name');
        if(!empty($_POST['fenlei'])){
            $data['fenlei'] = $_POST['fenlei'];
        }
        if(empty($_POST['tab'])){
            $this->error('标签不能为空！');die();
        }else{
            $data['tab'] = $_POST['tab'];
        }
        if(empty($_POST['come'])){
            $this->error('来源不能为空！');die();
        }else{
            $data['come'] = $_POST['come'];
        }

        if(empty($_POST['miaosu'])){
            $this->error('内容描述不能为空！');die();
        }else{
            $data['miaosu'] = $_POST['miaosu'];
        }
        if(empty($_POST['content'])){
            $this->error('内容不能为空！');die();
        }else{
            $data['content'] = $_POST['content'];
        }
        if(empty($_POST['date_time'])){
            $this->error('日期不能为空！');die();
        }else{
            $data['date_time'] = strtotime($_POST['date_time']);
        }
        $file = request()->file('image');
        // 移动到框架应用根目录/public/uploads/ 目录下
        if (!empty($file)) {
            $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads/');
            if($info){
                $path = '/uploads/'.$info->getSaveName();
                $data['img1'] = $path;
            }else{
                echo 'LOGO上传出错！';die();
            }
        }
        $data['time'] = time();
        $res = $b->edit($id,$data);
        if (!$res){
            $this->success('保存成功','index');
        }else{
            $this->success('保存成功','index');
        }
    }

    //删除新闻
    public function del()
    {
        $id = $_REQUEST['id'];
        $b = new C();
        $res = $b->del($id);
        if (!$res){
            echo json_encode(['status'=>0,'msg'=>'删除失败！请稍后再试']);
        }else{
            echo json_encode(['status'=>1,'msg'=>'删除成功']) ;
        }
    }

    //登录后台
    public function login()
    {
        $user = $this->NewModel();
        if (empty($_REQUEST['username'])){
            die('请输入用户名！');
        }else{
            $name = $_REQUEST['username'];
            if (empty($_REQUEST['password'])){
                die('请输入用户密码！');
            }else{
                if (empty($_REQUEST['viy'])){
                    die('请输入用验证码！');
                }else{
                    $res = $user->login($name);
                    if(!$res['id']){
                        die('用户名不存在！');
                    }else{
                        $pwd = md5($_REQUEST['password']);
                        if($res['password'] !== $pwd){
                            die('用户登录密码错误！');
                        }else{
                            $viy = $_REQUEST['viy'];
                            if(!captcha_check($viy)){
                                die('验证码错误！');
                            }else{
                                Session::set('name',$name);
                                Session::set('iid',$res['id']);
                                Session::set('id',$res['admin_rank']);
                                echo 1;die();
                            }
                        }
                    }
                }
            }
        }

    }

    //退出后台管理
    public function out()
    {
        if(!Session::clear()){
            header('Refresh:0,Url=index');
        }else{
            $this->error('网络错误!清稍后再试');
        }
    }
}