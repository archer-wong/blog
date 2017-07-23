<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    @yield('info')
<!--
    <link href="{{asset('resources/views/home/css/base.css')}}" rel="stylesheet">
    <link href="{{asset('resources/views/home/css/index.css')}}" rel="stylesheet">
    <link href="{{asset('resources/views/home/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('resources/views/home/css/new.css')}}" rel="stylesheet">
-->
    <link href="{{asset('public/semantic/dist/semantic.min.css')}}" rel="stylesheet">
    <script src="{{asset('public/semantic/dist/jquery-3.1.1.min.js')}}"></script>
    <script src="{{asset('public/semantic/dist/semantic.js')}}"></script>
    <!--[if lt IE 9]>
    <script src="{{asset('resources/views/home/js/modernizr.js')}}"></script>
    <![endif]-->
</head>
<body>
<div class="ui fluid container" style="height:100%;overflow:hidden">
    <div class="ui grid" style="height:100%;padding-right:15px;">
        <div class="sixteen wide column blue" style="margin-top:10px;">
            <div class="ui menu container">
                @foreach($navs as $k=>$v)
                    <a class="item ui animated fade button" tabindex="0" href="{{$v->nav_url}}">
                        <div class="visible content">{{$v->nav_name}}</div>
                        <div class="hidden content">{{$v->nav_alias}}</div>
                    </a>
                @endforeach
            </div>
        </div>
        <div class="three wide column" style="height:100%;padding-left:40px;background:white">
            <div class="ui grid container" style="margin-top:50px;">
                <h1 class="ui header">
                    <i class="settings icon"></i>
                    <div class="content">
                        Account Settings
                        <div class="sub header">Manage your preferences</div>
                    </div>
                </h1>
            </div>
            <div class="ui grid container" style="margin-top:100px;">
                <h3 class="ui header">最新文章</h3>
                <div class="ui container">
                    <ol class="ui list">
                        @foreach($new as $n)
                            <li value="-"><a href="{{url('a/'.$n->art_id)}}" title="{{$n->art_title}}" target="_blank">{{$n->art_title}}</a></li>
                        @endforeach
                    </ol>
                </div>
            </div>
            <div class="ui grid container" style="margin-top:50px;">
                <h3 class="ui header">点击排行</h3>
                <div class="ui container">
                    <ol class="ui list">
                        @foreach($hot as $h)
                            <li value="-"><a href="{{url('a/'.$h->art_id)}}" title="{{$h->art_title}}" target="_blank">{{$h->art_title}}</a></li>
                        @endforeach
                    </ol>
                </div>
            </div>
            <div class="ui grid container" style="margin-top:50px;">
                <h3 class="ui header">友情链接</h3>
                <div class="ui container">
                    <ol class="ui list">
                        @foreach($links as $l)
                            <li value="-"><a href="{{$l->link_url}}" target="_blank">{{$l->link_name}}</a></li>
                        @endforeach
                    </ol>
                </div>
            </div>
        </div>
        <div class="thirteen wide column" style="height:90%;background:#EAEAEA;padding:20px;overflow-x:hidden;overflow-y:scroll">
            @yield('content')
        </div>
</div>
<!--

-->
<!--
<footer>
    <p>{!! Config::get('web.copyright') !!} {!! Config::get('web.web_count') !!}</p>
</footer>
-->
</body>
</html>
