<!DOCTYPE HTML>
<html class="no-js" lang="en-US">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="icon" type="image/x-icon" href="{{ asset('site-assets/images/favicon.jpg') }}">
  <meta name="google-site-verification" content="PVElXv82RpomDLSiiyhvSw8In_ACNXiFC_y-l6RwEXA" />
  <!-- Google Tag Manager -->
  <meta property="og:image" content="{{ asset('site-assets/images/logo-color.png') }}" />
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
  <style>
    .titlehgt{
      height: 52px;
    }
    .openpop-btn:hover {

      background-color: #FF6F00;
      border-color: inherit !important;

    }

    .openinghourspop ul li {
      text-align: justify;
      text-align-last: left;
      /* Last line aligns left */
      font-size: larger;
    }

    .openinghourspop h6,
    h1,
    h2,
    h3,
    h4 {
      color: #FF6F00;

    }

    /* .dfdsfdsf.family__carousel .owl-stage-outer .owl-stage .owl-item.cloned {
  width: 540px !important;
} */
    /* Make success message brighter green */
    .toast-success {
      background-color: #28a745 !important;
      opacity: 1 !important;
      box-shadow: 0 0 12px rgba(40, 167, 69, 0.4) !important;
    }

    .reservation::before {
      border: inherit !important;
    }

    .cssnonveg {
      background-color: #85542b !important
    }

    .boxshadow {
      box-shadow: 0 14px 28px rgb(255 255 255 / 35%) !important;
    }

    .bt-fr {
      float: right !important;
    }

    .mr-l {
      margin-left: -10px !important;

    }

    .veg-btn {
      float: right;
      position: relative;
      bottom: -36px;
    }

    .bg-green {
      background: #62990a !important;
    }

    .popular_cont p,
    .exploreour p {
      color: #777777;
      font-family: "Sansita Swashed", sans-serif;
      font-size: 1rem !important;
      font-weight: 400;
      line-height: 1.5;

    }

    .veg-btn-e {
      float: right;
      position: relative;
      bottom: -5px;
    }

       .org_color {
      color: #FF6F00 !important;
         font-size: x-large;
    }

    .menu_price_color {
      color: #FF6F00 !important;
      font-size: 1.5rem !important;
      font-weight: 500 !important;
    }

    @media only screen and (max-width: 550px) {

      .reservationimg {
        margin: auto !important;
        width: 100% !important;
        max-width: inherit !important;
      }

      .reservationbtn {
        text-align: center !important;
      }

      .cat.veg-btn.bt-fr.cssnonveg{
        margin-bottom: 2px;

      }
      /* .order-btn.wtc{
        width: 70%!important;
      }
      .popular_cont p {
         width: 70%!important;
      } */


    }

    @media only screen and (max-width: 766px) {
      .mobfooter {
        text-align: center;
      }
    }


    @media only screen and (max-width: 400px) {
      .dnone {
        display: inherit !important;
      }

      .bt-fr {
        float: inherit !important;
        margin-bottom: 5px !important;
      }

      .mr-l {
        margin-left: inherit !important;

      }

      .wtc {
        width: 100% !important;
        text-align: center !important;
      }
    }

    @media (min-width: 250px) and (max-width: 400px) {

      .mobile-menu,
      .mobile-menu img {
        width: 100%;
        height: 100%;
      }
    }

    @media (min-width: 200px) and (max-width: 300px) {

      .footer__top img {
        width: 26px;
      }
    }



    @media (min-width: 400px) and (max-width: 520px) {
      .dnone.dcontent {
        display: contents;
      }

      .wtc.men-ord {
        width: 65%;
        text-align: center;
      }

      /* .orderdiv{
            position: relative;
      }
      .cat.catvegg{
    float: right;
      }  */
    }





    @media (max-width: 991px) {
      .menu__item {
        top: 4.375rem !important;

      }

      .mobvideo {
        margin-bottom: 5.5625rem !important;

      }

    }

    .blogtitle {
      font-size: 18px !important;
      height: 77px !important;
    }

    @media (min-width: 767px) and (max-width: 991px) {
      .d-lg-none.mobfooter {
        /* padding: 23px 94px 0px 55px; */
        text-align: center;

      }

    }


    /* Target screens between 768px and 991px ONLY */
    @media (min-width: 768px) and (max-width: 1500px) {
      .tb-tb {
        margin-top: 10px !important;
      }

      .mobftlog {
        display: none !important;
      }


      .blogtitle {
        font-size: medium !important;
        height: 77px !important;
      }

      .blog__card--content .icon {
        height: 77px !important;
      }

    }



    @media (max-width: 1155px) {
      .menu__item {
        top: 4.375rem !important;

      }

      @media only screen and (min-width: 1550px) {
        .gallery__boxres {
          padding: 0 20px;
        }
      }
    }
  </style>
  @stack('header')

</head>

<body>