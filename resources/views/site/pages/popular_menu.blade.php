@foreach ($categories->take(1) as $category)
    <section class="popular p__tb">
        <div class="container">
            <div class="section__title text-center">
                <h5>Quick Grab , Choose from our delicious collection</h5>
                <h2>{{ $category->name }}</h2>
            </div>
            <div class="row">
                <div class="col-lg-7 offset-lg-5">
                    <div class="popular__box">
                        <div class="owl-carousel owl-theme popular__carousel">
                            <div class="item" style="padding: 40px">
                                @foreach ($category->menusOrdered->take(4) as $item)
                                    <div class="menuFlex__card">
                                        <div class="img d-lg-none">
                                            <img src="{{ asset(sprintf('%s%s', App\Enums\UploadFilePath::MENUS_PATH, data_get($item, 'image'))) }}"
                                                class="img-2" alt="">
                                        </div>
                                        <div class="contents">
                                            <div class="menuFlex__card--title">
                                                <h3 class="name">{{ $item->name }}</h3>
                                                <span class="price">${{ $item->price }}</span>
                                            </div>
                                            <div class="popular_cont">
                                                <p class="text">
                                                    {!!strip_tags(substr($item->excerpt, 0, 180))!!}
                                                </p>
                                                <span class="cat bg-green bt-fr">{{ checkVegetarian($item->type) }}</span>

                                                <a class="order-btn wtc" href="{{ requesturl() }}">order now</a>

                                            </div>
                                     
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="item" style="padding: 40px">

                                @foreach ($category->menus->take(4) as $item)
                                    <div class="menuFlex__card">
                                        <div class="img d-lg-none">
                                            <img src="{{ asset(sprintf('%s%s', App\Enums\UploadFilePath::CATEGORIES_PATH, data_get($category, 'image'))) }}"
                                                class="img-2" alt="">
                                        </div>
                                        <div class="contents">
                                            <div class="menuFlex__card--title">
                                                <h3 class="name">{{ $item->name }}</h3>
                                                <span class="price">${{ $item->price }}</span>
                                            </div>
                                            <div class="popular_cont">
                                                <p class="text">

                                                    {!!strip_tags(substr($item->excerpt, 0, 180))!!}

                                                </p>
                                                <a class="wtc" href="{{ requesturl() }}">order now</a>
                                                <span class="cat bg-green bt-fr">{{ checkVegetarian($item->type) }}</span>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                  
                    </div>
                </div>
            </div>
            <!-- <div id="fraction-pagination">1 / 12</div> -->
        </div>
    </section>

@endforeach