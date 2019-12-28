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


    <div class="block" id='xsmb-{{ $g }}'>
        <div class="block-main-heading">
            <h1>@if($printresult->lottery_region == 'XSMN') {{ "Xổ số miền Nam" }} ({{ $printresult->lottery_region }}) @elseif($printresult->lottery_region == 'XSMT') {{ "Xổ số miền Trung" }} ({{ $printresult->lottery_region }}) @elseif($printresult->lottery_region == 'XSMB') {{ "Xổ số miền Bắc" }} ({{ $printresult->lottery_region }}) @endif    - {{ getCompanyName($printresult->lottery_company) }}</h1>
            </div>
            <div class="list-link">
            <h2 class="class-title-list-link">
                @php $dayName = $printresult->result_day_time->toDateTime()->format('l'); $dayName = getDaySlug($dayName); @endphp
                <a href="/{{ getRegionSlug($printresult->lottery_region) }}" title="XSMB" class="u-line">{{ $printresult->lottery_region }}</a><span> » </span>
                <a href="/{{ getRegionSlug($printresult->lottery_region) }}/kq{{ strtolower($printresult->lottery_region) }}-{{$dayName}}" title="{{ $printresult->lottery_region }} Thứ 6" class="u-line">{{ $printresult->lottery_region }} {{ $printresult->result_day_time->toDateTime()->format('l') }}</a><span> » </span>
                <a href="/{{ getRegionSlug($printresult->lottery_region) }}/kqxs-{{ getCompanySlug($printresult->lottery_company) }}-ngay-{{ $printresult->result_day_time->toDateTime()->format('d-m-Y') }}" title="{{ $printresult->lottery_region }}  {{ $printresult->result_day_time->toDateTime()->format('d/m/y') }}" class="u-line">  {{ getCompanyName($printresult->lottery_company) }} ({{ $printresult->lottery_region }}) {{ $printresult->result_day_time->toDateTime()->format('d/m/y') }}</a>
            </h2>
            </div>
            <div class="block-main-content">
            <table class="table table-bordered table-striped table-xsmb">
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
                            <span class="number-black-bold div-horizontal">@php if(count((array) $p5) > 0 ){ $p5 = implode(', ',(array) $p5); }  @endphp {{ $p5  }} </span>
                        @endforeach

                    @else
                        @foreach($prize_5->{key($prize_5)} as $k=>$p5)
                            <span class="number-black-bold div-horizontal">{{ $p5 }} </span>
                        @endforeach
                    @endif
                </td>
            </tr>

            <tr>@php  $prize_6 = json_decode($printresult->prize_6);  @endphp
                <td class="{{ key($prize_6) }}" > {{ key($prize_6) }}</td>
                <td class="text-center">
                    @if(count((array) $prize_6) <= 1)
                        @foreach($prize_6 as $k=>$p6)
                            <span class="number-black-bold div-horizontal">@php if(count((array) $p6) > 0 ){ $p6 = implode(', ',(array) $p6); }  @endphp {{ $p6 }} </span>
                        @endforeach
                    @else
                        @foreach($prize_6->{key($prize_6)} as $k=>$p6)
                            <span class="number-black-bold div-horizontal">{{ $p6 }} </span>
                        @endforeach
                    @endif
                </td>
            </tr>

            <tr> @php $prize_7 = json_decode($printresult->prize_7);  @endphp
                <td class="{{ key($prize_7) }}" > {{ key($prize_7) }}</td>
                <td class="text-center">
                    @if(count((array) $prize_7) <= 1)
                        @foreach($prize_7 as $k=>$p7)
                            <span class="number-black-bold div-horizontal">@php if(count((array) $p7) > 0 ){ $p7 = implode(', ',(array) $p7); }  @endphp {{ $p7 }} </span>
                        @endforeach
                    @else
                        @foreach($prize_7->{key($prize_7)} as $k=>$p7)
                            <span class="number-black-bold div-horizontal">{{ $p7 }} </span>
                        @endforeach
                    @endif
                </td>
            </tr>

            <tr> @php $prize_8 = json_decode($printresult->prize_8);   @endphp
                <td class="{{ key($prize_8) }}" > {{ key($prize_8) }}</td>
                <td class="text-center">
                    @if(count((array) $prize_8) <= 1)
                        @foreach($prize_8 as $k=>$p8)
                            <span class="number-black-bold div-horizontal">@php if(count((array) $p8) > 0 ){ $p8 = implode(', ',(array) $p8); }  @endphp {{ $p8 }} </span>
                        @endforeach
                    @else
                        @foreach($prize_8->{key($prize_8)} as $k=>$p8)
                            <span class="number-black-bold div-horizontal">{{ $p8 }} </span>
                        @endforeach
                    @endif
                </td>
            </tr>

            <tr> @php $prize_9 = json_decode($printresult->prize_9);   @endphp
                <td class="ĐB {{ key($prize_9) }}" > {{ key($prize_9) }}</td>
                <td class="text-center">
                    @if(count((array) $prize_9) <= 1)
                        @foreach($prize_9 as $k=>$p9)
                            <span class="number-black-bold div-horizontal">@php if(count((array) $p9) > 0 ){ $p9 = implode(', ',(array) $p9); }  @endphp {{ $p9 }} </span>
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

            <span class="link-pad-left padding10 class-title-list-link">
                <a class="u-line" href="/{{ getRegionSlug($printresult->lottery_region) }}/{{ getRegionLotoSlug($printresult->lottery_region) }}" >Lô tô {{ $printresult->lottery_region }}</a> >>
                                            <a href="/{{ getRegionSlug($printresult->lottery_region) }}/{{ getRegionLotoSlug($printresult->lottery_region) }}/kqlt{{ substr(strtolower($printresult->lottery_region),2,4) }}-{{ $dayName   }}" title="{{ $printresult->lottery_region }}  {{ $printresult->result_day_time->toDateTime()->format('l') }}" class="u-line">Lô tô  {{ $printresult->lottery_region }} {{ $printresult->result_day_time->toDateTime()->format('l') }} </a>
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
