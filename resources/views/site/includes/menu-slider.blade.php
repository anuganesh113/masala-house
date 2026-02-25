@foreach ($categories->take(1) as $category)
   @foreach ($category->menus->take(4) as $menu)
      <div class="item" style="margin-right: -20px;">
         <div class="menu__card menu__card--family">
            <div class="menu__card--img">
               <a href="{{ requesturl() }}">
                  <img class="owl-lazy"
                     data-src="{{ asset(sprintf('%s%s', \App\Enums\UploadFilePath::MENUS_PATH, data_get($menu, 'image'))) }}"
                     alt="{{ $menu->name }}">
               </a>
               <div class="icon">
                  <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512"
                     height="512" x="0" y="0" viewBox="0 0 48 48" style="enable-background:new 0 0 512 512"
                     xml:space="preserve" class="">
                     <g>
                        <g fill="#000">
                           <path
                              d="M22.286 0c-.94 0-1.7.767-1.7 1.714h-.014V15.43a1.714 1.714 0 1 1-3.429 0V1.714h-.013C17.13.767 16.368 0 15.429 0c-.94 0-1.701.767-1.701 1.714h-.013V15.43a1.714 1.714 0 1 1-3.429 0V1.714C10.286.767 9.524 0 8.586 0c-.94 0-1.702.767-1.702 1.714h-.027v17.143c0 2.109 2.116 3.921 5.143 4.715v21a3.429 3.429 0 0 0 6.857 0v-21C21.884 22.778 24 20.966 24 18.857V1.714h-.013C23.987.767 23.225 0 22.286 0zM40.286 0c-6.154 0-11.142 10.745-11.142 24 0 1.164.038 2.309.113 3.429h5.03V44.57a3.429 3.429 0 0 0 6.857 0V.07a5.295 5.295 0 0 0-.858-.07z"
                              fill="#000000" opacity="1" data-original="#000000" class=""></path>
                        </g>
                     </g>
                  </svg>

               </div>
            </div>
            <div class="menu__card--content">
               <div class="menu__card--header">
                  <h3>
                     <a href="{{ requesturl() }}">{{ $menu->name }}</a>
                  </h3>
                  <div class="menu__card--price">${{ $menu->price }}</div>
               </div>
               <p class="text">{!! $menu->excerpt ?? 'no description available ' !!}</p>
               <div class="menu__card--footer">
                  <span class="badge badge--category">{{ checkVegetarian($menu->type) }}</span>
                  <a class="menu__card--cta order-now-btn" href="{{ requesturl() }}">Order Now</a>
               </div>
            </div>
         </div>
      </div>
   @endforeach
@endforeach