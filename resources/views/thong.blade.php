@include('header')
<div class="main-content">
    <div class="container">
        <div class="row margin-b">
            <div class="col-xs-12 col-sm-12 col-md-6">

                <div class="row">
                    <div class="col-xs-12 {{ $region }}">
                        <div class="block">

                            <!-- tiêu đề chính -->
                            <div class="block-main-heading">
                                <h1>Thống kê lô gan</h1>
                            </div>
                            
                           <!--  <div class="block-main-heading col-md-12">
                                <div class="radio">
                                    <label class="text-blue">
                                        <input type="radio" name="optionsTK" id="optionsTK1" value="/thung/thong-ke-gan-cuc-dai" checked> Thống kê theo tỉnh
                                    </label>
                                </div>
                                <div class="radio">
                                    <label class="text-blue">
                                        <input type="radio" name="optionsTK" id="optionsTK2" value="/thung/thong-ke-gan-theo-loto"> Thống kê theo số/ dãy số
                                    </label>
                                </div>
                            </div> -->
                            <!-- form thong ke -->

                            <div class="form-statistic">
                                <p class="text-black-bold">Chọn tỉnh và biên độ cần xem</p>
                                <div class="form-inline">

                                    <select class="form-control form-group width-auto" id="ddlDayOfWeeks" required="required" onchange="DayOfWeekChange(this.value)">
                                        <option value="thu-hai">Thứ hai</option>
                                        <option value="thu-ba">Thứ ba</option>
                                        <option value="thu-tu">Thứ tư</option>
                                        <option value="thu-nam">Thứ năm</option>
                                        <option value="thu-sau">Thứ sáu</option>
                                        <option value="thu-bay">Thứ bảy</option>
                                        <option value="chu-nhat">Chủ Nhật</option>
                                    </select>


                                    <select class="form-control form-group width-auto" id="ddLotteries" required="required">
                                        <option value="0" selected>--Select Company--</option>
                                       <!--  <option value="0" selected>Miền Bắc</option>
                                        <option value="20">An Giang</option>
                                        <option value="21">T&#226;y Ninh</option>
                                        <option value="22">B&#236;nh Thuận</option>
                                        <option value="38">B&#236;nh Định</option>
                                        <option value="39">Quảng B&#236;nh</option>
                                        <option value="40">Quảng Trị</option> -->
                                    </select>

                                    <input type="text" id="txtRollingNumbsers" class="form-control form-group width-auto" value="" required="required" placeholder="Biên độ" size="10" />
                                    <button style="margin-top:5px;" type="submit" id="btSearch" onclick="btSearch_Click();" class="btn btn-red">Kết quả</button>
                                </div>
                            </div>
                            <!-- nội dung block -->

                            <div class="block-main-content statistic" id="ajaxContentTableAbove">
                                <!--nội dung số lần xuất hiện nhiều nhất-->
                                <!-- <div class="col-md-12 col-xs-12 input-group">
                                    <h2 class="title-h2"><span style="margin: 0 10px;">TK lô gan miền Bắc thứ 5, 09/01/2020</span></h2>
                                </div>
                                <table class="table table-bordered table-lanxh text-center">
                                    <thead>
                                        <tr>
                                            <th>Lô tô gan</th>
                                            <th>Số ngày chưa về</th>
                                            <th>Ngày về gần nhất</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <td class="col-xs-2 text-bold">24</td>
                                            <td class="col-xs-4"><span class="text-red">14</span> ngày</td>
                                            <td class="col-xs-6">25/12/2019</td>
                                        </tr>

                                        <tr>
                                            <td class="col-xs-2 text-bold">80</td>
                                            <td class="col-xs-4"><span class="text-red">11</span> ngày</td>
                                            <td class="col-xs-6">28/12/2019</td>
                                        </tr>

                                        <tr>
                                            <td class="col-xs-2 text-bold">65</td>
                                            <td class="col-xs-4"><span class="text-red">11</span> ngày</td>
                                            <td class="col-xs-6">28/12/2019</td>
                                        </tr>

                                        <tr>
                                            <td class="col-xs-2 text-bold">96</td>
                                            <td class="col-xs-4"><span class="text-red">10</span> ngày</td>
                                            <td class="col-xs-6">29/12/2019</td>
                                        </tr>

                                        <tr>
                                            <td class="col-xs-2 text-bold">26</td>
                                            <td class="col-xs-4"><span class="text-red">10</span> ngày</td>
                                            <td class="col-xs-6">29/12/2019</td>
                                        </tr>

                                        <tr>
                                            <td class="col-xs-2 text-bold">57</td>
                                            <td class="col-xs-4"><span class="text-red">9</span> ngày</td>
                                            <td class="col-xs-6">30/12/2019</td>
                                        </tr>

                                        <tr>
                                            <td class="col-xs-2 text-bold">40</td>
                                            <td class="col-xs-4"><span class="text-red">9</span> ngày</td>
                                            <td class="col-xs-6">30/12/2019</td>
                                        </tr>

                                        <tr>
                                            <td class="col-xs-2 text-bold">22</td>
                                            <td class="col-xs-4"><span class="text-red">9</span> ngày</td>
                                            <td class="col-xs-6">30/12/2019</td>
                                        </tr>

                                    </tbody>
                                </table> -->


                                <!--
                                <div class="col-md-12 col-xs-12 input-group">
                                    <p style=" border-top: 1px double #e8e8e8;"><span style="margin: 0 10px;">DANH SÁCH LOTO GAN CỰC ĐẠI TỪ 10-12-2019 ĐẾN NAY</span></p>
                                </div>

                                <div class='table-responsive mgt10'>
                                    <table class="table table-bordered table-lanxh text-center">
                                        <tbody>
                                            <tr class="tr-black">
                                                <td>Loto</td>
                                                <td class="pd5">00</td>
                                                <td class="pd5">01</td>
                                                <td class="pd5">02</td>
                                                <td class="pd5">03</td>
                                                <td class="pd5">04</td>
                                                <td class="pd5">05</td>
                                                <td class="pd5">06</td>
                                                <td class="pd5">07</td>
                                                <td class="pd5">08</td>
                                                <td class="pd5">09</td>
                                                <td class="pd5">10</td>
                                                <td class="pd5">11</td>
                                                <td class="pd5">12</td>
                                                <td class="pd5">13</td>
                                                <td class="pd5">14</td>
                                                <td class="pd5">15</td>
                                                <td class="pd5">16</td>
                                                <td class="pd5">17</td>
                                                <td class="pd5">18</td>
                                                <td class="pd5">19</td>

                                            </tr>
                                            <tr>
                                                <td>Ngày cực đại</td>

                                                <td class="pd5">11</td>

                                                <td class="pd5">5</td>

                                                <td class="pd5">16</td>

                                                <td class="pd5">20</td>

                                                <td class="pd5">10</td>

                                                <td class="pd5">14</td>

                                                <td class="pd5">8</td>

                                                <td class="pd5">11</td>

                                                <td class="pd5">5</td>

                                                <td class="pd5">14</td>

                                                <td class="pd5">14</td>

                                                <td class="pd5">8</td>

                                                <td class="pd5">9</td>

                                                <td class="pd5">12</td>

                                                <td class="pd5">14</td>

                                                <td class="pd5">10</td>

                                                <td class="pd5">13</td>

                                                <td class="pd5">10</td>

                                                <td class="pd5">10</td>

                                                <td class="pd5">9</td>

                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class='table-responsive mgt10'>
                                    <table class="table table-bordered table-lanxh text-center">
                                        <tbody>
                                            <tr class="tr-black">
                                                <td>Loto</td>
                                                <td class="pd5">20</td>
                                                <td class="pd5">21</td>
                                                <td class="pd5">22</td>
                                                <td class="pd5">23</td>
                                                <td class="pd5">24</td>
                                                <td class="pd5">25</td>
                                                <td class="pd5">26</td>
                                                <td class="pd5">27</td>
                                                <td class="pd5">28</td>
                                                <td class="pd5">29</td>
                                                <td class="pd5">30</td>
                                                <td class="pd5">31</td>
                                                <td class="pd5">32</td>
                                                <td class="pd5">33</td>
                                                <td class="pd5">34</td>
                                                <td class="pd5">35</td>
                                                <td class="pd5">36</td>
                                                <td class="pd5">37</td>
                                                <td class="pd5">38</td>
                                                <td class="pd5">39</td>

                                            </tr>
                                            <tr>
                                                <td>Ngày cực đại</td>

                                                <td class="pd5">14</td>

                                                <td class="pd5">10</td>

                                                <td class="pd5">16</td>

                                                <td class="pd5">7</td>

                                                <td class="pd5">12</td>

                                                <td class="pd5">10</td>

                                                <td class="pd5">8</td>

                                                <td class="pd5">7</td>

                                                <td class="pd5">22</td>

                                                <td class="pd5">12</td>

                                                <td class="pd5">9</td>

                                                <td class="pd5">23</td>

                                                <td class="pd5">11</td>

                                                <td class="pd5">20</td>

                                                <td class="pd5">10</td>

                                                <td class="pd5">6</td>

                                                <td class="pd5">10</td>

                                                <td class="pd5">7</td>

                                                <td class="pd5">7</td>

                                                <td class="pd5">9</td>

                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class='table-responsive mgt10'>
                                    <table class="table table-bordered table-lanxh text-center">
                                        <tbody>
                                            <tr class="tr-black">
                                                <td>Loto</td>
                                                <td class="pd5">40</td>
                                                <td class="pd5">41</td>
                                                <td class="pd5">42</td>
                                                <td class="pd5">43</td>
                                                <td class="pd5">44</td>
                                                <td class="pd5">45</td>
                                                <td class="pd5">46</td>
                                                <td class="pd5">47</td>
                                                <td class="pd5">48</td>
                                                <td class="pd5">49</td>
                                                <td class="pd5">50</td>
                                                <td class="pd5">51</td>
                                                <td class="pd5">52</td>
                                                <td class="pd5">53</td>
                                                <td class="pd5">54</td>
                                                <td class="pd5">55</td>
                                                <td class="pd5">56</td>
                                                <td class="pd5">57</td>
                                                <td class="pd5">58</td>
                                                <td class="pd5">59</td>

                                            </tr>
                                            <tr>
                                                <td>Ngày cực đại</td>

                                                <td class="pd5">11</td>

                                                <td class="pd5">13</td>

                                                <td class="pd5">10</td>

                                                <td class="pd5">8</td>

                                                <td class="pd5">12</td>

                                                <td class="pd5">15</td>

                                                <td class="pd5">10</td>

                                                <td class="pd5">8</td>

                                                <td class="pd5">9</td>

                                                <td class="pd5">10</td>

                                                <td class="pd5">11</td>

                                                <td class="pd5">9</td>

                                                <td class="pd5">22</td>

                                                <td class="pd5">20</td>

                                                <td class="pd5">7</td>

                                                <td class="pd5">11</td>

                                                <td class="pd5">16</td>

                                                <td class="pd5">10</td>

                                                <td class="pd5">14</td>

                                                <td class="pd5">9</td>

                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class='table-responsive mgt10'>
                                    <table class="table table-bordered table-lanxh text-center">
                                        <tbody>
                                            <tr class="tr-black">
                                                <td>Loto</td>
                                                <td class="pd5">60</td>
                                                <td class="pd5">61</td>
                                                <td class="pd5">62</td>
                                                <td class="pd5">63</td>
                                                <td class="pd5">64</td>
                                                <td class="pd5">65</td>
                                                <td class="pd5">66</td>
                                                <td class="pd5">67</td>
                                                <td class="pd5">68</td>
                                                <td class="pd5">69</td>
                                                <td class="pd5">70</td>
                                                <td class="pd5">71</td>
                                                <td class="pd5">72</td>
                                                <td class="pd5">73</td>
                                                <td class="pd5">74</td>
                                                <td class="pd5">75</td>
                                                <td class="pd5">76</td>
                                                <td class="pd5">77</td>
                                                <td class="pd5">78</td>
                                                <td class="pd5">79</td>

                                            </tr>
                                            <tr>
                                                <td>Ngày cực đại</td>

                                                <td class="pd5">13</td>

                                                <td class="pd5">8</td>

                                                <td class="pd5">10</td>

                                                <td class="pd5">7</td>

                                                <td class="pd5">12</td>

                                                <td class="pd5">24</td>

                                                <td class="pd5">9</td>

                                                <td class="pd5">21</td>

                                                <td class="pd5">11</td>

                                                <td class="pd5">9</td>

                                                <td class="pd5">22</td>

                                                <td class="pd5">18</td>

                                                <td class="pd5">12</td>

                                                <td class="pd5">11</td>

                                                <td class="pd5">10</td>

                                                <td class="pd5">11</td>

                                                <td class="pd5">7</td>

                                                <td class="pd5">9</td>

                                                <td class="pd5">10</td>

                                                <td class="pd5">10</td>

                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class='table-responsive mgt10'>
                                    <table class="table table-bordered table-lanxh text-center">
                                        <tbody>
                                            <tr class="tr-black">
                                                <td>Loto</td>
                                                <td class="pd5">80</td>
                                                <td class="pd5">81</td>
                                                <td class="pd5">82</td>
                                                <td class="pd5">83</td>
                                                <td class="pd5">84</td>
                                                <td class="pd5">85</td>
                                                <td class="pd5">86</td>
                                                <td class="pd5">87</td>
                                                <td class="pd5">88</td>
                                                <td class="pd5">89</td>
                                                <td class="pd5">90</td>
                                                <td class="pd5">91</td>
                                                <td class="pd5">92</td>
                                                <td class="pd5">93</td>
                                                <td class="pd5">94</td>
                                                <td class="pd5">95</td>
                                                <td class="pd5">96</td>
                                                <td class="pd5">97</td>
                                                <td class="pd5">98</td>
                                                <td class="pd5">99</td>

                                            </tr>
                                            <tr>
                                                <td>Ngày cực đại</td>

                                                <td class="pd5">7</td>

                                                <td class="pd5">6</td>

                                                <td class="pd5">8</td>

                                                <td class="pd5">14</td>

                                                <td class="pd5">6</td>

                                                <td class="pd5">9</td>

                                                <td class="pd5">7</td>

                                                <td class="pd5">7</td>

                                                <td class="pd5">13</td>

                                                <td class="pd5">11</td>

                                                <td class="pd5">9</td>

                                                <td class="pd5">15</td>

                                                <td class="pd5">7</td>

                                                <td class="pd5">14</td>

                                                <td class="pd5">16</td>

                                                <td class="pd5">11</td>

                                                <td class="pd5">11</td>

                                                <td class="pd5">18</td>

                                                <td class="pd5">17</td>

                                                <td class="pd5">10</td>

                                            </tr>
                                        </tbody>
                                    </table>
                                </div> -->

                            </div>
                            <!-- nội dung thong ke lo chua ve-->
                            <!-- end block 3-->
                            <!-- danh sách link -->
                            

                            <!-- <div class="link-statistic">
                                <ul>
                                    <li>Xem thống kê <a href="/cau-mien-bac/cau-bach-thu.html">Cầu bạch thủ miền Bắc</a></li>
                                    <li>Xem thống kê <a href="/thong-ke-lo-gan.html">Lô gan miền Bắc</a></li>
                                    <li>Xem thống kê <a href="/thong-ke-lo-xien.html">Lô xiên miền Bắc</a></li>
                                    <li>Tham khảo <a href="/thong-ke-xsmb-c2579-article.html" title="Thống kê XSMB">Thống kê XSMB</a></li>
                                </ul>
                            </div> -->

                            <hr class="line-header" />

                            <!-- <div class="banner-adv-small">
                                <div class="block-main-content"><span class="link-pad-left textadv">Quảng cáo</span></div>
                                <script type="text/javascript">
                                    if ((window.mobileAndTabletcheck() && 'wap' == 'web') || (window.mobileAndTabletcheck() == false && 'web' == 'web')) {
                                        document.write('<ins class="adsbygoogle"    style="display: inline-block; width: 300px; height: 250px"    data-ad-client="ca-pub-7078400245394460"    data-ad-slot="6567025635"></ins><scr' + 'ipt>    (adsbygoogle = window.adsbygoogle || []).push({});</scr' + 'ipt>');
                                    }
                                </script>
                                <script type="text/javascript">
                                    if ((window.mobileAndTabletcheck() && 'wap' == 'wap') || (window.mobileAndTabletcheck() == false && 'web' == 'wap')) {
                                        document.write('<ins class="adsbygoogle"    style="display: inline-block; width: 300px; height: 250px"    data-ad-client="ca-pub-7078400245394460"    data-ad-slot="6567025635"></ins><scr' + 'ipt>    (adsbygoogle = window.adsbygoogle || []).push({});</scr' + 'ipt>');
                                    }
                                </script>
                            </div> -->

                        </div>
                    </div>
                </div>

                <script type="text/javascript">
                    function btSearch_Click() {
                        var lotteryId = $("#ddLotteries option:selected").val();
                        var rollingNumbers = $("#txtRollingNumbsers").val();
                        var ddlDayOfWeeks = $('#ddlDayOfWeeks').val();
                        var optionText = $("#ddLotteries option:selected").text();
                        if (rollingNumbers == 0 || rollingNumbers == "" || rollingNumbers == null) {
                            rollingNumbers = 30;
                            $("#txtRollingNumbsers").val("30");
                        }
                        $("#ajaxContentTableAbove").html('&nbsp;&nbsp;<img src="/content/images/icon_loading_item.gif"/> Đang tải dữ liệu...');
                        //alert(lotteryId + "-" + rollNumber + "-" + lotteryName);
                        //console.log($('#ddlDayOfWeeks').val());
                        $.ajax({
                            url: '/XSDPThongKeAjax/XSDPTKGanCucDai',
                            data: {
                                lotteryId: lotteryId,
                                rollingNumbers: rollingNumbers,
                                ddlDayOfWeeks: ddlDayOfWeeks,
                                optionText: optionText
                            },
                            type: 'GET',
                            success: function(data) {
                                $("#ajaxContentTableAbove").html(data);
                            }
                        });

                    }

                    function DayOfWeekChange(str) {
                        $.ajax({
                            url: '/thong-ke-xsdp-tinh-theo-thu',
                            data: {
                                strDayOfWeek: str
                            },
                            type: 'GET',
                            success: function(data) {
                                console.log(data);
                                $('#ddLotteries').empty();
                                $("#ddLotteries").append('<option>--Select Company--</option>');
                                if(data) {
                                    $.each(data,function(key,value){
                                        $('#ddLotteries').append($("<option/>", {
                                           value: value.lottery_company,
                                           text: value.lottery_company_names
                                        }));
                                    });
                                }
                                //$("#ddlProvinces").html(data);
                            }
                        });
                    }

                    function checkNumber(value) {
                        var er = /^-?[0-9]+$/;
                        return er.test(value);
                    }
                </script>

                <style>
                    @media screen and (max-width:768px) {
                        .adv-side-bar {
                            display: none !important;
                        }
                    }
                </style>

            </div>

            @include('sidebar')
        </div>
    </div>
</div>
@include('footer')
