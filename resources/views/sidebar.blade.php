@php $sidebar = checkList(); @endphp
@php $sidebarXsmt = checkList('XSMT'); @endphp
@php $sidebarVietlott = checkList('Vietlott'); @endphp
<div class="hidden-xs hidden-sm col-md-3 fix-width-center">
    <h2 class="hide">Center side bar</h2>
    <!-- Add an additional blue button style -->

    <div style="margin-bottom: 21px; margin-top: 11px;" class="item-menu">
        <div id="calcontainer"></div>
    </div>

    <div class="item-menu center-side-bar">
        <div class="title-item">
            <h3 class="btn-red-new"><a href="/ket-qua-xsmb" title="xổ số miền Bắc">Xổ số miền Bắc</a></h3>
        </div>
        <div class="content-item"><ul>

                    <li><a href="/ket-qua-xsmb" title="Xổ số miền Bắc">Miền Bắc</a></li>

            </ul>
        </div>

    </div>

    <div class="item-menu center-side-bar margin-top-no">
        <div class="title-item">
            <h3 class="btn-red-new"><a href="/ket-qua-xsmn/" title="xổ số miền Nam">Xổ số miền Nam</a></h3>
        </div>
        <div class="content-item"><ul>
                @foreach($sidebar as $content)
                    <li><a href="/ket-qua-xsmn/kqxsmn-{{ $content->lottery_company_slug }}" title="{{ $content->lottery_company_names }}">{{ $content->lottery_company_names }}</a></li>
                    @endforeach
            </ul>
        </div>

    </div>

    <div class="item-menu center-side-bar margin-top-no">
        <div class="title-item">
            <h3 class="btn-red-new"><a href="/ket-qua-xsmt" title="xổ số miền Trung">Xổ số miền Trung</a></h3>
        </div>
        <div class="content-item"><ul>
                @foreach($sidebarXsmt as $content)
                    <li><a href="/ket-qua-xsmt/kqxsmt-{{ $content->lottery_company_slug }}" title="{{ $content->lottery_company_names }}">{{ $content->lottery_company_names }}</a></li>
                    @endforeach
            </ul>
        </div>

    </div>

    <div class="item-menu center-side-bar margin-top-no">
        <div class="title-item">
            <h3 class="btn-red-new"><a href="/ket-qua-vietlott/kqvietlott-mega-645" title="xổ số miền Trung">Xổ số Vietlott</a></h3>
        </div>
        <div class="content-item"><ul>
                @foreach($sidebarVietlott as $content)
                    <li><a href="/ket-qua-vietlott/kqvietlott-{{ $content->lottery_company_slug }}" title="{{ $content->lottery_company_names }}">{{getVietlottText($content->lottery_company_slug)}}</a></li>
                    @endforeach
            </ul>
        </div>

    </div>



</div>
<div class="col-xs-12 col-sm-12 col-md-3 fix-width-right">

    <h2 class="hide">Right side bar</h2>

    <div class="hidden-xs hidden-sm item-menu border-margin" style="margin-top:10px">
        <div class="title-item">
            <h3 class="show-border-clor-left list_border"><a href="/ket-qua-vietlott">Xổ Số Điện Toán</a></h3></div>
        <div class="content-item">
            <ul>
                <li><a href="/ket-qua-vietlott/kqvietlott-mega-645" title="XS Mega 6/45" class="text-black-bold">XS Mega 6/45</a>
                    <ul class="sub-content">
                        <li><a href="/ket-qua-vietlott/xs-mega-thu-4" title="XS Mega 6/45 thứ 4">Thứ 4</a></li>
                        <li><a href="/ket-qua-vietlott/xs-mega-thu-6" title="XS Mega 6/45 thứ 6">Thứ 6</a></li>
                        <li><a href="/ket-qua-vietlott/xs-mega-chu-nhat" title="XS Mega 6/45 chủ nhật">Chủ Nhật</a></li>
                    </ul>
                </li>
                <li><a href="/ket-qua-vietlott/kqvietlott-max-4d" title="XS Max 4D" class="text-black-bold">XS Max 4D</a>
                    <ul class="sub-content">
                        <li><a href="/ket-qua-vietlott/xs-max-4d-thu-3" title="XS Max 4D thứ 3">Thứ 3</a></li>
                        <li><a href="/ket-qua-vietlott/xs-max-4d-thu-5" title="XS Max 4D thứ 5">Thứ 5</a></li>
                        <li><a href="/ket-qua-vietlott/xs-max-4d-thu-7" title="XS Max 4D thứ 7">Thứ 7</a></li>
                    </ul>
                </li>
                <li><a href="/ket-qua-vietlott/kqvietlott-power-655" title="XS Power 6/55" class="text-black-bold">XS Power 6/55</a>
                    <ul class="sub-content">
                        <li><a href="/ket-qua-vietlott/power-655-thu-3" title="XS Power thứ 3">Thứ 3</a></li>
                        <li><a href="/ket-qua-vietlott/power-655-thu-5" title="XS Power thứ 5">Thứ 5</a></li>
                        <li><a href="/ket-qua-vietlott/power-655-thu-7" title="XS Power thứ 7">Thứ 7</a></li>
                    </ul>
                </li>
                <li><a href="/ket-qua-vietlott/kqvietlott-xo-so-max-3d" title="XS Max 3D" class="text-black-bold">XS Max 3D</a>
                    <ul class="sub-content">
                        <li><a href="/ket-qua-vietlott/xs-max-3d-thu-2" title="XS Max 3D thứ 2">Thứ 2</a></li>
                        <li><a href="/ket-qua-vietlott/xs-max-3d-thu-4" title="XS Max 3D thứ 4">Thứ 4</a></li>
                        <li><a href="/ket-qua-vietlott/xs-max-3d-thu-6" title="XS Max 3D thứ 6">Thứ 6</a></li>
                    </ul>
                </li>
                <li><a href="/ket-qua-dien-toan/kqxs-dien-toan-6-36/" title="XS Điện toán 6x36" class="text-black-bold">XS Điện toán 6x36</a></li>
                <li><a href="/ket-qua-dien-toan/kqxs-dien-toan-123/" title="XS Điện toán 123" class="text-black-bold">XS Điện toán 123</a></li>
                <li><a href="/ket-qua-dien-toan/kqxs-dien-toan-than-tai-4/" title="XS Thần tài 4" class="text-black-bold">XS Thần tài 4</a></li>
            </ul>
        </div>
    </div>


    <div class="item-menu border-margin margin-top-setting">
        <div class="title-item"><h3 class="show-border-clor-left list_border"><a href="#">Dò vé số - May mắn mỗi ngày</a></h3></div>
        <div class="form-doveso">
            <div class="form-inline">
                <div class="form-group"><label for="ngaydoheader" class="lable-text">Chọn ngày:</label>
                    <input style="line-height: 21px" type="date" id="ngaydoheader" value="{{ date('Y-m-d') }}" class="form-control form-group" required="required" placeholder="Chọn ngày"  size="9" title="Ngày dò">
                </div>
                <div class="form-group">
                    <label for="tinhheader" class="lable-text">Chọn tỉnh:</label>
                    <select class="form-control form-group" id="tinhheader">
                        @php $todayCompanies = getTodayResultCompany(); @endphp
                        @foreach($todayCompanies as $cmp)
                            <option value="{{ $cmp->lottery_company }}" data-lotterydesc="/xsmb-xo-so-mien-bac.html">{{ $cmp->lottery_company_names }}</option>
                            @endforeach

                    </select></div>
                <div class="form-group">
                    <input type="text" class="form-control form-group" name="nhapso" id="inputNumberDo" required="required" placeholder="Nhập dãy số" size="9" title="Nhập dãy số">
                    <button type="button"  class="btn btn-red-blue-lite form-group" id="btndoSo" title="Kết quả">Kết quả</button>
                </div></div>
            <p class="text-12">( Có thể nhập tối thiểu 2 số, tối đa 17 số )</p>
        </div>
    </div>

    <div class="hidden-xs hidden-sm item-menu border-margin margin-top-setting">
        <!-- /21689237362/xoso-sidebar01 -->
        <div id='div-gpt-ad-1578217830804-0' style='width: 300px; height: 600px;'>
            <script>
                googletag.cmd.push(function() { googletag.display('div-gpt-ad-1578217830804-0'); });
            </script>
        </div>
    </div>
    <div class="hidden-xs hidden-sm item-menu border-margin margin-top-setting">
        <!-- /21689237362/xoso-sidebar02 -->
        <div id='div-gpt-ad-1578217870888-0' style='width: 300px; height: 600px;'>
            <script>
                googletag.cmd.push(function() { googletag.display('div-gpt-ad-1578217870888-0'); });
            </script>
        </div>
    </div>
</div>
