@extends('layouts.app')
@section('title', 'District Page')
@push('css')

@endpush

@section('content')
    <section id="about" class="about">
      <div class="container">
        <div class="section-title">
          <h2>Districts ( {{ $districts->count() }})</h2>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="list-group">
                    @include('admin.menus')
                </div>
            </div>
            <div class="col-md-9">
                @if(Session::has('message'))
                    <p class="alert alert-{{ Session::get('type') }}">{{ Session::get('message') }}</p>
                @endif
                @error('english_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                @if(isset($district))
                    <form action="{{ route('admin.district.update',$district->id) }}" method="POST" class="form-inline">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-2">
                        <select name="division_id" id="" class="form-control">
                            <option value="{{ $district->division->id }}">{{ $district->division->english_name }}</option>
                            @foreach($divisions as $key => $division)
                                <option value="{{ $division->id }}">{{ $division->english_name }}</option>
                            @endforeach
                        </select>
                        <input type="test" name="english_name" class="form-control" value="{{ $district->english_name }}">
                        <input type="test" name="bangla_name" class="form-control" value="{{ $district->bangla_name }}">
                    </div>
                    &nbsp;<button type="submit" class="btn btn-primary mb-2"><i class="fa fa-edit"></i>&nbsp;Update</button>
                </form>
                @else
                    <form action="{{ route('admin.district.index') }}" method="POST" class="form-inline">
                        @csrf
                        <div class="form-group mb-2">
                            <select name="division_id" id="" class="form-control">
                                <option value="">Select Division</option>
                                @foreach($divisions as $key => $division)
                                    <option value="{{ $division->id }}">{{ $division->english_name }}</option>
                                @endforeach
                            </select>
                            <input type="test" name="english_name" class="form-control" placeholder="English Name">
                            <input type="test" name="bangla_name" class="form-control" placeholder="Bangla Name">
                        </div>
                        &nbsp;<button type="submit" class="btn btn-primary mb-2"><i class="fa fa-plus"></i>&nbsp;Add New</button>
                    </form>
                @endif
                <table class="table table-bordered table-striped table-responsive">
                    <thead>
                        <tr class="text-left nowrap">
                            <th>Serial No.</th>
                            <th>Division Name</th>
                            <th>English Name</th>
                            <th>Bangla Name</th>
                            <th>Website</th>
                            <th>Total Upazilas</th>
                            <th>View</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($districts as $district)
                        <tr class="text-left nowrap">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $district->division->english_name }}</td>
                            <td>{{ $district->english_name }}</td>
                            <td>{{ $district->bangla_name }}</td>
                            <td>{{ $district->url }}</td>
                            <td>{{ $district->upazilas->count() }}</td>
                            <td>
                                <a class="btn btn-success" href="{{ route('admin.district.show',$district->id) }}">
                                    <i class="fa fa-eye"></i>
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('admin.district.edit',$district->id) }}" class="btn btn-info">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a onclick="takePermission()" class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></a>
                                 <form action="{{ route('admin.district.destroy',$district->id) }}" method="POST" id="district-delete">
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
    </section><!-- End About Us Section -->

@endsection

@push('js')
<script>
    function takePermission(){
        confirm('Are you suer');
        document.getElementById('district-delete').submit();
    }
</script>
@endpush

