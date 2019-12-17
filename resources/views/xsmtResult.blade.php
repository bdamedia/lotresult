@include('header')

<div class="clearfix"></div>
<div class="container">
    <nav class="hidden-xs hidden-sm navbar navbar-default">
        <h2 class="hide">Menu</h2>
        <div class="collapse navbar-collapse">
            <ul class="main-menu">
                <!-- <li class=""><a href="/" title="Trang chủ"><i class="fa fa-home" aria-hidden="true"></i></a></li> -->
                <li><a href="/xsmb" title="XSMB">XSMB</a>
                    <!-- <div class="menu-lv2-down">
                        <ul><li><a href="/xsmb-thu-2.html" title="XSMB Thứ 2">Thứ 2</a></li>
                            <li><a href="/xsmb-thu-3.html" title="XSMB Thứ 3">Thứ 3</a></li>
                            <li><a href="/xsmb-thu-4.html" title="XSMB Thứ 4">Thứ 4</a></li>
                            <li><a href="/xsmb-thu-5.html" title="XSMB Thứ 5">Thứ 5</a></li>
                            <li><a href="/xsmb-thu-6.html" title="XSMB Thứ 6">Thứ 6</a></li>
                            <li><a href="/xsmb-thu-7.html" title="XSMB Thứ 7">Thứ 7</a></li>
                            <li><a href="/xsmb-chu-nhat-cn.html" title="XSMB Chủ Nhật">Chủ Nhật</a></li>
                            <li><a href="/xsmb-truc-tiep.html" title="Trực tiếp XSMB">Trực tiếp</a></li>
                        </ul>
                    </div> -->
                </li>

                <li><a href="/xsmn" title="XSMN">XSMN</a>
                    <!-- <div class="menu-lv2-down">
                        <ul>
                            <li><a href="/xsmn-thu-2.html" title="XSMN Thứ 2">Thứ 2</a></li
                            <li><a href="/xsmn-thu-3.html" title="XSMN Thứ 3">Thứ 3</a></li>
                            <li><a href="/xsmn-thu-4.html" title="XSMN Thứ 4">Thứ 4</a></li>
                            <li><a href="/xsmn-thu-5.html" title="XSMN Thứ 5">Thứ 5</a></li>
                            <li><a href="/xsmn-thu-6.html" title="XSMN Thứ 6">Thứ 6</a></li>
                            <li><a href="/xsmn-thu-7.html" title="XSMN Thứ 7">Thứ 7</a></li>
                            <li><a href="/xsmn-chu-nhat-cn.html" title="XSMN Chủ Nhật">Chủ Nhật</a></li>
                            <li><a href="/xsmn-truc-tiep.html" title="Trực tiếp XSMN">Trực tiếp</a></li>
                        </ul>
                    </div>-->
                </li>

                <li class="active"><a href="/xsmt" title="XSMN">XSMT</a>
                    <!-- <div class="menu-lv2-down">
                        <ul>
                            <li><a href="/xsmn-thu-2.html" title="XSMN Thứ 2">Thứ 2</a></li
                            <li><a href="/xsmn-thu-3.html" title="XSMN Thứ 3">Thứ 3</a></li>
                            <li><a href="/xsmn-thu-4.html" title="XSMN Thứ 4">Thứ 4</a></li>
                            <li><a href="/xsmn-thu-5.html" title="XSMN Thứ 5">Thứ 5</a></li>
                            <li><a href="/xsmn-thu-6.html" title="XSMN Thứ 6">Thứ 6</a></li>
                            <li><a href="/xsmn-thu-7.html" title="XSMN Thứ 7">Thứ 7</a></li>
                            <li><a href="/xsmn-chu-nhat-cn.html" title="XSMN Chủ Nhật">Chủ Nhật</a></li>
                            <li><a href="/xsmn-truc-tiep.html" title="Trực tiếp XSMN">Trực tiếp</a></li>
                        </ul>
                    </div>-->
                </li>

            </ul>
        </div>
    </nav>

    <div class="hidden-xs hidden-sm menu-lv2">
        <ul class="nav navbar-nav">

            @foreach($comp as $k=>$compn)
                @php  $end = strlen($compn)-4; if($companyName == substr($compn,2,$end)){ $active="active"; }else{ $active=""; } @endphp
                <li class="{{ $active }}"><a href="/xsmt/{{ substr($compn,2,$end) }}" title="{{ substr($compn,2,$end) }}">{{ substr($compn,2,$end) }}</a></li>
            @endforeach
        </ul>
    </div>

    <div class="visible-xs visible-sm menu-mobile">
        <div class="col-xs-12">
            <ul class="col-xs-12">
                <li class="col-xs-3 showmenu"><a href="#" title="Menu">
                        <i class="fa fa-bars" aria-hidden="true"></i></a>
                </li>
                <li class="col-xs-6">
                    <a href="/"><img src="https://cdn.xosodaiphat.com/assets/images/logo.png" alt="logo" title="logo"
                                     class="logo-mb img-responsive"></a>
                </li>
                <li class="col-xs-3">
                    <a href="https://play.google.com/store/apps/details?id=com.icsoft.xosodaiphat" target="_blank"
                       rel="nofollow,noopener" title="Tải ứng dụng trên Android" id="btntaiapp"><img
                            src="/assets/images/app.png" style="height:35px;padding-right: 5px; float:right"
                            alt="Tải ứng dụng"/></a></li>
            </ul>

            <ul class="col-xs-12 ul-lv2">
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
            </ul>
        </div>
    </div>
    <div class="category-mobile hide">
        <ul>
            <li>
                <a href="/" title="XSMB - SXMB - Kết Quả Xổ Số Miền Bắc H&#244;m Nay - KQXSMB"><span class="text"><i
                            class="fa fa-home" aria-hidden="true"></i>Trang chủ</span></a>
            </li>
            <li><a href="/crawler/xsmb-xo-so-mien-bac" title="XSMB">XSMB</a></li>
            <li><a href="/crawler/xsmn-xo-so-mien-nam" title="XSMN">XSMN</a></li>
            <li><a href="/crawler/xsmt-xo-so-mien-trung" title="XSMT">XSMT</a></li>
            <li><a href="/crawler/quay-thu-xo-so" title="Quay thử xổ số">Quay thử xổ số</a></li>
            <li><a href="/crawler/xo-so-vietlott">Vietlott</a></li>

            <li><a href="/crawler/cau-xo-so-cac-tinh" title="TK Cầu">TK Cầu</a></li>
            <li><a href="/crawler/thong-ke-lo-gan" title="TK Lô">TK Lô</a></li>
            <li><a href="/crawler/lo-to-mien-bac/ket-qua-lo-to-mien-bac" title="Lô Tô">Lô Tô</a></li>

            <li><a href="/crawler/thong-ke-xo-so" title="Thống kê Xổ Số">Thống kê Xổ Số</a></li>
            <li><a href="/crawler/xsmb-truc-tiep" title="Xổ số trực tiếp hôm nay">Xổ số trực tiếp hôm nay</a></li>
            <li><a href="/crawler/xsmb-xo-so-mien-bac" title="Xổ số hôm qua">Xổ số hôm qua</a></li>
            <li><a href="/crawler/xo-so-theo-dai" title="KQXS theo tỉnh">KQXS theo tỉnh</a></li>
            <li><a href="/crawler/xo-so-dien-toan-123" title="XS điện toán">XS điện toán</a></li>
            <li><a href="/crawler/do-so-trung" title="Dò vé số">Dò vé số</a></li>
            <li class="btn-close"><i class="fa fa-times" aria-hidden="true"></i> Đóng danh mục</li>
        </ul>
    </div>
</div>
<div class="main-content">
    <div class="container">
        <div class="row margin-b">
            <div class="col-xs-12">

                <div class="row">
                    <div class="col-xs-12">
                        @php $g = 1; @endphp
                        @foreach($content as $printresult)


                            <div class="block" id='xsmb-{{ $g }}'>
                                <div class="block-main-heading">
                                    <h1>{{ $printresult->lottery_region }} - {{ $printresult->lottery_company }}</h1>
                                </div>
                                <div class="list-link">
                                    <h2 class="class-title-list-link">
                                        {{--<a href="/xsmb-xo-so-mien-bac.html" title="XSMB" class="u-line">XSMB</a><span>»</span>
                                        <a href="/xsmb-thu-6.html" title="XSMB Thứ 6" class="u-line">XSMB Thứ 6</a><span>»</span>--}}
                                        <a href="#" title="{{ $printresult->lottery_region }}  {{ $printresult->result_day_time }}" class="u-line">{{ $printresult->lottery_region }}  {{ $printresult->result_day_time }}</a>
                                    </h2>
                                </div>
                                <div class="block-main-content">
                                    <table class="table table-bordered table-striped table-xsmb">
                                        <tbody>
                                        <tr>
                                            <td style="width: 15%"> @php $prize_1 = json_decode($printresult->prize_1); @endphp {{ key($prize_1) }}</td>
                                            <td class="text-center">
                                                @foreach($prize_1->{key($prize_1)} as $k=>$p1)
                                                    <span class=" special-code div-horizontal">{{ $p1 }} </span>
                                                @endforeach
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>@php $prize_2 = json_decode($printresult->prize_2);   @endphp {{ key($prize_2) }}</td>
                                            <td class="text-center">
                                                @if(count((array) $prize_2) <= 1)
                                                    @foreach($prize_2->{key($prize_2)} as $k=>$p2)

                                                        <span class="number-black-bold div-horizontal">{{ $p2 }} </span>
                                                    @endforeach
                                                @else
                                                    @foreach($prize_2->{key($prize_2)} as $k=>$p2)
                                                        <span class="col-xs-4 special-code div-horizontal">{{ $p2 }} </span>
                                                    @endforeach
                                                @endif
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>@php $prize_3 = json_decode($printresult->prize_3);  @endphp {{ key($prize_3) }}</td>
                                            <td class="text-center">
                                                @if(count((array) $prize_3) <= 1)
                                                    @foreach($prize_3->{key($prize_3)} as $k=>$p3)
                                                        <span class="number-black-bold div-horizontal">{{ $p3 }} </span>
                                                    @endforeach
                                                @else
                                                    @foreach($prize_3->{key($prize_3)} as $k=>$p3)
                                                        <span class="number-black-bold div-horizontal">{{ $p3 }} </span>
                                                    @endforeach
                                                @endif
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>@php $prize_4 = json_decode($printresult->prize_4);  @endphp {{ key($prize_4) }}</td>
                                            <td class="text-center">
                                                @if(count((array) $prize_4) <= 1)

                                                    @foreach($prize_4->{key($prize_4)} as $k=>$p4)
                                                        <span class="number-black-bold div-horizontal">{{ $p4 }} </span>
                                                    @endforeach
                                                @else
                                                    @foreach($prize_4->{key($prize_4)} as $k=>$p4)
                                                        <span class="number-black-bold div-horizontal">{{ $p4 }} </span>
                                                    @endforeach
                                                @endif
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>@php $prize_5 = json_decode($printresult->prize_5);  @endphp {{ key($prize_5) }}</td>
                                            <td class="text-center">
                                                @if(count((array) $prize_5) <= 1)
                                                    @foreach($prize_5 as $k=>$p5)
                                                        <span class="number-black-bold div-horizontal">@php if(count((array) $p5) > 0 ){ $p5 = implode(', ',(array) $p5); }  @endphp {{ $p5  }} </span>
                                                    @endforeach

                                                @else
                                                    @foreach($prize_5->{key($prize_5)} as $k=>$p5)
                                                        <span class="number-black-bold div-horizontal">{{ $p5 }} </span>
                                                    @endforeach
                                                @endif
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>@php  $prize_6 = json_decode($printresult->prize_6);  @endphp {{ key($prize_6) }}</td>
                                            <td class="text-center">
                                                @if(count((array) $prize_6) <= 1)
                                                    @foreach($prize_6 as $k=>$p6)
                                                        <span class="number-black-bold div-horizontal">@php if(count((array) $p6) > 0 ){ $p6 = implode(', ',(array) $p6); }  @endphp {{ $p6 }} </span>
                                                    @endforeach
                                                @else
                                                    @foreach($prize_6->{key($prize_6)} as $k=>$p6)
                                                        <span class="number-black-bold div-horizontal">{{ $p6 }} </span>
                                                    @endforeach
                                                @endif
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>@php $prize_7 = json_decode($printresult->prize_7);  @endphp {{ key($prize_7) }}</td>
                                            <td class="text-center">
                                                @if(count((array) $prize_7) <= 1)
                                                    @foreach($prize_7 as $k=>$p7)
                                                        <span class="number-black-bold div-horizontal">@php if(count((array) $p7) > 0 ){ $p7 = implode(', ',(array) $p7); }  @endphp {{ $p7 }} </span>
                                                    @endforeach
                                                @else
                                                    @foreach($prize_7->{key($prize_7)} as $k=>$p7)
                                                        <span class="number-black-bold div-horizontal">{{ $p7 }} </span>
                                                    @endforeach
                                                @endif
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>@php $prize_8 = json_decode($printresult->prize_8);   @endphp {{ key($prize_8) }}</td>
                                            <td class="text-center">
                                                @if(count((array) $prize_8) <= 1)
                                                    @foreach($prize_8 as $k=>$p8)
                                                        <span class="number-black-bold div-horizontal">@php if(count((array) $p8) > 0 ){ $p8 = implode(', ',(array) $p8); }  @endphp {{ $p8 }} </span>
                                                    @endforeach
                                                @else
                                                    @foreach($prize_8->{key($prize_8)} as $k=>$p8)
                                                        <span class="number-black-bold div-horizontal">{{ $p8 }} </span>
                                                    @endforeach
                                                @endif
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>@php $prize_9 = json_decode($printresult->prize_9);   @endphp {{ key($prize_9) }}</td>
                                            <td class="text-center">
                                                @if(count((array) $prize_9) <= 1)
                                                    @foreach($prize_9 as $k=>$p9)
                                                        <span class="number-black-bold div-horizontal">@php if(count((array) $p9) > 0 ){ $p9 = implode(', ',(array) $p9); }  @endphp {{ $p9 }} </span>
                                                    @endforeach
                                                @else
                                                    @foreach($prize_9->{key($prize_9)} as $k=>$p9)
                                                        <span class="number-black-bold div-horizontal">{{ $p9 }} </span>
                                                    @endforeach
                                                @endif
                                            </td>
                                        </tr>

                                        {{--     @if($printresult->prize_10)
                                             <tr>
                                                 <td>@php $prize_10 = json_decode($printresult->prize_10);    @endphp {{ key($prize_10) }}</td>
                                                 <td class="text-center">
                                                     @if(count((array) $prize_10) <= 1)
                                                         @foreach($prize_10 as $k=>$p10)
                                                             <span class="col-xs-3 special-prize-sm div-horizontal">
                                                                 @php if(count((array) $p10) > 1 ){ $p10 = implode(', ',$p10); }elseif(count((array) $p10) == 1){  $p10 = $p10; }  @endphp
                                                                 {{ $p10 }}
                                                             </span>
                                                         @endforeach
                                                     @else
                                                         @foreach($prize_10->{key($prize_10)} as $k=>$p10)
                                                             <span class="col-xs-3 special-prize-sm div-horizontal">{{ $p10 }} </span>
                                                         @endforeach
                                                     @endif
                                                 </td>
                                             </tr>
                                             @endif--}}

                                        </tbody>
                                    </table>
                                </div>
                                <hr class="line-header"/>
                                <div class="block-main-content">

                                    <span class="link-pad-left padding10">Lô tô miền Bắc</span>

                                    <table class="table table-bordered table-loto" style="margin-bottom: 0;">
                                        <tr>
                                            <th class="col-md-2" style="width: 10%;">Đầu</th>
                                            <th class="col-md-4">Lô Tô</th>
                                        </tr>
                                        @if($printresult->board)
                                            @php $boardRes = json_decode($printresult->board) @endphp
                                            @foreach($boardRes as $ke=>$bingoData)
                                                <tr>
                                                    <td class="text-center">{{ $ke }}</td><td>{{ $bingoData }}</td>
                                                </tr>
                                            @endforeach
                                        @endif
                                        {{-- <tr>
                                             <td class="text-center">1</td><td>17, 14, 13, 16</td>
                                         </tr>
                                         <tr>
                                             <td class="text-center">2</td><td>26, 28</td>
                                         </tr>
                                         <tr>
                                             <td class="text-center">3</td><td>32</td>
                                         </tr>
                                         <tr>
                                             <td class="text-center">4</td><td>49, 43, 48, 49</td>
                                         </tr>
                                         <tr>
                                             <td class="text-center">5</td><td>51</td>
                                         </tr>
                                         <tr>
                                             <td class="text-center">6</td><td>60, 60, 61, 60</td>
                                         </tr>
                                         <tr>
                                             <td class="text-center">7</td><td>76, 75, 76</td>
                                         </tr>
                                         <tr>
                                             <td class="text-center">8</td><td>88, 86, 84</td>
                                         </tr>
                                         <tr>
                                             <td class="text-center">9</td><td>96, 92, 93, 93</td>
                                         </tr>--}}
                                    </table>
                                </div>
                                <div class="link-statistic">
                                    <ul>
                                        <li>Xem thống kê <a href="/cau-mien-bac/cau-bach-thu.html" title="Cầu bạch thủ miền Bắc">Cầu bạch thủ miền Bắc</a></li>
                                        <li>Xem thống kê <a href="/thong-ke-lo-xien.html" title="Lô xiên miền Bắc">Lô xiên miền Bắc</a></li>
                                        <li>Tham khảo <a href="/thong-ke-xsmb-c2579-article.html" title="Thống kê XSMB">Thống kê XSMB</a></li>
                                        <li><a href="/">KQXS</a> miền Bắc hôm nay siêu tốc - chính xác, trực tiếp <a
                                                href="/xsmb-xo-so-mien-bac.html">XSMB</a> lúc 18h15 mỗi ngày</li>
                                    </ul>
                                </div>
                                <p class="text-right margin-10 hidden-xs hidden-sm">
                                    <a href="/in-ve-do.html" data-date="13-12-2019" data-groupname="xsmb" class="btn btn-danger btn-invedo"
                                       role="button">In Vé Dò</a>
                                </p>
                            </div>
                            @php $g++; @endphp
                        @endforeach


                    </div>
                </div>


            </div>

            <!-- <div class="hidden-xs hidden-sm col-md-3 center-side-bar fix-width-center">
                <h2 class="hide">Center side bar</h2>
                <div class="item-menu">
                    <div class="title-item">
                    <h3><a href="/cau-mien-bac/cau-bach-thu.html" title="Thống Kê Cầu">Thống Kê Cầu</a></h3>
                    </div>
                    <div class="content-item"><ul>

                        <li><a href="/cau-mien-bac/cau-bach-thu.html" title="Cầu bạch thủ MB">Cầu bạch thủ &#40; MB &#41;</a></li>
                        <li><a href="/cau-mien-bac/cau-lat-lien-tuc.html" title="Cầu lật liên tục MB">Cầu lật liên tục &#40; MB &#41;</a></li>
                        <li><a href="/cau-mien-bac/cau-ve-ca-cap.html" title="Cầu về cả cặp MB">Cầu về cả cặp &#40; MB &#41;</a></li>
                        <li><a href="/cau-mien-bac/cau-ve-nhieu-nhay.html" title="Cầu về nhiều nháy MB">Cầu về nhiều nháy &#40; MB &#41;</a></li>
                        <li><a href="/cau-mien-nam.html" title="Cầu miền Nam">Cầu miền Nam</a></li>
                        <li><a href="/cau-mien-trung.html" title="Cầu miền Trung">Cầu miền Trung</a></li>
                        </ul>
                    </div>
                </div>
                <div class="item-menu">
                    <div class="title-item"><h3><a href="/thong-ke-lo-gan.html" title="Thống Kê Lô">Thống Kê Lô</a></h3></div>
                    <div class="content-item"><ul>
                    <li><a href="/thong-ke-lo-gan.html" title="TK lô gan">TK lô gan</a></li>
                    <li><a href="/thong-ke-lo-xien.html" title="TK lô xiên">TK lô xiên</a></li>
                    <li><a href="/thong-ke-lo-kep.html">TK lô kép</a></li>
                    <li><a href="/thong-ke-dau.html" title="TK lô đầu">TK lô đầu</a></li>
                    <li><a href="/thong-ke-duoi.html" title="TK lô đuôi">TK lô đuôi</a></li>
                    <li><a href="/thong-ke-giai-dac-biet.html">TK giải đặc biệt</a></li>
                    <li><a href="/thong-ke-tan-suat.html" title="TK lần xuất hiện">TK lần xuất hiện</a></li>
                    <li><a href="/thong-ke-00-99.html" title="TK 00 - 99">TK 00 &#45; 99</a></li>
                    <li><a href="/thong-ke-theo-chu-ky-4-1-0.html" title="TK chu kỳ" target="_blank">TK chu kỳ</a></li>
                    </ul></div>
                </div>
                <div class="item-menu">
                    <div class="title-item"><h3><a href="/thong-ke-lan-xuat-hien.html">Thống Kê Vietlott</a></h3></div>
                    <div class="content-item"><ul>
                    <li><a href="/thong-ke-lan-xuat-hien.html" class="text-black-bold">TK xổ số Mega 6/45</a>
                    <ul class="sub-content">
                    <li><a href="/thong-ke-lan-xuat-hien.html" title="TK lần xuất hiện">TK lần xuất hiện</a></li>
                    <li><a href="/thong-ke-theo-thu.html" title="TK theo thứ">TK theo thứ</a></li>
                    </ul></li>
                    <li><a href="/thong-ke-theo-luot-ve.html" class="text-black-bold">TK xổ số Max 4D</a>
                    <ul class="sub-content">
                    <li><a href="/thong-ke-theo-luot-ve.html" title="TK theo lượt về">TK theo lượt về</a></li>
                    <li><a href="/thong-ke-theo-long-cau.html" title="TK theo lồng cầu">TK theo lồng cầu</a></li>
                    </ul></li>
                    </ul></div>
                </div>
                <div class="item-menu">
                    <div class="title-item"><h3><a href="/xsmb-truc-tiep.html">Xổ Số Trực Tiếp Hôm Nay</a></h3></div>
                    <div class="content-item"><ul>
                    <li><a href="/xsmn-xo-so-mien-nam.html" title="XSMN 16h10" class="text-black-bold">XSMN &#40; 16h10 &#41; </a>
                    <ul class="sub-content"><li><a href="/xsla-xo-so-long-an.html" title="Long An">Long An</a></li>
                    <li><a href="/xshcm-xo-so-tphcm.html" title="TP.HCM">TP.HCM</a></li>
                    <li><a href="/xsbp-xo-so-binh-phuoc.html" title="B&#236;nh Phước">B&#236;nh Phước</a></li>
                    <li><a href="/xshg-xo-so-hau-giang.html" title="Hậu Giang">Hậu Giang</a></li>
                    </ul></li>
                    <li><a href="/xsmt-xo-so-mien-trung.html" title="XSMT 17h15" class="text-black-bold">XSMT &#40; 17h15 &#41; </a>
                    <ul class="sub-content"><li><a href="/xsqng-xo-so-quang-ngai.html" title="Quảng Ng&#227;i">Quảng Ng&#227;i</a></li>
                    <li><a href="/xsdna-xo-so-da-nang.html" title="Đ&#224; Nẵng">Đ&#224; Nẵng</a></li>
                    <li><a href="/xsdno-xo-so-dak-nong.html" title="Đắk N&#244;ng">Đắk N&#244;ng</a></li>
                    </ul></li>
                    <li><a href="/xsmb-xo-so-mien-bac.html" title="XSMB 18h15" class="text-black-bold">XSMB &#40; 18h15 &#41; </a>
                    <ul class="sub-content"><li><a href="/xsmb-xo-so-mien-bac.html" title="Miền Bắc">Miền Bắc</a></li>
                    </ul>
                    </li></ul></div>
                </div>
                <div class="item-menu">
                    <div class="title-item"><h3><a href="/xsmb-xo-so-mien-bac.html" title="Xổ Số Hôm Qua">Xổ Số Hôm Qua</a></h3></div>
                    <div class="level2"><ul><li><a href="/xsmb-xo-so-mien-bac.html" title="Miền Bắc">Miền Bắc</a></li>
                        <li><a href="/xsvl-xo-so-vinh-long.html" title="Vĩnh Long">Vĩnh Long</a></li>
                        <li><a href="/xsbd-xo-so-binh-duong.html" title="B&#236;nh Dương">B&#236;nh Dương</a></li>
                        <li><a href="/xstv-xo-so-tra-vinh.html" title="Tr&#224; Vinh">Tr&#224; Vinh</a></li>
                        <li><a href="/xsnt-xo-so-ninh-thuan.html" title="Ninh Thuận">Ninh Thuận</a></li>
                        <li><a href="/xsgl-xo-so-gia-lai.html" title="Gia Lai">Gia Lai</a></li>
                        </ul>
                    </div>
                </div>
                <div class="item-menu">
                    <div class="title-item"><h3><a href="/xo-so-theo-dai.html" title="Xổ Số Hôm Qua">KQXS theo tỉnh</a></h3></div>
                        <div class="level2"><ul>

                        <li><a href="javascript:void(0)">Miền Bắc</a><i class="fa fa-caret-down" aria-hidden="true"></i>
                        <ul class="level3"><li><a href="/xsbn-xo-so-bac-ninh.html">Bắc Ninh</a></li><li><a href="/xstd-xo-so-ha-noi.html">H&#224; Nội</a></li><li><a href="/xshp-xo-so-hai-phong.html">Hải Ph&#242;ng</a></li><li><a href="/xsnd-xo-so-nam-dinh.html">Nam Định</a></li><li><a href="/xsqn-xo-so-quang-ninh.html">Quảng Ninh</a></li><li><a href="/xstb-xo-so-thai-binh.html">Th&#225;i B&#236;nh</a></li></ul>
                        </li>
                        <li><a href="javascript:void(0)">Miền Trung</a><i class="fa fa-caret-down" aria-hidden="true"></i>
                        <ul class="level3"><li><a href="/xsbdi-xo-so-binh-dinh.html">B&#236;nh Định</a></li><li><a href="/xsdna-xo-so-da-nang.html">Đ&#224; Nẵng</a></li><li><a href="/xsdlk-xo-so-dak-lak.html">Đắk Lắk</a></li><li><a href="/xsdno-xo-so-dak-nong.html">Đắk N&#244;ng</a></li><li><a href="/xsgl-xo-so-gia-lai.html">Gia Lai</a></li><li><a href="/xstth-xo-so-hue.html">Huế</a></li><li><a href="/xskh-xo-so-khanh-hoa.html">Kh&#225;nh H&#242;a</a></li><li><a href="/xskt-xo-so-kon-tum.html">Kon Tum</a></li><li><a href="/xsnt-xo-so-ninh-thuan.html">Ninh Thuận</a></li><li><a href="/xspy-xo-so-phu-yen.html">Ph&#250; Y&#234;n</a></li><li><a href="/xsqb-xo-so-quang-binh.html">Quảng B&#236;nh</a></li><li><a href="/xsqna-xo-so-quang-nam.html">Quảng Nam</a></li><li><a href="/xsqng-xo-so-quang-ngai.html">Quảng Ng&#227;i</a></li><li><a href="/xsqt-xo-so-quang-tri.html">Quảng Trị</a></li></ul>
                        </li>
                        <li><a href="javascript:void(0)">Miền Nam</a><i class="fa fa-caret-down" aria-hidden="true"></i>
                        <ul class="level3"><li><a href="/xsag-xo-so-an-giang.html">An Giang</a></li><li><a href="/xsbl-xo-so-bac-lieu.html">Bạc Li&#234;u</a></li><li><a href="/xsbtr-xo-so-ben-tre.html">Bến Tre</a></li><li><a href="/xsbd-xo-so-binh-duong.html">B&#236;nh Dương</a></li><li><a href="/xsbp-xo-so-binh-phuoc.html">B&#236;nh Phước</a></li><li><a href="/xsbth-xo-so-binh-thuan.html">B&#236;nh Thuận</a></li><li><a href="/xscm-xo-so-ca-mau.html">C&#224; Mau</a></li><li><a href="/xsct-xo-so-can-tho.html">Cần Thơ</a></li><li><a href="/xsdl-xo-so-da-lat.html">Đ&#224; Lạt</a></li><li><a href="/xsdn-xo-so-dong-nai.html">Đồng Nai</a></li><li><a href="/xsdt-xo-so-dong-thap.html">Đồng Th&#225;p</a></li><li><a href="/xshg-xo-so-hau-giang.html">Hậu Giang</a></li><li><a href="/xskg-xo-so-kien-giang.html">Ki&#234;n Giang</a></li><li><a href="/xsla-xo-so-long-an.html">Long An</a></li><li><a href="/xsst-xo-so-soc-trang.html">S&#243;c Trăng</a></li><li><a href="/xstn-xo-so-tay-ninh.html">T&#226;y Ninh</a></li><li><a href="/xstg-xo-so-tien-giang.html">Tiền Giang</a></li><li><a href="/xshcm-xo-so-tphcm.html">TP.HCM</a></li><li><a href="/xstv-xo-so-tra-vinh.html">Tr&#224; Vinh</a></li><li><a href="/xsvl-xo-so-vinh-long.html">Vĩnh Long</a></li><li><a href="/xsvt-xo-so-vung-tau.html">Vũng T&#224;u</a></li></ul>
                        </li>
                        </ul>
                    </div>
                </div>

            </div> -->

            <!-- <div class="col-xs-12 col-sm-12 col-md-3 fix-width-right">
                <h2 class="hide">Right side bar</h2>
                <div class="hidden-xs hidden-sm item-menu border-margin" style="margin-top:10px">
                    <div class="title-item"><h3><a href="/xo-so-dien-toan-tu-chon-mega-645.html">Xổ Số Điện Toán</a></h3></div>
                        <div class="content-item"><ul>
                            <li><a href="/xo-so-dien-toan-tu-chon-mega-645.html" title="XS Mega 6/45" class="text-black-bold">XS Mega 6/45</a>
                            <ul class="sub-content">
                            <li><a href="/xs-mega-thu-4.html" title="XS Mega 6/45 thứ 4">Thứ 4</a></li>
                            <li><a href="/xs-mega-thu-6.html" title="XS Mega 6/45 thứ 6">Thứ 6</a></li>
                            <li><a href="/xs-mega-chu-nhat.html" title="XS Mega 6/45 chủ nhật">Chủ Nhật</a></li>
                            </ul></li>
                            <li><a href="/xo-so-max4d.html" title="XS Max 4D" class="text-black-bold">XS Max 4D</a>
                            <ul class="sub-content">
                            <li><a href="/xs-max4d-thu-3.html" title="XS Max 4D thứ 3">Thứ 3</a></li>
                            <li><a href="/xs-max4d-thu-5.html" title="XS Max 4D thứ 5">Thứ 5</a></li>
                            <li><a href="/xs-max4d-thu-7.html" title="XS Max 4D thứ 7">Thứ 7</a></li>
                            </ul></li>
                            <li><a href="/xs-power-xo-so-power-655.html" title="XS Power 6/55" class="text-black-bold">XS Power 6/55</a>
                            <ul class="sub-content">
                            <li><a href="/xs-power-655-thu-3.html" title="XS Power thứ 3">Thứ 3</a></li>
                            <li><a href="/xs-power-655-thu-5.html" title="XS Power thứ 5">Thứ 5</a></li>
                            <li><a href="/xs-power-655-thu-7.html" title="XS Power thứ 7">Thứ 7</a></li>
                            </ul></li>
                            <li><a href="/xo-so-max3d.html" title="XS Max 3D" class="text-black-bold">XS Max 3D</a>
                            <ul class="sub-content">
                            <li><a href="/xs-max3d-thu-2.html" title="XS Max 3D thứ 2">Thứ 2</a></li>
                            <li><a href="/xs-max3d-thu-4.html" title="XS Max 3D thứ 4">Thứ 4</a></li>
                            <li><a href="/xs-max3d-thu-6.html" title="XS Max 3D thứ 6">Thứ 6</a></li>
                            </ul></li>
                            <li><a href="/xo-so-dien-toan-6x36.html" title="XS Điện toán 6x36" class="text-black-bold">XS Điện toán 6x36</a></li>
                            <li><a href="/xo-so-dien-toan-123.html" title="XS Điện toán 123" class="text-black-bold">XS Điện toán 123</a></li>
                            <li><a href="/xo-so-than-tai.html" title="XS Thần tài 4" class="text-black-bold">XS Thần tài 4</a></li>
                            </ul>
                        </div>
                </div>
                <div class="adv-side-bar">
                    <div class="quangcao980x90_nomobile">
                    <script type="text/javascript">if ((window.mobileAndTabletcheck() && 'wap' == 'web') || (window.mobileAndTabletcheck() == false && 'web' == 'web') ) {document.write('<div id="23c97e9cb93576e45d2feaf00d0e8502"></div><scr' + 'ipt async src="https://click.advertnative.com/loading/?handle=2140"></scr' + 'ipt>');}</script>
                    </div>
                    <div class="quangcao980x90_nodesktop">

                    </div>
                </div>
                        <div class="item-menu border-margin">
                            <div class="title-item"><h3><a href="/do-so-trung.html">Dò Vé Số</a></h3></div>
                            <div class="form-doveso">
                                <div class="form-inline">
                                <div class="form-group"><label for="ngaydoheader" class="lable-text">Chọn ngày:</label>
                                <input type="text" id="ngaydoheader" value="13-12-2019" class="form-control form-group" required="required" placeholder="Chọn ngày" onchange="xsdp.getTinhtheoNgay(this.value);" size="9" title="Ngày dò" />
                                </div>
                                <div class="form-group"><label for="tinhheader" class="lable-text">Chọn tỉnh:</label>
                                <select class="form-control form-group" id="tinhheader">
                                <option value="mb" data-lotteryDesc="/xsmb-xo-so-mien-bac.html">Miền Bắc</option>
                                <option value="VL" data-lotteryDesc="/xsvl-xo-so-vinh-long.html">Vĩnh Long</option>
                                <option value="BD" data-lotteryDesc="/xsbd-xo-so-binh-duong.html">B&#236;nh Dương</option>
                                <option value="TV" data-lotteryDesc="/xstv-xo-so-tra-vinh.html">Tr&#224; Vinh</option>
                                <option value="NT" data-lotteryDesc="/xsnt-xo-so-ninh-thuan.html">Ninh Thuận</option>
                                <option value="GL" data-lotteryDesc="/xsgl-xo-so-gia-lai.html">Gia Lai</option>
                                <option value="mega" data-lotteryDesc="/xo-so-dien-toan-tu-chon-mega-645.html">Mega 6/45</option>
                                </select></div>
                                <div class="form-group">
                                <input type="text" class="form-control form-group" name="nhapso" id="inputNumberDo" required="required" placeholder="Nhập dãy số" size="9" title="Nhập dãy số" />
                                <button type="submit" class="btn btn-red form-group" id="btndoSo" title="Kết quả">Kết quả</button>
                                </div></div>
                                <p class="text-12">&#40; Có thể nhập tối thiểu 2 số, tối đa 17 số &#41;</p>
                            </div>
                    </div>
                </div> -->
        </div>
    </div>
</div>
@include('footer')
