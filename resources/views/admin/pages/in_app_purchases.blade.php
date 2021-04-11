@extends('admin.layouts.app')
@section('title','All User')
@section('page-title','All User')

@push('css')

@endpush

@section('content')
<div class="col-md-12">
  <a href="{{ route('admin.in-app-purchases.create') }}" class="btn btn-warning" style="float: right;">Add In App Product</a>
  {{-- <form action="{{ route('admin.search-user') }}" method="POST" class="form-inline text-right">
        @csrf
        <div class="form-group mb-2">
            <input type="test" name="data" class="form-control" placeholder="">
        </div>
        &nbsp;<button type="submit" class="btn btn-primary mb-2"><i class="fa fa-search"></i>&nbsp;Search</button>
    </form> --}}

  <div class="tile">
    <div class="tile-body">
      <div class="table-responsive">
      	<table class="table table-hover table-bordered text-nowrap" id="usersTable">
        <thead>
          <tr>
            <th>Sl.no</th>
            <th>In app purchased Product Id</th>
            <th>Description</th>
            <th>Day</th>
            <th>Type</th>
            <th>Publish</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($apps as $app)
          <tr>
          	<td>{{ $loop->index +1 }}</td>
            <td>{{ $app->product_id }}</td>
            <td>{{ $app->description }}</td>
            <td>{{ $app->day }}</td>
            <td>{{ $app->type }}</td>
        	<td>
        		<span class="btn btn-{{ $app->is_published == 1 ?'info' : 'danger' }}">
        			{{ $app->is_published == 1 ? 'Yes' : 'No' }}
        		</span>
        	</td>
            <td>
            <a href="{{ route('admin.in-app-purchases.edit',$app->id) }}" class="btn btn-success"><i class="fa fa-edit"></i></a>
            <button class="btn btn-danger waves-effect" type="button" onclick="deleteItem({{ $app->id }})">
                  <i class="fa fa-trash"></i>
              </button>
              <form id="delete-form-{{ $app->id }}" action="{{ route('admin.in-app-purchases.destroy',$app->id) }}" method="POST" style="display: none;">
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