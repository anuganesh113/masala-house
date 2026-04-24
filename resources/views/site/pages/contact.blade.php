@extends('site.layouts.layout',[
'title' => data_get($page, "seo.title") ?? 'Contact-us',
'description' => strip_tags(data_get($page, "seo.description") ?? description()),
'image' => banner() ? null : null,
'keywords' => data_get($page, "seo.keywords") ?? keywords(),
])


@section('content')

<!-- page banner start -->
<section class="banner banner__page">
   <div class="banner__page--img">
      <img src="{{ $page ?  $page->breadcrumbs_image_link : asset ('site-assets/images/about/about-banner.png') }}" alt="">
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
            <iframe src=" {!! data_get($setting, 'metadata.google_map_iframe') !!}" width="600"
               style="border:0;height: 60rem;" allowfullscreen="" loading="lazy"
               referrerpolicy="no-referrer-when-downgrade"></iframe>

         </div>
      </div>

      <div class="col-lg-6 ">

         <div class="">
            @if (Session::has('success-msg'))
            <div class="alert alert-success" align="center">
               <p>{{ Session::get('success-msg') }}</p>
            </div>
            @endif
            <form action="{{ route('site.contact.save') }}" method="post" class="form contactpageform"
               style="margin-top: 0;">
               @csrf
               <h6>Contact US</h6>
               <h2>Connect with Masala House</h2>
               <div class="form__group">
                  <label for="" class="form-label">Your Full Name <span class="text-danger"> *</span></label>
                  <input type="text" name="contact[name]" class="form-control" placeholder="Your Full Name" required>
               </div>
               <div class="form__group">
                  <label for="" class="form-label">Your Email <span class="text-danger"> *</span></label>
                  <input type="email" name="contact[email]" class="form-control" placeholder="Email" required>
               </div>

               <div class="form__group">
                  <label for="phone" class="form-label">Contact Number<em class="text-danger">*</em><span
                        class="invalid-feedback phone-error"> Please enter a valid 10-digit US phone
                        number</span></label>
                  <div class="input-group">
                     <select class="form-control country-code" id="country_code" name="contact[countrycode]"
                        style="max-width: 120px;">
                        <option value="+1" selected>USA (+1)</option>
                        <!-- <option value="+44">UK (+44)</option>
                           <option value="+61">Australia (+61)</option> -->
                     </select>
                     <input type="tel" name="contact[phone]" class="form-control checkphone phone contactpage"
                        placeholder="Phone Number" inputmode="numeric" required>
                     <!-- <div class="invalid-feedback phone-error" >
                           Please enter a valid 10-digit US phone number
                        </div> -->
                  </div>
               </div>

               <!-- <div class="form__group">
                  <label for="" class="form-label">Select Date<span class="text-danger">*</span></label>
                  <input type="text" name="contact[date]" class="form-control datepicker-field" onkeydown="return false"
                     placeholder="Select date" required>
                  <i class="fas fa-calendar" style="position: relative;bottom: 39px;float: right;margin-right: 20px;z-index: 1;opacity: 0.6;"></i>

               </div> -->


               <!-- <div class="form__group">
                  <label for="" class="form-label">Select time <span class="text-danger"> *</span></label>
                  <input type="time" name="contact[time]" class="form-control currentTimeInput" placeholder="Select time" required onkeydown="return false">
               </div> -->
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
         <div class="col-lg-3 col-md-6">
            <div class="section__title">
               <h4>Need a private Space ?</h4>
               <h2>
                  Reserve a Table
                  <span>Lets talk</span>
               </h2>
            </div>
         </div>
         <div class="col-lg-4 col-md-6">
            <div class="contact__info--box">
               <h2>Write to us</h2>
               <ul>
                  <li class="contact-item" style="align-items: center;">
                     <a href="mailto:{!! data_get($setting, 'email') !!}" ><i class="fa-solid fa-envelope"></i> {!! data_get($setting, 'email') !!}</a>
                  </li>
                  <!-- <li>
                        <a href="mailto:{!! data_get($setting, 'siteemail') !!}"><i class="fa-solid fa-envelope"></i> {!! data_get($setting, 'siteemail') !!}</a>
                     </li> -->
               </ul>
            </div>
         </div>

         <div class="col-lg-3 col-md-6">
            <div class="contact__info--box">
               <h2>Follow us</h2>
               <ul>
                  @if(data_get($setting, 'social.facebook'))
                  <li>
                     <i class="fab fa-facebook-f"></i>
                     <a style="font-weight: 700" target="_blank" href="{!! data_get($setting, 'social.facebook') !!}">Masala house in
                        Facebook</a>
                  </li>
                  @endif
                  @if(data_get($setting, 'social.instagram'))
                  <li>
                     <i class="fab fa-instagram"></i>
                     <a style="font-weight: 700" target="_blank" href="{!! data_get($setting, 'social.instagram') !!}">Masala house in
                        Instagram</a>
                  </li>
                  @endif

                  @if(data_get($setting, 'social.youtube'))
                  <li>
                     <i class="fab fa-youtube"></i>
                     <a style="font-weight: 700" target="_blank" href="{!! data_get($setting, 'social.youtube') !!}">Masala house in Youtube</a>
                  </li>
                  @endif
                  @if(data_get($setting, 'social.twitter'))
                  <li>
                     <i class="fab fa-twitter"></i>
                     <a style="font-weight: 700" target="_blank" href="{!! data_get($setting, 'social.twitter') !!}">Masala house in Twitter</a>
                  </li>
                  @endif
               </ul>
            </div>
         </div>
         <div class="col-lg-2 col-md-6">
            <div class="contact__info--box">
               <h2>Call us</h2>
               <ul>

                  <li>
                     <a style="font-weight: 700" href="tel:{!! data_get($setting, 'phone') !!}"> <i class="fa-solid fa-phone"></i>
                        {!! data_get($setting, 'phone') !!}</a>
                  </li>
               </ul>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- contact info end -->
@include('components.site.popmodel', ['id' => $page->id])
@endsection

@push('footer')

@include('_helpers._valiadtion')

<!-- 
   <script>
      $(document).ready(function() {
         function validateUSPhone(phoneNumber) {
            // Remove all non-numeric characters
            const cleaned = phoneNumber.replace(/\D/g, '');
            // Check if it's a valid US number (10 digits, area code can't start with 0 or 1)
            const phoneRegex = /^[2-9]\d{2}[2-9]\d{2}\d{4}$/;
            // Handle numbers that might include country code
            let numberToCheck = cleaned;
            if (cleaned.length === 11 && cleaned.startsWith('1')) {
               numberToCheck = cleaned.substring(1);
            }
            return phoneRegex.test(numberToCheck) && numberToCheck.length === 10;
         }
         // Format phone number as user types
         $('.contactpage').on('input', function() {
            let value = $(this).val();
            // Remove any non-numeric characters
            let numeric = value.replace(/\D/g, '');
            // Format based on length
            if (numeric.length > 0) {
               if (numeric.length <= 3) {
                  value = numeric;
               } else if (numeric.length <= 6) {
                  value = numeric.slice(0, 3) + '-' + numeric.slice(3);
               } else {
                  value = numeric.slice(0, 3) + '-' + numeric.slice(3, 6) + '-' + numeric.slice(6, 10);
               }
            }

            $(this).val(value);
         });


         $('.contactpageform').on('submit', function(e) {
            const phoneValue = $('.contactpage').val();
            const countryCode = $('.country-code').val();

            // Combine country code and phone number for validation
            const fullNumber = countryCode + phoneValue;

            if (!validateUSPhone(phoneValue) && !validateUSPhone(fullNumber)) {
               e.preventDefault();
               $('.contactpage').addClass('is-invalid');
               $('.phone-error').show();

               // Scroll to phone field
               $('.contactpage')[0].scrollIntoView({
                  behavior: 'smooth',
                  block: 'center'
               });
            } else {
               $('.contactpage').removeClass('is-invalid');
               $('.phone-error').hide();
            }
         });


      });
   </script> -->
@endpush