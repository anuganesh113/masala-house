@extends('site.layouts.layout')
@section('page_title', 'contact')

@section('content')

<!-- page banner start -->
<section class="banner banner__page">
   <div class="banner__page--img">
      <img src="{{ asset('site-assets/images/about/about-banner.png') }}" alt="">
   </div>
   <div class="banner__page--content">
      <h1>Contact Us</h1>
      <p>Connect with us & Visit Masala House </p>
   </div>
</section>
<!-- page banner end -->


<!-- contact start -->
<section class="contact">
   <div class="container">
      <div class="section__title text-center">
         <h5>Connect with our Team</h5>
         <h1>How meaningful bonds connect hearts, homes, and hope.</h1>
      </div>
   </div>
   <div class="row mb-5">
      <div class="col-lg-6">
         <div class="map" style="width: 100%; height: 100%;">
            <iframe src=" {!! data_get($setting, 'metadata.google_map_iframe') !!}" width="600" style="border:0;height: 60.1rem;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            
         </div>
      </div>

      <div class="col-lg-6 ">

         <div class="">
            @if ( Session::has('success'))
            <div class="alert alert-success" align="center">
               <p>{{ Session::get('success') }}</p>
            </div>
            @endif
            <form action="{{ route('site.contact.save') }}" method="post" class="form" style="margin-top: 0;">
               @csrf
               <h6>Contact US</h6>
               <h2>Connect with Masala House</h2>
               <div class="form__group">
                  <label for="" class="form-label">Your name <span  class="text-danger"> *</span></label>
                  <input type="text" name="contact[name]" class="form-control" placeholder="Your name" required>
               </div>
               <div class="form__group">
                  <label for="" class="form-label">Email <span  class="text-danger"> *</span></label>
                  <input type="email" name="contact[email]" class="form-control" placeholder="Email" required>
               </div>
               <div class="form__group">
                  <label for="" class="form-label">Select time <span  class="text-danger"> *</span></label>
                  <input type="time" name="contact[time]" class="form-control" placeholder="Select time" required>
               </div>
               <div class="form__group">
                  <label class="form-control-label">Message:</label>
                  <textarea class="form-control m-input" name="contact[message]" rows="5" id="message"></textarea>
               </div>

               <div class="form__group mb-0">
                  <div class="btn__group">
                     <button type="submit" class="l__button l__button--primary">send</button>
                     <button class="l__button l__button--secondary">cancel</button>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</section>
<!-- contact end -->


<!-- contact info start -->
<section class="contact__info">
   <div class="container-fluid">
      <div class="row g-4">
         <div class="col-lg-4 col-md-6">
            <div class="section__title">
               <h4>Need a private Space ?</h4>
               <h2>
                  Reserve a Table
                  <span>Lets talk</span>
               </h2>
            </div>
         </div>
         <div class="col-lg-3 col-md-6">
            <div class="contact__info--box">
               <h2>Write to us</h2>
               <ul>
                  <li>
                     <a href="mailto:info@gmail.com">info@gmail.com</a>
                  </li>
                  <li>
                     <a href="mailto:sales@gmail.com">sales@gmail.com</a>
                  </li>
               </ul>
            </div>
         </div>
         <div class="col-lg-3 col-md-6">
            <div class="contact__info--box">
               <h2>Follow us</h2>
               <ul>
                  <li>
                     <i class="fab fa-facebook-f"></i>
                     <a target="_blank" href="">Masala house in Facebook</a>
                  </li>
                  <li>
                     <i class="fab fa-instagram"></i>
                     <a target="_blank" href="">Masala house in Instagram</a>
                  </li>
                  <li>
                     <i class="fab fa-tiktok"></i>
                     <a target="_blank" href="">Masala house in Tiktok</a>
                  </li>
               </ul>
            </div>
         </div>
         <div class="col-lg-2 col-md-6">
            <div class="contact__info--box">
               <h2>Call us</h2>
               <ul>
                  <li>
                     <a href="tel:5258470411">(525) 847-0411</a>
                  </li>
               </ul>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- contact info end -->

@endsection