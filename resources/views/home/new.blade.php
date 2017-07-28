@extends('layouts.home')
@section('info')
    <title>{{$field->art_title}} - {{Config::get('web.web_title')}}</title>
    <meta name="keywords" content="{{$field->art_tag}}" />
    <meta name="description" content="{{$field->art_description}}" />
@endsection
@section('content')
<div class="ui fluid container" style="background:white;padding:20px;">
    <div class="ui big breadcrumb">
        <span class="section">您当前的位置：</span>
        <a class="section" href="{{url('/')}}">首页</a>
        <div class="divider"> / </div>
        @if($field->pid_data)
            <a class="section" href="{{url('cate/'.$field->pid_data->cate_id)}}">{{$field->pid_data->cate_name}}</a>
            <div class="divider"> / </div>
            <a class="section active" href="{{url('cate/'.$field->cate_id)}}">{{$field->cate_name}}</a></h1>
        @else
            <a class="section active" href="{{url('cate/'.$field->cate_id)}}">{{$field->cate_name}}</a></h1>
        @endif
    </div>
    <div class="share" style="float:right;">
        <!-- Baidu Button BEGIN -->
        <div id="bdshare" class="bdshare_t bds_tools_32 get-codes-bdshare"><a class="bds_tsina"></a><a class="bds_qzone"></a><a class="bds_tqq"></a><a class="bds_renren"></a><span class="bds_more"></span><a class="shareCount"></a></div>
        <script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=6574585" ></script>
        <script type="text/javascript" id="bdshell_js"></script>
        <script type="text/javascript">
            document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000)
        </script>
        <!-- Baidu Button END -->
        <div class="blank"></div>
        <div class="news">
            @parent
        </div>
    </div>
    <!--清除浮动，否则下面的div会和上面重叠-->
    <div style="clear:both"></div>
    <div class="ui segment">
        <div style="float:right"><span>发布时间：{{date('Y-m-d',$field->art_time)}}； </span><span>作者:{{$field->art_editor}}； </span><span>查看次数：{{$field->art_view}}</span></div>
        <div sytle="float:left"><h2 class="ui header">{{$field->art_title}}</h2></div>
        <div sytle="float:clear"></div>
        <div class="ui divider"></div>
        <div>
            {!! $field->art_content !!}
        </div>
        <div class="keybq">
            <p><span>关键字词</span>：{{$field->art_tag}}</p>
        </div>
        <div class="ui divider"></div>
        <div>
            <div style="float:right">
                @if($article['next'])
                    <a href="{{url('a/'.$article['next']->art_id)}}">{{$article['next']->art_title}}<i class="pointing right icon"></i></a>
                @else
                    <span>没有下一篇了<i class="pointing right icon"></i></span>
                @endif
            </div>
            <div styel="float:left">                @if($article['pre'])
                    <a href="{{url('a/'.$article['pre']->art_id)}}"><i class="pointing left icon"></i>{{$article['pre']->art_title}}</a>
                @else
                    <span><i class="pointing right icon"></i>没有上一篇了</span>
                @endif
            </div>
        </div>
        <div class="ui divider"></div>
        <div>
            <h3 class="ui header"><i class="unordered list icon"></i>相关文章</h3>
            <ul>
                @foreach($data as $d)
                    <li><a href="{{url('a/'.$d->art_id)}}" title="{{$d->art_title}}">{{$d->art_title}}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
