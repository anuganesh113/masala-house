@extends('site.layouts.layout')
@section('page_title', data_get($blog, 'name'))

@section('content')
    <section class="banner banner__page">
        <div class="banner__page--img">
            <img src="{{ asset ('site-assets/images/about/about-banner.png') }}" alt="">
        </div>
        <div class="banner__page--content">
            <h1>Blog</h1>
            <p>{{ $blog->name }}</p>
        </div>
    </section>

    <section class="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section__title">
                        <h2>{{ data_get($blog, 'name') }}</h2>
                    </div>
                    <div class="about__img position-static mb-4 d-block">
                        <img src="{{ asset(sprintf('%s%s', \App\Enums\UploadFilePath::BLOGS_PATH, data_get($blog, 'image'))) }}"
                             alt="{{ data_get($blog, 'alt') }}"
                        />
                    </div>
                    <div class="about__content">
                        {!! data_get($blog, 'description') !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
