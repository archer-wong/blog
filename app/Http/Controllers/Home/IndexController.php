<?php

namespace App\Http\Controllers\Home;

use App\Http\Model\Article;
use App\Http\Model\Category;
use App\Http\Model\Links;

class IndexController extends CommonController
{
    public function index()
    {
        //点击量最高的6篇文章（站长推荐）
        $pics = Article::orderBy('art_view','desc')->take(6)->get();

        //图文列表5篇（带分页）
        $data = Article::orderBy('art_time','desc')->paginate(5);

        //友情链接
        $links = Links::orderBy('link_order','asc')->get();

        return view('home.index',compact('hot','new','pics','data','links'));
    }

    public function cate($cate_id)
    {


        //查看次数自增
        Category::where('cate_id',$cate_id)->increment('cate_view');

        //当前分类的子分类
        $submenu = Category::where('cate_pid',$cate_id)->orderBy('cate_order','asc')->get();

        $field = Category::find($cate_id);

        //如果有父级菜单,取得父级菜单数据
        if($field->cate_pid != 0 ){
            $field['pid_data'] = Category::find($field->cate_pid);
            //图文列表4篇（带分页）
            $data = Article::where('cate_id',$cate_id)->orderBy('art_time','desc')->paginate(4);
        }else{
            $cateIds = Category::where('cate_pid',$cate_id)->get(['cate_id']);
            $arr = [intval($cate_id)];
            foreach($cateIds as $v){
                $arr[] = $v->cate_id;
            }

            //图文列表4篇（带分页）
            $data = Article::whereIn('cate_id',$arr)->orderBy('art_time','desc')->paginate(4);
        }
        foreach($data as &$v){
            $v['cate_name'] = Category::find($v->cate_id)->cate_name;
        }
        return view('home.list',compact('field','data','submenu'));
    }

    public function article($art_id)
    {
        $field = Article::Join('categories','articles.cate_id','=','categories.cate_id')->where('art_id',$art_id)->first();

        //如果有父级菜单,取得父级菜单数据
        if($field->cate_pid != 0 ){
            $field['pid_data'] = Categories::find($field->cate_pid);
        };

        //查看次数自增
        Article::where('art_id',$art_id)->increment('art_view');

        //上一篇文章和下一篇文章
        $article['pre'] = Article::where('art_id','<',$art_id)->orderBy('art_id','desc')->first();
        $article['next'] = Article::where('art_id','>',$art_id)->orderBy('art_id','asc')->first();

        //相关文章,本分类下的文章
        $data = Article::where('cate_id',$field->cate_id)->orderBy('art_id','desc')->take(6)->get();

        return view('home.new',compact('field','article','data'));
    }
}
