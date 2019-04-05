@extends('frontEnd.layouts.app')@section('content')    <div class="section">        <div class="container">            <div class="row">                @foreach($posts_new as $p)                    <div class="col-md-6">                        <div class="post post-thumb">                            <a class="post-img" href="https://colorlib.com/preview/theme/webmag/blog-post.html"><img src="{{$p->thumbnail}}" alt=""></a>                            <div class="post-body">                                <div class="post-meta">                                    <a class="post-category cat-2" href="https://colorlib.com/preview/theme/webmag/category.html">{{$p->category->name}}</a>                                    <span class="post-date">March 27, 2018</span>                                </div>                                <h3 class="post-title"><a href="https://colorlib.com/preview/theme/webmag/blog-post.html">{{$p->title}}</a></h3>                            </div>                        </div>                    </div>                @endforeach            </div>            <div class="row">                <div class="col-md-12">                    <div class="section-title">                    </div>                </div>                @foreach($posts as $k => $post)                    <div class="col-md-4">                        <div class="post">                            <a class="post-img" href="{{route('front-end.post', ['id' => $post->id])}}"><img src="{{$post->thumbnail}}" alt=""></a>                            <div class="post-body">                                <div class="post-meta">                                    <a class="post-category cat-1" href="{{route('front-end.post', ['id' => $post->id])}}">{{$post->category->name}}</a>                                    <span class="post-date">March 27, 2018</span>                                </div>                                <h3 class="post-title"><a href="{{route('front-end.post', ['id' => $post->id])}}">{{$post->title}}</a></h3>                            </div>                        </div>                    </div>                    @if (($k+1) % 3 == 0)                        <div class="clearfix visible-md visible-lg"></div>                    @endif                @endforeach            </div>            {{--<div class="row">--}}                {{--<div class="col-md-8">--}}                    {{--<div class="row">--}}                        {{--<div class="col-md-12">--}}                            {{--<div class="post post-thumb">--}}                                {{--<a class="post-img" href="https://colorlib.com/preview/theme/webmag/blog-post.html"><img src="{{asset('frontEnd/img/post-2.jpg')}}" alt=""></a>--}}                                {{--<div class="post-body">--}}                                    {{--<div class="post-meta">--}}                                        {{--<a class="post-category cat-3" href="https://colorlib.com/preview/theme/webmag/category.html">Jquery</a>--}}                                        {{--<span class="post-date">March 27, 2018</span>--}}                                    {{--</div>--}}                                    {{--<h3 class="post-title"><a href="https://colorlib.com/preview/theme/webmag/blog-post.html">Ask HN: Does Anybody Still Use JQuery?</a></h3>--}}                                {{--</div>--}}                            {{--</div>--}}                        {{--</div>--}}                        {{--<div class="col-md-6">--}}                            {{--<div class="post">--}}                                {{--<a class="post-img" href="https://colorlib.com/preview/theme/webmag/blog-post.html"><img src="{{asset('frontEnd/img/post-1.jpg')}}" alt=""></a>--}}                                {{--<div class="post-body">--}}                                    {{--<div class="post-meta">--}}                                        {{--<a class="post-category cat-4" href="https://colorlib.com/preview/theme/webmag/category.html">Css</a>--}}                                        {{--<span class="post-date">March 27, 2018</span>--}}                                    {{--</div>--}}                                    {{--<h3 class="post-title"><a href="https://colorlib.com/preview/theme/webmag/blog-post.html">CSS Float: A Tutorial</a></h3>--}}                                {{--</div>--}}                            {{--</div>--}}                        {{--</div>--}}                        {{--<div class="col-md-6">--}}                            {{--<div class="post">--}}                                {{--<a class="post-img" href="https://colorlib.com/preview/theme/webmag/blog-post.html"><img src="{{asset('frontEnd/img/post-2.jpg')}}" alt=""></a>--}}                                {{--<div class="post-body">--}}                                    {{--<div class="post-meta">--}}                                        {{--<a class="post-category cat-1" href="https://colorlib.com/preview/theme/webmag/category.html">Web Design</a>--}}                                        {{--<span class="post-date">March 27, 2018</span>--}}                                    {{--</div>--}}                                    {{--<h3 class="post-title"><a href="https://colorlib.com/preview/theme/webmag/blog-post.html">Tell-A-Tool: Guide To Web Design And Development Tools</a></h3>--}}                                {{--</div>--}}                            {{--</div>--}}                        {{--</div>--}}                        {{--<div class="clearfix visible-md visible-lg"></div>--}}                        {{--<div class="col-md-6">--}}                            {{--<div class="post">--}}                                {{--<a class="post-img" href="https://colorlib.com/preview/theme/webmag/blog-post.html"><img src="{{asset('frontEnd/img/post-4.jpg')}}" alt=""></a>--}}                                {{--<div class="post-body">--}}                                    {{--<div class="post-meta">--}}                                        {{--<a class="post-category cat-2" href="https://colorlib.com/preview/theme/webmag/category.html">JavaScript</a>--}}                                        {{--<span class="post-date">March 27, 2018</span>--}}                                    {{--</div>--}}                                    {{--<h3 class="post-title"><a href="https://colorlib.com/preview/theme/webmag/blog-post.html">Chrome Extension Protects Against JavaScript-Based CPU Side-Channel Attacks</a></h3>--}}                                {{--</div>--}}                            {{--</div>--}}                        {{--</div>--}}                        {{--<div class="col-md-6">--}}                            {{--<div class="post">--}}                                {{--<a class="post-img" href="https://colorlib.com/preview/theme/webmag/blog-post.html"><img src="{{asset('frontEnd/img/post-5.jpg')}}" alt=""></a>--}}                                {{--<div class="post-body">--}}                                    {{--<div class="post-meta">--}}                                        {{--<a class="post-category cat-3" href="https://colorlib.com/preview/theme/webmag/category.html">Jquery</a>--}}                                        {{--<span class="post-date">March 27, 2018</span>--}}                                    {{--</div>--}}                                    {{--<h3 class="post-title"><a href="https://colorlib.com/preview/theme/webmag/blog-post.html">Ask HN: Does Anybody Still Use JQuery?</a></h3>--}}                                {{--</div>--}}                            {{--</div>--}}                        {{--</div>--}}                        {{--<div class="clearfix visible-md visible-lg"></div>--}}                        {{--<div class="col-md-6">--}}                            {{--<div class="post">--}}                                {{--<a class="post-img" href="https://colorlib.com/preview/theme/webmag/blog-post.html"><img src="{{asset('frontEnd/img/post-3.jpg')}}" alt=""></a>--}}                                {{--<div class="post-body">--}}                                    {{--<div class="post-meta">--}}                                        {{--<a class="post-category cat-1" href="https://colorlib.com/preview/theme/webmag/category.html">Web Design</a>--}}                                        {{--<span class="post-date">March 27, 2018</span>--}}                                    {{--</div>--}}                                    {{--<h3 class="post-title"><a href="https://colorlib.com/preview/theme/webmag/blog-post.html">Pagedraw UI Builder Turns Your Website Design Mockup Into Code Automatically</a></h3>--}}                                {{--</div>--}}                            {{--</div>--}}                        {{--</div>--}}                        {{--<div class="col-md-6">--}}                            {{--<div class="post">--}}                                {{--<a class="post-img" href="https://colorlib.com/preview/theme/webmag/blog-post.html"><img src="{{asset('frontEnd/img/post-4.jpg')}}" alt=""></a>--}}                                {{--<div class="post-body">--}}                                    {{--<div class="post-meta">--}}                                        {{--<a class="post-category cat-2" href="https://colorlib.com/preview/theme/webmag/category.html">JavaScript</a>--}}                                        {{--<span class="post-date">March 27, 2018</span>--}}                                    {{--</div>--}}                                    {{--<h3 class="post-title"><a href="https://colorlib.com/preview/theme/webmag/blog-post.html">Chrome Extension Protects Against JavaScript-Based CPU Side-Channel Attacks</a></h3>--}}                                {{--</div>--}}                            {{--</div>--}}                        {{--</div>--}}                    {{--</div>--}}                {{--</div>--}}                {{--<div class="col-md-4">--}}                    {{--<div class="aside-widget">--}}                        {{--<div class="section-title">--}}                            {{--<h2>Đọc nhiều nhất</h2>--}}                        {{--</div>--}}                        {{--<div class="post post-widget">--}}                            {{--<a class="post-img" href="https://colorlib.com/preview/theme/webmag/blog-post.html"><img src="{{asset('frontEnd/img/post-2.jpg')}}" alt=""></a>--}}                            {{--<div class="post-body">--}}                                {{--<h3 class="post-title"><a href="https://colorlib.com/preview/theme/webmag/blog-post.html">Tell-A-Tool: Guide To Web Design And Development Tools</a></h3>--}}                            {{--</div>--}}                        {{--</div>--}}                        {{--<div class="post post-widget">--}}                            {{--<a class="post-img" href="https://colorlib.com/preview/theme/webmag/blog-post.html"><img src="{{asset('frontEnd/img/post-2.jpg')}}" alt=""></a>--}}                            {{--<div class="post-body">--}}                                {{--<h3 class="post-title"><a href="https://colorlib.com/preview/theme/webmag/blog-post.html">Pagedraw UI Builder Turns Your Website Design Mockup Into Code Automatically</a></h3>--}}                            {{--</div>--}}                        {{--</div>--}}                        {{--<div class="post post-widget">--}}                            {{--<a class="post-img" href="https://colorlib.com/preview/theme/webmag/blog-post.html"><img src="{{asset('frontEnd/img/post-2.jpg')}}" alt=""></a>--}}                            {{--<div class="post-body">--}}                                {{--<h3 class="post-title"><a href="https://colorlib.com/preview/theme/webmag/blog-post.html">Why Node.js Is The Coolest Kid On The Backend Development Block!</a></h3>--}}                            {{--</div>--}}                        {{--</div>--}}                    {{--</div>--}}                    {{--<div class="aside-widget">--}}                        {{--<div class="section-title">--}}                            {{--<h2>Featured Posts</h2>--}}                        {{--</div>--}}                        {{--<div class="post post-thumb">--}}                            {{--<a class="post-img" href="https://colorlib.com/preview/theme/webmag/blog-post.html"><img src="{{asset('frontEnd/img/post-2.jpg')}}" alt=""></a>--}}                            {{--<div class="post-body">--}}                                {{--<div class="post-meta">--}}                                    {{--<a class="post-category cat-3" href="https://colorlib.com/preview/theme/webmag/category.html">Jquery</a>--}}                                    {{--<span class="post-date">March 27, 2018</span>--}}                                {{--</div>--}}                                {{--<h3 class="post-title"><a href="https://colorlib.com/preview/theme/webmag/blog-post.html">Ask HN: Does Anybody Still Use JQuery?</a></h3>--}}                            {{--</div>--}}                        {{--</div>--}}                        {{--<div class="post post-thumb">--}}                            {{--<a class="post-img" href="https://colorlib.com/preview/theme/webmag/blog-post.html"><img src="{{asset('frontEnd/img/post-1.jpg')}}" alt=""></a>--}}                            {{--<div class="post-body">--}}                                {{--<div class="post-meta">--}}                                    {{--<a class="post-category cat-2" href="https://colorlib.com/preview/theme/webmag/category.html">JavaScript</a>--}}                                    {{--<span class="post-date">March 27, 2018</span>--}}                                {{--</div>--}}                                {{--<h3 class="post-title"><a href="https://colorlib.com/preview/theme/webmag/blog-post.html">Chrome Extension Protects Against JavaScript-Based CPU Side-Channel Attacks</a></h3>--}}                            {{--</div>--}}                        {{--</div>--}}                    {{--</div>--}}                    {{--<div class="aside-widget text-center">--}}                        {{--<a href="https://colorlib.com/preview/theme/webmag/index.html#" style="display: inline-block;margin: auto;">--}}                            {{--<img class="img-responsive" src="./ad-1.webp" alt="">--}}                        {{--</a>--}}                    {{--</div>--}}                {{--</div>--}}            {{--</div>--}}        </div>    </div>@endsection