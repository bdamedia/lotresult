@include('header')

<div class="main-content">
    <div class="container">
        <div class="row margin-b">
            <div class="col-xs-12 col-sm-12 col-md-6">

                <div class="row">
                    @include('todayResult')
                    <div class="col-xs-12 {{ $region }}">


                        @if($enableTab == true)

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


                        @php $g = 1;  $tr ='<tr>'; @endphp
                        @foreach($content as $key=>$printresult)
                            {{--{{ $key }}--}}
                            @php $date = $key; @endphp
                            @php    $th ='';
                                    $td1 = '';
                                    $td2 = '';
                                    $td3 = '';
                                    $td4 = '';
                                    $td5 = '';
                                    $td6 = '';
                                    $td7 = '';
                                    $td8 = '';
                                    $td9 = '';
                                    $td10 = '';
                                    $tdr1 = '';
                                    $tdr2 = '';
                                    $boards = [];
                                    $boards1 = '';
                                    $boards2 = '';
$gh = count($content[$key]);
                            @endphp

                            @foreach($content[$key] as $g=>$lot)

                                @php
                                    if($lot["lottery_company"] == "XSMN" || $lot["lottery_company"] == "XSMT"){
                                    continue;
                                    }
                                        if($lot["lottery_region"] == 'XSMT'){

                                  $title = "Xổ số miền Trung";
              $th .= '<th class="text-center"><a href="/ket-qua-xsmt/kq'.strtolower($lot["lottery_region"]).'-'.getCompanySlug($lot["lottery_company"]).'" title="Xổ số '.$lot["lottery_company"].'">'. getCompanyName($lot["lottery_company"]).'</a></th>';
                                          }elseif ($lot["lottery_region"] == 'XSMN'){
          $title = "Xổ số miền Nam";
              $th .= '<th class="text-center"><a href="/ket-qua-xsmn/kq'.strtolower($lot["lottery_region"]).'-'.getCompanySlug($lot["lottery_company"]).'" title="Xổ số '.$lot["lottery_company"].'">'. getCompanyName($lot["lottery_company"]).'</a></th>';
                                          }else{
                                           $th .= '';
                                          }

                                @endphp

                                @php $board = json_decode($lot['board']); @endphp



                                @if($board)
                                    @php $boardRes = $board @endphp

                                    @foreach($boardRes as $ke=>$bingoData)
                                        @php  $boards[$g][] = $bingoData; @endphp
                                    @endforeach

                                @endif



                            @endforeach

                            @php $current = current($printresult);  @endphp

                            <div class="block remove-margin" id='xsmb-{{ $g }}'>
                                <div class="block-main-heading">
                                    <h1>{{ $title }} ({{ $current['lottery_region'] }}) </h1>
                                </div>
                                <div class="list-link">
                                    <h2 class="class-title-list-link">
                                        @php $dayName = $current['day']; $dayName = getDaySlug($dayName); $dateexp  = explode('/',$current['result_day_time']); $dateexp = implode('-',$dateexp); @endphp
                                        <a href="/{{ getRegionSlug($current['lottery_region']) }}" title="{{ $current['lottery_region'] }}" class="u-line">{{ $current['lottery_region'] }}</a><span> » </span>
                                        <a href="/{{ getRegionSlug($current['lottery_region']) }}/kq{{ strtolower($current['lottery_region']) }}-{{$dayName}}" title="{{ $current['lottery_region'] }} {{ $current['day'] }}" class="u-line">{{ $current['lottery_region'] }} {{ engToVit($current['day']) }}</a><span> » </span>
                                        <a href="/{{ getRegionSlug($current['lottery_region']) }}/kq{{ strtolower($current['lottery_region']) }}-ngay-{{ $dateexp }}" title="{{ $current['lottery_region'] }}  {{ $current['day'] }}" class="u-line">  {{ $current['lottery_region'] }} {{ $current['result_day_time'] }}</a>

                                    </h2>
                                </div>
                                <div class="block-main-content">


                                </div>
                                <hr class="line-header"/>

                                <div class="block-main-content view-loto">

                                    <table class="table table-bordered table-loto">
                                        <tbody>
                                        <tr>
                                            <th class="col-md-2" style="width: 10%;">Đầu</th>

                                            @php echo $th @endphp
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
