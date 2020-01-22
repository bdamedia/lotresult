@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/datatables/css/dataTables.bootstrap4.css') }}">
    <style>
        #post-data{
            float: left;
        }

        .block-main-heading h1, .block-main-heading h2, .block-main-heading h3 {
            color: #000000;
            font-size: 18px;
            padding: 12px 10px;
            margin: 0;
            line-height: 1.5;
            text-align: center;
            background-color: rgba(255, 183, 0, 1);
            font-weight: 700;
        }
        .list-link {
            background-color: rgba(255, 183, 0, 1);
            padding-bottom: 12px;
            text-align: center;
        }
        .class-title-list-link {
            font-size: 15px;
            margin: 0;
        }
        .table-xsmn tr:first-child td span, .table-xsmt tr:first-child td span, td.G.DB + td > span {
            color: red;
        }
        .number-black-bold {
            color: #000;
            font-size: 28px;
            font-weight: 700;
        }

        .table-bordered {
            border: 1px solid #dee2e6;
        }

        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
            background-color: transparent;
        }
        td.ĐB + td > span, td.ĐB + td + td > span, td.ĐB + td + td + td > span, td.ĐB + td + td + td + td > span {
            color: red;
        }
        table.table-xsmax tbody tr td:first-child, table.table-xsmb tbody tr td:first-child, table.table-xsmn tbody tr td:first-child {
            text-align: center;
            vertical-align: middle;
        }
        .block-clock .clock.flip-clock-wrapper {
            margin-top: -1em;
            margin-left: 23px
        }

        .output {
            background: #c30909;
            background: -webkit-linear-gradient(rgba(195, 9, 9, 1), rgba(73, 3, 3, 1));
            background: -o-linear-gradient(rgba(195, 9, 9, 1), rgba(73, 3, 3, 1));
            background: -moz-linear-gradient(rgba(195, 9, 9, 1), rgba(73, 3, 3, 1));
            background: linear-gradient(rgba(195, 9, 9, 1), rgba(73, 3, 3, 1));
            border-radius: 100%;
            font-size: 24px;
            color: #fff;
            padding: 0 5px;
            display: inline
        }

        .flip-clock-wrapper.clearfix:after, .flip-clock-wrapper.clearfix:before, .flip-clock-wrapper:after, .flip-clock-wrapper:before {
            content: " ";
            display: table
        }

        .flip-clock-wrapper * {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            -ms-box-sizing: border-box;
            -o-box-sizing: border-box;
            box-sizing: border-box;
            -webkit-backface-visibility: hidden;
            -moz-backface-visibility: hidden;
            -ms-backface-visibility: hidden;
            -o-backface-visibility: hidden;
            backface-visibility: hidden
        }

        .flip-clock-wrapper a {
            cursor: pointer;
            text-decoration: none;
            color: #ccc
        }

        .flip-clock-wrapper a:hover {
            color: #fff
        }

        .flip-clock-wrapper {
            font: 400 11px "Helvetica Neue", Helvetica, sans-serif;
            -webkit-user-select: none;
            text-align: center;
            position: relative;
            max-width: 347px;
            margin: 0 auto;
        }

        .flip-clock-meridium {
            background: 0 0 !important;
            box-shadow: 0 0 0 !important;
            font-size: 36px !important
        }

        .flip-clock-meridium a {
            color: #313333
        }

        .flip-clock-wrapper ul {
            position: relative;
            float: left;
            margin: 5px;
            width: 40px;
            height: 60px;
            font-size: 60px;
            font-weight: 700;
            line-height: 70px;
            border-radius: 6px;
            background: #000
        }

        .flip-clock-wrapper ul li {
            z-index: 1;
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            line-height: 63px;
            list-style: none;
            text-decoration: none !important
        }

        .flip-clock-wrapper ul li:first-child {
            z-index: 2
        }

        .flip-clock-wrapper ul li a {
            display: block;
            height: 100%;
            -webkit-perspective: 200px;
            -moz-perspective: 200px;
            perspective: 200px;
            margin: 0 !important;
            overflow: visible !important;
            cursor: default !important
        }

        .flip-clock-wrapper ul li a div {
            z-index: 1;
            position: absolute;
            left: 0;
            width: 100%;
            height: 50%;
            font-size: 80px;
            overflow: hidden;
            outline: transparent solid 1px
        }

        .flip-clock-wrapper ul li a div .shadow {
            position: absolute;
            width: 100%;
            height: 100%;
            z-index: 2
        }

        .flip-clock-wrapper ul li a div.up {
            -webkit-transform-origin: 50% 100%;
            -moz-transform-origin: 50% 100%;
            -ms-transform-origin: 50% 100%;
            -o-transform-origin: 50% 100%;
            transform-origin: 50% 100%;
            top: 0
        }

        .flip-clock-wrapper ul li a div.up:after {
            content: "";
            position: absolute;
            top: 44px;
            left: 0;
            z-index: 5;
            width: 100%;
            height: 3px;
            background-color: #000;
            background-color: rgba(0, 0, 0, .4)
        }

        .flip-clock-wrapper ul li a div.down {
            -webkit-transform-origin: 50% 0;
            -moz-transform-origin: 50% 0;
            -ms-transform-origin: 50% 0;
            -o-transform-origin: 50% 0;
            transform-origin: 50% 0;
            bottom: 0;
            border-bottom-left-radius: 6px;
            border-bottom-right-radius: 6px
        }

        .flip-clock-wrapper ul li a div div.inn {
            position: absolute;
            left: 0;
            z-index: 1;
            width: 100%;
            height: 200%;
            color: #fff;
            text-shadow: 0 1px 2px #000;
            text-align: center;
            background-color: #cd0000;
            border-radius: 6px;
            /*font-size: 58px;*/
            font-size: 38px
        }

        .flip-clock-wrapper ul li a div.up div.inn {
            top: 0
        }

        .flip-clock-wrapper ul li a div.down div.inn {
            bottom: 0
        }

        .flip-clock-wrapper ul.play li.flip-clock-before {
            z-index: 3
        }

        .flip-clock-wrapper .flip {
            box-shadow: 0 2px 5px rgba(0, 0, 0, .7)
        }

        .flip-clock-wrapper ul.play li.flip-clock-active {
            -webkit-animation: asd .5s .5s linear both;
            -moz-animation: asd .5s .5s linear both;
            animation: asd .5s .5s linear both;
            z-index: 5
        }

        .flip-clock-divider {
            float: left;
            display: inline-block;
            position: relative;
            width: 20px;
            height: 100px
        }

        .flip-clock-divider:first-child {
            width: 0
        }

        .flip-clock-dot {
            display: block;
            background: #cd0000;
            width: 10px;
            height: 10px;
            position: absolute;
            border-radius: 50%;
            box-shadow: 0 0 5px rgba(0, 0, 0, .5);
            left: 5px
        }

        .flip-clock-divider .flip-clock-label {
            position: absolute;
            bottom: 0;
            right: -63px;
            color: #000;
            text-shadow: none;
            font-size: 18px
        }

        .flip-clock-divider.minutes .flip-clock-label {
            right: -69px
        }

        .flip-clock-divider.seconds .flip-clock-label {
            right: -67px
        }

        .flip-clock-dot.top {
            top: 22px
        }

        .flip-clock-dot.bottom {
            bottom: 46px
        }
        input[type='button']{

            align-self: center;
            padding: 2px 2px 2px 2px;
            box-sizing: border-box;
            width: 100%;
            border-width: 0px;
            color: #ffffff;
            width: 96px;
            height: 40px;
            background: inherit;
            background-color: rgba(22, 155, 213, 1);
            border: none;
            border-radius: 5px;
            -moz-box-shadow: none;
            -webkit-box-shadow: none;
            box-shadow: none;
        }
        .start-stop-button{
            color: #fff;
            text-shadow: 0 1px 2px #000;
            text-align: center;
            background-color: #cd0000;
            border: 0px solid #cd0000;
            padding: 10px;
            border-radius: 18px;
            font-size: 22px;
        }

        .u5596_div {
            border-width: 0px;
           /* position: absolute;*/
            margin-left: 10px;
            width: 67px;
            height: 22px;
            background: inherit;
            background-color: rgba(242, 242, 242, 1);
            border: none;
            border-radius: 10px;
            -moz-box-shadow: none;
            -webkit-box-shadow: none;
            box-shadow: none;
            font-family: 'Arial-BoldMT', 'Arial Bold', 'Arial';
            font-weight: 700;
            font-style: normal;
            font-size: 18px;
            color: #000000;
        }
        form span {
            float: left;
        }

        form{
            margin-top: 15px;
        }
    </style>
@endsection

@section('js')
    <script src="{{ URL::asset('js/flipclock.js') }}"> </script>
    <script src="{{ URL::asset('js/clock.js') }}"> </script>
    <script src="{{ asset('vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
    <script type="application/javascript">
        function setDelete($url) {
            $('#DeleteForm').attr('action', $url);
            $('#myModal').modal('show');
            return false;
        }

        $(function () {
            $("#usersTable").DataTable();
        });
    </script>
@endsection

@section('js')
    <script type="application/javascript">
        function setDelete($url) {
            $('#DeleteForm').attr('action', $url);
            $('#myModal').modal('show');
            return false;
        }

        $(function () {
            $("#usersTable").DataTable();
        });
    </script>
@endsection

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Dashboard</h1>
@stop

@section('content')
<div id="post-data" class="col-xs-12 col-sm-12 col-md-5">
    <div style="border: 1px solid #060606;min-height: 200px;text-align: center;" class="margin-40  margin-b-20">
        <div style="width: 100%" class="block-main-heading">
            @php $mytime = Carbon\Carbon::now(); @endphp
            <h1>Nhập Kết quả trực tiếp {{ $region }}</h1>
        </div>

        <div class="clock" data-time="18-10-00" ></div>
    </div>
        <div class="col-xs-12">

            @if($content->count() > 0)
                @php $g = 1; @endphp
                @foreach($content as $printresult)
                    {{-- {{ print_r($printresult) }}--}}
                    <div class="block" id='xsmb-{{ $g }}'>


                        <div class="block-main-content">
                            <table class="table table-bordered table-striped table-xsmb">
                                <tbody>
                                <tr>
                                    <td style="width: 15%"> @php $prize_1 = json_decode($printresult->prize_1); @endphp {{ key($prize_1) }}</td>
                                    <td class="text-center">
                                        @foreach($prize_1->{key($prize_1)} as $k=>$p1)
                                            @if(count((array)$prize_1->{key($prize_1)}) > 3 )
                                                <span class="col-xs-3 special-code div-horizontal">{{ $p1 }}</span>
                                            @else
                                                <span class="col-xs-4 special-code div-horizontal">{{ $p1 }}</span>
                                            @endif
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td class="ĐB">@php $prize_2 = json_decode($printresult->prize_2);  @endphp {{ key($prize_2) }}</td>
                                    <td class="text-center">
                                        @if(count((array) $prize_2) == 1)
                                            @foreach($prize_2 as $k=>$p2)
                                                @php if( is_array($p2) && count((array)$p2) > 0){ foreach ($p2 as $p21) { echo "<span class='col-xs-12 number-black-bold div-horizontal' >$p21</span>"; } }else{ echo "<span class='col-xs-12 number-black-bold div-horizontal' >$p2</span>"; }  @endphp
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
                                                @php if(is_array($p3) && count((array)$p3) > 0 ){ foreach ($p3 as $p31) { echo "<span class='col-xs-12 number-black-bold div-horizontal' >$p31</span>"; } }else{ echo "<span class='col-xs-12 number-black-bold div-horizontal' >$p3</span>"; }  @endphp
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
                                                <span class="number-black-bold div-horizontal">@php if(count((array)$p4) > 0 ){ foreach ($p4 as $p41) { echo "<span class='col-xs-6' >$p41</span>"; } }  @endphp  </span>
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
                                                <span class="number-black-bold div-horizontal">@php if(count((array)$p5) > 0 ){ foreach ($p5 as $p51) { echo "<span class='col-xs-4' >$p51</span>"; } }  @endphp </span>
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
                                                <span class="number-black-bold div-horizontal">@php if(count((array)$p6) > 0 ){ foreach ($p6 as $p61) { echo "<span class='col-xs-3' >$p61</span>"; } }  @endphp </span>
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
                                                <span class="number-black-bold div-horizontal">@php if(count((array)$p7) > 0 ){ foreach ($p7 as $p71) { echo "<span class='col-xs-4' >$p71</span>"; } }  @endphp </span>
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
                                                <span class="number-black-bold div-horizontal">@php if(count((array)$p8) > 0 ){ foreach ($p8 as $p81) { echo "<span class='col-xs-4' >$p81</span>"; } }  @endphp </span>
                                            @endforeach
                                        @else
                                            @foreach($prize_8->{key($prize_8)} as $k=>$p8)
                                                <span class="number-black-bold div-horizontal">{{ $p8 }} </span>
                                            @endforeach
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="ĐB">@php $prize_9 = json_decode($printresult->prize_9);   @endphp {{ key($prize_9) }}</td>
                                    <td class="text-center">
                                        @if(count((array) $prize_9) <= 1)
                                            @foreach($prize_9 as $k=>$p9)
                                                <span class="number-black-bold div-horizontal ">@php if(count((array)$p9) > 0 ){ foreach ($p9 as $p91) { echo "<span class='col-xs-3' >$p91</span>"; } }  @endphp  </span>
                                            @endforeach
                                        @else
                                            @foreach($prize_9->{key($prize_9)} as $k=>$p9)
                                                <span class="number-black-bold div-horizontal ">{{ $p9 }} </span>
                                            @endforeach
                                        @endif
                                    </td>
                                </tr>


                                </tbody>
                            </table>
                        </div>
                        <hr class="line-header"/>
                        <div class="block-main-content">


                <span class="link-pad-left padding10 class-title-list-link">
                    <a href="/{{ getRegionSlug($printresult->lottery_region) }}/{{ getRegionLotoSlug($printresult->lottery_region) }}" >Lô tô {{ $printresult->lottery_region }}</a>
                    <span> » </span>
                    <a href="/{{ getRegionSlug($printresult->lottery_region) }}/{{ getRegionLotoSlug($printresult->lottery_region) }}/kqlt{{ substr(strtolower($printresult->lottery_region),2,4) }}-{{ $dayName   }}" title="{{ $printresult->lottery_region }}  {{ $printresult->result_day_time->toDateTime()->format('l') }}" >Lô tô  {{ $printresult->lottery_region }} {{ engToVit($printresult->result_day_time->toDateTime()->format('l')) }} </a>


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

                                            if(count((array)$mainValue) == 1 && is_array($mainValue)) {
                                                $fullValues[] = array_values((array) $mainValue);

                                            } else if ($keyValues == 'Mã ĐB') {

                                            }else if ($keyValues == 'G.DB') {
                                                $fullValues[] = array_values((array) $mainValue);
                                            } else {
                                                $fullValues[] = array_values((array) $mainValue);
                                            }
                                        }
                                    }

                                    foreach ($fullValues as $index=>$values) {
                                        foreach ($values as $in=>$val){

                                        //print_r($val);
                                           // array_push($newFullValues,array_values((array)$val));
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

                {{-- {{ $printresult->links() }}--}}

            @else
                <div class="block" id="xsmb-1">

                    <div class="block-main-content">
                        <table class="table table-bordered table-striped table-xsmb">
                            <tbody>
                            <tr>
                                <td style="width: 15%">  Mã ĐB</td>
                                <td class="text-center">
                                    <span class="col-xs-4 special-code div-horizontal">...</span>
                                    <span class="col-xs-4 special-code div-horizontal">...</span>
                                    <span class="col-xs-4 special-code div-horizontal">...</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="ĐB"> G.ĐB</td>
                                <td class="text-center">
                                    <span class="col-xs-12 number-black-bold div-horizontal">...</span>                                            </td>
                            </tr>

                            <tr>
                                <td> G.1</td>
                                <td class="text-center">
                                    <span class="col-xs-12 number-black-bold div-horizontal">...</span>                                               </td>
                            </tr>

                            <tr>
                                <td> G.2</td>
                                <td class="text-center">
                                    <span class="col-xs-6 number-black-bold div-horizontal">...</span><span class="col-xs-6 number-black-bold div-horizontal">...</span>                                                            </td>
                            </tr>

                            <tr>
                                <td> G.3</td>
                                <td class="text-center">
                                    <span class="number-black-bold div-horizontal"><span class="col-xs-4">...</span><span class="col-xs-4">...</span><span class="col-xs-4">...</span><span class="col-xs-4">...</span><span class="col-xs-4">...</span><span class="col-xs-4">...</span> </span>

                                </td>
                            </tr>
                            <tr>
                                <td> G.4</td>
                                <td class="text-center">
                                    <span class="number-black-bold div-horizontal"><span class="col-xs-3">...</span><span class="col-xs-3">...</span><span class="col-xs-3">...</span><span class="col-xs-3">...</span> </span>
                                </td>
                            </tr>
                            <tr>
                                <td> G.5</td>
                                <td class="text-center">
                                    <span class="number-black-bold div-horizontal"><span class="col-xs-4">...</span><span class="col-xs-4">...</span><span class="col-xs-4">...</span><span class="col-xs-4">...</span><span class="col-xs-4">...</span><span class="col-xs-4">...</span> </span>
                                </td>
                            </tr>
                            <tr>
                                <td> G.6</td>
                                <td class="text-center">
                                    <span class="number-black-bold div-horizontal"><span class="col-xs-4">...</span><span class="col-xs-4">...</span><span class="col-xs-4">...</span> </span>
                                </td>
                            </tr>
                            <tr>
                                <td class="ĐB"> G.7</td>
                                <td class="text-center">
                                    <span class="number-black-bold div-horizontal "><span class="col-xs-3">...</span><span class="col-xs-3">...</span><span class="col-xs-3">...</span><span class="col-xs-3">...</span>  </span>
                                </td>
                            </tr>


                            </tbody>
                        </table>
                    </div>
                    <hr class="line-header">
                    <div class="block-main-content">


                <span class="link-pad-left padding10 class-title-list-link">
                    <a href="/ket-qua-xsmb/ket-qua-lo-to-mien-bac">Lô tô XSMB</a>
                    <span> » </span>
                    <a href="/ket-qua-xsmb/ket-qua-lo-to-mien-bac/kqltmb-{{ getDaySlug($mytime->toDateTime()->format('l')) }}" title="XSMB  {{ engToVit($mytime->toDateTime()->format('l')) }}">Lô tô  XSMB {{ engToVit($mytime->toDateTime()->format('l')) }} </a>


                </span>

                        <table class="table table-bordered table-loto" style="margin-bottom: 0;">
                            <tbody><tr>
                                <th class="col-md-2" style="width: 10%;">Đầu</th>
                                <th class="col-md-4">Lô Tô</th>
                            </tr>
                            <tr>
                                <td class="text-center">0</td>
                                <td>
                                    --                </td>
                            </tr>
                            <tr>
                                <td class="text-center">1</td>
                                <td>
                                    --                </td>
                            </tr>
                            <tr>
                                <td class="text-center">2</td>
                                <td>
                                    --               </td>
                            </tr>
                            <tr>
                                <td class="text-center">3</td>
                                <td>
                                    --                </td>
                            </tr>
                            <tr>
                                <td class="text-center">4</td>
                                <td>
                                    --                </td>
                            </tr>
                            <tr>
                                <td class="text-center">5</td>
                                <td>
                                    --               </td>
                            </tr>
                            <tr>
                                <td class="text-center">6</td>
                                <td>
                                    --                </td>
                            </tr>
                            <tr>
                                <td class="text-center">7</td>
                                <td>
                                    --               </td>
                            </tr>
                            <tr>
                                <td class="text-center">8</td>
                                <td>
                                    --                </td>
                            </tr>
                            <tr>
                                <td class="text-center">9</td>
                                <td>
                                    --                </td>
                            </tr>

                            </tbody></table>

                    </div>


                </div>
            @endif

        </div>




</div>


<div id="post-data" style="    text-align: center;" class="col-xs-12 col-sm-12 col-md-2 xsmt">
    <input type="button" value="<< Update"/>
</div>

<div id="post-data" class="col-xs-12 col-sm-12 col-md-5">
    <div style="border: 1px solid #060606;min-height: 163px;text-align: center;" class="margin-40  margin-b-20">
        <div style="width: 100%" class="block-main-heading">
            @php $mytime = Carbon\Carbon::now(); @endphp
            <h1>Nhập Kết quả trực tiếp {{ $region }}</h1>
        </div>

        <form method="post" name="startCrone" action="/admin/cron/tt/{{ strtolower($region) }}">
            <input type="hidden" name="region" value="{{ $region }}">
            @csrf
            <div id="post-data" class="col-md-4">
                <button type="submit" class="start-stop-button">Start / Stop</button>
            </div>
            <div id="post-data" class="col-md-8">
                <span> Interval (minutes) </span>
                <span class="u5596_div"> 1 </span>
                <br>
                <span class=""> From </span>
                <span class="u5596_div"> 17:10 </span> <span>To</span> <span class="u5596_div"> 18:10 </span>
                <br>
                <span style="vertical-align: middle;"><input type="checkbox" name="autosave" value="1">Auto save to DB</span>
            </div>
        </form>


    </div>

        <div class="col-xs-5">

            @if($content->count() > 0)
                @php $g = 1; @endphp
                @foreach($content as $printresult)
                    {{-- {{ print_r($printresult) }}--}}
                    <div class="block" id='xsmb-{{ $g }}'>


                        <div class="block-main-content">
                            <table class="table table-bordered table-striped table-xsmb">
                                <tbody>
                                <tr>
                                    <td style="width: 15%"> @php $prize_1 = json_decode($printresult->prize_1); @endphp {{ key($prize_1) }}</td>
                                    <td class="text-center">
                                        @foreach($prize_1->{key($prize_1)} as $k=>$p1)
                                            @if(count((array)$prize_1->{key($prize_1)}) > 3 )
                                                <span class="col-xs-3 special-code div-horizontal">{{ $p1 }}</span>
                                            @else
                                                <span class="col-xs-4 special-code div-horizontal">{{ $p1 }}</span>
                                            @endif
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td class="ĐB">@php $prize_2 = json_decode($printresult->prize_2);  @endphp {{ key($prize_2) }}</td>
                                    <td class="text-center">
                                        @if(count((array) $prize_2) == 1)
                                            @foreach($prize_2 as $k=>$p2)
                                                @php if( is_array($p2) && count((array)$p2) > 0){ foreach ($p2 as $p21) { echo "<span class='col-xs-12 number-black-bold div-horizontal' >$p21</span>"; } }else{ echo "<span class='col-xs-12 number-black-bold div-horizontal' >$p2</span>"; }  @endphp
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
                                                @php if(is_array($p3) && count((array)$p3) > 0 ){ foreach ($p3 as $p31) { echo "<span class='col-xs-12 number-black-bold div-horizontal' >$p31</span>"; } }else{ echo "<span class='col-xs-12 number-black-bold div-horizontal' >$p3</span>"; }  @endphp
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
                                                <span class="number-black-bold div-horizontal">@php if(count((array)$p4) > 0 ){ foreach ($p4 as $p41) { echo "<span class='col-xs-6' >$p41</span>"; } }  @endphp  </span>
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
                                                <span class="number-black-bold div-horizontal">@php if(count((array)$p5) > 0 ){ foreach ($p5 as $p51) { echo "<span class='col-xs-4' >$p51</span>"; } }  @endphp </span>
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
                                                <span class="number-black-bold div-horizontal">@php if(count((array)$p6) > 0 ){ foreach ($p6 as $p61) { echo "<span class='col-xs-3' >$p61</span>"; } }  @endphp </span>
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
                                                <span class="number-black-bold div-horizontal">@php if(count((array)$p7) > 0 ){ foreach ($p7 as $p71) { echo "<span class='col-xs-4' >$p71</span>"; } }  @endphp </span>
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
                                                <span class="number-black-bold div-horizontal">@php if(count((array)$p8) > 0 ){ foreach ($p8 as $p81) { echo "<span class='col-xs-4' >$p81</span>"; } }  @endphp </span>
                                            @endforeach
                                        @else
                                            @foreach($prize_8->{key($prize_8)} as $k=>$p8)
                                                <span class="number-black-bold div-horizontal">{{ $p8 }} </span>
                                            @endforeach
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="ĐB">@php $prize_9 = json_decode($printresult->prize_9);   @endphp {{ key($prize_9) }}</td>
                                    <td class="text-center">
                                        @if(count((array) $prize_9) <= 1)
                                            @foreach($prize_9 as $k=>$p9)
                                                <span class="number-black-bold div-horizontal ">@php if(count((array)$p9) > 0 ){ foreach ($p9 as $p91) { echo "<span class='col-xs-3' >$p91</span>"; } }  @endphp  </span>
                                            @endforeach
                                        @else
                                            @foreach($prize_9->{key($prize_9)} as $k=>$p9)
                                                <span class="number-black-bold div-horizontal ">{{ $p9 }} </span>
                                            @endforeach
                                        @endif
                                    </td>
                                </tr>


                                </tbody>
                            </table>
                        </div>
                        <hr class="line-header"/>
                        <div class="block-main-content">


                <span class="link-pad-left padding10 class-title-list-link">
                    <a href="/{{ getRegionSlug($printresult->lottery_region) }}/{{ getRegionLotoSlug($printresult->lottery_region) }}" >Lô tô {{ $printresult->lottery_region }}</a>
                    <span> » </span>
                    <a href="/{{ getRegionSlug($printresult->lottery_region) }}/{{ getRegionLotoSlug($printresult->lottery_region) }}/kqlt{{ substr(strtolower($printresult->lottery_region),2,4) }}-{{ $dayName   }}" title="{{ $printresult->lottery_region }}  {{ $printresult->result_day_time->toDateTime()->format('l') }}" >Lô tô  {{ $printresult->lottery_region }} {{ engToVit($printresult->result_day_time->toDateTime()->format('l')) }} </a>


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

                                            if(count((array)$mainValue) == 1 && is_array($mainValue)) {
                                                $fullValues[] = array_values((array) $mainValue);

                                            } else if ($keyValues == 'Mã ĐB') {

                                            }else if ($keyValues == 'G.DB') {
                                                $fullValues[] = array_values((array) $mainValue);
                                            } else {
                                                $fullValues[] = array_values((array) $mainValue);
                                            }
                                        }
                                    }

                                    foreach ($fullValues as $index=>$values) {
                                        foreach ($values as $in=>$val){

                                        //print_r($val);
                                           // array_push($newFullValues,array_values((array)$val));
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

                {{-- {{ $printresult->links() }}--}}

            @else
                <div class="block" id="xsmb-1">

                    <div class="block-main-content">
                        <table class="table table-bordered table-striped table-xsmb">
                            <tbody>
                            <tr>
                                <td style="width: 15%">  Mã ĐB</td>
                                <td class="text-center">
                                    <span class="col-xs-4 special-code div-horizontal">...</span>
                                    <span class="col-xs-4 special-code div-horizontal">...</span>
                                    <span class="col-xs-4 special-code div-horizontal">...</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="ĐB"> G.ĐB</td>
                                <td class="text-center">
                                    <span class="col-xs-12 number-black-bold div-horizontal">...</span>                                            </td>
                            </tr>

                            <tr>
                                <td> G.1</td>
                                <td class="text-center">
                                    <span class="col-xs-12 number-black-bold div-horizontal">...</span>                                               </td>
                            </tr>

                            <tr>
                                <td> G.2</td>
                                <td class="text-center">
                                    <span class="col-xs-6 number-black-bold div-horizontal">...</span><span class="col-xs-6 number-black-bold div-horizontal">...</span>                                                            </td>
                            </tr>

                            <tr>
                                <td> G.3</td>
                                <td class="text-center">
                                    <span class="number-black-bold div-horizontal"><span class="col-xs-4">...</span><span class="col-xs-4">...</span><span class="col-xs-4">...</span><span class="col-xs-4">...</span><span class="col-xs-4">...</span><span class="col-xs-4">...</span> </span>

                                </td>
                            </tr>
                            <tr>
                                <td> G.4</td>
                                <td class="text-center">
                                    <span class="number-black-bold div-horizontal"><span class="col-xs-3">...</span><span class="col-xs-3">...</span><span class="col-xs-3">...</span><span class="col-xs-3">...</span> </span>
                                </td>
                            </tr>
                            <tr>
                                <td> G.5</td>
                                <td class="text-center">
                                    <span class="number-black-bold div-horizontal"><span class="col-xs-4">...</span><span class="col-xs-4">...</span><span class="col-xs-4">...</span><span class="col-xs-4">...</span><span class="col-xs-4">...</span><span class="col-xs-4">...</span> </span>
                                </td>
                            </tr>
                            <tr>
                                <td> G.6</td>
                                <td class="text-center">
                                    <span class="number-black-bold div-horizontal"><span class="col-xs-4">...</span><span class="col-xs-4">...</span><span class="col-xs-4">...</span> </span>
                                </td>
                            </tr>
                            <tr>
                                <td class="ĐB"> G.7</td>
                                <td class="text-center">
                                    <span class="number-black-bold div-horizontal "><span class="col-xs-3">...</span><span class="col-xs-3">...</span><span class="col-xs-3">...</span><span class="col-xs-3">...</span>  </span>
                                </td>
                            </tr>


                            </tbody>
                        </table>
                    </div>
                    <hr class="line-header">
                    <div class="block-main-content">


                <span class="link-pad-left padding10 class-title-list-link">
                    <a href="/ket-qua-xsmb/ket-qua-lo-to-mien-bac">Lô tô XSMB</a>
                    <span> » </span>
                    <a href="/ket-qua-xsmb/ket-qua-lo-to-mien-bac/kqltmb-{{ getDaySlug($mytime->toDateTime()->format('l')) }}" title="XSMB  {{ engToVit($mytime->toDateTime()->format('l')) }}">Lô tô  XSMB {{ engToVit($mytime->toDateTime()->format('l')) }} </a>


                </span>

                        <table class="table table-bordered table-loto" style="margin-bottom: 0;">
                            <tbody><tr>
                                <th class="col-md-2" style="width: 10%;">Đầu</th>
                                <th class="col-md-4">Lô Tô</th>
                            </tr>
                            <tr>
                                <td class="text-center">0</td>
                                <td>
                                    --                </td>
                            </tr>
                            <tr>
                                <td class="text-center">1</td>
                                <td>
                                    --                </td>
                            </tr>
                            <tr>
                                <td class="text-center">2</td>
                                <td>
                                    --               </td>
                            </tr>
                            <tr>
                                <td class="text-center">3</td>
                                <td>
                                    --                </td>
                            </tr>
                            <tr>
                                <td class="text-center">4</td>
                                <td>
                                    --                </td>
                            </tr>
                            <tr>
                                <td class="text-center">5</td>
                                <td>
                                    --               </td>
                            </tr>
                            <tr>
                                <td class="text-center">6</td>
                                <td>
                                    --                </td>
                            </tr>
                            <tr>
                                <td class="text-center">7</td>
                                <td>
                                    --               </td>
                            </tr>
                            <tr>
                                <td class="text-center">8</td>
                                <td>
                                    --                </td>
                            </tr>
                            <tr>
                                <td class="text-center">9</td>
                                <td>
                                    --                </td>
                            </tr>

                            </tbody></table>

                    </div>


                </div>
            @endif




</div>
@stop
