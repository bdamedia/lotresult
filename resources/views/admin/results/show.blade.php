@extends('adminlte::page')



@section('title', 'Edit News')



@section('content_header')
@section('css')

    <style>
        .block-main-heading h1, .block-main-heading h2, .block-main-heading h3 {
            color: #000000;
            font-size: 18px;
            padding: 12px 10px;
            margin: 0;
            line-height: 1.5;
            text-align: center;
            background-color: rgba(255, 183, 0, 1);
            font-weight: 700;
        }

        .table-bordered, .table-bordered > tbody > tr > td, .table-bordered > tbody > tr > th, .table-bordered > tfoot > tr > td, .table-bordered > tfoot > tr > th, .table-bordered > thead > tr > td, .table-bordered > thead > tr > th {
            border: 1px solid #ddd;
        }

        .number-black-bold {
            color: #000;
            font-size: 28px;
            font-weight: 700;
        }
        .list-link {
            background-color: rgba(255, 183, 0, 1);
            padding-bottom: 12px;
        }
        .class-title-list-link {
            font-size: 15px;
            margin: 0;
            text-align: center;
        }

        .list-link a, .table-loto th {
            color: #900;
        }

        #u129 .text {
            align-self: flex-end;
            padding: 2px 2px 2px 2px;
            box-sizing: border-box;
            width: 100%;
        }
        #u129_text {
            border-width: 0px;
            word-wrap: break-word;
            text-transform: none;
        }

        #u129 {
            border-width: 0px;
            text-align: center;
            border: 1px solid #cccccc;
            height: 43px;
            display: flex;
            font-family: 'Arial-BoldMT', 'Arial Bold', 'Arial';
            font-weight: 700;
            font-style: normal;
            color: #D9001B;
        }

        .table-xsmn tr:first-child td span, .table-xsmt tr:first-child td span, td.G.DB + td > span {
            color: red;
        }

        td.ĐB + td > span, td.ĐB + td + td > span, td.ĐB + td + td + td > span, td.ĐB + td + td + td + td > span {
            color: red;
        }

        .col-xs-1, .col-xs-10, .col-xs-11, .col-xs-12, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9, .dropdown-menu {
            float: left;
            position: relative;
            min-height: 1px;
            padding-right: 15px;
            padding-left: 15px;
        }

        table.table tbody tr td, table.table thead tr th {
            padding: 3px;
        }

    </style>
    @endsection
@section('js')
@endsection

@stop



@section('content')

        <div style="margin: 0 auto;" class="remove-margin block col-md-6" id='{{ $data->lottery_region }}'>
            <div class="block-main-heading">
                <h1>
                    @if($data->lottery_region == 'XSMN') {{ "Kết Quả Xổ số " }}  {{ getCompanyName($data->lottery_company) }} ({{ $data->lottery_company }})

                    @elseif($data->lottery_region == 'XSMT') {{ "Kết Quả Xổ số " }} {{ getCompanyName($data->lottery_company) }} ({{ $data->lottery_company }})

                    @elseif($data->lottery_region == 'XSMB') {{ "Kết Quả Xổ số " }} {{ getCompanyName($data->lottery_company) }} ({{ $data->lottery_company }})

                    @endif </h1>
            </div>
            <div class="list-link">
                <h2 class="class-title-list-link">
                    @php $dayName = $data->result_day_time->toDateTime()->format('l'); $dayName = getDaySlug($dayName); @endphp

                    <a href="/{{ getRegionSlug($data->lottery_region) }}" title="{{ $data->lottery_region }}" >{{ $data->lottery_region }}</a><span> » </span>
                    <a href="/{{ getRegionSlug($data->lottery_region) }}/kq{{ strtolower($data->lottery_region) }}-{{$dayName}}" title="{{ $data->lottery_region }} {{ engToVit($data->result_day_time->toDateTime()->format('l')) }}">{{ $data->lottery_region }} {{ engToVit($data->result_day_time->toDateTime()->format('l')) }}</a><span> » </span>
                    <a href="/{{ getRegionSlug($data->lottery_region) }}/kq{{ strtolower($data->lottery_region) }}-ngay-{{ $data->result_day_time->toDateTime()->format('d-m-Y') }}" title="{{ $data->lottery_region }}  {{ $data->result_day_time->toDateTime()->format('d/m/y') }}" >{{ $data->lottery_region }} {{ $data->result_day_time->toDateTime()->format('d/m/y') }}</a>

                </h2>
            </div>

            <div id="u129" class="ax_default box_2">
                <div id="u129_text" class="text">
                    <p><span><a href="/ket-qua-xsmn/kqxs-{{ getCompanySlug($data->lottery_company) }}-ngay-{{ $data->result_day_time->toDateTime()->format('d-m-Y') }}" title="{{ $data->lottery_region }}  {{ $data->result_day_time->toDateTime()->format('d/m/y') }}">Kết quả Xổ số {{ getCompanyName($data->lottery_company) }} {{ $data->result_day_time->toDateTime()->format('d/m/y') }}</a></span></p>
                </div>
            </div>

            <div class="block-main-content">
                <table class="table table-bordered table-striped table-xsmn">
                    <tbody>
                    <tr> @php $prize_1 = json_decode($data->prize_1); @endphp
                        <td class="ĐB {{ key($prize_1) }}" style="width: 15%">  {{ key($prize_1) }}</td>
                        <td class="text-center">
                            @foreach($prize_1->{key($prize_1)} as $k=>$p1)
                                <span class=" number-black-bold div-horizontal ">{{ $p1 }} </span>
                            @endforeach
                        </td>
                    </tr>

                    <tr> @php $prize_2 = json_decode($data->prize_2);   @endphp
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

                    <tr> @php $prize_3 = json_decode($data->prize_3);  @endphp
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

                    <tr> @php $prize_4 = json_decode($data->prize_4);  @endphp
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

                    <tr> @php $prize_5 = json_decode($data->prize_5);  @endphp
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

                    <tr>@php  $prize_6 = json_decode($data->prize_6);  @endphp
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

                    <tr> @php $prize_7 = json_decode($data->prize_7);  @endphp
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

                    <tr> @php $prize_8 = json_decode($data->prize_8);   @endphp
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

                    <tr> @php $prize_9 = json_decode($data->prize_9);   @endphp
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
                <a href="/{{ getRegionSlug($data->lottery_region) }}/{{ getRegionLotoSlug($data->lottery_region) }}" >Lô tô {{ $data->lottery_region }}</a> <span> » </span>
                                            <a href="/{{ getRegionSlug($data->lottery_region) }}/{{ getRegionLotoSlug($data->lottery_region) }}/kqlt{{ substr(strtolower($data->lottery_region),2,4) }}-{{ $dayName   }}" title="{{ $data->lottery_region }}  {{ $data->result_day_time->toDateTime()->format('l') }}">Lô tô  {{ $data->lottery_region }} {{ engToVit($data->result_day_time->toDateTime()->format('l')) }} </a>

                                          </span>

                <table class="table table-bordered table-loto" style="margin-bottom: 0;">
                    <tr>
                        <th class="col-md-2" style="width: 10%;">Đầu</th>
                        <th class="col-md-4">Lô Tô</th>
                    </tr>
                    @if($data->board)
                        @php $boardRes = json_decode($data->board) @endphp
                        @foreach($boardRes as $ke=>$bingoData)
                            <tr>
                                <td class="text-center">{{ $ke }}</td><td>{{ $bingoData }}</td>
                            </tr>
                        @endforeach
                    @endif

                </table>
            </div>

        </div>




        @stop


        @section('js')


            <script> console.log('Hi!'); </script>

@stop
