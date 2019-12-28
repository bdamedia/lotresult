@include('header')

<div class="main-content">
    <div class="container">
    <div class="row margin-b">
    <div class="col-xs-12 col-sm-12 col-md-6 xsmbday">

    <div class="row">
        @include('todayResult')
    <div class="col-xs-12">

        <div class="tab" role="tabpanel">
            <ul class="nav-tabs day-selector">
                <li class={{ request()->segment(count(request()->segments())) == 'ket-qua-xo-so-mien-bac' ? 'active-tab-new' : '' }}><a href="/ket-qua-xo-so-mien-bac" title="XSMB Thứ 2">Miền Bắc</a></li>
                <li class={{ request()->segment(count(request()->segments())) == 'kqxsmb-thu-hai' ? 'active-tab-new' : '' }}><a href="/ket-qua-xo-so-mien-bac/kqxsmb-thu-hai" title="XSMB Thứ 2">Thứ hai</a></li>
                <li class={{ request()->segment(count(request()->segments())) == 'kqxsmb-thu-ba' ? 'active-tab-new' : '' }}><a href="/ket-qua-xo-so-mien-bac/kqxsmb-thu-ba" title="XSMB Thứ 3">Thứ ba</a></li>
                <li class={{ request()->segment(count(request()->segments())) == 'kqxsmb-thu-tu' ? 'active-tab-new' : '' }}><a href="/ket-qua-xo-so-mien-bac/kqxsmb-thu-tu" title="XSMB Thứ 4">Thứ tư</a></li>
                <li class={{ request()->segment(count(request()->segments())) == 'kqxsmb-thu-nam' ? 'active-tab-new' : '' }}><a href="/ket-qua-xo-so-mien-bac/kqxsmb-thu-nam" title="XSMB Thứ 5">Thứ năm</a></li>
                <li class={{ request()->segment(count(request()->segments())) == 'kqxsmb-thu-sau' ? 'active-tab-new' : '' }}><a href="/ket-qua-xo-so-mien-bac/kqxsmb-thu-sau" title="XSMB Thứ 6">Thứ sáu</a></li>
                <li class={{ request()->segment(count(request()->segments())) == 'kqxsmb-thu-bay' ? 'active-tab-new' : '' }} ><a href="/ket-qua-xo-so-mien-bac/kqxsmb-thu-bay" title="XSMB Thứ 7">Thứ bảy</a></li>
                <li class={{ request()->segment(count(request()->segments())) == 'kqxsmb-chu-nhat' ? 'active-tab-new' : '' }}><a href="/ket-qua-xo-so-mien-bac/kqxsmb-chu-nhat" title="XSMB Chủ Nhật">Chủ Nhật</a></li>
            </ul>
        </div>

        @php $g = 1; @endphp
        @foreach($content as $printresult)

    <div class="block remove-margin" id='xsmb-{{ $g }}'>
        <div class="block-main-heading">
            <h1>{{ $printresult['lottery_region'] }}</h1>
            </div>
            <div class="list-link">
            <h2 class="class-title-list-link">
                @php $dayName = $printresult['day']; $dayName = getDaySlug($dayName); $dateexp  = explode('/',$printresult['result_day_time']); $dateexp = implode('-',$dateexp); @endphp
                <a href="/{{ getRegionSlug($printresult['lottery_region']) }}" title="{{ $printresult['lottery_region'] }}" class="u-line">{{ $printresult['lottery_region'] }}</a><span>»</span>
                <a href="/{{ getRegionSlug($printresult['lottery_region']) }}/kq{{ strtolower($printresult['lottery_region']) }}-{{$dayName}}" title="{{ $printresult['lottery_region'] }} {{ $printresult['day'] }}" class="u-line">{{ $printresult['lottery_region'] }} Thứ 6</a><span>»</span>
                <a href="/{{ getRegionSlug($printresult['lottery_region']) }}/kq{{ strtolower($printresult['lottery_region']) }}-ngay-{{ $dateexp }}" title="{{ $printresult['lottery_region'] }}  {{ $printresult['day'] }}" class="u-line">  {{ $printresult['lottery_region'] }} {{ $printresult['result_day_time'] }}</a>
            </h2>
            </div>
            <div class="block-main-content">
            <table class="table table-bordered table-striped table-xsmb">
            <tbody>
            <tr>
            <td style="width: 15%"> @php $prize_1 = json_decode($printresult['prize_1']); @endphp {{ key($prize_1) }}</td>
            <td class="text-center">
                @foreach($prize_1->{key($prize_1)} as $k=>$p1)
                    <span class="col-xs-4 special-code div-horizontal">{{ $p1 }} </span>
                    @endforeach
            </td>
            </tr>
            <tr>
            <td class="ĐB">@php $prize_2 = json_decode($printresult['prize_2']);  @endphp {{ key($prize_2) }}</td>
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
            <td>@php $prize_3 = json_decode($printresult['prize_3']);  @endphp {{ key($prize_3) }}</td>
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
                <td>@php $prize_4 = json_decode($printresult['prize_4']);   @endphp {{ key($prize_4) }}</td>
                <td class="text-center">
                    @if(count((array) $prize_4) <= 1)
                        @foreach($prize_4 as $k=>$p4)
                            <span class="number-black-bold div-horizontal">@php if(count($p4) > 0 ){ foreach ($p4 as $p41) { echo "<span class='col-xs-6' >$p41</span>"; } }  @endphp  </span>
                        @endforeach
                    @else
                        @foreach($prize_4->{key($prize_4)} as $k=>$p4)
                            <span class="number-black-bold div-horizontal">{{ $p4 }} </span>
                        @endforeach
                    @endif
                </td>
            </tr>

            <tr>
                <td>@php $prize_5 = json_decode($printresult['prize_5']);  @endphp {{ key($prize_5) }}</td>
                <td class="text-center">
                    @if(count((array) $prize_5) <= 1)
                        @foreach($prize_5 as $k=>$p5)
                            <span class="number-black-bold div-horizontal">@php if(count($p5) > 0 ){ foreach ($p5 as $p51) { echo "<span class='col-xs-4' >$p51</span>"; } }  @endphp </span>
                        @endforeach

                    @else
                        @foreach($prize_5->{key($prize_5)} as $k=>$p5)
                            <span class="number-black-bold div-horizontal">{{ $p5 }} </span>
                        @endforeach
                    @endif
                </td>
            </tr>
            <tr>
                <td>@php  $prize_6 = json_decode($printresult['prize_6']);  @endphp {{ key($prize_6) }}</td>
                <td class="text-center">
                    @if(count((array) $prize_6) <= 1)
                        @foreach($prize_6 as $k=>$p6)
                            <span class="number-black-bold div-horizontal">@php if(count($p6) > 0 ){ foreach ($p6 as $p61) { echo "<span class='col-xs-3' >$p61</span>"; } }  @endphp </span>
                        @endforeach
                    @else
                        @foreach($prize_6->{key($prize_6)} as $k=>$p6)
                            <span class="number-black-bold div-horizontal">{{ $p6 }} </span>
                        @endforeach
                    @endif
                </td>
            </tr>
            <tr>
                <td>@php $prize_7 = json_decode($printresult['prize_7']);  @endphp {{ key($prize_7) }}</td>
                <td class="text-center">
                    @if(count((array) $prize_7) <= 1)
                        @foreach($prize_7 as $k=>$p7)
                            <span class="number-black-bold div-horizontal">@php if(count($p7) > 0 ){ foreach ($p7 as $p71) { echo "<span class='col-xs-4' >$p71</span>"; } }  @endphp </span>
                        @endforeach
                    @else
                        @foreach($prize_7->{key($prize_7)} as $k=>$p7)
                            <span class="number-black-bold div-horizontal">{{ $p7 }} </span>
                        @endforeach
                    @endif
                </td>
            </tr>
            <tr>
                <td>@php $prize_8 = json_decode($printresult['prize_8']);   @endphp {{ key($prize_8) }}</td>
                <td class="text-center">
                    @if(count((array) $prize_8) <= 1)
                        @foreach($prize_8 as $k=>$p8)
                            <span class="number-black-bold div-horizontal">@php if(count($p8) > 0 ){ foreach ($p8 as $p81) { echo "<span class='col-xs-4' >$p81</span>"; } }  @endphp </span>
                        @endforeach
                    @else
                        @foreach($prize_8->{key($prize_8)} as $k=>$p8)
                            <span class="number-black-bold div-horizontal">{{ $p8 }} </span>
                        @endforeach
                    @endif
                </td>
            </tr>
            <tr>
                <td class="ĐB">@php $prize_9 = json_decode($printresult['prize_9']);   @endphp {{ key($prize_9) }}</td>
                <td class="text-center">
                    @if(count((array) $prize_9) <= 1)
                        @foreach($prize_9 as $k=>$p9)
                            <span class="number-black-bold div-horizontal ">@php if(count($p9) > 0 ){ foreach ($p9 as $p91) { echo "<span class='col-xs-3' >$p91</span>"; } }  @endphp  </span>
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
                    @php $dayName = $printresult['day']; $dayName = getDaySlug($dayName); $dateexp  = explode('/',$printresult['result_day_time']); $dateexp = implode('-',$dateexp); @endphp
                      <a href="/{{ getRegionSlug($printresult['lottery_region']) }}/{{ getRegionLotoSlug($printresult['lottery_region']) }}" >Lô tô {{ $printresult['lottery_region'] }}</a> >>
                    <a href="/{{ getRegionSlug($printresult['lottery_region']) }}/{{ getRegionLotoSlug($printresult['lottery_region']) }}/kqlt{{ substr(strtolower($printresult['lottery_region']),2,4) }}-{{ $dayName   }}" title="{{ $printresult['lottery_region'] }}  {{ $printresult['day'] }}" class="u-line">Lô tô  ({{ $printresult['lottery_region'] }}) {{ $printresult['day'] }} </a>

                </span>

            <table class="table table-bordered table-loto" style="margin-bottom: 0;">
            <tr>
            <th class="col-md-2" style="width: 10%;">Đầu</th>
            <th class="col-md-4">Lô Tô</th>
            </tr>
                @if($printresult['board'])
                    @php $boardRes = json_decode($printresult['board']) @endphp
                @foreach($boardRes as $ke=>$bingoData)
                <tr>
                    <td class="text-center">{{ $ke }}</td><td>{{ $bingoData }}</td>
                </tr>
                @endforeach
                @endif

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
