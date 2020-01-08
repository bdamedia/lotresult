<!DOCTYPE html>
<html lang="vi">
<head>
    @php
        $reload = explode('/',request()->fullUrl());
     @endphp
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, maximum-scale=5.0, user-scalable=yes">
    <meta name="theme-color" content="#FFF"/>
    @php $mData = metaData(end($reload)); @endphp
    <title>{{ $mData['title'] }}</title>
    <meta name="description" content="{{ $mData['description'] }}"/>
    <meta name="keywords" content="{{ $mData['keywords'] }}"/>
    <link rel='canonical' href='{{ request()->fullUrl() }}'/>
    <link href="/favicon.ico" rel="shortcut icon" type="image/x-icon"/>
     <meta name="robots" content="index, follow"/>
    <meta property="og:site_name" content="Asoicau"/>
    <meta property="og:title" content="{{ $mData['title'] }}"/>
    <meta property="og:url" content="{{ request()->fullUrl() }}"/>
    <meta property="og:type" content="article"/>
    <meta property="og:locale" content="vi_VN"/>
    <meta property="og:description" content="{{ $mData['description'] }}"/>
    <link href="{{ URL::asset('css/HomeCombined.css') }}" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ URL::asset('css/steel.css') }}">
    <link href="{{ URL::asset('css/style.css') }}" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ URL::asset('css/jscal2.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/border-radius.css') }}">
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-M9Z4365');</script>
    <!-- End Google Tag Manager -->
    <!-- Google Ads Manager -->
    <script async src="https://securepubads.g.doubleclick.net/tag/js/gpt.js"></script>;
    <script>
        window.googletag = window.googletag || {cmd: []};
        googletag.cmd.push(function() {
            googletag.defineSlot('/21689237362/xoso-homepage-header', [728, 90], 'div-gpt-ad-1578217748213-0').addService(googletag.pubads());
            googletag.defineSlot('/21689237362/xoso-sidebar01', [300, 600], 'div-gpt-ad-1578217830804-0').addService(googletag.pubads());
            googletag.defineSlot('/21689237362/xoso-sidebar02', [300, 600], 'div-gpt-ad-1578217870888-0').addService(googletag.pubads());
            googletag.defineSlot('/21689237362/xoso-content-ads', [336, 280], 'div-gpt-ad-1578217977238-0').addService(googletag.pubads());
            googletag.pubads().enableSingleRequest();
            googletag.enableServices();
        });
    </script>
    <!-- End Google Ads Manager -->


</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-M9Z4365";
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div id="top"></div>
<div class="body-wrapper">
    <header>
        <div class="container">
            <div class="row">
                <div class="hidden-xs hidden-sm col-md-2">
                    <div class="logo">
                        <h4 class="hide">Asoicau</h4>
                        <a href="/"><img src="{{ URL::asset('images/logos/logo.png') }}" alt="logo" title="logo"
                                         class="img-responsive"></a>
                    </div>
                </div>

            </div>
        </div>
    </header>

    <div class="clearfix"></div>
    <div class="container">
        <nav class="hidden-xs hidden-sm navbar navbar-default">
            <h2 class="hide">Menu</h2>
            <div class="collapse navbar-collapse">

                <ul class="main-menu">

                   {{-- <li class=""><a href="/" title="Trang chủ"><i class="fa fa-home" aria-hidden="true"></i></a></li>--}}
                    <li class="list_border @php if(in_array('ket-qua-xo-so-mien-bac',$reload)){ echo "active"; } @endphp "><a href="/ket-qua-xo-so-mien-bac" title="XSMB">XSMB</a>
                        <div class="menu-lv2-down">
                            <ul>
                                <li><a href="/ket-qua-xo-so-mien-bac/kqxsmb-thu-hai" title="XSMB Thứ 2">Thứ hai</a></li>
                                <li><a href="/ket-qua-xo-so-mien-bac/kqxsmb-thu-ba" title="XSMB Thứ 3">Thứ ba</a></li>
                                <li><a href="/ket-qua-xo-so-mien-bac/kqxsmb-thu-tu" title="XSMB Thứ 4">Thứ tư</a></li>
                                <li><a href="/ket-qua-xo-so-mien-bac/kqxsmb-thu-nam" title="XSMB Thứ 5">Thứ năm</a></li>
                                <li><a href="/ket-qua-xo-so-mien-bac/kqxsmb-thu-sau" title="XSMB Thứ 6">Thứ sáu</a></li>
                                <li><a href="/ket-qua-xo-so-mien-bac/kqxsmb-thu-bay" title="XSMB Thứ 7">Thứ bảy</a></li>
                                <li><a href="/ket-qua-xo-so-mien-bac/kqxsmb-chu-nhat" title="XSMB Chủ Nhật">Chủ Nhật</a></li>
                                <li><a href="/ket-qua-xo-so-mien-bac/kqxsmb-truc-tiep" title="Trực tiếp XSMB">Trực tiếp</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="list_border  @php if(in_array('ket-qua-xo-so-mien-nam',$reload)){ echo "active"; } @endphp"><a href="/ket-qua-xo-so-mien-nam" title="XSMN">XSMN</a>
                        <div class="menu-lv2-down">
                            <ul>
                                <li><a href="/ket-qua-xo-so-mien-nam/kqxsmn-thu-hai" title="XSMB Thứ 2">Thứ hai</a></li>
                                <li><a href="/ket-qua-xo-so-mien-nam/kqxsmn-thu-ba" title="XSMB Thứ 3">Thứ ba</a></li>
                                <li><a href="/ket-qua-xo-so-mien-nam/kqxsmn-thu-tu" title="XSMB Thứ 4">Thứ tư</a></li>
                                <li><a href="/ket-qua-xo-so-mien-nam/kqxsmn-thu-nam" title="XSMB Thứ 5">Thứ năm</a></li>
                                <li><a href="/ket-qua-xo-so-mien-nam/kqxsmn-thu-sau" title="XSMB Thứ 6">Thứ sáu</a></li>
                                <li><a href="/ket-qua-xo-so-mien-nam/kqxsmn-thu-bay" title="XSMB Thứ 7">Thứ bảy</a></li>
                                <li><a href="/ket-qua-xo-so-mien-nam/kqxsmn-chu-nhat" title="XSMB Chủ Nhật">Chủ Nhật</a></li>
                                <li><a href="/ket-qua-xo-so-mien-nam/kqxsmn-truc-tiep" title="Trực tiếp XSMN">Trực tiếp</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="list_border last-ul-value  @php if(in_array('ket-qua-xo-so-mien-trung',$reload)){ echo "active"; } @endphp"><a href="/ket-qua-xo-so-mien-trung" title="XSMT">XSMT</a>
                        <div class="menu-lv2-down">
                            <ul>
                                <li><a href="/ket-qua-xo-so-mien-trung/kqxsmt-thu-hai" title="XSMB Thứ 2">Thứ hai</a></li>
                                <li><a href="/ket-qua-xo-so-mien-trung/kqxsmt-thu-ba" title="XSMB Thứ 3">Thứ ba</a></li>
                                <li><a href="/ket-qua-xo-so-mien-trung/kqxsmt-thu-tu" title="XSMB Thứ 4">Thứ tư</a></li>
                                <li><a href="/ket-qua-xo-so-mien-trung/kqxsmt-thu-nam" title="XSMB Thứ 5">Thứ năm</a></li>
                                <li><a href="/ket-qua-xo-so-mien-trung/kqxsmt-thu-sau" title="XSMB Thứ 6">Thứ sáu</a></li>
                                <li><a href="/ket-qua-xo-so-mien-trung/kqxsmt-thu-bay" title="XSMB Thứ 7">Thứ bảy</a></li>
                                <li><a href="/ket-qua-xo-so-mien-trung/kqxsmt-chu-nhat" title="XSMB Chủ Nhật">Chủ Nhật</a></li>
                                <li><a href="/ket-qua-xo-so-mien-trung/kqxsmt-truc-tiep" title="Trực tiếp XSMT">Trực tiếp</a></li>
                            </ul>
                        </div>
                    </li>


                </ul>
            </div>
        </nav>

        <div class="col-xs-12 hidden-xs hidden-sm menu-lv2" >
            <ul class="nav navbar-nav">

               {{-- @foreach($comp as $k=>$compn)
                    @php  $end = strlen($compn)-4; if($companyName == substr($compn,2,$end)){ $active="active"; }else{ $active=""; } @endphp
                    <li class="{{ $active }}"><a href="/{{ $region }}/{{ substr($compn,2,$end) }}"
                                                 title="{{ substr($compn,2,$end) }}">{{ substr($compn,2,$end) }}</a>
                    </li>
                @endforeach--}}
            </ul>
        </div>

        <div class="visible-xs visible-sm menu-mobile">
            <div class="col-xs-12">
                <ul class="col-xs-12">
                    <li class="col-xs-3 showmenu"><a href="#" title="Menu">
                            <i class="fa fa-bars" aria-hidden="true"></i></a>
                    </li>
                    <li class="col-xs-6">
                        <a href="/"><img src="{{ URL::asset('images/logos/logo.png') }}" alt="logo"
                                         title="logo"
                                         class="logo-mb img-responsive"></a>
                    </li>
                   {{-- <li class="col-xs-3">
                        <a href="https://play.google.com/store/apps/details?id=com.icsoft.xosodaiphat" target="_blank"
                           rel="nofollow,noopener" title="Tải ứng dụng trên Android" id="btntaiapp"><img
                                src="/assets/images/app.png" style="height:35px;padding-right: 5px; float:right"
                                alt="Tải ứng dụng"/></a></li>--}}
                </ul>

               {{-- <ul class="col-xs-12 ul-lv2">
                    <li><a href="/crawler/xsmb-xo-so-mien-bac" title="XSMB">XSMB</a></li>
                    <li><a href="/crawler/xsmb-truc-tiep" title="XSMB Trực tiếp">Trực tiếp</a></li>
                    <li><a href="/crawler/thong-ke-xsmb-c2579-article" title="Thống kê XSMB">Thống kê XSMB</a></li>
                </ul>
                <ul class="col-xs-12 ul-xsmb-thu">
                    <li><a href="/crawler/xsmb-thu-2" title="XSMB Thứ 2">T2</a></li>
                    <li><a href="/crawler/xsmb-thu-3" title="XSMB Thứ 3">T3</a></li>
                    <li><a href="/crawler/xsmb-thu-4" title="XSMB Thứ 4">T4</a></li>
                    <li><a href="/crawler/xsmb-thu-5" title="XSMB Thứ 5">T5</a></li>
                    <li class=active><a href="/xsmb-thu-6" title="XSMB Thứ 6">T6</a></li>
                    <li><a href="/crawler/xsmb-thu-7" title="XSMB Thứ 7">T7</a></li>
                    <li><a href="/crawler/xsmb-chu-nhat-cn" title="XSMB Chủ nhật">CN</a></li>
                </ul>--}}
            </div>
        </div>
        <div class="category-mobile hide">
            <ul class="menu">
                <li class=" @php if(in_array('ket-qua-xo-so-mien-bac',$reload)){ echo "active"; } @endphp "><a href="/ket-qua-xo-so-mien-bac" title="XSMB">XSMB</a>

                </li>
                <li><a href="/ket-qua-xo-so-mien-bac/kqxsmb-truc-tiep" title="Trực tiếp XSMB">- Trực tiếp XSMB</a></li>
                <li class="@php if(in_array('ket-qua-xo-so-mien-nam',$reload)){ echo "active"; } @endphp"><a href="/ket-qua-xo-so-mien-nam" title="XSMN">XSMN</a>

                </li>
                <li><a href="/ket-qua-xo-so-mien-nam/kqxsmn-truc-tiep" title="Trực tiếp XSMN">- Trực tiếp XSMN</a></li>
                <li class="@php if(in_array('ket-qua-xo-so-mien-trung',$reload)){ echo "active"; } @endphp"><a href="/ket-qua-xo-so-mien-trung" title="XSMT">XSMT</a>

                </li>
                <li><a href="/ket-qua-xo-so-mien-trung/kqxsmt-truc-tiep" title="Trực tiếp XSMT">- Trực tiếp XSMT</a></li>
               {{-- <li class=""><a href="/xo-so-vietlott" title="Vietlott">Vietlott</a>
                    <div class="menu-lv2-down">
                        <ul>
                            <li><a href="/xo-so-dien-toan-tu-chon-mega-645.html" title="XS Mega 6/45">XS Mega
                                    6/45</a></li>
                            <li><a href="/xo-so-max4d.html" title="XS Max 4D">XS Max 4D</a></li>
                            <li><a href="/xs-power-xo-so-power-655.html" title="Power 6/55">Power 6/55</a></li>
                            <li><a href="/xo-so-max3d.html" title="XS Max 3D">XS Max 3D</a></li>
                        </ul>
                    </div>
                </li>
                <li class=""><a href="/cau-xo-so-cac-tinh.html" title="Thống kê cầu">TK Cầu</a>
                    <div class="menu-lv2-down">
                        <ul>
                            <li><a href="/cau-mien-bac/cau-bach-thu.html" title="Cầu Bạch thủ">Bạch thủ (MB)</a>
                            </li>
                            <li><a href="/cau-mien-bac/cau-lat-lien-tuc.html" title="Cầu Lật liên tục">Lật liên tục
                                    (MB)</a></li>
                            <li><a href="/cau-mien-bac/cau-ve-ca-cap.html" title="Cầu Về cả cặp">Về cả cặp (MB)</a>
                            </li>
                            <li><a href="/cau-mien-bac/cau-ve-nhieu-nhay.html" title="Cầu Về nhiều nháy">Về nhiều
                                    nháy (MB)</a></li>
                            <li><a href="/cau-mien-nam.html" title="Cầu miền Nam">Cầu miền Nam</a></li>
                            <li><a href="/cau-mien-trung.html" title="Cầu miền Trung">Cầu miền Trung</a></li>
                        </ul>
                    </div>
                </li>
                <li class=""><a href="/thong-ke-lo-gan.html" title="Thống kê lô">TK Lô</a>
                    <div class="menu-lv2-down">
                        <ul>
                            <li><a href="/thong-ke-gan-cuc-dai.html" title="Lô gan">Lô gan</a></li>
                            <li><a href="/thong-ke-lo-xien.html" title="Lô xiên">Lô xiên</a></li>
                            <li><a href="/thong-ke-lo-kep.html" title="Lô kép">Lô kép</a></li>
                            <li><a href="/thong-ke-dau.html" title="TK đầu">TK đầu</a></li>
                            <li><a href="/thong-ke-duoi.html" title="TK đuôi">TK đuôi</a></li>
                            <li><a href="/thong-ke-giai-dac-biet.html" title="TK giải đặc biệt">TK giải đặc biệt</a>
                            </li>
                            <li><a href="/thong-ke-tan-suat.html" title="TK lần xuất hiện">TK lần xuất hiện</a></li>
                            <li><a href="/thong-ke-00-99.html" title="TK 00-99">TK 00-99</a></li>
                            <li><a href="/thong-ke-theo-chu-ky-5-1-0.html" title="TK chu kỳ">TK chu kỳ</a></li>
                        </ul>
                    </div>
                </li>
                <li class=""><a href="/lo-to-mien-bac/ket-qua-lo-to-mien-bac.html" title="Lô Tô">Lô Tô</a>
                    <div class="menu-lv2-down">
                        <ul>
                            <li><a href="/lo-to-mien-bac/ket-qua-lo-to-mien-bac.html" title="Lô tô miền Bắc">Lô tô
                                    miền Bắc</a></li>
                            <li><a href="/lo-to-mien-nam/ket-qua-lo-to-mien-nam.html" title="Lô tô miền Nam">Lô tô
                                    miền Nam</a></li>
                            <li><a href="/lo-to-mien-trung/ket-qua-lo-to-mien-trung.html" title="Lô tô miền Trung">Lô
                                    tô miền Trung</a></li>
                        </ul>
                    </div>
                </li>

                <li class=""><a href="/quay-thu-xo-so.html" title="Quay thử">Quay thử</a>
                    <div class="menu-lv2-down">
                        <ul>
                            <li><a href="/quay-thu-xo-so-mien-bac.html" title="Quay thử miền Bắc">Quay thử XSMB</a>
                            </li>
                            <li><a href="/quay-thu-xo-so-mien-trung.html" title="Quay thử miền Trung">Quay thử
                                    XSMT</a></li>
                            <li><a href="/quay-thu-xo-so-mien-nam.html" title="Quay thử miền Nam">Quay thử XSMN</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class=""><a href="/thong-ke-xo-so.html" title="Thống Kê Xổ Số">Thống Kê Xổ Số</a>
                    <div class="menu-lv2-down">
                        <ul>
                            <li><a href="/thong-ke-xsmb-c2579-article.html" title="Thống kê XSMB">Thống kê XSMB</a>
                            </li>
                            <li><a href="/thong-ke-xsmn-c2581-article.html" title="Thống kê XSMN">Thống kê XSMN</a>
                            </li>
                            <li><a href="/thong-ke-xsmt-c2582-article.html" title="Thống kê XSMT">Thống kê XSMT</a>
                            </li>
                            <li><a href="/tin-tuc/tin-tuc-c2583-article.html" title="Tin xổ số">Tin xổ số</a></li>
                        </ul>
                    </div>
                </li>--}}
                <li class="btn-close"><i class="fa fa-times" aria-hidden="true"></i> Đóng danh mục</li>
            </ul>
        </div>
        {{--<div class="col-xs-12 col-sm-12 col-md-10">
            <div>
                <a href="/reload{{ getCompanyUrlHead(end($reload)) }}"
                   style="float: right;padding: 10px;background: red;color: white;font-weight: bold;">Reload</a>
            </div>
        </div>--}}
    </div>
