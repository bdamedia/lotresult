@include('header')

<div class="main-content">
    <div class="container">
        <div class="row margin-b">
            <div class="col-xs-12 col-sm-12 col-md-6 xsmn">
                <div style="border: 1px solid #060606;min-height: 163px;text-align: center;" class="margin-40  margin-b-20">
                    <div style="width: 100%" class="block-main-heading">
                        @php $mytime = Carbon\Carbon::now(); @endphp
                        <h1>Trực Tiếp XSMN - {{ engToVit($mytime->toDateTime()->format('l')) }} {{ $mytime->toDateTime()->format('d/m/Y') }}</h1>
                    </div>
                    <h5 style="color: #cd0000;font-weight: 700;">Kết quả xổ số miền Nam hôm nay được tường thuật trực tiếp lúc 16h15</h5>

                    <div class="clock" data-time="16-15-00" ></div>

                </div>
                <div class="row">

                    <div class="col-xs-12 {{ $region }}">
                        @if(count($content) > 0)
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
                                    if($lot["lottery_region"] == 'XSMT'){
                              $title = "Kết Quả Xổ số miền Trung";
          $th .= '<th class="text-center"><a href="/ket-qua-xsmt/kq'.strtolower($lot["lottery_region"]).'-'.getCompanySlug($lot["lottery_company"]).'" title="Xổ số '.$lot["lottery_company"].'">'. getCompanyName($lot["lottery_company"]).'</a></th>';
                                      }elseif ($lot["lottery_region"] == 'XSMN'){
      $title = "Kết Quả Xổ số miền Nam";
          $th .= '<th class="text-center"><a href="/ket-qua-xsmn/kq'.strtolower($lot["lottery_region"]).'-'.getCompanySlug($lot["lottery_company"]).'" title="Xổ số '.$lot["lottery_company"].'">'. getCompanyName($lot["lottery_company"]).'</a></th>';
                                      }

                                @endphp
                                @php $prize_1 = json_decode($lot['prize_1']); @endphp
                                @php $prize_2 = json_decode($lot['prize_2']); @endphp
                                @php $prize_3 = json_decode($lot['prize_3']); @endphp
                                @php $prize_4 = json_decode($lot['prize_4']); @endphp
                                @php $prize_5 = json_decode($lot['prize_5']); @endphp
                                @php $prize_6 = json_decode($lot['prize_6']); @endphp
                                @php $prize_7 = json_decode($lot['prize_7']); @endphp
                                @php $prize_8 = json_decode($lot['prize_8']); @endphp
                                @php $prize_9 = json_decode($lot['prize_9']); @endphp
                                @php $board = json_decode($lot['board']); @endphp

                                @php $td2 .= '<td class="text-center">'; @endphp
                                @foreach($prize_1->{key($prize_1)} as $k=>$p1)
                                    @php $td2 .= '<span class=" number-black-bold div-horizontal">'.$p1.'</span></br>'; @endphp
                                @endforeach
                                @php $td2 .= '</td>'; @endphp

                                @php $td3 .= '<td class="text-center">'; @endphp
                                @foreach($prize_2->{key($prize_2)} as $k=>$p2)
                                    @php $td3 .= '<span class=" number-black-bold div-horizontal">'.$p2.'</span></br>'; @endphp
                                @endforeach
                                @php $td3 .= '</td>'; @endphp

                                @php $td4 .= '<td class="text-center">'; @endphp
                                @foreach($prize_3->{key($prize_3)} as $k=>$p3)

                                    @php $td4 .= '<span class=" number-black-bold div-horizontal">'.$p3.'</span></br>'; @endphp
                                @endforeach
                                @php $td4 .= '</td>'; @endphp

                                @php $td5 .= '<td class="text-center">'; @endphp
                                @foreach($prize_4->{key($prize_4)} as $k=>$p4)

                                    @php $td5 .= '<span class=" number-black-bold div-horizontal">'.$p4.'</span></br>'; @endphp
                                @endforeach
                                @php $td5 .= '</td>'; @endphp

                                @php $td6 .= '<td class="text-center">'; @endphp
                                @foreach($prize_5->{key($prize_5)} as $k=>$p5)

                                    @php $td6 .= '<span class=" number-black-bold div-horizontal">'.$p5.'</span></br>'; @endphp
                                @endforeach
                                @php $td6 .= '</td>'; @endphp

                                @php $td7 .= '<td class="text-center">'; @endphp
                                @foreach($prize_6->{key($prize_6)} as $k=>$p6)

                                    @php $td7 .= '<span class=" number-black-bold div-horizontal">'.$p6.'</span></br>'; @endphp
                                @endforeach
                                @php $td7 .= '</td>'; @endphp

                                @php $td8 .= '<td class="text-center">'; @endphp
                                @foreach($prize_7->{key($prize_7)} as $k=>$p7)

                                    @php $td8 .= '<span class=" number-black-bold div-horizontal">'.$p7.'</span></br>'; @endphp
                                @endforeach
                                @php $td8 .= '</td>'; @endphp

                                @php $td9 .= '<td class="text-center">'; @endphp
                                @foreach($prize_8->{key($prize_8)} as $k=>$p8)

                                    @php $td9 .= '<span class=" number-black-bold div-horizontal">'.$p8.'</span></br>'; @endphp
                                @endforeach
                                @php $td9 .= '</td>'; @endphp

                                @php $td10 .= '<td class="text-center">'; @endphp
                                @foreach($prize_9->{key($prize_9)} as $k=>$p9)

                                    @php $td10 .= '<span class=" number-black-bold div-horizontal">'.$p9.'</span></br>'; @endphp
                                @endforeach
                                @php $td10 .= '</td>'; @endphp

                                @if($board)
                                    @php $boardRes = $board @endphp

                                    @foreach($boardRes as $ke=>$bingoData)
                                        @php  $boards[$g][] = $bingoData; @endphp
                                    @endforeach

                                @endif

                                @php $td1 = '<td class="'.key($prize_1).'" style="width: 15%">'.key($prize_1).'</td>'; @endphp
                                @php $tdr1 = '<td class="'.key($prize_2).'" style="width: 15%">'.key($prize_2).'</td>'; @endphp
                                @php $tdr2 = '<td class="'.key($prize_3).'" style="width: 15%">'.key($prize_3).'</td>'; @endphp
                                @php $tdr3 = '<td class="'.key($prize_4).'" style="width: 15%">'.key($prize_4).'</td>'; @endphp
                                @php $tdr4 = '<td class="'.key($prize_5).'" style="width: 15%">'.key($prize_5).'</td>'; @endphp
                                @php $tdr5 = '<td class="'.key($prize_6).'" style="width: 15%">'.key($prize_6).'</td>'; @endphp
                                @php $tdr6 = '<td class="'.key($prize_7).'" style="width: 15%">'.key($prize_7).'</td>'; @endphp
                                @php $tdr7 = '<td class="'.key($prize_8).'" style="width: 15%">'.key($prize_8).'</td>'; @endphp
                                @php $tdr8 = '<td class="'.key($prize_9).'" style="width: 15%">'.key($prize_9).'</td>'; @endphp

                            @endforeach

                            @php $current = current($printresult);  @endphp

                            <div class="block" id='xsmb-{{ $g }}'>
                                <div class="block-main-heading">
                                    <h1>{{ $title }} ({{ $current['lottery_region'] }}) </h1>
                                </div>
                                <div class="list-link">
                                    <h2 class="class-title-list-link">
                                        @php $dayName = $current['day']; $dayName = getDaySlug($dayName); $dateexp  = explode('/',$current['result_day_time']); $dateexp = implode('-',$dateexp); @endphp

                                        <a href="/{{ getRegionSlug($current['lottery_region']) }}" title="{{ $current['lottery_region'] }}">{{ $current['lottery_region'] }}</a><span> » </span>
                                        <a href="/{{ getRegionSlug($current['lottery_region']) }}/kq{{ strtolower($current['lottery_region']) }}-{{$dayName}}" title="{{ $current['lottery_region'] }} {{ $current['day'] }}" >{{ $current['lottery_region'] }} {{ engToVit($current['day']) }} </a><span> » </span>
                                        <a href="/{{ getRegionSlug($current['lottery_region']) }}/kq{{ strtolower($current['lottery_region']) }}-ngay-{{ $dateexp }}" title="{{ $current['lottery_region'] }}  {{ $current['day'] }}" >  {{ $current['lottery_region'] }} {{ $current['result_day_time'] }}</a>
                                        {{--<a href="#" title="{{ $current['lottery_region'] }}  {{ $key }}">{{ $current['lottery_region'] }} >> {{ $current['day'] }} >> {{ $current['result_day_time'] }}</a>--}}

                                    </h2>
                                </div>
                                <div class="block-main-content">
                                    <table class="table table-bordered table-striped table-xsmn text-table livetn3">
                                        <thead>
                                        <tr>
                                            <th class="text-center">Giải</th>
                                            @php echo $th; @endphp
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

                                        <tr>
                                            @php echo $tdr5; @endphp

                                            @php echo $td7; @endphp
                                        </tr>

                                        <tr>
                                            @php echo $tdr6; @endphp

                                            @php echo $td8; @endphp
                                        </tr>

                                        <tr>
                                            @php echo $tdr7; @endphp

                                            @php echo $td9; @endphp
                                        </tr>

                                        <tr>
                                            @php echo $tdr8; @endphp

                                            @php echo $td10; @endphp
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

                                    <p class="padding10">
                                        <a  href="/{{ getRegionSlug($current['lottery_region']) }}/{{ getRegionLotoSlug($current['lottery_region']) }}" >Lô tô {{ $current['lottery_region'] }}</a><span> » </span>
                                        <a href="/{{ getRegionSlug($current['lottery_region']) }}/{{ getRegionLotoSlug($current['lottery_region']) }}/kqlt{{ substr(strtolower($current['lottery_region']),2,4) }}-{{ $dayName   }}" title="{{ $current['lottery_region'] }}  {{ $current['day'] }}">Lô tô  {{ $current['lottery_region'] }} {{ engToVit($current['day']) }} </a>

                                    </p>
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
                        @else
                            <div style="border: 1px solid #000000;" class="block remove-margin1" id="xsmb-2">
                                <div class="block-main-heading">
                                    <h1>Kết Quả Xổ số miền Nam (XSMN) </h1>
                                </div>
                                <div class="list-link">
                                    <h2 class="class-title-list-link">

                                        <a href="/ket-qua-xsmn" title="XSMN">XSMN</a><span> » </span>
                                        <a href="/ket-qua-xsmn/kqxsmn-{{ getDaySlug($mytime->toDateTime()->format('l')) }}" title="XSMN {{ engToVit($mytime->toDateTime()->format('l')) }}">XSMN {{ engToVit($mytime->toDateTime()->format('l')) }} </a><span> » </span>
                                        <a href="/ket-qua-xsmn/kqxsmn-ngay-{{ $mytime->toDateTime()->format('d-m-Y') }}" title="XSMN  {{ engToVit($mytime->toDateTime()->format('l')) }}">  XSMN {{ $mytime->toDateTime()->format('d/m/Y') }}</a>


                                    </h2>
                                </div>
                                <div class="block-main-content">
                                    <table class="table table-bordered table-striped table-xsmn text-table livetn3">
                                        <thead>
                                        <tr>
                                            <th class="text-center">Giải</th>

                                            @foreach($companies as $comp)
                                                <th class="text-center"><a href="/ket-qua-xsmn/kqxsmn-{{ $comp->lottery_company_slug }}" title="Xổ số XSBTH">{{ $comp->lottery_company_names }}</a></th>
                                                @endforeach
                                            {{--<th class="text-center"><a href="/ket-qua-xsmn/kqxsmn-binh-thuan" title="Xổ số XSBTH">Bình Thuận</a></th>
                                            <th class="text-center"><a href="/ket-qua-xsmn/kqxsmn-an-giang" title="Xổ số XSAG">An Giang</a></th>
                                            <th class="text-center"><a href="/ket-qua-xsmn/kqxsmn-tay-ninh" title="Xổ số XSTN">Tây Ninh</a></th>--}}

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @for($i=9;$i >= 1;$i--)
                                            <tr>
                                                @if($i == 1)
                                                    <td class="ĐB" style="width: 15%">ĐB</td>
                                                @else
                                                    <td class="G.{{ $i }}" style="width: 15%">G.{{ $i-1 }}</td>
                                                    @endif

                                                @for($j=1;$j<=$companies->count();$j++)
                                                    <td class="text-center">
                                                        @if($i == 7)
                                                        <span class=" number-black-bold div-horizontal">...</span><br>
                                                        <span class=" number-black-bold div-horizontal">...</span><br>
                                                        <span class=" number-black-bold div-horizontal">...</span><br>
                                                        @elseif($i == 5)
                                                            <span class=" number-black-bold div-horizontal">...</span><br>
                                                            <span class=" number-black-bold div-horizontal">...</span><br>
                                                            <span class=" number-black-bold div-horizontal">...</span><br>
                                                            <span class=" number-black-bold div-horizontal">...</span><br>
                                                            <span class=" number-black-bold div-horizontal">...</span><br>
                                                            <span class=" number-black-bold div-horizontal">...</span><br>
                                                            <span class=" number-black-bold div-horizontal">...</span><br>
                                                        @elseif($i == 4)
                                                            <span class=" number-black-bold div-horizontal">...</span><br>
                                                            <span class=" number-black-bold div-horizontal">...</span><br>

                                                        @else
                                                            <span class=" number-black-bold div-horizontal">...</span><br>

                                                        @endif
                                                    </td>
                                                @endfor
                                               {{-- <td class="text-center"><span class=" number-black-bold div-horizontal">69</span><br></td>
                                                <td class="text-center"><span class=" number-black-bold div-horizontal">91</span><br></td>
                                                <td class="text-center"><span class=" number-black-bold div-horizontal">70</span><br></td>--}}
                                            </tr>
                                        @endfor



                                        </tbody>
                                    </table>

                                </div>
                                <hr class="line-header">




                                <div class="block-main-content view-loto">

                                    <p class="padding10">
                                        <a href="/ket-qua-xsmn/ket-qua-lo-to-mien-nam">Lô tô XSMN</a><span> » </span>
                                        <a href="/ket-qua-xsmn/ket-qua-lo-to-mien-nam/kqltmn-thu-nam" title="XSMN  Thursday">Lô tô  XSMN Thứ năm </a>

                                    </p>
                                    <table class="table table-bordered table-loto">
                                        <tbody>
                                        <tr>
                                            <th class="col-md-2" style="width: 10%;">Đầu</th>
                                            @foreach($companies as $comp)
                                                <th class="text-center"><a href="/ket-qua-xsmn/kqxsmn-{{ $comp->lottery_company_slug }}" title="Xổ số {{ $comp->lottery_company }}">{{ $comp->lottery_company_names }}</a></th>


                                            @endforeach
                                        </tr>
                                        @for($i=0;$i < 9;$i++)
                                            <tr>
                                                <td class="show_center">{{ $i }}</td>
                                         @for($j=1;$j<=$companies->count();$j++)


                                                <td>--</td>


                                            @endfor
                                            </tr>
                                        @endfor



                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endif

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
<script src="{{ URL::asset('js/flipclock.js') }}"> </script>
