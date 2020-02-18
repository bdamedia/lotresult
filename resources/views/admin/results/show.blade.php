@extends('adminlte::page')



@section('title', 'Edit News')



@section('content_header')
@section('css')

    <style>
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

        .table-bordered, .table-bordered > tbody > tr > td, .table-bordered > tbody > tr > th, .table-bordered > tfoot > tr > td, .table-bordered > tfoot > tr > th, .table-bordered > thead > tr > td, .table-bordered > thead > tr > th {
            border: 1px solid #ddd;
        }

        .number-black-bold {
            color: #000;
            font-size: 28px;
            font-weight: 700;
        }
        .list-link {
            background-color: rgba(255, 183, 0, 1);
            padding-bottom: 12px;
        }
        .class-title-list-link {
            font-size: 15px;
            margin: 0;
            text-align: center;
        }

        .list-link a, .table-loto th {
            color: #900;
        }

        #u129 .text {
            align-self: flex-end;
            padding: 2px 2px 2px 2px;
            box-sizing: border-box;
            width: 100%;
        }
        #u129_text {
            border-width: 0px;
            word-wrap: break-word;
            text-transform: none;
        }

        #u129 {
            border-width: 0px;
            text-align: center;
            border: 1px solid #cccccc;
            height: 43px;
            display: flex;
            font-family: 'Arial-BoldMT', 'Arial Bold', 'Arial';
            font-weight: 700;
            font-style: normal;
            color: #D9001B;
        }

        .table-xsmn tr:first-child td span, .table-xsmt tr:first-child td span, td.G.DB + td > span {
            color: red;
        }

        td.ĐB + td > span, td.ĐB + td + td > span, td.ĐB + td + td + td > span, td.ĐB + td + td + td + td > span {
            color: red;
        }

        .col-xs-1, .col-xs-10, .col-xs-11, .col-xs-12, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9, .dropdown-menu {
            float: left;
            position: relative;
            min-height: 1px;
            padding-right: 15px;
            padding-left: 15px;
        }

        table.table tbody tr td, table.table thead tr th {
            padding: 3px;
        }

    </style>
    @endsection
@section('js')
@endsection

@stop



@section('content')

        @if($data->lottery_region == 'XSMB' && $data->lottery_region == 'XSMN' && $data->lottery_region == 'XSMT')
        <div style="margin: 0 auto;" class="remove-margin block col-md-6" id='{{ $data->lottery_region }}'>
            <div class="block-main-heading">
                <h1>
                    @if($data->lottery_region == 'XSMN') {{ "Kết Quả Xổ số " }}  {{ getCompanyName($data->lottery_company) }} ({{ $data->lottery_company }})

                    @elseif($data->lottery_region == 'XSMT') {{ "Kết Quả Xổ số " }} {{ getCompanyName($data->lottery_company) }} ({{ $data->lottery_company }})

                    @elseif($data->lottery_region == 'XSMB') {{ "Kết Quả Xổ số " }} {{ getCompanyName($data->lottery_company) }} ({{ $data->lottery_company }})

                    @endif </h1>
            </div>
            <div class="list-link">
                <h2 class="class-title-list-link">
                    @php $dayName = $data->result_day_time->toDateTime()->format('l'); $dayName = getDaySlug($dayName); @endphp

                    <a href="/{{ getRegionSlug($data->lottery_region) }}" title="{{ $data->lottery_region }}" >{{ $data->lottery_region }}</a><span> » </span>
                    <a href="/{{ getRegionSlug($data->lottery_region) }}/kq{{ strtolower($data->lottery_region) }}-{{$dayName}}" title="{{ $data->lottery_region }} {{ engToVit($data->result_day_time->toDateTime()->format('l')) }}">{{ $data->lottery_region }} {{ engToVit($data->result_day_time->toDateTime()->format('l')) }}</a><span> » </span>
                    <a href="/{{ getRegionSlug($data->lottery_region) }}/kq{{ strtolower($data->lottery_region) }}-ngay-{{ $data->result_day_time->toDateTime()->format('d-m-Y') }}" title="{{ $data->lottery_region }}  {{ $data->result_day_time->toDateTime()->format('d/m/y') }}" >{{ $data->lottery_region }} {{ $data->result_day_time->toDateTime()->format('d/m/y') }}</a>

                </h2>
            </div>

            <div id="u129" class="ax_default box_2">
                <div id="u129_text" class="text">
                    <p><span><a href="/ket-qua-xsmn/kqxs-{{ getCompanySlug($data->lottery_company) }}-ngay-{{ $data->result_day_time->toDateTime()->format('d-m-Y') }}" title="{{ $data->lottery_region }}  {{ $data->result_day_time->toDateTime()->format('d/m/y') }}">Kết quả Xổ số {{ getCompanyName($data->lottery_company) }} {{ $data->result_day_time->toDateTime()->format('d/m/y') }}</a></span></p>
                </div>
            </div>

            <div class="block-main-content">
                <table class="table table-bordered table-striped table-xsmn">
                    <tbody>
                    <tr> @php $prize_1 = json_decode($data->prize_1); @endphp
                        <td class="ĐB {{ key($prize_1) }}" style="width: 15%">  {{ key($prize_1) }}</td>
                        <td class="text-center">
                            @foreach($prize_1->{key($prize_1)} as $k=>$p1)
                                <span class=" number-black-bold div-horizontal ">{{ $p1 }} </span>
                            @endforeach
                        </td>
                    </tr>

                    <tr> @php $prize_2 = json_decode($data->prize_2);   @endphp
                        <td class="{{ key($prize_2) }}" > {{ key($prize_2) }}</td>
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

                    <tr> @php $prize_3 = json_decode($data->prize_3);  @endphp
                        <td class="{{ key($prize_3) }}" > {{ key($prize_3) }}</td>
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

                    <tr> @php $prize_4 = json_decode($data->prize_4);  @endphp
                        <td class="{{ key($prize_4) }}" > {{ key($prize_4) }}</td>
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

                    <tr> @php $prize_5 = json_decode($data->prize_5);  @endphp
                        <td class="{{ key($prize_5) }}" > {{ key($prize_5) }}</td>
                        <td class="text-center">
                            @if(count((array) $prize_5) <= 1)
                                @foreach($prize_5 as $k=>$p5)
                                    <span class="number-black-bold div-horizontal">@php if(count((array) $p5) > 0 ){ $tp = 1; foreach ($p5 as $p51) { if($tp > 3){ echo "<span class='col-xs-3' >$p51</span>"; }else{ echo "<span class='col-xs-4' >$p51</span>";  } $tp++; } }  @endphp </span>
                                @endforeach

                            @else
                                @foreach($prize_5->{key($prize_5)} as $k=>$p5)
                                    <span class="number-black-bold div-horizontal">{{ $p5 }} </span>
                                @endforeach
                            @endif
                        </td>
                    </tr>

                    <tr>@php  $prize_6 = json_decode($data->prize_6);  @endphp
                        <td class="{{ key($prize_6) }}" > {{ key($prize_6) }}</td>
                        <td class="text-center">
                            @if(count((array) $prize_6) <= 1)
                                @foreach($prize_6 as $k=>$p6)
                                    <span class="number-black-bold div-horizontal">@php if(count((array) $p6) > 0 ){ foreach ($p6 as $p61) { echo "<span class='col-xs-6' >$p61</span>"; } }  @endphp  </span>
                                @endforeach
                            @else
                                @foreach($prize_6->{key($prize_6)} as $k=>$p6)
                                    <span class="number-black-bold div-horizontal">{{ $p6 }} </span>
                                @endforeach
                            @endif
                        </td>
                    </tr>

                    <tr> @php $prize_7 = json_decode($data->prize_7);  @endphp
                        <td class="{{ key($prize_7) }}" > {{ key($prize_7) }}</td>
                        <td class="text-center">
                            @if(count((array) $prize_7) <= 1)
                                @foreach($prize_7 as $k=>$p7)
                                    <span class="number-black-bold div-horizontal">@php if(count((array) $p7) > 0 ){ foreach ($p7 as $p71) { echo "<span class='col-xs-12' >$p71</span>"; } }  @endphp </span>
                                @endforeach
                            @else
                                @foreach($prize_7->{key($prize_7)} as $k=>$p7)
                                    <span class="number-black-bold div-horizontal">{{ $p7 }} </span>
                                @endforeach
                            @endif
                        </td>
                    </tr>

                    <tr> @php $prize_8 = json_decode($data->prize_8);   @endphp
                        <td class="{{ key($prize_8) }}" > {{ key($prize_8) }}</td>
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

                    <tr> @php $prize_9 = json_decode($data->prize_9);   @endphp
                        <td class="ĐB {{ key($prize_9) }}" > {{ key($prize_9) }}</td>
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



                    </tbody>
                </table>
            </div>
            <hr class="line-header"/>
            <div class="block-main-content">


            <span class="link-pad-left padding10 class-title-list-link">
                <a href="/{{ getRegionSlug($data->lottery_region) }}/{{ getRegionLotoSlug($data->lottery_region) }}" >Lô tô {{ $data->lottery_region }}</a> <span> » </span>
                                            <a href="/{{ getRegionSlug($data->lottery_region) }}/{{ getRegionLotoSlug($data->lottery_region) }}/kqlt{{ substr(strtolower($data->lottery_region),2,4) }}-{{ $dayName   }}" title="{{ $data->lottery_region }}  {{ $data->result_day_time->toDateTime()->format('l') }}">Lô tô  {{ $data->lottery_region }} {{ engToVit($data->result_day_time->toDateTime()->format('l')) }} </a>

                                          </span>

                <table class="table table-bordered table-loto" style="margin-bottom: 0;">
                    <tr>
                        <th class="col-md-2" style="width: 10%;">Đầu</th>
                        <th class="col-md-4">Lô Tô</th>
                    </tr>
                    @if($data->board)
                        @php $boardRes = json_decode($data->board) @endphp
                        @foreach($boardRes as $ke=>$bingoData)
                            <tr>
                                <td class="text-center">{{ $ke }}</td><td>{{ $bingoData }}</td>
                            </tr>
                        @endforeach
                    @endif

                </table>
            </div>

        </div>
    @elseif($data->lottery_region == 'Vietlott')

            @php $vietlottPower = 1; @endphp
            @php $vietlottMega = 1; @endphp
            @php $vietlott4d = 1; @endphp
            @php $vietlott3d = 1; @endphp
            @php $current = $lot =  $data->toArray();  @endphp

            @if($current['lottery_company'] == 'Power 6/55' && $vietlottPower == 1)

                @php  $title = "Xổ Số";
                $th = ''; @endphp
                @php $prize_1 = json_decode($lot['prize_1']); @endphp
                @php $prize_2 = json_decode($lot['prize_2']); @endphp
                @php $prize_3 = json_decode($lot['prize_3']); @endphp
                @php $prize_4 = json_decode($lot['prize_4']); @endphp
                @php $prize_5 = json_decode($lot['prize_5']); @endphp
                @php $prize_6 = json_decode($lot['prize_6']); @endphp
                @php $prize_7 = json_decode($lot['prize_7']); @endphp
                @php $prize_8 = json_decode($lot['prize_8']); @endphp
                @php $td2 = ''; $td3 = ''; $td4 = '';  $td5 = ''; $td6 = ''; $g= 'power' @endphp

                @php $board = json_decode($lot['board']); @endphp

                @php $td2 .= '<td class="text-center circle-no"><i></i><i></i><i></i><i></i><i></i><i></i></td>'; @endphp
                @foreach($prize_1->{key($prize_1)} as $k=>$p1)
                    @if($lot["lottery_company"] == 'XSMB')
                        @php $td2 .= '<td class="col-xs-4 special-code div-horizontal">'.$p1.'</td>'; @endphp
                    @else
                        @php $td2 .= '<td class="col-xs-3  div-horizontal">'.$p1.'</td>'; @endphp
                    @endif
                @endforeach
                @php $td2; @endphp

                @php $td3 .= '<td class="text-center circle-no special"><i></i><i></i><i></i><i></i><i></i><i></i></td>'; @endphp
                @if($lot["lottery_company"] == 'XSMB')
                    @php $td3 .= '<td class="col-xs-12  div-horizontal">'.$prize_2->{key($prize_2)}.'</td></br>'; @endphp
                @else
                    @foreach($prize_2->{key($prize_2)} as $k=>$p2)
                        @php $td3 .= '<td class="col-xs-3  div-horizontal">'.$p2.'</td>'; @endphp
                    @endforeach
                @endif

                @php $td3; @endphp

                @php $td4 .= '<td class="text-center circle-no"><i></i><i></i><i></i><i></i><i></i></td>'; @endphp
                @if($lot["lottery_company"] == 'XSMB')
                    @php $td4 .= '<td class="col-xs-12  div-horizontal">'.$prize_3->{key($prize_3)}.'</td></br>'; @endphp
                @else
                    @foreach($prize_3->{key($prize_3)} as $k=>$p3)
                        @php $td4 .= '<td class="col-xs-3  div-horizontal">'.$p3.'</td>'; @endphp
                    @endforeach
                @endif

                @php $td4 .= '</td>'; @endphp

                @php $td5 .= '<td class="text-center circle-no"><i></i><i></i><i></i><i></i>'; @endphp
                @foreach($prize_4->{key($prize_4)} as $k=>$p4)
                    @if($lot["lottery_company"] == 'XSMB')
                        @php $td5 .= '<td class="col-xs-6  div-horizontal">'.$p4.'</td>'; @endphp
                    @else
                        @php $td5 .= '<td class="col-xs-3  div-horizontal">'.$p4.'</td>'; @endphp
                    @endif
                @endforeach
                @php $td5 .= '</td>'; @endphp


                @php $td6 .= '<td class="text-center circle-no"><i></i><i></i><i></i>'; @endphp
                @foreach($prize_5->{key($prize_5)} as $k=>$p5)
                    @if($lot["lottery_company"] == 'XSMB')
                        @php $td6 .= '<td class="col-xs-6  div-horizontal">'.$p5.'</td>'; @endphp
                    @else
                        @php $td6 .= '<td class="col-xs-6  div-horizontal">'.$p5.'</td>'; @endphp
                    @endif
                @endforeach
                @php $td6 .= '</td>'; @endphp


                @if($board)
                    @php $boardRes = $board @endphp

                    @foreach($boardRes as $ke=>$bingoData)
                        @php  $boards[$g][] = $bingoData; @endphp
                    @endforeach

                @endif


                @php $td1 = '<td class="" style="width: 15%"><span class="text-red">'.key($prize_1).'</span></td>'; @endphp
                @php $tdr1 = '<td class="'.key($prize_2).'" style="width: 15%">'.key($prize_2).'</td>'; @endphp
                @php $tdr2 = '<td class="'.key($prize_3).'" style="width: 15%">'.key($prize_3).'</td>'; @endphp
                @php $tdr3 = '<td class="'.key($prize_4).'" style="width: 15%">'.key($prize_4).'</td>'; @endphp
                @php $tdr4 = '<td class="'.key($prize_5).'" style="width: 15%">'.key($prize_5).'</td>'; @endphp




                <div class="block remove-margin" id='xsmb-{{ $g }}'>
                    <div class="block-main-heading">
                        <h1>{{ $title }} {{ $current['lottery_company'] }} ngày {{ $current['result_day_time'] }}</h1>
                    </div>

                    @php
                        if($prize_7 && $g==0) {
                           echo '<div class="result-jackpot">
                                <div class="head-result">
                                    <h3 class="title-result-jackpot">'.$prize_7->resultTitle.'</h3>
                                </div>
                                <div class="prize-value">
                                    <p class="title-prize">Giá trị jackpot 1</p>
                                    <span class="result-jackpot">'. $prize_8->jackpotResult[0] .'</span>
                                    <hr class="line-prize">
                                    <p class="title-prize">Giá trị jackpot 2</p>
                                    <span class="result-jackpot">'. $prize_8->jackpotResult[1] .'</span>
                                </div>
                            </div> <p class="para open-next"></p>';
                        }
                    @endphp

                    <div class="list-link left100 backgroud-hide">
                        <h2 class="class-title-list-link class-title-list-link-left">
                            @php $dayName = $day; $dayName = getDaySlug($dayName); $dateexp  = explode('/',$current['result_day_time']); $dateexp = implode('-',$dateexp); @endphp
                            <a href="/{{ getRegionSlug($current['lottery_region']) }}" title="{{ $current['lottery_region'] }}" class="u-line">
                                {{ $current['lottery_company'] }}
                            </a><span> » </span>

                            <a href="/{{ getRegionSlug($current['lottery_region']) }}/power-655-{{$dayName}}" title="{{ $current['lottery_region'] }} {{ $day  }}" class="u-line">

                                {{ $current['lottery_company'] }} {{ $day  }}
                            </a><span> » </span>
                            <a href="/ket-qua-vietlott-new/{{ strtolower($current['lottery_region']) }}-ngay-{{ $dateexp }}" title="{{ $current['lottery_region'] }}  {{ $day }}" class="u-line">
                                {{ $current['lottery_company'] }} {{ $current['result_day_time'] }}
                            </a>

                        </h2>
                    </div>

                    <p class="para text-black-bold">Kỳ 549: Chủ Nhật, {{ $current['result_day_time'] }}</p>
                    <div class="power-detail">
                        <ul>
                            @php if($boards){
                                for($m = 0; $m < 7; $m++) {
                                     foreach($boards as $kk=>$bb) {

                                     if(isset($boards[$kk][$m])){
                                         echo "<li>".$boards[$kk][$m]."</li>";
                                     }

                                     }
                                }
                            }
                            @endphp
                        </ul>
                    </div>
                    <p class="text-sm">Các con số dự thưởng phải trùng với số kết quả nhưng không cần theo đúng thứ tự</p>

                    <div class="prize-detail prize-power">
                        <table class="table table-bordered table-striped table-{{ strtolower($lot["lottery_region"]) }} text-table livetn3">
                            <thead>
                            <tr>
                                <th class="col-xs-2">Giải thưởng</th>
                                <th class="col-xs-4">Trùng khớp</th>
                                <th class="text-right col-xs-2">Số lượng giải</th>
                                <th class="text-right col-xs-4">Giá trị giải (đ)</th>
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

                            </tbody>
                        </table>

                    </div>
                    <hr class="line-header"/>


                </div>




                @php $vietlottPower = 2; @endphp
            @elseif($current['lottery_company'] == 'XS Mega'  && $vietlottMega == 1)


                @php $prize_1 = json_decode($lot['prize_1']); @endphp
                @php $prize_2 = json_decode($lot['prize_2']); @endphp
                @php $prize_3 = json_decode($lot['prize_3']); @endphp
                @php $prize_4 = json_decode($lot['prize_4']); @endphp
                @php
                    $td2 = '';
                    $td3 = '';
                    $td4 = '';
                    $td5 = '';
                    if(isset($current['board'])){
                        $board = json_decode($current['board']);
                    }else{
                        $board = array();
                    }
                    $g = '';
                    $title ='';
                    @endphp

                @php $td2 .= '<td class="text-center circle-no"><i></i><i></i><i></i><i></i><i></i><i></i></td>'; @endphp
                @foreach($prize_1->{key($prize_1)} as $k=>$p1)
                    @if($lot["lottery_company"] == 'XSMB')
                        @php $td2 .= '<td class="col-xs-4 special-code div-horizontal">'.$p1.'</td>'; @endphp
                    @else
                        @php $td2 .= '<td class="col-xs-3  div-horizontal">'.$p1.'</td>'; @endphp
                    @endif
                @endforeach
                @php $td2; @endphp

                @php $td3 .= '<td class="text-center circle-no"><i></i><i></i><i></i><i></i><i></i></td>'; @endphp
                @if($lot["lottery_company"] == 'XSMB')
                    @php $td3 .= '<td class="col-xs-12  div-horizontal">'.$prize_2->{key($prize_2)}.'</td></br>'; @endphp
                @else
                    @foreach($prize_2->{key($prize_2)} as $k=>$p2)
                        @php $td3 .= '<td class="col-xs-3  div-horizontal">'.$p2.'</td>'; @endphp
                    @endforeach
                @endif

                @php $td3; @endphp

                @php $td4 .= '<td class="text-center circle-no"><i></i><i></i><i></i><i></i></td>'; @endphp
                @if($lot["lottery_company"] == 'XSMB')
                    @php $td4 .= '<td class="col-xs-12  div-horizontal">'.$prize_3->{key($prize_3)}.'</td></br>'; @endphp
                @else
                    @foreach($prize_3->{key($prize_3)} as $k=>$p3)
                        @php $td4 .= '<td class="col-xs-3  div-horizontal">'.$p3.'</td>'; @endphp
                    @endforeach
                @endif

                @php $td4 .= '</td>'; @endphp

                @php $td5 .= '<td class="text-center circle-no"><i></i><i></i><i></i>'; @endphp
                @foreach($prize_4->{key($prize_4)} as $k=>$p4)
                    @if($lot["lottery_company"] == 'XSMB')
                        @php $td5 .= '<td class="col-xs-6  div-horizontal">'.$p4.'</td>'; @endphp
                    @else
                        @php $td5 .= '<td class="col-xs-3  div-horizontal">'.$p4.'</td>'; @endphp
                    @endif
                @endforeach
                @php $td5 .= '</td>'; @endphp


                @if($board)
                    @php $boardRes = $board @endphp

                    @foreach($boardRes as $ke=>$bingoData)
                        @php  $boards[$g][] = $bingoData; @endphp
                    @endforeach

                @endif


                @php $td1 = '<td class="" style="width: 15%"><span class="text-red">'.key($prize_1).'</span></td>'; @endphp
                @php $tdr1 = '<td class="'.key($prize_2).'" style="width: 15%">'.key($prize_2).'</td>'; @endphp
                @php $tdr2 = '<td class="'.key($prize_3).'" style="width: 15%">'.key($prize_3).'</td>'; @endphp
                @php $tdr3 = '<td class="'.key($prize_4).'" style="width: 15%">'.key($prize_4).'</td>'; @endphp




                <div class="block remove-margin" id='xsmb-{{ $g }}'>
                    <div class="block-main-heading">
                        <h1>{{ $title }} {{ $current['lottery_company'] }} ngày {{ $current['result_day_time'] }}</h1>
                    </div>

                    @php
                        if(isset($prize_6)) {
                            echo '<div class="result-jackpot">
                                <div class="head-result">
                                    <h3 class="title-result-jackpot">'.$prize_6->resultTitle .'</h3>
                                </div>
                                <div class="prize-value">
                                    <span class="result-jackpot">' . $prize_7->jackpotResult .'</span>
                                </div>
                            </div>
                            <p class="para open-next">' . $prize_8->titleItem .'</p>';
                        }
                    @endphp

                    <div class="list-link backgroud-hide">
                        <h2 class="class-title-list-link class-title-list-link-left">
                            @php $dayName = $day; $dayName = getDaySlug($dayName); $dateexp  = explode('/',$current['result_day_time']); $dateexp = implode('-',$dateexp); @endphp
                            <a href="/{{ getRegionSlug($current['lottery_region']) }}" title="{{ $current['lottery_region'] }}" class="u-line">
                                {{ $current['lottery_company'] }}
                            </a><span> » </span>

                            <a href="/{{ getRegionSlug($current['lottery_region']) }}/{{ preg_replace('/\s+/', '-', strtolower($current['lottery_company'])) }}-{{$dayName}}" title="{{ $current['lottery_region'] }} {{ $day  }}" class="u-line">
                                {{ $current['lottery_company'] }} {{ $day  }}
                            </a><span> » </span>
                            <a href="/ket-qua-vietlott-new/{{ strtolower($current['lottery_region']) }}-ngay-{{ $dateexp }}" title="{{ $current['lottery_region'] }}  {{ $day }}" class="u-line">
                                {{ $current['lottery_company'] }} {{ $current['result_day_time'] }}
                            </a>

                        </h2>
                    </div>

                    <p class="para text-black-bold">Kỳ 549: Chủ Nhật, {{ $current['result_day_time'] }}</p>
                    <div class="mega-detail">
                        <ul>
                            @php if($board){
                                for($m = 0; $m < 5; $m++) {
                                     foreach($board as $kk=>$bb) {
                                         echo "<li>".$board[$kk][$m]."</li>";
                                     }
                                }
                            }
                            @endphp
                        </ul>
                    </div>
                    <p class="text-sm">Các con số dự thưởng phải trùng với số kết quả nhưng không cần theo đúng thứ tự</p>

                    <div class="prize-detail">
                        <table class="table table-bordered table-striped table-{{ strtolower($lot["lottery_region"]) }} text-table livetn3">
                            <thead>
                            <tr>
                                <th class="col-xs-2">Giải thưởng</th>
                                <th class="col-xs-4">Trùng khớp</th>
                                <th class="text-right col-xs-2">Số lượng giải</th>
                                <th class="text-right col-xs-4">Giá trị giải (đ)</th>
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

                            </tbody>
                        </table>

                    </div>
                    <hr class="line-header"/>

                </div>



                @php $vietlottMega = 2; @endphp
            @elseif($current['lottery_company'] == 'XS Max 4D' && $vietlott4d == 1)


                @php $prize_1 = json_decode($lot['prize_1']); @endphp
                @php $prize_2 = json_decode($lot['prize_2']); @endphp
                @php $prize_3 = json_decode($lot['prize_3']); @endphp
                @php $prize_4 = json_decode($lot['prize_4']); @endphp
                @php $prize_5 = json_decode($lot['prize_5']); @endphp
                @php
                    $td2 = '';
                    $td3 = '';
                    $td4 = '';
                    $td5 = '';
                    $td6 = '';
                    $g ='';
                    $title = '';
                    $th = '';
                @endphp

                @php $board = json_decode($lot['board']); @endphp

                @php $td2 .= '<td class="text-center">'; @endphp
                @foreach($prize_1->{key($prize_1)} as $k=>$p1)
                    @if($lot["lottery_company"] == 'XSMB')
                        @php $td2 .= '<span class="col-xs-4 special-code div-horizontal">'.$p1.'</span>'; @endphp
                    @else
                        @php $td2 .= '<span class="special-prize-lg">'.$p1.'</span>'; @endphp
                    @endif
                @endforeach
                @php $td2 .= '</td>'; @endphp

                @php $td3 .= '<td class="text-center">'; @endphp
                @if($lot["lottery_company"] == 'XSMB')
                    @php $td3 .= '<span class="col-xs-12 number-black-bold div-horizontal">'.$prize_2->{key($prize_2)}.'</span></br>'; @endphp
                @else
                    @foreach($prize_2->{key($prize_2)} as $k=>$p2)
                        @php $td3 .= '<span class="col-xs-6 number-black-bold">'.$p2.'</span>'; @endphp
                    @endforeach
                @endif

                @php $td3 .= '</td>'; @endphp

                @php $td4 .= '<td class="text-center">'; @endphp
                @if($lot["lottery_company"] == 'XSMB')
                    @php $td4 .= '<span class="col-xs-12 number-black-bold div-horizontal">'.$prize_3->{key($prize_3)}.'</span></br>'; @endphp
                @else
                    @foreach($prize_3->{key($prize_3)} as $k=>$p3)
                        @php $td4 .= '<span class="col-xs-4 number-black-bold">'.$p3.'</span>'; @endphp
                    @endforeach
                @endif

                @php $td4 .= '</td>'; @endphp

                @php $td5 .= '<td class="text-center">'; @endphp
                @foreach($prize_4->{key($prize_4)} as $k=>$p4)
                    @if($lot["lottery_company"] == 'XSMB')
                        @php $td5 .= '<span class="col-xs-6 number-black-bold div-horizontal">'.$p4.'</span>'; @endphp
                    @else
                        @php $td5 .= '<span class="number-black-bold">'.$p4.'</span>'; @endphp
                    @endif
                @endforeach
                @php $td5 .= '</td>'; @endphp

                @php $td6 .= '<td class="text-center">'; @endphp
                @foreach($prize_5->{key($prize_5)} as $k=>$p5)
                    @if($lot["lottery_company"] == 'XSMB')
                        @php $td6 .= '<span class="col-xs-4 number-black-bold div-horizontal">'.$p5.'</span>'; @endphp
                    @else
                        @php $td6 .= '<span class="number-black-bold">'.$p5.'</span></br>'; @endphp
                    @endif
                @endforeach
                @php $td6 .= '</td>'; @endphp


                @if($board)
                    @php $boardRes = $board @endphp

                    @foreach($boardRes as $ke=>$bingoData)
                        @php  $boards[$g][] = $bingoData; @endphp
                    @endforeach

                @endif

                @php $td1 = '<td class="" style="width: 15%">'.key($prize_1).'</td>'; @endphp
                @php $tdr1 = '<td class="'.key($prize_2).'" style="width: 15%">'.key($prize_2).'</td>'; @endphp
                @php $tdr2 = '<td class="'.key($prize_3).'" style="width: 15%">'.key($prize_3).'</td>'; @endphp
                @php $tdr3 = '<td class="'.key($prize_4).'" style="width: 15%">'.key($prize_4).'</td>'; @endphp
                @php $tdr4 = '<td class="'.key($prize_5).'" style="width: 15%">'.key($prize_5).'</td>'; @endphp




                <div class="block remove-margin" id='xsmb-{{ $g }}'>
                    <div class="block-main-heading">
                        <h1>{{ $title }} {{ $current['lottery_company'] }} ngày {{ $current['result_day_time'] }}</h1>
                    </div>
                    <div class="list-link">
                        <h2 class="class-title-list-link">
                            @php $dayName = $day; $dayName = getDaySlug($dayName); $dateexp  = explode('/',$current['result_day_time']); $dateexp = implode('-',$dateexp); @endphp
                            <a href="/{{ getRegionSlug($current['lottery_region']) }}" title="{{ $current['lottery_region'] }}" class="u-line">
                                {{ $current['lottery_company'] }}
                            </a><span> » </span>

                            <a href="/{{ getRegionSlug($current['lottery_region']) }}/{{ preg_replace('/\s+/', '-', strtolower($current['lottery_company'])) }}-{{$dayName}}" title="{{ $current['lottery_region'] }} {{ $day  }}" class="u-line">
                                {{ $current['lottery_company'] }} {{ $day  }}
                            </a><span> » </span>
                            <a href="/ket-qua-vietlott-new/{{ strtolower($current['lottery_region']) }}-ngay-{{ $dateexp }}" title="{{ $current['lottery_region'] }}  {{ $day }}" class="u-line">
                                {{ $current['lottery_company'] }} {{ $current['result_day_time'] }}
                            </a>

                        </h2>
                    </div>
                    <div class="block-main-content">
                        <table class="table table-bordered table-striped table-xsmb table-vietlot-new table-{{ strtolower($lot["lottery_region"]) }} text-table livetn3">
                            <thead>
                            <tr>
                                @php if($th){
                                @endphp
                                <th class="text-center">Giải</th>
                                @php echo $th; } @endphp


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


                            </tbody>
                        </table>

                    </div>
                    <hr class="line-header"/>


                    <div class="block-main-content view-loto">
                        <table class="table table-bordered table-loto">
                            <tbody>
                            <tr class="bg">
                                <td colspan="4" class="text-left"><span class="text-blue-bold">Ký hiệu bộ số</span></td>
                            </tr>

                            @php $char = array('0'=>'A','1'=>'D','2'=>'B','3'=>'E','4'=>'C', '5'=>'G'); $value = []; @endphp
                            @php
                                $ab = 0;
                                for($m = 0; $m < 6; $m++)
                                {
                                    if($m == 0 || $m == 2 || $m == 4) {
                                        echo "<tr class='text-center'>";
                                    }
                                    if(isset($char[$m])){
                                        echo "<td class='bg' style='width: 10%'>".$char[$m]."</td>";
                                    echo "<td><span class='number-black-bold'>".$boards[$g][$m]."</span></td>";
                                    }


                                    if($m == 1 || $m == 3 || $m == 5) {
                                        echo "</tr>";
                                    }
                                 }
                            @endphp
                            </tbody></table>
                    </div>
                </div>



                @php $vietlott4d = 2; @endphp
            @elseif($current['lottery_company'] == 'XS Max 3D' && $vietlott3d == 1)

                @php $prize_1 = json_decode($lot['prize_1']); @endphp
                @php $prize_2 = json_decode($lot['prize_2']); @endphp
                @php $prize_3 = json_decode($lot['prize_3']); @endphp
                @php $prize_4 = json_decode($lot['prize_4']); @endphp
                @php
                    $td2 = '';
                    $td3 = '';
                    $td4 = '';
                    $td5 = '';

                    @endphp



                @php $td2 .= '<td>'; @endphp
                @foreach($prize_1->{key($prize_1)} as $k=>$p1)
                    @if($lot["lottery_company"] == 'XSMB')
                        @php $td2 .= '<span class="col-xs-4 special-code div-horizontal">'.$p1.'</span>'; @endphp
                    @else
                        @php $td2 .= '<span class="col-xs-6 special-prize-lg div-horizontal">'.$p1.'</span>'; @endphp
                    @endif
                @endforeach
                @php $td2 .= '</td>'; @endphp

                @php $td3 .= '<td>'; @endphp
                @if($lot["lottery_company"] == 'XSMB')
                    @php $td3 .= '<span class="col-xs-12 number-black-bold div-horizontal">'.$prize_2->{key($prize_2)}.'</span></br>'; @endphp
                @else
                    @foreach($prize_2->{key($prize_2)} as $k=>$p2)
                        @php $td3 .= '<span class="col-xs-3 number-black-bold div-horizontal">'.$p2.'</span>'; @endphp
                    @endforeach
                @endif

                @php $td3 .= '</td>'; @endphp

                @php $td4 .= '<td>'; @endphp
                @if($lot["lottery_company"] == 'XSMB')
                    @php $td4 .= '<span class="col-xs-12 number-black-bold div-horizontal">'.$prize_3->{key($prize_3)}.'</span></br>'; @endphp
                @else
                    @foreach($prize_3->{key($prize_3)} as $k=>$p3)
                        @php $td4 .= '<span class="col-xs-4 number-black-bold div-horizontal">'.$p3.'</span>'; @endphp
                    @endforeach
                @endif

                @php $td4 .= '</td>'; @endphp

                @php $td5 .= '<td>'; @endphp
                @foreach($prize_4->{key($prize_4)} as $k=>$p4)
                    @if($lot["lottery_company"] == 'XSMB')
                        @php $td5 .= '<span class="col-xs-6 number-black-bold div-horizontal">'.$p4.'</span>'; @endphp
                    @else
                        @php $td5 .= '<span class="col-xs-3 number-black-bold div-horizontal">'.$p4.'</span>'; @endphp
                    @endif
                @endforeach
                @php $td5 .= '</td>'; @endphp

                @php $td1 = '<td class="" style="width: 15%">'.key($prize_1).'</td>'; @endphp
                @php $tdr1 = '<td class="'.key($prize_2).'" style="width: 15%">'.key($prize_2).'</td>'; @endphp
                @php $tdr2 = '<td class="'.key($prize_3).'" style="width: 15%">'.key($prize_3).'</td>'; @endphp
                @php $tdr3 = '<td class="'.key($prize_4).'" style="width: 15%">'.key($prize_4).'</td>'; @endphp
                @php  $title = "Xổ Số";
                $th = ''; @endphp

                <div class="block remove-margin" id='{{ $lot["lottery_company"] }}'>
                    <div class="block-main-heading">
                        <h1>{{ $title }} {{ $current['lottery_company'] }} ngày {{ $current['result_day_time'] }}</h1>
                    </div>
                    <div class="list-link">
                        <h2 class="class-title-list-link">
                            @php $dayName = $day; $dayName = getDaySlug($dayName); $dateexp  = explode('/',$current['result_day_time']); $dateexp = implode('-',$dateexp); @endphp
                            <a href="/{{ getRegionSlug($current['lottery_region']) }}/kqvietlott-xo-so-max-3d" title="{{ $current['lottery_region'] }}" class="u-line">
                                {{ $current['lottery_company'] }}
                            </a><span> » </span>

                            <a href="/{{ getRegionSlug($current['lottery_region']) }}/{{ preg_replace('/\s+/', '-', strtolower($current['lottery_company'])) }}-{{$dayName}}" title="{{ $current['lottery_region'] }} {{ $day  }}" class="u-line">
                                {{ $current['lottery_company'] }} {{ $day  }}
                            </a><span> » </span>
                            <a href="/ket-qua-vietlott-new/{{ strtolower($current['lottery_region']) }}-ngay-{{ $dateexp }}" title="{{ $current['lottery_region'] }}  {{ $day }}" class="u-line">
                                {{ $current['lottery_company'] }} {{ $current['result_day_time'] }}
                            </a>

                        </h2>
                    </div>
                    <div class="block-main-content">
                        <table class="table table-bordered table-striped table-xsmb table-vietlot-new table-{{ strtolower($lot["lottery_region"]) }} text-table livetn3">
                            <thead>
                            <tr>
                                @php if($th){
                                @endphp
                                <th class="text-center">Giải</th>
                                @php echo $th; } @endphp


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

                            </tbody>
                        </table>

                    </div>
                    <hr class="line-header"/>
                </div>


                @php $vietlott3d = 2; @endphp
            @endif

    @elseif($data->lottery_region == 'Điện Toán')
           {{-- <pre>
            {{ print_r($data) }}--}}

        @include('admin/cron/dien-toan-section')

    @endif



        @stop


        @section('js')


            <script> console.log('Hi!'); </script>

@stop
