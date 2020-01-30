@php $prize_1 = json_decode($lot['prize_1']); @endphp
@php $prize_2 = json_decode($lot['prize_2']); @endphp
@php $prize_3 = json_decode($lot['prize_3']); @endphp
@php $prize_4 = json_decode($lot['prize_4']); @endphp
@php $prize_5 = json_decode($lot['prize_5']); @endphp
@php $prize_6 = json_decode($lot['prize_6']); @endphp
@php $prize_7 = json_decode($lot['prize_7']); @endphp
@php $prize_8 = json_decode($lot['prize_8']); @endphp

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

<!-- @php print_r($prize_6); @endphp
@php print_r($prize_7); @endphp
@php print_r($prize_8); @endphp -->

@php $td1 = '<td class="" style="width: 15%"><span class="text-red">'.key($prize_1).'</span></td>'; @endphp
@php $tdr1 = '<td class="'.key($prize_2).'" style="width: 15%">'.key($prize_2).'</td>'; @endphp
@php $tdr2 = '<td class="'.key($prize_3).'" style="width: 15%">'.key($prize_3).'</td>'; @endphp
@php $tdr3 = '<td class="'.key($prize_4).'" style="width: 15%">'.key($prize_4).'</td>'; @endphp


@php $current = current($printresult);  @endphp

<div class="block remove-margin" id='xsmb-{{ $g }}'>
    <div class="block-main-heading">
        <h1>{{ $title }} {{ $current['lottery_company'] }} ngày {{ $current['result_day_time'] }}</h1>
    </div>

    @php    
        if($prize_6) {
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
            @php $dayName = $current['day']; $dayName = getDaySlug($dayName); $dateexp  = explode('/',$current['result_day_time']); $dateexp = implode('-',$dateexp); @endphp
            <a href="/{{ getRegionSlug($current['lottery_region']) }}" title="{{ $current['lottery_region'] }}" class="u-line">
                {{ $current['lottery_company'] }}
            </a><span> » </span>

            <a href="/{{ getRegionSlug($current['lottery_region']) }}/{{ preg_replace('/\s+/', '-', strtolower($current['lottery_company'])) }}-{{$dayName}}" title="{{ $current['lottery_region'] }} {{ engToVit($current['day'])  }}" class="u-line">
                {{ $current['lottery_company'] }} {{ engToVit($current['day'])  }}
            </a><span> » </span>
            <a href="/ket-qua-vietlott-new/{{ strtolower($current['lottery_region']) }}-ngay-{{ $dateexp }}" title="{{ $current['lottery_region'] }}  {{ $current['day'] }}" class="u-line"> 
                 {{ $current['lottery_company'] }} {{ $current['result_day_time'] }}
            </a>

        </h2>
    </div>

    <p class="para text-black-bold">Kỳ 549: Chủ Nhật, {{ $current['result_day_time'] }}</p>
    <div class="mega-detail">
        <ul>
           @php if($boards){ 
                for($m = 0; $m < 5; $m++) {
                     foreach($boards as $kk=>$bb) {
                         echo "<li>".$boards[$kk][$m]."</li>";
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


    {{--<p class="text-right margin-10 hidden-xs hidden-sm">
        <a href="/in-ve-do.html" data-date="13-12-2019" data-groupname="xsmb" class="btn btn-danger btn-invedo"
           role="button">In Vé Dò</a>
    </p>--}}

    {{--<div class="block-main-content view-loto">
        <p class="padding10">
            <a href="/{{ getRegionSlug($current['lottery_region']) }}/{{ getRegionLotoSlug($current['lottery_region']) }}"  class="u-line">Lô tô {{ $current['lottery_region'] }}</a><span> » </span>
            <a href="/{{ getRegionSlug($current['lottery_region']) }}/{{ getRegionLotoSlug($current['lottery_region']) }}/kqlt{{ substr(strtolower($current['lottery_region']),2,4) }}-{{ $dayName   }}" title="{{ $current['lottery_region'] }}  {{ $current['day'] }}" class="u-line">Lô tô  {{ $current['lottery_region'] }} {{ engToVit($current['day']) }} </a>
        </p>
        <table class="table table-bordered table-loto">
            <tbody>
            <tr>
                <th class="col-md-2" style="width: 10%;">Đầu</th>

                @php if($th){ echo $th; }else{ echo "<th> Lô tô  </th>"; } @endphp

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
    </div>--}}
</div>
