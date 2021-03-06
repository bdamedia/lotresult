@php $prize_1 = json_decode($lot['prize_1']); @endphp
@php $prize_2 = json_decode($lot['prize_2']); @endphp
@php $prize_3 = json_decode($lot['prize_3']); @endphp
@php $prize_4 = json_decode($lot['prize_4']); @endphp
@php $prize_5 = json_decode($lot['prize_5']); @endphp
@php $prize_6 = json_decode($lot['prize_6']); @endphp

@php $board = json_decode($lot['board']); @endphp

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


   @php $boardRes = $board @endphp

<div class="block remove-margin" id='xsmb-{{ $g }}'>
    <div class="block-main-heading">
        <h1>{{ $title }} {{ $current['lottery_company'] }} ngày {{ $current['result_day_time'] }}</h1>
    </div>
    <div class="list-link">
        <h2 class="class-title-list-link">
            @php $dayName = $current['day']; $dayName = getDaySlug($dayName); $dateexp  = explode('/',$current['result_day_time']); $dateexp = implode('-',$dateexp); @endphp
            <a href="/{{ getRegionSlug($current['lottery_region']) }}/kqvietlott-xo-so-max-3d" title="{{ $current['lottery_region'] }}" class="u-line">
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
