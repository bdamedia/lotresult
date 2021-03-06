@include('header')

<div class="main-content">
    <div class="container">
        <div class="row margin-b">
            <div class="col-xs-12 col-sm-12 col-md-6">

                <div class="row">
                    @include('todayResult')
                    <div class="col-xs-12 {{ $region }}">
                        @php $vietlottPower = 1; @endphp
                        @php $vietlottMega = 1; @endphp
                        @php $vietlott4d = 1; @endphp
                        @php $vietlott3d = 1; @endphp

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
                              $title = "Kết quả  Xổ số miền Trung";
          $th .= '<th class="text-center"><a href="/ket-qua-xsmt/kq'.strtolower($lot["lottery_region"]).'-'.getCompanySlug($lot["lottery_company"]).'" title="Xổ số '.$lot["lottery_company"].'">'. getCompanyName($lot["lottery_company"]).'</a></th>';
                                      }elseif ($lot["lottery_region"] == 'XSMN'){
      $title = "Kết quả Xổ số miền Nam";
          $th .= '<th class="text-center"><a href="/ket-qua-xsmn/kq'.strtolower($lot["lottery_region"]).'-'.getCompanySlug($lot["lottery_company"]).'" title="Xổ số '.$lot["lottery_company"].'">'. getCompanyName($lot["lottery_company"]).'</a></th>';
            } elseif ($lot["lottery_region"] == 'Vietlott'){
                $title = "Xổ Số";
                $th .= '';

            } else{
    $title ="Kết quả Xổ số Miền Bắc";
    $th .= ''; //'<th class="text-center"><a href="/ket-qua-xsmn/" title="Xổ số '.$lot["lottery_region"].'"></a></th>';
                                      }

                                @endphp

                                @if($lot["lottery_region"] != 'Vietlott' && $lot["lottery_region"] != 'Điện Toán')

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
                                        @if($lot["lottery_company"] == 'XSMB')
                                            @if(count((array)$prize_1->{key($prize_1)}) > 3 )
                                                    @php $td2 .= '<span class="col-xs-3 special-code div-horizontal">'.$p1.'</span>'; @endphp
                                                @else
                                                    @php $td2 .= '<span class="col-xs-4 special-code div-horizontal">'.$p1.'</span>'; @endphp
                                                @endif

                                        @else
                                            @php $td2 .= '<span class="col-xs-12 number-black-bold div-horizontal">'.$p1.'</span>'; @endphp
                                        @endif
                                    @endforeach
                                    @php $td2 .= '</td>'; @endphp

                                    @php $td3 .= '<td class="text-center">'; @endphp
                                    @if($lot["lottery_company"] == 'XSMB')
                                        @if(count((array)$prize_2->{key($prize_2)}) > 1)
                                                @foreach($prize_2->{key($prize_2)} as $p2)
                                                    @php $td3 .= '<span class="col-xs-12 number-black-bold div-horizontal">'.$p2.'</span></br>'; @endphp
                                                @endforeach
                                            @else
                                                @php if(count((array)$prize_2->{key($prize_2)}) == 1 && is_array($prize_2->{key($prize_2)})) { foreach ($prize_2->{key($prize_2)} as $p21){ $td3 .= '<span class="col-xs-12 number-black-bold div-horizontal">'.$p21.'</span></br>'; } }else{ $td3 .= '<span class="col-xs-12 number-black-bold div-horizontal">'.$prize_2->{key($prize_2)}.'</span></br>'; } @endphp
                                            @endif

                                    @else
                                        @foreach($prize_2->{key($prize_2)} as $k=>$p2)
                                            @php $td3 .= '<span class=" number-black-bold div-horizontal">'.$p2.'</span></br>'; @endphp
                                        @endforeach
                                    @endif

                                    @php $td3 .= '</td>'; @endphp

                                    @php $td4 .= '<td class="text-center">'; @endphp
                                    @if($lot["lottery_company"] == 'XSMB')
                                        @if(count((array)$prize_3->{key($prize_3)}) > 1)

                                                @foreach($prize_3->{key($prize_3)} as $k=>$p3)
                                                    @php $td4 .= '<span class=" number-black-bold div-horizontal">'.$p3.'</span></br>'; @endphp
                                                @endforeach
                                            @else
                                                @php if(count((array)$prize_3->{key($prize_3)}) == 1 && is_array($prize_3->{key($prize_3)})) { foreach ($prize_3->{key($prize_3)} as $p31){ $td4 .= '<span class="col-xs-12 number-black-bold div-horizontal">'.$p31.'</span></br>'; } }else{ $td4 .= '<span class="col-xs-12 number-black-bold div-horizontal">'.$prize_3->{key($prize_3)}.'</span></br>'; } @endphp

                                               {{-- @php $td4 .= '<span class="col-xs-12 number-black-bold div-horizontal">'.$prize_3->{key($prize_3)}.'</span></br>'; @endphp--}}
                                            @endif

                                    @else
                                        @foreach($prize_3->{key($prize_3)} as $k=>$p3)
                                            @php $td4 .= '<span class=" number-black-bold div-horizontal">'.$p3.'</span></br>'; @endphp
                                        @endforeach
                                    @endif

                                    @php $td4 .= '</td>'; @endphp

                                    @php $td5 .= '<td class="text-center">'; @endphp
                                    @foreach($prize_4->{key($prize_4)} as $k=>$p4)
                                        @if($lot["lottery_company"] == 'XSMB')
                                            @php $td5 .= '<span class="col-xs-6 number-black-bold div-horizontal">'.$p4.'</span>'; @endphp
                                        @else
                                            @php $td5 .= '<span class=" number-black-bold div-horizontal">'.$p4.'</span></br>'; @endphp
                                        @endif
                                    @endforeach
                                    @php $td5 .= '</td>'; @endphp

                                    @php $td6 .= '<td class="text-center">'; @endphp
                                    @foreach($prize_5->{key($prize_5)} as $k=>$p5)
                                        @if($lot["lottery_company"] == 'XSMB')
                                            @php $td6 .= '<span class="col-xs-4 number-black-bold div-horizontal">'.$p5.'</span>'; @endphp
                                        @else
                                            @php $td6 .= '<span class=" number-black-bold div-horizontal">'.$p5.'</span></br>'; @endphp
                                        @endif
                                    @endforeach
                                    @php $td6 .= '</td>'; @endphp

                                    @php $td7 .= '<td class="text-center">'; @endphp
                                    @foreach($prize_6->{key($prize_6)} as $k=>$p6)
                                        @if($lot["lottery_company"] == 'XSMB')
                                            @php $td7 .= '<span class="col-xs-3 number-black-bold div-horizontal">'.$p6.'</span>'; @endphp
                                        @else
                                            @php $td7 .= '<span class=" number-black-bold div-horizontal">'.$p6.'</span></br>'; @endphp
                                        @endif
                                    @endforeach
                                    @php $td7 .= '</td>'; @endphp

                                    @php $td8 .= '<td class="text-center">'; @endphp
                                    @foreach($prize_7->{key($prize_7)} as $k=>$p7)
                                        @if($lot["lottery_company"] == 'XSMB')
                                            @php $td8 .= '<span class="col-xs-4 number-black-bold div-horizontal">'.$p7.'</span>'; @endphp
                                        @else
                                            @php $td8 .= '<span class=" number-black-bold div-horizontal">'.$p7.'</span></br>'; @endphp
                                        @endif
                                    @endforeach
                                    @php $td8 .= '</td>'; @endphp

                                    @php $td9 .= '<td class="text-center">'; @endphp
                                    @foreach($prize_8->{key($prize_8)} as $k=>$p8)
                                        @if($lot["lottery_company"] == 'XSMB')
                                            @php $td9 .= '<span class="col-xs-4 number-black-bold div-horizontal">'.$p8.'</span>'; @endphp
                                        @else
                                            @php $td9 .= '<span class=" number-black-bold div-horizontal">'.$p8.'</span></br>'; @endphp
                                        @endif
                                    @endforeach
                                    @php $td9 .= '</td>'; @endphp

                                    @php $td10 .= '<td class="text-center">'; @endphp
                                    @foreach($prize_9->{key($prize_9)} as $k=>$p9)
                                        @if($lot["lottery_company"] == 'XSMB')
                                            @php $td10 .= '<span class="col-xs-3 number-black-bold div-horizontal">'.$p9.'</span>'; @endphp
                                        @else
                                            @php $td10 .= '<span class=" number-black-bold div-horizontal">'.$p9.'</span></br>'; @endphp
                                        @endif
                                    @endforeach
                                    @php $td10 .= '</td>'; @endphp

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
                                    @php $tdr5 = '<td class="'.key($prize_6).'" style="width: 15%">'.key($prize_6).'</td>'; @endphp
                                    @php $tdr6 = '<td class="'.key($prize_7).'" style="width: 15%">'.key($prize_7).'</td>'; @endphp
                                    @php $tdr7 = '<td class="'.key($prize_8).'" style="width: 15%">'.key($prize_8).'</td>'; @endphp
                                    @php $tdr8 = '<td class="'.key($prize_9).'" style="width: 15%">'.key($prize_9).'</td>'; @endphp

                                @elseif($lot["lottery_region"] == "Điện Toán")
                                    @php $current = $lot; @endphp
                                    <div class="block remove-margin" id='xsmb-{{ $g }}'>
                                        <div style="text-align:left;border-bottom: 2px solid #ccc;" class="block-main-heading">
                                            <h1>Xổ Số Điện toán ({{ $current['lottery_region'] }})</h1>
                                        </div>

                                        <div  style="   color:#000; background-color: #edf2fa;" class="list-link">
                                            <h2 style="text-align:left;padding: 8px;" class="class-title-list-link">
                                                @php $dayName = $current['day']; $dayName = getDaySlug($dayName); $dateexp  = explode('/',$current['result_day_time']); $dateexp = implode('-',$dateexp); @endphp

                                                <a style="color:#000;" href="/{{ getRegionSlug($current['lottery_region']) }}" title="{{ $current['lottery_region'] }}">{{ $current['lottery_region'] }}</a><span> » </span>
                                                <a style="color:#000;" href="/{{ getRegionSlug($current['lottery_region']) }}/kq{{ strtolower($current['lottery_region']) }}-{{$dayName}}" title="{{ $current['lottery_region'] }} {{ $current['day'] }}">{{ $current['lottery_company'] }} {{ engToVit($current['day']) }}</a><span> » </span>
                                                <a style="color:#000;" href="/{{ getRegionSlug($current['lottery_region']) }}/kqxsmb-ngay-{{ $current['result_day_time'] }}" title="{{ $current['lottery_region'] }}  {{ $current['result_day_time'] }}"> {{ $current['lottery_region'] }}  {{ $current['result_day_time'] }}</a>
                                            </h2>
                                        </div>
                                        <div class="block-main-content">
                                            <table class="table table-bordered table-striped table-xsmb">
                                                <tbody>
                                                <tr>
                                                    @php $prize_1 = json_decode($current['prize_1']); $prize_1 = json_decode($prize_1->prize_1); @endphp
                                                    <td style="padding:0px" class="text-center">
                                                        <ul>
                                                            @foreach($prize_1 as $k=>$p1)
                                                                @if(count((array)$prize_1->{key($prize_1)}) > 3 )
                                                                    <li style="color:#000;width:10%;display: inline-block;" class="col-xs-3 special-code div-horizontal">{{ $p1 }}</li>
                                                                @else
                                                                    <li style="color:#000;width:10%;display: inline-block;" class="special-code div-horizontal">{{ $p1 }}</li>
                                                                @endif
                                                            @endforeach
                                                        </ul>
                                                    </td>
                                                </tr>



                                                </tbody>
                                            </table>
                                        </div>
                                        <hr class="line-header"/>
                                    </div>

                                    @php $current = ''; @endphp
                                @else

                                    @php $current = current($printresult);  @endphp
                                     
                                    @if($current['lottery_company'] == 'Power 6/55' && $vietlottPower == 1)
                                        @include('vietlottPower')
                                        @php $vietlottPower = 2; @endphp
                                    @elseif($current['lottery_company'] == 'XS Mega' && $vietlottMega == 1)
                                        @include('vietlottMega')
                                        @php $vietlottMega = 2; @endphp
                                    @elseif($current['lottery_company'] == 'XS Max 4D' && $vietlott4d == 1) 
                                        @include('vietlott4d')
                                        @php $vietlott4d = 2; @endphp
                                    @elseif($current['lottery_company'] == 'XS Max 3D' && $vietlott3d == 1) 
                                        @include('vietlott3d')
                                        @php $vietlott3d = 2; @endphp
                                    @endif
    
                              @endif

                            @endforeach

                            @if($lot["lottery_region"] != 'Vietlott' && $lot["lottery_region"] != 'Điện Toán')

                                @php $current = current($printresult);  @endphp

                                <div class="block remove-margin" id='xsmb-{{ $g }}'>
                                    <div class="block-main-heading">
                                        <h1>{{ $title }} ({{ $current['lottery_region'] }}) </h1>
                                    </div>
                                    <div class="list-link">
                                        <h2 class="class-title-list-link">
                                            @php $dayName = $current['day']; $dayName = getDaySlug($dayName); $dateexp  = explode('/',$current['result_day_time']); $dateexp = implode('-',$dateexp); @endphp

                                            <a href="/{{ getRegionSlug($current['lottery_region']) }}" title="{{ $current['lottery_region'] }}" >{{ $current['lottery_region'] }}</a><span> » </span>
                                            <a href="/{{ getRegionSlug($current['lottery_region']) }}/kq{{ strtolower($current['lottery_region']) }}-{{$dayName}}" title="{{ $current['lottery_region'] }} {{ $current['day'] }}" >{{ $current['lottery_region'] }} {{ engToVit($current['day']) }}</a><span> » </span>
                                            <a href="/{{ getRegionSlug($current['lottery_region']) }}/kq{{ strtolower($current['lottery_region']) }}-ngay-{{ $dateexp }}" title="{{ $current['lottery_region'] }}  {{ $current['day'] }}">  {{ $current['lottery_region'] }} {{ $current['result_day_time'] }}</a>

                                        </h2>
                                    </div>
                                    <div class="block-main-content">
                                        <table class="table table-bordered table-striped table-{{ strtolower($lot["lottery_region"]) }} text-table livetn3">
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
                                    </div>
                                </div>
                                @endif 
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
