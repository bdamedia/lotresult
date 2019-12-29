@php $sidebar = checkList(); @endphp
@php $sidebarXsmt = checkList('XSMT'); @endphp
<div class="hidden-xs hidden-sm col-md-3 fix-width-center">
    <h2 class="hide">Center side bar</h2>
    <!-- Add an additional blue button style -->

    <div style="margin-bottom: 28px; margin-top: 11px;" class="item-menu">
        <div id="calcontainer"></div>
    </div>

    <div class="item-menu center-side-bar">
        <div class="title-item">
            <h3 class="btn-red-new"><a href="/ket-qua-xo-so-mien-bac" title="xổ số miền Bắc">Xổ số miền Bắc</a></h3>
        </div>
        <div class="content-item"><ul>

                    <li><a href="/ket-qua-xo-so-mien-bac" title="Xổ số miền Bắc">Miền Bắc</a></li>

            </ul>
        </div>

    </div>

    <div class="item-menu center-side-bar margin-top-no">
        <div class="title-item">
            <h3 class="btn-red-new"><a href="/ket-qua-xo-so-mien-nam/" title="xổ số miền Nam">Xổ số miền Nam</a></h3>
        </div>
        <div class="content-item"><ul>
                @foreach($sidebar as $content)
                    <li><a href="/ket-qua-xo-so-mien-nam/kqxsmn-{{ $content->lottery_company_slug }}" title="{{ $content->lottery_company_names }}">{{ $content->lottery_company_names }}</a></li>
                    @endforeach
            </ul>
        </div>

    </div>

    <div class="item-menu center-side-bar margin-top-no">
        <div class="title-item">
            <h3 class="btn-red-new"><a href="/ket-qua-xo-so-mien-trung" title="xổ số miền Trung">Xổ số miền Trung</a></h3>
        </div>
        <div class="content-item"><ul>
                @foreach($sidebarXsmt as $content)
                    <li><a href="/ket-qua-xo-so-mien-trung/kqxsmt-{{ $content->lottery_company_slug }}" title="{{ $content->lottery_company_names }}">{{ $content->lottery_company_names }}</a></li>
                    @endforeach
            </ul>
        </div>

    </div>



</div>
<div class="col-xs-12 col-sm-12 col-md-3 fix-width-right">

    <h2 class="hide">Right side bar</h2>

    <div class="item-menu border-margin margin-top-setting">
        <div class="title-item"><h3 class="show-border-clor-left list_border"><a href="/do-so-trung.html">Dò vé số - May mắn mỗi ngày</a></h3></div>
        <div class="form-doveso">
            <div class="form-inline">
                <div class="form-group"><label for="ngaydoheader" class="lable-text">Chọn ngày:</label>
                    <input style="line-height: 21px" type="date" id="ngaydoheader" value="{{ date('Y-m-d') }}" class="form-control form-group" required="required" placeholder="Chọn ngày" onchange="xsdp.getTinhtheoNgay(this.value);" size="9" title="Ngày dò">
                </div>
                <div class="form-group"><label for="tinhheader" class="lable-text">Chọn tỉnh:</label>
                    <select class="form-control form-group" id="tinhheader">
                        <option value="mb" data-lotterydesc="/xsmb-xo-so-mien-bac.html">Miền Bắc</option>
                        <option value="TTH" data-lotterydesc="/xstth-xo-so-hue.html">Huế</option>
                        <option value="PY" data-lotterydesc="/xspy-xo-so-phu-yen.html">Phú Yên</option>
                        <option value="DT" data-lotterydesc="/xsdt-xo-so-dong-thap.html">Đồng Tháp</option>
                        <option value="HCM" data-lotterydesc="/xshcm-xo-so-tphcm.html">TP.HCM</option>
                        <option value="CM" data-lotterydesc="/xscm-xo-so-ca-mau.html">Cà Mau</option>
                    </select></div>
                <div class="form-group">
                    <input type="text" class="form-control form-group" name="nhapso" id="inputNumberDo" required="required" placeholder="Nhập dãy số" size="9" title="Nhập dãy số">
                    <button type="submit" class="btn btn-red-blue-lite form-group" id="btndoSo" title="Kết quả">Kết quả</button>
                </div></div>
            <p class="text-12">( Có thể nhập tối thiểu 2 số, tối đa 17 số )</p>
        </div></div>
</div>
