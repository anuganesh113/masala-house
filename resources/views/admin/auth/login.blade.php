<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="utf-8" />
    <title>{{ env('APP_NAME') }} | Admin Login</title>
    <meta name="description" content="Latest updates and statistic charts">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{ asset('uploads/fav.fw.png') }}" />
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
      WebFont.load({
        google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
        active: function() {
            sessionStorage.fonts = true;
        }
      });
    </script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ asset('admin-assets/css/vendors.bundle.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('admin-assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="shortcut icon" href="{{ asset('uploads/fav.png') }}"/>
</head>
<body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">

    <style>
        #error-msg {background:#cf2338; padding:15px 0;}
        #error-msg h4 {color:#fff; font-size:14px;}
        #error-msg h4 i {margin-right:10px;}
        #error-msg h4 a {float:right; font-size:30px; color:#fff; margin-top:-12px;}
    </style>

    <div id="error-msg" style="display:none">
       <div class="container">
            <h4 style="margin:0">
                <i class="fas fa-info-circle"></i>
                This browser may not support all the Features of the Website. Please use Chrome, Firefox, Opera or similar browsers for better User Experience.
            </h4>
       </div>
    </div>

    <script>
        isIE = false || !!document.documentMode;
        if(isIE == true){
            document.getElementById("error-msg").style.display = "block";
        }
    </script>

        <div class="m-grid m-grid--hor m-grid--root m-page">
            <div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--signin m-login--2 m-login-2--skin-1" id="m_login"
                style="background-image: url({{ asset('admin-assets/images/bg-7.jpg') }});">
                <div class="m-grid__item m-grid__item--fluid m-login__wrapper">
                    <div class="m-login__container">

                        <div class="m-login__signin animated flipInX">
                            <div class="m-login__head">
                                <h3 class="m-login__title">Admin Login</h3>
                            </div>

                            @if(session()->has("error"))
                                <div class="alert alert-danger alert-dismissible">
                                    <a href="javascript:;" class="close" data-dismiss="alert" aria-label="close"></a>
                                    <p><strong><i class="fa fa-ban" aria-hidden="true"></i> {{ session("error") }}</strong></p>
                                </div>
                            @endif
                            @if(session()->has("success"))
                                <div class="alert alert-success alert-dismissible">
                                    <a href="javascript:;" class="close" data-dismiss="alert" aria-label="close"></a>
                                    <p><strong><i class="fa fa-ban" aria-hidden="true"></i> {{ session("success") }}</strong></p>
                                </div>
                            @endif
                            <form class="m-login__form m-form"
                                  action="{{ route('admin.checked') }}"
                                  id="admin-login"
                                  method="POST">

                                @csrf

                                <div class="form-group m-form__group">
                                    <input class="form-control m-input"
                                        type="text" placeholder="Email Address" name="email" autocomplete="off"
                                        value="{{ old('email') }}">
                                    @if($errors->has('email'))
                                        <span class="text-danger" style="text-align:center;">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group m-form__group">
                                    <input class="form-control m-input"
                                        type="password" placeholder="Password" name="password">
                                    @if($errors->has('password'))
                                        <span class="text-danger" style="text-align:center;">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="row m-login__form-sub">
                                    <div class="col m--align-left m-login__form-left">
                                        <a href="{{ route('admin.showLinkRequestForm') }}" id="m_login_forget_password"
                                            class="m-link">
                                            {{ __('Forgot Password ?') }}
                                        </a>
                                    </div>
                                </div>

                                <div class="m-login__form-action">
                                    <button id="login-button" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary">
                                        {{ __('Login') }}
                                    </button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ asset('admin-assets/js/vendors.bundle.js') }}" type="text/javascript"></script>
        <script src="{{ asset('admin-assets/js/scripts.bundle.js') }}" type="text/javascript"></script>
        <script type="text/javascript" charset="utf-8" defer>
            $(document).ready(function(){
                $(`input`).keyup(function(event){

                    $(this).removeClass(`border-danger`);
                    $(this).next(`span`).remove();
                });

                $(`form#admin-login`).submit(function(event) {
                    event.preventDefault();

                    $(`button#login-button`).attr(`disabled`, true);
                    $(`button#login-button`).html(`Logging . . . <i class='fa fa-spinner fa-pulse' style='font-size:24px'></i>`);

                    this.submit();
                });
            });
        </script>
    </body>
</html>




