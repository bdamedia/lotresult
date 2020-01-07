 <footer>
    <div class="container">

    </div>
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
<script src="https://cdn.xosodaiphat.com/assets/js/jquerylib.js"></script>
<script src="https://cdn.xosodaiphat.com/assets/libs/jquery/xsdp.min.js"></script>
<script src="https://cdn.xosodaiphat.com/Notify/js/main.js"></script>



<script type="text/javascript" src="{{ URL::asset('js/jscal2.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/en.js') }}"></script>


<script type="text/javascript">
    if(localStorage.getItem('date')){
        var date1 = Calendar.dateToInt(localStorage.getItem('date'));
    }else{
       var date1 = Calendar.dateToInt(new Date());
    }
    console.log(date1);
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

</script>
</div>
</body>
</html>
