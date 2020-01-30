 <footer>

    <div class="container">

        <div class="hidden-xs hidden-sm list-link-footer">
            <hr class="line-footer" />
            <div class="row" style="padding-left: 10px;">
         <div class="copy-right">
            <div class="content-copy-right container">
            <p>Copyright 2019 Asoicau<br />Kết quả xổ số trên Website chỉ có tính chất tham khảo, để biết được kết quả chính xác nhất, quý khách vui lòng vào Website công ty xổ số các tỉnh.</p>
            </div>
        </div>
    </div>
</footer>
<script src="{{ URL::asset('js/jquerylib.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/jscal2.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/en.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/clock.js') }}"></script>


<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    if(localStorage.getItem('date')){
        var date1 = Calendar.dateToInt(localStorage.getItem('date'));
    }else{
       var date1 = Calendar.dateToInt(new Date());
    }

   Calendar.setup ({
       cont: 'calcontainer',
       showTime: true,
       max : Calendar.dateToInt(new Date()),
       date : date1,
       onSelect: function() {
           var date = this.selection.get();
           localStorage.setItem("date", date);

           date     = Calendar.intToDate(date);
           date     = Calendar.printDate(date,"%d-%m-%Y");

           window.location.href='/kqxs-' + date;

       }
   })


    $('#ngaydoheader').on('change',function(){
        $.ajax({
            url: '/getCompanyByday',
            data: {
                date: $(this).val(),
            },
            type: 'POST',
            success: function(data) {
                console.log(data);
                $('#tinhheader').empty();
                $("#tinhheader").append('<option>--Select Company--</option>');
                if(data) {
                    $.each(data,function(key,value){
                        console.log(value)
                        $('#tinhheader').append($("<option/>", {
                            value: value.lottery_company,
                            text: value.lottery_company_names
                        }));
                    });
                }
                //$("#ddlProvinces").html(data);
            }
        });
        console.log($(this).val())
    })

    $('#btndoSo').on('click',function(){
        $.ajax({
            url: '/getSearchBydayandNumber',
            data: {
                date: $('#ngaydoheader').val(),
                number: $('#inputNumberDo').val(),
                company: $('#tinhheader option:selected').val(),
            },
            type: 'POST',
            success: function(data) {
                console.log(data);
                $('.xsmt').html(data.html);

            }
        });
        console.log($(this).val())
    })
</script>
</div>
</body>
</html>
