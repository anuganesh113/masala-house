
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta property="og:url" content="{{ request()->url() }}" />
 <meta property="og:type" content="website" />
 <meta property="og:locale" content="en_US" />
 <link rel="icon" type="image/x-icon" href="{{ asset('site-assets/images/favicon.jpg') }}">

 <title>{{ $title ?? title() }}</title>

 <meta name="description" content="{{ $description ?? (description() ?? (title() ?? 'masala-house')) }}">
 <meta name="keywords" content="{{ $keywords ?? (keywords() ?? 'masala-house, masala-house ') }}">
 <meta name="author" content="{{ title() }}">
 <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
 <meta property="og:title" content="{{ $title ?? (title() ?? 'masala-house') }}" />
 <meta property="og:description" content="{{ $description ?? (description() ?? 'masala-house') }}" />
 <meta property="og:image" content="{{ url($image ?? banner()) }}" />
 <meta name="csrf-token" content="{{ csrf_token() }}">
 <meta property="og:site_name" content="{{ title() }}">
 <link rel="canonical" href="{{ request()->url() }}">
 <meta name="twitter:card" content="{{ url($image ?? banner()) }}">
 <meta name="twitter:title" content="{{ $title ?? (title() ?? 'masala-house') }}">
 <meta name="twitter:description" content="{{ $description ?? (description() ?? 'masala-house') }}">
 <meta name="twitter:image" content="{{ url($image ?? banner()) }}">