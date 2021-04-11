@extends('admin.layouts.app')
@section('title', 'country Page')
@push('css')

@endpush

@section('content')
<div class="col-md-12">
    <div class="tile">
        <div class="tile-header">
            <h5 style="float: left;">Country List</h5>
            <span style="float: right;">
                 @if(isset($country))
         <form action="{{ route('admin.country.update',$country->id) }}" method="POST" class="form-inline">
        @csrf
        @method('PUT')
        <div class="form-group mb-2">
            <input type="test" name="country" class="form-control" value="{{ $country->country }}">
            
        </div>
        &nbsp;<button type="submit" class="btn btn-primary mb-2"><i class="fa fa-edit"></i>&nbsp;Update</button>
    </form>
    @else
        <form action="{{ route('admin.country.store') }}" method="POST" class="form-inline text-right">
            @csrf
            <div class="form-group mb-2">
                <input type="test" name="country" class="form-control" placeholder="Country Name">
                
            </div>
            &nbsp;<button type="submit" class="btn btn-primary mb-2"><i class="fa fa-plus"></i>&nbsp;Add New</button>
        </form>
    @endif
            </span>
        </div>
        <div class="tile-body">
       <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Serial No.</th>
                <th>Country</th>
                <th>Total City</th>
                <th>View City</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($countries as $country)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $country->country }}</td>                
                <td>
                    {{ $country->cities->count() }}
                </td>
                <td>
                    <a class="btn btn-success" href="{{ route('admin.country.show',$country->id) }}">
                        <i class="fa fa-eye"></i>
                    </a>
                </td>
                <td>
                    <a href="{{ route('admin.country.edit',$country->id) }}" class="btn btn-info">
                        <i class="fa fa-edit"></i>
                    </a>
                    <button class="btn btn-danger waves-effect" type="button" onclick="deleteItem({{ $country->id }})">
                        <i class="fa fa-trash"></i>
                    </button>
                    <form id="delete-form-{{ $country->id }}" action="{{ route('admin.country.destroy',$country->id) }}" method="POST" style="display: none;">
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

