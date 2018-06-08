<?php
/**
 * 管理员模块
 * Created by PhpStorm.
 * User: TianPeng Ao
 * Date: 2017/8/1
 * Time: 10:42
 */
namespace app\admin\controller;
use think\Controller;
use app\admin\model\User as U;
class User extends Controller
{
    public function __construct($request = null)
    {
        parent::__construct($request);
        if (session('id') != 1){
            $this->error('请勿非法操作！');
        }
    }
    //管理员管理首页
    public function index(){
        if (empty(session('name'))){
            return $this->fetch('/index/login');die();
        }
        $num = 10;
        $user = new U();
        $data = $user->selall();
        $count = $user->conent();
        $pageNum = ceil($count/$num);
        $this->assign('data',$data);
        $this->assign('count',$count);
        $this->assign('pageNum',$pageNum);
        return $this->fetch();
    }

    //添加管理员页
    public function add(){
        if (empty(session('name'))){
            return $this->fetch('/index/login');die();
        }
        return $this->fetch();
    }

    //添加管理员
    public function insert(){
        if (!empty($_POST['name'])){
            $data['name'] = $_POST['name'];
            if (!empty($_POST['password'])){
                $data['password'] = md5($_POST['password']);
                if (!empty($_POST['phone'])){
                    $data['phone'] = $_POST['phone'];
                    $user = new U();
                    $res = $user->ins($data);
                    if ($res){
                        $this->success('添加成功','index?page=1');
                    }else{
                        $this->error('系统错误！稍后再试');
                    }
                }else{
                    $this->error('电话不能为空');
                }
            }else{
                $this->error('密码不能为空');
            }
        }else{
            $this->error('姓名不能为空');
        }
    }

    //修改管理员页
    public function update(){
        $id = input('param.id/d');
        $user = new U();
        $data = $user->find($id);
        $iid = session('iid');
        $this->assign('data',$data);
        $this->assign('idd',$id);
        $this->assign('iid',$iid);
        return $this->fetch();
    }

    //修改管理员
    public function upd(){

        $id = input('param.id/d');
        $data['name'] = $_POST['name'];
        $data['phone'] = $_POST['phone'];
        if (!empty($_POST['password'])){
            $data['password'] = md5($_POST['password']);
        }
        $data['admin_rank'] = $_POST['admin_rank'];
        $user = new U();
        $data = $user->upd($id,$data);
        if ($data){
            $this->success('修改成功','index?page=1');
        }else{
            $this->error('系统错误！稍后再试');
        }
    }

    //设置管理员默认密码123456
    public function defaultpwd()
    {
        $id = $_REQUEST['id'];
        $user = new U();
        $data['password'] = md5('123456');
        $data = $user->defu($id,$data);
        if($data){
            echo json_encode(['status'=>1,'msg'=>'恢复成功']);
        }else{
            echo json_encode(['status'=>1,'msg'=>'恢复成功']);
        }
    }

    //删除管理员
    public function del()
    {
        $id = $_REQUEST['id'];
        $cli = new U();
        $res = $cli->del($id);
        if (!$res){
            echo json_encode(['status'=>0,'msg'=>'删除失败！请稍后再试']);
        }else{
            echo json_encode(['status'=>1,'msg'=>'删除成功！']) ;
        }
    }
}