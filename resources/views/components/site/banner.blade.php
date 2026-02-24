<section class="banner banner__slider">
    <div class="owl-carousel owl-theme banner__carousel">

        @foreach($banners ?? [] as $banner)
            <div class="item">
                <div class="banner__card"
                    style="background-image: url({{ asset(sprintf('%s%s', \App\Enums\UploadFilePath::BANNERS_PATH, $banner->image)) }});">
                    <div class="banner__card--content">
                        <div class="container-fluid">
                            <div class="section__title">
                                <h4>{{ $banner->name }}</h4>
                                <h2>{{ $banner->title }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</section>