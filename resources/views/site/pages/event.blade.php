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
                <div class="event__left" style="background-image: url('../../site-assets/images/events.png');">
                    <!-- <div class="event__img">
                                                                                                                                                        <img src="{{ asset ('site-assets/images/events.png') }}" alt="">
                                                                                                                                                    </div> -->
                    <ul class="tab__buttons">
                        <li class="tab__buttons--btn active eventtabbtn" data-event-name="lunch-combo" data-target="#eventTab1">
                            <span></span> Lunch Combo
                        </li>
                        <li class="tab__buttons--btn eventtabbtn" data-event-name="wedding-events" data-target="#eventTab2">
                            <span></span> Wedding Events
                        </li>
                        <li class="tab__buttons--btn eventtabbtn"    data-event-name="festive-events" data-target="#eventTab3">
                            <span></span> Festive Events
                        </li>
                        <li class="tab__buttons--btn eventtabbtn" data-event-name="personal-events" data-target="#eventTab4">
                            <span></span> Personal Events
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="tab__contents">
                    <div id="eventTab1" class="tab__contents--text active">
                        <div class="">
                            <div class="title">
                                <h3>Corporate Events</h3>
                                <p>Choose our best venue and Dining Services for your
                                    next big Event </p>
                            </div>
                            <div class="content">
                                <p>Masala House was founded in 2015 by Chef Raj Sharma with a simple mission: to bring the authentic flavors of India to Pittsburg, California. Born and raised in Delhi, Chef Raj learned the art of Indian cooking from his grandmother, who taught him the importance of freshly ground spices and traditional cooking techniques</p>
                            </div>
                            <div class="box">
                                <h3>Service Contains</h3>
                                @include("site.includes.events-faq")
                            </div>
                        </div>
                    </div>
                    <div id="eventTab2" class="tab__contents--text">
                        <div class="">
                            <div class="title">
                                <h3>Wedding Events</h3>
                                <p>Choose our best venue and Dining Services for your
                                    next big Event </p>
                            </div>
                            <div class="content">
                                <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                    when an unknown printer took a galley of type and scrambled it to make a type
                                    specimen book. It has survived not only five centuries, but also the leap into
                                    electronic typesetting, remaining essentially unchanged. It was popularis</p>
                            </div>
                            <div class="box">
                                <h3>Service Contains</h3>
                                @include("site.includes.events-faq")
                            </div>
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
                                <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                    when an unknown printer took a galley of type and scrambled it to make a type
                                    specimen book. It has survived not only five centuries, but also the leap into
                                    electronic typesetting, remaining essentially unchanged. It was popularis</p>
                            </div>
                            <div class="box">
                                <h3>Service Contains</h3>
                                @include("site.includes.events-faq")
                            </div>
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
                                <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                    when an unknown printer took a galley of type and scrambled it to make a type
                                    specimen book. It has survived not only five centuries, but also the leap into
                                    electronic typesetting, remaining essentially unchanged. It was popularis</p>
                            </div>
                            <div class="box">
                                <h3>Service Contains</h3>
                                @include("site.includes.events-faq")
                            </div>
                        </div>
                    </div>
                    <div class="btn__group justify-content-lg-end mt-0">
                        <button class="l__button l__button--primary">Get Quote</button>
                        <a href="/contact" class="l__button l__button--secondary">Contact us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@push('footer')
<script>
  
    
    $('document').ready(function() {
        $('.eventtabbtn').click(function() {
            var target = $(this).data('target');
            var eventName = $(this).data('event-name');
            // alert(target);
            // alert(eventName);
            // $('.eventtabbtn').removeClass('active');
            // $(this).addClass('active');
            // $('.tab__contents--text').removeClass('active');    
            // $(target).addClass('active');
        });
    });
    </script>
@endpush