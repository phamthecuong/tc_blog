<div class="container">

    <div class="row">
        <div class="col-md-5">
            <div class="footer-widget">
                <div class="footer-logo">
                    <a href="https://colorlib.com/preview/theme/webmag/index.html" class="logo"><img
                                src="{{asset('frontEnd/img/logo.webp')}}" alt=""></a>
                </div>

                <div class="footer-copyright">
<span>© 
Copyright 2019 by thecuong52
</span>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-6">
                    <div class="footer-widget">
                        <h3 class="footer-title">Theo dõi</h3>
                        <ul class="footer-links">
                            <li><a href="https://colorlib.com/preview/theme/webmag/about.html">Giới thiệu</a></li>
                            <li><a href="https://colorlib.com/preview/theme/webmag/index.html#">Tham gia</a></li>
                            <li><a href="https://colorlib.com/preview/theme/webmag/contact.html">Liên lạc</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="footer-widget">
                        <h3 class="footer-title">Danh mục</h3>
                        <ul class="footer-links">
                            @foreach($category as $c)
                                <li><a href="https://colorlib.com/preview/theme/webmag/category.html">{{$c->name}}</a></li>
                                {{--<li><a href="https://colorlib.com/preview/theme/webmag/category.html">JavaScript</a></li>--}}
                                {{--<li><a href="https://colorlib.com/preview/theme/webmag/category.html">Css</a></li>--}}
                                {{--<li><a href="https://colorlib.com/preview/theme/webmag/category.html">Jquery</a></li>--}}
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="footer-widget">
                <h3 class="footer-title">Nhận thông báo</h3>
                <div class="footer-newsletter">
                    <form>
                        <input class="input" type="email" name="newsletter" placeholder="Nhập email">
                        <button class="newsletter-btn"><i class="fa fa-paper-plane"></i></button>
                    </form>
                </div>
                <ul class="footer-social">
                    <li><a href="https://colorlib.com/preview/theme/webmag/index.html#"><i
                                    class="fa fa-facebook"></i></a></li>
                    <li><a href="https://colorlib.com/preview/theme/webmag/index.html#"><i
                                    class="fa fa-twitter"></i></a></li>
                    <li><a href="https://colorlib.com/preview/theme/webmag/index.html#"><i
                                    class="fa fa-google-plus"></i></a></li>
                    <li><a href="https://colorlib.com/preview/theme/webmag/index.html#"><i class="fa fa-pinterest"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

</div>