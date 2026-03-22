 <!-- Required meta tags -->
 <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
 <title>{{ title() . (isset($title) ? ' - ' . ($title ?? '') : '') }}</title>
 <link rel="icon" type="image/x-icon" href="{{ asset('site-assets/images/logo-color.png') }}">
 <meta name="description" content="{{ $description ?? (description() ?? (title() ?? 'masala-house')) }}s">
 <meta name="keywords" content="{{ $keywords ?? (keywords() ?? 'masala-house, masala-house ') }}">
 <meta name="author" content="MasalaHouse">
 <meta property="og:title" content="{{ $title ?? (title() ?? 'masala-house') }}" />
 <meta property="og:description" content="{{ $description ?? (description() ?? (title() ?? 'masala-house')) }}" />
 <meta property="og:image" content="{{ asset('site-assets/images/logo-color.png') }}" />
  <meta property="og:image" content="{{ url($image ?? banner()) }}" />