@extends('adminlte::page')



@section('title', 'Create News')



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
                        <form class="form" method="post" enctype="multipart/form-data" action="/admin/news/store" role="form" autocomplete="off">
                            @csrf
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Title</label>
                                <div class="col-lg-9">
                                    <input class="form-control" name="title" type="text" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Content</label>
                                <div class="col-lg-9">
                                    <textarea class="form-control" id="content" name="content" ></textarea>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Image</label>
                                <div class="col-lg-9">
                                    <input class="form-control1" name="image" type="file">
                                </div>
                            </div>
                            <div class="form-group row">
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
                            </div>
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

    <script> console.log('Hi!'); </script>

@stop
