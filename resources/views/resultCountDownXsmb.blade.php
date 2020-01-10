@include('header')

<div class="main-content">
    <div class="container">
    <div class="row margin-b">

    <div class="col-xs-12 col-sm-12 col-md-6">
        <div style="border: 1px solid #060606;min-height: 163px;text-align: center;" class="margin-40  margin-b-20">
            <div style="width: 100%" class="block-main-heading">
                @php $mytime = Carbon\Carbon::now(); @endphp
                <h1>Trực Tiếp XSMB - {{ engToVit($mytime->toDateTime()->format('l')) }} {{ $mytime->toDateTime()->format('d/m/Y') }}</h1>
            </div>
            <h5 style="color: #cd0000;font-weight: 700;">Kết quả xổ số miền Bắc hôm nay được tường thuật trực tiếp lúc 18h10</h5>
            <div class="clock" data-time="18-10-00" ></div>

        </div>
        <div class="row">
            <div class="col-xs-12">

                @if($content->count() > 0)
                    @php $g = 1; @endphp
                    @foreach($content as $printresult)
                        {{-- {{ print_r($printresult) }}--}}
                        <div class="block" id='xsmb-{{ $g }}'>
                            <div class="block-main-heading">
                                <h1>Kết Quả Xổ Số Miền Bắc ({{ $printresult->lottery_region }})</h1>
                            </div>
                            <div class="list-link">
                                <h2 class="class-title-list-link">
                                    @php $dayName = $printresult->result_day_time->toDateTime()->format('l'); $dayName = getDaySlug($dayName); @endphp

                                    <a href="/{{ getRegionSlug($printresult->lottery_region) }}" title="{{ $printresult->lottery_region }}">XSMB</a><span> » </span>
                                    <a href="/{{ getRegionSlug($printresult->lottery_region) }}/kq{{ strtolower($printresult->lottery_region) }}-{{$dayName}}" title="{{ $printresult->lottery_region }} {{ $printresult->result_day_time->toDateTime()->format('l') }}">{{ $printresult->lottery_region }} {{ engToVit($printresult->result_day_time->toDateTime()->format('l')) }}</a><span> » </span>
                                    <a href="/{{ getRegionSlug($printresult->lottery_region) }}/kqxsmb-ngay-{{ $printresult->result_day_time->toDateTime()->format('d-m-Y') }}" title="{{ $printresult->lottery_region }}  {{ $printresult->result_day_time->toDateTime()->format('d/m/y') }}"> {{ $printresult->lottery_region }}  {{ $printresult->result_day_time->toDateTime()->format('d/m/y') }}</a>

                                </h2>
                            </div>

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
                        <div class="block-main-heading">
                            <h1>Kết Quả Xổ Số Miền Bắc (XSMB)</h1>
                        </div>
                        <div class="list-link">
                            <h2 class="class-title-list-link">

                                <a href="/ket-qua-xsmb" title="XSMB">XSMB</a><span> » </span>
                                <a href="/ket-qua-xsmb/kqxsmb-{{ getDaySlug($mytime->toDateTime()->format('l')) }}" title="XSMB Wednesday">XSMB {{ engToVit($mytime->toDateTime()->format('l')) }}</a><span> » </span>
                                <a href="/ket-qua-xsmb/kqxsmb-ngay-{{ $mytime->toDateTime()->format('d-m-Y') }}" title="XSMB  01/01/20"> XSMB   {{ $mytime->toDateTime()->format('d/m/Y') }}</a>

                            </h2>
                        </div>
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
            <div class="col-xs-12">
                <!-- /21689237362/xoso-content-ads -->
                <div id='div-gpt-ad-1578217977238-0' style='margin: 0 auto; width: 336px; height: 280px;'>
                    <script>
                        googletag.cmd.push(function() { googletag.display('div-gpt-ad-1578217977238-0'); });
                    </script>
                </div>

            </div>
        </div>


    </div>


        @include('sidebar')
    </div>
    </div>
</div>
@include('footer')

<script src="{{ URL::asset('js/flipclock.js') }}"> </script>
<script type="text/javascript">
 /*   var clock = $('.clock').FlipClock(3600 * 24 * 3, {
        clockFace: 'DailyCounter',
        countdown: true
    });*/
</script>
