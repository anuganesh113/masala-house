<div class="testimonial__box">
    <h2>Compliments to the chef</h2>
    <div class="testimonial__box--flex">
        <div class="icon">
            <img src="{{ asset ('site-assets/images/about/testimonial.png') }}"
                 alt="testimonial"
            />
        </div>
        <div class="owl-carousel owl-theme testimonial__carousel">

            @foreach($compliments ?? [] as $compliment)
                <div class="item">
                    <div class="testimonial__card">
                        <div class="testimonial__card--content">
                            {!! data_get($compliment, 'message') !!}
                            <h6 class="post">— {{ $compliment->name }}, {{ data_get($compliment, 'member.name') }}</h6>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>
