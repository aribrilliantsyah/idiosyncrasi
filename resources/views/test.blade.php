<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Masuk</title>
<script src="{{ asset('/js/webfont.js') }}"></script>
<script>
	WebFont.load({
		google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
		active: function() {
			sessionStorage.fonts = true;
		}
	});
</script>
<style type="text/css">
	::-webkit-scrollbar {
	width: 6px;
	background: #474747;}
	::-webkit-scrollbar-thumb {background: #5b3ebc;}
</style>
<link href="{{ asset('/assets/vendors/base/vendors.bundle.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/assets/demo/default/base/style.bundle.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="{{ asset('/assets/vendors/base/vendors.bundle.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/demo/default/base/scripts.bundle.js') }}" type="text/javascript"></script>
<!--end::Base Scripts -->
<!--begin::Page Vendors -->
<script src="{{ asset('/assets/vendors/custom/fullcalendar/fullcalendar.bundle.js') }}" type="text/javascript"></script>
<!--end::Page Vendors -->
<!--begin::Page Snippets -->
<script src="{{ asset('/assets/app/js/dashboard.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/demo/default/custom/components/base/toastr.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="{{ asset('/js/sweetalert2.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/sweetalert2.all.min.js') }}"></script>
<script src="{{ asset('js/jquery.number.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/jquery.PrintArea.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="{{ asset('/js/bootstrap-datepicker.js') }}"></script>
<style type="text/css">
	body {
		background: url(http://hdqwalls.com/wallpapers/material-design-blue-and-white-to.jpg) no-repeat center center fixed; 
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
		 background-size: cover;
	}
	.form-control {
        min-height: 41px;
		background: #fff;
		box-shadow: none !important;
		border-color: #e3e3e3;
	}
	.form-control:focus {

	}
    .form-control, .btn {        
        border-radius: 2px;
    }
	.login-form {
		width: 325px;
		margin: 0 auto;
		padding: 80px 0 100px;		
	}
	.login-form form {
		border-radius: 10px;
    	margin-bottom: 15px;
    	margin-top: 80px;
        font-size: 13px;
        background-color: rgba(255,255,255,0.9);
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;	
        position: relative;	
    }
	.login-form h2 {
		font-size: 22px;
        margin: 45px 0 20px;
    }
	.login-form .avatar {
		position: absolute;
		margin: 0 auto;
		left: 0;
		right: 0;
		top: -65px;
		width: 125px;
		height: 125px;
		border-radius: 50%;
		z-index: 9;
		background: rgba();
		padding: 15px;
		box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
	}
	.login-form .avatar img {
		width: 100%;
	}	
    .login-form input[type="checkbox"] {
        margin-top: 2px;
    }
	.login-form a {
		color: #fff;
		text-decoration: underline;
	}
	.login-form a:hover {
		text-decoration: none;
	}
	.login-form form a {
		color: #7a7a7a;
		text-decoration: none;
	}
	.login-form form a:hover {
		text-decoration: underline;
	}
</style>
</head>
<body>
<div class="login-form">
    <form action="" method="" id="masuk">
    	{{ csrf_field() }}
		<div class="avatar">
			<img src="http://www.grginsaat.com/assets/upload/blogavatar.png" alt="Avatar">
		</div>
        <h2 class="text-center">MASUK</h2>   
        <div class="form-group">
        	<input type="text" class="form-control" name="username" placeholder="Email">
        	<span class="text-danger"></span>
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password">
        </div>        
        <div class="form-group">
            <button type="submit" class="btn btn-info btn-xs btn-block m-btn--air">Masuk</button>
        </div>
		<div class="clearfix">
            <label class="m-checkbox">
                <input type="checkbox" name="remember"> Ingat Saya
                <span></span>
            </label>
            <a href="javascript:;" onclick="forgot()" class="pull-right m-link">
                Lupa Password ?
            </a>
        </div>
    </form>
    <form action="#" method="" id="forgot" style="display: none;">
		<div class="avatar">
			<img src="http://www.grginsaat.com/assets/upload/blogavatar.png" alt="Avatar">
		</div>
        <h2 class="text-center">Lupa Password ?</h2>   
        <div class="form-group">
        	<input type="text" class="form-control" name="username" placeholder="Email">
        	<span class="text-danger"></span>
        </div>      
        <div class="form-group">
            <button type="submit" class="btn btn-info btn-xs btn- m-btn--air">Kirim</button>
            <button type="button" class="btn btn-default btn-xs btn- m-btn--air" onclick="masuk()">Batal</button>
        </div>
		<div class="clearfix">
        </div>
    </form>
</div>
<script type="text/javascript">
	function forgot(){
		$('#masuk').slideUp(500);
		$('#forgot').show();
	}
	function masuk(){
		$('#forgot').fadeOut(300);
		$('#masuk').slideDown(500);
	}
	$(document).ready(function () {
	})
</script>
</body>
</html>                            