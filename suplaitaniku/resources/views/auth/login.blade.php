<!DOCTYPE html>
<html lang="en">

<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="SemiColonWeb" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{asset('images/tab-logo.png')}}">

	<!-- Stylesheets
	============================================= -->
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Raleway:300,400,500,600,700|Crete+Round:400i" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="{{asset('css/bootstrap.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{asset('style.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{asset('css/swiper.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{asset('css/dark.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{asset('css/font-icons.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{asset('css/animate.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}" type="text/css" />
  <link rel="stylesheet" href="{{asset('css/proyek.css')}}" type="text/css" />
  <link rel="stylesheet" href="{{asset('css/loginLanding.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{asset('css/responsive.css')}}" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<!-- SLIDER REVOLUTION 5.x CSS SETTINGS -->
	<link rel="stylesheet" type="text/css" href="{{asset('include/rs-plugin/css/settings.css')}}" media="screen"/>
	<link rel="stylesheet" type="text/css" href="{{asset('include/rs-plugin/css/layers.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('include/rs-plugin/css/navigation.css')}}">

	<!-- Document Title
	============================================= -->
	<title>SuplaiTaniku</title>

	<style>

		.revo-slider-emphasis-text {
			font-size: 58px;
			font-weight: 700;
			letter-spacing: 1px;
			font-family: 'Raleway', sans-serif;
			padding: 15px 20px;
			border-top: 2px solid #FFF;
			border-bottom: 2px solid #FFF;
		}

		.revo-slider-desc-text {
			font-size: 20px;
			font-family: 'Lato', sans-serif;
			width: 650px;
			text-align: center;
			line-height: 1.5;
		}

		.revo-slider-caps-text {
			font-size: 16px;
			font-weight: 400;
			letter-spacing: 3px;
			font-family: 'Raleway', sans-serif;
		}

		.tp-video-play-button { display: none !important; }

		.tp-caption { white-space: nowrap; }

        #top-search-input {
	float: right;
	margin: 33px 0 33px 15px;
	-webkit-transition: margin .4s ease;
	-o-transition: margin .4s ease;
	transition: margin .4s ease;
}

#top-search-input form {
	width: 160px;
	height: 34px;
	padding: 0;
	margin: 0;
}

#header.sticky-header #top-search-input { margin: 13px 0 13px 15px; }

@media (max-width: 991px) {

	#top-search-input {
		float: none;
		margin: 20px 0;
	}

	#top-search-input form {
		margin: 0 auto;
		width: 300px;
	}

}

.device-sm #top-search-input form { width: 100%; }


	</style>

</head>
<body>
<main class="d-flex align-items-center min-vh-100 py-3 py-md-0 ">
<div class="container">
      <div class="card login-card">
        <div class="row no-gutters">
          <div class="col-md-5">
            <img src="images/login-landing-page.jpg" alt="login" class="login-card-img">
          </div>

          <div class="col-md-7">
            <div class="card-body">

              <div class="brand-wrapper">
                <p></p>
                <span class="brand-name"><a href="{{ url('/') }}" style="font-family: Lobster; font-weight: bold; font-size:50px; color: green; text-decoration:none;">Suplai <span style="font-family: Lobster; font-weight: bold; font-size:50px; color: #276678">Taniku <img src="images/tab-logo.png" width="50px" alt="" style="padding-bottom:13px"></span></a></span>
              </div>
              <p class="login-card-description">Silahkan masuk ke akun anda</p>
              <!--Form Login-->
                <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group">
                          <label for="uid" class="sr-only">{{ __('E-Mail Address') }}</label>
                          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus style="width:100%;" placeholder="Email">
                            @error('email')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                        </div>
                         <div class="form-group mb-4">
                            <label for="pwd" class="sr-only">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                          </div>

                          <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-success login-btn mb-4" style="background-color:#28a745; width:100%;">
                                    {{ __('Masuk') }}
                                </button>
                                <p class="login-card-footer-text">
                                    Belum punya akun? <a href="{{ route('register') }}" class="text-reset" style="color:blue;"><b>Daftar disini</b> </a>Kembali Ke <a href="{{ route('beranda.index') }}" class="text-reset" style="color:blue;"><b>Beranda</b></a>
                                    <br>
                                </p>

                            </div>
                        </div>
                    </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</main>
</body>
</html>
