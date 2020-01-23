<div id="page">
    <div id="header">
        <div id="header-body" class="clearfix">
            <h1 id="logo" class="pull-left"><a href="/" title="FIVE88 - Football betting bookmaker - lottery - casino"> <img title="FIVE88 - Football betting bookmaker - lottery - casino" alt="FIVE88 - Football betting bookmaker - lottery - casino" src="//static.five88.com/assets/img/LOGO_FIVE88.svg" width="158" height="64"></a></h1>
            <div class="area-user pull-right">
                <div class="pull-left hotline"><i class="icon-hotline"></i><span class="entry-number">Hotline <a href="tel:+84965588588" class="textBlue">0965.588.588</a></span>
                </div>
                <div class="acc_header pull-left"> <a href="/account"><i class="icon_member"></i></a>
                    <div class="acc_meta_group">
                        <a href="/account"> <span class="acc_name">blackrosevn</span> 
                        </a> <span class="acc_amount"> <a href="/deposite" style="color: #fff"> <span class="txt-balance-info">120</span> K</a>
                        </span>
                    </div>
                    <div class="wallet-sport-transfer pull-left">
                        <a class="icon-transfer" title="chuyển ví"></a>
                        <form action="" class="wallet-header">
                            <div class="title-wallet"><strong>Main</strong> wallet S-Sports, Lot, Keno, Numbergame, ...</div>
                            <div class="wallet-key">
                                <img src="//static.five88.com/assets/img/icon-money.svg" alt="">
                                <div style="width: 306px">
                                    <input type="range" id="rangekeyh" name="" step="1" value="120" min="0" max="120" placeholder="" style="position: absolute; width: 1px; height: 1px; overflow: hidden; opacity: 0;">
                                    <div class="rangeslider rangeslider--horizontal" id="js-rangeslider-0">
                                        <div class="rangeslider__fill" style="width: 292px;"></div>
                                        <div class="rangeslider__handle" style="left: 278px;"></div>
                                    </div>
                                </div>
                                <input type="text" id="valuekeyh" name="" value="120" placeholder="">
                            </div>
                            <div class="title-wallet"><strong>A- Wallet</strong>Sport, Virtual Sports, ...</div>
                            <div class="wallet-sport">
                                <img src="//static.five88.com/assets/img/icon-money.svg" alt="">
                                <div style="width: 306px">
                                    <input type="range" id="rangesporth" name="" step="1" value="0" min="0" max="120" placeholder="" style="position: absolute; width: 1px; height: 1px; overflow: hidden; opacity: 0;">
                                    <div class="rangeslider rangeslider--horizontal" id="js-rangeslider-1">
                                        <div class="rangeslider__fill" style="width: 14px;"></div>
                                        <div class="rangeslider__handle" style="left: 0px;"></div>
                                    </div>
                                </div>
                                <input type="text" id="valuesporth" name="" value="0" placeholder="">
                            </div>
                            <div class="plusgroup">
                                <div class="btn-plus plus10"><a href="javascript:void(0)">+10</a>
                                </div>
                                <div class="btn-plus plus50"><a href="javascript:void(0)">+50</a>
                                </div>
                                <div class="btn-plus plus100"><a href="javascript:void(0)">+100</a>
                                </div>
                                <div class="btn-plus plus1000"><a href="javascript:void(0)">+1.000</a>
                                </div>
                                <div class="btn-plus plus5000"><a href="javascript:void(0)">+5.000</a>
                                </div>
                                <div class="btn-plus plus10000"><a href="javascript:void(0)">+10.000</a>
                                </div>
                            </div>
                            <div class="wallet-bottom"> <a class="xac-nhan disable-wallet" id="xac-nhan" onclick="makeTransferHeader();"> Confirm <img class="change-loadding-header" src="//static.five88.com/assets/img/right-arrow.svg"></a>
                            </div>
                        </form>
                    </div> <a class="btn btn-default nap-tien" href="/deposit">Recharge</a>
                </div>
                <div class="acc_logout pull-left"><a class="btn btn-default" href="/"><i class="icon_close"></i>EXIT</a>
                </div>

                <script>
                    $(document).ready(function(e) {
                        var navListItems = $('div.setup-panel div a'),
                        allWells = $('.setup-content'),
                        btnnext = $('.btn-insert-code');

                        allWells.hide();
                        navListItems.click(function (e) {
                            e.preventDefault();
                            var $target = $($(this).attr('href')),
                            $item = $(this);

                            if (!$item.hasClass('disabled')) {
                                navListItems.removeClass('btn-primary').addClass('btn-default');
                                $item.addClass('btn-primary');
                                allWells.hide();
                                $target.show();
                                $target.find('input:eq(0)').focus();
                            }
                        });
                        btnnext.click(function(){
                            var curStep = $(this).closest(".setup-content"),
                            curStepBtn = curStep.attr("id"),
                            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
                            curInputs = curStep.find("input[type='text'], input[type='password'], input[type='url']"),
                            isValid = true;

                            $(".input-group").removeClass("has-error");
                            for(var i=0; i<curInputs.length; i++){
                                if (!curInputs[i].validity.valid){
                                    isValid = false;
                                    $(curInputs[i]).closest(".input-group").addClass("has-error");
                                }
                            }

                            if (isValid)
                                nextStepWizard.removeAttr('disabled').trigger('click');
                        });
                        $('div.setup-panel div a.btn-primary').trigger('click');

                        $('.btn-gift').click(function(){
                            $("#popup-giftcode").slideToggle(300, "linear");
                        });    
                        $('.button-success').click(function(){
                            $(".status-success").text("NHẬN GIFTCODE THÀNH CÔNG");
                            $(this).addClass(".close-success");
                        });   
                        $('.button-success').click(function(){
                            $(this).hide();
                        }); 
                        $(".close-popup").click(function () {
                            $("#popup-giftcode").fadeOut(300);
                        });                
                    });
                    /*$(document).mouseup(function (e){
                        var popup = $("#popup-giftcode");
                        var icon = $(".btn-gift");
                        if (!popup.is(e.target) || !icon.is(e.target)) {
                            popup.hide();      
                        }
                    });*/
                </script>
            <div class="step" style="display: none;">
                <div class="stepwizard col-md-12">
                    <div class="stepwizard-row setup-panel">
                        <div class="stepwizard-step step-1">
                            <a href="#step-1" class="btn-default btn-primary"></a>
                            <p>Nhập mã giftcode</p>
                        </div>
                        <div class="stepwizard-step step-2">
                            <a href="#step-2" class="btn-default" disabled="disabled"></a>
                            <p>Xác thực thông tin</p>
                        </div>
                        <div class="stepwizard-step step-3">
                            <a href="#step-3" class="btn-default" disabled="disabled"></a>
                            <p>Kết quả</p>
                        </div>
                    </div>
                </div>
            </div>
            <form role="form" action="" method="post" id="popup-giftcode" style="display: none;"> <span class="arrow-popup"></span>  <span class="close-popup">×</span>
                <div class="setup-content" id="step-1" style="display: block;">
                    <input class="txt-insert" type="text" required="true" placeholder="Nhập Giftcode"><a href="#" class="btn-insert-code">XÁC NHẬN</a>
                </div>
                <div class="setup-content" id="step-2" style="display: none;">
                    <div class="row">
                        <div class="col-6">
                            <p>Mã Giftcode: <strong>MNYGKSHDGSKSJJD</strong>
                            </p>
                            <p>Giá trị: <strong>1.000.000</strong> KVD</p>
                        </div>
                        <div class="col-6">
                            <p>Thời hạn: <strong>10.10.2019</strong>
                            </p>
                            <p>Yêu cầu vòng cược: <strong>07</strong>
                            </p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-12 mbt15">Để nhận được giftcode này bạn phải hoàn thành xác minh tài khoản ngân hàng.</div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <select class="custom-select w100 mbt15 txt-insert">
                                <option selected="">Chọn ngân hàng</option>
                                <option value="ACB">ACB</option>
                                <option value="Techcombank">Techcombank</option>
                                <option value="Sacombank">Sacombank</option>
                            </select>
                            <br>
                            <input class="txt-insert w100 mbt15" type="text" placeholder="Số tài khoản">
                        </div>
                        <div class="col-6">
                            <input class="txt-insert w100 mbt15" type="text" required="true" placeholder="Tên tài khoản">
                            <br> <a href="#" class="btn-insert-code w100 mbt15">XÁC MINH</a>
                        </div>
                    </div>
                </div>
                <div class="setup-content" id="step-3" style="display: none;">
                    <div class="row">
                        <div class="col-6">
                            <p>Mã Giftcode: <strong>MNYGKSHDGSKSJJD</strong>
                            </p>
                            <p>Giá trị: <strong>1.000.000</strong> KVD</p>
                        </div>
                        <div class="col-6">
                            <p>Thời hạn: <strong>10.10.2019</strong>
                            </p>
                            <p>Yêu cầu vòng cược: <strong>07</strong>
                            </p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-12 mbt15">Để nhận được giftcode này bạn phải hoàn thành xác minh tài khoản ngân hàng.</div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="w100 mbt15 text-center "><strong class="status-success">CHÚC MỪNG BẠN ĐÃ XÁC MINH THÀNH CÔNG</strong>
                            </div>
                            <div class="text-center"><a href="#" class="btn-insert-code mbt15 button-success">NHẬN</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        </div>
        <div id="menu">
            <div id="nav" class="clearfix">
                <ul class="nav navbar-nav pull-right">
                    <li> <a href="//five88.com/sport.aspx" title="Sport"><i class="icon-msport"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Sport</font></font></a>
                    </li>
                    <li>
                        <a id="lode" href="//five88.com/lode.aspx" title="Plot threads">
                            <img class="icon-lode" src="//static.five88.com/assets/img/icon-lode1.png"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Lot of </font><sup class="icon-new"><font style="vertical-align: inherit;">NEW</font></sup><font style="vertical-align: inherit;"> threads</font></font><sup class="icon-new"><font style="vertical-align: inherit;"></font></sup> 
                        </a>
                    </li>
                    <li> <a href="//five88.com/casino.aspx" title="Casino"><i class="icon-mcasino"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Casino</font></font></a>
                    </li>
                    <li> <a href="//five88.com/games.aspx" title="Game"><i class="icon-mgames"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Game</font></font></a>
                    </li>
                    <li> <a href="javascript:;" class="login-required" title="Number game"><i class="icon-mnbg"></i>Number game</a>
                    </li>
                    <li> <a href="//five88.com/keno.aspx" title="Keno"><i class="icon-mkeno"></i>Keno</a>
                    </li>
                    <li> <a href="//five88.com/vsport.aspx" title="Virtual sports"><i class="icon-mvsport"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Virtual sports</font></font></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "ItemList",
            "itemListElement": [{
                "@type": "ListItem",
                "item": {
                    "@type": "Thing",
                    "url": "https://five88.com/",
                    "@id": "https://five88.com/",
                    "name": "Nhà cái cá cược bóng đá, game casino online uy tín châu Á."
                },
                "position": 1
            }, {
                "@type": "ListItem",
                "item": {
                    "@type": "Thing",
                    "url": "https://five88.com/#ty-le-keo",
                    "@id": "https://five88.com/#ty-le-keo",
                    "name": "Xem tỷ lệ kèo bóng đá hôm nay, tỉ lệ kèo cá cược bóng đá trực tuyến các trận đấu trong ngày."
                },
                "position": 2
            }, {
                "@type": "ListItem",
                "item": {
                    "@type": "Thing",
                    "url": "https://five88.com/#gioi-thieu-12",
                    "@id": "https://five88.com/#gioi-thieu-12",
                    "name": "Nhà cái bóng đá uy tín của Việt Nam, cá cược trực tuyến Châu Á"
                },
                "position": 3
            }, {
                "@type": "ListItem",
                "item": {
                    "@type": "Thing",
                    "url": "https://five88.com/#lode",
                    "@id": "https://five88.com/#lode",
                    "name": "Nhà cái lô đề, chơi đánh đề online uy tín dễ dàng ăn tiền, biên đề dễ chơi dễ trúng, tỷ lệ cao 1 ăn 85 hấp dẫn, nạp tiền, rút tiền nhanh gọn"
                },
                "position": 4
            }, {
                "@type": "ListItem",
                "item": {
                    "@type": "Thing",
                    "url": "https://five88.com/#nhan-dinh-soi-keo-bong-da",
                    "@id": "https://five88.com/#nhan-dinh-soi-keo-bong-da",
                    "name": "Soi kèo bóng đá, nhận định bóng đá của chuyên, dự đoán tỷ lệ kèo nhà cái xem cá cược, cá độ trực tuyến giúp người chơi có lựa chọn sáng suốt để đặt cược"
                },
                "position": 5
            }, {
                "@type": "ListItem",
                "item": {
                    "@type": "Thing",
                    "url": "https://five88.com/#huong-dan-ca-cuoc.aspx",
                    "@id": "https://five88.com/#huong-dan-ca-cuoc.aspx",
                    "name": "Hướng dẫn cá cược, trang cá độ bóng đá trực tuyến qua mạng hàng đầu châu á uy tín, chất lượng và an toàn."
                },
                "position": 6
            }, {
                "@type": "ListItem",
                "item": {
                    "@type": "Thing",
                    "url": "https://five88.com/#huong-dan",
                    "@id": "https://five88.com/#huong-dan",
                    "name": "Hướng dẫn tham gia cá cược tại Five88, hướng dẫn rút nạp tại Five88"
                },
                "position": 7
            }, {
                "@type": "ListItem",
                "item": {
                    "@type": "Thing",
                    "url": "https://five88.com/#blog-lo-de",
                    "@id": "https://five88.com/#blog-lo-de",
                    "name": "Kinh nghiệm chơi đề trực tuyến, đánh lô đề online và dự đoán kết quả xổ số 3 miền, giải mã giấc mơ để lựa chọn con đề với xác suất trúng lô cực."
                },
                "position": 8
            }, {
                "@type": "ListItem",
                "item": {
                    "@type": "Thing",
                    "url": "https://five88.com/#du-doan-xo-so",
                    "@id": "https://five88.com/#du-doan-xo-so",
                    "name": "Soi cầu dự đoán xổ số 3 miền Bắc Trung Nam chính xác hôm nay, dự đoán kết quả xổ số, lô đề online. Chia sẻ cách soi cầu và dự đoán kết quả xổ số 3 miền"
                },
                "position": 9
            }, {
                "@type": "ListItem",
                "item": {
                    "@type": "Thing",
                    "url": "https://five88.com/#khuyen-mai-22",
                    "@id": "https://five88.com/#khuyen-mai-22",
                    "name": "FIVE88 Khuyến mãi khủng nạp tiền cá độ bóng đá, thể thao – Cá độ trực tuyến | Online."
                },
                "position": 10
            }],
            "name": "Nhà cái cá cược bóng đá, casino trực tuyến uy tín châu Á - FIVE88",
            "description": "FIVE88 - Nhà cái cá cược bóng đá, game casino online uy tín châu Á. Chuyên nghiệp từ cách chơi, nạp tiền, rút tiền. Quý khách sẽ hài lòng. Click trải nghiệm.",
            "url": "https://five88.com"
        }
    </script>
</div>