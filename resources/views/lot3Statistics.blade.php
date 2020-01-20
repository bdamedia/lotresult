@include('header')
<div class="main-content home">
    <div class="container">
        <div class="row margin-b">
          <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="row">
              @include('todayResult')
              <div class="margin-40 col-md-12">
                <div>
                  <div id="u130" class="ax_default box_2" style="border: 1px solid #a09c9c; margin-top: 30px">
                    <div id="u130_text" class="text ">
                      <p><span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Lot statistics</font></font></font></font></span>
                      </p>
                    </div>
                  </div>
                  <form method="post" action="/lot3-statistics" enctype="multipart/form-data" style="margin-left: 5px; margin-top: 30px">{{ csrf_field() }}
                    <div class="form-group">
                      <select style="line-height: 21px; max-width:49%; display: inline-block" id="time_duration" name="time_duration" class="form-control">
                        <option value=10>10</option>
                        <?php for ($i=1; $i<=30; $i++) { ?>
                        <option value={{$i}}>{{$i}}</option>
                        <?php } ?>
                      </select>
                      <select style="line-height: 21px; max-width:49% ; display: inline-block" id="companyName" name="companyName" class="form-control">
                        <?php foreach ($companyName as $name) { ?>
                        <option value={{$name}}>{{$name}}</option>
                        <?php } ?>
                      </select>
                    </div>
                    <button type="submit" class="btn btn-red-blue-lite form-group" title="Result" value="Submit"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Result</font></font>
                    </button>
                  </form>
                  <div style="display:block; width:100%; margin-left: 0px">
                    <div style="margin:0 auto; width:100%;">
                      <table class="table_style" style="margin-right:10px;">
                        <tr style="background-color:white">
                          <th class="th_style" style=" ">Especially</th>
                          <th class="th_style" style=" ">Times</th>
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
                      <table class="table_style" style="margin-left: -11px;">
                        <tr>
                          <th class="th_style">Bingo</th>
                          <th class="th_style">Times</th>
                        </tr>
                        <?php foreach ($lot3 as $keys=>$values) { ?>
                        <tr>
                          <?php if($values>1){ ?>
                          <td class="td_style">{{$keys}}</td>
                          <td class="td_style">{{$values}}</td>
                          <?php } ?>
                        </tr>
                        <?php } ?>
                      </table>
                      <table class="table_style" style="margin-right:10px; margin-top: 10px">
                        <tr>
                          <th class="th_style">Especially not yet</th>
                        </tr>
                        <tr>
                          <td class="td_style">
                            <?php foreach ($digitNotApearInSpecialLot3 as $digitNotApearSpecialLot3) { ?>{{$digitNotApearSpecialLot3}},
                            <?php } ?>
                          </td>
                        </tr>
                      </table>
                      <table class="table_style" style="margin-left: -11px; margin-top: 10px">
                        <tr>
                          <th class="th_style">Lot has not returned</th>
                        </tr>
                        <tr>
                          <td class="td_style">
                            <?php foreach ($digitNotApearInLot3 as $digitNotApearLot3) { ?>{{$digitNotApearLot3}},
                            <?php } ?>
                          </td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @include('sidebar')
        </div>
    </div>
</div>
@include('footer')
