@include('header')
<style>
    .list-link {
        background-color:
            #edf2fa;
        padding-bottom: 8px;
        padding-top: 8px;
    }
    .class-title-list-link {
       
        text-align: left;
        padding-left: 15px;
    }
    .special-code {
        color: #000;
        font-size: 24px;
        display: inline-block;
        width: 16%;
       /* border: 1px solid #ccc;*/
    }
</style>
<div class="main-content">
    <div class="container">
        <div class="row margin-b">
            <div class="col-xs-12 col-sm-12 col-md-6 xsmn">

                <div class="row">
                    @include('todayResult')
                    <div id="post-data" class="col-xs-12 {{--{{ $region }}--}}">


                        @if($enableTab ?? '' == true)

                            @if($region == 'xsmt')

                                <div class="tab" role="tabpanel">
                                    <ul class="nav-tabs day-selector">
                                        <li class={{ request()->segment(count(request()->segments())) == 'ket-qua-xsmt' ? 'active-tab-new' : '' }}><a href="/ket-qua-xsmt" title="XSMB Thứ 2">Miền Trung</a></li>
                                        <li class={{ request()->segment(count(request()->segments())) == 'kqxsmt-thu-hai' ? 'active-tab-new' : '' }}><a href="/ket-qua-xsmt/kqxsmt-thu-hai" title="XSMB Thứ 2">Thứ hai</a></li>
                                        <li class={{ request()->segment(count(request()->segments())) == 'kqxsmt-thu-ba' ? 'active-tab-new' : '' }}><a href="/ket-qua-xsmt/kqxsmt-thu-ba" title="XSMB Thứ 3">Thứ ba</a></li>
                                        <li class={{ request()->segment(count(request()->segments())) == 'kqxsmt-thu-tu' ? 'active-tab-new' : '' }}><a href="/ket-qua-xsmt/kqxsmt-thu-tu" title="XSMB Thứ 4">Thứ tư</a></li>
                                        <li class={{ request()->segment(count(request()->segments())) == 'kqxsmt-thu-nam' ? 'active-tab-new' : '' }}><a href="/ket-qua-xsmt/kqxsmt-thu-nam" title="XSMB Thứ 5">Thứ năm</a></li>
                                        <li class={{ request()->segment(count(request()->segments())) == 'kqxsmt-thu-sau' ? 'active-tab-new' : '' }}><a href="/ket-qua-xsmt/kqxsmt-thu-sau" title="XSMB Thứ 6">Thứ sáu</a></li>
                                        <li class={{ request()->segment(count(request()->segments())) == 'kqxsmt-thu-bay' ? 'active-tab-new' : '' }}><a href="/ket-qua-xsmt/kqxsmt-thu-bay" title="XSMB Thứ 7">Thứ bảy</a></li>
                                        <li class={{ request()->segment(count(request()->segments())) == 'kqxsmt-chu-nhat' ? 'active-tab-new' : '' }}><a href="/ket-qua-xsmt/kqxsmt-chu-nhat" title="XSMB Chủ Nhật">Chủ Nhật</a></li>
                                    </ul>
                                </div>
                            @elseif($region == 'xsmn')
                                <div class="tab" role="tabpanel">
                                    <ul class="nav-tabs day-selector">
                                        <li class={{ request()->segment(count(request()->segments())) == 'ket-qua-xsmn' ? 'active-tab-new' : '' }}><a href="/ket-qua-xsmn" title="XSMB Thứ 2">Miền Nam</a></li>
                                        <li class={{ request()->segment(count(request()->segments())) == 'kqxsmn-thu-hai' ? 'active-tab-new' : '' }}><a href="/ket-qua-xsmn/kqxsmn-thu-hai" title="XSMB Thứ 2">Thứ hai</a></li>
                                        <li class={{ request()->segment(count(request()->segments())) == 'kqxsmn-thu-ba' ? 'active-tab-new' : '' }}><a href="/ket-qua-xsmn/kqxsmn-thu-ba" title="XSMB Thứ 3">Thứ ba</a></li>
                                        <li class={{ request()->segment(count(request()->segments())) == 'kqxsmn-thu-tu' ? 'active-tab-new' : '' }}><a href="/ket-qua-xsmn/kqxsmn-thu-tu" title="XSMB Thứ 4">Thứ tư</a></li>
                                        <li class={{ request()->segment(count(request()->segments())) == 'kqxsmn-thu-nam' ? 'active-tab-new' : '' }}><a href="/ket-qua-xsmn/kqxsmn-thu-nam" title="XSMB Thứ 5">Thứ năm</a></li>
                                        <li class={{ request()->segment(count(request()->segments())) == 'kqxsmn-thu-sau' ? 'active-tab-new' : '' }}><a href="/ket-qua-xsmn/kqxsmn-thu-sau" title="XSMB Thứ 6">Thứ sáu</a></li>
                                        <li class={{ request()->segment(count(request()->segments())) == 'kqxsmn-thu-bay' ? 'active-tab-new' : '' }}><a href="/ket-qua-xsmn/kqxsmn-thu-bay" title="XSMB Thứ 7">Thứ bảy</a></li>
                                        <li class={{ request()->segment(count(request()->segments())) == 'kqxsmn-chu-nhat' ? 'active-tab-new' : '' }}><a href="/ket-qua-xsmn/kqxsmn-chu-nhat" title="XSMB Chủ Nhật">Chủ Nhật</a></li>

                                    </ul>
                                </div>
                            @endif

                        @endif



                            @php $g = 1; @endphp
                            @foreach($content as $printresult)
                                    @if($g == 1)
                                    <div style="border-bottom: 2px solid #ccc;" class="block-main-heading">
                                        <h1>Xổ Số Điện toán ({{ $printresult->lottery_region }})</h1>
                                    </div>
                                @endif
                                    <div class="list-link">
                                        <h2 class="class-title-list-link">
                                            @php $dayName = $printresult->result_day_time->toDateTime()->format('l'); $dayName = getDaySlug($dayName); @endphp

                                            <a href="/{{ getRegionSlug($printresult->lottery_region) }}" title="{{ $printresult->lottery_region }}">{{ $printresult->lottery_region }}</a><span> » </span>
                                            <a href="/{{ getRegionSlug($printresult->lottery_region) }}/kq{{ strtolower($printresult->lottery_region) }}-{{$dayName}}" title="{{ $printresult->lottery_region }} {{ $printresult->result_day_time->toDateTime()->format('l') }}">{{ $printresult->lottery_company }} {{ engToVit($printresult->result_day_time->toDateTime()->format('l')) }}</a><span> » </span>
                                            <a href="/{{ getRegionSlug($printresult->lottery_region) }}/kqxsmb-ngay-{{ $printresult->result_day_time->toDateTime()->format('d-m-Y') }}" title="{{ $printresult->lottery_region }}  {{ $printresult->result_day_time->toDateTime()->format('d/m/y') }}"> {{ $printresult->lottery_region }}  {{ $printresult->result_day_time->toDateTime()->format('d/m/y') }}</a>

                                        </h2>
                                    </div>
                                    <div class="block-main-content">
                                        <table class="table table-bordered table-striped table-xsmb">
                                            <tbody>
                                            <tr>
                                                 @php $prize_1 = json_decode($printresult->prize_1); $prize_1 = json_decode($prize_1->prize_1); @endphp
                                                <td style="padding:0px" class="text-center">
                                                  <ul>
                                                    @foreach($prize_1 as $k=>$p1)
                                                        @if(count((array)$prize_1->{key($prize_1)}) > 3 )
                                                            <li class="col-xs-3 special-code div-horizontal">{{ $p1 }}</li>
                                                        @else
                                                            <li class="special-code div-horizontal">{{ $p1 }}</li>
                                                        @endif
                                                    @endforeach
                                                  </ul>
                                                </td>
                                            </tr>



                                            </tbody>
                                        </table>
                                    </div>
                                    <hr class="line-header"/>

                                @php $g++; @endphp
                            @endforeach

                    </div>
                    <div class="top-margin col-xs-12">
                        @php $page = 1; @endphp
                        {{--<a id="loadmore" data-date="@php echo $lastdate ?? ''; @endphp" data-page="2" onclick="loadMoreData(@php echo $page++; @endphp)" href="javascript:void(0);" >Xem thêm</a>--}}
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
        var page = $('#loadmore').attr('data-date');
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
                console.log($(data.html).find('.block').last());
                if(data.html == " "){
                    $('.ajax-load').html("No more records found");
                    return;
                }
                $('.ajax-load').hide();

                $("#post-data").append(data.html);
                var D = Date.parse(page);
                var date = new Date(D);
                var newDate = new Date(date.getFullYear(),date.getMonth(),date.getDate());
                newDate = new Date(newDate.setDate(newDate.getDate()-7));
                $('#loadmore').attr('data-date',newDate.getFullYear()+'-'+(newDate.getMonth()+1)+'-'+newDate.getDate());
            })
            .fail(function(jqXHR, ajaxOptions, thrownError)
            {
                console.log('server not responding...');
            });
    }
</script>
