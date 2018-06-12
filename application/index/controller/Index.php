<?php
namespace app\index\controller;

use think\Controller;
use think\Db;
class Index extends Controller
{
    public $n;
    private $home;
    private $tel;

    public function __construct($request = null)
    {
        parent::__construct($request);
        $time = time();
        $oldt = Db::name('user')->where('id',1)->value('autotime');
        $baom = Db::name('baom')->where('id',1)->find();
        $num11 = $time - $oldt;
        $num1 = $num11 / 3600;
        $this->n = floor($num1);
        $this->assign('baom',$baom);
        $this->home = Db::name('home')->where('id',1)->find();
        $this->assign('home', $this->home);
        $this->tel = Db::name('baom')->where('id',1)->find();
        $this->con1 = Db::name('con')->select();
        $this->assign('tel',$this->tel);
        $this->assign('con1',$this->con1);
        $this->assign('siteurl',URL);
    }

    //首页
    public function index()
    {
        $title2 = "首页";
        $home = Db::name('home')->where('id',1)->find();
        $this->assign('title2',$title2);
        if (isMobile() || $this->isipad()){
            return $this->fetch('m_'.request()->action());
        }else{
            return $this->fetch();
        }
    }

    //联系我们
    public function mzsm()
    {
        if (isMobile() || $this->isipad()){
            return $this->fetch('m_'.request()->action());
        }else{
            return $this->fetch();
        }
    }

    //联系我们
    public function bname()
    {
        $cou = Db::name('client')->count('id');
        $num = 100 + $cou + $this->n;
        $user = Db::name('client')->order('time desc')->where('is_do',2)->select();
        $data = Db::name('baom')->where('id',1)->find();
        $this->assign('data',$data);
        $this->assign('num',$num);
        $this->assign('user',$user);
        return $this->fetch('m_'.request()->action());

    }

    //优势
    public function youshi()
    {
        $data = Db::name('yous')->where('id',1)->find();
        $this->assign('data',$data);
        if (isMobile() || $this->isipad()){
            return $this->fetch('m_'.request()->action());
        }else{
            return $this->fetch();
        }
    }

    //联系我们
    public function lianxiwomen()
    {
        $data = Db::name('business')->where('id',1)->find();
        $weixin = Db::name('home')->where('id',1)->find();
        $this->assign('data',$data);
        $this->assign('weixin',$weixin);
        if (isMobile() || $this->isipad()){
            return $this->fetch('m_'.request()->action());
        }else{
            return $this->fetch();
        }
    }

    //益华集团
    public function yihuajituan()
    {
        $data = Db::name('position')->order('date_time')->select();
        $bg = Db::name('bg')->where('id',1)->find();
        $con1 = Db::name('con')->select();
        $this->assign('data',$data);
        $this->assign('bg',$bg);
        if (isMobile() || $this->isipad()){            
//             foreach ($con1 as $k => &$v){
//                 $con1[$k]['content'] = strip_tags($v['content']);
//             }
            $this->assign('con1',$con1);
            return $this->fetch('m_'.request()->action());
        }else{
            $this->assign('con1',$con1);
            return $this->fetch();
        }
    }
    //益华集团介绍
    public function yihuajituanjs(){
        $data = Db::name('position')->order('date_time')->select();
        $bg = Db::name('bg')->where('id',1)->find();
        $con1 = Db::name('con')->select();
        $this->assign('data',$data);
        $this->assign('bg',$bg);
        if (isMobile() || $this->isipad()){
            //             foreach ($con1 as $k => &$v){
            //                 $con1[$k]['content'] = strip_tags($v['content']);
            //             }
            $this->assign('con1',$con1);
            return $this->fetch('m_'.request()->action());
        }else{
            $this->assign('con1',$con1);
            return $this->fetch();
        }
    }
    
    //益华集团项目
    public function yihuajituanxm(){
        $data = Db::name('position')->order('date_time')->select();
        $bg = Db::name('bg')->where('id',1)->find();
        $con1 = Db::name('con')->select();
        $this->assign('data',$data);
        $this->assign('bg',$bg);
        if (isMobile() || $this->isipad()){
            //             foreach ($con1 as $k => &$v){
            //                 $con1[$k]['content'] = strip_tags($v['content']);
            //             }
            $this->assign('con1',$con1);
            return $this->fetch('m_'.request()->action());
        }else{
            $this->assign('con1',$con1);
            return $this->fetch();
        }
    }
    
    //益华集团子公司
    public function yihuajituanzgs(){
        $data = Db::name('position')->order('date_time')->select();
        $bg = Db::name('bg')->where('id',1)->find();
        $con1 = Db::name('con')->select();
        $this->assign('data',$data);
        $this->assign('bg',$bg);
        if (isMobile() || $this->isipad()){
            //             foreach ($con1 as $k => &$v){
            //                 $con1[$k]['content'] = strip_tags($v['content']);
            //             }
            $this->assign('con1',$con1);
            return $this->fetch('m_'.request()->action());
        }else{
            $this->assign('con1',$con1);
            return $this->fetch();
        }
    }

    //推荐户型页
    public function zhuzhai()
    {
        $data = Db::name('building')->where('rec',1)->order('id')->select();
        $data1 = Db::name('zhuzai')->where('id',1)->find();
        
        $this->assign('data',$data);
        $this->assign('data1',$data1);
        if (isMobile() || $this->isipad()){
            return $this->fetch('m_'.request()->action());
        }else{
            return $this->fetch();
        }
    }
    
    //商铺页
    public function shangpu()
    {
//         $data = Db::name('sbuilding')->where('rec',1)->order('id')->select();
        $data1 = Db::name('shangpu')->where('id',1)->find();
        
//         $this->assign('data',$data);
        $this->assign('data1',$data1);
        if (isMobile() || $this->isipad()){
            return $this->fetch('m_'.request()->action());
        }else{
            return $this->fetch();
        }
    }

    //户型详情页
    public function mengban()
    {
        $id = input('param.id/d');
        $ty = input('param.ty/d');
        if($ty == 1){
            $u = "/zhuzhai.html";
        }else{
            $u = "/rxhx.html";
        }
        $data = Db::name('building')->where('id',$id)->find();
        $this->assign('data',$data);
        $this->assign('u',$u);
        return $this->fetch('m_'.request()->action());
    }

    //户型页
    public function rxhx()
    {

        $data = Db::name('building')->order('id desc')->select();                            /*查询所有户型*/
        $data1 = Db::name('building')->where('sort',2)->order('id desc')->select();  /*查询2房户型*/
        $data2 = Db::name('building')->where('sort',3)->order('id desc')->select();  /*查询3房户型*/
        $data3 = Db::name('building')->where('sort',4)->order('id desc')->select();  /*查询4房户型*/
        $yo = Db::name('you')->where('id',1)->find();
        $this->assign('yo',$yo);
        $this->assign('data',$data);
        $this->assign('data1',$data1);
        $this->assign('data2',$data2);
        $this->assign('data3',$data3);
        if (isMobile() || $this->isipad()){
            return $this->fetch('m_'.request()->action());
        }else{
            return $this->fetch();
        }
    }

    //新闻页
    public function xwzx()
    {
        if(input('param.fid/d') == 2){
            /*查询所有新闻*/
            $data = Db::name('new')->field('id,title,miaosu,img1,date_time')->order('date_time desc')->select();
        }elseif(input('param.fid/d') == 0){
            /*查询行业新闻*/
            $data = Db::name('new')->where('fenlei',2)->field('id,title,miaosu,img1,date_time')->order('date_time desc')->select();
        }elseif(input('param.fid/d') == 1){
            /*查询公司新闻*/
            $data = Db::name('new')->where('fenlei',1)->field('id,title,miaosu,img1,date_time')->order('date_time desc')->select();
        }
        $data1 = Db::name('new')->field('id,title,miaosu,img1,date_time')->order('date_time desc')->select();
        $data2 = Db::name('new')->where('fenlei',2)->field('id,title,miaosu,img1,date_time')->order('date_time desc')->select();
        $data3 = Db::name('new')->where('fenlei',1)->field('id,title,miaosu,img1,date_time')->order('date_time desc')->select();
        $newbg = Db::name('newbg')->where('id',1)->find();
        $this->assign('newbg',$newbg);
        $this->assign('data',$data);
        $this->assign('data1',$data1);
        $this->assign('data2',$data2);
        $this->assign('data3',$data3);
        if (isMobile() || $this->isipad()){
            return $this->fetch('m_'.request()->action());
        }else{
            return $this->fetch();
        }
    }

    //新闻详情页
    public function nesinfo()
    {
        $nid = input('param.nid/d');
        $maxid = Db::name('new')->max('id');
        $newbg = Db::name('newbg')->where('id',1)->find();
        $minid = Db::name('new')->min('id');
        if ($nid === $maxid){
            $xia= Db::name('new')->field('id,title')->where('id',$minid)->find();
        }else{
            for ($i = $nid+1; $nid<$maxid; $i++) {
                $xia= Db::name('new')->where('id',$i)->field('id,title')->find();
                if (!empty($xia)){
                    break;
                }
            }
        }

        if ($nid === $minid){
            $shang= Db::name('new')->where('id',$maxid)->field('id,title')->find();
        }else{
            for ($k = $nid-1; $nid>$minid; $k--) {
                $shang= Db::name('new')->where('id',$k)->field('id,title')->find();
                if (!empty($shang)){
                    break;
                }
            }
        }
        $num = Db::name('new')->where('id',$nid)->value('look');
        $num1 = $num+1;
        Db::name('new')->where('id',$nid)->update(['look'=>$num1]);
        $data = Db::name('new')->where('id',$nid)->find();
        $data['tab'] = explode('，',$data['tab']);
        $this->assign('data',$data);
        $this->assign('shang',$shang);
        $this->assign('xia',$xia);
        $this->assign('newbg',$newbg);
        if (isMobile() || $this->isipad()){
            return $this->fetch('m_'.request()->action());
        }else{
            return $this->fetch();
        }
    }

    //招聘详情页
    public function rencaizp()
    {
        $pid = input('param.pid/d');
        $num = Db::name('position')->where('id',$pid)->value('look');
        $num1 = $num+1;
        Db::name('position')->where('id',$pid)->update(['look'=>$num1]);
        $data = Db::name('position')->where('id',$pid)->find();
        $bg = Db::name('bg')->where('id',1)->find();
        $this->assign('bg',$bg);
        $this->assign('data',$data);
        if (isMobile() || $this->isipad()){
            return $this->fetch('m_'.request()->action());
        }else{
            return $this->fetch();
        }
    }

    //招聘页
    public function zp()
    {
        $data = Db::name('position')->field('id,name,num,miaosu')->select();
        $this->assign('data',$data);
        if (isMobile() || $this->isipad()){
            return $this->fetch('m_'.request()->action());
        }else{
            return $this->fetch();
        }
    }
    
    //客户报名处理
    public function add()
    {
        if (empty($_REQUEST['name'])){
            echo '请输入姓名';die();
        }else{
            $data['name'] = $_REQUEST['name'];
            if (!empty($_REQUEST['is_do'])){
                $data['is_do'] = $_REQUEST['is_do'];
            }
            if (empty($_REQUEST['phone'])){
                echo '请输入联系电话';die();
            }else{
                if(preg_match("/^1[34578]{1}\d{9}$/",$_REQUEST['phone'])){

                    /**禁止IP**/
                    $ip = $_SERVER['REMOTE_ADDR'];
                    $data['ip'] = ip2long($ip);
                    $num = Db::name('client')->where('ip',$data['ip'])->count('id');
                    if($num >= 20){
                        echo '操作过于频繁，请稍后再试';die();
                    }
                    /**禁止IP**/

                    $data['phone'] = $_REQUEST['phone'];
                    $phone = $_REQUEST['phone'];
                    $res1 = Db::name('client')->where('phone',$phone)->value('id');
                    if ($res1){                      //客户没注册过
                        if(Db::name('client')->where('phone',$phone)->update(['name'=>$data['name']])){ //更新客户信息
                            echo '报名成功';die();
                        }else{
                            echo '报名成功';die();
                        }
                    }else{                          //客户没注册过
                        $data['time'] = time();
                        $res = Db::name('client')->insert($data);
                        if (!$res){
                            echo '报名失败';die();
                        }else{
//                            include_once(APP_PATH.'SmsDemo.php');
//                            header('Content-Type: text/plain; charset=utf-8');
//                            $accessKeyId = 'LTAIpxLP69miz3SA';
//                            $accessKeySecret = 'gMRMMSkwVFhYKqHXwQQhpKvuN5rnP3';
//                            $demo = new SmsDemo1($accessKeyId,$accessKeySecret);
//                            $signName = '贵州蓝蚁';                         /*短信签名*/
//                            $templateCode = 'SMS_78615187';                                 /*短信模板编号*/
//                            $phoneNumbers = '18798820923';                              /*短信接收者*/
//                            //$phoneNumbers = '18166756207';                                /*短信接收者*/
//                             $name11 = ' （中环国际）'.$data['name'].' ';
//                            $templateParam = ["name"=>$name11, "tell"=>$data['phone']];   /*短信模板中字段的值*/
//                            $outId = time();                                                /*发送短信流水号*/
//                            $demo->sendSms($signName, $templateCode, $phoneNumbers, $templateParam, $outId);
                            echo '报名成功';die();
                        }
                    }
                }else{
                    echo "请输入正确的手机号";die();
                }
            }
        }
    }
}
