@extends('admin.layouts.app')
@section('title', 'City Page')
@push('css')

@endpush

@section('content')
<div class="col-md-12">
    <div class="tile">
        <div class="tile-header">
            <h5 style="float: left;">Cities Of {{ $country->country }} </h5>
            <span style="float: right;">
                 @if(isset($city))
         <form action="{{ route('admin.city.update',$city->id) }}" method="POST" class="form-inline">
        @csrf
        @method('PUT')
        <div class="form-group mb-2">
            <input type="text" name="city_name" class="form-control" value="{{ $city->city_name }}">

        </div>
        &nbsp;<button type="submit" class="btn btn-primary mb-2"><i class="fa fa-edit"></i>&nbsp;Update</button>
    </form>
    @else
        <form action="{{ route('admin.city.store') }}" method="POST" class="form-inline text-right">
            @csrf
            <div class="form-group mb-2">
                <input type="hidden" name="country_id" value="{{ $country->id }}">
                <input type="text" name="city_name" class="form-control" placeholder="City Name">

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
                <th>City Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cities as $city)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $city->city_name }}</td>
                
                <td>
                    <a href="{{ route('admin.city.edit',$city->id) }}" class="btn btn-info">
                        <i class="fa fa-edit"></i>
                    </a>
                    <button class="btn btn-danger waves-effect" type="button" onclick="deleteItem({{ $city->id }})">
                        <i class="fa fa-trash"></i>
                    </button>
                    <form id="delete-form-{{ $city->id }}" action="{{ route('admin.city.destroy',$city->id) }}" method="POST" style="display: none;">
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

