
    @php

    if(isset($settings['section_2_background_image']) && !empty($settings['section_2_background_image'])){
        $bg = asset(sprintf('%s%s', App\Enums\UploadFilePath::HOME_PATH, $settings['section_2_background_image']));
    } else {
        $bg = asset('site-assets/images/menu.png');
    }

    @endphp
    
    <section class="popular p__tb" style="background-image: url({{ $bg }});">
        <div class="container">
            <div class="section__title text-center">
                <h5> {{ $settings['section_2_heading'] ?? 'Quick Grab , Choose from our delicious collection'  }}  </h5>
                <h2>{{ $settings['section_2_title'] ?? 'Street Foods' }}</h2>
            </div>
           
            <div class="row">
                <div class="col-lg-7 offset-lg-5">
                    <div class="popular__box">
                        <div class="owl-carousel owl-theme popular__carousel">
                            <div class="item" style="padding: 40px">
                                @foreach ($section_2 as $item)
                                    <div class="menuFlex__card">
                                        <div class="img d-lg-none">
                                            <img src="{{ asset(sprintf('%s%s', App\Enums\UploadFilePath::MENUS_PATH, data_get($item, 'image'))) }}"
                                                class="img-2" alt="{{ $item->image_alt ?? $item->name }}">
                                        </div>
                                        <div class="contents">
                                            <div class="menuFlex__card--title">
                                                <h3 class="name">{{ $item->name }}
                                              <span class="cat text-white  bt-fr mobdnone {{$item->type == 'veg' ? 'bg-green' : 'cssnonveg'}}" style="margin-left: 10px;">{{ checkVegetarian($item->type) }}</span>

                                                </h3>
                                                <span class="price">${{ $item->price }}</span>
                                            </div>
                                            <div class="popular_cont">
                                                <p class="text">
                                                    {!!strip_tags(substr($item->excerpt, 0, 180))!!}
                                                </p>
                                               <div class="d-lg-none"> 
                                                <span class="cat text-white {{$item->type == 'veg' ? 'bg-green' : 'cssnonveg'}}" >{{ checkVegetarian($item->type) }}</span>

                                                
                                                </div>
                                             
                                                <a class="order-btn wtc mt-2 viewip" href="{{ requesturl() . '/' . $item->slug  }}"  target="_blank"><i class="fas fa-shopping-cart"> </i> Order Now </a>

                                               <a class="order-btn wtc menuviewbtn mt-2 viewip" href="{{ route('site.product', ['slug' => Str::slug($item->name), 'id' => $item->id]) }}"  target="_blank" style="float: inline-end;"><i class="fas fa-search"></i> View Details </a>

                                            </div>
                                     
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="item" style="padding: 40px">

                                @foreach ($section_2 as $item)
                                    <div class="menuFlex__card">
                                        <div class="img d-lg-none">
                                            <img src="{{ asset(sprintf('%s%s', App\Enums\UploadFilePath::MENUS_PATH, data_get($item, 'image'))) }}"
                                                class="img-2" alt="{{ $item->image_alt ?? $item->name }}">
                                        </div>
                                        <div class="contents">
                                            <div class="menuFlex__card--title">
                                                <h3 class="name">{{ $item->name }}

                                                 <span class="cat text-white {{$item->type == 'veg' ? 'bg-green' : 'cssnonveg'}}" style="margin-left: 10px;">{{ checkVegetarian($item->type) }}</span>
                                                </h3>
                                               
                                            </div>
                                            <div class="popular_cont">
                                                <p class="text">

                                                    {!!strip_tags(substr($item->excerpt, 0, 180))!!}

                                                </p>
                                                   <div class="d-lg-none"> 
                                                <span class="cat text-white {{$item->type == 'veg' ? 'bg-green' : 'cssnonveg'}}" >{{ checkVegetarian($item->type) }}</span>

                                                
                                                </div>
                                             
                                                <a class="wtc mt-2 viewip" href="{{ requesturl() . '/' . $item->slug }}" target="_blank">order now</a>
                                               <a class="order-btn wtc menuviewbtn mt-2 viewip" href="{{ route('site.product', ['slug' => Str::slug($item->name), 'id' => $item->id]) }}"  target="_blank" style="float: inline-end;"><i class="fas fa-search"></i> View Details </a>


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

