@extends('five88_frontend.layouts.master')
@section('title')
	<title>BETTING | DEPOSIT</title>
@endsection

@section('headerCSS')
<!-- <style type="text/css">
		.loginSignupForms {
			background-color: white;
			box-shadow: 0px 0px 8px 0px #888888;
		}
	</style> -->

<style type="text/css">
    .your-choice {
        margin-top:-15px;
        margin-bottom:20px;
    }
    .your-choice i.icon-choice{
        width:37px;
        height: 26px;
        display: inline-block;
        background:url(//static.five88.com/assets/img/your-choice-promo.png) no-repeat 0 0;
        background-size: cover;
        margin-right: 10px;
        vertical-align: middle;
        margin-top:-3px;
    }
	.banner_payment_adv {
	    margin-bottom: 17px;
	    margin-top: -24px;
	    height: 247px
	}

	.panel-payment-container .nav-tabs {
	    border: 0
	}

	.panel-payment-container .nav-tabs>li>a {
	    background-color: #ffb700;
	    text-transform: uppercase;
	    font-size: 15px;
	    color: #fff;
	    font-weight: 700;
	    padding: 10px 38px 9px 68px;
	    border: 0 !important
	}

	.panel-payment-container .nav-tabs>li>a:hover,
	.panel-payment-container .nav-tabs>li.active>a {
	    color: #666;
	    background-color: #eff0f0
	}

	.panel-payment-container .nav-tabs>li>a>i {
	    display: inline-block;
	    position: absolute;
	    margin-left: -30px
	}

	.panel-payment-container .nav-tabs>li>a>i.icon_deposit_m {
	    width: 16px;
	    height: 26px;
	    background: url(//static.five88.com/assets/img/icon_deposit_m.svg) no-repeat 0
	}

	.panel-payment-container .nav-tabs>li>a>i.icon_deposit_sm {
	    width: 23px;
	    height: 24px;
	    background: url(//static.five88.com/assets/img/icon_deposit_sm.svg) no-repeat 0
	}

	.panel-payment-container .nav-tabs>li>a>i.icon_deposit_c {
	    width: 18px;
	    height: 23px;
	    background: url(//static.five88.com/assets/img/icon_deposit_card.svg) no-repeat 0
	}

	.panel-payment-container .nav-tabs>li>a:hover>i,
	.panel-payment-container .nav-tabs>li.active>a>i {
	    filter: brightness(0.3)
	}

	.panel-payment-container .tab-content {
	    background-color: #eff0f0;
	    border-radius: 0 5px 5px 5px
	}

	.panel-payment-container .tab-content .div_form {
	    padding: 20px 0 15px
	}

	ul.step_payment {
	    position: relative;
	    display: flex;
	    align-items: center;
	    padding-left: 0;
	    margin-bottom: 5px;
	    margin-top: 5px;
	}

	ul.step_payment li {
	    display: inline-block;
	    -ms-flex: 0 0 auto;
	    flex: 0 0 auto;
	    width: auto;
	    max-width: 100%;
	    margin-right: 15px;
	}

	ul.step_payment li i {
	    display: inline-block;
	    width: 32px;
	    height: 32px;
	    line-height: 30px;
	    font-size: 18px;
	    text-align: center;
	    font-style: normal;
	    background: #b4b5b5;
	    color: #fff;
	    font-weight: 700;
	    border-radius: 100%;
	    margin-right: 10px;
	    vertical-align: middle;
	}

	ul.step_payment li.active i {
	    background-color: #30bfbf;
	}

	ul.step_payment li span {
	    color: #999999;
	}

	ul.step_payment li.active span {
	    color: #30bfbf;
	}

	ul.step_payment:after {
	    content: '';
	    display: block;
	    width: 30px;
	    height: 2px;
	    background-color: #d3d4d4;
	    -ms-flex-preferred-size: 0;
	    flex-basis: 0;
	    -ms-flex-positive: 1;
	    flex-grow: 1;
	    max-width: 100%;
	}
</style>
<style type="text/css">
	.radio-group{
		display: flex;
		justify-content: space-between;
		margin-bottom: 0;
		line-height: 0;
		margin-right: -15px;
	}
	.radio-group li{
		width:33.333333%;
		padding-right:15px;
	}
	.radio-group label{
	  position: relative;
	  cursor: pointer;
	  display: block;
	  height: 100px;
	  /*margin-right: 22px;*/
	  margin-bottom:0
	}

	.radio-group input{
	  position: absolute;
	  opacity: 0;
	}
	.radio-group .check {
	    position: absolute;
	    top: 0;
	    left: 0;
	    height: 100%;
	    width: 100%;
	    background-color: #fff;
	    border-radius: 5px;
	    border:1px solid #ccc;
	    display: flex;
	    align-items: center;
	    flex-wrap: wrap;
	    justify-content: center;
	    text-align: center;
	    /*flex-direction: column;*/
	}
	.radio-group .check .check-flag{
		position: absolute;
		right:-12px;
		top:-12px;
		width:30px;
		height: 30px;
		border-radius: 100%;
		border:1px solid #ffb700;
		background-color:#fff;
		display: none;
	}
	.radio-group .check .check-flag:after {
	  content: "";
	    position: absolute;
	    
	    left: 10px;
	    top: 6px;
	    width: 7px;
	    height: 12px;
	    border: solid #ffb700;
	    border-width: 0 3px 3px 0;
	    -webkit-transform: rotate(45deg);
	    -ms-transform: rotate(45deg);
	    transform: rotate(45deg);
	}
	.radio-group input:checked ~ .check {
	    background-color: #fff6df;
	    border-color:#ffb700;
	}
	.radio-group input:checked ~ .check .check-flag {
	    display: block;
	}

	.radio-group .check .icon-method{
		display: inline-block;
		height: 35px;
		width:50px;
	}
	.radio-group .check .icon-method-ib{
		/*background:url(assets/img/icon-ib.png) no-repeat 50%;*/
		background-size: contain;
	}
	.radio-group .check .icon-method-atm{
		/*background:url(assets/img/icon-atm.png) no-repeat 50%;*/
		background-size: contain;
	}
	.radio-group .check .icon-method-db{
		/*background:url(assets/img/icon-db.png) no-repeat 50%;*/
		background-size: contain;
	}
	.radio-group .check .des{
		display: block;
		margin-top:5px;
		font-size:12px;

	}
	.stitle-block{
		margin-bottom:10px;
		
	}
	.stitle-block .stitle{
		text-transform: uppercase;
		margin-right:10px;
	}
	.stitle-block .error.msgError{
		display: inline;
	}

	.info_bank_box{
		background-color:#fff;
		border-radius: 4px;
		border: 1px solid #ccc;
		padding:10px 15px;
	    margin-bottom:25px;
	}
	.info_bank_box{

	}
	.info_bank_box .info-row{
	  
	  display: flex;
	  padding:2px 0;
	}
	.info_bank_box .info-row+.info-row{

	}
	.info_bank_box .btn-cp{
	  height: 24px;
	    line-height: 24px;
	    border: 0;
	    background-color: #efefef;
	    font-weight: 300;
	    font-size: 12px;
	    border-radius: 5px;
	    vertical-align: middle;
	    position: absolute;
	    right: 0;
	    top:0;
	}
	.info_bank_box  .info-text{
	  width:130px;
	  font-size:14px;
	  line-height: 24px;
	  font-weight:400;
	}
	.info_bank_box .info-col{
	  flex-basis: 0;
	    flex-grow: 1;
	    max-width: 100%;
	    position: relative;
	    line-height: 24px;
	}
	.info_bank_box .info-col span{
	  font-size:14px;
	  vertical-align: top;
	  color:#9676f5;

	}
	.info_bank_box .info-col input{
	  background:none;
	  border:0;
	  font-size:14px;
	  color:#9676f5;
	}

	.form-global .error.msgError{
		padding-top:3px;
		padding-bottom:0;
	}

	.form-global select.form-control{
		/*background:#fff url(assets/img/icon-dropdown.png) no-repeat 97% 50%;*/
	}
	.panel-payment-container .nav-tabs>li>a .subtxt{
		display: block;
		font-size:12px;
		font-weight:300;
		text-transform: none;

	}
	.no-promotion > .col-xs-6:first-child,.disable-name > .col-xs-6:first-child{
	    width:100%;
	}
	.disable-name > .col-sender-name{
	    display:none;
	}
</style>
@endsection

@section('content')

	<header id="other">
		@include('five88_frontend.includes.navbar')
    </header>

	<div id="main">
		<div class="member">
			<div class="member-panel">
				<style>
					.panel-tabLink li{margin-right:auto !important}
				</style>
				@include('five88_frontend.includes.subNavbar')
				<div id="content"></div>
				<div class="panel-container panel-payment-container">
					<div class="your-choice"> <i class="icon-choice"></i><span>Bạn đang sử dụng gói <strong>khuyến mãi 100%</strong></span>
					</div>
					<ul class="nav nav-tabs" role="tablist">
						<li role="presentation" class="active">
							<a href="#tab-deposit-manual" aria-controls="tab-deposit-manual" role="tab" data-toggle="tab"> <i class="icon_deposit_m"></i>  <span>Transfer </span>  <span class="subtxt">Processing time 5 minutes</span> 
							</a>
						</li>
						<li role="presentation" class="">
							<a href="#tab-deposit-smart" aria-controls="tab-deposit-smart" role="tab" data-toggle="tab"> <i class="icon_deposit_sm"></i>  <span>Fivepay</span>  <span class="subtxt">Super speed 30 seconds</span> 
							</a>
						</li>
						<li role="presentation">
							<a href="#tab-deposit-card" aria-controls="tab-deposit-card" role="tab" data-toggle="tab"> <i class="icon_deposit_c"></i>  <span>Phone scratch card</span>  <span class="subtxt">Processing time 1 minute</span> 
							</a>
						</li>
					</ul>
					<div class="tab-content">
						<div role="tabpanel" class="tab-pane active" id="tab-deposit-manual">
							<div class="div_form">
								<div class="row">
									<div class="col-xs-6">
										<form class="form-global" id="frmDeposit">
											<div id="radio-method" class="form-group form-group-method">
												<ul class="radio-group list-unstyled">
													<li>
														<label for="InternetBanking">
															<input type="radio" id="InternetBanking" value="ibanking" name="method" checked>
															<div class="check">
																<div> <span class="icon-method icon-method-ib"></span>  <span class="des">Internet Banking</span>
																</div> <span class="check-flag"></span>
															</div>
														</label>
													</li>
													<li>
														<label for="ATM">
															<input type="radio" id="ATM" value="atm" name="method">
															<div class="check">
																<div> <span class="icon-method icon-method-atm"></span>  <span class="des">ATM</span>
																</div> <span class="check-flag"></span>
															</div>
														</label>
													</li>
													<li>
														<label for="BankCounter">
															<input type="radio" id="BankCounter" value="banking" name="method">
															<div class="check">
																<div> <span class="icon-method icon-method-db"></span>  <span class="des">Counter</span>
																</div> <span class="check-flag"></span>
															</div>
														</label>
													</li>
												</ul>
											</div>
											<div id="select-bank-payment" class="form-group" style="margin-bottom:15px">
												<select id="bank_code_option" onchange="changeOption(event)" name="to_bank_code" class="form-control">
													<option selected value="">Please select a banks</option>
													<option value="VCB">Vietcombank</option>
													<option value="ACB">ACB</option>
													<option value="DongA">DongA</option>
													<option value="VietinBank">VietinBank</option>
													<option value="BIDV">BIDV</option>
													<option value="Sacombank">Sacombank</option>
													<option value="Techcombank">Techcombank</option>
												</select>
											</div>
											<div class="info_bank_box">
												<div class="info-row">
													<div class="info-text"> <span>account name</span>
													</div>
													<div class="info-col">
														<input style="width: 80%;" id="tname" name="to_bank_name" type="text" readonly="readonly" value="">
														<button class="btn-cp btn-clipboard" data-clipboard-action="copy" data-clipboard-target="#tname" type="button">Copy</button>
													</div>
												</div>
												<div class="info-row">
													<div class="info-text">Account number</div>
													<div class="info-col">
														<input id="tno" type="text" name="to_bank_no" readonly="readonly" value="">
														<button class="btn-cp btn-clipboard" data-clipboard-action="copy" data-clipboard-target="#tno" type="button">Copy</button>
													</div>
												</div>
												<div class="info-row">
													<div class="info-text">Branch</div>
													<div class="info-col">
														<input id="tbranch" type="text" readonly="readonly" value="">
														<button class="btn-cp btn-clipboard" data-clipboard-action="copy" data-clipboard-target="#tbranch" type="button">Copy</button>
													</div>
												</div>
												<div class="info-row">
													<div> <a id="ebankLink" target="_blank" style="display:none; text-decoration: underline;">Đi đến E-Banking</a>
													</div>
												</div>
											</div>
											<div class="row" id="username-send">
												<div class="col-xs-6">
													<div class="form-group">
														<label>AMOUNT (1K = VND 1,000)</label>
														<input id="amount-money" type="text" pattern="[0-9]*" inputmode="numeric" class="form-control formatAmount" name="amount">
														<div id="amount-notice" class=""></div>
													</div>
												</div>
												<div class="col-xs-6 col-sender-name">
													<div class="form-group">
														<label>SENDER'S NAME</label>
														<input id="from_bank_name" name="from_bank_name" type="text" class="form-control">
													</div>
												</div>
											</div>
											<div class="row no-promotion" id="promo">
												<div class="col-xs-6">
													<div class="form-group">
														<label id="bank_trancode_label">TRADING CODE</label>
														<input id="bank_trancode" name="bank_trancode" type="text" class="form-control">
													</div>
												</div>
											</div>
											<div class="row">
												<div class="form-group form-group-btn col-xs-12">
													<button type="submit" class="btn btn-primary">Recharge</button>
												</div>
											</div>
										</form>
									</div>
									<div class="col-xs-6">
										<div id="myCarousel" class="carousel slide" data-ride="carousel" style="padding-top:20px;">
											<ol class="carousel-indicators">
												<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
												<li data-target="#myCarousel" data-slide-to="1"></li>
											</ol>
											<div class="carousel-inner">
												<div class="item active">
													<img src="//static.five88.com/assets/img/khuyenmai100.jpg" alt="Khuyến mãi 100%" style="width:100%;">
												</div>
												<div class="item">
													<img src="//static.five88.com/assets/img/hoantra158.jpg" alt="Hoàn trả 1,58%" style="width:100%;">
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div role="tabpanel" class="tab-pane " id="tab-deposit-smart">
							<div class="div_form">
								<div class="row">
									<div class="col-xs-6">
										<form id="frmFivepayDeposit" class="form-global">
											<div class="form-group">
												<label for="gateway">CHOOSE BANK</label>
												<select id="dataFivepay" name="to_bank_code" class="form-control">
													<option selected value="">Please choose...</option>
													<option data-code="vcb" value="VCB" data-key="VCB">Vietcombank</option>
													<option data-code="acb" value="ACB" data-key="ACB">ACB</option>
													<option data-code="eab" value="DongA" data-key="DongA">DongA</option>
													<option data-code="vtb" value="VietinBank" data-key="VietinBank">VietinBank</option>
													<option data-code="bidv" value="BIDV" data-key="BIDV">BIDV</option>
													<option data-code="sab" value="Sacombank" data-key="Sacombank">Sacombank</option>
													<option data-code="tcb" value="Techcombank" data-key="Techcombank">Techcombank</option>
												</select>
											</div>
											<div class="form-group">
												<label>AMOUNT OF MONEY (1K = 1000Đ)</label>
												<input name="amount" type="text" pattern="[0-9]*" class="form-control formatAmount">
											</div>
											<div class="row">
												<div class="form-group form-group-btn col-xs-12">
													<input type="hidden" name="method" value="fivepay">
													<button type="submit" class="btn btn-primary">Recharge</button>
												</div>
											</div>
										</form>
									</div>
									<div class="col-xs-6">
										<div style="padding-top:48px;">
											<img style="width:100%" src="//static.five88.com/assets/banner/fivepay.png">
										</div>
									</div>
								</div>
							</div>
						</div>
						<div role="tabpanel" class="tab-pane" id="tab-deposit-card">
							<div class="div_form">
								<form id="frmDepositcard" name="frmDepositcard" class="form-global">
									<div class="row">
										<div class="form-group col-xs-6">
											<label>Select card type</label>
											<select onchange="changeTelecom()" id="to_telcom_code" name="to_telcom_code" class="form-control">
												<option selected value="">lease select a carrier</option>
												<option value=VIETTEL>VIETTEL</option>
												<option value=MOBIFONE>MOBIFONE</option>
												<option value=VINAPHONE>VINAPHONE</option>
											</select>
										</div>
										<div class="form-group col-xs-6">
											<label>Denominations</label>
											<select id="card_amount" name="card_amount" class="form-control"></select>
										</div>
									</div>
									<div class="row">
										<div class="form-group col-xs-6">
											<label>Card series number</label>
											<input name="card_serial" type="text" class="form-control">
										</div>
										<div class="form-group col-xs-6">
											<label>ID Card (PIN)</label>
											<input name="card_code" type="text" class="form-control">
										</div>
									</div>
									<p style="margin-bottom:25px"> <b>Note:</b> 
										<br /> <em>- Please select the correct denomination and carrier, if entered incorrectly is not responsible</em> 
										<br /> <em>- 30% cheapest brick card market</em> 
										<br /> <em>- 100% promotion does not apply when scratching.</em>
									</p>
									<div class="row">
										<div class="form-group form-group-btn col-xs-12">
											<input type="hidden" name="card_status" value="1">
											<button type="submit" class="btn btn-primary">Recharge</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection

@section('footerJS')

	<script type="text/javascript">

	</script>

	<script>
	    // function countdowntime(distance){
	    //     // Update the count down every 1 second
	    //     var x = setInterval(function() {
	    //         var timeLeft = document.getElementById("timeLeft");
	    //         if(timeLeft!= undefined){
	    //             distance = distance - 1;
	    //             // Time calculations for days, hours, minutes and seconds
	    //             var days = Math.floor(distance / (60 * 60 * 24));
	    //             var hours = Math.floor((distance % (60 * 60 * 24)) / (60 * 60));
	    //             var minutes = Math.floor((distance % (60 * 60)) / (60));
	    //             var seconds = Math.floor(distance % (60));
	    //             // Display the result in the element with id="demo"
	    //             timeLeft.innerHTML = days + " ngày " + hours + " giờ "
	    //             + minutes + " phút " + seconds + " giây ";

	    //             // If the count down is finished, write some text
	    //             if (distance < 0) {
	    //                 clearInterval(x);
	    //                 timeLeft.innerHTML = "EXPIRED";
	    //             }
	    //         }
	    //     }, 1000);
	    // }
	    // function get(url, id, callback) {
	    //     let htmlLoading = '<div class="loading-container">\
	    //     <div class="spinner">\
	    //     <div class="rect1"></div>\
	    //     <div class="rect2"></div>\
	    //     <div class="rect3"></div>\
	    //     <div class="rect4"></div>\
	    //     <div class="rect5"></div>\
	    //     </div>\
	    //     </div>';
	    //         let el = $('#' + id);
	    //         if (el.find(".loading-container").length == 0) {
	    //             el.append(htmlLoading);
	    //         }
	    //         $.get(url, function (resp) {
	    //             el.html(resp);
	    //             callback();
	    //         });
	    //     }
	    // function showStep(isnew = false){
	    //     if(isnew == true){
	    //         get("//five88.com/payment/cryptoload/new.aspx", "crypto-wizard", function () {});
	    //     }else{
	    //         get("//five88.com/payment/cryptoload.aspx", "crypto-wizard", function () {});
	    //     }
	    // }
	    // $(document).ready(function() {
	    //     showStep();
	    //     setInterval(function() {
	    //         var checkstatus = document.getElementById("checkstatus");
	    //         if(checkstatus != undefined){
	    //             showStep();
	    //         }
	    //     }, 50000);
	    // });
	</script>
	<script>
		var clipboard = new ClipboardJS(".btn-clipboard"); //Copied
		clipboard.on('success', function(e) {
		    $(e.trigger).text("Copied1!");
		});

		// cancelDeposit = function(_id){
		//         callAPI("//five88.com/payment/canceldeposit.aspx", {id: _id}, "POST", function (resp){
		//         if (resp.status != 'OK') {
		//             alert(resp.msg);
		//             return false;
		//         }
		            
		//         f88sms.success("Huỷ phiếu nạp thành công", function (){
		//             window.location.reload();
		//         });
		//     })
		// }

		$("#amount-money").keyup(function () {
		    let value = $("#amount-money").val().replace(/,/gi,"");
		    if(value > 0){
		        $("#amount-notice").show();
		        $("#amount-notice").html("Equivalent " + numberWithDot(value*1000)+ " VNĐ");
		    } else {
		        $("#amount-notice").hide();
		    }
		});

		function numberWithDot(x) {
		    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
		}

		$(document).ready(function(){
		    $("input[type='radio']").click(function(){
		        changeOption(null , false);
		    });
		    changeOption(null);
		    $("#bank_trancode").change(function() { 
		        if($("#bank_trancode_label").text() == "SENDER'S NAME"){
		            document.getElementById("from_bank_name").value = $("#bank_trancode").val();
		        }
		    });   
		});

		var jsonTelcom = {"status":1,"cardlist":{"VIETTEL":{"status":"1","rate":0.7,"value":[10000,20000,30000,50000,100000,200000,300000,500000,1000000]},"MOBIFONE":{"status":"1","rate":0.7,"value":[10000,20000,30000,50000,100000,200000,300000,500000]},"VINAPHONE":{"status":"1","rate":0.7,"value":[10000,20000,30000,50000,100000,200000,300000,500000]}}};
		function changeTelecom() {
		    var telcom = document.getElementById("to_telcom_code").value;
		    if (jsonTelcom.cardlist[telcom] && jsonTelcom.cardlist[telcom].value.length > 0) {
		        var array_list = jsonTelcom.cardlist[telcom].value;
		        $("#card_amount").html("");
		        $("#card_amount").append("<option selected value=\"\">Vui lòng chọn mệnh giá</option>")
		        $(array_list).each(function(i) {
		            $("#card_amount").append("<option value=\"" + array_list[i] + "\">" + numberWithCommas(array_list[i]) +
		                " VNĐ</option>");
		        });
		    } else {
		        $("#card_amount").html("");
		    }
		}
		function numberWithCommas(x) {
		    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
		}
		
		function changeOption(e , loadAgain = true) {
		    var bank_code = $('#bank_code_option option:selected').val();
		    let id = $("input[type='radio']:checked").attr('id');
		    switch (bank_code) {
		        case "VCB":
		            if(id == "InternetBanking") $("#bank_trancode_label").text("Trading code (MBVCB.xxxxxxxx)");
		            else if(id == "ATM") $("#bank_trancode_label").text("TRADING CODE");
		            else if(id == "BankCounter") $("#bank_trancode_label").text("SENDER'S NAME");
		            break;
		        case "ACB":
		            if(id == "InternetBanking") $("#bank_trancode_label").text("SENDER'S NAME");
		            else if(id == "ATM") $("#bank_trancode_label").text("TRADING CODE");
		            else if(id == "BankCounter") $("#bank_trancode_label").text("SENDER'S NAME");
		            break;
		        case "DongA":
		            $("#bank_trancode_label").text("SENDER'S NAME");
		            break;
		        case "VietinBank":
		            if(id == "InternetBanking") $("#bank_trancode_label").text("TRADING CODE");
		            else if(id == "ATM") $("#bank_trancode_label").text("Time to turn");
		            else if(id == "BankCounter") $("#bank_trancode_label").text("SENDER'S NAME");
		            break;
		        case "BIDV":
		            if(id == "InternetBanking") $("#bank_trancode_label").text("TRADING CODE");
		            else if(id == "ATM") $("#bank_trancode_label").text("TRADING CODE");
		            else if(id == "BankCounter") $("#bank_trancode_label").text("SENDER'S NAME");
		            break;
		        case "Sacombank":
		            if(id == "InternetBanking") $("#bank_trancode_label").text("Time to turn");
		            else if(id == "ATM") $("#bank_trancode_label").text("Time to turn");
		            else if(id == "BankCounter") $("#bank_trancode_label").text("TSENDER'S NAME");
		            break;
		        case "Techcombank":
		            if(id == "InternetBanking") $("#bank_trancode_label").text("Number of entries(FTXXX)");
		            else if(id == "ATM") $("#bank_trancode_label").text("SENDER'S NAME");
		            else if(id == "BankCounter") $("#bank_trancode_label").text("Content transfer");
		            break;
		        default:
		            break;
		    }
		    if($("#bank_trancode_label").text() == "SENDER'S NAME"){
		        $("#username-send").addClass("disable-name");
		    }else {
		        $("#username-send").removeClass("disable-name");
		    }
		    // coment by me for testing
		    // if(loadAgain){
		    //     $.ajax({
		    //         url: "/payment/loadHistory",
		    //         type: "POST",
		    //         data: {
		    //             bank_code: bank_code
		    //         },
		    //         beforeSend: function(xhr){
		    //             document.getElementById("tname").value = "";
		    //             document.getElementById("tno").value = "";
		    //             document.getElementById("tbranch").value = "";
		                
		    //         },
		    //         success: function(_resp) {
		    //             if (_resp != null) {
		    //                 _resp = JSON.parse(_resp);
		    //                 if(_resp.account_name){
		    //                     document.getElementById("tname").value = _resp.account_name;
		    //                     console.log(resp_account_name+"kdjfvhbsd");
		    //                 } else {
		    //                     document.getElementById("tname").value = "Please select a bank";
		    //                 }
		    //                 if(_resp.account_name){
		    //                     document.getElementById("tno").value = _resp.account_no;
		    //                 }
		    //                 if(_resp.account_name){
		    //                     document.getElementById("tbranch").value = _resp.branch_name;
		    //                 }
		    //                 if(_resp.bank_url){
		    //                     $("#ebankLink").show();
		    //                     document.getElementById("ebankLink").href = _resp.bank_url;
		    //                 }
		    //                 //document.getElementById("from_bank_name").value = _resp.from_bank_name; tạm thời ẩn SENDER'S NAME
		    //             }
		    //         },
		    //         // error: function() {
		    //         //     alert("Không thể kết nối đến máy chủ, vui lòng kiểm tra lại internet.");
		    //         //     return false;
		    //         // }
		    //     });
		    // }

		}

		function loadBankCodepay(){
		    var bank_code = $('#bank_code_codepay_option option:selected').val();
		    $.ajax({
		            url: "/payment/loadBanks",
		            type: "POST",
		            data: {
		                bank_code: bank_code
		            },
		            beforeSend: function(xhr){
		                document.getElementById("tname_codepay").value = "";
		                document.getElementById("tno_codepay").value = "";
		            },
		            success: function(_resp) {
		                if (_resp != null) {
		                    _resp = JSON.parse(_resp);
		                    if(_resp.account_name){
		                        document.getElementById("tname_codepay").value = _resp.account_name;
		                    } else {
		                        document.getElementById("tname_codepay").value = "Vui lòng chọn ngân hàng";
		                    }
		                    if(_resp.account_name){
		                        document.getElementById("tno_codepay").value = _resp.account_no;
		                    }
		                }
		            },
		            error: function() {
		                alert("Không thể kết nối đến máy chủ, vui lòng kiểm tra lại internet.");
		                return false;
		            }
		        });
		}

		$(document).ready(function() {
		            // $.ajax({
		        //     url: "payment/createInvoiceCodepay",
		        //     type: "GET",
		        //     success: function(resp) {
		        //         if (resp.status == 'OK') {
		        //             document.getElementById("bank_trancode_codepay").value = resp.bank_trancode;
		        //             document.getElementById("id_codepay").value = resp.id;
		        //         } else {
		        //             alert("Không thể kết nối đến máy chủ, vui lòng kiểm tra lại internet.");
		        //         }
		        //     },
		        //     error: function() {
		        //         alert("Không thể kết nối đến máy chủ, vui lòng kiểm tra lại internet.2");
		        //         return false;
		        //     }
		        // });
		    });



		$(document).ready(function() {
		    var element = document.getElementById("content");
		    let dims = element.getBoundingClientRect();
		    window.scrollTo(window.scrollX, dims.top - 20);
		   
		    $("[data-toggle=tooltip]").tooltip();

		    // $('#payment-nav-tabs a[href="' + window.location.hash.replace("_", "") + '"]').tab('show');
		    $('#payment-nav-tabs a[href="#"]').tab('show');

		    $("#frmFivepayDeposit").validate({
		        rules: {
		            to_bank_code: {
		                required: true
		            },
		            amount: {
		                required: true
		                //                    min: 1
		            }
		                    },
		        messages: {
		            to_bank_code: {
		                required: "Bạn chưa chọn ngân hàng"
		            },
		            amount: {
		                required: "Bạn chưa điền số tiền nạp"
		                //                    min: "Số tiền phải lớn hơn 0"
		            }
		                    },
		        errorElement: "div",
		        errorPlacement: function(error, element) {
		            error.addClass("error");
		            if (element.prop("type") === "checkbox") {
		                error.insertAfter(element.parent("label"));
		            } else {
		                error.insertAfter(element);
		            }
		        },
		        showErrors: function(errorMap, errorList) {
		            this.defaultShowErrors();
		            $('#method-error').insertAfter($('#frmDeposit').find('#radio-method .stitle-block .stitle'));
		            $('#to_bank_code-error').insertAfter($('#frmDeposit').find('#select-bank-payment .stitle-block .stitle'));
		        },
		        submitHandler: function(form) {
		            let bankCode = $('#dataFivepay').find('option:selected').attr('data-code');
		            var form_id = $('#frmFivepayDeposit');
		        	$.ajax({
			        	headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						},
						// type: "POST",
						// url: "{{ url('save-item')}}",  
						// data: data,
						dataType:'json',
						// $form.submit();
			        	// console.log(form);return
			            url: "{{ url('test')}}",
			            type: "POST",
			            data: form_id.serialize(),
			            success: function(resp) {
			            	console.log(resp);return false;
			                if (resp.status == 'OK') {
			                    document.getElementById("bank_trancode_codepay").value = resp.bank_trancode;
			                    document.getElementById("id_codepay").value = resp.id;
			                } else {
			                    alert("Không thể kết nối đến máy chủ, vui lòng kiểm tra lại internet.");
			                }
			            },
			            error: function() {
			                alert("Không thể kết nối đến máy chủ, vui lòng kiểm tra lại internet.2");
			                return false;
			            }
			        });
		            // callAPI_FORM(form, function(resp) {
		            //     if (resp.status != 'OK') {
		            //         alert(resp.msg);
		            //         return false;
		            //     }
		            //     let data = resp.data[0];
		            //     window.location.href = '/fivepay/step2?bank_code=' + bankCode + '&code=' +
		            //         data.code;
		            // });
		        }
		    });

		    $("#frmDepositcard").validate({
		        rules: {
		            to_telcom_code: {
		                required: true,
		            },
		            card_amount: {
		                required: true,
		            },
		            card_serial: {
		                required: true,
		            },
		            card_code: {
		                required: true,
		                number: true
		            }
		        },
		        messages: {
		            to_telcom_code: {
		                required: 'Bạn chưa chọn nhà mạng',
		            },
		            card_amount: {
		                required: 'Bạn chưa nhập mệnh giá',
		            },
		            card_serial: {
		                required: 'Bạn chưa nhập serial code',
		            },
		            card_code: {
		                required: 'Bạn chưa nhập mã pin',
		                number: "Mã thẻ không được nhập ký tự"
		            }
		        },
		        errorElement: "div",
		        errorPlacement: function(error, element) {
		            error.addClass("msgError");
		            if (element.prop("type") === "checkbox") {
		                error.insertAfter(element.parent("label"));
		            } else {
		                error.insertAfter(element);
		            }
		        },
		        submitHandler: function(form) {
		            //Alert
		            swal({
		                title: "THÔNG BÁO",
		                text: 'Vui lòng kiểm tra kỹ thông tin thẻ, nếu sai thông tin Five88 không chịu trách nhiệm',
		                showCancelButton: true,
		            }).then((result) => {
		                if (result.value === true) {
		                    //OK
		                    //call api
		                    callAPI_FORM(form, function(resp) {
		                        if (resp.status != 'OK') {
		                            alert(resp.msg);
		                            return false;
		                        }
		                        f88sms.success(
		                            "Hệ thống đang xử lý vui lòng kiểm tra Lịch sử giao dịch",
		                            function() {
		                                if (typeof dataLayer !== 'undefined')
		                                    dataLayer.push({
		                                        'event': 'formSubmitted',
		                                        'formName': 'frmDepositcard'
		                                    });

		                                window.location.reload();
		                            });

		                    });

		                } else {
		                    //Cancel
		                }
		            })

		        }
		    });
		    
		    $("#frmDeposit").validate({
		        rules: {
		            to_bank_code: {
		                required: true,
		            },
		            from_bank_name: {
		                required: true,
		            },
		            method: {
		                required: true,
		            },
		            amount: {
		                required: true,
		                number: true
		            },
		            bank_trancode: {
		                required: true
		            }
		                    },
		        messages: {
		            to_bank_code: {
		                required: 'You have not selected a bank',
		            },
		            from_bank_name: {
		                required: "You have not entered the sender's name",
		            },
		            method: {
		                required: 'You have not selected a payment method',
		            },
		            bank_trancode: {
		                required: "You have not filled out the information",
		            },
		            amount: {
		                required: 'The deposit amount is not valid',
		                number: "The amount you want to withdraw is invalid."
		            }
		                    },
		        errorElement: "div",
		        errorPlacement: function(error, element) {
		            error.addClass("msgError");
		            if (element.prop("type") === "checkbox") {
		                error.insertAfter(element.parent("label"));
		            } else {
		                error.insertAfter(element);
		            }
		        },
		        submitHandler: function(form) {
		        	var form_id = $('#frmDeposit');
		        	 $.ajax({
		        	headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					// type: "POST",
					// url: "{{ url('save-item')}}",  
					// data: data,
					dataType:'json',
					// $form.submit();
		        	// console.log(form);return
		            url: "{{ url('test')}}",
		            type: "POST",
		            data: form_id.serialize(),
		            success: function(resp) {
		            	console.log(resp);return false;
		                if (resp.status == 'OK') {
		                    document.getElementById("bank_trancode_codepay").value = resp.bank_trancode;
		                    document.getElementById("id_codepay").value = resp.id;
		                } else {
		                    alert("Không thể kết nối đến máy chủ, vui lòng kiểm tra lại internet.");
		                }
		            },
		            error: function() {
		                alert("Không thể kết nối đến máy chủ, vui lòng kiểm tra lại internet.2");
		                return false;
		            }
		        });
		   //          // callAPI_FORM(form, function(resp) {
		   //          //     if (resp.status != "OK") {
		   //          //         alert(resp.msg);
		   //          //         return false;
		   //          //     }

		   //          //     if(typeof dataLayer !== 'undefined')
		   //          //         dataLayer.push({'event' : 'formSubmitted', 'formName' : 'frmDepositStep2' });
		   //          //         f88sms.success("Tạo phiếu nạp thành công", function (){
		   //          //             document.location.href="/history/lsgd.aspx";
		   //          //     });
		   //          // });
		        }
		    });

		    $("#codepayDeposit").validate({
		        rules: {
		            to_bank_code: {
		                required: true,
		            },
		            from_bank_name: {
		                required: true,
		            },
		            bank_trancode: {
		                required: true
		            }
		                    },
		        messages: {
		            to_bank_code: {
		                required: 'Bạn chưa chọn ngân hàng',
		            },
		            from_bank_name: {
		                required: "You have not entered the sender's name",
		            },
		            bank_trancode: {
		                required: "TRADING CODE",
		            }
		                    },
		        errorElement: "div",
		        errorPlacement: function(error, element) {
		            error.addClass("msgError");
		            if (element.prop("type") === "checkbox") {
		                error.insertAfter(element.parent("label"));
		            } else {
		                error.insertAfter(element);
		            }
		        },
		        submitHandler: function(form) {
			        	var form_id = $('#codepayDeposit');
			        	 $.ajax({
			        	headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						},
						// type: "POST",
						// url: "{{ url('save-item')}}",  
						// data: data,
						dataType:'json',
						// $form.submit();
			        	// console.log(form);return
			            url: "{{ url('test')}}",
			            type: "POST",
			            data: form_id.serialize(),
			            success: function(resp) {
			            	console.log(resp);return false;
			                if (resp.status == 'OK') {
			                    document.getElementById("bank_trancode_codepay").value = resp.bank_trancode;
			                    document.getElementById("id_codepay").value = resp.id;
			                } else {
			                    alert("Không thể kết nối đến máy chủ, vui lòng kiểm tra lại internet.");
			                }
			            },
			            error: function() {
			                alert("Không thể kết nối đến máy chủ, vui lòng kiểm tra lại internet.2");
			                return false;
			            }
			        });
		            // callAPI_FORM(form, function(resp) {
		            //     if (resp.status != "OK") {
		            //         alert(resp.msg);
		            //         return false;
		            //     }
		            //     if(typeof dataLayer !== 'undefined')
		            //         dataLayer.push({'event' : 'formSubmitted', 'formName' : 'codepayDeposit' });
		            //         f88sms.success("Tạo phiếu nạp thành công", function (){
		            //             document.location.href="/history/lsgd.aspx";
		            //     });
		            // });
		        }
		    });

		    function onKeyUpStake(h) {
		        var g = h.value;
		        var e = h.value.replace(/[A-Za-z]/g, '').replace(/[^\dM-]/g, '').replace(/\-/g, '');
		        var b = "";
		        if (e) {
		            e = e.replace(/^(-)?0+(?=\d)/, '$1');
		        }
		        if (e === null) {
		            b = ""
		        } else {
		            for (var f = 0; f < e.length; f++) {
		                b += e[f]
		            }
		        }
		        h.value = b.replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
		    }

		    $(".formatAmount").on('input', function() {
		        onKeyUpStake(this);
		    });
		});
	</script>
@endsection
