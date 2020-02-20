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
        @php    
        if($printresult->prize_7) {
            $prize_7 = json_decode($printresult->prize_7);
            $prize_8 = json_decode($printresult->prize_8);
            $prize_8_Second = json_decode($printresult->prize_8);
            echo '<div class="result-jackpot">
                <div class="head-result">
                    <h3 class="title-result-jackpot">'.$prize_7->resultTitle.'</h3>
                </div>
                <div class="prize-value">
                    <p class="title-prize">Giá trị jackpot 1</p>
                    <span class="result-jackpot">'. $prize_8->jackpotResult[0] .'</span>
                    <hr class="line-prize">
                    <p class="title-prize">Giá trị jackpot 2</p>
                    <span class="result-jackpot">'. $prize_8_Second->jackpotResult[1] .'</span>
                </div>
            </div> <p class="para open-next"></p>';
        } 
        @endphp

        <div class="list-link left100 backgroud-hide">
            <h2 class="class-title-list-link class-title-list-link-left">
                @php $dayName = $printresult['day']; $dayName = getDaySlug($dayName); $dateexp  = explode('/',$printresult->result_day_time); $dateexp = implode('-',$dateexp); @endphp
                <a href="/{{ getRegionSlug($printresult->lottery_region) }}" title="{{ $printresult->lottery_region }}" class="u-line">
                    {{ $printresult->lottery_company}}
                </a><span> » </span>

                 <a href="/{{ getRegionSlug($printresult->lottery_region) }}/power-655-{{$dayName}}" title="{{ $printresult->lottery_region }}" class="u-line">
                    {{ $printresult->lottery_company }} 
                </a><span> » </span>
                <a href="/ket-qua-vietlott-new/{{ strtolower($printresult->lottery_region) }}-ngay-{{ $dateexp }}" title="{{ $printresult->lottery_region }}" class="u-line"> 
                     {{ $printresult->lottery_company }} {{ $printresult->result_day_time }}
                </a>
            </h2>
        </div>

        <p class="para text-black-bold">Kỳ 549: Chủ Nhật, {{ $printresult->result_day_time }}</p>
        <div class="power-detail">
            <ul>
               @php 
               $boards = json_decode($printresult->board);
               if($boards){ 
                     foreach($boards as $kk=>$bb) {
                         if(isset($boards->$kk)){
                             echo "<li>". $bb. "</li>";
                         }
                     }
                }
                @endphp
            </ul>
        </div>
    <p class="text-sm">Các con số dự thưởng phải trùng với số kết quả nhưng không cần theo đúng thứ tự</p>
   
        <div class="prize-detail prize-power">
            <table class="table table-bordered table-striped text-table livetn3">
                <thead>
                <tr>
                    <th class="col-xs-2">Giải thưởng</th>
                    <th class="col-xs-4">Trùng khớp</th>
                    <th class="text-right col-xs-2">Số lượng giải</th>
                    <th class="text-right col-xs-4">Giá trị giải (đ)</th>
                </tr>
                </thead>

                <tbody>
                <tr> @php $prize_1 = json_decode($printresult->prize_1); @endphp
                    <td class="{{ key($prize_1) }}" > {{ key($prize_1) }}</td>
                    <td class="text-center circle-no"><i></i><i></i><i></i><i></i><i></i><i></i></td>
                    @if(count((array) $prize_1) <= 1)
                        @foreach($prize_1->{key($prize_1)} as $k=>$p1)
                            <td class="col-xs-3  div-horizontal">{{ $p1 }}</td>
                        @endforeach
                    @else
                        @foreach($prize_1->{key($prize_1)} as $k=>$p2)
                            <td class="col-xs-3  div-horizontal">{{ $p1 }}</td>
                        @endforeach
                    @endif

                </tr>

                <tr> @php $prize_2 = json_decode($printresult->prize_2);   @endphp
                    <td class="{{ key($prize_2) }}" > {{ key($prize_2) }}</td>
                    <td class="text-center circle-no special"><i></i><i></i><i></i><i></i><i></i><i></i></td>
                    @if(count((array) $prize_2) <= 1)
                        @foreach($prize_2->{key($prize_2)} as $k=>$p2)
                            <td class="col-xs-3  div-horizontal">{{ $p2 }}</td>
                        @endforeach
                    @else
                        @foreach($prize_2->{key($prize_2)} as $k=>$p2)
                            <td class="col-xs-3  div-horizontal">{{ $p2 }}</td>
                        @endforeach
                    @endif
                </tr>

                <tr> @php $prize_3 = json_decode($printresult->prize_3);  @endphp
                    <td class="{{ key($prize_3) }}" > {{ key($prize_3) }}</td>
                    <td class="text-center circle-no"><i></i><i></i><i></i><i></i><i></i></td>
                        @if(count((array) $prize_3) <= 1)
                            @foreach($prize_3->{key($prize_3)} as $k=>$p3)
                                <td class="col-xs-3  div-horizontal">{{ $p3 }} </td>
                            @endforeach
                        @else
                            @foreach($prize_3->{key($prize_3)} as $k=>$p3)
                                <td class="col-xs-3  div-horizontal">{{ $p3 }} </td>
                            @endforeach
                        @endif
                    </td>
                </tr>

                <tr> @php $prize_4 = json_decode($printresult->prize_4);  @endphp
                    <td class="{{ key($prize_4) }}" > {{ key($prize_4) }}</td>
                    <td class="text-center circle-no"><i></i><i></i><i></i><i></i></td>
                    
                        @if(count((array) $prize_4) <= 1)

                            @foreach($prize_4->{key($prize_4)} as $k=>$p4)
                                <td class="col-xs-3  div-horizontal">{{ $p4 }} </td>
                            @endforeach
                        @else
                            @foreach($prize_4->{key($prize_4)} as $k=>$p4)
                                <td class="col-xs-3  div-horizontal">{{ $p4 }} </td>
                            @endforeach
                        @endif
                    
                </tr>

                 <tr> @php $prize_5 = json_decode($printresult->prize_5);  @endphp
                    <td class="{{ key($prize_4) }}" > {{ key($prize_5) }}</td>
                    <td class="text-center circle-no"><i></i><i></i><i></i></td>
                    @if(count((array) $prize_5) <= 1)

                        @foreach($prize_5->{key($prize_5)} as $k=>$p4)
                            <td class="col-xs-3  div-horizontal">{{ $p4 }} </td>
                        @endforeach
                    @else
                        @foreach($prize_5->{key($prize_5)} as $k=>$p4)
                            <td class="col-xs-3  div-horizontal">{{ $p4 }} </td>
                        @endforeach
                    @endif
                </tr>

                </tbody>
            </table>
        </div>
        <hr class="line-header"/>
        
        <!-- <div class="block-main-content">
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
        </div> -->

    </div>
    @php $g++;  @endphp

@endforeach


