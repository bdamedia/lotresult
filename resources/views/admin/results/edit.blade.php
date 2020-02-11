@extends('adminlte::page')



@section('title', 'Create Result')



@section('content_header')
@section('plugins.Select2', true)
@section('plugins.Sweetalert2', true)
@section('css')
    <link rel="stylesheet" href="{{ asset('css/tagsinput.css') }}">
    <style>
        .select2-container {
            width: 100% !important;
            padding: 0;
        }
        .select2-container .select2-selection--single {
            height: 38px;
        }
        .bootstrap-tagsinput .badge {
            margin: 4px 2px;
            padding: 8px 8px;
        }
    </style>
@endsection
@section('js')
    <script type="text/javascript" src="{{ URL::asset('js/tagsinput.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.region').select2();
            $('.company').select2();
            $('.region').on('select2:select', function (e) {
                var data1 = e.params.data;
                // console.log(data);
                $.ajax(
                    {
                        url: '@php echo route('results_ajax');  @endphp',
                        type: "post",
                        data: {'region':data1.text,'day':$('input[name=date]').val()},
                        headers: {
                            'X-CSRF-TOKEN': '@php echo csrf_token(); @endphp',
                        },
                    })
                    .done(function(data)
                    {
                        var $options = $();
                        for (var i in data) {
                            $options = $options.add(
                                $('<option>').attr('value', data[i].lottery_company).html(data[i].lottery_company_names)
                            );
                        }
                        $('.company').html($options).trigger('change');
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Your work has been saved',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    })
                    .fail(function(jqXHR, ajaxOptions, thrownError)
                    {
                        console.log('server not responding...');
                    });
            });
        });

        $('#prize-1').tagsinput();
        $('.inputTage').tagsinput();

        $('#prize-9').on('beforeItemAdd', function(event) {
            var tag = event.item;
            if ($.isNumeric(tag)) {
            }else{
                event.cancel = true;
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'Only Numeric value is Valid.',
                    showConfirmButton: false,
                    timer: 1500
                })
            }
        });

        $('#prize-2').on('beforeItemAdd', function(event) {
            var tag = event.item;
            if ($.isNumeric(tag)) {
            }else{
                event.cancel = true;
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'Only Numeric value is Valid.',
                    showConfirmButton: false,
                    timer: 1500
                })
            }
        });

        $('#prize-3').on('beforeItemAdd', function(event) {
            var tag = event.item;
            if ($.isNumeric(tag)) {
            }else{
                event.cancel = true;
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'Only Numeric value is Valid.',
                    showConfirmButton: false,
                    timer: 1500
                })
            }
        });

        $('#prize-4').on('beforeItemAdd', function(event) {
            var tag = event.item;
            if ($.isNumeric(tag)) {
            }else{
                event.cancel = true;
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'Only Numeric value is Valid.',
                    showConfirmButton: false,
                    timer: 1500
                })
            }
        });

        $('#prize-5').on('beforeItemAdd', function(event) {
            var tag = event.item;
            if ($.isNumeric(tag)) {
            }else{
                event.cancel = true;
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'Only Numeric value is Valid.',
                    showConfirmButton: false,
                    timer: 1500
                })
            }
        });

        $('#prize-6').on('beforeItemAdd', function(event) {
            var tag = event.item;
            if ($.isNumeric(tag)) {
            }else{
                event.cancel = true;
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'Only Numeric value is Valid.',
                    showConfirmButton: false,
                    timer: 1500
                })
            }
        });

        $('#prize-7').on('beforeItemAdd', function(event) {
            var tag = event.item;
            if ($.isNumeric(tag)) {
            }else{
                event.cancel = true;
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'Only Numeric value is Valid.',
                    showConfirmButton: false,
                    timer: 1500
                })
            }
        });

        $('#prize-8').on('beforeItemAdd', function(event) {
            var tag = event.item;
            if ($.isNumeric(tag)) {
            }else{
                event.cancel = true;
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'Only Numeric value is Valid.',
                    showConfirmButton: false,
                    timer: 1500
                })
            }
        });

    </script>

@endsection

@stop



@section('content')
    <div class="row">
        <div class="col-12">
            <div class="col-sm-10 col-sm-offset-1 col-xs-12 ">

                <div class="card">
                    <div class="card-header">
                        <h4>New Result</h4>
                    </div>
                    <div class="card-body">
                        <form class="form" method="post" enctype="multipart/form-data" action="/admin/results/{{ $data->id }}/edit" role="form" autocomplete="off">
                            @csrf

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Result Date</label>
                                <div class="col-lg-9">
                                    <input class="form-control" datetimeformat="dd/MM/y, HH:mm" name="date" value="{{ $data->result_day_time->toDateTime()->format('Y-m-d') }}" type="date" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Select Region</label>
                                <div class="col-lg-9">

                                    <select class="region" name="region">
                                        <option>Select Region</option>
                                        @foreach($region as $val)
                                            <option @php if($data->lottery_region == $val->lottery_region ){ echo "selected"; } @endphp value="{{ $val->lottery_region }}" >{{ $val->lottery_region }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Select Company</label>
                                <div class="col-lg-9">
                                @php $a=''; $res = getResultRegionByDayCompany($data->result_day_time->toDateTime()->format('l'),strtoupper($data->lottery_region));  @endphp
                                    <select class="company" name="company">
                                        @foreach($res as $val1)
                                            @php
                                                if($data->lottery_region == 'Vietlott'){ @endphp
                                                    <option @php  if($data->lottery_company == str_replace('Xổ Số','XS',$val1->lottery_company_name)){ echo "selected"; } @endphp value="{{ $val1->lottery_company }}" >{{ $val1->lottery_company_names }}</option>

                                            @php
                                            }else{
                                            @endphp
                                            <option @php  if(strtoupper($data->lottery_company) == strtoupper($val1->lottery_company)){ echo "selected"; } @endphp value="{{ $val1->lottery_company }}" >{{ $val1->lottery_company_names }}</option>
                                            @php
                                            }

                                            @endphp
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Add Input for Prize 1</label>
                                <div class="col-lg-9">
                                    @php if($data->prize_1){
                                             $p1 =  json_decode($data->prize_1);
                                    }
                        $a='';
if(is_array((array) $p1) && count((array)$p1) > 0){
    foreach($p1 as $p1v){
         foreach($p1v as $p1av){
            $a = $a.','.$p1av;
        }
    }
}else{
  //  $a = $p1v;
}  @endphp
                                    <input type="text" id="prize-1" name="prize-1" data-role="tagsinput" value="{{ $a }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Add Input for Prize 2</label>
                                <div class="col-lg-9">
                                    @php if($data->prize_2){
                                             $p1 =  json_decode($data->prize_2);
                                    }
                        $a='';
if(is_array((array) $p1) && count((array)$p1) > 0){
    foreach($p1 as $p1v){
         foreach($p1v as $p1av){
            $a = $a.','.$p1av;
        }
    }
}else{
  //  $a = $p1v;
}  @endphp
                                    <input type="text" class="inputTage" id="prize-2" name="prize-2" data-role="tagsinput" value="{{ $a }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Add Input for Prize 3</label>
                                <div class="col-lg-9">
                                    @php if($data->prize_3){
                                             $p1 =  json_decode($data->prize_3);
                                    }
                        $a='';
if(is_array((array) $p1) && count((array)$p1) > 0){
    foreach($p1 as $p1v){
         foreach($p1v as $p1av){
            $a = $a.','.$p1av;
        }
    }
}else{
  //  $a = $p1v;
}  @endphp
                                    <input type="text" class="inputTage" id="prize-3" name="prize-3" data-role="tagsinput" value="{{ $a }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Add Input for Prize 4</label>
                                <div class="col-lg-9">
                                    @php if($data->prize_4){
                                             $p1 =  json_decode($data->prize_4);
                                    }
                        $a='';
if(is_array((array) $p1) && count((array)$p1) > 0){
    foreach($p1 as $p1v){
         foreach($p1v as $p1av){
            $a = $a.','.$p1av;
        }
    }
}else{
  //  $a = $p1v;
}  @endphp
                                    <input type="text" class="inputTage" id="prize-4" name="prize-4" data-role="tagsinput" value="{{ $a }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Add Input for Prize 5</label>
                                <div class="col-lg-9">
                                    @php if($data->prize_5){
                                             $p1 =  json_decode($data->prize_5);
                                    }
                        $a='';
if(is_array((array) $p1) && count((array)$p1) > 0){
    foreach($p1 as $p1v){
         foreach($p1v as $p1av){
            $a = $a.','.$p1av;
        }
    }
}else{
  //  $a = $p1v;
}  @endphp
                                    <input type="text" class="inputTage" id="prize-5" name="prize-5" data-role="tagsinput" value="{{ $a }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Add Input for Prize 6</label>
                                <div class="col-lg-9">
                                    @php if($data->prize_6){
                                             $p1 =  json_decode($data->prize_6);
                                    }
                        $a='';
if(is_array((array) $p1) && count((array)$p1) > 0){
    foreach($p1 as $p1v){
         foreach($p1v as $p1av){
            $a = $a.','.$p1av;
        }
    }
}else{
  //  $a = $p1v;
}  @endphp
                                    <input type="text" class="inputTage" id="prize-6" name="prize-6" data-role="tagsinput" value="{{ $a }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Add Input for Prize 7</label>
                                <div class="col-lg-9">
                                    @php if($data->prize_7){
                                             $p1 =  json_decode($data->prize_7);
                                    }
                        $a='';
if(is_array((array) $p1) && count((array)$p1) > 0){
    foreach($p1 as $p1v){
         foreach($p1v as $p1av){
            $a = $a.','.$p1av;
        }
    }
}else{
  //  $a = $p1v;
}  @endphp
                                    <input type="text" class="inputTage" id="prize-7" name="prize-7" data-role="tagsinput" value="{{ $a }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Add Input for Prize 8</label>
                                <div class="col-lg-9">
                                    @php if($data->prize_8){
                                             $p1 =  json_decode($data->prize_8);
                                    }
                        $a='';
if(is_array((array) $p1) && count((array)$p1) > 0){
    foreach($p1 as $p1v){
         foreach($p1v as $p1av){
            $a = $a.','.$p1av;
        }
    }
}else{
  //  $a = $p1v;
}  @endphp
                                    <input type="text" class="inputTage" id="prize-8" name="prize-8" data-role="tagsinput" value="{{ $a }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Add Input for Prize 9</label>
                                <div class="col-lg-9">
                                    @php if($data->prize_9){
                                             $p1 =  json_decode($data->prize_9);
                                    }
                        $a='';
if(is_array((array) $p1) && count((array)$p1) > 0){
    foreach($p1 as $p1v){
         foreach($p1v as $p1av){
            $a = $a.','.$p1av;
        }
    }
}else{
  //  $a = $p1v;
}  @endphp
                                    <input type="text" id="prize-9" name="prize-9" data-role="tagsinput" value="{{ $a }}">
                                </div>
                            </div>

                            {{--<div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Meta Title</label>
                                <div class="col-lg-9">
                                    <input class="form-control" name="meta_title" type="text">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Meta Keywords</label>
                                <div class="col-lg-9">
                                    <input class="form-control" name="meta_keywords" type="text">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Meta Description</label>
                                <div class="col-lg-9">
                                    <textarea class="form-control" name="meta_description" ></textarea>
                                </div>
                            </div>--}}
                            <div class="form-group row">
                                <div class="col-lg-12 text-center">
                                    <input type="reset" class="btn btn-secondary" value="Cancel">
                                    <input type="submit" class="btn btn-primary"
                                           value="Save Changes">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>



        @stop


        @section('js')

            <script> console.log('Hi!');
            </script>

@stop
