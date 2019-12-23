@php $sidebar = checkList(); @endphp
@php $sidebarXsmt = checkList('XSMT'); @endphp
<div class="hidden-xs hidden-sm col-md-3 center-side-bar fix-width-center">
    <h2 class="hide">Center side bar</h2>
    {{--<div class="container">
        <div class="row">
            <div class="span12">
                <table class="table-condensed table-bordered table-striped">
                    <thead>
                    <tr>
                        <th colspan="7">
                        <span class="btn-group">
                            <a class="btn"><i class="icon-chevron-left"></i></a>
                        	<a class="btn active">February 2012</a>
                        	<a class="btn"><i class="icon-chevron-right"></i></a>
                        </span>
                        </th>
                    </tr>
                    <tr>
                        <th>Su</th>
                        <th>Mo</th>
                        <th>Tu</th>
                        <th>We</th>
                        <th>Th</th>
                        <th>Fr</th>
                        <th>Sa</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="muted">29</td>
                        <td class="muted">30</td>
                        <td class="muted">31</td>
                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                        <td>4</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>6</td>
                        <td>7</td>
                        <td>8</td>
                        <td>9</td>
                        <td>10</td>
                        <td>11</td>
                    </tr>
                    <tr>
                        <td>12</td>
                        <td>13</td>
                        <td>14</td>
                        <td>15</td>
                        <td>16</td>
                        <td>17</td>
                        <td>18</td>
                    </tr>
                    <tr>
                        <td>19</td>
                        <td class="btn-primary"><strong>20</strong></td>
                        <td>21</td>
                        <td>22</td>
                        <td>23</td>
                        <td>24</td>
                        <td>25</td>
                    </tr>
                    <tr>
                        <td>26</td>
                        <td>27</td>
                        <td>28</td>
                        <td>29</td>
                        <td class="muted">1</td>
                        <td class="muted">2</td>
                        <td class="muted">3</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>--}}
    <div class="item-menu">
        <div class="title-item">
            <h3><a href="xsmn" title="xổ số miền Bắc">Xổ số miền Bắc</a></h3>
        </div>
        <div class="content-item"><ul>

                    <li><a href="/ket-qua-xo-so-mien-bac" title="Xổ số miền Bắc">Miền Bắc</a></li>

            </ul>
        </div>

    </div>

    <div class="item-menu">
        <div class="title-item">
            <h3><a href="xsmn" title="xổ số miền Nam">Xổ số miền Nam</a></h3>
        </div>
        <div class="content-item"><ul>
                @foreach($sidebar as $content)
                    <li><a href="/ket-qua-xo-so-mien-nam/{{ $content->lottery_company }}" title="{{ $content->lottery_company_names }}">{{ $content->lottery_company_names }}</a></li>
                    @endforeach
            </ul>
        </div>

    </div>

    <div class="item-menu">
        <div class="title-item">
            <h3><a href="xsmt" title="xổ số miền Trung">Xổ số miền Trung</a></h3>
        </div>
        <div class="content-item"><ul>
                @foreach($sidebarXsmt as $content)
                    <li><a href="/ket-qua-xo-so-mien-trung/{{ $content->lottery_company }}" title="{{ $content->lottery_company_names }}">{{ $content->lottery_company_names }}</a></li>
                    @endforeach
            </ul>
        </div>

    </div>



</div>
<div class="col-xs-12 col-sm-12 col-md-3 fix-width-right">

    <h2 class="hide">Right side bar</h2>

    <div class="item-menu border-margin">
        <div class="title-item"><h3><a href="/do-so-trung.html">Dò Vé Số</a></h3></div>
        <div class="form-doveso">
            <div class="form-inline">
                <div class="form-group"><label for="ngaydoheader" class="lable-text">Chọn ngày:</label>
                    <input type="text" id="ngaydoheader" value="16-12-2019" class="form-control form-group" required="required" placeholder="Chọn ngày" onchange="xsdp.getTinhtheoNgay(this.value);" size="9" title="Ngày dò">
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
                    <button type="submit" class="btn btn-red form-group" id="btndoSo" title="Kết quả">Kết quả</button>
                </div></div>
            <p class="text-12">( Có thể nhập tối thiểu 2 số, tối đa 17 số )</p>
        </div></div>



</div>
