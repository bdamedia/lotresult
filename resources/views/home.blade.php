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
                                    @if($printresult->lottery_region == 'XSMT')
                                        @php $title = "Kết quả Xổ số miền Trung"; @endphp
                                    @elseif($printresult->lottery_region == 'XSMB')
                                        @php $title = "Kết quả Xổ Số Miền Bắc"; @endphp
                                    @elseif($printresult->lottery_region == 'XSMN')
                                        @php $title = "Kết quả Xổ số miền Nam"; @endphp
                                    @endif
                                    <h1>{{ $title }} ({{ $printresult->lottery_region }})</h1>
                                </div>
                                <div class="list-link">
                                    <h2 class="class-title-list-link">
                                        @php $dayName = $printresult->result_day_time->toDateTime()->format('l'); $dayNameSlug = getDaySlug($dayName); @endphp
                                        <a href="/{{ getRegionSlug($printresult->lottery_region) }}" title="XSMB" class="u-line">{{ $printresult->lottery_region }}</a><span>»</span>
                                        <a href="/{{ getRegionSlug($printresult->lottery_region) }}/kq{{ strtolower($printresult->lottery_region) }}-{{$dayNameSlug}}" title="{{ $printresult->lottery_region }} {{$dayName}}" class="u-line">{{ $printresult->lottery_region }} {{ $dayName }}</a><span>»</span>
                                        <a href="/{{ getRegionSlug($printresult->lottery_region) }}/kq{{ strtolower($printresult->lottery_region) }}-ngay-{{ $printresult->result_day_time->toDateTime()->format('d-m-Y') }}" title="{{ $printresult->lottery_region }}  {{ $printresult->result_day_time->toDateTime()->format('d/m/y') }}" class="u-line">  {{--{{ getCompanyName($printresult->lottery_company) }}--}} {{ $printresult->lottery_region }} {{ $printresult->result_day_time->toDateTime()->format('d/m/y') }}</a>
                                    </h2>
                                </div>
                                <div class="block-main-content">
                                    <table class="table table-bordered table-striped table-xsmb">
                                        <tbody>
                                        <tr>
                                            <td style="width: 15%"> @php $prize_1 = json_decode($printresult->prize_1); @endphp {{ key($prize_1) }}</td>
                                            <td class="text-center">
                                                @foreach($prize_1->{key($prize_1)} as $k=>$p1)
                                                    @if(count((array)$prize_1->{key($prize_1)}) > 1)
                                                        <span class="col-xs-4 special-code div-horizontal">{{ $p1 }} </span>
                                                    @else
                                                        <span class="col-xs-12 special-code div-horizontal">{{ $p1 }} </span>
                                                    @endif

                                                @endforeach
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>@php $prize_2 = json_decode($printresult->prize_2);  @endphp {{ key($prize_2) }}</td>
                                            <td class="text-center">
                                                @if(count((array) $prize_2) <= 1)

                                                    @php $prize_2 = (array) $prize_2;
                                                    @endphp
                                                    @foreach((array) $prize_2[key($prize_2)] as $k=>$p2)
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
                                                    @foreach((array)$prize_3->{key($prize_3)} as $k=>$p3)
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
                                                    @foreach($prize_5->{key($prize_5)} as $k=>$p5)
                                                        @php
                                                            $p5New = explode(' ',$p5);
                                                            if(is_array($p5New)){
                                                                foreach($p5New as $vb){
                                                                     echo '<span class="col-xs-4 number-black-bold div-horizontal">'.$vb.'</span>';
                                                                }
                                                            }else{
                                                                echo '<span class="number-black-bold div-horizontal">'.$p5.'</span>';
                                                            }
                                                        @endphp

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
                                                    @foreach($prize_6->{key($prize_6)} as $k=>$p6)
                                                        <span class="number-black-bold div-horizontal">   {{ $p6 }} </span>
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
                                                    @foreach($prize_7->{key($prize_7)} as $k=>$p7)
                                                        <span class="number-black-bold div-horizontal"> {{ $p7 }} </span>
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
                                                    @foreach($prize_8->{key($prize_8)} as $k=>$p8)
                                                        <span class="number-black-bold div-horizontal"> {{ $p8 }} </span>
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
                                                    @foreach($prize_9->{key($prize_9)} as $k=>$p9)
                                                        <span class="number-black-bold div-horizontal"> {{ $p9 }} </span>
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

                                    <span class="link-pad-left padding10">
                                        <a href="/{{ getRegionSlug($printresult->lottery_region) }}/{{ getRegionLotoSlug($printresult->lottery_region) }}" >Lô tô {{ $printresult->lottery_region }}</a> >>
                <a href="/{{ getRegionLotoSlug($printresult->lottery_region) }}/kqlt{{ substr(strtolower($printresult->lottery_region),2,4) }}-{{ $dayName   }}" title="{{ $printresult->lottery_region }}  {{ $printresult->result_day_time->toDateTime()->format('l') }}" class="u-line">Lô tô  ({{ $printresult->lottery_region }}) {{ $printresult->result_day_time->toDateTime()->format('l') }} </a>
</span>

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
                                                    $mainValue = (array) $mainValue;
                                                    if(is_array($mainValue)) {
                                                        foreach ($mainValue as $keySecond => $valSecond) {
                                                            $aa['prize_'.$it][] = substr($valSecond, -2, 2);
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
                                                    } else if ( $bingoData1 >= 70 && $bingoData1 <= 79) {
                                                         $newValues[7][] = $bingoData1;
                                                    } else if ( $bingoData1 >= 80 && $bingoData1 <= 89) {
                                                        $newValues[8][] = $bingoData1;
                                                    } else {
                                                        $newValues[9][] = $bingoData1;
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
