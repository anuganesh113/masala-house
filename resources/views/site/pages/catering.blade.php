@extends('site.layouts.layout')
@section('page_title', 'catering')

@section('content')

<!-- page banner start -->
<section class="banner banner__page">
    <div class="banner__page--img">
        <img src="{{ asset ('site-assets/images/about/about-banner.png') }}"
            alt="" />
    </div>
    <div class="banner__page--content">
        <h1>{{ data_get($page, 'title') }}</h1>
        {!! data_get($page, 'excerpt') !!}
    </div>
</section>
<!-- page banner end -->

<!-- catering section start -->
<section class="catering">
    <div class="container">
        <div class="section__title catering__title text-center">
            <h5>{{ data_get($service, 'title') }}</h5>
            <h2>{{ strip_tags(data_get($service, 'excerpt')) }}</h2>
        </div>
    </div>
    <div class="catering__wrapper">
        <div class="catering__wrapper--box">
            <div class="row">
                <div class="col-lg-6">
                    <div class="catering__card">
                        <div class="catering__card--content">
                            <div class="section__title">
                                <h6>For your Customised Events </h6>
                                <h2>Food Tray Service</h2>
                            </div>
                            <div class="content">
                                <p>Perfect for DIY events in Concord and the East Bay, you can order freshly
                                    prepared food trays, ready to serve at your Concord location. Choose from a
                                    variety of authentic Indian and Nepali dishes, with pricing based on tray size.
                                    Delivery is available throughout Contra Costa and the surrounding areas, making
                                    it easy to enjoy flavorful cuisine at your next gathering.</p>
                            </div>
                            <div class="box">
                                <h3>Included Services</h3>
                                @include("site.includes.events-faq")
                            </div>
                            <div class="btn__group">
                                <button class="l__button l__button--primary">Reserve</button>
                                <!-- <button class="l__button l__button--secondary" data-name="Food Tray Service">Contact us</button> -->

                                <a href="" class="l__button l__button--secondary bookacatering"
                                 data-name="Food Tray Service"
                                data-bs-toggle="modal" data-bs-target="#bookacatering">Contact us</a>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="catering__card--img mb-4 mb-lg-0"
                        style="background-image: url('../../site-assets/images/catering/catering-1.png');">
                    </div>
                </div>
            </div>
        </div>
        <div class="catering__wrapper--box">
            <div class="row">
                <div class="col-lg-6">
                    <div class="catering__card">
                        <div class="catering__card--content">
                            <div class="section__title">
                                <h6>For your Customised Events </h6>
                                <h2>Food Tray</h2>
                            </div>
                            <div class="content">
                                <p>Perfect for DIY events in Concord and the East Bay, you can order freshly
                                    prepared food trays, ready to serve at your Concord location. Choose from a
                                    variety of authentic Indian and Nepali dishes, with pricing based on tray size.
                                    Delivery is available throughout Contra Costa and the surrounding areas, making
                                    it easy to enjoy flavorful cuisine at your next gathering.</p>
                            </div>
                            <div class="box">
                                <h3>Included Services</h3>
                                @include("site.includes.events-faq")
                            </div>
                            <div class="btn__group">
                                <button class="l__button l__button--primary">Reserve</button>
                                 <a href="" class="l__button l__button--secondary bookacatering"
                                 data-name="Food Tray"
                                data-bs-toggle="modal" data-bs-target="#bookacatering">Contact us</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="catering__card--img mb-4 mb-lg-0"
                        style="background-image: url('../../site-assets/images/catering/catering-1.png');">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- catering section end -->

<!-- text slider section start -->
<section class="textSlider">
    @include("site.includes.text-slider")
</section>
<!-- text slider section end -->

<!-- service section start -->
<section class="service">
    <div class="container">
        <div class="section__title catering__title text-center">
            <h5>Welcome to Masala House Catering!</h5>
            <h2>Why Choose Our Concord Catering Services</h2>
            <p>Experience the best of Indian and Nepali catering with Masala House in Concord, CA</p>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-3 g-xxl-5 g-4">

            @foreach($services ?? [] as $service)
            <div class="col">
                <div class="service__card">
                    <div class="service__card--icon">
                        <img src="{{ asset(sprintf('%s%s', \App\Enums\UploadFilePath::SERVICES_PATH, data_get($service, 'image'))) }}"
                            alt="{{ data_get($service, 'image') }}" />
                    </div>
                    <div class="service__card--content">
                        <h3>{{ data_get($service, 'name') }}</h3>
                        <p>{!! data_get($service, 'excerpt') !!}</p>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>
<!-- service section end -->


<!-- area covered start -->
<section class="area">
    <div class="container">
        <div class="section__title text-center">
            <h5>Our Areas Covered</h5>
            <h2>Catering Service Areas Covered</h2>
            <p>We proudly offer our catering services throughout Contra Costa County and beyond</p>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row row-cols-2 row-cols-sm-2 row-cols-md-2 row-cols-lg-4">
            <div class="col">
                <div class="area__card">
                    <h3>Central County</h3>
                    <ul>
                        <li>Concord</li>
                        <li>Pleasant Hill</li>
                        <li>Walnut Creek</li>
                        <li>Clayton</li>
                        <li>Martinez</li>
                    </ul>
                </div>
            </div>
            <div class="col">
                <div class="area__card">
                    <h3>East County</h3>
                    <ul>
                        <li>pittisburg</li>
                        <li>anticoh</li>
                        <li>brentwood</li>
                        <li>okaley</li>
                        <li>bay point</li>
                    </ul>
                </div>
            </div>
            <div class="col">
                <div class="area__card">
                    <h3>South County</h3>
                    <ul>
                        <li>Concord</li>
                        <li>Pleasant Hill</li>
                        <li>Walnut Creek</li>
                        <li>Clayton</li>
                        <li>Martinez</li>
                    </ul>
                </div>
            </div>
            <div class="col">
                <div class="area__card">
                    <h3>West County</h3>
                    <ul>
                        <li>pittisburg</li>
                        <li>anticoh</li>
                        <li>brentwood</li>
                        <li>okaley</li>
                        <li>bay point</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- area covered end -->


<!-- testimonial section start -->
<section class="testimonial testimonial__catering">
    <div class="container">
        @include("site.includes.testimonial")
    </div>
</section>
<!-- testimonial section end -->


<!-- our location section end -->
<section class="location">
    <div class="container-fluid">
        <div class="section__title">
            <h6>Give us a visit</h6>
            <h2>Our Location</h2>
        </div>
    </div>
    <div class="map">
     <iframe src=" {!! data_get($setting, 'metadata.google_map_iframe') !!}" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</section>
<!-- our location section end -->



<div class="modal fade bookingForm" id="bookacatering" tabindex="-1" aria-labelledby="bookatableModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered modal-xl">
      <div class="modal-content">
         <div class="modal-body">
            <form action="{{ route('site.catering.booking') }}" method="post" class="form">
                @csrf
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class='bx bx-x'></i></button>
               <h5>Reservation</h5>
               <input name="namecatering" value="" id="namecatering" type="hidden">
               <h2>book a catering service</h2>
               <div class="form__group">
                  <label for="" class="form-label">Your name</label>
                  <input type="text" class="form-control" name="name" placeholder="Your name" required>
               </div>
                    <div class="form__group">
                  <label for="" class="form-label">Your Email</label>
                  <input type="email" class="form-control" name="email" placeholder="Your email" required>
               </div>
               <div class="form__group">
                  <label for="" class="form-label">Select date</label>
                  <input type="date" class="form-control" name="date" placeholder="Select date">
               </div>
               <div class="form__group">
                  <label for="" class="form-label">Select time</label>
                  <input type="time" class="form-control" name="time" placeholder="Select time">
               </div>
               <div class="form__group">
                  <label for="" class="form-label">Number of persons</label>
                  <select name="Number_of_persons" id="" class="form-select">
                     <option value="">Number of persons</option>
                     <option value="">1 - 2 persons</option>
                     <option value="">2 - 5 persons</option>
                     <option value="">5 - 10 persons</option>
                  </select>
               </div>
               <div class="form__group">
                  <label for="" class="form-label">Contact Number</label>
                  <input type="text" class="form-control" name="phone" placeholder="Contact Number">
               </div>
               <div class="form__group">
                  <div class="btn__group">
                     <button type="submit" class="l__button l__button--primary">Book now</button>
                    
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>



@endsection

@push('footer')

<script>
    $('.bookacatering').click(function(e) {
        e.preventDefault();
        var name = $(this).data('name');
        $('#namecatering').val(name);
        $('#bookacatering .modal-body h2').text('Book a ' + name);
        $('#bookacatering').modal('show');
    });


    </script>
<!-- owl carousel -->
<script>
    $('.textSlider__carousel').owlCarousel({
        loop: true,
        center: true,
        margin: 90,
        responsiveClass: true,
        autoplay: true,
        autoplayHoverPause: true,
        slideTransition: 'linear',
        autoplaySpeed: 10000,
        smartSpeed: 6000,
        autoWidth: true,
        navText: [
            '<i class="fas fa-chevron-left"></i>',
            '<i class="fas fa-chevron-right"></i>'
        ],
        responsive: {
            0: {
                items: 1,
                dots: false,
                nav: false,
            },
            767: {
                items: 2,
                dots: false,
            },
            991: {
                items: 3,
                dots: false,
            },
            1200: {
                items: 3,
                dots: false,
            },
        },
    })
    .on('changed.owl.carousel', function(event) {
        // Remove active class from all items
        $('.textSlider__carousel .owl-item').removeClass('is-center-active');

        // Get the centered item index
        var current = event.item.index;

        // Add active class to the centered item
        $('.textSlider__carousel .owl-item').eq(current).addClass('is-center-active');
    });

    $('.testimonial__carousel').owlCarousel({
        loop: false,
        margin: 0,
        responsiveClass: true,
        autoplay: true,
        autoplayHoverPause: true,
        autoplaySpeed: 600,
        navText: [
            '<i class="fas fa-chevron-left"></i>',
            '<i class="fas fa-chevron-right"></i>'
        ],
        responsive: {
            0: {
                items: 1,
                dots: true,
                nav: false,
            },
            767: {
                items: 1,
                dots: true,
                nav: false,
            },
            1000: {
                items: 1,
                dots: true,
                nav: false,
            },
            1200: {
                items: 1,
                dots: true,
                nav: false,
            },
        },
    }, );
</script>
@endpush
