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
                @if($data->count())
                    <table id="usersTable" class="table table-bordered table-striped" data-order='[[ 0, "desc" ]]' data-page-length='25'>
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $count = 1; @endphp

                        @foreach($data as $user)
                        <tr>
                            <td>{{ $count }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td class="has-action">
                                <a href="/admin/user/{{ $user->id }}" title="Show Details"><i class="far fa-eye"></i></a>
                                <a href="/admin/user/{{ $user->id }}/edit" title="Edit"><i class="far fa-edit"></i></a>
                                <a href="javascript:void(0)" title="Delete" onclick="setDelete('/admin/user/{{ $user->id }}')"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        @php $count++; @endphp
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <div class="alert alert-warning">
                        You don't have any data here
                    </div>
                @endif

        </div>
    </div>

        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-trash-o" aria-hidden="true"></i> Close</h4>
                    </div>
                    <div class="modal-body">
                        Are you sure ?
                        <form id="DeleteForm" action="" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-danger" onclick="$('#DeleteForm').submit()"><i class="fa fa-times-circle-o" aria-hidden="true"></i> Confirm</button>
                    </div>
                </div>
            </div>
        </div>
@stop

