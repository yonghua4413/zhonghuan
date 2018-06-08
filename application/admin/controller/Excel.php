<?php
/****
 *
 *导出客户信息Excel表
 *
****/
namespace app\admin\controller;
include_once APP_PATH . 'PHPExcel/Classes/PHPExcel.php';
use think\Controller;
use app\admin\model\Client as Cli;
class Excel extends Controller
{
    public function __construct($request = null)
    {
        parent::__construct($request);
        if (session('id') != 1){
            $this->error('请勿非法操作！');
        }
    }
    public function Down()
    {
        $excel = new \PHPExcel();
        $cli = new Cli();
        $letter = array('A','B','C');       //Excel表格式,5列
        $tableheader = array('ID','客户姓名','手机号');        //表头数组

        //填充表头信息
        for($i = 0;$i < count($tableheader);$i++) {
            $excel->getActiveSheet()->setCellValue("$letter[$i]1","$tableheader[$i]");
        }

        //表格数组
        $data = [];
        $where = [];
        $name = '';

        //设置筛选条件
        if ($_POST['start'] !== 'NaN'){
            $start = $_POST['start'];
            if ($_POST['end'] !== 'NaN'){
                $end = $_POST['end'];
                $where = [
                    $start,
                    $end,
                ];
                $name = '('.date("Y年m月d日 H时i分s秒",$where[0]).' 到 '.date("Y年m月d日 H时i分s秒",$where[1]).')';
            }else{
                $where = [
                    $start,
                    2596806176,
                ];
                $name = '('.date("Y年m月d日 H时i分s秒",$where[0]).')以后';
            }
        }
        if ($_POST['end'] !== 'NaN'){
            $end = $_POST['end'];
            if ($_POST['start'] !== 'NaN'){
                $start = $_POST['start'];
                $where = [
                    $start,
                    $end,
                ];
                $name = '('.date("Y年m月d日 H时i分s秒",$where[0]).' 到 '.date("Y年m月d日 H时i分s秒",$where[1]).')';
            }else{
                $where = [
                    0,
                    $end,
                ];
                $name = '('.date("Y年m月d日 H时i分s秒",$where[1]).')以前';
            }
        }

        $tid = input('param.tid/d');
        if ($tid === 2){
            if ($where){
                $res = $cli->sel1($where);
            }else{
                $res = $cli->sel1no();
            }
            $name1 = $name.'未联系的数据';
        }else{
            if ($where){
                $res = $cli->sel12($where);
            }else{
                $res = $cli->sel12no();
            }
            $name1 = $name.'已联系的数据';
        }
        if (empty($res)) {
            $this->error('当前无任何数据！');
        }else{
            foreach ($res as $key => $vo){
                $data[$key] = array_values($vo);
            }
        }

        //填充表格信息
        for ($i = 2;$i <= count($data)+ 1;$i++) {
            $j = 0;
            foreach ($data[$i - 2] as $key=>$value) {
                $excel->getActiveSheet()->setCellValue("$letter[$j]$i","$value");
                $j++;
            }
        }

        //创建Excel输入对象
        $write = new \PHPExcel_Writer_Excel2007($excel);
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control:must-revalidate, post-check=0, pre-check=0");
        header("Content-Type:application/force-download");
        header("Content-Type:application/vnd.ms-execl");
        header("Content-Type:application/octet-stream");
        header("Content-Type:application/download");;
        header('Content-Disposition:attachment;filename="'.$name1.'.xlsx"');
        header("Content-Transfer-Encoding:binary");
        header('Cache-Control: max-age=0');
        $write->save('php://output');
    }
}