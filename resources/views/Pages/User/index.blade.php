@extends('layouts.main',['page'=>'Users'])

@push('styles')
<link rel="stylesheet" href="{{ asset('theme/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
@endpush

@section('breadcrumbs')
<div class="col-sm-6">
	<h1>Users</h1>
	</div>
	<div class="col-sm-6">
	<ol class="breadcrumb float-sm-right">
		<li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
		<li class="breadcrumb-item active">Users</li>
	</ol>
</div>
@endsection

<div class="row mb-2">
	
</div>

@section('content')
<div class="row">
	<div class="col-12">
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">User Table</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Id</th>
              <th>Name</th>
              <th>Email</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
              @foreach($users as $key => $val)
              <tr>
                  <td>{{{$val['id']}}}</td>
                  <td>{{{$val['name']}}}</td>
                  <td>{{{$val['email']}}}</td>
                  <td><a href="{{url('user/show?id='.$val['id'])}}"><i class="far fa-edit" data-tooltip="tooltip" title="Edit"></a></i><i style="margin-left: 5px"class="far fa-trash-alt delete-icon"  data-tooltip="tooltip" title="Delete" data-toggle="modal" data-user-id="{{{$val['id']}}}"  data-user-name="{{{$val['name']}}}" data-target="#modal-sm"></i></td>
              </tr>
              @endforeach
            </tbody>
          </table>
          <div class="card-footer">
          <a href="{{url('user/create')}}"> 
            <button type="button" class="btn btn-primary">Create</button>
          </a>
          </div> 
        </div>
    </div>
	</div>
</div>
<!---   Delete Modal--->
<div class="modal fade" id="modal-sm" data-user-id="">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Small Modal</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> 
      <div class="modal-body">
        <p> are you sure you want to delete?</p>
      <form class="form-horizontal"action="{{ url('user/delete')}}" method="post">
      {{ csrf_field() }}
        <input type="hidden" class="form-control" id="delete-id" name="id">
        <div class="form-group row">
            <div class="col-sm-10">
                <input type="text" class="form-control" id="delete-name" readonly>
            </div>
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Delete</button>
      </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!---  End of Delete Modal--->
@endsection
@push('scripts')
<script src="{{ asset('theme/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('theme/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('theme/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('theme/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script>
  $(function () {
    $("#example1").DataTable();

   $('.delete').on('click',function(){
    //  console.log('pasok');
    // console.log($('#modal-sm').val($(this).attr('id')));
   })

  //  $('#modal-sm').on('shown.bs.modal', function () {
  //    console.log($(this).attr('data-user-id'));
  //  })
   $(document).on("click", ".delete-icon", function () {
      $('#delete-name').val($(this).data('user-name'));
      $('#delete-id').val($(this).data('user-id'));
});
  });
</script>
@endpush