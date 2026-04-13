@extends('site.layouts.layout')

@push('header')
<style>
   #instagram-media iframe{
    width: 100%;
    
   }

</style>

@endpush
@section('content')


<section class="banner banner__page">
    <div class="banner__page--img">
        <img src="{{  asset ('site-assets/images/about/about-banner.png') }}"
            alt="{{ $page->name ?? 'Instag' }}" />
    </div>
    <div class="banner__page--content">
       
    </div>
</section>

<div class="iiiii">
    <div class="row">
        <div class="col-md-12 col-sm-12" id="instagram-media">
            <blockquote class="instagram-media" data-instgrm-permalink="https://www.instagram.com/masala_housepittsburgca/" data-instgrm-version="xx">
                <div class="instagram-media-inner">
                    <a href="https://www.instagram.com/masala_housepittsburgca/" target="_blank"></a>
                </div>
            </blockquote>
            <script async src="//www.instagram.com/embed.js"></script>
        </div>
    </div>
</div>

@endsection