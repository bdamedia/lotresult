@include('header')

<div class="main-content">
    <div class="container">
    <div class="row margin-b">
    <div class="col-xs-12 col-sm-12 col-md-6 xsmbday">

    <div class="row">
        @include('todayResult')
    <div class="col-xs-12" id="post-data">

        <div class="tab" role="tabpanel">
            <ul class="nav-tabs day-selector">
                <li class={{ request()->segment(count(request()->segments())) == 'ket-qua-xsmb' ? 'active-tab-new' : '' }}><a href="/ket-qua-xsmb" title="XSMB Thứ 2">Miền Bắc</a></li>
                <li class={{ request()->segment(count(request()->segments())) == 'kqxsmb-thu-hai' ? 'active-tab-new' : '' }}><a href="/ket-qua-xsmb/kqxsmb-thu-hai" title="XSMB Thứ 2">Thứ hai</a></li>
                <li class={{ request()->segment(count(request()->segments())) == 'kqxsmb-thu-ba' ? 'active-tab-new' : '' }}><a href="/ket-qua-xsmb/kqxsmb-thu-ba" title="XSMB Thứ 3">Thứ ba</a></li>
                <li class={{ request()->segment(count(request()->segments())) == 'kqxsmb-thu-tu' ? 'active-tab-new' : '' }}><a href="/ket-qua-xsmb/kqxsmb-thu-tu" title="XSMB Thứ 4">Thứ tư</a></li>
                <li class={{ request()->segment(count(request()->segments())) == 'kqxsmb-thu-nam' ? 'active-tab-new' : '' }}><a href="/ket-qua-xsmb/kqxsmb-thu-nam" title="XSMB Thứ 5">Thứ năm</a></li>
                <li class={{ request()->segment(count(request()->segments())) == 'kqxsmb-thu-sau' ? 'active-tab-new' : '' }}><a href="/ket-qua-xsmb/kqxsmb-thu-sau" title="XSMB Thứ 6">Thứ sáu</a></li>
                <li class={{ request()->segment(count(request()->segments())) == 'kqxsmb-thu-bay' ? 'active-tab-new' : '' }} ><a href="/ket-qua-xsmb/kqxsmb-thu-bay" title="XSMB Thứ 7">Thứ bảy</a></li>
                <li class={{ request()->segment(count(request()->segments())) == 'kqxsmb-chu-nhat' ? 'active-tab-new' : '' }}><a href="/ket-qua-xsmb/kqxsmb-chu-nhat" title="XSMB Chủ Nhật">Chủ Nhật</a></li>
            </ul>
        </div>

        @php $title = "Kết Quả Xổ Số Miền Bắc"; @endphp

        @php $g = 1; @endphp
        @foreach($content as $printresult)

    <div class="block remove-margin" id='xsmb-{{ $g }}'>
        <div class="block-main-heading">
            <h1>{{ $title }} ({{ $printresult['lottery_region'] }})</h1>
            </div>
            <div class="list-link">
            <h2 class="class-title-list-link">
                @php $dayName = $printresult['day']; $dayName = getDaySlug($dayName); $dateexp  = explode('/',$printresult['result_day_time']); $dateexp = implode('-',$dateexp); @endphp

                <a href="/{{ getRegionSlug($printresult['lottery_region']) }}" title="{{ $printresult['lottery_region'] }}">{{ $printresult['lottery_region'] }}</a><span> » </span>
                <a href="/{{ getRegionSlug($printresult['lottery_region']) }}/kq{{ strtolower($printresult['lottery_region']) }}-{{$dayName}}" title="{{ $printresult['lottery_region'] }} {{ $printresult['day'] }}" >{{ $printresult['lottery_region'] }} {{ engToVit($printresult['day']) }}</a><span> » </span>
                <a href="/{{ getRegionSlug($printresult['lottery_region']) }}/kq{{ strtolower($printresult['lottery_region']) }}-ngay-{{ $dateexp }}" title="{{ $printresult['lottery_region'] }}  {{ $printresult['day'] }}">  {{ $printresult['lottery_region'] }} {{ $printresult['result_day_time'] }}</a>

            </h2>
            </div>
            <div class="block-main-content">
            <table class="table table-bordered table-striped table-xsmb">
            <tbody>
            <tr>
            <td style="width: 15%"> @php $prize_1 = json_decode($printresult['prize_1']); @endphp {{ key($prize_1) }}</td>
            <td class="text-center">
                @foreach($prize_1->{key($prize_1)} as $k=>$p1)
                    @if(count((array)$prize_1->{key($prize_1)}) > 3 )
                        <span class="col-xs-3 special-code div-horizontal">{{ $p1 }}</span>
                    @else
                        <span class="col-xs-4 special-code div-horizontal">{{ $p1 }}</span>
                    @endif
                @endforeach
            </td>
            </tr>
            <tr>
            <td class="ĐB">@php $prize_2 = json_decode($printresult['prize_2']);  @endphp {{ key($prize_2) }}</td>
            <td class="text-center">
                @if(count((array) $prize_2) <= 1)
                @foreach($prize_2 as $k=>$p2)
                        @php if(count((array)$p2) > 0 && is_array($p2)){ foreach ($p2 as $p21) { echo "<span class='col-xs-12 number-black-bold div-horizontal' >$p21</span>"; } }else{ echo "<span class='col-xs-12 number-black-bold div-horizontal' >$p2</span>"; }  @endphp
                   {{-- <span class="number-black-bold div-horizontal">{{ $p2 }} </span>--}}
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
                        @php if(count((array)$p3) > 0 && is_array($p3)){ foreach ($p3 as $p31) { echo "<span class='col-xs-12 number-black-bold div-horizontal' >$p31</span>"; } }else{ echo "<span class='col-xs-12 number-black-bold div-horizontal' >$p3</span>"; }  @endphp
                  {{--  <span class="number-black-bold div-horizontal">{{ $p3 }} </span>--}}
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
                           @php if(count((array)$p4) > 0 ){ foreach ($p4 as $p41) { echo "<span class='col-xs-6 number-black-bold div-horizontal' >$p41</span>"; } }  @endphp
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
                            @php if(count((array)$p5) > 0 ){ foreach ($p5 as $p51) { echo "<span class='col-xs-4 number-black-bold div-horizontal' >$p51</span>"; } }  @endphp
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
                            @php if(count((array)$p6) > 0 ){ foreach ($p6 as $p61) { echo "<span class='col-xs-3 number-black-bold div-horizontal' >$p61</span>"; } }  @endphp
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
                           @php if(count((array)$p7) > 0 ){ foreach ($p7 as $p71) { echo "<span class='col-xs-4 number-black-bold div-horizontal' >$p71</span>"; } }  @endphp
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
                           @php if(count((array)$p8) > 0 ){ foreach ($p8 as $p81) { echo "<span class='col-xs-4 number-black-bold div-horizontal' >$p81</span>"; } }  @endphp
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
                            @php if(count((array)$p9) > 0 ){ foreach ($p9 as $p91) { echo "<span class='col-xs-3 number-black-bold div-horizontal' >$p91</span>"; } }  @endphp
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
                    @php $dayName = $printresult['day']; $dayName = getDaySlug($dayName); $dateexp  = explode('/',$printresult['result_day_time']); $dateexp = implode('-',$dateexp); @endphp

                      <a  href="/{{ getRegionSlug($printresult['lottery_region']) }}/{{ getRegionLotoSlug($printresult['lottery_region']) }}" >Lô tô {{ $printresult['lottery_region'] }}</a> <span> » </span>
                    <a href="/{{ getRegionSlug($printresult['lottery_region']) }}/{{ getRegionLotoSlug($printresult['lottery_region']) }}/kqlt{{ substr(strtolower($printresult['lottery_region']),2,4) }}-{{ $dayName   }}" title="{{ $printresult['lottery_region'] }}  {{ engToVit($printresult['day']) }}">Lô tô  {{ $printresult['lottery_region'] }} {{ engToVit($printresult['day']) }} </a>


                </span>

            <table class="table table-bordered table-loto" style="margin-bottom: 0;">
            <tr>
            <th class="col-md-2" style="width: 10%;">Đầu</th>
            <th class="col-md-4">Lô Tô</th>
            </tr>
                @php

                    $fullValues = [];
                    $newFullValues = [];
                    $finalValues = [];
                    for ($it=1; $it< 10 ; $it++) {
                        $t= "prize_{$it}";
                        $fNewResult = json_decode($printresult[$t]);
                        foreach ($fNewResult as $keyValues => $mainValue) {

                            if(count((array)$mainValue) == 1 && is_array($mainValue)) {
                                $fullValues[] = array_values((array) $mainValue);

                            } else if ($keyValues == 'Mã ĐB') {

                            }else if ($keyValues == 'G.DB') {
                                $fullValues[] = array_values((array) $mainValue);
                            } else {
                                $fullValues[] = array_values((array) $mainValue);
                            }
                        }
                    }

                    foreach ($fullValues as $index=>$values) {
                        foreach ($values as $in=>$val){

                        //print_r($val);
                           // array_push($newFullValues,array_values((array)$val));
                            $newFullValues[]= substr($val, -2);
                        }
                    }

                    for ($i=0; $i<=9; $i++) {
                        $selectlot = array();
                                                   foreach($newFullValues as $in=>$val) {
                                                        if (substr($val,-2,1) == $i)
                                                        $selectlot[] = $val;
                                                   }
                                                   $finalValues[] = $selectlot;
                                                }

                    for($r = 0 ; $r <=9 ; $r++){  @endphp
                <tr>
                    <td class="text-center">{{ $r }}</td>
                    <td>
                        @php  if(!empty($finalValues[$r])){
                        echo implode(',',$finalValues[$r]);
                    } else{
                        echo "--";
                    }
                        @endphp
                    </td>
                </tr>
                @php
                    }

                @endphp

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
