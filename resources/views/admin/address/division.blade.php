@extends('layouts.app')
@section('title', 'Division Page')
@push('css')

@endpush

@section('content')
    <section id="about" class="about">
      <div class="container">
        <div class="section-title">
          <h2>Division ({{ $divisions->count() }})</h2>
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
                @if(isset($division))
                    <form action="{{ route('admin.division.update',$division->id) }}" method="POST" class="form-inline">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-2">
                        <input type="test" name="english_name" class="form-control" value="{{ $division->english_name }}">
                        <input type="test" name="bangla_name" class="form-control" value="{{ $division->bangla_name }}">
                    </div>
                    &nbsp;<button type="submit" class="btn btn-primary mb-2"><i class="fa fa-edit"></i>&nbsp;Update</button>
                </form>
                @else
                    <form action="{{ route('admin.division.index') }}" method="POST" class="form-inline">
                        @csrf
                        <div class="form-group mb-2">
                            <input type="test" name="english_name" class="form-control" placeholder="English Name">
                            <input type="test" name="bangla_name" class="form-control" placeholder="Bangla Name">
                        </div>
                        &nbsp;<button type="submit" class="btn btn-primary mb-2"><i class="fa fa-plus"></i>&nbsp;Add New</button>
                    </form>
                @endif
                <div class="">
                   <table class="table table-striped table-bordered table-responsive">
                    <thead>
                        <tr class="text-left nowrap">
                            <th>Serial No.</th>
                            <th>English Name</th>
                            <th>Bangla Name</th>
                            <th>Website</th>
                            <th>District</th>
                            <th>View District</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($divisions as $division)
                        <tr class="text-left nowrap">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $division->english_name }}</td>
                            <td>{{ $division->bangla_name }}</td>
                            
                            <td>
                              <a href="javascript:void(0)" onclick="gotToUrl()" id="url">
                                  {{ $division->website_url }}
                              </a>
                              
                            </td>
                            <td>
                                {{ $division->districts->count() }}
                            </td>
                            <td>
                                <a class="btn btn-success" href="{{ route('admin.division.show',$division->id) }}">
                                    <i class="fa fa-eye"></i>
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('admin.division.edit',$division->id) }}" class="btn btn-info">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a onclick="takePermission()" class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></a>
                                 <form action="{{ route('admin.division.destroy',$division->id) }}" method="POST" id="division-delete">
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
    </section><!-- End About Us Section -->

@endsection

@push('js')
<script>
    function takePermission(){
        confirm('Are you suer');
        document.getElementById('division-delete').submit();
    }

    function gotToUrl(url){
        var url = document.getElementById('url').innerText;
        //alert(url);
        //window.location.host = url;
        window.location.host = url;
    }
</script>
@endpush

