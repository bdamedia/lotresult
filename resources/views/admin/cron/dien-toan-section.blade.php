<style>

    .dientoan-detail ul li {
        width: 57px;
        height: 57px;
        line-height: 50px;
        font-size: 30px;
        background: #FFF;
        color: #2F0DF9;
        border: 1px solid #2F0DF9;
        display: inline-block;
        border-radius: 57px;
        vertical-align: middle;
        font-weight: 700;
        margin-right: 20px;
        margin-bottom: 10px;
    }
    .bg-viewmore, .content-copy-right, .dientoan-detail ul li, .error-header, .open-next, .test-rss, .title-item, .vertical-table th {
        text-align: center;
    }

    .list-link ul {
        padding: 5px 0;
    }

    .link-statistic ul, .list-link ul, .mega-detail ul, .power-detail ul, ul {
        list-style-type: none;
    }

    .list-link li a, .list-link ul li {
        color: #900;
        font-weight: 700;
    }
    .list-link ul li {
        padding: 0 2px;
        display: inline-block;
    }
    .list-link ul li span:after {
        content: '\f101';
        font-family: FontAwesome;
        margin-top: 0;
        margin-left: 2px;
    }
    .no-border {
        border: transparent!important;
    }



</style>
<div id="ajaxContentContainer" >
    <div class="list-link">
        <ul>
            <li>
                <a href="/xo-so-dien-toan-6x36.html" class="u-line">{{ $data->lottery_company }}</a>
                <span></span>
            </li>
            <li>
                <a href="/xo-so-dien-toan-6x36-thu-7.html" class="u-line">{{ $data->lottery_company }} {{ engToVit($data->result_day_time->toDateTime()->format('l')) }}</a>, {{ $data->result_day_time->toDateTime()->format('d-m-Y') }}
            </li>
        </ul>
    </div>

    <div class="dientoan-detail">
        <ul>
            @if($data->prize_1)

            @php  $prize = json_decode($data->prize_1); /*$prize = json_decode($prize_1);*/ $prize = json_decode($prize->prize_1);    @endphp

                @foreach($prize as $pval)
                    @if($data->lottery_company == 'XS Thần tài')
                        <li class="no-border">{{ $pval }}</li>
                    @else
                        <li>{{ $pval }}</li>
                        @endif

                @endforeach

            @endif
        </ul>
    </div>
</div>