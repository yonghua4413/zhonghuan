<?php
/**
 * 客户管理模块
 * Created by PhpStorm.
 * User: lanell
 * Date: 2017/8/1
 * Time: 10:08
 */
namespace app\admin\controller;
use think\Controller;
use app\admin\model\Client as Cli;
class Book extends Controller
{
    public function __construct($request = null)
    {
        parent::__construct($request);
        if (session('id') != 1){
            $this->error('请勿非法操作！');
        }
    }

    //后台客户管理首页
    public function index(){
        if (empty(session('name'))){
            return $this->fetch('/index/login');die();
        }
        $num = 10;
        if (!empty(input('param.tid/d'))){
            $tid = input('param.tid/d');
            $cli = new Cli();
            if ($tid === 1){
                $count1 = $cli->conent1();
                $pageNum = ceil($count1/$num);
                $data = $cli->select1($count1);
                $this->assign('tcount',$count1);
                $this->assign('data',$data);
            }elseif ($tid === 2){
                $count2 = $cli->conent2();
                $pageNum = ceil($count2/$num);
                $data = $cli->select2($tid,$count2);
                $this->assign('tcount',$count2);
                $this->assign('data',$data);
            }
        }else{
            $this->error('系统错误，稍后再试。。。');die();
        }

        $page = $data->render();
        $this->assign('page',$page);
        $this->assign('pageNum',$pageNum);
        return $this->fetch();
    }

    //删除客户
    public function del()
    {
        $id = $_REQUEST['id'];
        $cli = new Cli();
        if (input('param.tid/d') == 1){
            $res = $cli->del1($id);
        }else{
            $res = $cli->del($id);
        }
        if (!$res){
            echo json_encode(['status'=>0,'msg'=>'删除失败！请稍后再试']);
        }else{
            echo json_encode(['status'=>1,'msg'=>'删除成功！']) ;
        }
    }

    //多选删除客户
    public function delall()
    {
        $allid = $_POST['id'];
        $cli = new Cli();
        foreach ($allid as $id) {
            if (input('param.tid/d') == 1){
                $res = $cli->del1($id);
            }else{
                $res = $cli->del($id);
            }
        }
        if (!$res){
            $this->error('删除失败！请稍后再试');
        }else{
            $this->success('删除成功');
        }
    }

    //设置联系过的客户
    public function set()
    {
        $id = $_REQUEST['id'];
        $cli = new Cli();
        $data = $cli->sect($id);
        if($data){
            $del = $cli->del($id);
            if($del){
                $data['is_do'] = 1;
                $res = $cli->inst($data);
                if (!$res){
                    echo json_encode(['status'=>0,'msg'=>'操作失败！请稍后再试']);
                }else{
                    echo json_encode(['status'=>1,'msg'=>'操作成功！']) ;
                }
            }else{
                echo json_encode(['status'=>0,'msg'=>'操作失败！请稍后再试']);
            }
        }else{
            echo json_encode(['status'=>0,'msg'=>'操作失败！请稍后再试']);
        }
    }
}