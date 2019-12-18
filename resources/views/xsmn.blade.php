@include('header')

<div class="main-content">
    <div class="container">
        <div class="row margin-b">
            <div class="col-xs-12 col-sm-12 col-md-6">

                <div class="row">
                    <div class="col-xs-12">
                        @php $g = 1;  $tr ='<tr>'; @endphp
                        @foreach($content as $key=>$printresult)
                            {{--{{ $key }}--}}
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
                                    $boards = '';

                                     @endphp
                            @foreach($content[$key] as $lot)

                              @php $th .= '<th class="text-center"><a href="'.strtolower($lot["lottery_region"]).'/'.$lot["lottery_company"].'" title="Xổ số '.$lot["lottery_company"].'">'. $lot["lottery_company"].'</a></th>'; @endphp
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
                                    @php $boards .= '<p class="padding10">Lô tô Bến Tre Thứ 3, '.$key.'</p> <table class="table table-bordered table-loto"><tbody><tr><th class="col-md-2" style="width: 10%;">Đầu</th><th class="col-md-4">Lô Tô</th></tr>'; @endphp
                                    @foreach($boardRes as $ke=>$bingoData)
                                      @php  $boards .= '<tr><td class="text-center">'.$ke.'</td><td>'.$bingoData.'</td></tr>'; @endphp
                                    @endforeach
                                     @php   $boards .=' </tbody></table>'; @endphp
                                @endif

                                @php $td1 = '<td style="width: 15%">'.key($prize_1).'</td>'; @endphp
                                @php $tdr1 = '<td style="width: 15%">'.key($prize_2).'</td>'; @endphp
                                @php $tdr2 = '<td style="width: 15%">'.key($prize_3).'</td>'; @endphp
                                @php $tdr3 = '<td style="width: 15%">'.key($prize_4).'</td>'; @endphp
                                @php $tdr4 = '<td style="width: 15%">'.key($prize_5).'</td>'; @endphp
                                @php $tdr5 = '<td style="width: 15%">'.key($prize_6).'</td>'; @endphp
                                @php $tdr6 = '<td style="width: 15%">'.key($prize_7).'</td>'; @endphp
                                @php $tdr7 = '<td style="width: 15%">'.key($prize_8).'</td>'; @endphp
                                @php $tdr8 = '<td style="width: 15%">'.key($prize_9).'</td>'; @endphp

                            @endforeach

                        @php $current = current($printresult); @endphp
                            <div class="block" id='xsmb-{{ $g }}'>
                                <div class="block-main-heading">
                                    <h1>{{ $current['lottery_region'] }} </h1>
                                </div>
                                <div class="list-link">
                                    <h2 class="class-title-list-link">
                                        <a href="#" title="{{ $current['lottery_region'] }}  {{ $key }}" class="u-line">{{ $current['lottery_region'] }}  {{ $current['result_day_time'] }}</a>
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
                                <div class="block-main-content">

                                    <span class="link-pad-left padding10">Lô tô miền Bắc</span>

                                   {{-- <table class="table table-bordered table-loto" style="margin-bottom: 0;">
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

                                    </table>--}}
                                </div>
                                <div class="link-statistic">
                                    <ul>
                                        <li>Xem thống kê <a href="/cau-mien-bac/cau-bach-thu.html" title="Cầu bạch thủ miền Bắc">Cầu bạch thủ miền Bắc</a></li>
                                        <li>Xem thống kê <a href="/thong-ke-lo-xien.html" title="Lô xiên miền Bắc">Lô xiên miền Bắc</a></li>
                                        <li>Tham khảo <a href="/thong-ke-xsmb-c2579-article.html" title="Thống kê XSMB">Thống kê XSMB</a></li>
                                        <li><a href="/">KQXS</a> miền Bắc hôm nay siêu tốc - chính xác, trực tiếp <a
                                                href="/xsmb-xo-so-mien-bac.html">XSMB</a> lúc 18h15 mỗi ngày</li>
                                    </ul>
                                </div>
                                <p class="text-right margin-10 hidden-xs hidden-sm">
                                    <a href="/in-ve-do.html" data-date="13-12-2019" data-groupname="xsmb" class="btn btn-danger btn-invedo"
                                       role="button">In Vé Dò</a>
                                </p>

                                <div class="block-main-content view-loto">


                                   @php  echo $boards; @endphp
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
