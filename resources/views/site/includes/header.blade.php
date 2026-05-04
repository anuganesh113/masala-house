<!DOCTYPE HTML>
<html class="no-js" lang="en-US">

<head>
  @include('site.includes.meta')
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

  <link rel="stylesheet" href="https://code.jquery.com/ui/1.14.2/themes/base/jquery-ui.css">

  @include('site.includes.google')
  @include('site.includes._css')

  @stack('header')

</head>

<body>