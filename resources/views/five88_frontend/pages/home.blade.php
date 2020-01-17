@extends('five88_frontend.layouts.master')
@section('title')
	<title>BETTING | HOME</title>
@endsection

@section('headerCSS')
<!-- <style type="text/css">
		.loginSignupForms {
			background-color: white;
			box-shadow: 0px 0px 8px 0px #888888;
		}
	</style> -->
@endsection

@section('content')

	<header id="other">
		@include('five88_frontend.includes.navbar')
    </header>
    
    @include('five88_frontend.includes.slider')
    @include('five88_frontend.includes.jackpotSlider')
	<div class="home-games-wrap">
		<div class="home-games">
			<ul class="nonlist home-games-list">
				<li class="item item-sport">
					<div class="item-inner">
						<a href="//five88.com/ssport.aspx?click=home" title="Sport"> <span class="thumbs"></span>  <span class="stitle"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">S-Sports</font></font></span> 
						</a>
					</div>
				</li>
				<li class="item item-sport-a">
					<div class="item-inner">
						<a href="//five88.com/fsport/live-sports.aspx?click=home&amp;sport=1" title="Sport"> <span class="thumbs"></span>  <span class="stitle"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">A-Sports</font></font></span> 
						</a>
					</div>
				</li>
				<li class="item item-ld">
					<div class="item-inner">
						<a href="//five88.com/lode.aspx?click=home" title="Plot threads"> <span class="thumbs"></span>  <span class="stitle"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Plot threads</font></font></span> 
						</a>
					</div>
				</li>
				<li class="item item-fishing">
					<div class="item-inner">
						<a href="//five88.com/fishing.aspx?click=home" title="Shoot Fish"> <span class="thumbs"></span>
							<div class="jackpot-game" style="margin-bottom: 40px; text-align: left;">
								<div class="jackpot-item"><i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">$</font></font></i><span class="TPDD1999_JP_GRAND" data-text="55.602.325">55.602.325</span>
								</div>
							</div> <span class="stitle"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Shoot Fish</font></font></span> 
						</a>
					</div>
				</li>
				<li class="item item-nbg">
					<div class="item-inner">
						<a href="javascript:;" class="login-required"> <span class="thumbs"></span>  <span class="stitle">Number game</span> 
						</a>
					</div>
				</li>
				<li class="item item-kn">
					<div class="item-inner">
						<a href="//five88.com/keno.aspx" title="Keno"> <span class="thumbs"></span>  <span class="stitle">Keno</span> 
						</a>
					</div>
				</li>
				<li class="item item-casino">
					<div class="item-inner">
						<a href="//five88.com/casino.aspx?click=home"> <span class="thumbs"></span>  <span class="stitle"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Casino</font></font></span> 
						</a>
					</div>
				</li>
				<li class="item item-virtual_sp">
					<div class="item-inner">
						<a href="//five88.com/vsport.aspx?click=home"> <span class="thumbs"></span>  <span class="stitle"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Virtual sports</font></font></span> 
						</a>
					</div>
				</li>
			</ul>
		</div>
	</div>
	<script type="text/javascript" src="//static.five88.com/assets/js/jackpot.js?v=2"></script>
	<div id="main" class="main-home">
		<div class="section-featured">
			<div class="block-featured featured-slide">
				<div class="block-inner">
					<h2 class="block-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">GENERAL INFORMATION</font></font></h2>
					<div class="block-container">
						<div class="swiper-wrapper">
							<div class="swiper-slide product-list">
								<div class="item">
									<h4><a href="//five88.com/sport.aspx"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">SPORTS BETTING</font></font></a></h4>
									<p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Attractive and dramatic with sports tournaments large and small across the continent. </font><font style="vertical-align: inherit;">Friendly interface, competitive odds.</font></font>
									</p>
								</div>
								<div class="item">
									<h4><a href="//five88.com/casino.aspx"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Online SILVER ROOM</font></font></a></h4>
									<p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Indulge your passion for attractive, attractive online casinos.</font></font>
									</p>
								</div>
								<div class="item">
									<h4><a href="//five88.com/games.aspx"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">VIDEO GAMES</font></font></a></h4>
									<p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Vivid images with beautiful 3D graphics.</font></font>
									</p>
								</div>
							</div>
						</div>
					</div>
					<div class="swiper-pagination custom-pagination"></div>
				</div>
			</div>
			<div class="block-featured">
				<div class="block-inner">
					<h2 class="block-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">MODE OF PARTICIPATION</font></font></h2>
					<div class="block-container">
						<ul class="nonlist attend-list">
							<li class="item-deposit"> <span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">HOW TO MAKE MONEY </font></font></span>  <a href="//five88.com/huong-dan/cach-nap-tien-sieu-nhanh-tai-five88com.aspx"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">See more</font></font></a>
							</li>
							<li class="item-withdraw"> <span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">HOW TO WITHDRAW MONEY </font></font></span>  <a href="//five88.com/huong-dan/cach-rut-tien-than-toc-chi-co-tai-five88com.aspx"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">See more</font></font></a>
							</li>
							<li class="item-how"> <span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">HOW TO PLAY </font></font></span>  <a href="//five88.com/huong-dan/huong-dan-dang-ky-tai-khoan-ca-cuoc-truc-tuyen-five88com.aspx"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">See more</font></font></a>
							</li>
							<li class="item-faqs"> <span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">FREQUENTLY ASKED QUESTIONS </font></font></span>  <a href="//five88.com/huong-dan/cau-hoi-thuong-gap.aspx"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">See more</font></font></a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="block-featured graph-featured">
				<div class="block-inner">
					<h2 class="block-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">TRANSACTION TIME</font></font></h2>
					<div class="block-container">
						<div class="graph-service">
							<div class="item">
								<div class="graph-deposit"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">2 Minutes</font></font>
								</div> <span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Recharge</font></font></span>
							</div>
							<div class="item">
								<div class="graph-withdraw"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">5 minutes</font></font>
								</div> <span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Withdrawal</font></font></span>
							</div>
						</div>
						<p class="graph-extend"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> * Processing time may change if unexpected circumstances occur, such as outside working hours of the Bank, loss of network connection or incorrect information provided. </font></font>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/template" data-template="listitem">
	    <div class="swiper-slide hot-match-slider" id="m${matchid}">
	    <div class="match-slide">
	        <div class="match-details">
	            <div class="date-time">${start_time} (GMT +7)</div>
	            <div class="venue" style="text-transform: uppercase;"><a>${league_name}</a></div>
	        </div>
	        <div class="the-match-wrapper">
	            <div  id="m${matchid}" class="the-match">
	                <div class="team1">
	                    <div class="team-flag"><img src="${logo_team1}" style="width: 50px; height: 50px;"></div>
	                    <div class="team-name"><a>${team_name_1}</a></div>
	                    <div class="team-handicap">
	                        <div class="odds-box"><span id="m${matchid}_line1" class="handicap">(${line1})</span></div>
	                    </div>
	                    <div class="team-odd-price">
	                        <div class="odds-box"><span class="odds-text">FT. HDP </span><a id="m${matchid}_home"  class="odd-price rebindtrack">${home}</a></div>
	                    </div>
	                </div>
	                <div class="-vs">
	                    <div class="vs">vs</div>
	                </div>
	                <div class="team2">
	                    <div class="team-flag"><img src="${logo_team2}" style="width: 50px; height: 50px;"></div>
	                    <div class="team-name"><a>${team_name_2}</a></div>
	                    <div class="team-handicap">
	                        <div class="odds-box"><span id="m${matchid}_line2" class="handicap">(${line2})</span></div>
	                    </div>
	                    <div class="team-odd-price">
	                        <div class="odds-box"><a id="m${matchid}_away"  class="odd-price rebindtrack">${away}</a><span class="odds-text"> FT. HDP</span></div>
	                    </div>
	                </div>
	            </div>
	            <div class="match-bet">
	                <a href="${url}">Cược ngay</a>
	            </div>
	        </div>
	    </div>
	    </div>
	</script>
	<style>
	    .up_trend {
	        color: aqua !important;
	    }

	    .down_trend {
	        color: deeppink !important;
	    }

	    .normal_trend {
	        color: #FFF !important;
	    }

	    
	    
	    .right.carousel-control .fix-icon-left {
	        left: auto!important;
	        right: 15px!important;
	        color: #aba7a7;
	        font-size: 22px;
	    }
	    .left.carousel-control .fix-icon-left {
	        right: auto!important;
	        left: 15px!important;
	        color: #aba7a7;
	        font-size: 22px;
	    }
	    .carousel-showmanymoveone .carousel-control {
	       width: 8%;
	       background-image: none;
	    }

	    .carousel-showmanymoveone .carousel-control.left {
	        margin-left: 0;
	        opacity: 1;
	        background: linear-gradient(-90deg, rgba(32,34,42,0.0018382352941176405) 0%, rgba(32,34,42,0.8365721288515406) 60%, rgba(32,34,42,1) 100%);
	    }

	    .carousel-showmanymoveone .carousel-control.right {
	        margin-right: 0px;
	        opacity: 1;
	        background: linear-gradient(90deg, rgba(32,34,42,0.0018382352941176405) 0%, rgba(32,34,42,0.8365721288515406) 60%, rgba(32,34,42,1) 100%);
	    }

	    .carousel-showmanymoveone .cloneditem-1,
	    .carousel-showmanymoveone .cloneditem-2,
	    .carousel-showmanymoveone .cloneditem-3 {
	       display: none;
	    }

	    .carousel .item .col-xs-12 {
	       padding: 0;
	    }
	    .carousel-showmanymoveone .carousel-inner .cloneditem-1 {
	        display: block;
	    }
	    .col-xs-3.jackpots-item{
	        padding-left: 0px;
	        padding-right: 0px;
	        width: 26%;
	    }
	    .carousel-showmanymoveone .cloneditem-3 {
	        width: 22%;
	    }
	    .jackpots-list .jackpots-item {
	        flex: none;
	        max-width: none;
	    }

	    @media all and (min-width: 300px) {
	       .carousel-showmanymoveone .carousel-inner > .active.left,
	       .carousel-showmanymoveone .carousel-inner > .prev {
	          left: -26%;
	       }
	       .carousel-showmanymoveone .carousel-inner > .active.right,
	       .carousel-showmanymoveone .carousel-inner > .next {
	          left: 26%;
	       }
	       .carousel-showmanymoveone .carousel-inner > .left,
	       .carousel-showmanymoveone .carousel-inner > .prev.right,
	       .carousel-showmanymoveone .carousel-inner > .active {
	          left: 0;
	       }
	       .carousel-showmanymoveone .carousel-inner .cloneditem-2,
	       .carousel-showmanymoveone .carousel-inner .cloneditem-3 {
	            display: block;
	            white-space: nowrap;
	            overflow: hidden;
	       }
	    }

	    @media all and (min-width: 300px) and (transform-3d),
	    all and (min-width: 300px) and (-webkit-transform-3d) {
	       .carousel-showmanymoveone .carousel-inner > .item.active.right,
	       .carousel-showmanymoveone .carousel-inner > .item.next {
	          -webkit-transform: translate3d(26%, 0, 0);
	          transform: translate3d(26%, 0, 0);
	          left: 0;
	       }
	       .carousel-showmanymoveone .carousel-inner > .item.active.left,
	       .carousel-showmanymoveone .carousel-inner > .item.prev {
	          -webkit-transform: translate3d(-26%, 0, 0);
	          transform: translate3d(-26%, 0, 0);
	          left: 0;
	       }
	       .carousel-showmanymoveone .carousel-inner > .item.left,
	       .carousel-showmanymoveone .carousel-inner > .item.prev.right,
	       .carousel-showmanymoveone .carousel-inner > .item.active {
	          -webkit-transform: translate3d(0, 0, 0);
	          transform: translate3d(0, 0, 0);
	          left: 0;
	       }
	    }

	</style>
	<script>
	    function render(props) {
	        return function(tok, i) {
	            return (i % 2) ? props[tok] : tok;
	        };
	    }

	    function hotmatch(matchSwiper) {
	        callAPI("/home/hot_match", "", "GET", function(resp) {
	            if (resp!=null && resp.data && resp.data.matchhot.length > 0) {
	                $(".match-featured").show();
	                let hotmatchdetail = resp.data.matchhot;
	                // $('.swiper-match-wrapper').empty();
	                hotmatchdetail.forEach(function(itemMatch, index) {
	                    var line1 = "";
	                    var line2 = "";
	                    if (itemMatch.line.charAt(0) == "-") {
	                        line1 = itemMatch.line;
	                        line2 = itemMatch.line.replace("-", "+");
	                    } else {
	                        line1 = "+" + itemMatch.line;
	                        line2 = line1.replace("+", "-");
	                    }
	                    var url = 'fsport/' + itemMatch.team_alias_1 + "-vs-" + itemMatch.team_alias_2 + "/" + itemMatch.match_id + ".aspx";
	                    var class_trend_line1 = "normal_trend";
	                    var class_trend_line2 = "normal_trend";
	                    var class_trend_home = "normal_trend";
	                    var class_trend_away = "normal_trend";
	                    var line1Old = document.getElementById("m" + itemMatch.match_id + "_line1");
	                    var line2Old = document.getElementById("m" + itemMatch.match_id + "_line2");
	                    var homeOld = document.getElementById("m" + itemMatch.match_id + "_home");
	                    var awayOld = document.getElementById("m" + itemMatch.match_id + "_away");
	                    //set class color by trend
	                    if (line1Old != null) {
	                        var line1OldValue =  line1Old.innerText.replace(/[(]/i,"").replace(")","");
	                        if (parseFloat(itemMatch.line) > parseFloat(line1OldValue)) {
	                            class_trend_line1 = "up_trend";
	                            class_trend_line2 = "down_trend";
	                        } else if (parseFloat(itemMatch.line) < parseFloat(line1OldValue)) {
	                            class_trend_line1 = "down_trend";
	                            class_trend_line2 = "up_trend";
	                        }
	                        line1Old.innerText = "("+line1+")";
	                        line2Old.innerText = "("+line2+")";

	                        line1Old.classList.remove("normal_trend");
	                        line1Old.classList.remove("up_trend");
	                        line1Old.classList.remove("down_trend");
	                        line1Old.classList.add(class_trend_line1);

	                        line2Old.classList.remove("normal_trend");
	                        line2Old.classList.remove("up_trend");
	                        line2Old.classList.remove("down_trend");
	                        line2Old.classList.add(class_trend_line2);
	                    }
	                   
	                    if (homeOld != null) {
	                        var homeOldValue =  homeOld.innerText;
	                        if (parseFloat(itemMatch.home) > parseFloat(homeOldValue)) {
	                            class_trend_home = "up_trend";
	                        } else if (parseFloat(itemMatch.home) < parseFloat(homeOldValue)) {
	                            class_trend_home = "down_trend";
	                        }
	                        homeOld.innerText = itemMatch.home;
	                        homeOld.classList.remove("normal_trend");
	                        homeOld.classList.remove("up_trend");
	                        homeOld.classList.remove("down_trend");
	                        homeOld.classList.add(class_trend_home);
	                    }
	                    
	                    if (awayOld != null) {
	                        var awayOldValue =  awayOld.innerText;
	                        if (parseFloat(itemMatch.away) > parseFloat(awayOldValue)) {
	                            class_trend_away = "up_trend";
	                        } else if (parseFloat(itemMatch.away) < parseFloat(awayOldValue)) {
	                            class_trend_away = "down_trend";
	                        }
	                        awayOld.innerText = itemMatch.away;
	                        awayOld.classList.remove("normal_trend");
	                        awayOld.classList.remove("up_trend");
	                        awayOld.classList.remove("down_trend");
	                        awayOld.classList.add(class_trend_away);
	                    }
	                    

	                    var items = [{
	                        matchid: itemMatch.match_id,
	                        start_time: itemMatch.start_time,
	                        league_name: itemMatch.league_name,
	                        logo_team1: "https://f3.five88.com/images/" + itemMatch.logo_team1,
	                        team_name_1: itemMatch.team_name_1,
	                        line1: line2,
	                        home: itemMatch.home,
	                        away: itemMatch.away,
	                        logo_team2: "https://f3.five88.com/images/" + itemMatch.logo_team2,
	                        team_name_2: itemMatch.team_name_2,
	                        line2: line1,
	                        url: url
	                    }];

	                    var itemTpl = $('script[data-template="listitem"]').text().split(/\$\{(.+?)\}/g);
	                    if(line1Old == null){
	                        matchSwiper.appendSlide(items.map(function(item) {
	                            return itemTpl.map(render(item)).join('');
	                        }));
	                    }
	                });
	            }else{
	                $(".match-featured").hide();
	            }
	        });
	    }
	    $(document).ready(function() {
	        $(".match-featured").hide();
	        var matchSwiper = new Swiper('.match-featured-slide', {
	                            // autoplay: 3000,
	                            effect: 'slide',
	                            speed: 700,
	                            direction: 'horizontal',
	                            paginationClickable: true,
	                            nextButton: '.swiper-button-next',
	                            prevButton: '.swiper-button-prev',
	                        });
	        hotmatch(matchSwiper);//
	        // setInterval(function() {
	        //     hotmatch(matchSwiper);
	        // }, 100000);
	        
	    });
	    (function(){
	      $('.carousel-showmanymoveone .item').each(function(){
	        var itemToClone = $(this);

	        for (var i=1;i<4;i++) {
	          itemToClone = itemToClone.next();

	          // wrap around if at end of item collection
	          if (!itemToClone.length) {
	            itemToClone = $(this).siblings(':first');
	          }

	          // grab item, clone, add marker class, add to collection
	          itemToClone.children(':first-child').clone()
	            .addClass("cloneditem-"+(i))
	            .appendTo($(this));
	        }
	      });
	    }());
	</script>
    
@endsection

@section('footerJS')

	<script type="text/javascript">

	</script>
@endsection
