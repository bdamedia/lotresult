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
                      <select style="line-height: 21px; max-width:49%; display: inline-block" id="timeDuration" name="timeDuration" class="form-control">
                        <option value=10>10</option>
                        <?php for ($i=1; $i<=30; $i++) { ?>
                        <option value={{$i}}>{{$i}}</option>
                        <?php } ?>
                      </select>
                      <select style="line-height: 21px; max-width:49% ; display: inline-block" id="companyName" name="companyName" class="form-control">
                        <option value=''>All</option>
                        <?php foreach ($companyName as $name) { ?>
                        <option value={{$name}}>{{$name}}</option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="btn btn-red-blue-lite form-group fetchResult" title="Result" value="Submit"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Result</font></font>
                    </div>
                  </form>
                  <div style="display:block; width:100%; margin-left: 0px">
                    <div style="margin:0 auto; width:100%;">
                      <table id="special" class="table_style special display" style="margin-right:10px;">
                      </table>

                      <table id="lot3" class="table_style lot3 display" style="margin-left: -11px;">
                      </table>
                      <div id="load_more">
                        <button style="margin-top: 10px; width: 98%; background-color: #cd0000; border: 0px; height: 40px; color: white">Load more</button>
                      </div>

                      <table class="table_style specialNotYet" style="margin-right:10px; margin-top: 10px">
                      </table>

                      <table class="table_style lot3NotYet" style="margin-left: -11px; margin-top: 10px">
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
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
<script type="text/javascript">
  $( document ).ready(function() {
    var limit = 1;
    var companyName = '';
    var duration = 10;
    getLotDetail(companyName, duration, limit);
    $('#load_more').on('click', function(){
      console.log("ksdifgs");
      limit += 1;
      getLotDetail(companyName, duration, limit);
    })
    $('.fetchResult').on('click', function(){
      companyName = $('#companyName').val();
      duration = $('#timeDuration').val();

      getLotDetail(companyName, duration, limit=1);
    })

    function getLotDetail(companyName,duration,limit){
      console.log(companyName);
      console.log(duration);
      console.log(limit);
      var special = '';
      var lot3 = '';
      var specialNotYet = '';
      var lot3NotYet = '';
      $.ajax({
        url:"/lot3-statistics-details",
        type:"GET",
        data:{'companyName' : companyName, 'duration' : duration, 'limit' : limit},
        success: function(resp){

          special += '<thead> <tr style="background-color:white">'+
                      '<th class="th_style" style=" ">Especially</th>'+
                      '<th class="th_style" style=" ">Times</th>'+
                    '</tr> </thead><tbody>'
          for (const [key, value] of Object.entries(resp.special)) {
            special += '<tr>';
            if (value>1) 
              special += '<td class="td_style">'+key+'</td>'+
                        '<td class="td_style">'+value+'</td>'+
                        '</tr>'
                          
          }
          special += '</tbody>'
          $('.special').html(special);

          lot3 += '<thead><tr>'+
                    '<th class="th_style">Bingo</th>'+
                    '<th class="th_style">Times</th>'+
                  '</tr></thead><tbody>'
          for (const [key, value] of Object.entries(resp.lot3)) {
            lot3 += '<tr>';
            if (value>1) 
              lot3 += '<td class="td_style">'+key+'</td>'+
                        '<td class="td_style">'+value+'</td>'+
                        '</tr>'
                          
          }
          lot3 += '</tbody>'
          $('.lot3').html(lot3);

          specialNotYet += '<tr><th class="th_style">Especially not yet</th></tr>'
          specialNotYet += '<td class="td_style">'
          for (const [key, value] of Object.entries(resp.digitNotApearInSpecialLot3)) {
            specialNotYet += value+" ";
            // specialNotYet += '<span class="badge badge-secondary" style="background-color:#cc2c1c">'
            // specialNotYet += value;
            // specialNotYet+= '</span>'
          }
          specialNotYet += '</td>';
          // specialNotYet += '<tr style="margin-top: 10px ">'+
          //                     '<td class="" >'+
          //                       '<a id="loadmore" data-page="1" onclick="loadMoreData()" href="javascript:void(0);">'+
          //                       '<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">see more</font></font></a>'+
          //                     '</td>'+
          //                   '</tr>';
          $('.specialNotYet').html(specialNotYet);

          lot3NotYet += '<tr><th class="th_style">Lot has not returned</th></tr>'
          lot3NotYet += '<td class="td_style">'
          for (const [key, value] of Object.entries(resp.digitNotApearInLot3)) {
            lot3NotYet += value+" ";
            // lot3NotYet += '<span class="badge badge-secondary">'
            // lot3NotYet += value;
            // lot3NotYet+= '</span>'
          }
          lot3NotYet += '</td>';
          // lot3NotYet += '<tr><td class="" style="margin-top: 10px; border-left: 1px solid #c1c1c1">'+
          //                 '<a id="loadmore" data-page="1" onclick="loadMoreData()" href="javascript:void(0);"><font style="vertical-align: inherit;">'+
          //                 '<font style="vertical-align: inherit;">see skdfhvg</font></font></a>'+
          //             '</td></tr>'
          $('.lot3NotYet').html(lot3NotYet);
        },
        error: function(resp){

        }
      })
    }

  });
</script>>
