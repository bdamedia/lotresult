@php $todayCompanies = getTodayResultCompany(); @endphp
<div class="margin-40 col-md-12">

    <div id="u129" class="ax_default box_2">

        <div id="u129_text" class="text ">
            @php $mytime = Carbon\Carbon::now();

                @endphp
            <p><span>Hôm nay - {{ engToVit($mytime->toDateTime()->format('l')) }} - {{ $mytime->toDateTime()->format('d/m/Y') }}</span></p>
        </div>
    </div>

    <div id="u130" class="ax_default box_2">

        <div id="u130_text" class="text ">
            <p><span>Các tỉnh mở thưởng ngày hôm nay</span></p>
        </div>
    </div>
    <div id="u118" class="ax_default">
        <div id="u119" class="ax_default table_cell remove-line-height" style="cursor: pointer;">

            <div id="u119_text" class="text ">
                <a href="/{{ "ket-qua-xsmb/" }}" ><span id="cache1" style="">{{ "Miền Bắc" }}</span></a>
            </div>
        </div>
        <!-- Unnamed (Table Cell) -->
        @foreach($todayCompanies as $data)
        <div id="u119" class="ax_default table_cell remove-line-height" style="cursor: pointer;">

            <div id="u119_text" class="text ">
                 <a href="@if($data->lottery_region == 'XSMN') {{ "/ket-qua-xsmn/kqxsmn-" }}{{ $data->lottery_company_slug }}
                    @elseif($data->lottery_region == 'XSMT') 
                        {{ "/ket-qua-xsmt/kqxsmt-" }}{{ $data->lottery_company_slug }}  
                    @elseif($data->lottery_region == 'XSMB') 
                        {{ "ket-qua-xsmb/" }}{{ $data->lottery_company_slug }}  
                    @elseif($data->lottery_region == 'Vietlott') 
                        {{ "/ket-qua-vietlott/kqvietlott-" }}{{ $data->lottery_company_slug }}  
                    @endif">
                    @php if($data->lottery_region == 'Vietlott') { @endphp
                        <span id="cache1" style="">{{getVietlottText($data->lottery_company_slug)}}</span>
                    @php } else { @endphp
                        <span id="cache1" style="">{{ $data->lottery_company_names }}</span>
                    @php } @endphp
                </a>
            </div>
        </div>
            @endforeach

    </div>
</div>
