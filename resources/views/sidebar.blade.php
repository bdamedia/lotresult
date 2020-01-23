@php $sidebar = checkList(); @endphp
@php $sidebarXsmt = checkList('XSMT'); @endphp
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



</div>
<div class="col-xs-12 col-sm-12 col-md-3 fix-width-right">

    <h2 class="hide">Right side bar</h2>

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
