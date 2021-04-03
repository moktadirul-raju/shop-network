@extends('layouts.app')
@section('title','Login')
@push('css')
	{{-- expr --}}
@endpush

@section('content')
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact" style="min-height:530px;">
      <div class="container" data-aos="fade-up">
        <div class="row mt-5">
            <div class="col-lg-3"></div>
          <div class="col-lg-6 mt-5 mt-lg-0">
              <div class="alert alert-danger" style="display:none" id="alert">
                <p id="alert-message"></p>
              </div>
                @if(Session::has('message'))
                <p class="alert alert-danger">{{ Session::get('message') }}</p>
                @endif
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            <form method="POST" action="{{ route('user-login') }}" onsubmit="return validate()">
                @csrf
                <div class="form-group">
                    <label for="mobile">Mobile</label>
                    <input name="mobile" id="mobile" type="text" class="form-control" >
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" type="password" class="form-control" name="password">
                </div>

                <div class="form-group">
                    <span style="float: left">
                        <button type="submit" class="btn btn-primary" style="background: #00ada7;border: 1px solid #00ada7;">
                            {{ __('Login') }}
                        </button>
                    </span>
                    <span style="float: right">
                        <p>Do not have an account ?
                            <a href="{{ route('register') }}">Registration here</a>
                        </p>
                    </span>
                </div>
            </form>

          </div>
          <div class="col-lg-3"></div>
        </div>

      </div>
    </section><!-- End Contact Section -->
@endsection

@push('js')
	<script>
        function validate(){
            var mobile = document.getElementById('mobile');
            var password = document.getElementById('password');
            if(mobile.value.trim() == ""){
                mobile.style.border = '1px solid red';
                return false;
            }else if(password.value.trim() == ""){
                password.style.border = '1px solid red';
                return false;
            } else {
                return true;
            }
        }
    </script>
@endpush





