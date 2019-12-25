@include('header')

<div class="main-content">
    <div class="container">
    <div class="row margin-b">
    <div class="col-xs-12 col-sm-12 col-md-6">

    <div class="row">
        @include('todayResult')
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
            {{--<a href="/xsmb-xo-so-mien-bac.html" title="XSMB" class="u-line">XSMB</a><span>»</span>
            <a href="/xsmb-thu-6.html" title="XSMB Thứ 6" class="u-line">XSMB Thứ 6</a><span>»</span>--}}
            <a href="#" title="{{ $printresult->lottery_region }}  {{ $printresult->result_day_time->toDateTime()->format('d/m/y') }}" class="u-line">Kết quả Xổ Số Miền Bắc({{ $printresult->lottery_region }})  {{ $printresult->result_day_time->toDateTime()->format('d/m/y') }}</a>
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
            <td>@php $prize_2 = json_decode($printresult->prize_2);  @endphp {{ key($prize_2) }}</td>
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
                            <span class="number-black-bold div-horizontal">@php if(count($p4) > 0 ){ $p4 = implode(', ',$p4); }  @endphp {{ $p4 }} </span>
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
                            <span class="number-black-bold div-horizontal">@php if(count($p5) > 0 ){ $p5 = implode(', ',$p5); }  @endphp {{ $p5  }} </span>
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
                            <span class="number-black-bold div-horizontal">@php if(count($p6) > 0 ){ $p6 = implode(', ',$p6); }  @endphp {{ $p6 }} </span>
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
                            <span class="number-black-bold div-horizontal">@php if(count($p7) > 0 ){ $p7 = implode(', ',$p7); }  @endphp {{ $p7 }} </span>
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
                            <span class="number-black-bold div-horizontal">@php if(count($p8) > 0 ){ $p8 = implode(', ',$p8); }  @endphp {{ $p8 }} </span>
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
                            <span class="number-black-bold div-horizontal">@php if(count($p9) > 0 ){ $p9 = implode(', ',$p9); }  @endphp {{ $p9 }} </span>
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
                @php
                $aa = [];
                for ($it=1; $it< 10 ; $it++) {
                    $t= "prize_{$it}";
                    $f = json_decode($printresult->{$t});
                    foreach ($f as $keyValues => $mainValue) {
                        if(is_array($mainValue)) {
                            foreach ($mainValue as $keySecond => $valSecond) {
                                //$aa['prize_'.$it][] = substr($valSecond, -2, 2);
                                $aa[$it-2][] = substr($valSecond, -2, 2);
                            }
                        } else if ($keyValues == 'Mã ĐB') {
                            //$aa['prize_1'][] = (array) $mainValue;
                         } else if ($keyValues == 'G.DB') {
                            //$aa['prize_'.$it][] = substr($mainValue, -2, 2);
                            $aa[$it-2][] = substr($mainValue, -2, 2);
                        } else {
                            //$aa['prize_'.$it][] = substr($mainValue, -2, 2);
                            $aa[$it-2][] = substr($mainValue, -2, 2);
                        }
                    }
                }

                //print_r($aa);
                $newValues = [];
                foreach($aa as $ke=>$bingoData) {
                    foreach($aa[$ke] as $ke1=>$bingoData1) {
                        if ( $bingoData1 <= 07) {
                            $newValues[0][] = $bingoData1;
                        } else if ( $bingoData1 >= 8 && $bingoData1 <= 19) {  
                            $newValues[1][] = $bingoData1;
                        } else if ( $bingoData1 >= 20 && $bingoData1 <= 29) {     
                            $newValues[2][] = $bingoData1;
                        } else if ( $bingoData1 >= 30 && $bingoData1 <= 39) {    
                            $newValues[3][] = $bingoData1;
                        } else if ( $bingoData1 >= 40 && $bingoData1 <= 49) {    
                            $newValues[4][] = $bingoData1;
                        } else if ( $bingoData1 >= 50 && $bingoData1 <= 59) { 
                            $newValues[5][] = $bingoData1;
                        } else if ( $bingoData1 >= 60 && $bingoData1 <= 69) {
                            $newValues[6][] = $bingoData1;
                        } else if ( $bingoData1 >= 70 && $bingoData1 <= 89) {
                            $newValues[7][] = $bingoData1;
                        } else {
                            $newValues[8][] = $bingoData1;
                        }
                    }
                }

                //echo "<pre>";
                //print_r(ksort($newValues));
                ksort($newValues);
                @endphp

                @foreach($newValues as $ke=>$bingoData)
                <tr>
                    <td class="text-center">{{ $ke }}</td>
                    <td>
                        @foreach($newValues[$ke] as $ke1=>$bingoData1)
                            {{ $loop->first ? '' : ', ' }}
                            {{ $bingoData1 }}
                            <!-- @if (count($newValues[$ke]) > 1)
                                {{ ',' }}
                            @endif -->
                        @endforeach
                    </td>
                </tr>
                @endforeach

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
