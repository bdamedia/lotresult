@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/datatables/css/dataTables.bootstrap4.css') }}">
@endsection

@section('js')
    <script src="{{ asset('vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
    <script type="application/javascript">
        function setDelete($url){
            $('#DeleteForm').attr('action', $url);
            $('#myModal').modal('show');
            return false;
        }
        $(function () {
            $("#usersTable").DataTable();
        });
    </script>
@endsection

@section('js')
    <script type="application/javascript">
        function setDelete($url){
            $('#DeleteForm').attr('action', $url);
            $('#myModal').modal('show');
            return false;
        }
        $(function () {
            $("#usersTable").DataTable();
        });
    </script>
@endsection

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Dashboard</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="col-sm-10 col-sm-offset-1 col-xs-12 table-responsive">

               Name :  {{ $data->name }}
            </br>
                Email : {{ $data->email }}

            </div>
        </div>


@stop
