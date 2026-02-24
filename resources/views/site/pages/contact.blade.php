@extends('site.layouts.layout')
@section('page_title', 'contact')

@section('content')

<!-- page banner start -->
<section class="banner banner__page">
   <div class="banner__page--img">
      <img src="{{ asset ('site-assets/images/about/about-banner.png') }}" alt="">
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
   <div class="row">
      <div class="col-lg-8">
         <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3306.433960498821!2d-118.43290069999999!3d34.0327377!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2bb07feea2001%3A0x35eb8e7dab054b70!2sRichland%20Ave%2C%20Los%20Angeles%2C%20CA%2090064%2C%20USA!5e0!3m2!1sen!2snp!4v1758431380608!5m2!1sen!2snp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            <h2 class="d-none d-lg-block">GET IN TOUCH</h2>
         </div>
      </div>
      <div class="col-lg-6 offset-lg-6">
         <div class="container-fluid">
            <form action="" class="form">
               <h6>Contact US</h6>
               <h2>Connect with Masala House</h2>
               <div class="form__group">
                  <label for="" class="form-label">Your name</label>
                  <input type="text" class="form-control" placeholder="Your name">
               </div>
               <div class="form__group">
                  <label for="" class="form-label">Email</label>
                  <input type="email" class="form-control" placeholder="Email">
               </div>
               <div class="form__group">
                  <label for="" class="form-label">Select time</label>
                  <input type="" class="form-control" placeholder="Select time">
               </div>
               <div class="form__group mb-0">
                  <div class="btn__group">
                     <button class="l__button l__button--primary">send</button>
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

