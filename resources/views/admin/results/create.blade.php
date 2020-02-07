@extends('adminlte::page')



@section('title', 'Create Result')



@section('content_header')
@section('css')
    <link href="{{ asset('vendor/select2/css/select2.min.css') }}" rel="stylesheet" />
    <style>
        .select2-container {
            width: 100% !important;
            padding: 0;
        }
        .select2-container .select2-selection--single {
            height: 38px;
        }
    </style>
@endsection
@section('js')
    <script src="{{ asset('vendor/select2/js/select2.min.js') }}"></script>
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
                    })
                    .fail(function(jqXHR, ajaxOptions, thrownError)
                    {
                        console.log('server not responding...');
                    });
            });
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
                        <form class="form" method="post" enctype="multipart/form-data" action="/admin/results/add" role="form" autocomplete="off">
                            @csrf

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Result Date</label>
                                <div class="col-lg-9">
                                    <input class="form-control" name="date" type="datetime-local" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Select Region</label>
                                <div class="col-lg-9">

                                    <select class="region" name="region">
                                        <option>Select Region</option>
                                        @foreach($region as $val)
                                            {{--{{ print_r($val) }}--}}
                                        <option value="{{ $val->lottery_region }}" >{{ $val->lottery_region }}</option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Select Region</label>
                                <div class="col-lg-9">

                                    <select class="company" name="company">
                                        <option>Select Company</option>
                                    </select>
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
