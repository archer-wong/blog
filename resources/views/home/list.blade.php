@extends('layouts.home')
@section('info')
    <title>{{$field->cate_name}} - {{Config::get('web.web_title')}}</title>
    <meta name="keywords" content="{{$field->cate_keywords}}" />
    <meta name="description" content="{{$field->cate_description}}" />
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
        @foreach($data as $d)
            <div class="ui segment">
                <div style="float:right"><span>{{date('Y-m-d',$d->art_time)}}</span><span>作者：{{$d->art_editor}}</span></div>
                <div sytle="float:left"><h3 class="ui header">{{$d->art_title}}</h3></div>
                <div sytle="float:clear"></div>
                <p style="margin-top:15px;">{{$d->art_description}}</p>
                <div sytle="float:left"><a title="{{$d->art_title}}" href="{{url('a/'.$d->art_id)}}" target="_blank">阅读全文>></a></div>
            </div>
        @endforeach
</div>
@endsection


