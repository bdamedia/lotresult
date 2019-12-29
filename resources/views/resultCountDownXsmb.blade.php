@include('header')
<style>

    #mask {
        /*position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: url('https://github.com/gokercebeci/flipclock/raw/master/css/mask.png');
        z-index: 2;*/
        text-align: center;
        display: inline-flex;
        margin: 0 auto;
    }

    #page {
        margin: 0 auto;
        width: 100%;
    }
    #container {
        opacity: .9;
    }
    #usage li {
        position: relative;
        margin: 5px 0;
        padding: 10px;
        color: #222;
        background: #fff;
    }
    #usage code {
        position: absolute;
        top:0;
        right:0;
        padding: 10px;
        color: #eee;
        border: 1px solid #333;
        background: #000;
    }

    /*
     * flipclock
     * Version: 1.0.0
     * Authors: @gokercebeci
     * Licensed under the MIT license
     * Demo: http://
    */

    /*==============================================================================
        FLIP CLOCK
    ==============================================================================*/
    .flipclock {
    }
    .flipclock hr {
        position: absolute;
        left: 0;
        top: 65px;
        width: 100%;
        height: 3px;
        border: 0;
        background: #000;
        z-index: 10;
        opacity: 0;
    }
    ul.flip {
        position: relative;
        float: left;
        margin: 10px;
        padding: 0;
        width: 130px;
        height: 127px;
        font-size: 89px;
        font-weight: bold;
        line-height: 127px;
    }

    ul.flip li {
        float: left;
        margin: 0;
        padding: 0;
        width: 49%;
        height: 100%;
        -webkit-perspective: 200px;
        list-style: none;
    }

    ul.flip li.d1 {
        float: right;
    }

    ul.flip li section {
        z-index: 1;
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;

    }

    ul.flip li section:first-child {
        z-index: 2;
    }

    ul.flip li div {
        z-index: 1;
        position: absolute;
        left: 0;
        width: 100%;
        height: 49%;
        overflow: hidden;
    }

    ul.flip li div .shadow {
        display: block;
        position: absolute;
        width: 100%;
        height: 100%;
        z-index: 2;
    }

    ul.flip li div.up {
        -webkit-transform-origin: 50% 100%;
        top: 0;
    }

    ul.flip li div.down {
        -webkit-transform-origin: 50% 0%;
        bottom: 0;
    }

    ul.flip li div div.inn {
        position: absolute;
        left: 0;
        z-index: 1;
        width: 100%;
        height: 200%;
        color: #fff;
        text-shadow: 0 0 2px #fff;
        text-align: center;
        background-color: #000;
        border-radius: 6px;
    }

    ul.flip li div.up div.inn {
        top: 0;

    }

    ul.flip li div.down div.inn {
        bottom: 0;
    }

    /*--------------------------------------
     PLAY
    --------------------------------------*/

    body.play ul section.ready {
        z-index: 3;
    }

    body.play ul section.active {
        -webkit-animation: index .5s .5s linear both;
        z-index: 2;
    }

    @-webkit-keyframes index {
        0% {
            z-index: 2;
        }
        5% {
            z-index: 4;
        }
        100% {
            z-index: 4;
        }
    }

    body.play ul section.active .down {
        z-index: 2;
        -webkit-animation: flipdown .5s .5s linear both;
    }

    @-webkit-keyframes flipdown {
        0% {
            -webkit-transform: rotateX(90deg);
        }
        80% {
            -webkit-transform: rotateX(5deg);
        }
        90% {
            -webkit-transform: rotateX(15deg);
        }
        100% {
            -webkit-transform: rotateX(0deg);
        }
    }

    body.play ul section.ready .up {
        z-index: 2;
        -webkit-animation: flipup .5s linear both;
    }

    @-webkit-keyframes flipup {
        0% {
            -webkit-transform: rotateX(0deg);
        }
        90% {
            -webkit-transform: rotateX(0deg);
        }
        100% {
            -webkit-transform: rotateX(-90deg);
        }
    }

    /*--------------------------------------
     SHADOW
    --------------------------------------*/

    body.play ul section.ready .up .shadow {
        background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, rgba(0, 0, 0, .1)), color-stop(100%, rgba(0, 0, 0, 1)));
        background: linear-gradient(top, rgba(0, 0, 0, .1) 0%, rgba(0, 0, 0, 1) 100%);
        background: linear-gradient(to bottom, rgba(0, 0, 0, .1) 0%, rgba(0, 0, 0, 1) 100%);
        -webkit-animation: show .5s linear both;
    }

    body.play ul section.active .up .shadow {
        background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, rgba(0, 0, 0, .1)), color-stop(100%, rgba(0, 0, 0, 1)));
        background: linear-gradient(top, rgba(0, 0, 0, .1) 0%, rgba(0, 0, 0, 1) 100%);
        background: linear-gradient(to bottom, rgba(0, 0, 0, .1) 0%, rgba(0, 0, 0, 1) 100%);
        -webkit-animation: hide .5s .3s linear both;
    }

    /*DOWN*/

    body.play ul section.ready .down .shadow {
        background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, rgba(0, 0, 0, 1)), color-stop(100%, rgba(0, 0, 0, .1)));
        background: linear-gradient(top, rgba(0, 0, 0, 1) 0%, rgba(0, 0, 0, .1) 100%);
        background: linear-gradient(to bottom, rgba(0, 0, 0, 1) 0%, rgba(0, 0, 0, .1) 100%);
        -webkit-animation: show .5s linear both;
    }

    body.play ul section.active .down .shadow {
        background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, rgba(0, 0, 0, 1)), color-stop(100%, rgba(0, 0, 0, .1)));
        background: linear-gradient(top, rgba(0, 0, 0, 1) 0%, rgba(0, 0, 0, .1) 100%);
        background: linear-gradient(to bottom, rgba(0, 0, 0, 1) 0%, rgba(0, 0, 0, .1) 100%);
        -webkit-animation: hide .5s .3s linear both;
    }

    @-webkit-keyframes show {
        0% {
            opacity: 0;
        }
        90% {
            opacity: .10;
        }
        100% {
            opacity: 1;
        }
    }

    @-webkit-keyframes hide {
        0% {
            opacity: 1;
        }
        80% {
            opacity: .20;
        }
        100% {
            opacity: 0;
        }
    }
</style>
<div class="main-content">
    <div class="container">
    <div class="row margin-b">

    <div class="col-xs-12 col-sm-12 col-md-6">
        <div style="min-height: 163px;text-align: center;" class="margin-40 col-xs-12 margin-b-20">
            <div id="mask">
                <div id="page">


                    <div id="container"></div>

                </div>
            </div>
        </div>
    <div class="row">

    <div class="col-xs-12">

        @php $g = 1; @endphp
        @foreach($content as $printresult)
           {{-- {{ print_r($printresult) }}--}}
    <div class="block" id='xsmb-{{ $g }}'>
        <div class="block-main-heading">
            <h1>Kết quả Xổ Số Miền Bắc ({{ $printresult->lottery_region }})</h1>
            </div>
            <div class="list-link">
            <h2 class="class-title-list-link">
                @php $dayName = $printresult->result_day_time->toDateTime()->format('l'); $dayName = getDaySlug($dayName); @endphp
            <a href="/{{ getRegionSlug($printresult->lottery_region) }}" title="{{ $printresult->lottery_region }}">XSMB</a><span> » </span>
            <a href="/{{ getRegionSlug($printresult->lottery_region) }}/kq{{ strtolower($printresult->lottery_region) }}-{{$dayName}}" title="{{ $printresult->lottery_region }} {{ $printresult->result_day_time->toDateTime()->format('l') }}">{{ $printresult->lottery_region }} {{ $printresult->result_day_time->toDateTime()->format('l') }}</a><span> » </span>
            <a href="/{{ getRegionSlug($printresult->lottery_region) }}/kqxsmb-ngay-{{ $printresult->result_day_time->toDateTime()->format('d-m-Y') }}" title="{{ $printresult->lottery_region }}  {{ $printresult->result_day_time->toDateTime()->format('d/m/y') }}">Kết quả Xổ Số Miền Bắc({{ $printresult->lottery_region }})  {{ $printresult->result_day_time->toDateTime()->format('d/m/y') }}</a>
            </h2>
            </div>
            <div class="block-main-content">
            <table class="table table-bordered table-striped table-xsmb">
            <tbody>
            <tr>
            <td style="width: 15%"> @php $prize_1 = json_decode($printresult->prize_1); @endphp {{ key($prize_1) }}</td>
            <td class="text-center">
                @foreach($prize_1->{key($prize_1)} as $k=>$p1)
                    <span class="col-xs-4 special-code div-horizontal">{{ $p1 }} </span>
                    @endforeach
            </td>
            </tr>
            <tr>
            <td class="ĐB">@php $prize_2 = json_decode($printresult->prize_2);  @endphp {{ key($prize_2) }}</td>
            <td class="text-center">
                @if(count((array) $prize_2) <= 1)
                @foreach($prize_2 as $k=>$p2)
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
                @foreach($prize_3 as $k=>$p3)
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
                <td>@php $prize_4 = json_decode($printresult->prize_4);   @endphp {{ key($prize_4) }}</td>
                <td class="text-center">
                    @if(count((array) $prize_4) <= 1)
                        @foreach($prize_4 as $k=>$p4)
                            <span class="number-black-bold div-horizontal">@php if(count($p4) > 0 ){ foreach ($p4 as $p41) { echo "<span class='col-xs-6' >$p41</span>"; } }  @endphp </span>
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
                            <span class="number-black-bold div-horizontal">@php if(count($p5) > 0 ){ foreach ($p5 as $p51) { echo "<span class='col-xs-4' >$p51</span>"; } }  @endphp </span>
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
                            <span class="number-black-bold div-horizontal">@php if(count($p6) > 0 ){ foreach ($p6 as $p61) { echo "<span class='col-xs-3' >$p61</span>"; } }  @endphp </span>
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
                            <span class="number-black-bold div-horizontal">@php if(count($p7) > 0 ){ foreach ($p7 as $p71) { echo "<span class='col-xs-4' >$p71</span>"; } }  @endphp </span>
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
                            <span class="number-black-bold div-horizontal">@php if(count($p8) > 0 ){ foreach ($p8 as $p81) { echo "<span class='col-xs-4' >$p81</span>"; } }  @endphp </span>
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
                            <span class="number-black-bold div-horizontal ">@php if(count($p9) > 0 ){ foreach ($p9 as $p91) { echo "<span class='col-xs-3' >$p91</span>"; } }  @endphp  </span>
                        @endforeach
                    @else
                        @foreach($prize_9->{key($prize_9)} as $k=>$p9)
                            <span class="number-black-bold div-horizontal ">{{ $p9 }} </span>
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

            <span class="link-pad-left padding10 class-title-list-link link-pad-left">
                <a class="" href="/{{ getRegionSlug($printresult->lottery_region) }}/{{ getRegionLotoSlug($printresult->lottery_region) }}" >Lô tô {{ $printresult->lottery_region }}</a> <span> » </span>
                <a href="/{{ getRegionSlug($printresult->lottery_region) }}/{{ getRegionLotoSlug($printresult->lottery_region) }}/kqlt{{ substr(strtolower($printresult->lottery_region),2,4) }}-{{ $dayName   }}" title="{{ $printresult->lottery_region }}  {{ $printresult->result_day_time->toDateTime()->format('l') }}" class="">Lô tô  {{ $printresult->lottery_region }} {{ $printresult->result_day_time->toDateTime()->format('l') }} </a>

            </span>

            <table class="table table-bordered table-loto" style="margin-bottom: 0;">
            <tr>
            <th class="col-md-2" style="width: 10%;">Đầu</th>
            <th class="col-md-4">Lô Tô</th>
            </tr>
            @php
            $fullValues = [];
            $newFullValues = [];
            $finalValues = [];
            for ($it=1; $it< 10 ; $it++) {
                $t= "prize_{$it}";
                $fNewResult = json_decode($printresult->{$t});
                foreach ($fNewResult as $keyValues => $mainValue) {
                    if(is_array($mainValue)) {
                        foreach ($mainValue as $keySecond => $valSecond) {
                            $fullValues[$it-2][] = $valSecond;
                        }
                    } else if ($keyValues == 'Mã ĐB') {

                    } else if ($keyValues == 'G.DB') {
                        $fullValues[$it-2][] = $mainValue;
                    } else {
                        $fullValues[$it-2][] = $mainValue;
                    }
                }
            }

            foreach ($fullValues as $index=>$values) {
                foreach ($values as $in=>$val){
                    $newFullValues[]= substr($val, -2);
                }
            }

            for ($i=0; $i<=9; $i++) {
               $selectlot = array();
               foreach($newFullValues as $in=>$val) {
                    if (substr($val,-2,1) == $i)
                    $selectlot[] = $val;
               }
               $finalValues[] = $selectlot;
            }

            //echo "<pre>";
            //print_r($finalValues);
            for($r = 0 ; $r <=9 ; $r++){  @endphp
                <tr>
                <td class="text-center">{{ $r }}</td>
                <td>
                    @php  if(!empty($finalValues[$r])){
                        echo implode(',',$finalValues[$r]);
                    } else{
                        echo "--";
                    }
                    @endphp
                </td>
            </tr>
            @php
            }

            @endphp

            </table>

            </div>


        </div>
            @php $g++; @endphp
    @endforeach


    </div>
    </div>


    </div>


        @include('sidebar')
    </div>
    </div>
</div>
@include('footer')
<script>
    /*
 * flipclock
 * Version: 1.0.1
 * Authors: @gokercebeci
 * Licensed under the MIT license
 * Demo: http://
 */

    (function($) {

        var pluginName = 'flipclock';

        var methods = {
            pad: function(n) {
                return (n < 10) ? '0' + n : n;
            },
            time: function(date) {
                if (date) {
                    var e = new Date(date);
                    var b = new Date();
                    var d = new Date(e.getTime() - b.getTime());
                } else
                    var d = new Date();
                var t = methods.pad(date ? d.getFullYear() - 70 : d.getFullYear())
                    + '' + methods.pad(date ? d.getMonth() : d.getMonth() + 1)
                    + '' + methods.pad(date ? d.getDate() - 1 : d.getDate())
                    + '' + methods.pad(d.getHours())
                    + '' + methods.pad(d.getMinutes())
                    + '' + methods.pad(d.getSeconds());
                return {
                    'Y': {'d2': t.charAt(2), 'd1': t.charAt(3)},
                    'M': {'d2': t.charAt(4), 'd1': t.charAt(5)},
                    'D': {'d2': t.charAt(6), 'd1': t.charAt(7)},
                    'h': {'d2': t.charAt(8), 'd1': t.charAt(9)},
                    'm': {'d2': t.charAt(10), 'd1': t.charAt(11)},
                    's': {'d2': t.charAt(12), 'd1': t.charAt(13)}
                };
            },
            play: function(c) {
                $('body').removeClass('play');
                var a = $('ul' + c + ' section.active');
                if (a.html() == undefined) {
                    a = $('ul' + c + ' section').eq(0);
                    a.addClass('ready')
                        .removeClass('active')
                        .next('section')
                        .addClass('active')
                        .closest('body')
                        .addClass('play');

                }
                else if (a.is(':last-child')) {
                    $('ul' + c + ' section').removeClass('ready');
                    a.addClass('ready').removeClass('active');
                    a = $('ul' + c + ' section').eq(0);
                    a.addClass('active')
                        .closest('body')
                        .addClass('play');
                }
                else {
                    $('ul' + c + ' section').removeClass('ready');
                    a.addClass('ready')
                        .removeClass('active')
                        .next('section')
                        .addClass('active')
                        .closest('body')
                        .addClass('play');
                }
            },
            // d1 is first digit and d2 is second digit
            ul: function(c, d2, d1) {
                return '<ul class="flip ' + c + '">' + this.li('d2', d2) + this.li('d1', d1) + '</ul>';
            },
            li: function(c, n) {
                //
                return '<li class="' + c + '"><section class="ready"><div class="up">'
                    + '<div class="shadow"></div>'
                    + '<div class="inn"></div></div>'
                    + '<div class="down">'
                    + '<div class="shadow"></div>'
                    + '<div class="inn"></div></div>'
                    + '</section><section class="active"><div class="up">'
                    + '<div class="shadow"></div>'
                    + '<div class="inn">' + n + '</div></div>'
                    + '<div class="down">'
                    + '<div class="shadow"></div>'
                    + '<div class="inn">' + n + '</div></div>'
                    + '</section></li>';
            }
        };
        // var defaults = {};
        function Plugin(element, options) {
            this.element = element;
            this.options = options;
            // this.options = $.extend({}, defaults, options);
            // this._defaults = defaults;
            this._name = pluginName;
            this.init();
        }
        Plugin.prototype = {
            init: function() {
                var t, full = false;

                if (!this.options || this.options == 'clock') {

                    t = methods.time();

                } else if (this.options == 'date') {

                    t = methods.time();
                    full = true;

                } else {

                    t = methods.time(this.options);
                    full = true;

                }

                $(this.element)
                    .addClass('flipclock')
                    .html(
                        (full ?
                            methods.ul('year', t.Y.d2, t.Y.d1)
                            + methods.ul('month', t.M.d2, t.M.d1)
                            + methods.ul('day', t.D.d2, t.D.d1)
                            : '')
                        + methods.ul('hour', t.h.d2, t.h.d1)
                        + methods.ul('minute', t.m.d2, t.m.d1)
                        + methods.ul('second', t.s.d2, t.s.d1)
                        + '<audio id="flipclick">'
                        + '<source src="https://github.com/gokercebeci/flipclock/blob/master/js/plugins/flipclock/click.mp3?raw=true" type="audio/mpeg"/>'
                        + '</audio>');

                setInterval($.proxy(this.refresh, this), 1000);

            },
            refresh: function() {
                var el = $(this.element);
                var t;
                if (this.options
                    && this.options != 'clock'
                    && this.options != 'date') {

                    t = methods.time(this.options);

                } else
                    t = methods.time()

                // second sound
                setTimeout(function() {
                    document.getElementById('flipclick').play()
                }, 500);

                // second first digit
                el.find(".second .d1 .ready .inn").html(t.s.d1);
                methods.play('.second .d1');
                // second second digit
                if ((t.s.d1 === '0')) {
                    el.find(".second .d2 .ready .inn").html(t.s.d2);
                    methods.play('.second .d2');
                    // minute first digit
                    if ((t.s.d2 === '0')) {
                        el.find(".minute .d1 .ready .inn").html(t.m.d1);
                        methods.play('.minute .d1');
                        // minute second digit
                        if ((t.m.d1 === '0')) {
                            el.find(".minute .d2 .ready .inn").html(t.m.d2);
                            methods.play('.minute .d2');
                            // hour first digit
                            if ((t.m.d2 === '0')) {
                                el.find(".hour .d1 .ready .inn").html(t.h.d1);
                                methods.play('.hour .d1');
                                // hour second digit
                                if ((t.h.d1 === '0')) {
                                    el.find(".hour .d2 .ready .inn").html(t.h.d2);
                                    methods.play('.hour .d2');
                                    // day first digit
                                    if ((t.h.d2 === '0')) {
                                        el.find(".day .d1 .ready .inn").html(t.D.d1);
                                        methods.play('.day .d1');
                                        // day second digit
                                        if ((t.D.d1 === '0')) {
                                            el.find(".day .d2 .ready .inn").html(t.D.d2);
                                            methods.play('.day .d2');
                                            // month first digit
                                            if ((t.D.d2 === '0')) {
                                                el.find(".month .d1 .ready .inn").html(t.M.d1);
                                                methods.play('.month .d1');
                                                // month second digit
                                                if ((t.M.d1 === '0')) {
                                                    el.find(".month .d2 .ready .inn").html(t.M.d2);
                                                    methods.play('.month .d2');
                                                    // year first digit
                                                    if ((t.M.d2 === '0')) {
                                                        el.find(".year .d1 .ready .inn").html(t.Y.d1);
                                                        methods.play('.year .d1');
                                                        // year second digit
                                                        if ((t.Y.d1 === '0')) {
                                                            el.find(".year .d2 .ready .inn").html(t.Y.d2);
                                                            methods.play('.year .d2');
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }

            },
        };

        $.fn[pluginName] = function(options) {
            return this.each(function() {
                if (!$(this).data('plugin_' + pluginName)) {
                    $(this).data('plugin_' + pluginName,
                        new Plugin(this, options));
                }
            });
        };

    })(typeof jQuery !== 'undefined' ? jQuery : Zepto);


    // RUN
    $('#container').flipclock();

</script>
