<!DOCTYPE HTML>
<html class="no-js" lang="en-US">

<head>
  @include('site.includes.meta')
 <meta name="google-site-verification" content="{{googlesiteverification()}}" />
  <!-- <meta name="google-site-verification" content="PVElXv82RpomDLSiiyhvSw8In_ACNXiFC_y-l6RwEXA" /> -->
  <script>
    (function(w, d, s, l, i) {
      w[l] = w[l] || [];
      w[l].push({
        'gtm.start': new Date().getTime(),
        event: 'gtm.js'
      });
      var f = d.getElementsByTagName(s)[0],
        j = d.createElement(s),
        dl = l != 'dataLayer' ? '&l=' + l : '';
      j.async = true;
      j.src =
        'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
      f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-K8WJ7LSJ');
  </script>
  <!-- End Google Tag Manager -->

  @stack('seo-share')

  <title>@yield('page_title')</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- fontawesome CSS -->

  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
  <!-- bootstrap -->
  <link href="{{ asset('site-assets/css/bootstrap.min.css?v1.1') }}" rel="stylesheet" type="text/css" />
  <!-- owl carousel -->
  <link href="{{ asset('site-assets/css/owl.carousel.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('site-assets/css/owl.theme.default.min.css') }}" rel="stylesheet" type="text/css" />
  <!-- css -->
  <link rel="stylesheet" href="{{ asset('site-assets/css/style.css?v1.1') }}">
  <link rel="stylesheet" href="{{ asset('site-assets/css/override.css?v1.1') }}">




  @include('site.includes._css')

  @stack('header')

</head>

<body>