@extends('admin.layouts.app')
@section('title','Shop List')

@push('css')

@endpush

@section('content')
<div class="col-md-12">
  <a href="{{ route('admin.export-shop') }}" class="btn btn-warning" style="float: left;">Export Shop</a>
  <a href="{{ route('admin.shop.create') }}" class="btn btn-success" style="float: right;">
    <i class="fa fa-plus"></i>Add Shop
  </a>
</div>
<div class="col-md-12" style="margin-top: 10px;">
  <div class="tile">
    <div class="tile-header">
      <h5 style="float: left;">{{ 'Shop List Added By Admin' }}</h5>
      <form action="{{ route('admin.search-shop') }}" method="POST" class="form-inline" style="float: right;">
            @csrf
            <div class="form-group mb-2">
                <input type="text" name="mobile" class="form-control" placeholder="Mobile/Email">
            </div>
            &nbsp;<button type="submit" class="btn btn-primary mb-2"><i class="fa fa-edit"></i>Search</button>
        </form>
    </div>
    <div class="tile-body">
      <table class="table table-bordered table-striped text-nowrap text-sm-left mt-5">
            <thead>
              <tr>
              <th>Sl.no</th>
              <th>User</th>
              <th>Category</th>
              <th>Title</th>
              <th>Action</th>
              </tr>
        </thead>
        <tbody>
          @foreach($shops as $shop)
          <tr>
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ $shop->user->name }}</td>
            <td>{{ $shop->category_id != null ?$shop->category->category : '' }}</td>
            <td>{{ $shop->title }}</td>
            <td>
              <a class="btn btn-info" href="{{ route('admin.details',$shop->id) }}"><i class="fa fa-eye"></i></a>
              <a class="btn btn-success" href="{{ route('admin.shop.edit',$shop->id) }}"><i class="fa fa-edit"></i></a>
              <button class="btn btn-danger waves-effect" type="button" onclick="deleteItem({{ $shop->id }})">
                    <i class="fa fa-trash"></i>
                </button>
                <form id="delete-form-{{ $shop->id }}" action="{{ route('admin.shop.destroy',$shop->id) }}" method="POST" style="display: none;">
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
@endsection

@push('js')
<script>
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