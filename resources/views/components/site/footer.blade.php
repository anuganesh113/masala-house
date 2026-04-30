<footer class="footer">
   <div class="container-fluid">
      <div class="footer__top">
         <a href="{{ url('/') }}" class="white logo">
            <img
               src="{{ asset(sprintf('%s%s', App\Enums\UploadFilePath::LOGO_PATH, data_get($setting, 'white_logo'))) }}"
               alt="white logo">
         </a>
         <ul class="footer__top--nav d-none d-lg-flex">
            <li>
               <a href="{{ url('/') }}" class="{{ request()->is('/') ? 'active' : '' }}">Home</a>
            </li>
            @foreach(footerPages() ?? [] as $page)
            <li>
               <a href="{{ url(data_get($page, 'slug')) }}">{{ data_get($page, 'name') }}</a>
            </li>
            @endforeach


         </ul>
         <ul class="social__icon">
            @if(data_get($setting, 'social.facebook'))
            <li>
               <a target="_blank" href="{{ data_get($setting, 'social.facebook') }}">
                  <i class="fab fa-facebook-f"></i>
               </a>
            </li>
            @endif
            @if(data_get($setting, 'social.twitter'))

            <li>
               <a target="_blank" href="{{ data_get($setting, 'social.twitter') }}">
                  <i class="fab fa-twitter"></i>
               </a>
            </li>
            @endif
            @if(data_get($setting, 'social.instagram'))
            <li>
               <a target="_blank" href="{{ data_get($setting, 'social.instagram') }}">
                  <i class="fab fa-instagram"></i>
               </a>
            </li>
            @endif
            @if(data_get($setting, 'social.youtube'))
            <li>
               <a target="_blank" href="{{ data_get($setting, 'social.youtube') }}">
                  <i class="fab fa-youtube"></i>
               </a>
            </li>
            @endif
         </ul>
      </div>
      <div class="row">
         <div class="col-lg-12 col-md-12"> ">
            <ul class="footer__top--nav d-block d-lg-none mobfooter">
               <!-- <li>
                  <a href="{{ requesturl() }}">Order Now</a>
               </li>
               <li>
                  <a href="{{ url('menu') }}">menu</a>
               </li>
                  <li>
                  <a href="{{ url('privacy-policy') }}">Privacy Policy</a>
               </li>
                </li>
                  <li>
                  <a href="{{ url('terms-conditions') }}">Terms & Conditions</a>
               </li> -->
               


               
               @foreach(footerPages() ?? [] as $page)
               <li>
                  <a href="{{ url(data_get($page, 'slug')) }}" class="font-san">{{ data_get($page, 'name') }}</a>
               </li>
               @endforeach

            </ul>
         </div>
         <div class="col-lg-12  ">
            <div class="footer__middle">
               <div class="box section__title ">
                  <h2>Opening Hours</h2>
                  <p style="font-weight: 400;"> {!! data_get($setting, 'metadata.opening_days') !!} </p>

                   
                 <h2 class=""><i class="fa-solid fa-clock org_color" style="font-size: 20px;"></i>  {!! data_get($setting, 'metadata.opening_time') !!} </h2>
                  <!-- @include('components.site._openingpopup') -->
               
               </div>
               <div class="box">
                  <h2 class="font-san">Book a Table</h2>
                  <p>{!! data_get($setting, 'footer_text') !!}</p>
                  
               </div>
               <div class="box">
                  <h2 class="font-san">Our Address</h2>
                  <p>{{ data_get($setting, 'address') }}</p>
            <a href="tel:{{ data_get($setting, 'contact') }}" class="number"><i class="fas fa-phone"></i> {{ data_get($setting, 'contact') }}</a>

               </div>
            </div>
         </div>
      </div>
      <div class="footer__middle footer__middle--mb d-lg-none">
         <div class="box">
            <h2 class="font-san">Book a Table</h2>
            <p>{!! data_get($setting, 'footer_text') !!}</p>
         </div>
      </div>
      <div class="footer__bottom">
         <p>© {{ date('Y') }} {{ config('app.name') }}. All Rights Reserved.</p>
      </div>
   </div>
</footer>

<!-- Modal -->
@include('components.site.tablepopup')