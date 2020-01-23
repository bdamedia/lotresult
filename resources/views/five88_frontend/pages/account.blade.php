@extends('five88_frontend.layouts.master')
@section('title')
	<title>BETTING | TRANSACTION HISTORY</title>
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
		background:url(assets/img/icon-ib.png) no-repeat 50%;
		background-size: contain;
	}
	.radio-group .check .icon-method-atm{
		background:url(assets/img/icon-atm.png) no-repeat 50%;
		background-size: contain;
	}
	.radio-group .check .icon-method-db{
		background:url(assets/img/icon-db.png) no-repeat 50%;
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
		background:#fff url(assets/img/icon-dropdown.png) no-repeat 97% 50%;
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
				<!-- <div class="panel-container">
					<div class="account-history">
						<h2 class="block-title"><font style="vertical-align: inherit;"><font class="" style="vertical-align: inherit;">Transaction history</font></font></h2>
						<div class="display-custom">
							<form onsubmit="f88History.lsgd(this); return false;" action="//five88.com/history/lsgd.aspx" method="GET" class="form-inline">
								<div class="display-container"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Display </font></font><span id="numShow"> <select onchange="$(this).closest('form').submit();" name="limit"><option>10</option><option>20</option><option>50</option><option>100</option> </select> </span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> latest transaction </font></font>
								</div>
							</form>
						</div>
						<div class="clear"></div>
						<div class="data-table" id="lsgd">
							<div class="table-border">
								<table class="table-history" cellpadding="0" cellspacing="0" border="0" width="100%">
									<tbody>
										<tr>
											<th width="49">ID</th>
											<th width="195"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Day</font></font>
											</th>
											<th width="120"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Species</font></font>
											</th>
											<th width="145"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Bank</font></font>
											</th>
											<th width="145"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Amount of money</font></font>
											</th>
											<th width="145"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Form</font></font>
											</th>
											<th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Trading code</font></font>
											</th>
											<th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Status</font></font>
											</th>
										</tr>
										<tr>
											<td>24379077</td>
											<td>02/01/2020 18:10:53</td>
											<td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Loaded</font></font>
											</td>
											<td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Techcombank</font></font>
											</td>
											<td>50 K</td>
											<td>ibanking</td>
											<td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">FT20002947740096</font></font>
											</td>
											<td> <span class="st-1"><i></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Finished</font></font></span>
											</td>
										</tr>
										<tr>
											<td>24376032</td>
											<td>02/01/2020 17:50:27</td>
											<td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Loaded</font></font>
											</td>
											<td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Techcombank</font></font>
											</td>
											<td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">50 K</font></font>
											</td>
											<td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">ibanking</font></font>
											</td>
											<td>memo</td>
											<td> <span class="st-2"><i></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Aborted</font></font></span>
											</td>
										</tr>
										<tr>
											<td>22280129</td>
											<td>24/12/2019 14:52:36</td>
											<td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Promotion</font></font>
											</td>
											<td></td>
											<td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">50 K</font></font>
											</td>
											<td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">ibanking</font></font>
											</td>
											<td></td>
											<td> <span class="st-1"><i></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Finished</font></font></span>
											</td>
										</tr>
										<tr>
											<td>22279580</td>
											<td>24/12/2019 14:50:53</td>
											<td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Loaded</font></font>
											</td>
											<td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Techcombank</font></font>
											</td>
											<td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">50 K</font></font>
											</td>
											<td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">ibanking</font></font>
											</td>
											<td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">FT19358290288803</font></font>
											</td>
											<td> <span class="st-1"><i></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Finished</font></font></span>
											</td>
										</tr>
										<tr>
											<td>19682999</td>
											<td>12/12/2019 18:27:09</td>
											<td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Loaded</font></font>
											</td>
											<td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Techcombank</font></font>
											</td>
											<td>100 K</td>
											<td>fivepay</td>
											<td></td>
											<td> <span class=""><i></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Waiting for progressing</font></font></span>
											</td>
										</tr>
										<tr>
											<td>19090493</td>
											<td>09/12/2019 16:29:07</td>
											<td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Loaded</font></font>
											</td>
											<td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">VCB</font></font>
											</td>
											<td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">100 K</font></font>
											</td>
											<td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">fivepay</font></font>
											</td>
											<td></td>
											<td> <span class="st-2"><i></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Aborted</font></font></span>
											</td>
										</tr>
										<tr>
											<td>19089163</td>
											<td>09/12/2019 16:20:02</td>
											<td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Loaded</font></font>
											</td>
											<td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">VCB</font></font>
											</td>
											<td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">100 K</font></font>
											</td>
											<td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">fivepay</font></font>
											</td>
											<td></td>
											<td> <span class="st-2"><i></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Aborted</font></font></span>
											</td>
										</tr>
										<tr>
											<td>19089035</td>
											<td>09/12/2019 16:18:48</td>
											<td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Loaded</font></font>
											</td>
											<td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">VietinBank</font></font>
											</td>
											<td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">100 K</font></font>
											</td>
											<td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">ibanking</font></font>
											</td>
											<td>103050103051</td>
											<td> <span class="st-2"><i></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Aborted</font></font></span>
											</td>
										</tr>
										<tr>
											<td>19088808</td>
											<td>09/12/2019 16:17:20</td>
											<td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Loaded</font></font>
											</td>
											<td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">VCB</font></font>
											</td>
											<td>100 K</td>
											<td>fivepay</td>
											<td></td>
											<td> <span class=""><i></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Waiting for progressing</font></font></span>
											</td>
										</tr>
										<tr>
											<td>19088505</td>
											<td>09/12/2019 16:14:10</td>
											<td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Loaded</font></font>
											</td>
											<td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">VCB</font></font>
											</td>
											<td>100,000 K</td>
											<td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">fivepay</font></font>
											</td>
											<td></td>
											<td> <span class=""><i></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Waiting for progressing</font></font></span>
											</td>
										</tr>
									</tbody>
								</table>
								<div class="img-bet-tb"></div>
							</div>
							<nav aria-label="Page navigation"></nav>
						</div>
					</div>
				</div> -->



				<div class="panel-container panel-account">
<div class="wallet">
<div class="row">
<div class="col-sm-6">
<canvas id="chartContainer" style="height: 370px; width: 100%;"></canvas>
</div>
<div class="col-sm-6">
<form action="" class=" wallet-right">
<div class="title-wallet"><strong>Main</strong>wallet S-Sports, Lot, Keno, Numbergame, ...</div>
<div class="wallet-key">
<img src="assets/img/icon-money.svg" alt=""><input type="range" id="rangekey" name="" step="1" value="119" min="0" max="119" placeholder="">
<input pattern="[0-9]*" inputmode="numeric" type="text" id="valuekey" name="" value="119" placeholder="">
</div>
<div class="title-wallet"><strong>A- Wallet</strong> Sport, Virtual Sports ...</div>
<div class="wallet-sport">
<img src="assets/img/icon-money.svg" alt=""><input type="range" id="rangesport" name="" step="1" value="0" min="0" max="119" placeholder="">
<input pattern="[0-9]*" type="text" id="valuesport" name="" value="0" placeholder="">
</div>
<div class="plusgroup">

<div class="btn-plus plus10"><a href="javascript:void(0)">+10</a></div>
<div class="btn-plus plus50"><a href="javascript:void(0)">+50</a></div>
<div class="btn-plus plus100"><a href="javascript:void(0)">+100</a></div>
<div class="btn-plus plus1000"><a href="javascript:void(0)">+1.000</a></div>
<div class="btn-plus plus5000"><a href="javascript:void(0)">+5.000</a></div>
<div class="btn-plus plus10000"><a href="javascript:void(0)">+10.000</a></div>
</div>
<div class="wallet-bottom">
<div class="surplus">Total balance: <strong>119</strong> K</div>
<a class="xac-nhan xac-nhan-desktop disable-wallet" id="xac-nhan" onclick="makeTransfer();"> Confirm <img class="change-loadding" src="//static.five88.com/assets/img/right-arrow.svg"></a>
</div>
</form>
</div>
</div>
</div>
</div>
<div class="panel-container panel-account">
<div class="section-block">
<div class="section-head">
<h2 class="Htitle style-title-spr"><span>You Joined </span></h2>
<p class="explain-txt">
YOU ARE IN THE <span>
PROMOTION OF 100% VALUE LOADED </span>
</p>
<p class="explain-txt" style="font-size : 18px;">
PROMOTION PERIOD: 2019-12-24 - 2020-01-23 </p>
</div>
<div class="section-container">
<div class="amount-group">
<div class="amount">
<div>
DEPOSIT AMOUNT OF<span>
50 K</span>
</div>
</div>
<div class="amount amount-bonus">
<div>
BONUS AMOUNT OF<span>
50 K</span>
</div>
</div>
</div>
<div class="chart-draw">
<div class="chart-col">
<div class="chart-tit">SALES REQUIRED</div>
<div class="chart-container">
<div class="chart-graph">
<canvas id="canvas-1" width="226" height="226" data-perc="20" data-text="20"></canvas>
<span>20</span>
</div>
<div class="amount">2,000 <span>K</span></div>
</div>
</div>
<div class="chart-col">
<div class="chart-tit">SALES HAVE BEEN REACHED</div>
<div class="chart-container">
<div class="chart-graph">
<canvas id="canvas-2" width="226" height="226" data-perc="0.2" data-text="20"></canvas>
<span>0.2</span>
</div>
<div class="amount">18 <span>K</span></div>
</div>
</div>
<div class="chart-col ">
<div class="chart-tit">STATUS</div>
<div class="chart-container chart-status">
<div class="status-require no-withdrawn">NOT YET WITHDRAWN</div>
</div>
<div class="cancel_promo">
<a onclick="f88.cancelPromotion(this, '//five88.com/payment/cancelpromotion.aspx', '5e01c3c468f758c9fb59485b')" href="javascript:void(0)" class="btn cancel-promotion">
Cancel promotion  <span>X</span>
</a>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

			</div>
		</div>
	</div>


@endsection

@section('footerJS')
<script>
    $('[data-toggle="tooltip"]').tooltip();
    var canvas = document.getElementsByTagName('canvas');
    for (var i = 0; i < canvas.length; i++) {
        progressBar(canvas[i].id);
    }
    function progressBar(canvasId) {
        var degreesCall;
        var canvas = document.getElementById(canvasId);
        var ctx = canvas.getContext('2d');
        var cWidth = canvas.width;
        var cHeight = canvas.height;
        var progressColor = '#3abfbe';
        var circleColor = '#ffb700';
        var rawPerc = canvas.getAttribute('data-perc');
        var definition = canvas.getAttribute('data-text');
        var perc = parseInt(rawPerc);
        var degrees = 0;
        var endDegrees = (360 * perc) / definition;
        var lineWidth = 27;
        ctx.lineCap = 'round';
        function getDegrees() {
            if (degrees < endDegrees) {
                degrees++;
            } else {
                clearInterval(degreesCall);
            }
            drawProgressBar();

        }
        function drawProgressBar() {
            ctx.clearRect(0, 0, cWidth, cHeight);
            ctx.beginPath();
            ctx.strokeStyle = circleColor;
            ctx.lineWidth = lineWidth;
            ctx.arc(cHeight / 2, cWidth / 2, (cWidth - lineWidth) / 2, 0, Math.PI * 2, false);
            ctx.stroke();
            var radians = 0;
            radians = degrees * Math.PI / 180;
            if (degrees == 0)
                return;
            ctx.beginPath();
            ctx.strokeStyle = progressColor;
            ctx.lineWidth = lineWidth;
            ctx.arc(cHeight / 2, cWidth / 2, (cWidth - lineWidth) / 2, 0 - 90 * Math.PI / 180, radians - 90 * Math.PI / 180, false);
            ctx.stroke();
            ctx.fillStyle = progressColor;
            ctx.font = '20px Arial';
        }
        degreesCall = setInterval(getDegrees, 10 / (degrees - endDegrees));
    }
</script>
<script>
	$( document ).ready(function() {
        var maxAmount = 119;
		var $rangekey = $('#rangekey');
        var $valuekey = $('#valuekey');

        var $rangesport = $('#rangesport');
		var $valuesport = $('#valuesport');

        // $(".setvalue0").click(function() {
        //     $rangesport.val(0).change();
        //     removeClass();
        // });
        $(".plus10").click(function() {
            var num = parseInt($valuesport.val());
            if(num % 10 != 0) firstclick(num , 10);
            else normalclick(num , 10);
            removeClass();
        });
        $(".plus50").click(function() {
            var num = parseInt($valuesport.val());
            if(num % 50 != 0) firstclick(num , 50);
            else normalclick(num , 50);
            removeClass();
        });
        $(".plus100").click(function() {
            var num = parseInt($valuesport.val());
            if(num % 100 != 0) firstclick(num , 100);
            else normalclick(num , 100);
            removeClass();
        });
        $(".plus1000").click(function() {
            var num = parseInt($valuesport.val());
            if(num % 1000 != 0) firstclick(num , 1000);
            else normalclick(num , 1000);
            removeClass();
        });
        $(".plus5000").click(function() {
            var num = parseInt($valuesport.val());
            if(num % 5000 != 0) firstclick(num , 5000);
            else normalclick(num , 5000);
            removeClass();
        });
        $(".plus10000").click(function() {
            var num = parseInt($valuesport.val());
            if(num % 10000 != 0) firstclick(num , 10000);
            else normalclick(num , 10000);
            removeClass();
        });

        function firstclick(value, plus) {
            var kq = (Math.floor( value/plus ) * plus) + plus;
            $rangesport.val(kq).change();
        }
        function normalclick(value, plus) {
            var kq = value + plus;
            $rangesport.val(kq).change();
        }

		$rangekey.rangeslider({
			polyfill: false
		}).on('input', function() {
            $valuekey[0].value = this.value;
            if($valuesport.val() != maxAmount - this.value){
                $valuesport[0].value = maxAmount - this.value;
                $rangesport.val(maxAmount - this.value).change();
            }
            chartUpdate(this.value , maxAmount - this.value);
            removeClass();
		});
		$valuekey.on('input', function() {
            if(!this.value) this.value = 0;
            else if(this.value == maxAmount) this.value = maxAmount;
            $rangekey.val(this.value).change();
            if($valuesport.val() != maxAmount - this.value){
                $valuesport[0].value = maxAmount - this.value;
                $rangesport.val(maxAmount - this.value).change();
            }
            chartUpdate(this.value , maxAmount - this.value);
            removeClass();
		});


		$rangesport.rangeslider({
			polyfill: false
		}).on('input', function() {
            $valuesport[0].value = this.value;
            if($valuekey.val() != maxAmount - this.value){
                $valuekey[0].value = maxAmount - this.value;
                $rangekey.val(maxAmount - this.value).change();
            }
            chartUpdate(maxAmount - this.value , this.value);
            removeClass();
		});
		$valuesport.on('input', function() {
            if(!this.value) this.value = 0;
            else if(this.value == maxAmount) this.value = maxAmount;
            $rangesport.val(this.value).change();
            if($valuekey.val() != maxAmount - this.value){
                $valuekey[0].value = maxAmount - this.value;
                $rangekey.val(maxAmount - this.value).change();
            }
            chartUpdate(maxAmount - this.value , this.value);
            removeClass();
		});

		//chart thể thao
		var ctx = $('#chartContainer')[0];
		ctx.height = 170;
		var myChart = new Chart(ctx, {
			type: 'doughnut',
			data: {
				labels: ["S - Thể thao", "A - Thể thao"],
				datasets: [
				{
                    label: "",
                    backgroundColor: ["#3fe9e6", "#feb600"],
                    data: [119,0]
				}
				]
			}
        });
        var removeClass = function() {
            $(".xac-nhan-desktop").removeClass("disable-wallet");
        }
        var chartUpdate = function(s_value , a_value){
            myChart.data.datasets[0].data = [s_value , a_value];
            myChart.update();
        }

    });
    var requestRunning = false;
    var s_wallet = 119;
    var f_wallet = 0;
    var makeTransfer = function() {
        if(requestRunning) return ;
        $(".change-loadding").attr("src","//static.five88.com/assets/img/loadding.gif");
        requestRunning = true;
        var s_change_wallet = $('#valuekey').val();
        var f_change_wallet = $('#valuesport').val();
        if(s_wallet == s_change_wallet) {
            requestRunning = false;
            $(".change-loadding").attr("src","//static.five88.com/assets/img/right-arrow.svg");
            $(".xac-nhan").removeClass("disable-wallet").addClass("disable-wallet");
            return;
        }
        var type = "DEPOSIT";
        var amount = 0;
        if(Number(s_wallet) < Number(s_change_wallet)){
            type = "WITHDRAW";
            amount = s_change_wallet - s_wallet;
        }   else {
            amount = s_wallet - s_change_wallet;
        }

        _callAPI("//five88.com/fsport/transfer.aspx" + "?amount=" + amount + "&type=" + type, {}, "GET", function(resp) {
            $(".change-loadding").attr("src","//static.five88.com/assets/img/right-arrow.svg");
            $(".xac-nhan").removeClass("disable-wallet").addClass("disable-wallet");
            requestRunning = false;
            if (resp.status != "OK") {
                alert(resp.msg);
                return;
            }
            s_wallet = s_change_wallet;
            f_wallet = f_change_wallet;
        });
    }
</script>
@endsection
