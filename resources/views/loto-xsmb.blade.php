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
                            {{-- {{ print_r($printresult) }}--}}
                            <div class="block remove-margin" id='xsmb-{{ $g }}'>
                                <div class="block-main-heading">
                                    <h1>Kết quả Xổ Số Miền Bắc ({{ $printresult->lottery_region }})</h1>
                                </div>
                                <div class="list-link">
                                    <h2 class="class-title-list-link">
                                        @php $dayName = $printresult->result_day_time->toDateTime()->format('l'); $dayName = getDaySlug($dayName); @endphp
                                        <a href="/{{ getRegionSlug($printresult->lottery_region) }}" title="{{ $printresult->lottery_region }}" class="u-line">XSMB</a><span> » </span>
                                        <a href="/{{ getRegionSlug($printresult->lottery_region) }}/kq{{ strtolower($printresult->lottery_region) }}-{{$dayName}}" title="{{ $printresult->lottery_region }} {{ $printresult->result_day_time->toDateTime()->format('l') }}" class="u-line">{{ $printresult->lottery_region }} {{ engToVit($printresult->result_day_time->toDateTime()->format('l')) }}</a><span> » </span>
                                        <a href="/{{ getRegionSlug($printresult->lottery_region) }}/kqxsmb-ngay-{{ $printresult->result_day_time->toDateTime()->format('d-m-Y') }}" title="{{ $printresult->lottery_region }}  {{ $printresult->result_day_time->toDateTime()->format('d/m/y') }}" class="u-line">Kết quả Xổ Số Miền Bắc({{ $printresult->lottery_region }})  {{ $printresult->result_day_time->toDateTime()->format('d/m/y') }}</a>
                                    </h2>
                                </div>
                             {{--   <div class="block-main-content">

                                </div>--}}
                                <hr class="line-header"/>
                                <div class="block-main-content">


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
                                                $fNewResult = json_decode($printresult->{$t});
                                                foreach ($fNewResult as $keyValues => $mainValue) {
                                                    if(is_array($mainValue)) {
                                                        foreach ($mainValue as $keySecond => $valSecond) {
                                                            $fullValues[$it-2][] = $valSecond;
                                                        }
                                                    } else if ($keyValues == 'Mã ĐB') {

                                                    } else if ($keyValues == 'G.DB') {
                                                        $fullValues[$it-2][] = $mainValue;
                                                    } else {
                                                        $fullValues[$it-2][] = $mainValue;
                                                    }
                                                }
                                            }

                                            foreach ($fullValues as $index=>$values) {
                                                foreach ($values as $in=>$val){
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

                                            //echo "<pre>";
                                            //print_r($finalValues);
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
                </div>


            </div>


            @include('sidebar')
        </div>
    </div>
</div>
@include('footer')
