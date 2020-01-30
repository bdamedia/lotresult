                      <table class="table_style" >
                        <tr style="background-color:white">
                          <th class="th_style" style=" ">Special</th>
                          <th class="th_style" style=" ">Time Appears > 1 </th>
                        </tr>
                        <?php foreach ($special as $key=>$value) { ?>
                        <tr>
                          <?php if($value>1){ ?>
                          <td class="td_style">{{$key}}</td>
                          <td class="td_style">{{$value}}</td>
                          <?php } ?>
                        </tr>
                        <?php } ?>
                      </table>

                      <table class="table_style" id="myList1"  >
                        <tr>
                          <th class="th_style">Bingo</th>
                          <th class="th_style">Time Appears > 2</th>
                        </tr>
                        <?php foreach ($lotto2 as $keys=>$values) { ?>
                        <tr>
                          <?php if($values>1){ ?>
                          <td class="td_style">{{$keys}}</td>
                          <td class="td_style">{{$values}}</td>
                          <?php } ?>
                        </tr>
                        <?php } ?>
                      </table>
                        <div style="float:left">
                            <table class="table_style" style="margin-right:10px; margin-top: 25px">
                              <tr>
                                <th class="th_style">Not appear in special</th>
                              </tr>
                              <tr>
                                <td class="td_style">
                                  <?php foreach ($NotappearspecialLotto2digits as $digitNotApearSpecialLot3) { ?>{{$digitNotApearSpecialLot3}},
                                  <?php } ?>
                                </td>
                              </tr>
                            </table>
                            
                            <table class="table_style" style="margin-left: -11px; margin-top: 25px">
                              <tr>
                                <th class="th_style">Not appear in lotto 2  </th>
                              </tr>
                              <tr>
                                <td class="td_style">
                                  <?php foreach ($digitNotApearInLot2 as $digitNotApearLot3) { ?>{{$digitNotApearLot3}},
                                  <?php } ?>
                                </td>
                              </tr>
                            </table>
                      </div>
<style type="text/css">
    #myList1 tr{ display:none;
  }
  #loadMore {
      color:green;
      cursor:pointer;
  }
  #loadMore:hover {
      color:black;
  }
  #showLess {
      color:red;
      cursor:pointer;
  }
  #showLess:hover {
      color:black;
  }</style>
  <script type="text/javascript"> $(document).ready(function () {
    size_li = $("#myList1 tr").size();
    x=10;
    $('#myList1 tr:lt('+x+')').show();
    $('#loadMore').click(function () {
        x= (x+10 <= size_li) ? x+10 : size_li;
        $('#myList1 tr:lt('+x+')').show();
    });
   
});
    </script></script>