@extends('adminlte::page')



@section('title', 'Edit News')



@section('content_header')
@section('js')
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        var content = document.getElementById("content");
        CKEDITOR.replace(content,{
            language:'en-gb'
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
                        <h4>News Information</h4>
                    </div>
                    <div class="card-body">
                       {{-- <form class="form" method="post" enctype="multipart/form-data" action="/admin/news/update" role="form" autocomplete="off">--}}

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Title</label>
                                <div class="col-lg-9">
                                    {{ $data['title'] }}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Slug</label>
                                <div class="col-lg-9">
                                {{ url('/') }}/tin-xo-so/{{ $data['news_slug'] }}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Content</label>
                                <div class="col-lg-9">
                                    {!! html_entity_decode($data['content']) !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Image</label>
                                <div class="col-lg-9">
                                    <div class="col-md-4"><img style="width: 40%;" src="{{ asset('images/'.$data['image']) }}"></div>
                                </div>

                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Meta Title</label>
                                <div class="col-lg-9">
                                    {{ $data['meta_title'] }}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Meta Keywords</label>
                                <div class="col-lg-9">
                                    {{ $data['meta_keywords'] }}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Meta Description</label>
                                <div class="col-lg-9">
                                    {{ $data['meta_description'] }}
                                </div>
                            </div>

                       {{-- </form>--}}
                    </div>
                </div>

            </div>
        </div>



        @stop


        @section('js')


            <script> console.log('Hi!'); </script>

@stop
