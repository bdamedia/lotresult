@php $g = 1; $lastDate=''; @endphp
@foreach($content as $printresult)


    <div class="remove-margin block" id='xsmb-{{ $g }}'>
        <div class="block-main-heading">
            <h1>
                @if($printresult->lottery_region == 'XSMN') {{ "Kết Quả Xổ số " }}  {{ getCompanyName($printresult->lottery_company) }} ({{ $printresult->lottery_company }})

                @elseif($printresult->lottery_region == 'XSMT') {{ "Kết Quả Xổ số " }} {{ getCompanyName($printresult->lottery_company) }} ({{ $printresult->lottery_company }})

                @elseif($printresult->lottery_region == 'XSMB') {{ "Kết Quả Xổ số " }} {{ getCompanyName($printresult->lottery_company) }} ({{ $printresult->lottery_company }})

                @elseif($printresult->lottery_region == 'Vietlott') {{ "Xổ Số " }} {{ getCompanyName($printresult->lottery_company) }} ({{ $printresult->lottery_company }})


                @endif </h1>
        </div>
        <div class="list-link">
            <h2 class="class-title-list-link">
                @php $dayName = $printresult->result_day_time->toDateTime()->format('l'); $dayName = getDaySlug($dayName); @endphp

                <a href="/{{ getRegionSlug($printresult->lottery_region) }}" title="{{ $printresult->lottery_region }}" >{{ $printresult->lottery_region }}</a><span> » </span>
                
                <a href="/{{ getRegionSlug($printresult->lottery_region) }}/{{ preg_replace('/\s+/', '-', strtolower($printresult->lottery_company)) }}-{{$dayName}}" title="{{ $printresult->lottery_region }} {{ engToVit($printresult->result_day_time->toDateTime()->format('l')) }}">
                    {{ $printresult->lottery_company }} {{ engToVit($printresult->result_day_time->toDateTime()->format('l')) }}</a>
                <span> » </span>
                
                <a href="/ket-qua-vietlott-new/{{ strtolower($printresult->lottery_region) }}-ngay-{{ $printresult->result_day_time->toDateTime()->format('d-m-Y') }}" title="{{ $printresult->lottery_region }}  {{ $printresult->result_day_time->toDateTime()->format('d/m/y') }}" >{{ $printresult->lottery_company }} {{ $printresult->result_day_time->toDateTime()->format('d/m/y') }}</a>

            </h2>
        </div>

        <!-- <div id="u129" class="ax_default box_2">
            <div id="u129_text" class="text">
                <p><span><a href="/ket-qua-xsmn/kqxs-{{ getCompanySlug($printresult->lottery_company) }}-ngay-{{ $printresult->result_day_time->toDateTime()->format('d-m-Y') }}" title="{{ $printresult->lottery_region }}  {{ $printresult->result_day_time->toDateTime()->format('d/m/y') }}">Xổ Số  {{ getCompanyName($printresult->lottery_company) }} {{ $printresult->result_day_time->toDateTime()->format('d/m/y') }}</a></span></p>
            </div>
        </div> -->

        <div class="block-main-content">
            <table class="table table-bordered table-striped table-xsmn">
                <tbody>
                <tr> @php $prize_1 = json_decode($printresult->prize_1); @endphp
                    <td class="ĐB {{ key($prize_1) }}" style="width: 15%">  {{ key($prize_1) }}</td>
                    <td class="text-center">
                        @foreach($prize_1->{key($prize_1)} as $k=>$p1)
                            <span class=" number-black-bold div-horizontal ">{{ $p1 }} </span>
                        @endforeach
                    </td>
                </tr>

                <tr> @php $prize_2 = json_decode($printresult->prize_2);   @endphp
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

                <tr> @php $prize_3 = json_decode($printresult->prize_3);  @endphp
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

                <tr> @php $prize_4 = json_decode($printresult->prize_4);  @endphp
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

                <tr> @php $prize_5 = json_decode($printresult->prize_5);  @endphp
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

                </tbody>
            </table>
        </div>
        <hr class="line-header"/>
        <div class="block-main-content">
            <div class="block-main-content view-loto">
                <table class="table table-bordered table-loto">
                    <tbody>
                        <tr class="bg">
                            <td colspan="4" class="text-left"><span class="text-blue-bold">Ký hiệu bộ số</span></td>
                        </tr>
                        @php $value = []; @endphp
                        @php
                        $ab = 0;
                        $boardRes = json_decode($printresult->board);
                        for($m = 0; $m < 6; $m++)
                        {
                            if($m == 0 || $m == 2 || $m == 4) {
                                echo "<tr class='text-center'>";
                            }
                            if(isset($char[$m])){
                                echo "<td class='bg' style='width: 10%'>".$char[$m]."</td>";
                            echo "<td><span class='number-black-bold'>".$boardRes[$m]."</span></td>";
                            }


                            if($m == 1 || $m == 3 || $m == 5) {
                                echo "</tr>";
                            }
                         }
                        @endphp
                    </tbody></table>
            </div>
        </div>

    </div>
    @php $g++;  @endphp

@endforeach


