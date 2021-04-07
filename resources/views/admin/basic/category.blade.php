@extends('admin.layouts.app')
@section('title','Category')

@push('css')

@endpush

@section('content')

<div class="col-md-12" style="margin-top: 10px;">
	<div class="tile">
		<div class="tile-header">
			<h5 style="float: left;">All Categories</h5>
			<a class="btn btn-primary" data-toggle="modal" href='#modal-id' style="float: right;">
				<i class="fa fa-plus"></i>
				Add New
			</a>
			<div class="modal fade" id="modal-id">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">New Category</h4>
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							
						</div>
						<form action="{{ route('admin.category.store') }}" method="POST">
							@csrf
							<div class="modal-body">
								<div class="form-group">
									<label for="">Category Name</label>
									<input type="text" name="category_name" class="form-control" placeholder="Category Name">
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary">Save</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="tile-body">

			<table class="table table-bordered table-striped text-nowrap text-sm-center mt-5">
		        <thead>
			        <tr>
				    <th>Sl.no</th>
				     <th>Category Name</th>
				     <th>Action</th>
			        </tr>
		</thead>
		<tbody>
			@foreach($categories as $category)
			<tr>
				<td>{{ $loop->index + 1 }}</td>
				<td>{{ $category->category }}</td>
				<td>
					<a class="btn btn-success" data-toggle="modal" href='#edit-category{{ $category->id }}'>
						<i class="fa fa-edit"></i>
					</a>
					<div class="modal fade" id="edit-category{{ $category->id }}">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title">Update Category</h4>
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									
								</div>
								<form action="{{ route('admin.category.update',$category->id) }}" method="POST">
									@csrf
									@method('PUT')
									<div class="modal-body text-left">
										<div class="form-group">
											<label for="">Category Name</label>
											<input type="text" name="category_name" class="form-control" value="{{ $category->category }}">
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										<button type="submit" class="btn btn-primary">Update</button>
									</div>
								</form>
							</div>
						</div>
					</div>
					<button class="btn btn-danger waves-effect" type="button" onclick="deleteItem({{ $category->id }})">
                        <i class="fa fa-trash"></i>
                    </button>
                    <form id="delete-form-{{ $category->id }}" action="{{ route('admin.category.destroy',$category->id) }}" method="POST" style="display: none;">
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