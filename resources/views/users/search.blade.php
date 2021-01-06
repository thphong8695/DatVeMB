@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Users Management</h2>
        </div>
        
        
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('users.create') }}"> Thêm mới</a>
        </div>
    </div>
    <form action="{{route('Search')}}" method="get">
    <div class="col-lg-12 margin-tb">
      <div class="pull-right">
        <input type="submit" class="btn btn-success" value="Tìm">
      </div>
      <div class="pull-right">
          <input type="text" name="key" class="form-control" {{-- onkeyup="myFunction()" --}} placeholder="Search for username.." title="Type in a name">      
          
      </div>
    </div>
    </form>
</div>


@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif
@if(session('flash_err'))
<div class="alert alert-danger">
    <strong>Cảnh Báo! </strong>{{ session('flash_err') }}
</div>
@endif

<table class="table table-bordered" id="myTable">
 <tr>
   <th>No</th>
   <th>Name</th>
   
   <th>User Name</th>
   <th>Email</th>
   <th>Roles</th>
   <th width="280px">Action</th>
 </tr>
 @foreach ($data_search as $key => $user)
  <tr>
    <td>{{ ++$i }}</td>
    <td>{{ $user->name }}</td>
    <td>{{ $user->username }}</td>
    <td>{{ $user->email }}</td>
    <td>
      @if(!empty($user->getRoleNames()))
        @foreach($user->getRoleNames() as $v)
           <label class="badge badge-success">{{ $v }}</label>
        @endforeach
      @endif
    </td>
    <td>
       <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
       <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
        {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    </td>
  </tr>
 @endforeach
</table>
<div class="row">
  <div class="col-lg-4">
      <form action="{{ route('importUser') }}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                <input type="file" name="file" class="form-control" required="">
                <br>
                <button class="btn btn-success">Import Data</button>
                
      </form>
  </div>
</div>
{{-- <script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script> --}}
{{-- {!! $data_search->render() !!} --}}
@endsection
