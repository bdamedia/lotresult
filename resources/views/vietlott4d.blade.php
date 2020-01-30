@php $prize_1 = json_decode($lot['prize_1']); @endphp
@php $prize_2 = json_decode($lot['prize_2']); @endphp
@php $prize_3 = json_decode($lot['prize_3']); @endphp
@php $prize_4 = json_decode($lot['prize_4']); @endphp
@php $prize_5 = json_decode($lot['prize_5']); @endphp
@php $prize_6 = json_decode($lot['prize_6']); @endphp

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


@php $current = current($printresult);  @endphp

<div class="block remove-margin" id='xsmb-{{ $g }}'>
    <div class="block-main-heading">
        <h1>{{ $title }} {{ $current['lottery_company'] }} ngày {{ $current['result_day_time'] }}</h1>
    </div>
    <div class="list-link">
        <h2 class="class-title-list-link">
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


    {{--<p class="text-right margin-10 hidden-xs hidden-sm">
        <a href="/in-ve-do.html" data-date="13-12-2019" data-groupname="xsmb" class="btn btn-danger btn-invedo"
           role="button">In Vé Dò</a>
    </p>--}}

    <div class="block-main-content view-loto">
        <table class="table table-bordered table-loto">
            <tbody>
                <tr class="bg">
                    <td colspan="4" class="text-left"><span class="text-blue-bold">Ký hiệu bộ số</span></td>
                </tr>
                
                @php $value = []; @endphp
                @php
                $ab = 0;
                for($m = 0; $m < 6; $m++)
                {
                    if($m == 0 || $m == 2 || $m == 4) {
                        echo "<tr class='text-center'>";
                    }
                  
                    echo "<td class='bg' style='width: 10%'>".$char[$m]."</td>";
                    echo "<td><span class='number-black-bold'>".$boards[$g][$m]."</span></td>";

                    if($m == 1 || $m == 3 || $m == 5) {   
                        echo "</tr>";
                    }
                 }
                @endphp
            </tbody></table>
    </div>
</div>
