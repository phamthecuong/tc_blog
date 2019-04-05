@extends('frontEnd.layouts.app')@section('content')<div class="section">    <div class="container">        <div class="row">            <div class="col-md-8">                <div class="row">                    <div class="col-md-12">                        <div class="post post-thumb">                            <a class="post-img" href="https://colorlib.com/preview/theme/webmag/blog-post.html"><img src="{{asset('frontEnd/img/post-1.jpg')}}" alt=""></a>                            <div class="post-body">                                <div class="post-meta">                                    <a class="post-category cat-2" href="https://colorlib.com/preview/theme/webmag/category.html#">JavaScript</a>                                    <span class="post-date">March 27, 2018</span>                                </div>                                <h3 class="post-title"><a href="https://colorlib.com/preview/theme/webmag/blog-post.html">Javascript : Prototype vs Class</a></h3>                            </div>                        </div>                    </div>                    <div class="clearfix visible-md visible-lg"></div>                    @foreach($posts as $post)                        <div class="col-md-12">                            <div class="post post-row">                                <a class="post-img" href="https://colorlib.com/preview/theme/webmag/blog-post.html"><img src="{{$post->thumbnail}}" alt=""></a>                                <div class="post-body">                                    <div class="post-meta">                                        <a class="post-category cat-2" href="https://colorlib.com/preview/theme/webmag/category.html#">{{$post->category->name}}</a>                                        <span class="post-date">March 27, 2018</span>                                    </div>                                    <h3 class="post-title"><a href="https://colorlib.com/preview/theme/webmag/blog-post.html">{{$post->title}}</a></h3>                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...</p>                                </div>                            </div>                        </div>                    @endforeach                    <div class="pagination">{{$posts->links}}</div>                    <div class="col-md-12">                        <div class="section-row">                            <button class="primary-button center-block">Load More</button>                        </div>                    </div>                </div>            </div>            <div class="col-md-4">                <div class="aside-widget">                    <div class="section-title">                        <h2>Đọc nhiều nhất</h2>                    </div>                    <div class="post post-widget">                        <a class="post-img" href="https://colorlib.com/preview/theme/webmag/blog-post.html"><img src="{{asset('frontEnd/img/widget-1.jpg')}}" alt=""></a>                        <div class="post-body">                            <h3 class="post-title"><a href="https://colorlib.com/preview/theme/webmag/blog-post.html">Tell-A-Tool: Guide To Web Design And Development Tools</a></h3>                        </div>                    </div>                    <div class="post post-widget">                        <a class="post-img" href="https://colorlib.com/preview/theme/webmag/blog-post.html"><img src="{{asset('frontEnd/img/widget-2.jpg')}}" alt=""></a>                        <div class="post-body">                            <h3 class="post-title"><a href="https://colorlib.com/preview/theme/webmag/blog-post.html">Pagedraw UI Builder Turns Your Website Design Mockup Into Code Automatically</a></h3>                        </div>                    </div>                    <div class="post post-widget">                        <a class="post-img" href="https://colorlib.com/preview/theme/webmag/blog-post.html"><img src="{{asset('frontEnd/img/widget-3.jpg')}}" alt=""></a>                        <div class="post-body">                            <h3 class="post-title"><a href="https://colorlib.com/preview/theme/webmag/blog-post.html">Why Node.js Is The Coolest Kid On The Backend Development Block!</a></h3>                        </div>                    </div>                    <div class="post post-widget">                        <a class="post-img" href="https://colorlib.com/preview/theme/webmag/blog-post.html"><img src="{{asset('frontEnd/img/widget-4.jpg')}}" alt=""></a>                        <div class="post-body">                            <h3 class="post-title"><a href="https://colorlib.com/preview/theme/webmag/blog-post.html">Tell-A-Tool: Guide To Web Design And Development Tools</a></h3>                        </div>                    </div>                </div>                <div class="aside-widget">                    <div class="section-title">                        <h2>Danh mục</h2>                    </div>                    <div class="category-widget">                        <ul>                            <li><a href="https://colorlib.com/preview/theme/webmag/category.html#" class="cat-1">Web Design<span>340</span></a></li>                            <li><a href="https://colorlib.com/preview/theme/webmag/category.html#" class="cat-2">JavaScript<span>74</span></a></li>                            <li><a href="https://colorlib.com/preview/theme/webmag/category.html#" class="cat-4">JQuery<span>41</span></a></li>                            <li><a href="https://colorlib.com/preview/theme/webmag/category.html#" class="cat-3">CSS<span>35</span></a></li>                        </ul>                    </div>                </div>                <div class="aside-widget">                    <div class="tags-widget">                        <ul>                            <li><a href="https://colorlib.com/preview/theme/webmag/category.html#">CSS</a></li>                            <li><a href="https://colorlib.com/preview/theme/webmag/category.html#">Backend</a></li>                            <li><a href="https://colorlib.com/preview/theme/webmag/category.html#">JQuery</a></li>                            <li><a href="https://colorlib.com/preview/theme/webmag/category.html#">Design</a></li>                            <li><a href="https://colorlib.com/preview/theme/webmag/category.html#">JavaScript</a></li>                            <li><a href="https://colorlib.com/preview/theme/webmag/category.html#">Website</a></li>                        </ul>                    </div>                </div>            </div>        </div>    </div></div>@endsection