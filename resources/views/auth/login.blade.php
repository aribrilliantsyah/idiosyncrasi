
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
  <link rel="shortcut icon" href="http://203.176.176.251/dev-sipetruk//assets/img/logo.ico">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('auth/vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('auth/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('auth/vendor/animate/animate.css')}}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{asset('auth/vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('auth/vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('auth/css/util.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('auth/css/main.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('auth/css/animate_bird.css')}}">
<!--===============================================================================================-->
	<style>
    
	.container-login100{
		background: linear-gradient(-135deg, #000, #000) !important;
	}
  .container-login100-form-btn{
    padding-top: 0px;
  }
	.login100-form-btn{
		background: linear-gradient(-135deg,#000,#ff2626) !important;
	}
	.login100-form-title{
		padding-bottom: 30px;
	}
  .g-recaptcha{
    transform:scale(0.9);-webkit-transform:scale(0.9);
    transform-origin:0 0;-webkit-transform-origin:0 0;
  }
  .wrap-captcha{
    padding: 10px;
    margin-bottom: 0px !important;
  }
  .text-danger{
    font-size: 12px;
  }
  /* .p-t-136{
    padding-top: 100px !important;
  } */
  /* @media (min-width:320px)  { 
    .container{
      display: hidden;
    }
  }
  @media (min-width:481px)  { 
    .container{
      display: hidden;
    }
  }
  @media (min-width:641px)  { 
    .container{
      display: hidden;
    }
  }
  @media (min-width:961px)  { 
    .container{
      display: hidden;
    }
  }
  @media (min-width:1025px) { 
    .container{
      display: hidden;
    }
  }
  @media (min-width:1281px) { 
    .container{
      display: hidden;
    }
  } */
	</style>
</head>
<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
        <div class="login100-pic js-tilt" data-tilt>
          <img src="{{asset('auth/images/img-02.png')}}" alt="IMG">
				</div>
        
        <form class="login100-form validate-form" action="{{route('login')}}" method="post">
          {{csrf_field()}}
					<span class="login100-form-title">
            <img src="{{asset('auth/images/logo_landscape.png')}}" style="height: 50px;">
					</span>
          
          @include('layouts._notif')
          
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
            </span>
					</div>
          @if ($errors->has('email'))
              <span class="text-danger">
                  <strong>{{ $errors->first('email') }}</strong>
              </span>
          @endif

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
            </span>
          </div>
          @if ($errors->has('password'))
              <span class="text-danger">
                  <strong>{{ $errors->first('password') }}</strong>
              </span>
          @endif

          {{-- <div class="wrap-input100 wrap-captcha">
            {!! NoCaptcha::display() !!}
            @if ($errors->has('g-recaptcha-response'))
                <span class="text-danger">
                    <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                </span>
            @endif
          </div> --}}

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit">
							Login
						</button>
					</div>

					{{-- <div class="text-center p-t-12">
						<span class="txt1">
							Forgot
						</span>
						<a class="txt2" href="#">
							Username / Password?
						</a>
					</div> --}}
					<div class="text-center p-t-136">
						<a class="txt2">
							{{-- Create your Account --}}
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
  </div>
  
  {{-- <div class="container">
    <div class="bird-container bird-container--one">
      <div class="bird bird--one"></div>
    </div>
    <div class="bird-container bird-container--two">
      <div class="bird bird--two"></div>
    </div>
    <div class="bird-container bird-container--three">
      <div class="bird bird--three"></div>
    </div>
    <div class="bird-container bird-container--four">
      <div class="bird bird--four"></div>
    </div>
  </div>	 --}}
	
  <!--===============================================================================================-->	
	<script src="{{asset('auth/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
  <!--===============================================================================================-->
	<script src="{{asset('auth/vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{asset('auth/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
  <!--===============================================================================================-->
	<script src="{{asset('auth/vendor/select2/select2.min.js')}}"></script>
  <!--===============================================================================================-->
	<script src="{{asset('auth/vendor/tilt/tilt.jquery.min.js')}}"></script>
  <!--===============================================================================================-->
  <script>
  /*==================================================================
    [ Validate ]*/
    var input = $('.validate-input .input100');
    var el_button = $('.login100-form-btn');
    
    $('.validate-form').on('submit',function(){
        buttonLogin(true);
        var check = true;

        for(var i=0; i<input.length; i++) {
            if(validate(input[i]) == false){
                showValidate(input[i]);
                check=false;
            }
        }

        return check;
    });


    $('.validate-form .input100').each(function(){
        $(this).focus(function(){
           hideValidate(this);
        });
    });

    function buttonLogin(hidden){
        if(hidden){
            el_button.prop('disabled', true);
            el_button.html('<i class="fa fa-circle-o-notch fa-spin"></i>');
        }else{
            el_button.prop('disabled', false);
            el_button.html('Login');
        }
    }
    function validate (input) {
        if($(input).attr('type') == 'email' || $(input).attr('name') == 'email') {
            if($(input).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
                return false;
            }
        }
        else {
            if($(input).val().trim() == ''){
                return false;
            }
        }
    }

    function showValidate(input) {
        buttonLogin(false);
        var thisAlert = $(input).parent();
        $(thisAlert).addClass('alert-validate');
        
    }

    function hideValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).removeClass('alert-validate');
    }
  </script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		});
  </script>
  <script src="https://www.google.com/recaptcha/api.js?hl=id" async defer></script>
  <script>
  </script>
  
</body>
</html>