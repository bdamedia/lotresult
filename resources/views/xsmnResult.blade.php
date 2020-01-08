@include('header')

<div class="main-content">
    <div class="container">
    <div class="row margin-b">
    <div class="col-xs-12 col-sm-12 col-md-6">

    <div class="row">
        @include('todayResult')
    <div id="post-data" class="col-xs-12">

        @php $g = 1; @endphp
        @foreach($content as $printresult)


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
                    <p><span><a href="/ket-qua-xo-so-mien-nam/kqxs-{{ getCompanySlug($printresult->lottery_company) }}-ngay-{{ $printresult->result_day_time->toDateTime()->format('d-m-Y') }}" title="{{ $printresult->lottery_region }}  {{ $printresult->result_day_time->toDateTime()->format('d/m/y') }}">Kết quả Xổ số {{ getCompanyName($printresult->lottery_company) }} {{ $printresult->result_day_time->toDateTime()->format('d/m/y') }}</a></span></p>
                </div>
            </div>

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

            <tr>@php  $prize_6 = json_decode($printresult->prize_6);  @endphp
                <td class="{{ key($prize_6) }}" > {{ key($prize_6) }}</td>
                <td class="text-center">
                    @if(count((array) $prize_6) <= 1)
                        @foreach($prize_6 as $k=>$p6)
                            <span class="number-black-bold div-horizontal">@php if(count((array) $p6) > 0 ){ foreach ($p6 as $p61) { echo "<span class='col-xs-6' >$p61</span>"; } }  @endphp  </span>
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
                            <span class="number-black-bold div-horizontal">@php if(count((array) $p7) > 0 ){ foreach ($p7 as $p71) { echo "<span class='col-xs-12' >$p71</span>"; } }  @endphp </span>
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
            @php $g++; @endphp
    @endforeach


    </div>
        <div class="top-margin col-xs-12">
            @php $page = 1; @endphp
            <a id="loadmore" data-page="2" onclick="loadMoreData(@php echo $page++; @endphp)" href="javascript:void(0);" >Xem thêm</a>
        </div>
        <div class="col-xs-12">
            <!-- /21689237362/xoso-content-ads -->
            <div id='div-gpt-ad-1578217977238-0' style='margin: 0 auto; width: 336px; height: 280px;'>
                <script>
                    googletag.cmd.push(function() { googletag.display('div-gpt-ad-1578217977238-0'); });
                </script>
            </div>

        </div>
    </div>


    </div>


        @include('sidebar')
    </div>
    </div>
</div>
@include('footer')
<script>

    function loadMoreData(page){
        var page = $('#loadmore').attr('data-page');
        $.ajax(
            {
                url: '?page=' + page,
                type: "get",
                beforeSend: function()
                {
                    $('.ajax-load').show();
                }
            })
            .done(function(data)
            {
                if(data.html == " "){
                    $('.ajax-load').html("No more records found");
                    return;
                }
                $('.ajax-load').hide();

                $("#post-data").append(data.html);
                page = parseInt(page) + 1;
                $('#loadmore').attr('data-page',page);
            })
            .fail(function(jqXHR, ajaxOptions, thrownError)
            {
                console.log('server not responding...');
            });
    }
</script>