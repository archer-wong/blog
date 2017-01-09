<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class CommonController extends Controller
{
    //图片上传
    public function upload()
    {
        //注意使用的是file方法
        $file = Input::file('Filedata');
        //判断是否有效
        if($file -> isValid()){
            //获得扩展名
            $entension = $file -> getClientOriginalExtension(); 
            //生成一个唯一的名字
            $newName = date('YmdHis').mt_rand(100,999).'.'.$entension;
            //移动并且重命名
            $path = $file -> move(base_path().'/uploads',$newName);
            //我们要存贮的文件位置
            $filepath = 'uploads/'.$newName;
            return $filepath;
        }
    }
}
