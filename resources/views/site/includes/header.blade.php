<!DOCTYPE HTML>
<html class="no-js" lang="en-US">

<head>
  @include('site.includes.meta')

  <meta name="google-site-verification" content="PVElXv82RpomDLSiiyhvSw8In_ACNXiFC_y-l6RwEXA" />
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
  <link href="{{ asset('site-assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
  <!-- owl carousel -->
  <link href="{{ asset('site-assets/css/owl.carousel.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('site-assets/css/owl.theme.default.min.css') }}" rel="stylesheet" type="text/css" />
  <!-- css -->
  <link rel="stylesheet" href="{{ asset('site-assets/css/style.css?v1.1') }}">
  <link rel="stylesheet" href="{{ asset('site-assets/css/override.css?v1.1') }}">

  <style>
    .menuboxshadow {
      background: rgba(255, 255, 255, 0.92);
      border-radius: 1.5rem;
      border: 1px solid rgb(221 221 221);
      padding: 20px 15px;
    }

    .menuboxshadow:hover {
      background: rgb(243, 220, 203);
    }

    .owl-theme.menuList__carousel .owl-stage-outer .owl-stage {
      transform: none !important;
      transition: none !important;
    }

    .menu__box.menubox .nav li a.active {
      color: #FF6F00 !important;
    }

    .menuimgrespo {
      position: relative;
      height: 10.25rem !important;
    }

    .menuimgrespo img {
      height: 145px !important;
      object-fit: cover;
      border-radius: 10px;
    }

    .itemexcerpthover:hover p {
      height: 100px;
      margin-bottom: 15px !important;
    }

    @media (max-width: 767px) {
      .menuFlex__card.dnone {
        flex-direction: inherit;
        align-items: center;
      }

      .menuFlex__card--title {
        display: inline-block;
      }

      .menuFlex__card--title .price {
        display: none;
      }

      .owl-carousel.wholeMenu__carousel .owl-dots button span {
        height: 0.95rem !important;
        width: 0.95rem !important;
      }

      .owl-carousel.wholeMenu__carousel button.owl-dot {
        padding: 0px 3px !important;
      }

    }

    .menu__list--box .menuFlex__card .cat {
      padding: 5px 3px 5px 10px;
    }

    @media (min-width: 767px) {
      .menuFlex__card--title {
        display: inline-block;
      }

      .menuFlex__card--title .price {
        display: none;
      }




    }


    .menuboxshadow:hover .menuFlex__card--box .name {
      background: rgb(243, 220, 203);
    }

    .menuboxshadow:hover .menuFlex__card--box .popular_cont p,
    .menuboxshadow:focus .menuFlex__card--box .popular_cont p {
      display: inline-flex;
    }

    .menuboxshadow:hover .menuimgrespo {
      height: 12.25rem !important;
    }

        @media (min-width: 400px) and (max-width: 520px) {
      .dnone.dcontent {
        display: contents;
      }

      .wtc.men-ord {
        text-align: center;
      }

       .menuFlex__card.dnone.menuboxshadow {
        flex-direction: column;
      }
      .order-now-btn2.boxshadow.wtc.men-ord{
            margin: auto;
            margin-top: 10px;
      }
      .menuFlex__card--img {
      width: auto;
      }


    }
  </style>
  @stack('header')

</head>

<body>