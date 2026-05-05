<section class="event-bg">
    <div class="container">
        <div class="section__title text-center">
            <h5>Hosting an Event ? </h5>
            <h2>Explore our most Exquisite Indian Menu</h2>
        </div>
    </div>
</section>
<!-- bg section end -->



<!-- event section start -->
<section class="event">
    <div class="tab">
        <div class="row g-0">
            <div class="col-lg-6">
               <div class="event__left eventimg ">
                    <!-- <div class="event__img">
                                                                                                                                                        <img src="{{ asset ('site-assets/images/events.png') }}" alt="events">
                                                                                                                                                    </div> -->
                    <ul class="tab__buttons">
                        @foreach($events as $k => $event)
                        <li class="tab__buttons--btn  eventtabbtn  {{ $k === 0 ? 'active' : '' }}"
                        data-image="{{ $event->full_image_link }}"
                      
                          data-event-name="{{ $event->slug }}" data-event-target="#eventTab{{ $k + 1 }}">
                            <span></span> {{ $event->name }}
                        </li>
                        @endforeach
                        <!-- <li class="tab__buttons--btn eventtabbtn"
                        data-image="{{ asset ('site-assets/images/events.png') }}"
                      
                        data-event-name="wedding-events" data-event-target="#eventTab2">
                            <span></span> Wedding Events
                        </li>
                        <li class="tab__buttons--btn eventtabbtn"  
                        data-image="{{ asset ('site-assets/images/events.png') }}"
                      
                        data-event-name="festive-events" data-event-target="#eventTab3">
                            <span></span> Festive Events
                        </li>
                        <li class="tab__buttons--btn eventtabbtn" 
                        data-image="{{ asset ('site-assets/images/events.png') }}"
                      
                        data-event-name="personal-events" data-event-target="#eventTab4">
                            <span></span> Personal Events
                        </li> -->
                    </ul>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="tab__contents">
                      @foreach($events as $k => $event)
                    <div id="eventTab{{ $k + 1 }}" class="tab__contents--text {{ $k === 0 ? 'active' : '' }}">
                        <div class="">
                            <div class="title">
                                <h3>{{ data_get($event, 'name') }}</h3>
                                <p>{!! data_get($event, 'metadata.title') !!}</p>
                            </div>
                            <div class="content">
                                <p>{!! data_get($event, 'excerpt') !!}</p>
                            </div>
                            <div class="box" >
                                <h3>Service Contains</h3>

                       
                           
                             
                                @include("site.includes.events-faq")
                             
                            </div>
                        </div>
                         <div class="btn__group justify-content-lg-end mt-0" style="padding: 35px 50px 0 0;">
                          <a href="" class="l__button l__button--primary bookacatering"
                                 data-name="{{$event->name}}"
                                data-bs-toggle="modal" data-bs-target="#bookacatering">Reserve</a>
                                <a href="{{ route('site.event', $event->slug) }}" class="l__button l__button--primary">  
                                <i class="fas fa-search"></i>    
                                View Details  </a>

                    </div>
                    </div>
                    
                    @endforeach
                    <!-- <div id="eventTab2" class="tab__contents--text">
                        <div class="">
                            <div class="title">
                                <h3>Wedding Events</h3>
                                <p>Choose our best venue and Dining Services for your
                                    next big Event </p>
                            </div>
                            <div class="content">
                                <p>Masala House locations  offer specialized event services, 
                                    including private celebrations, weddings, anniversaries, 
                                    and corporate gatherings, featuring bespoke menus and tailored catering.
                                     Venues often highlight rooftop views, live music, and themed nights 
                                     like High Tea Buffets, retro nights, or curated wine dinners</p>
                            </div>
                            <div class="box">
                                <h3>Service Contains</h3> -->
                          
                            <!-- </div>
                        </div>
                    </div>
                    <div id="eventTab3" class="tab__contents--text">
                        <div class="">
                            <div class="title">
                                <h3>Festive Events</h3>
                                <p>Choose our best venue and Dining Services for your
                                    next big Event </p>
                            </div>
                            <div class="content">
                                <p>Marking the moments on everyone's calendar. 
                                    Our Festive Events are designed to capture the spirit of the holidays 
                                    and special seasonal occasions. With themed décor, custom menus,
                                     and an atmosphere charged with excitement, we ensure your guest
                                      list feels the magic of the moment.</p>
                            </div>
                            <div class="box">
                                <h3>Service Contains</h3> -->
                             
                            <!-- </div>
                        </div>
                    </div>
                    <div id="eventTab4" class="tab__contents--text">
                        <div class="">
                            <div class="title">
                                <h3>Personal Events</h3>
                                <p>Choose our best venue and Dining Services for your
                                    next big Event </p>
                            </div>
                            <div class="content">
                                <p>
                              Life’s most important milestones, celebrated your way. From the first birthday 
                              to the golden anniversary, we provide the setting for the moments that matter most.
                                 We believe that life is a collection of moments worth celebrating.
                                  Our "Personal Events" category is dedicated to the gatherings that
                                   fill our hearts—birthday dinners, anniversary parties, engagement celebrations,
                                    and everything in between. We handle the atmosphere so you can focus on the people
                                </p>
                            </div>
                            <div class="box">
                                <h3>Service Contains</h3> -->
                            
                            <!-- </div>
                        </div> -->
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</section>
@include('site.pages.cateringpopup')


@push('footer')
<script>
    $(document).ready(function () {

    var $eventSection = $('.event'); // scope wrapper
    var defaultImage = "{{ asset('site-assets/images/events.png') }}";

    // Set default background
    var activeImage = $eventSection.find('.eventtabbtn.active').data('image');
    $eventSection.find('.eventimg').css('background-image', 'url("' + (activeImage || defaultImage) + '")');

    function isDesktop() {
        return window.matchMedia("(min-width: 992px)").matches;
    }

    $eventSection.find('.eventtabbtn').on('click', function () {

        var $this = $(this);
        var target = $this.data('event-target');
        var eventName = $this.data('event-name');
        var image = $this.data('image');

        // Active class toggle (ONLY inside event section)
        $eventSection.find('.eventtabbtn').removeClass('active');
        $this.addClass('active');

        // Show content (ONLY inside event section)
        $eventSection.find('.tab__contents--text').removeClass('active');
        $eventSection.find(target).addClass('active');

        // Background image (ONLY inside event section)
        $eventSection.find('.eventimg').css('background-image', 'url("' + (image || defaultImage) + '")');

        // Desktop scroll only
        if (isDesktop()) {
            $('html, body').animate({
                scrollTop: $eventSection.offset().top - 50
            }, 100);
        }

        // Hidden nav sync (ONLY inside event section if exists)
        $eventSection.find('.event-hidden-nav li').removeClass('active');
        $eventSection.find('.event-hidden-nav li[data-event="' + eventName + '"]').addClass('active');

    });

});
</script>
@endpush