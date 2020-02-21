<div class="block">
    <div class="block-main-heading">
        <h1>
            <font style="vertical-align: inherit;">
                <font style="vertical-align: inherit;">Tune the North lottery tickets on {{$selected_date->toDateTime()->format('d-m-Y')}}</font>
            </font>
        </h1>
    </div>

    <div class="margin-top-setting">
        <div class="form-doveso">
            <div class="form-inline">
                <div class="form-group"><label for="ngaydoheader" class="lable-text">Chọn ngày:</label>
                    <input type="text" class="form-control form-group hasDatepicker" size="30" id="ngaydo" name="" placeholder="Pick a date" value="{{$selected_date->toDateTime()->format('d-m-Y')}}">
                </div>
                <div class="form-group">
                    <label for="tinhheader" class="lable-text">Chọn tỉnh:</label>
                    <select class="form-control form-group" id="tinhheader_new">
                        <option selected="selected" value="{{ $selected_chon }}" data-lotterydesc="/xsmb-xo-so-mien-bac.html">{{ $selected_chon }}</option>
                        @php $todayCompanies = getTodayResultCompany(); @endphp
                        @foreach($todayCompanies as $cmp)
                            @if($cmp->lottery_company != $selected_chon)
                                <option value="{{ $cmp->lottery_company }}" data-lotterydesc="/xsmb-xo-so-mien-bac.html">{{ $cmp->lottery_company_names }}</option>
                            @endif 
                        @endforeach
                    </select>
                </div><br/>
                <div class="form-group-new">
                    <input type="text" class="form-control form-group" name="nhapso" 
                    id="inputNumberDo" required="required" placeholder="Nhập dãy số" size="9" title="Nhập dãy số"
                    value="{{$selected_number}}"
                    >
                    <button type="button"  class="btn btn-red-blue-lite form-group" id="btndoSo_New" title="Kết quả">Kết quả</button>
                </div>
            </div>
        </div>
    </div>

    <div class="row block-messeage">
        <div class="col-xs-6">
            <div class="border-radius block-left">
                <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">Bạn đã truy vấn dò kết quả</font>
                </font><span class="text-blue-bold" id="txtLotteryName"><font style="vertical-align: inherit;">

                <font style="vertical-align: inherit;">{{$selected_chon}}</font></font></span><br/>

                <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Loại vé </font>

                <span id="txtnumberdigits">{{ $result_count }}</span>

                <font style="vertical-align: inherit;">chữ số, mở thưởng ngày</font></font>

                <br/>
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;"></font>
                        <font style="vertical-align: inherit;">{{ $selected_chon }} </font>

                         <font style="vertical-align: inherit;">draw 
                         </font><font style="vertical-align: inherit;">on 
                         </font>
                         <span id="txtDayPrize">{{$selected_date->toDateTime()->format('d-m-Y')}}</span>

                        <font style="vertical-align: inherit;">Dãy số của bạn là: </font>
                        <b><span class="text-red" id="txtYourLoto">{{$selected_number}}</span></b>

                    </font>
                <span id="txtnumberdigits"><font style="vertical-align: inherit;"></font></span><font style="vertical-align: inherit;"></font><span id="txtDayPrize"><font style="vertical-align: inherit;"></font></span>
                <br><font style="vertical-align: inherit;"></font><b><span class="text-red" id="txtYourLoto"><font style="vertical-align: inherit;"></font></span></b>
            </div>
        </div>
        <div class="col-xs-6" id="divtrungso">
            <div class="border-radius block-right">
                <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Xin lỗi, vé số của bạn đã không thắng. </font></font>
                <br><b><span class="text-red"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Chúc bạn may mắn lần sau!!!</font></font></span></b>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('#btndoSo_New').on('click',function(){
        $.ajax({
            url: '/getSearchBydayandNumber',
            data: {
                date: $('#ngaydoheader').val(),
                number: $('#inputNumberDo').val(),
                company: $('#tinhheader_new option:selected').val(),
            },
            type: 'POST',
            success: function(data) {
                console.log(data);
                if(data != 'The product failed to load!') {
                    $('.xsmt').html(data.html);
                } else {
                    $('.ui-dialog-buttons').css('display', 'block');
                    $('.ui-widget-overlay').css('display', 'block');
                }

            }
        });
        console.log($(this).val())
    })
    $(function(){
        $('#hide-alert-message').click(function() {
            $('.ui-dialog-buttons').css('display', 'none');
            $('.ui-widget-overlay').css('display', 'none');
        });
    });
    $(function(){
        $('#hide-alert-message-second').click(function() {
            $('.ui-dialog-buttons').css('display', 'none');
            $('.ui-widget-overlay').css('display', 'none');
        });
    });
</script>