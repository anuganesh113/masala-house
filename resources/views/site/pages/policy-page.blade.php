@extends('site.layouts.layout',[
'title' => data_get($page, "seo.title") ?? data_get($page, 'name'),
'description' => data_get($page, "seo.description") ?? strip_tags(data_get($page, 'description')),
'image' => $page ? $page->full_image_link : banner(),
'keywords' => data_get($page, "seo.keywords") ?? data_get($page, 'keywords'),
])



@push('header')
<style>
    .boxshadow {
        box-shadow: 0px 2px 7px rgb(22 30 106 / 30%) !important;
    }

    .plt-50 {
        padding: 30px 50px;
    }


</style>

@endpush

@section('content')
<section class="banner banner__page">
    <div class="banner__page--img">
        <img src="{{ $page ?  $page->breadcrumbs_image_link : asset ('site-assets/images/about/about-banner.png') }}" alt="{{ data_get($page, 'alt', 'page banner') }}">
    </div>
    <div class="banner__page--content">
        <h1>Our Privacy Policy</h1>
        <p> <a href="{{url('/') }}" class="text-white"><i class="fas fa-home" style="font-size: 27px;"></i></a> / {{$page->name ?? 'page Name'}}</p>

</section>

<section class="about ">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="boxshadow plt-50">
                    <div class="section__title">
                        <h1  class="text-center" >{{ data_get($page, 'name') }}</h1>
                    </div>

                    <div class="about__content page-post-content">
                        {!! data_get($page, 'description') !!}
                    </div>

                    @if($page->full_image_link)
                    <div class=" position-static mb-4 d-block">
                        <img src="{{ $page->full_image_link }}" class="img-fluid image-One" alt="{{ $page->image_alt ??  $page->name }}">
                    </div>
                    @endif
                </div>
                
            </div>
            

            <!-- Sidebar Column -->

        </div>
    </div>
</section>



@endsection