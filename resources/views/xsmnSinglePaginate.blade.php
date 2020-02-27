@php $g = 1; $lastDate=''; @endphp

@include('vietlottTopSearch')

@foreach($content as $printresult)

    @php $pattern = '/^'.$selected_number.'/'; @endphp

    <div class="remove-margin block" id='xsmb-{{ $g }}'>
        <div class="block-main-heading">
            <h1>
                @if($printresult->lottery_region == 'XSMN') {{ "Kết Quả Xổ số " }}  {{ getCompanyName($printresult->lottery_company) }} ({{ $printresult->lottery_company }})

                @elseif($printresult->lottery_region == 'XSMT') {{ "Kết Quả Xổ số " }} {{ getCompanyName($printresult->lottery_company) }} ({{ $printresult->lottery_company }})

                @elseif($printresult->lottery_region == 'XSMB') {{ "Kết Quả Xổ số " }} {{ getCompanyName($printresult->lottery_company) }} ({{ $printresult->lottery_company }})

                @endif </h1>
        </div>
        <div class="list-link">
            <h2 class="class-title-list-link">
                @php $dayName = $printresult->result_day_time->toDateTime()->format('l'); $dayName = getDaySlug($dayName); @endphp

                <a href="/{{ getRegionSlug($printresult->lottery_region) }}" title="{{ $printresult->lottery_region }}" >{{ $printresult->lottery_region }}</a><span> » </span>
                <a href="/{{ getRegionSlug($printresult->lottery_region) }}/kq{{ strtolower($printresult->lottery_region) }}-{{$dayName}}" title="{{ $printresult->lottery_region }} {{ engToVit($printresult->result_day_time->toDateTime()->format('l')) }}">{{ $printresult->lottery_region }} {{ engToVit($printresult->result_day_time->toDateTime()->format('l')) }}</a><span> » </span>
                <a href="/{{ getRegionSlug($printresult->lottery_region) }}/kq{{ strtolower($printresult->lottery_region) }}-ngay-{{ $printresult->result_day_time->toDateTime()->format('d-m-Y') }}" title="{{ $printresult->lottery_region }}  {{ $printresult->result_day_time->toDateTime()->format('d/m/y') }}" >{{ $printresult->lottery_region }} {{ $printresult->result_day_time->toDateTime()->format('d/m/y') }}</a>

            </h2>
        </div>

        <div id="u129" class="ax_default box_2">
            <div id="u129_text" class="text">
                <p><span><a href="/ket-qua-xsmn/kqxs-{{ getCompanySlug($printresult->lottery_company) }}-ngay-{{ $printresult->result_day_time->toDateTime()->format('d-m-Y') }}" title="{{ $printresult->lottery_region }}  {{ $printresult->result_day_time->toDateTime()->format('d/m/y') }}">Kết quả Xổ số {{ getCompanyName($printresult->lottery_company) }} {{ $printresult->result_day_time->toDateTime()->format('d/m/y') }}</a></span></p>
            </div>
        </div>

        <div class="block-main-content">
            <table class="table table-bordered table-striped table-xsmn">
                <tbody>
                <tr> @php $prize_1 = json_decode($printresult->prize_1); @endphp
                    <td class="ĐB {{ key($prize_1) }}" style="width: 15%">  {{ key($prize_1) }}</td>
                    <td class="text-center">
                        @foreach($prize_1->{key($prize_1)} as $k=>$p1)
                            @php
                                $subject = $p1;
                                $count = strlen($selected_number);
                                $selected_values = substr($subject, -$count);
                                $not_selected_values = substr($subject, 0, -$count);
                            @endphp
                            @if($selected_values == $selected_number)
                                <span class="number-black-bold">{{$not_selected_values}}<span style="color:red">{{$selected_values}}</span></span>
                            @else
                                <span class=" number-black-bold div-horizontal ">{{ $p1 }} </span>
                            @endif

                        @endforeach
                    </td>
                </tr>

                <tr> @php $prize_2 = json_decode($printresult->prize_2);   @endphp
                    <td class="{{ key($prize_2) }}" > {{ key($prize_2) }}</td>
                    <td class="text-center">
                        @if(count((array) $prize_2) <= 1)
                            @foreach($prize_2->{key($prize_2)} as $k=>$p2)
                                @php
                                    $subject = $p2;
                                    $count = strlen($selected_number);
                                    $selected_values = substr($subject, -$count);
                                    $not_selected_values = substr($subject, 0, -$count);
                                @endphp
                                @if($selected_values == $selected_number)
                                    <span class="number-black-bold">{{$not_selected_values}}<span style="color:red">{{$selected_values}}</span></span>
                                @else 
                                    <span class="number-black-bold div-horizontal">{{ $p2 }} </span>
                                @endif

                            @endforeach
                        @else
                            @foreach($prize_2->{key($prize_2)} as $k=>$p2)
                                @php
                                    $subject = $p2;
                                    $count = strlen($selected_number);
                                    $selected_values = substr($subject, -$count);
                                    $not_selected_values = substr($subject, 0, -$count);
                                @endphp
                                @if($selected_values == $selected_number)
                                    <span class="number-black-bold">{{$not_selected_values}}<span style="color:red">{{$selected_values}}</span></span>
                                @else 
                                    <span class="col-xs-4 special-code div-horizontal">{{ $p2 }} </span>
                                @endif

                            @endforeach
                        @endif
                    </td>
                </tr>

                <tr> @php $prize_3 = json_decode($printresult->prize_3);  @endphp
                    <td class="{{ key($prize_3) }}" > {{ key($prize_3) }}</td>
                    <td class="text-center">
                        @if(count((array) $prize_3) <= 1)
                            @foreach($prize_3->{key($prize_3)} as $k=>$p3)
                                @php
                                    $subject = $p3;
                                    $count = strlen($selected_number);
                                    $selected_values = substr($subject, -$count);
                                    $not_selected_values = substr($subject, 0, -$count);
                                @endphp
                                @if($selected_values == $selected_number)
                                     <span class="number-black-bold">{{$not_selected_values}}<span style="color:red">{{$selected_values}}</span></span>
                                @else
                                    <span class="number-black-bold div-horizontal">{{ $p3 }} </span>
                                @endif
                            @endforeach
                        @else
                            @foreach($prize_3->{key($prize_3)} as $k=>$p3)
                                @php
                                    $subject = $p3;
                                    $count = strlen($selected_number);
                                    $selected_values = substr($subject, -$count);
                                    $not_selected_values = substr($subject, 0, -$count);
                                @endphp
                                @if($selected_values == $selected_number)
                                     <span class="number-black-bold">{{$not_selected_values}}<span style="color:red">{{$selected_values}}</span></span>
                                @else
                                    <span class="number-black-bold div-horizontal">{{ $p3 }} </span>
                                @endif
                            @endforeach
                        @endif
                    </td>
                </tr>

                <tr> @php $prize_4 = json_decode($printresult->prize_4);  @endphp
                    <td class="{{ key($prize_4) }}" > {{ key($prize_4) }}</td>
                    <td class="text-center">
                        @if(count((array) $prize_4) <= 1)
                            @foreach($prize_4->{key($prize_4)} as $k=>$p4)
                                @php
                                    $subject = $p4;
                                    $count = strlen($selected_number);
                                    $selected_values = substr($subject, -$count);
                                    $not_selected_values = substr($subject, 0, -$count);
                                @endphp
                                @if($selected_values == $selected_number)
                                    <span class="number-black-bold">{{$not_selected_values}}<span style="color:red">{{$selected_values}}</span></span>
                                @else
                                    <span class="number-black-bold div-horizontal">{{ $p4 }} </span>
                                @endif
                            @endforeach
                        @else
                            @foreach($prize_4->{key($prize_4)} as $k=>$p4)
                                @php
                                    $subject = $p4;
                                    $count = strlen($selected_number);
                                    $selected_values = substr($subject, -$count);
                                    $not_selected_values = substr($subject, 0, -$count);
                                @endphp
                                @if($selected_values == $selected_number)
                                    <span class="number-black-bold">{{$not_selected_values}}<span style="color:red">{{$selected_values}}</span></span>
                                @else
                                    <span class="number-black-bold div-horizontal">{{ $p4 }} </span>
                                @endif
                            @endforeach
                        @endif
                    </td>
                </tr>

                <tr> @php $prize_5 = json_decode($printresult->prize_5);  @endphp
                    <td class="{{ key($prize_5) }}" > {{ key($prize_5) }}</td>
                    <td class="text-center">
                        @if(count((array) $prize_5) <= 1)
                            @foreach($prize_5 as $k=>$p5)
                                <span class="number-black-bold div-horizontal">
                                @php if(count((array) $p5) > 0 ){ 
                                $tp = 1;
                                foreach ($p5 as $p51) { 
                                    $subject = $p51;
                                    $count = strlen($selected_number);
                                    $selected_values = substr($subject, -$count);
                                    $not_selected_values = substr($subject, 0, -$count);
                                    if($tp > 3){ 
                                        if($selected_values == $selected_number) {
                                            echo "<p class='col-xs-3' style='margin: 0px'>$not_selected_values</span><span style='color:red'>$selected_values</span></p>";  
                                        } else {
                                            echo "<span class='col-xs-3'>$p51</span>"; 
                                        }
                                    } else{ 
                                        if($selected_values == $selected_number) {
                                            echo "<p class='col-xs-3' style='margin: 0px'>$not_selected_values</span><span style='color:red'>$selected_values</span></p>";  
                                        } else {
                                            echo "<span class='col-xs-3'>$p51</span>"; 
                                        }
                                    } 
                                    $tp++; 
                                }
                            }@endphp </span>
                            @endforeach

                        @else
                            @foreach($prize_5->{key($prize_5)} as $k=>$p5)
                                @php
                                    $subject = $p5;
                                    $count = strlen($selected_number);
                                    $selected_values = substr($subject, -$count);
                                    $not_selected_values = substr($subject, 0, -$count);
                                @endphp
                                @if($selected_values == $selected_number)
                                    <span class="number-black-bold">{{$not_selected_values}}<span style="color:red">{{$selected_values}}</span></span>
                                @else
                                    <span class="number-black-bold div-horizontal">{{ $p5 }} </span>
                                @endif
                            @endforeach
                        @endif
                    </td>
                </tr>

                <tr>@php  $prize_6 = json_decode($printresult->prize_6);  @endphp
                    <td class="{{ key($prize_6) }}" > {{ key($prize_6) }}</td>
                    <td class="text-center">
                        @if(count((array) $prize_6) <= 1)
                            @foreach($prize_6 as $k=>$p6)
                                <span class="number-black-bold div-horizontal">
                                @php 
                                if(count((array) $p6) > 0 ){ 
                                    foreach ($p6 as $p61) { 
                                    $subject = $p61;
                                    $count = strlen($selected_number);
                                    $selected_values = substr($subject, -$count);
                                    $not_selected_values = substr($subject, 0, -$count);
                                    @endphp

                                    @if($selected_values == $selected_number)
                                        <span class="col-xs-6">{{$not_selected_values}}<span style="color:red">{{$selected_values}}</span></span>
                                    @else
                                        <span class="col-xs-6">{{ $p61 }} </span>
                                    @endif

                                    @php 
                                        
                                    } 
                                }  
                                @endphp</span>
                            @endforeach
                        @else
                            @foreach($prize_6->{key($prize_6)} as $k=>$p6)
                                @php
                                    $subject = $p6;
                                    $count = strlen($selected_number);
                                    $selected_values = substr($subject, -$count);
                                    $not_selected_values = substr($subject, 0, -$count);
                                @endphp
                                @if($selected_values == $selected_number)
                                    <span class="number-black-bold">{{$not_selected_values}}<span style="color:red">{{$selected_values}}</span></span>
                                @else
                                    <span class="number-black-bold div-horizontal">{{ $p6 }} </span>
                                @endif
                            @endforeach
                        @endif
                    </td>
                </tr>

                <tr> @php $prize_7 = json_decode($printresult->prize_7);  @endphp
                    <td class="{{ key($prize_7) }}" > {{ key($prize_7) }}</td>
                    <td class="text-center">
                        @if(count((array) $prize_7) <= 1)
                            @foreach($prize_7 as $k=>$p7)
                                <span class="number-black-bold div-horizontal">
                                    @php if(count((array) $p7) > 0 ){ 
                                        foreach ($p7 as $p71) { 
                                            $subject = $p71;
                                            $count = strlen($selected_number);
                                            $selected_values = substr($subject, -$count);
                                            $not_selected_values = substr($subject, 0, -$count);
                                            @endphp
                                                @if($selected_values == $selected_number)
                                                    <span class="col-xs-12">{{$not_selected_values}}<span style="color:red">{{$selected_values}}</span></span>
                                                @else
                                                    <span class="col-xs-12">{{ $p71 }} </span>
                                                @endif
                                            @php
                                        } 
                                    }  @endphp 
                                </span>
                            @endforeach
                        @else
                            @foreach($prize_7->{key($prize_7)} as $k=>$p7)
                                @php
                                    $subject = $p7;
                                    $count = strlen($selected_number);
                                    $selected_values = substr($subject, -$count);
                                    $not_selected_values = substr($subject, 0, -$count);
                                @endphp
                                @if($selected_values == $selected_number)
                                    <span class="number-black-bold">{{$not_selected_values}}<span style="color:red">{{$selected_values}}</span></span>
                                @else
                                    <span class="number-black-bold div-horizontal">{{ $p7 }} </span>
                                @endif

                            @endforeach
                        @endif
                    </td>
                </tr>

                <tr> @php $prize_8 = json_decode($printresult->prize_8);   @endphp
                    <td class="{{ key($prize_8) }}" > {{ key($prize_8) }}</td>
                    <td class="text-center">
                        @if(count((array) $prize_8) <= 1)
                            @foreach($prize_8 as $k=>$p8)
                                <span class="number-black-bold div-horizontal">
                                    @php 
                                        if(count((array) $p8) > 0 )
                                        { 
                                            $p8 = implode(', ',(array) $p8); 
                                        } 
                                        $subject = $p8;
                                        $count = strlen($selected_number);
                                        $selected_values = substr($subject, -$count);
                                        $not_selected_values = substr($subject, 0, -$count);
                                        @endphp
                                        @if($selected_values == $selected_number)
                                            <span class="col-xs-12">{{$not_selected_values}}<span style="color:red">{{$selected_values}}</span></span>
                                        @else
                                            <span class="col-xs-12">{{ $p8 }} </span>
                                        @endif
                                    </span>
                            @endforeach
                        @else
                            @foreach($prize_8->{key($prize_8)} as $k=>$p8)
                                @php
                                    $subject = $p8;
                                    $count = strlen($selected_number);
                                    $selected_values = substr($subject, -$count);
                                    $not_selected_values = substr($subject, 0, -$count);
                                @endphp
                                @if($selected_values == $selected_number)
                                    <span class="number-black-bold">{{$not_selected_values}}<span style="color:red">{{$selected_values}}</span></span>
                                @else
                                    <span class="number-black-bold div-horizontal">{{ $p8 }} </span>
                                @endif

                            @endforeach
                        @endif
                    </td>
                </tr>

                <tr> @php $prize_9 = json_decode($printresult->prize_9);   @endphp
                    <td class="ĐB {{ key($prize_9) }}" > {{ key($prize_9) }}</td>
                    <td class="text-center">
                        @if(count((array) $prize_9) <= 1)
                            @foreach($prize_9 as $k=>$p9)
                                <span class="number-black-bold div-horizontal">
                                    @php 
                                    if(count((array) $p9) > 0 ){ 
                                        $p9 = implode(', ',(array) $p9); 
                                    }  
                                    
                                    $subject = $p9;
                                    $count = strlen($selected_number);
                                    $selected_values = substr($subject, -$count);
                                    $not_selected_values = substr($subject, 0, -$count);
                                    @endphp
                                    @if($selected_values == $selected_number)
                                        <span class="col-xs-12">{{$not_selected_values}}<span style="color:red">{{$selected_values}}</span></span>
                                    @else
                                        <span class="col-xs-12">{{ $p9 }} </span>
                                    @endif
                                </span>
                            @endforeach
                        @else
                            @foreach($prize_9->{key($prize_9)} as $k=>$p9)
                                @php
                                    $subject = $p9;
                                    $count = strlen($selected_number);
                                    $selected_values = substr($subject, -$count);
                                    $not_selected_values = substr($subject, 0, -$count);
                                @endphp
                                @if($selected_values == $selected_number)
                                    <span class="number-black-bold">{{$not_selected_values}}<span style="color:red">{{$selected_values}}</span></span>
                                @else
                                    <span class="number-black-bold div-horizontal">{{ $p9 }} </span>
                                @endif
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
                <a href="/{{ getRegionSlug($printresult->lottery_region) }}/{{ getRegionLotoSlug($printresult->lottery_region) }}" >Lô tô {{ $printresult->lottery_region }}</a> <span> » </span>
                                            <a href="/{{ getRegionSlug($printresult->lottery_region) }}/{{ getRegionLotoSlug($printresult->lottery_region) }}/kqlt{{ substr(strtolower($printresult->lottery_region),2,4) }}-{{ $dayName   }}" title="{{ $printresult->lottery_region }}  {{ $printresult->result_day_time->toDateTime()->format('l') }}">Lô tô  {{ $printresult->lottery_region }} {{ engToVit($printresult->result_day_time->toDateTime()->format('l')) }} </a>

                                          </span>

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

            </table>
        </div>

    </div>
    @php $g++;  @endphp

@endforeach


