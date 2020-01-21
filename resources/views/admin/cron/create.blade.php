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
    <div class="row">
        <div class="col-12">

            <br>
            <div id="post-data" class="col-xs-12 col-sm-12 col-md-5 xsmt">
                <div style="border: 1px solid #060606;min-height: 200px;text-align: center;" class="margin-40  margin-b-20">
                    <div style="width: 100%" class="block-main-heading">
                        @php $mytime = Carbon\Carbon::now(); @endphp
                        <h1>Nhập Kết quả trực tiếp {{ $region }}</h1>
                    </div>

                    <div class="clock" data-time="17-15-00" ></div>

                </div>


                    <div class="col-xs-6 {{ $region }}">
                        @if(count($content) == 0)
                            @php $g = 1;  $tr ='<tr>'; @endphp
                            @foreach($content as $key=>$printresult)
                                {{--{{ $key }}--}}
                                @php $date = $key; @endphp
                                @php    $th ='';
                                    $td1 = '';
                                    $td2 = '';
                                    $td3 = '';
                                    $td4 = '';
                                    $td5 = '';
                                    $td6 = '';
                                    $td7 = '';
                                    $td8 = '';
                                    $td9 = '';
                                    $td10 = '';
                                    $tdr1 = '';
                                    $tdr2 = '';
                                    $boards = [];
                                    $boards1 = '';
                                    $boards2 = '';
$gh = count($content[$key]);
                                @endphp

                                @foreach($content[$key] as $g=>$lot)

                                    @php
                                        if($lot["lottery_region"] == 'XSMT'){
                                  $title = "Kết Quả Xổ số miền Trung";
              $th .= '<th class="text-center"><a href="/ket-qua-xsmt/kq'.strtolower($lot["lottery_region"]).'-'.getCompanySlug($lot["lottery_company"]).'" title="Xổ số '.$lot["lottery_company"].'">'. getCompanyName($lot["lottery_company"]).'</a></th>';
                                          }elseif ($lot["lottery_region"] == 'XSMT'){
          $title = "Kết Quả Xổ số miền Nam";
              $th .= '<th class="text-center"><a href="/ket-qua-xsmt/kq'.strtolower($lot["lottery_region"]).'-'.getCompanySlug($lot["lottery_company"]).'" title="Xổ số '.$lot["lottery_company"].'">'. getCompanyName($lot["lottery_company"]).'</a></th>';
                                          }

                                    @endphp
                                    @php $prize_1 = json_decode($lot['prize_1']); @endphp
                                    @php $prize_2 = json_decode($lot['prize_2']); @endphp
                                    @php $prize_3 = json_decode($lot['prize_3']); @endphp
                                    @php $prize_4 = json_decode($lot['prize_4']); @endphp
                                    @php $prize_5 = json_decode($lot['prize_5']); @endphp
                                    @php $prize_6 = json_decode($lot['prize_6']); @endphp
                                    @php $prize_7 = json_decode($lot['prize_7']); @endphp
                                    @php $prize_8 = json_decode($lot['prize_8']); @endphp
                                    @php $prize_9 = json_decode($lot['prize_9']); @endphp
                                    @php $board = json_decode($lot['board']); @endphp

                                    @php $td2 .= '<td class="text-center">'; @endphp
                                    @foreach($prize_1->{key($prize_1)} as $k=>$p1)
                                        @php $td2 .= '<span class=" number-black-bold div-horizontal">'.$p1.'</span></br>'; @endphp
                                    @endforeach
                                    @php $td2 .= '</td>'; @endphp

                                    @php $td3 .= '<td class="text-center">'; @endphp
                                    @foreach($prize_2->{key($prize_2)} as $k=>$p2)
                                        @php $td3 .= '<span class=" number-black-bold div-horizontal">'.$p2.'</span></br>'; @endphp
                                    @endforeach
                                    @php $td3 .= '</td>'; @endphp

                                    @php $td4 .= '<td class="text-center">'; @endphp
                                    @foreach($prize_3->{key($prize_3)} as $k=>$p3)

                                        @php $td4 .= '<span class=" number-black-bold div-horizontal">'.$p3.'</span></br>'; @endphp
                                    @endforeach
                                    @php $td4 .= '</td>'; @endphp

                                    @php $td5 .= '<td class="text-center">'; @endphp
                                    @foreach($prize_4->{key($prize_4)} as $k=>$p4)

                                        @php $td5 .= '<span class=" number-black-bold div-horizontal">'.$p4.'</span></br>'; @endphp
                                    @endforeach
                                    @php $td5 .= '</td>'; @endphp

                                    @php $td6 .= '<td class="text-center">'; @endphp
                                    @foreach($prize_5->{key($prize_5)} as $k=>$p5)

                                        @php $td6 .= '<span class=" number-black-bold div-horizontal">'.$p5.'</span></br>'; @endphp
                                    @endforeach
                                    @php $td6 .= '</td>'; @endphp

                                    @php $td7 .= '<td class="text-center">'; @endphp
                                    @foreach($prize_6->{key($prize_6)} as $k=>$p6)

                                        @php $td7 .= '<span class=" number-black-bold div-horizontal">'.$p6.'</span></br>'; @endphp
                                    @endforeach
                                    @php $td7 .= '</td>'; @endphp

                                    @php $td8 .= '<td class="text-center">'; @endphp
                                    @foreach($prize_7->{key($prize_7)} as $k=>$p7)

                                        @php $td8 .= '<span class=" number-black-bold div-horizontal">'.$p7.'</span></br>'; @endphp
                                    @endforeach
                                    @php $td8 .= '</td>'; @endphp

                                    @php $td9 .= '<td class="text-center">'; @endphp
                                    @foreach($prize_8->{key($prize_8)} as $k=>$p8)

                                        @php $td9 .= '<span class=" number-black-bold div-horizontal">'.$p8.'</span></br>'; @endphp
                                    @endforeach
                                    @php $td9 .= '</td>'; @endphp

                                    @php $td10 .= '<td class="text-center">'; @endphp
                                    @foreach($prize_9->{key($prize_9)} as $k=>$p9)

                                        @php $td10 .= '<span class=" number-black-bold div-horizontal">'.$p9.'</span></br>'; @endphp
                                    @endforeach
                                    @php $td10 .= '</td>'; @endphp

                                    @if($board)
                                        @php $boardRes = $board @endphp

                                        @foreach($boardRes as $ke=>$bingoData)
                                            @php  $boards[$g][] = $bingoData; @endphp
                                        @endforeach

                                    @endif

                                    @php $td1 = '<td class="'.key($prize_1).'" style="width: 15%">'.key($prize_1).'</td>'; @endphp
                                    @php $tdr1 = '<td class="'.key($prize_2).'" style="width: 15%">'.key($prize_2).'</td>'; @endphp
                                    @php $tdr2 = '<td class="'.key($prize_3).'" style="width: 15%">'.key($prize_3).'</td>'; @endphp
                                    @php $tdr3 = '<td class="'.key($prize_4).'" style="width: 15%">'.key($prize_4).'</td>'; @endphp
                                    @php $tdr4 = '<td class="'.key($prize_5).'" style="width: 15%">'.key($prize_5).'</td>'; @endphp
                                    @php $tdr5 = '<td class="'.key($prize_6).'" style="width: 15%">'.key($prize_6).'</td>'; @endphp
                                    @php $tdr6 = '<td class="'.key($prize_7).'" style="width: 15%">'.key($prize_7).'</td>'; @endphp
                                    @php $tdr7 = '<td class="'.key($prize_8).'" style="width: 15%">'.key($prize_8).'</td>'; @endphp
                                    @php $tdr8 = '<td class="'.key($prize_9).'" style="width: 15%">'.key($prize_9).'</td>'; @endphp

                                @endforeach

                                @php $current = current($printresult);  @endphp

                                <div class="block" id='xsmb-{{ $g }}'>
                                    <div class="block-main-heading">
                                        <h1>{{ $title }} ({{ $current['lottery_region'] }}) </h1>
                                    </div>
                                    <div class="list-link">
                                        <h2 class="class-title-list-link">
                                            @php $dayName = $current['day']; $dayName = getDaySlug($dayName); $dateexp  = explode('/',$current['result_day_time']); $dateexp = implode('-',$dateexp); @endphp

                                            <a href="/{{ getRegionSlug($current['lottery_region']) }}" title="{{ $current['lottery_region'] }}">{{ $current['lottery_region'] }}</a><span> » </span>
                                            <a href="/{{ getRegionSlug($current['lottery_region']) }}/kq{{ strtolower($current['lottery_region']) }}-{{$dayName}}" title="{{ $current['lottery_region'] }} {{ $current['day'] }}" >{{ $current['lottery_region'] }} {{ engToVit($current['day']) }} </a><span> » </span>
                                            <a href="/{{ getRegionSlug($current['lottery_region']) }}/kq{{ strtolower($current['lottery_region']) }}-ngay-{{ $dateexp }}" title="{{ $current['lottery_region'] }}  {{ $current['day'] }}" >  {{ $current['lottery_region'] }} {{ $current['result_day_time'] }}</a>


                                        </h2>
                                    </div>
                                    <div class="block-main-content">
                                        <table class="table table-bordered table-striped table-xsmt text-table livetn3">
                                            <thead>
                                            <tr>
                                                <th class="text-center">Giải</th>
                                                @php echo $th; @endphp
                                            </tr>
                                            </thead>
                                            <tbody>

                                            <tr>
                                                @php echo $td1; @endphp
                                                @php echo $td2; @endphp
                                            </tr>

                                            <tr>
                                                @php echo $tdr1; @endphp

                                                @php echo $td3; @endphp
                                            </tr>

                                            <tr>
                                                @php echo $tdr2; @endphp

                                                @php echo $td4; @endphp
                                            </tr>

                                            <tr>
                                                @php echo $tdr3; @endphp

                                                @php echo $td5; @endphp
                                            </tr>

                                            <tr>
                                                @php echo $tdr4; @endphp

                                                @php echo $td6; @endphp
                                            </tr>

                                            <tr>
                                                @php echo $tdr5; @endphp

                                                @php echo $td7; @endphp
                                            </tr>

                                            <tr>
                                                @php echo $tdr6; @endphp

                                                @php echo $td8; @endphp
                                            </tr>

                                            <tr>
                                                @php echo $tdr7; @endphp

                                                @php echo $td9; @endphp
                                            </tr>

                                            <tr>
                                                @php echo $tdr8; @endphp

                                                @php echo $td10; @endphp
                                            </tr>



                                            </tbody>
                                        </table>

                                    </div>
                                    <hr class="line-header"/>



                                    <div class="block-main-content view-loto">

                                        <p class="padding10">
                                            <a  href="/{{ getRegionSlug($current['lottery_region']) }}/{{ getRegionLotoSlug($current['lottery_region']) }}" >Lô tô {{ $current['lottery_region'] }}</a><span> » </span>
                                            <a href="/{{ getRegionSlug($current['lottery_region']) }}/{{ getRegionLotoSlug($current['lottery_region']) }}/kqlt{{ substr(strtolower($current['lottery_region']),2,4) }}-{{ $dayName   }}" title="{{ $current['lottery_region'] }}  {{ $current['day'] }}">Lô tô  {{ $current['lottery_region'] }} {{ engToVit($current['day']) }} </a>

                                        </p>
                                        <table class="table table-bordered table-loto">
                                            <tbody>
                                            <tr>
                                                <th class="col-md-2" style="width: 10%;">Đầu</th>

                                                @php echo $th @endphp
                                            </tr>

                                            @php $value = []; @endphp
                                            @php

                                                for($m = 0; $m < 10; $m++)
                                                {
                                                  echo "<tr>";
                                                  echo "<td class='show_center'>".$m."</td>";
                                                     foreach($boards as $kk=>$bb)
                                                     {
                                                         echo "<td>".$boards[$kk][$m]."</td>";
                                                     }
                                                     echo "</tr>";
                                                 }
                                            @endphp

                                            </tbody></table>
                                    </div>
                                </div>
                                @php $g++; @endphp
                            @endforeach
                        @else
                            <div style="border: 1px solid #000000;" class="block remove-margin1" id="xsmb-2">

                                <div class="block-main-content">
                                    <table class="table table-bordered table-striped table-xsmt text-table livetn3">
                                        <thead>
                                        <tr>
                                            <th class="text-center">Giải</th>

                                            @foreach($companies as $comp)
                                                <th class="text-center"><a href="/ket-qua-xsmt/kqxsmt-{{ $comp->lottery_company_slug }}" title="Xổ số XSBTH">{{ $comp->lottery_company_names }}</a></th>
                                            @endforeach


                                        </tr>
                                        </thead>
                                        <tbody>
                                        @for($i=9;$i >= 1;$i--)
                                            <tr>
                                                @if($i == 1)
                                                    <td class="ĐB" style="width: 15%">ĐB</td>
                                                @else
                                                    <td class="G.{{ $i }}" style="width: 15%">G.{{ $i-1 }}</td>
                                                @endif

                                                @for($j=1;$j<=$companies->count();$j++)
                                                    <td class="text-center">
                                                        @if($i == 7)
                                                            <span class=" number-black-bold div-horizontal">...</span><br>
                                                            <span class=" number-black-bold div-horizontal">...</span><br>
                                                            <span class=" number-black-bold div-horizontal">...</span><br>
                                                        @elseif($i == 5)
                                                            <span class=" number-black-bold div-horizontal">...</span><br>
                                                            <span class=" number-black-bold div-horizontal">...</span><br>
                                                            <span class=" number-black-bold div-horizontal">...</span><br>
                                                            <span class=" number-black-bold div-horizontal">...</span><br>
                                                            <span class=" number-black-bold div-horizontal">...</span><br>
                                                            <span class=" number-black-bold div-horizontal">...</span><br>
                                                            <span class=" number-black-bold div-horizontal">...</span><br>
                                                        @elseif($i == 4)
                                                            <span class=" number-black-bold div-horizontal">...</span><br>
                                                            <span class=" number-black-bold div-horizontal">...</span><br>

                                                        @else
                                                            <span class=" number-black-bold div-horizontal">...</span><br>

                                                        @endif
                                                    </td>
                                                @endfor
                                                {{-- <td class="text-center"><span class=" number-black-bold div-horizontal">69</span><br></td>
                                                 <td class="text-center"><span class=" number-black-bold div-horizontal">91</span><br></td>
                                                 <td class="text-center"><span class=" number-black-bold div-horizontal">70</span><br></td>--}}
                                            </tr>
                                        @endfor



                                        </tbody>
                                    </table>

                                </div>
                                <hr class="line-header">




                                <div class="block-main-content view-loto">

                                    <p class="padding10">
                                        <a href="/ket-qua-xsmt/ket-qua-lo-to-mien-nam">Lô tô XSMT</a><span> » </span>
                                        <a href="/ket-qua-xsmt/ket-qua-lo-to-mien-nam/kqltmn-thu-nam" title="XSMT  Thursday">Lô tô  XSMT Thứ năm </a>

                                    </p>
                                    <table class="table table-bordered table-loto">
                                        <tbody>
                                        <tr>
                                            <th class="col-md-2" style="width: 10%;">Đầu</th>
                                            @foreach($companies as $comp)
                                                <th class="text-center"><a href="/ket-qua-xsmn/kqxsmn-{{ $comp->lottery_company_slug }}" title="Xổ số {{ $comp->lottery_company }}">{{ $comp->lottery_company_names }}</a></th>


                                            @endforeach
                                        </tr>
                                        @for($i=0;$i < 9;$i++)
                                            <tr>
                                                <td class="show_center">{{ $i }}</td>
                                                @for($j=1;$j<=$companies->count();$j++)


                                                    <td>--</td>


                                                @endfor
                                            </tr>
                                        @endfor



                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endif

                    </div>




            </div>


            <div id="post-data" style="    text-align: center;" class="col-xs-12 col-sm-12 col-md-2 xsmt">
                    <input type="button" value="<< Update"/>
            </div>


            <div id="post-data" class="col-xs-12 col-sm-12 col-md-5 xsmt">
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


                    <div class="col-xs-6 {{ $region }}">
                        @if(count($content) > 0)
                            @php $g = 1;  $tr ='<tr>'; @endphp
                            @foreach($content as $key=>$printresult)
                            {{--    {{ $key }}--}}

                                @php  $date = $key; @endphp
                                @php    $th ='';
                                    $td1 = '';
                                    $td2 = '';
                                    $td3 = '';
                                    $td4 = '';
                                    $td5 = '';
                                    $td6 = '';
                                    $td7 = '';
                                    $td8 = '';
                                    $td9 = '';
                                    $td10 = '';
                                    $tdr1 = '';
                                    $tdr2 = '';
                                    $boards = [];
                                    $boards1 = '';
                                    $boards2 = '';
$gh = count($content[$key]);
                                @endphp

                                @foreach($content[$key] as $g=>$lot)

                                    @php
                                        if($lot["lottery_region"] == 'XSMT'){
                                  $title = "Kết Quả Xổ số miền Trung";
              $th .= '<th class="text-center"><a href="/ket-qua-xsmt/kq'.strtolower($lot["lottery_region"]).'-'.getCompanySlug($lot["lottery_company"]).'" title="Xổ số '.$lot["lottery_company"].'">'. getCompanyName($lot["lottery_company"]).'</a></th>';
                                          }elseif ($lot["lottery_region"] == 'XSMN'){
          $title = "Kết Quả Xổ số miền Nam";
              $th .= '<th class="text-center"><a href="/ket-qua-xsmt/kq'.strtolower($lot["lottery_region"]).'-'.getCompanySlug($lot["lottery_company"]).'" title="Xổ số '.$lot["lottery_company"].'">'. getCompanyName($lot["lottery_company"]).'</a></th>';
                                          }

                                    @endphp
                                    @php $prize_1 = json_decode($lot['prize_1']['G.8']); @endphp
                                    @php $prize_2 = json_decode($lot['prize_2']['G.7']); @endphp
                                    @php $prize_3 = json_decode($lot['prize_3']['G.6']); @endphp
                                    @php $prize_4 = json_decode($lot['prize_4']['G.5']); @endphp
                                    @php $prize_5 = json_decode($lot['prize_5']['G.4']); @endphp
                                    @php $prize_6 = json_decode($lot['prize_6']['G.3']); @endphp
                                    @php $prize_7 = json_decode($lot['prize_7']['G.2']); @endphp
                                    @php $prize_8 = json_decode($lot['prize_8']['G.1']); @endphp
                                    @php $prize_9 = json_decode($lot['prize_9']['ĐB']); @endphp
                                    @php $board = json_decode($lot['board']); @endphp

                                    @php $td2 .= '<td class="text-center">'; @endphp
                                    @foreach($prize_1 as $k=>$p1)
                                        @php $td2 .= '<span class=" number-black-bold div-horizontal">'.$p1.'</span></br>'; @endphp
                                    @endforeach
                                    @php $td2 .= '</td>'; @endphp

                                    @php $td3 .= '<td class="text-center">'; @endphp
                                    @foreach($prize_2 as $k=>$p2)
                                        @php $td3 .= '<span class=" number-black-bold div-horizontal">'.$p2.'</span></br>'; @endphp
                                    @endforeach
                                    @php $td3 .= '</td>'; @endphp

                                    @php $td4 .= '<td class="text-center">'; @endphp
                                    @foreach($prize_3 as $k=>$p3)

                                        @php $td4 .= '<span class=" number-black-bold div-horizontal">'.$p3.'</span></br>'; @endphp
                                    @endforeach
                                    @php $td4 .= '</td>'; @endphp

                                    @php $td5 .= '<td class="text-center">'; @endphp
                                    @foreach($prize_4 as $k=>$p4)

                                        @php $td5 .= '<span class=" number-black-bold div-horizontal">'.$p4.'</span></br>'; @endphp
                                    @endforeach
                                    @php $td5 .= '</td>'; @endphp

                                    @php $td6 .= '<td class="text-center">'; @endphp
                                    @foreach($prize_5 as $k=>$p5)

                                        @php $td6 .= '<span class=" number-black-bold div-horizontal">'.$p5.'</span></br>'; @endphp
                                    @endforeach
                                    @php $td6 .= '</td>'; @endphp

                                    @php $td7 .= '<td class="text-center">'; @endphp
                                    @foreach($prize_6 as $k=>$p6)

                                        @php $td7 .= '<span class=" number-black-bold div-horizontal">'.$p6.'</span></br>'; @endphp
                                    @endforeach
                                    @php $td7 .= '</td>'; @endphp

                                    @php $td8 .= '<td class="text-center">'; @endphp
                                    @foreach($prize_7 as $k=>$p7)

                                        @php $td8 .= '<span class=" number-black-bold div-horizontal">'.$p7.'</span></br>'; @endphp
                                    @endforeach
                                    @php $td8 .= '</td>'; @endphp

                                    @php $td9 .= '<td class="text-center">'; @endphp
                                    @foreach($prize_8 as $k=>$p8)

                                        @php $td9 .= '<span class=" number-black-bold div-horizontal">'.$p8.'</span></br>'; @endphp
                                    @endforeach
                                    @php $td9 .= '</td>'; @endphp

                                    @php $td10 .= '<td class="text-center">'; @endphp
                                    @foreach($prize_9 as $k=>$p9)

                                        @php $td10 .= '<span class=" number-black-bold div-horizontal">'.$p9.'</span></br>'; @endphp
                                    @endforeach
                                    @php $td10 .= '</td>'; @endphp

                                    @if($board)
                                        @php $boardRes = $board @endphp

                                        @foreach($boardRes as $ke=>$bingoData)
                                            @php  $boards[$g][] = $bingoData; @endphp
                                        @endforeach

                                    @endif

                                    @php $td1 = '<td class="G.8" style="width: 15%">G.8</td>'; @endphp
                                    @php $tdr1 = '<td class="G.7" style="width: 15%">G.7</td>'; @endphp
                                    @php $tdr2 = '<td class="G.6" style="width: 15%">G.6</td>'; @endphp
                                    @php $tdr3 = '<td class="G.5" style="width: 15%">G.5</td>'; @endphp
                                    @php $tdr4 = '<td class="G.4" style="width: 15%">G.4</td>'; @endphp
                                    @php $tdr5 = '<td class="G.3" style="width: 15%">G.3</td>'; @endphp
                                    @php $tdr6 = '<td class="G.2" style="width: 15%">G.2</td>'; @endphp
                                    @php $tdr7 = '<td class="G.1" style="width: 15%">G.1</td>'; @endphp
                                    @php $tdr8 = '<td class="ĐB" style="width: 15%">ĐB</td>'; @endphp

                                @endforeach

                                @php $current = $lot['day'];  @endphp

                                <div class="block" id='xsmb-{{ $g }}'>

                                    <div class="block-main-content">
                                        <table class="table table-bordered table-striped table-xsmt text-table livetn3">
                                            <thead>
                                            <tr>
                                                <th class="text-center">Giải</th>
                                                @php echo $th; @endphp
                                            </tr>
                                            </thead>
                                            <tbody>

                                            <tr>
                                                @php echo $td1; @endphp
                                                @php echo $td2; @endphp
                                            </tr>

                                            <tr>
                                                @php echo $tdr1; @endphp

                                                @php echo $td3; @endphp
                                            </tr>

                                            <tr>
                                                @php echo $tdr2; @endphp

                                                @php echo $td4; @endphp
                                            </tr>

                                            <tr>
                                                @php echo $tdr3; @endphp

                                                @php echo $td5; @endphp
                                            </tr>

                                            <tr>
                                                @php echo $tdr4; @endphp

                                                @php echo $td6; @endphp
                                            </tr>

                                            <tr>
                                                @php echo $tdr5; @endphp

                                                @php echo $td7; @endphp
                                            </tr>

                                            <tr>
                                                @php echo $tdr6; @endphp

                                                @php echo $td8; @endphp
                                            </tr>

                                            <tr>
                                                @php echo $tdr7; @endphp

                                                @php echo $td9; @endphp
                                            </tr>

                                            <tr>
                                                @php echo $tdr8; @endphp

                                                @php echo $td10; @endphp
                                            </tr>



                                            </tbody>
                                        </table>

                                    </div>
                                    <hr class="line-header"/>



                                    <div class="block-main-content view-loto">

                                        <p class="padding10">
                                            <a  href="/{{ getRegionSlug($lot['lottery_region']) }}/{{ getRegionLotoSlug($lot['lottery_region']) }}" >Lô tô {{ $lot['lottery_region'] }}</a><span> » </span>
                                            <a href="/{{ getRegionSlug($lot['lottery_region']) }}/{{ getRegionLotoSlug($lot['lottery_region']) }}/kqlt{{ substr(strtolower($lot['lottery_region']),2,4) }}-{{ $lot['day']   }}" title="{{ $lot['lottery_region'] }}  {{ $lot['day'] }}">Lô tô  {{ $lot['lottery_region'] }} {{ engToVit($lot['day']) }} </a>

                                        </p>
                                        <table class="table table-bordered table-loto">
                                            <tbody>
                                            <tr>
                                                <th class="col-md-2" style="width: 10%;">Đầu</th>

                                                @php echo $th @endphp
                                            </tr>

                                            @php $value = []; @endphp
                                            @php

                                                for($m = 0; $m < 10; $m++)
                                                {
                                                  echo "<tr>";
                                                  echo "<td class='show_center'>".$m."</td>";
                                                     foreach($boards as $kk=>$bb)
                                                     {
                                                         echo "<td>".$boards[$kk][$m]."</td>";
                                                     }
                                                     echo "</tr>";
                                                 }
                                            @endphp

                                            </tbody></table>
                                    </div>
                                </div>
                                @php $g++; @endphp
                            @endforeach
                        @else
                            <div style="border: 1px solid #000000;" class="block remove-margin1" id="xsmb-2">

                                <div class="block-main-content">
                                    <table class="table table-bordered table-striped table-xsmt text-table livetn3">
                                        <thead>
                                        <tr>
                                            <th class="text-center">Giải</th>

                                            @foreach($companies as $comp)
                                                <th class="text-center"><a href="/ket-qua-xsmt/kqxsmt-{{ $comp->lottery_company_slug }}" title="Xổ số XSBTH">{{ $comp->lottery_company_names }}</a></th>
                                            @endforeach


                                        </tr>
                                        </thead>
                                        <tbody>
                                        @for($i=9;$i >= 1;$i--)
                                            <tr>
                                                @if($i == 1)
                                                    <td class="ĐB" style="width: 15%">ĐB</td>
                                                @else
                                                    <td class="G.{{ $i }}" style="width: 15%">G.{{ $i-1 }}</td>
                                                @endif

                                                @for($j=1;$j<=$companies->count();$j++)
                                                    <td class="text-center">
                                                        @if($i == 7)
                                                            <span class=" number-black-bold div-horizontal">...</span><br>
                                                            <span class=" number-black-bold div-horizontal">...</span><br>
                                                            <span class=" number-black-bold div-horizontal">...</span><br>
                                                        @elseif($i == 5)
                                                            <span class=" number-black-bold div-horizontal">...</span><br>
                                                            <span class=" number-black-bold div-horizontal">...</span><br>
                                                            <span class=" number-black-bold div-horizontal">...</span><br>
                                                            <span class=" number-black-bold div-horizontal">...</span><br>
                                                            <span class=" number-black-bold div-horizontal">...</span><br>
                                                            <span class=" number-black-bold div-horizontal">...</span><br>
                                                            <span class=" number-black-bold div-horizontal">...</span><br>
                                                        @elseif($i == 4)
                                                            <span class=" number-black-bold div-horizontal">...</span><br>
                                                            <span class=" number-black-bold div-horizontal">...</span><br>

                                                        @else
                                                            <span class=" number-black-bold div-horizontal">...</span><br>

                                                        @endif
                                                    </td>
                                                @endfor
                                                {{-- <td class="text-center"><span class=" number-black-bold div-horizontal">69</span><br></td>
                                                 <td class="text-center"><span class=" number-black-bold div-horizontal">91</span><br></td>
                                                 <td class="text-center"><span class=" number-black-bold div-horizontal">70</span><br></td>--}}
                                            </tr>
                                        @endfor



                                        </tbody>
                                    </table>

                                </div>
                                <hr class="line-header">




                                <div class="block-main-content view-loto">

                                    <p class="padding10">
                                        <a href="/ket-qua-xsmt/ket-qua-lo-to-mien-nam">Lô tô XSMT</a><span> » </span>
                                        <a href="/ket-qua-xsmt/ket-qua-lo-to-mien-nam/kqltmn-thu-nam" title="XSMT  Thursday">Lô tô  XSMT Thứ năm </a>

                                    </p>
                                    <table class="table table-bordered table-loto">
                                        <tbody>
                                        <tr>
                                            <th class="col-md-2" style="width: 10%;">Đầu</th>
                                            @foreach($companies as $comp)
                                                <th class="text-center"><a href="/ket-qua-xsmn/kqxsmn-{{ $comp->lottery_company_slug }}" title="Xổ số {{ $comp->lottery_company }}">{{ $comp->lottery_company_names }}</a></th>


                                            @endforeach
                                        </tr>
                                        @for($i=0;$i < 9;$i++)
                                            <tr>
                                                <td class="show_center">{{ $i }}</td>
                                                @for($j=1;$j<=$companies->count();$j++)


                                                    <td>--</td>


                                                @endfor
                                            </tr>
                                        @endfor



                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endif

                    </div>




            </div>
        </div>

@stop

