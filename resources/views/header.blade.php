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
    <meta name="csrf-token" content="{{ csrf_token() }}" />
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
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-M9Z4365');</script>
    <script async src="https://securepubads.g.doubleclick.net/tag/js/gpt.js"></script>
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
</head>
<body>
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-M9Z4365" height="0" width="0" style="display:none;visibility:hidden;" ></iframe>
</noscript>
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
                <div class="hidden-xs hidden-sm col-md-8" id='div-gpt-ad-1578217748213-0' style='float:right;    margin-right: 32px;width: 728px; height: 90px;'>
                    <script>
                        googletag.cmd.push(function() { googletag.display('div-gpt-ad-1578217748213-0'); });
                    </script>
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
                    <li class="list_border @php if(in_array('ket-qua-xsmb',$reload)){ echo "active"; } @endphp "><a href="/ket-qua-xsmb" title="XSMB">XSMB</a>
                        <div class="menu-lv2-down">
                            <ul>
                                <li><a href="/ket-qua-xsmb/kqxsmb-thu-hai" title="XSMB Thứ 2">Thứ hai</a></li>
                                <li><a href="/ket-qua-xsmb/kqxsmb-thu-ba" title="XSMB Thứ 3">Thứ ba</a></li>
                                <li><a href="/ket-qua-xsmb/kqxsmb-thu-tu" title="XSMB Thứ 4">Thứ tư</a></li>
                                <li><a href="/ket-qua-xsmb/kqxsmb-thu-nam" title="XSMB Thứ 5">Thứ năm</a></li>
                                <li><a href="/ket-qua-xsmb/kqxsmb-thu-sau" title="XSMB Thứ 6">Thứ sáu</a></li>
                                <li><a href="/ket-qua-xsmb/kqxsmb-thu-bay" title="XSMB Thứ 7">Thứ bảy</a></li>
                                <li><a href="/ket-qua-xsmb/kqxsmb-chu-nhat" title="XSMB Chủ Nhật">Chủ Nhật</a></li>
                                <li><a href="/ket-qua-xsmb/kqxsmb-truc-tiep" title="Trực tiếp XSMB">Trực tiếp</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="list_border  @php if(in_array('ket-qua-xsmn',$reload)){ echo "active"; } @endphp"><a href="/ket-qua-xsmn" title="XSMN">XSMN</a>
                        <div class="menu-lv2-down">
                            <ul>
                                <li><a href="/ket-qua-xsmn/kqxsmn-thu-hai" title="XSMB Thứ 2">Thứ hai</a></li>
                                <li><a href="/ket-qua-xsmn/kqxsmn-thu-ba" title="XSMB Thứ 3">Thứ ba</a></li>
                                <li><a href="/ket-qua-xsmn/kqxsmn-thu-tu" title="XSMB Thứ 4">Thứ tư</a></li>
                                <li><a href="/ket-qua-xsmn/kqxsmn-thu-nam" title="XSMB Thứ 5">Thứ năm</a></li>
                                <li><a href="/ket-qua-xsmn/kqxsmn-thu-sau" title="XSMB Thứ 6">Thứ sáu</a></li>
                                <li><a href="/ket-qua-xsmn/kqxsmn-thu-bay" title="XSMB Thứ 7">Thứ bảy</a></li>
                                <li><a href="/ket-qua-xsmn/kqxsmn-chu-nhat" title="XSMB Chủ Nhật">Chủ Nhật</a></li>
                                <li><a href="/ket-qua-xsmn/kqxsmn-truc-tiep" title="Trực tiếp XSMN">Trực tiếp</a></li>
                            </ul>
                        </div>
                    </li>

                    <li class="list_border last-ul-value-second  @php if(in_array('ket-qua-xsmt',$reload)){ echo "active"; } @endphp"><a href="/ket-qua-xsmt" title="XSMT">XSMT</a>

                        <div class="menu-lv2-down">
                            <ul>
                                <li><a href="/ket-qua-xsmt/kqxsmt-thu-hai" title="XSMB Thứ 2">Thứ hai</a></li>
                                <li><a href="/ket-qua-xsmt/kqxsmt-thu-ba" title="XSMB Thứ 3">Thứ ba</a></li>
                                <li><a href="/ket-qua-xsmt/kqxsmt-thu-tu" title="XSMB Thứ 4">Thứ tư</a></li>
                                <li><a href="/ket-qua-xsmt/kqxsmt-thu-nam" title="XSMB Thứ 5">Thứ năm</a></li>
                                <li><a href="/ket-qua-xsmt/kqxsmt-thu-sau" title="XSMB Thứ 6">Thứ sáu</a></li>
                                <li><a href="/ket-qua-xsmt/kqxsmt-thu-bay" title="XSMB Thứ 7">Thứ bảy</a></li>
                                <li><a href="/ket-qua-xsmt/kqxsmt-chu-nhat" title="XSMB Chủ Nhật">Chủ Nhật</a></li>
                                <li><a href="/ket-qua-xsmt/kqxsmt-truc-tiep" title="Trực tiếp XSMT">Trực tiếp</a></li>
                            </ul>
                        </div>
                    </li>

                    <li class="list_border last-ul-value  @php if(in_array('ket-qua-vietlott',$reload)){ echo "active"; } @endphp">
                        <a href="/ket-qua-vietlott" title="Vietlott">Vietlott</a>
                        <div class="menu-lv2-down">
                            <ul>
                                <li><a href="/ket-qua-vietlott/kqvietlott-mega-645" title="Thống kê lô">Mega 6/45</a></li>
                                <li><a href="/ket-qua-vietlott/kqvietlott-max-4d" title="Thống kê 3 càng">Max 4D</a></li>
                                <li><a href="/ket-qua-vietlott/kqvietlott-power-655" title="Thống kê lô gan">Power 6/55</a></li>
                                <li><a href="/ket-qua-vietlott/kqvietlott-xo-so-max-3d" title="Thống kê 3 càng">Max 3D</a></li>
                            </ul>
                        </div>
                    </li>

                    <li class="list_border last-ul-value  @php if(in_array('ket-qua-vietlott',$reload)){ echo "active"; } @endphp">
                        <a href="/ket-qua-dien-toan/" title="Vietlott">XS Điện toán</a>
                        <div class="menu-lv2-down">
                            <ul>
                                <li><a href="/ket-qua-dien-toan/kqxs-dien-toan-6-36/" title="XS Điện toán 6/36">XS Điện toán 6/36</a></li>
                                <li><a href="/ket-qua-dien-toan/kqxs-dien-toan-123/" title="XS Điện toán 123">XS Điện toán 123</a></li>
                                <li><a href="/ket-qua-dien-toan/kqxs-dien-toan-than-tai-4/" title="XS Thần tài 4">XS Thần tài 4</a></li>
                            </ul>
                        </div>
                    </li>

                    <li class="list_border last-ul-value  @php if(in_array('thong-ke-lo',$reload)){ echo "active"; } @endphp"><a href="/thong-ke-kqxs/thong-ke-lo" title="Thống kê">Thống kê</a>
                        <div class="menu-lv2-down">
                            <ul>
                                <li><a href="/thong-ke-kqxs/thong-ke-lo" title="Thống kê lô">Thống kê lô</a></li>
                                <li><a href="/thong-ke-kqxs/thong-ke-lo-gan" title="Thống kê lô gan">Thống kê lô gan</a></li>
                                <li><a href="/thong-ke-kqxs/3-cang" title="Thống kê 3 càng">Thống kê 3 càng</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="list_border last-ul-value  @php if(in_array('tin-xo-so',$reload)){ echo "active"; } @endphp"><a href="/tin-xo-so" title="Tin tức">Tin tức</a></li>

                </ul>
            </div>
        </nav>



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

                </ul>

            </div>
        </div>
        <div class="category-mobile hide">
            <ul class="menu">
                <li class=" @php if(in_array('ket-qua-xsmb',$reload)){ echo "active"; } @endphp "><a href="/ket-qua-xsmb" title="XSMB">XSMB</a>

                </li>
                <li><a href="/ket-qua-xsmb/kqxsmb-truc-tiep" title="Trực tiếp XSMB">- Trực tiếp XSMB</a></li>
                <li class="@php if(in_array('ket-qua-xsmn',$reload)){ echo "active"; } @endphp"><a href="/ket-qua-xsmn" title="XSMN">XSMN</a>

                </li>
                <li><a href="/ket-qua-xsmn/kqxsmn-truc-tiep" title="Trực tiếp XSMN">- Trực tiếp XSMN</a></li>
                <li class="@php if(in_array('ket-qua-xsmt',$reload)){ echo "active"; } @endphp"><a href="/ket-qua-xsmt" title="XSMT">XSMT</a>

                </li>
                <li><a href="/ket-qua-xsmt/kqxsmt-truc-tiep" title="Trực tiếp XSMT">- Trực tiếp XSMT</a></li>


                <li><a href="/ket-qua-vietlott" title="Trực tiếp XSMT">Vietlott</a></li>
                <li><a href="/thong-ke-kqxs/thong-ke-lo" title="Trực tiếp XSMT">Thống kê</a></li>
                <li><a href="/tin-xo-so" title="Trực tiếp XSMT">Tin tức</a></li>


                <li class="btn-close"><i class="fa fa-times" aria-hidden="true"></i> Đóng danh mục</li>
            </ul>
        </div>
</div>
