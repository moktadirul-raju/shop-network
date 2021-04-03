<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/main.css') }}">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Admin Login</title>
  </head>
  <body>
    <section class="material-half-bg" >
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        <!-- <h1>Booking</h1> -->
      </div>
      <div class="login-box" style="height: auto;">
        <form class="login-form" action="{{ route('admin-login') }}" method="POST" onsubmit="return validate()">
          @csrf
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>Admin Login</h3>
          @if(Session::has('message'))
        <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">
        {{ Session::get('message') }}
      </p>
      @endif
          <div class="form-group">
            <label class="control-label">Email</label>
            <input name="email" class="form-control" type="text" id="email" placeholder="Email" onkeypress="hideEmailError()">
            <span style="display: none;color: red;" id="email_error">Email Field Is Required</span>
          </div>
          <div class="form-group">
            <label class="control-label">PASSWORD</label>
            <input name="password" class="form-control" type="password" id="password" placeholder="Password" onkeypress="hidePasswordError()">
            <span style="display: none;color: red;" id="password_error">Password Field Is Required</span>
          </div>
          <div class="form-group">
            <div class="utility">
              {{-- <div class="animated-checkbox">
                <label>
                  <input type="checkbox"><span class="label-text">Stay Signed in</span>
                </label>
              </div> --}}
              {{-- <p class="semibold-text mb-2"><a href="#" data-toggle="flip">Forgot Password ?</a></p> --}}
            </div>
          </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>
          </div>
        </form>
        <form class="forget-form" action="index.html">
         <!--  <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>Forgot Password ?</h3> -->
          <div class="form-group">
            <label class="control-label">EMAIL</label>
            <input class="form-control" type="text" placeholder="Email">
          </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block"><i class="fa fa-unlock fa-lg fa-fw"></i>RESET</button>
          </div>
          <div class="form-group mt-3">
            <p class="semibold-text mb-0"><a href="#" data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> Back to Login</a></p>
          </div>
        </form>
      </div>
    </section>

  {{-- Form Validation Part --}}
    <script type="text/javascript">
      function validate(){
        var email = document.getElementById("email");
        var password = document.getElementById("password");
        if(email.value.trim() == ""){
          email.style.border = "1px solid red";
          $('#email_error').show();
          return false;
        } else if(password.value.trim() == ""){
          password.style.border = "1px solid red";
          $('#password_error').show();
          return false;
        }
      } 

      function hideEmailError(){
        var email = document.getElementById("email");
        email.style.border = '1px solid black';
        $('#email_error').hide();
      }
      function hidePasswordError(){
        var password = document.getElementById("password");
        password.style.border = '1px solid black';
        $('#password_error').hide();
      }
    </script>
    <!-- Essential javascripts for application to work-->
    <script src="{{ asset('assets/admin/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/main.js') }}"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="{{ asset('assets/admin/js/plugins/pace.min.js') }}"></script>
    <script type="text/javascript">
      // Login Page Flipbox control
      $('.login-content [data-toggle="flip"]').click(function() {
        $('.login-box').toggleClass('flipped');
        return false;
      });
    </script>
  </body>
</html>