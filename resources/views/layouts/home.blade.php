<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    @yield('info')
    <link href="{{asset('public/semantic/dist/semantic.min.css')}}" rel="stylesheet">
    <script src="{{asset('public/semantic/dist/jquery-3.1.1.min.js')}}"></script>
    <script src="{{asset('public/semantic/dist/semantic.js')}}"></script>
    <!--[if lt IE 9]>
    <script src="{{asset('resources/views/home/js/modernizr.js')}}"></script>
    <![endif]-->
<style>
    body{
        overflow:hidden;
    }
    .main-container{
        height:100%;
    }
    .left-content{
        height:100%;
        background:white;
    }
    .right-content{
        height:100%;
        background:#EAEAEA;
        padding:20px;
        overflow-x:hidden;
        overflow-y:scroll;
    }
    .profile{
        margin:0 auto;
    }
    .profile-text{
        text-align:center;
    }
    .footer{
        background: grey;
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        font-size: 16px;
        text-align:center;
        height: 35px;
        line-height: 35px;
    }
</style>
</head>
<body>
    <div class="ui inverted menu" style="margin-top:0px;">
        @foreach($navs as $k=>$v)
            <a class="item ui animated fade button" tabindex="0" href="{{$v->nav_url}}">
                <div class="visible content">{{$v->nav_name}}</div>
                <div class="hidden content">{{$v->nav_alias}}</div>
            </a>
        @endforeach
    </div>
        <div class="ui grid main-container" >
            <div class="three wide column left-content" >
                <div class="ui grid container" style="margin-top:50px;">
                    <div class="profile">
                        <img class="ui small circular image" src="{{asset('public/style/home/images/profile.jpg')}}">
                        <h3 class="ui header profile-text">
                            风清扬
                        </h3>
                    </div>
                </div>
                <div class="ui grid container" style="margin-top:150px;">
                    <h4 class="ui horizontal divider header">
                      <i class="leaf icon"></i>
                      最新文章
                    </h4>
                    <div class="ui container">
                        <ol class="ui list">
                            @foreach($new as $n)
                                <li value="-"><a href="{{url('a/'.$n->art_id)}}" title="{{$n->art_title}}" target="_blank">{{$n->art_title}}</a></li>
                            @endforeach
                        </ol>
                    </div>
                    <h4 class="ui horizontal divider header">
                      <i class="leaf icon"></i>
                      点击排行
                    </h4>
                    <div class="ui container">
                        <ol class="ui list">
                            @foreach($hot as $h)
                                <li value="-"><a href="{{url('a/'.$h->art_id)}}" title="{{$h->art_title}}" target="_blank">{{$h->art_title}}</a></li>
                            @endforeach
                        </ol>
                    </div>
                    <h4 class="ui horizontal divider header">
                      <i class="leaf icon"></i>
                        友情链接
                    </h4>
                    <div class="ui container">
                        <ol class="ui list">
                            @foreach($links as $l)
                                <li value="-"><a href="{{$l->link_url}}" target="_blank">{{$l->link_name}}</a></li>
                            @endforeach
                        </ol>
                    </div>
                </div>
            </div>
            <div class="thirteen wide column right-content" >
                @yield('content')
            </div>
        </div>
<div class="footer">
    <p>{!! Config::get('web.copyright') !!} {!! Config::get('web.web_count') !!}</p>
</div>
</body>
</html>
