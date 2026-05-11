@push('header')
<style>

   .clicksquare.viewmobileplus{
      display: none;
   }
   /* Mobile Nav CSS (only for mobile & tablet) */
@media (max-width: 991.98px) {
   .viewmobil{
     display:block!important; 
   }

   .clicksquare{
      display: none;
   }
}


   </style>
@endpush


<header class="main-header-two" id="myHeader">
   <div class="main-header__wrapper">
      <nav class="main-menu main-menu-two">
         <div class="main-menu-two__wrapper">
            <div class="container-fluid">
               <div class="main-menu-two__wrapper-inner">
                  <div class="main-menu-two__logo">
                     <a href="{{ url('/') }}" class="plain">
                        <img src="{{ asset(sprintf('%s%s', App\Enums\UploadFilePath::LOGO_PATH, data_get($setting, 'white_logo'))) }}" alt="white logo">
                     </a>
                     <a href="{{ url('/') }}" class="color">
                        <img src="{{ asset(sprintf('%s%s', App\Enums\UploadFilePath::LOGO_PATH, data_get($setting, 'color_logo'))) }}" alt="color logo">
                     </a>
                  </div>
                  <div class="main-menu-two__left">
                     <div class="main-menu-two__main-menu-box">
                        <ul class="main-menu__list">
                           <li class="">
                              <a href="{{ url('/') }}" class="{{ request()->is('/') ? 'active' : '' }}">Home</a>
                           </li>

                           @foreach($pages ?? [] as $page)
                           <li class="">
                              <a href="{{ url(data_get($page, 'slug')) }}" class="{{ request()->is(data_get($page, 'slug')) ? 'active' : '' }}">
                                 {{ data_get($page, 'name') }}
                              </a>
                              <span class="lg-none"> <i class="fa fa-plus-square clicksquare d-none" style="float: right;color: white;font-size: 25px;position: relative;top: -45px;"></i></span>

                              <ul class=" viewmobilenav">
                                 <li> <a  href="" >1 </a></li>
                                 <li>  <a  href="" >2 </a></li>
                                 <li>  <a  href="" >3 </a></li>
                                 <li>  <a  href="" >sffdsfd </a></li>
                                 <li>  <a  href="" >sffdsfd </a></li>
                                 <li>  <a  href="" >sffdsfd </a></li>
                                 <li>  <a  href="" >sffdsfd </a></li>

                              </ul>
                           </li>
                           @endforeach
                           <li class="border-menu primary tb-tb">
                              <a href="" class="" data-bs-toggle="modal" data-bs-target="#bookatableModal">find a table</a>
                           </li>
                           <li class="border-menu secondary  tb-tb">
                              <a href="{{ requesturl() }}" class="" target="_blank">order now</a>
                           </li>
                        </ul>
                     </div>
                  </div>
                  <div class="main-menu-two__right d-lg-none">
                     <div class="main-menu-two__btn-box ">
                        <a href="#" class="mobile-nav__toggler clicksquare">
                           <i class="fa fa-bars ms-0"></i></a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </nav>
   </div>



   <div class="mobile-nav__wrapper">
      <div class="mobile-nav__overlay mobile-nav__toggler"></div>
      <div class="mobile-nav__content">

         <div class="logo-box">
            <a href="/"><img src="{{ asset('site-assets/images/logo.png') }}" alt="logo"></a>
            <span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>
         </div>
         <div class="mobile-nav__container"></div>

         <div class="mobile-nav__text">
            <div class="head">
               <div class="mobftlog">
               <img class="" src="{{ asset('site-assets/images/logo.png') }}" alt="logo">
               </div>
               <div class="mobile-nav__top">
                  <div class="mobile-nav__social">
                     <a target="_blank" href="{{ data_get($setting, 'social.facebook') }}"><i class="fab fa-facebook-f"></i></a>
                     <a target="_blank" href="{{ data_get($setting, 'social.twitter') }}"><i class="fab fa-twitter"></i></a>
                     <a target="_blank" href="{{ data_get($setting, 'social.instagram') }}"><i class="fab fa-instagram"></i></a>
                     <a target="_blank" href="{{ data_get($setting, 'social.youtube') }}"><i class="fab fa-youtube"></i></a>
                  </div>
               </div>
            </div>
            <div class="body">
               <h3>Book a Table</h3>
               <p>Book a your table with us give us a call or send us a message </p>
               <a href="tel:{{ data_get($setting, 'contact') }}">{{ data_get($setting, 'contact') }}</a>
            </div>
            <div class="foot">
               <p>© {{ date('Y') }} Masal House. All Rights Reserved.</p>
            </div>
         </div>
      </div>
   </div>
</header>



@push('footer')
<script>
// jQuery to toggle d-none for plus icon based on screen size
$(document).ready(function() {
   function togglePlusIcon() {
      var w = $(window).width();
      if (w >= 992) { // Desktop (lg and up)
         $(".main-menu__list .clicksquare").addClass('d-none');
      } else { // Tablet and Mobile
         $(".main-menu__list .clicksquare").removeClass('d-none');
      }
   }
   togglePlusIcon();
   $(window).on('resize', function() {
      togglePlusIcon();
   });
});
// Mobile nav and submenu toggle logic
document.addEventListener('DOMContentLoaded', function () {
   function isMobileOrTablet() {
      return window.innerWidth < 1025;
   }
   // Hamburger menu opens mobile nav
   document.querySelectorAll('.mobile-nav__toggler').forEach(function (el) {
      el.addEventListener('click', function (e) {
         if (isMobileOrTablet()) {
            e.preventDefault();
            document.querySelector('.mobile-nav__wrapper').classList.add('active');
            document.body.classList.add('mobile-nav-active');
         }
      });
   });
   // Overlay and close button close mobile nav
   document.querySelectorAll('.mobile-nav__overlay, .mobile-nav__close').forEach(function (el) {
      el.addEventListener('click', function (e) {
         if (isMobileOrTablet()) {
            e.preventDefault();
            document.querySelector('.mobile-nav__wrapper').classList.remove('active');
            document.body.classList.remove('mobile-nav-active');
         }
      });
   });
   // Plus-square toggles its own submenu
   document.querySelectorAll('.main-menu__list .clicksquare').forEach(function (icon) {
      icon.addEventListener('click', function (e) {
         if (isMobileOrTablet()) {
            e.preventDefault();
            var parentLi = icon.closest('li');
            if (parentLi) {
               var submenu = parentLi.querySelector('.viewmobilenav');
               if (submenu) {
                  submenu.classList.toggle('active');
                  submenu.style.display = 'block';
                  if (submenu.classList.contains('active')) {
                      icon.classList.remove('fa-plus-square');
                      icon.classList.add('fa-minus-square');
                      submenu.style.display = 'block';
                  } else {
                      icon.classList.remove('fa-minus-square');
                      icon.classList.add('fa-plus-square');
                      submenu.style.display = 'none';
                  }
               }
            }
         }
      });
   });
});
</script>
@endpush


