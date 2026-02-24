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
                                @foreach ($category->menusOrdered as $item)
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
                                            <div class="menuFlex__card--text">
                                                <p class="text">
                                                    {{strip_tags(substr($item->excerpt, 0, 280))}}
                                                </p>
                                                <span class="cat">{{ checkVegetarian($item->type) }}</span>
                                                <a class="order-btn" href="{{ requesturl() }}">order now</a>
                                            </div>
                                            <!-- <div class="menuFlex__card--quantity">
                                                                                                                                <h5>Quantity : </h5>
                                                                                                                                <div class="box" data-quantity="">
                                                                                                                                    <button class="quantity-btn" data-quantity-minus="">
                                                                                                                                        <i class='bx bx-minus'></i>
                                                                                                                                    </button>
                                                                                                                                    <input type="number" class="quantity-input" data-quantity-target=""
                                                                                                                                        value="1" step="1" min="1" max="" name="quantity" />
                                                                                                                                    <button class="quantity-btn" data-quantity-plus="">
                                                                                                                                        <i class='bx bx-plus'></i>
                                                                                                                                    </button>
                                                                                                                                </div>
                                                                                                                            </div> -->
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="item" style="padding: 40px">

                                @foreach ($category->menus as $item)
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
                                            <div class="menuFlex__card--text">
                                                <p class="text">

                                                    {{strip_tags(substr($item->excerpt, 0, 280))}}

                                                </p>
                                                <span class="cat">{{ checkVegetarian($item->type) }}</span>
                                                <a href="{{ requesturl() }}">order now</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- <div class="meta">
                                                                                <a href="{{ url('checkout') }}" class="l__button l__button--primary">complete order</a>
                                                                                <div id="counter"></div>
                                                                            </div> -->
                    </div>
                </div>
            </div>
            <!-- <div id="fraction-pagination">1 / 12</div> -->
        </div>
    </section>

@endforeach