@extends('admin.layouts.app')
@section('title','Dashboard')
@section('page-title','Dashboard')
@push('css')

@endpush

@section('content')

<div class="col-md-6 col-lg-3">
          <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
            <div class="info">
              <h4>Users</h4>
              <p><b>{{ DB::table('users')->count() }}</b></p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small info coloured-icon"><i class="icon fa fa-signal fa-3x"></i>
            <div class="info">
              <h4>Online</h4>
              <p><b>{{ DB::table("users")->where('online_status',1)->get()->count() }}</b></p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small warning coloured-icon"><i class="icon fa fa-files-o fa-3x"></i>
            <div class="info">
              <h4>Total Shop</h4>
              <p><b>{{ DB::table('shops')->count() }}</b></p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small danger coloured-icon"><i class="icon fa fa-star fa-3x"></i>
            <div class="info">
              <h4>Stars</h4>
              <p><b>500</b></p>
            </div>
          </div>
        </div>
@endsection

@push('js')

@endpush