@extends('site.layouts.layout',[
'title' => data_get($event, "seo.title") ?? data_get($event, 'name'),
'description' => data_get($event, "seo.description") ?? strip_tags(data_get($event, 'description')),
'image' => $event ? $event->full_image_link : banner(),
'keywords' => data_get($event, "seo.keywords") ?? data_get($event, 'keywords'),
])



@push('header')
<style>
    .boxshadow {
        box-shadow: 0px 2px 7px rgb(22 30 106 / 30%) !important;
    }

    .plt-50 {
        padding: 30px 50px;
    }

    /* Responsive padding */
    @media (max-width: 768px) {
        .plt-50 {
            padding: 20px 25px;
        }
    }

    @media (max-width: 576px) {
        .plt-50 {
            padding: 15px 20px;
        }
    }

    .fxl {
        font-size: x-large !important;
    }

    /* Responsive font sizes */
    @media (max-width: 768px) {
        .fxl {
            font-size: large !important;
        }
    }

    .fxs {
        font-size: x-small !important;
    }

    /* .blog ul li,
    a {
        color: #000;
           font-size: clamp(0.875rem, 3vw, 1.25rem);
    }

    .blog ul li,
    a:hover {
        color: #FF6F00;
        font-size: 1rem !important;
    } */

    .mt-15 {
        margin-top: 15px !important;
    }

    @media (max-width: 950px) {
        .banner__page {
            min-height: 250px !important;
        }

        .banner__page--content {
            margin-top: 20px;
        }

        .mbabout {
            padding-top: 10rem;
        }
    }

    @media (max-width: 576px) {
        .mt-15 {
            margin-top: 12px !important;
        }

        .boxshadow.plt-50 {
            margin-bottom: 35px;
        }

    }

    .menu-item.blogitem {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 0;
        border-bottom: 1px solid #eee;
    }

    .green {
        font-weight: 800;
        color: #24be2c;
    }

    .orange {
        font-weight: 800;
        color: #FF6F00;
    }

    .banner__page {
        position: relative;
        /* overflow: hidden; */
        min-height: 425px;
    }

    .banner__page--img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }
</style>

@endpush

@section('content')
<section class="banner banner__page">
    <div class="banner__page--img">
        <img src="{{ $event->full_image_link }}" alt="{{ data_get($event, 'alt', 'Event banner') }}">
    </div>
    <div class="banner__page--content">
        <h1>Catering</h1>
        <p> <a href="{{url('/') }}" class="text-white"><i class="fas fa-home" style="font-size: 27px;"></i></a> / {{$event->name ?? 'Event Name'}}</p>

</section>

<section class="about mbabout">
    <div class="container">
        <div class="row">
            <!-- Main Content Column -->
            <div class="col-sm-12 col-lg-12">
                <!-- style="position: sticky;top: -33.5rem;z-index: 3;" -->
                <div class="boxshadow plt-50">
                    <div class="about__img position-static mb-4 d-block">
                        <img src="{{ $event->full_image_link }}"
                            alt="{{   $event->name }}"
                            loading="lazy" />
                    </div>
                    <div class="section__title">
                        <h2 class="fxl">{{ data_get($event, 'name') }}</h2>
                    </div>
                    <div class="about__content blog-post-content mb-0">
                        {!! data_get($event, 'description') !!}
                    </div>

                    <div class="py-3">
                        <a href="" class="l__button l__button--primary bookacatering"
                            data-name="{{$event->name}}"
                            data-bs-toggle="modal" data-bs-target="#bookacatering">Reserve</a>
                    </div>

                    @if(isset($event) && $event->eventfaqs->isNotEmpty())


                    <div class="faq ">
                           <h2 class="section-title">Frequently Asked Questions</h2>
                        <div class="faq__accordion ">
                            <div class="accordion custom__accordion ">
                                @foreach($event->eventfaqs as $faq)
                                <div class="accordion__item  ">
                                    <div class="accordion__item--title" href="javascript:void(0)">
                                        {{ $faq->question ?? '' }}
                                        <i class="fas fa-chevron-down"></i>
                                    </div>
                                    <div class="accordion__item--content">
                                        <div>
                                            <p>{!! $faq->answer ?? '' !!}</p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <!-- <div class="accordion__item  ">
                                    <div class="accordion__item--title" href="javascript:void(0)">
                                        "No FAQs available for this event"
                                        <i class="fas fa-chevron-down"></i>
                                    </div>
                                    <div class="accordion__item--content">
                                        <div>
                                            <p> "No FAQs available for this event"</p>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>

                    @endif
                </div>

            </div>
        </div>

    </div>
</section>
@include('site.pages.cateringpopup')



@endsection