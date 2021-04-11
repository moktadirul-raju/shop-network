@extends('admin.layouts.app')
@section('title','All User')
@section('page-title','All User')

@push('css')

@endpush

@section('content')
<div class="col-md-12">
  <form action="{{ route('admin.search-user') }}" method="POST" class="form-inline text-right">
        @csrf
        <div class="form-group mb-2">
            <input type="test" name="data" class="form-control" placeholder="Name/Email/Mobile">
        </div>
        &nbsp;<button type="submit" class="btn btn-primary mb-2"><i class="fa fa-search"></i>&nbsp;Search</button>
    </form>
  <div class="tile">
    <div class="tile-body">
      <div class="table-responsive">
      	<table class="table table-hover table-bordered text-nowrap" id="usersTable">
        <thead>
          <tr>
            <th>Name</th>
            <th>Profile</th>
            <th>Mobile</th>
            <th>Email</th>
            <th>Join</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($users as $user)
          <tr>
            <td>{{ $user->name }}</td>
            <td>
              @if($user->image != null)
                <img src="{{ asset($user->image) }}" class="img-responsive" alt="Image" style="height: 50px;width: 50px;">
              @else 
                <img src="{{ asset('assets/images/avator.png') }}" class="img-responsive" alt="Image" style="height: 50px;width: 50px;">  
              @endif  
            </td>
            <td>{{ $user->mobile }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->created_at != null ? $user->created_at->format('d M y') : '' }}</td>
            <td>
            <a href="{{ route('admin.edit-user',$user->id) }}" class="btn btn-success"><i class="fa fa-edit"></i></a>
            <button class="btn btn-danger waves-effect" type="button" onclick="deleteItem({{ $user->id }})">
                  <i class="fa fa-trash"></i>
              </button>
              <form id="delete-form-{{ $user->id }}" action="{{ route('admin.delete-user',$user->id) }}" method="POST" style="display: none;">
                  @csrf
                  @method('DELETE')
              </form>
          </td>
          </tr>
          
          @endforeach
        </tbody>
      </table>
      </div>
    </div>
  </div>
</div>
@endsection


@push('js')
    <script type="text/javascript">
      $('#usersTable').DataTable();
      function deleteItem(id) {
      swal({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!',
          cancelButtonText: 'No, cancel!',
          confirmButtonClass: 'btn btn-success',
          cancelButtonClass: 'btn btn-danger',
          buttonsStyling: false,
          reverseButtons: true
      }).then((result) => {
          if (result.value) {
              event.preventDefault();
              document.getElementById('delete-form-'+id).submit();
          } else if (
              // Read more about handling dismissals
          result.dismiss === swal.DismissReason.cancel
          ) {
              swal(
                  'Cancelled',
                  'Your data is safe :)',
                  'error'
              )
          }
      })
    }
    </script>

@endpush