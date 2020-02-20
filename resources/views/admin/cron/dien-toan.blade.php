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
        .block-clock .clock.flip-clock-wrapper {
            margin-top: -1em;
            margin-left: 23px
        }

        .output {
            background: #c30909;
            background: -webkit-linear-gradient(rgba(195, 9, 9, 1), rgba(73, 3, 3, 1));
            background: -o-linear-gradient(rgba(195, 9, 9, 1), rgba(73, 3, 3, 1));
            background: -moz-linear-gradient(rgba(195, 9, 9, 1), rgba(73, 3, 3, 1));
            background: linear-gradient(rgba(195, 9, 9, 1), rgba(73, 3, 3, 1));
            border-radius: 100%;
            font-size: 24px;
            color: #fff;
            padding: 0 5px;
            display: inline
        }

        .flip-clock-wrapper.clearfix:after, .flip-clock-wrapper.clearfix:before, .flip-clock-wrapper:after, .flip-clock-wrapper:before {
            content: " ";
            display: table
        }

        .flip-clock-wrapper * {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            -ms-box-sizing: border-box;
            -o-box-sizing: border-box;
            box-sizing: border-box;
            -webkit-backface-visibility: hidden;
            -moz-backface-visibility: hidden;
            -ms-backface-visibility: hidden;
            -o-backface-visibility: hidden;
            backface-visibility: hidden
        }

        .flip-clock-wrapper a {
            cursor: pointer;
            text-decoration: none;
            color: #ccc
        }

        .flip-clock-wrapper a:hover {
            color: #fff
        }

        .flip-clock-wrapper {
            font: 400 11px "Helvetica Neue", Helvetica, sans-serif;
            -webkit-user-select: none;
            text-align: center;
            position: relative;
            max-width: 347px;
            margin: 0 auto;
        }

        .flip-clock-meridium {
            background: 0 0 !important;
            box-shadow: 0 0 0 !important;
            font-size: 36px !important
        }

        .flip-clock-meridium a {
            color: #313333
        }

        .flip-clock-wrapper ul {
            position: relative;
            float: left;
            margin: 5px;
            width: 40px;
            height: 60px;
            font-size: 60px;
            font-weight: 700;
            line-height: 70px;
            border-radius: 6px;
            background: #000
        }

        .flip-clock-wrapper ul li {
            z-index: 1;
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            line-height: 63px;
            list-style: none;
            text-decoration: none !important
        }

        .flip-clock-wrapper ul li:first-child {
            z-index: 2
        }

        .flip-clock-wrapper ul li a {
            display: block;
            height: 100%;
            -webkit-perspective: 200px;
            -moz-perspective: 200px;
            perspective: 200px;
            margin: 0 !important;
            overflow: visible !important;
            cursor: default !important
        }

        .flip-clock-wrapper ul li a div {
            z-index: 1;
            position: absolute;
            left: 0;
            width: 100%;
            height: 50%;
            font-size: 80px;
            overflow: hidden;
            outline: transparent solid 1px
        }

        .flip-clock-wrapper ul li a div .shadow {
            position: absolute;
            width: 100%;
            height: 100%;
            z-index: 2
        }

        .flip-clock-wrapper ul li a div.up {
            -webkit-transform-origin: 50% 100%;
            -moz-transform-origin: 50% 100%;
            -ms-transform-origin: 50% 100%;
            -o-transform-origin: 50% 100%;
            transform-origin: 50% 100%;
            top: 0
        }

        .flip-clock-wrapper ul li a div.up:after {
            content: "";
            position: absolute;
            top: 44px;
            left: 0;
            z-index: 5;
            width: 100%;
            height: 3px;
            background-color: #000;
            background-color: rgba(0, 0, 0, .4)
        }

        .flip-clock-wrapper ul li a div.down {
            -webkit-transform-origin: 50% 0;
            -moz-transform-origin: 50% 0;
            -ms-transform-origin: 50% 0;
            -o-transform-origin: 50% 0;
            transform-origin: 50% 0;
            bottom: 0;
            border-bottom-left-radius: 6px;
            border-bottom-right-radius: 6px
        }

        .flip-clock-wrapper ul li a div div.inn {
            position: absolute;
            left: 0;
            z-index: 1;
            width: 100%;
            height: 200%;
            color: #fff;
            text-shadow: 0 1px 2px #000;
            text-align: center;
            background-color: #cd0000;
            border-radius: 6px;
            /*font-size: 58px;*/
            font-size: 38px
        }

        .flip-clock-wrapper ul li a div.up div.inn {
            top: 0
        }

        .flip-clock-wrapper ul li a div.down div.inn {
            bottom: 0
        }

        .flip-clock-wrapper ul.play li.flip-clock-before {
            z-index: 3
        }

        .flip-clock-wrapper .flip {
            box-shadow: 0 2px 5px rgba(0, 0, 0, .7)
        }

        .flip-clock-wrapper ul.play li.flip-clock-active {
            -webkit-animation: asd .5s .5s linear both;
            -moz-animation: asd .5s .5s linear both;
            animation: asd .5s .5s linear both;
            z-index: 5
        }

        .flip-clock-divider {
            float: left;
            display: inline-block;
            position: relative;
            width: 20px;
            height: 100px
        }

        .flip-clock-divider:first-child {
            width: 0
        }

        .flip-clock-dot {
            display: block;
            background: #cd0000;
            width: 10px;
            height: 10px;
            position: absolute;
            border-radius: 50%;
            box-shadow: 0 0 5px rgba(0, 0, 0, .5);
            left: 5px
        }

        .flip-clock-divider .flip-clock-label {
            position: absolute;
            bottom: 0;
            right: -63px;
            color: #000;
            text-shadow: none;
            font-size: 18px
        }

        .flip-clock-divider.minutes .flip-clock-label {
            right: -69px
        }

        .flip-clock-divider.seconds .flip-clock-label {
            right: -67px
        }

        .flip-clock-dot.top {
            top: 22px
        }

        .flip-clock-dot.bottom {
            bottom: 46px
        }
        input[type='button']{

            align-self: center;
            padding: 2px 2px 2px 2px;
            box-sizing: border-box;
            width: 100%;
            border-width: 0px;
            color: #ffffff;
            width: 96px;
            height: 40px;
            background: inherit;
            background-color: rgba(22, 155, 213, 1);
            border: none;
            border-radius: 5px;
            -moz-box-shadow: none;
            -webkit-box-shadow: none;
            box-shadow: none;
        }
        .start-stop-button{
            color: #fff;
            text-shadow: 0 1px 2px #000;
            text-align: center;
            background-color: #cd0000;
            border: 0px solid #cd0000;
            padding: 10px;
            border-radius: 18px;
            font-size: 22px;
        }

        .u5596_div {
            border-width: 0px;
            /* position: absolute;*/
            margin-left: 10px;
            width: 67px;
            height: 22px;
            background: inherit;
            background-color: rgba(242, 242, 242, 1);
            border: none;
            border-radius: 10px;
            -moz-box-shadow: none;
            -webkit-box-shadow: none;
            box-shadow: none;
            font-family: 'Arial-BoldMT', 'Arial Bold', 'Arial';
            font-weight: 700;
            font-style: normal;
            font-size: 18px;
            color: #000000;
        }
        form span {
            float: left;
        }
        form{
            margin-top: 15px;
        }
    </style>
@endsection

@section('js')
    <script src="{{ URL::asset('js/flipclock.js') }}"> </script>
    <script src="{{ URL::asset('js/clock.js') }}"> </script>

@endsection

@section('js')
@endsection

@section('title', 'Admin | XS Dien Toan')

@section('content_header')
    <h1 class="m-0 text-dark">Dashboard</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">

            <form class="form" method="post" enctype="multipart/form-data" action="/admin/cron/dien-toan" role="form" autocomplete="off">
                @csrf
                <input type="hidden" name="check" value="1"/>
                <input type="submit" name="start" value="Start Cron"/>

          </form>

        </div>

@stop

