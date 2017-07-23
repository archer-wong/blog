@extends('layouts.home')
@section('info')
    <title>{{Config::get('web.web_title')}} - {{Config::get('web.seo_title')}}</title>
    <meta name="keywords" content="{{Config::get('web.keywords')}}" />
    <meta name="description" content="{{Config::get('web.description')}}" />
@endsection
@section('content')
<!--
    <div class="template">
        <div class="box">
            <h3>
                <p><span>站长</span>推荐 Recommend</p>
            </h3>
            <ul>
                @foreach($pics as $p)
                    <li><a href="{{url('a/'.$p->art_id)}}"  target="_blank"><img src="{{url($p->art_thumb)}}"></a><span>{{$p->art_title}}</span></li>
                @endforeach
            </ul>
        </div>
    </div>
-->
    <div class="ui fluid container" style="background:white">
        @foreach($data as $d)
            <div class="ui segment">
                <div style="float:right"><span>{{date('Y-m-d',$d->art_time)}}</span><span>作者：{{$d->art_editor}}</span></div>
                <div sytle="float:left"><h3 class="ui header">{{$d->art_title}}</h3></div>
                <div sytle="float:clear"></div>
                <p style="margin-top:15px;">{{$d->art_description}}</p>
                <div sytle="float:left"><a title="{{$d->art_title}}" href="{{url('a/'.$d->art_id)}}" target="_blank">阅读全文>></a></div>
            </div>
        @endforeach
        <div class="page">
            {{$data->links()}}
        </div>
    </div>
@endsection
