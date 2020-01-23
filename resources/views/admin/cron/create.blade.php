@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/datatables/css/dataTables.bootstrap4.css') }}">
    <style>
        #post-data{
            float: left;
        }

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
        .list-link {
            background-color: rgba(255, 183, 0, 1);
            padding-bottom: 12px;
            text-align: center;
        }
        .class-title-list-link {
            font-size: 15px;
            margin: 0;
        }
        .table-xsmn tr:first-child td span, .table-xsmt tr:first-child td span, td.G.DB + td > span {
            color: red;
        }
        .number-black-bold {
            color: #000;
            font-size: 28px;
            font-weight: 700;
        }

        .table-bordered {
            border: 1px solid #dee2e6;
        }

        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
            background-color: transparent;
        }
        td.ĐB + td > span, td.ĐB + td + td > span, td.ĐB + td + td + td > span, td.ĐB + td + td + td + td > span {
            color: red;
        }
        table.table-xsmax tbody tr td:first-child, table.table-xsmb tbody tr td:first-child, table.table-xsmn tbody tr td:first-child {
            text-align: center;
            vertical-align: middle;
        }
    </style>
@endsection

@section('js')
    <script src="{{ asset('vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
    <script type="application/javascript">
        function setDelete($url) {
            $('#DeleteForm').attr('action', $url);
            $('#myModal').modal('show');
            return false;
        }

        $(function () {
            $("#usersTable").DataTable();
        });
    </script>
@endsection

@section('js')
    <script type="application/javascript">
        function setDelete($url) {
            $('#DeleteForm').attr('action', $url);
            $('#myModal').modal('show');
            return false;
        }

        $(function () {
            $("#usersTable").DataTable();
        });
    </script>
@endsection

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Dashboard</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">

            <br>
            <div class="col-sm-10 col-sm-offset-1 col-xs-12 table-responsive">
                <div class="card">
                    <div class="card-header">
                        <h4>Start Cron Job</h4>
                    </div>
                    <div class="card-body">
                        <div id="post-data" class="col-md-6 xsmn">


                            <div class="block remove-margin" id="xsmb-2">
                                <div class="block-main-heading">
                                    <h1>Kết Quả Xổ số miền Nam (XSMN) </h1>
                                </div>
                                <div class="list-link">
                                    <h2 class="class-title-list-link">

                                        <a href="/ket-qua-xsmn" title="XSMN">XSMN</a><span> » </span>
                                        <a href="/ket-qua-xsmn/kqxsmn-thu-ba" title="XSMN Tuesday">XSMN Thứ
                                            ba </a><span> » </span>
                                        <a href="/ket-qua-xsmn/kqxsmn-ngay-14-01-2020" title="XSMN  Tuesday"> XSMN
                                            14/01/2020</a>


                                    </h2>
                                </div>
                                <div class="block-main-content">
                                    <table class="table table-bordered table-striped table-xsmn text-table livetn3">
                                        <thead>
                                        <tr>
                                            <th class="text-center">Giải</th>
                                            <th class="text-center"><a href="/ket-qua-xsmn/kqxsmn-bac-lieu"
                                                                       title="Xổ số XSBL">Bạc Liêu</a></th>
                                            <th class="text-center"><a href="/ket-qua-xsmn/kqxsmn-vung-tau"
                                                                       title="Xổ số XSVT">Vũng Tàu</a></th>
                                            <th class="text-center"><a href="/ket-qua-xsmn/kqxsmn-ben-tre"
                                                                       title="Xổ số XSBTR">Bến Tre</a></th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <tr>
                                            <td class="G.8" style="width: 15%">G.8</td>
                                            <td class="text-center"><span
                                                    class=" number-black-bold div-horizontal">72</span><br></td>
                                            <td class="text-center"><span
                                                    class=" number-black-bold div-horizontal">56</span><br></td>
                                            <td class="text-center"><span
                                                    class=" number-black-bold div-horizontal">31</span><br></td>
                                        </tr>

                                        <tr>
                                            <td class="G.7" style="width: 15%">G.7</td>
                                            <td class="text-center"><span
                                                    class=" number-black-bold div-horizontal">920</span><br></td>
                                            <td class="text-center"><span
                                                    class=" number-black-bold div-horizontal">868</span><br></td>
                                            <td class="text-center"><span
                                                    class=" number-black-bold div-horizontal">475</span><br></td>
                                        </tr>

                                        <tr>
                                            <td class="G.6" style="width: 15%">G.6</td>
                                            <td class="text-center"><span
                                                    class=" number-black-bold div-horizontal">1897</span><br><span
                                                    class=" number-black-bold div-horizontal">5008</span><br><span
                                                    class=" number-black-bold div-horizontal">4717</span><br></td>
                                            <td class="text-center"><span
                                                    class=" number-black-bold div-horizontal">2703</span><br><span
                                                    class=" number-black-bold div-horizontal">7359</span><br><span
                                                    class=" number-black-bold div-horizontal">9078</span><br></td>
                                            <td class="text-center"><span
                                                    class=" number-black-bold div-horizontal">8246</span><br><span
                                                    class=" number-black-bold div-horizontal">4354</span><br><span
                                                    class=" number-black-bold div-horizontal">4118</span><br></td>
                                        </tr>

                                        <tr>
                                            <td class="G.5" style="width: 15%">G.5</td>
                                            <td class="text-center"><span
                                                    class=" number-black-bold div-horizontal">8256</span><br></td>
                                            <td class="text-center"><span
                                                    class=" number-black-bold div-horizontal">8196</span><br></td>
                                            <td class="text-center"><span
                                                    class=" number-black-bold div-horizontal">5676</span><br></td>
                                        </tr>

                                        <tr>
                                            <td class="G.4" style="width: 15%">G.4</td>
                                            <td class="text-center"><span class=" number-black-bold div-horizontal">53327</span><br><span
                                                    class=" number-black-bold div-horizontal">87145</span><br><span
                                                    class=" number-black-bold div-horizontal">96004</span><br><span
                                                    class=" number-black-bold div-horizontal">59619</span><br><span
                                                    class=" number-black-bold div-horizontal">27169</span><br><span
                                                    class=" number-black-bold div-horizontal">53956</span><br><span
                                                    class=" number-black-bold div-horizontal">61403</span><br></td>
                                            <td class="text-center"><span class=" number-black-bold div-horizontal">29030</span><br><span
                                                    class=" number-black-bold div-horizontal">37993</span><br><span
                                                    class=" number-black-bold div-horizontal">97620</span><br><span
                                                    class=" number-black-bold div-horizontal">56554</span><br><span
                                                    class=" number-black-bold div-horizontal">89048</span><br><span
                                                    class=" number-black-bold div-horizontal">51426</span><br><span
                                                    class=" number-black-bold div-horizontal">98192</span><br></td>
                                            <td class="text-center"><span class=" number-black-bold div-horizontal">65729</span><br><span
                                                    class=" number-black-bold div-horizontal">53261</span><br><span
                                                    class=" number-black-bold div-horizontal">55766</span><br><span
                                                    class=" number-black-bold div-horizontal">12224</span><br><span
                                                    class=" number-black-bold div-horizontal">17137</span><br><span
                                                    class=" number-black-bold div-horizontal">74075</span><br><span
                                                    class=" number-black-bold div-horizontal">31376</span><br></td>
                                        </tr>

                                        <tr>
                                            <td class="G.3" style="width: 15%">G.3</td>
                                            <td class="text-center"><span class=" number-black-bold div-horizontal">25659</span><br><span
                                                    class=" number-black-bold div-horizontal">95241</span><br></td>
                                            <td class="text-center"><span class=" number-black-bold div-horizontal">19793</span><br><span
                                                    class=" number-black-bold div-horizontal">01574</span><br></td>
                                            <td class="text-center"><span class=" number-black-bold div-horizontal">43304</span><br><span
                                                    class=" number-black-bold div-horizontal">35829</span><br></td>
                                        </tr>

                                        <tr>
                                            <td class="G.2" style="width: 15%">G.2</td>
                                            <td class="text-center"><span class=" number-black-bold div-horizontal">21772</span><br>
                                            </td>
                                            <td class="text-center"><span class=" number-black-bold div-horizontal">35296</span><br>
                                            </td>
                                            <td class="text-center"><span class=" number-black-bold div-horizontal">76223</span><br>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="G.1" style="width: 15%">G.1</td>
                                            <td class="text-center"><span class=" number-black-bold div-horizontal">04099</span><br>
                                            </td>
                                            <td class="text-center"><span class=" number-black-bold div-horizontal">08666</span><br>
                                            </td>
                                            <td class="text-center"><span class=" number-black-bold div-horizontal">63886</span><br>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="ĐB" style="width: 15%">ĐB</td>
                                            <td class="text-center"><span class=" number-black-bold div-horizontal">246511</span><br>
                                            </td>
                                            <td class="text-center"><span class=" number-black-bold div-horizontal">694086</span><br>
                                            </td>
                                            <td class="text-center"><span class=" number-black-bold div-horizontal">029010</span><br>
                                            </td>
                                        </tr>


                                        </tbody>
                                    </table>

                                </div>
                                <hr class="line-header">


                                <div class="block-main-content view-loto">

                                    <p class="padding10">
                                        <a href="/ket-qua-xsmn/ket-qua-lo-to-mien-nam">Lô tô XSMN</a><span> » </span>
                                        <a href="/ket-qua-xsmn/ket-qua-lo-to-mien-nam/kqltmn-thu-ba"
                                           title="XSMN  Tuesday">Lô tô XSMN Thứ ba </a>

                                    </p>
                                    <table class="table table-bordered table-loto">
                                        <tbody>
                                        <tr>
                                            <th class="col-md-2" style="width: 10%;">Đầu</th>

                                            <th class="text-center"><a href="/ket-qua-xsmn/kqxsmn-bac-lieu"
                                                                       title="Xổ số XSBL">Bạc Liêu</a></th>
                                            <th class="text-center"><a href="/ket-qua-xsmn/kqxsmn-vung-tau"
                                                                       title="Xổ số XSVT">Vũng Tàu</a></th>
                                            <th class="text-center"><a href="/ket-qua-xsmn/kqxsmn-ben-tre"
                                                                       title="Xổ số XSBTR">Bến Tre</a></th>
                                        </tr>

                                        <tr>
                                            <td class="show_center">0</td>
                                            <td>08,04,03</td>
                                            <td>03</td>
                                            <td>04</td>
                                        </tr>
                                        <tr>
                                            <td class="show_center">1</td>
                                            <td>17,19,11</td>
                                            <td>-</td>
                                            <td>18,10</td>
                                        </tr>
                                        <tr>
                                            <td class="show_center">2</td>
                                            <td>20,27</td>
                                            <td>20,26</td>
                                            <td>29,24,29,23</td>
                                        </tr>
                                        <tr>
                                            <td class="show_center">3</td>
                                            <td>-</td>
                                            <td>30</td>
                                            <td>31,37</td>
                                        </tr>
                                        <tr>
                                            <td class="show_center">4</td>
                                            <td>45,41</td>
                                            <td>48</td>
                                            <td>46</td>
                                        </tr>
                                        <tr>
                                            <td class="show_center">5</td>
                                            <td>56,56,59</td>
                                            <td>56,59,54</td>
                                            <td>54</td>
                                        </tr>
                                        <tr>
                                            <td class="show_center">6</td>
                                            <td>69</td>
                                            <td>68,66</td>
                                            <td>61,66</td>
                                        </tr>
                                        <tr>
                                            <td class="show_center">7</td>
                                            <td>72,72</td>
                                            <td>78,74</td>
                                            <td>75,76,75,76</td>
                                        </tr>
                                        <tr>
                                            <td class="show_center">8</td>
                                            <td>-</td>
                                            <td>86</td>
                                            <td>86</td>
                                        </tr>
                                        <tr>
                                            <td class="show_center">9</td>
                                            <td>97,99</td>
                                            <td>96,93,92,93,96</td>
                                            <td>-</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>


                        </div>

                        <div id="post-data" class="col-md-6 xsmn">


                            <div class="block remove-margin" id="xsmb-2">
                                <div class="block-main-heading">
                                    <h1>Kết Quả Xổ số miền Nam (XSMN) </h1>
                                </div>
                                <div class="list-link">
                                    <h2 class="class-title-list-link">

                                        <a href="/ket-qua-xsmn" title="XSMN">XSMN</a><span> » </span>
                                        <a href="/ket-qua-xsmn/kqxsmn-thu-ba" title="XSMN Tuesday">XSMN Thứ
                                            ba </a><span> » </span>
                                        <a href="/ket-qua-xsmn/kqxsmn-ngay-14-01-2020" title="XSMN  Tuesday"> XSMN
                                            14/01/2020</a>


                                    </h2>
                                </div>
                                <div class="block-main-content">
                                    <table class="table table-bordered table-striped table-xsmn text-table livetn3">
                                        <thead>
                                        <tr>
                                            <th class="text-center">Giải</th>
                                            <th class="text-center"><a href="/ket-qua-xsmn/kqxsmn-bac-lieu"
                                                                       title="Xổ số XSBL">Bạc Liêu</a></th>
                                            <th class="text-center"><a href="/ket-qua-xsmn/kqxsmn-vung-tau"
                                                                       title="Xổ số XSVT">Vũng Tàu</a></th>
                                            <th class="text-center"><a href="/ket-qua-xsmn/kqxsmn-ben-tre"
                                                                       title="Xổ số XSBTR">Bến Tre</a></th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <tr>
                                            <td class="G.8" style="width: 15%">G.8</td>
                                            <td class="text-center"><span
                                                    class=" number-black-bold div-horizontal">72</span><br></td>
                                            <td class="text-center"><span
                                                    class=" number-black-bold div-horizontal">56</span><br></td>
                                            <td class="text-center"><span
                                                    class=" number-black-bold div-horizontal">31</span><br></td>
                                        </tr>

                                        <tr>
                                            <td class="G.7" style="width: 15%">G.7</td>
                                            <td class="text-center"><span
                                                    class=" number-black-bold div-horizontal">920</span><br></td>
                                            <td class="text-center"><span
                                                    class=" number-black-bold div-horizontal">868</span><br></td>
                                            <td class="text-center"><span
                                                    class=" number-black-bold div-horizontal">475</span><br></td>
                                        </tr>

                                        <tr>
                                            <td class="G.6" style="width: 15%">G.6</td>
                                            <td class="text-center"><span
                                                    class=" number-black-bold div-horizontal">1897</span><br><span
                                                    class=" number-black-bold div-horizontal">5008</span><br><span
                                                    class=" number-black-bold div-horizontal">4717</span><br></td>
                                            <td class="text-center"><span
                                                    class=" number-black-bold div-horizontal">2703</span><br><span
                                                    class=" number-black-bold div-horizontal">7359</span><br><span
                                                    class=" number-black-bold div-horizontal">9078</span><br></td>
                                            <td class="text-center"><span
                                                    class=" number-black-bold div-horizontal">8246</span><br><span
                                                    class=" number-black-bold div-horizontal">4354</span><br><span
                                                    class=" number-black-bold div-horizontal">4118</span><br></td>
                                        </tr>

                                        <tr>
                                            <td class="G.5" style="width: 15%">G.5</td>
                                            <td class="text-center"><span
                                                    class=" number-black-bold div-horizontal">8256</span><br></td>
                                            <td class="text-center"><span
                                                    class=" number-black-bold div-horizontal">8196</span><br></td>
                                            <td class="text-center"><span
                                                    class=" number-black-bold div-horizontal">5676</span><br></td>
                                        </tr>

                                        <tr>
                                            <td class="G.4" style="width: 15%">G.4</td>
                                            <td class="text-center"><span class=" number-black-bold div-horizontal">53327</span><br><span
                                                    class=" number-black-bold div-horizontal">87145</span><br><span
                                                    class=" number-black-bold div-horizontal">96004</span><br><span
                                                    class=" number-black-bold div-horizontal">59619</span><br><span
                                                    class=" number-black-bold div-horizontal">27169</span><br><span
                                                    class=" number-black-bold div-horizontal">53956</span><br><span
                                                    class=" number-black-bold div-horizontal">61403</span><br></td>
                                            <td class="text-center"><span class=" number-black-bold div-horizontal">29030</span><br><span
                                                    class=" number-black-bold div-horizontal">37993</span><br><span
                                                    class=" number-black-bold div-horizontal">97620</span><br><span
                                                    class=" number-black-bold div-horizontal">56554</span><br><span
                                                    class=" number-black-bold div-horizontal">89048</span><br><span
                                                    class=" number-black-bold div-horizontal">51426</span><br><span
                                                    class=" number-black-bold div-horizontal">98192</span><br></td>
                                            <td class="text-center"><span class=" number-black-bold div-horizontal">65729</span><br><span
                                                    class=" number-black-bold div-horizontal">53261</span><br><span
                                                    class=" number-black-bold div-horizontal">55766</span><br><span
                                                    class=" number-black-bold div-horizontal">12224</span><br><span
                                                    class=" number-black-bold div-horizontal">17137</span><br><span
                                                    class=" number-black-bold div-horizontal">74075</span><br><span
                                                    class=" number-black-bold div-horizontal">31376</span><br></td>
                                        </tr>

                                        <tr>
                                            <td class="G.3" style="width: 15%">G.3</td>
                                            <td class="text-center"><span class=" number-black-bold div-horizontal">25659</span><br><span
                                                    class=" number-black-bold div-horizontal">95241</span><br></td>
                                            <td class="text-center"><span class=" number-black-bold div-horizontal">19793</span><br><span
                                                    class=" number-black-bold div-horizontal">01574</span><br></td>
                                            <td class="text-center"><span class=" number-black-bold div-horizontal">43304</span><br><span
                                                    class=" number-black-bold div-horizontal">35829</span><br></td>
                                        </tr>

                                        <tr>
                                            <td class="G.2" style="width: 15%">G.2</td>
                                            <td class="text-center"><span class=" number-black-bold div-horizontal">21772</span><br>
                                            </td>
                                            <td class="text-center"><span class=" number-black-bold div-horizontal">35296</span><br>
                                            </td>
                                            <td class="text-center"><span class=" number-black-bold div-horizontal">76223</span><br>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="G.1" style="width: 15%">G.1</td>
                                            <td class="text-center"><span class=" number-black-bold div-horizontal">04099</span><br>
                                            </td>
                                            <td class="text-center"><span class=" number-black-bold div-horizontal">08666</span><br>
                                            </td>
                                            <td class="text-center"><span class=" number-black-bold div-horizontal">63886</span><br>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="ĐB" style="width: 15%">ĐB</td>
                                            <td class="text-center"><span class=" number-black-bold div-horizontal">246511</span><br>
                                            </td>
                                            <td class="text-center"><span class=" number-black-bold div-horizontal">694086</span><br>
                                            </td>
                                            <td class="text-center"><span class=" number-black-bold div-horizontal">029010</span><br>
                                            </td>
                                        </tr>


                                        </tbody>
                                    </table>

                                </div>
                                <hr class="line-header">


                                <div class="block-main-content view-loto">

                                    <p class="padding10">
                                        <a href="/ket-qua-xsmn/ket-qua-lo-to-mien-nam">Lô tô XSMN</a><span> » </span>
                                        <a href="/ket-qua-xsmn/ket-qua-lo-to-mien-nam/kqltmn-thu-ba"
                                           title="XSMN  Tuesday">Lô tô XSMN Thứ ba </a>

                                    </p>
                                    <table class="table table-bordered table-loto">
                                        <tbody>
                                        <tr>
                                            <th class="col-md-2" style="width: 10%;">Đầu</th>

                                            <th class="text-center"><a href="/ket-qua-xsmn/kqxsmn-bac-lieu"
                                                                       title="Xổ số XSBL">Bạc Liêu</a></th>
                                            <th class="text-center"><a href="/ket-qua-xsmn/kqxsmn-vung-tau"
                                                                       title="Xổ số XSVT">Vũng Tàu</a></th>
                                            <th class="text-center"><a href="/ket-qua-xsmn/kqxsmn-ben-tre"
                                                                       title="Xổ số XSBTR">Bến Tre</a></th>
                                        </tr>

                                        <tr>
                                            <td class="show_center">0</td>
                                            <td>08,04,03</td>
                                            <td>03</td>
                                            <td>04</td>
                                        </tr>
                                        <tr>
                                            <td class="show_center">1</td>
                                            <td>17,19,11</td>
                                            <td>-</td>
                                            <td>18,10</td>
                                        </tr>
                                        <tr>
                                            <td class="show_center">2</td>
                                            <td>20,27</td>
                                            <td>20,26</td>
                                            <td>29,24,29,23</td>
                                        </tr>
                                        <tr>
                                            <td class="show_center">3</td>
                                            <td>-</td>
                                            <td>30</td>
                                            <td>31,37</td>
                                        </tr>
                                        <tr>
                                            <td class="show_center">4</td>
                                            <td>45,41</td>
                                            <td>48</td>
                                            <td>46</td>
                                        </tr>
                                        <tr>
                                            <td class="show_center">5</td>
                                            <td>56,56,59</td>
                                            <td>56,59,54</td>
                                            <td>54</td>
                                        </tr>
                                        <tr>
                                            <td class="show_center">6</td>
                                            <td>69</td>
                                            <td>68,66</td>
                                            <td>61,66</td>
                                        </tr>
                                        <tr>
                                            <td class="show_center">7</td>
                                            <td>72,72</td>
                                            <td>78,74</td>
                                            <td>75,76,75,76</td>
                                        </tr>
                                        <tr>
                                            <td class="show_center">8</td>
                                            <td>-</td>
                                            <td>86</td>
                                            <td>86</td>
                                        </tr>
                                        <tr>
                                            <td class="show_center">9</td>
                                            <td>97,99</td>
                                            <td>96,93,92,93,96</td>
                                            <td>-</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>

            </div>
        </div>

@stop

