<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
use think\Route;
// 注册路由到index模块的News控制器的read操作
Route::rule('index','index/index/index');

Route::rule('mzsm','index/index/mzsm');

Route::rule('bname','index/index/bname');

Route::rule('youshi','index/index/youshi');

Route::rule('lianxiwomen','index/index/lianxiwomen');

Route::rule('yihuajituan','index/index/yihuajituan');

Route::rule('zhuzhai','index/index/zhuzhai');

Route::rule('shangpu','index/index/shangpu');

Route::rule('mengban','index/index/mengban');

Route::rule('rxhx','index/index/rxhx');

Route::rule('xwzx','index/index/xwzx');

Route::rule('nesinfo','index/index/nesinfo');

Route::rule('rencaizp','index/index/rencaizp');

Route::rule('zp','index/index/zp');

Route::rule('add','index/index/add');