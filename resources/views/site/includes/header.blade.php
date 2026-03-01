<!DOCTYPE HTML>
<html class="no-js" lang="en-US">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  @stack('seo-share')

  <title>@yield('page_title')</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- fontawesome CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
  <!-- bootstrap -->
  <link href="{{ asset('site-assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
  <!-- owl carousel -->
  <link href="{{ asset('site-assets/css/owl.carousel.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('site-assets/css/owl.theme.default.min.css') }}" rel="stylesheet" type="text/css" />
  @stack('header')
  <!-- css -->
  <link rel="stylesheet" href="{{ asset('site-assets/css/style.css?v1.1') }}">
  <style>
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

    .menu_price_color {
      color: #FF6F00 !important;
      font-size: 1.5rem !important;
      font-weight: 500 !important;
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
  </style>
</head>

<body>