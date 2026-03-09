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
            <li>
               <a target="_blank" href="{{ data_get($setting, 'social.facebook') }}">
                  <i class="fab fa-facebook-f"></i>
               </a>
            </li>
            <li>
               <a target="_blank" href="{{ data_get($setting, 'social.twitter') }}">
                  <i class="fab fa-twitter"></i>
               </a>
            </li>
            <li>
               <a target="_blank" href="{{ data_get($setting, 'social.instagram') }}">
                  <i class="fab fa-instagram"></i>
               </a>
            </li>
            <li>
               <a target="_blank" href="{{ data_get($setting, 'social.youtube') }}">
                  <i class="fab fa-youtube"></i>
               </a>
            </li>
         </ul>
      </div>
      <div class="row">
         <div class="col-lg-12 col-md-6 col-sm-6 col-6">
            <ul class="footer__top--nav d-block d-lg-none">
               <li>
                  <a href="{{ requesturl() }}">Order Now</a>
               </li>
               <li>
                  <a href="{{ url('menu') }}">menu</a>
               </li>
               @foreach($pages ?? [] as $page)
               <li>
                  <a href="{{ url(data_get($page, 'slug')) }}">{{ data_get($page, 'name') }}</a>
               </li>
               @endforeach

            </ul>
         </div>
         <div class="col-lg-12 col-md-6 col-sm-6 col-6">
            <div class="footer__middle">
               <div class="box">
                  <h2>Opening Hours</h2>
                  <p>Monday - Sunday</p>
                  <p>10AM - 10PM</p>
               </div>
               <div class="box">
                  <h2>Book a Table</h2>
                  <p>{{ data_get($setting, 'footer_text') }}</p>
                  <a href="tel:{{ data_get($setting, 'contact') }}"
                     class="number">{{ data_get($setting, 'contact') }}</a>
               </div>
               <div class="box">
                  <h2>Our Address</h2>
                  <p>{{ data_get($setting, 'address') }}</p>
               </div>
            </div>
         </div>
      </div>
      <div class="footer__middle footer__middle--mb d-lg-none">
         <div class="box">
            <h2>Book a Table</h2>
            <p>{{ data_get($setting, 'footer_text') }}</p>
            <a href="tel:{{ data_get($setting, 'contact') }}" class="number">{{ data_get($setting, 'contact') }}</a>
         </div>
      </div>
      <div class="footer__bottom">
         <p>© {{ date('Y') }} {{ config('app.name') }}. All Rights Reserved.</p>
      </div>
   </div>
</footer>

<!-- Modal -->
<div class="modal fade bookingForm" id="bookatableModal" tabindex="-1" aria-labelledby="bookatableModalLabel"
   aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered modal-xl">
      <div class="modal-content">
         <div class="modal-body">
            <form action="{{ route('site.table.book') }}" method="post" class="form">
               @csrf
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                     class='bx bx-x'></i></button>
               <h5>Reservation</h5>
               <h2>book a table</h2>
               <div class="form__group">
                  <label for="" class="form-label">Your Full Name<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="table[name]" placeholder="Your Full name" required>
               </div>
               <div class="form__group">
                  <label for="" class="form-label">Your Email<span class="text-danger">*</span></label>
                  <input type="email" name="table[email]" class="form-control" placeholder="Email" required>
               </div>

               <div class="form__group">
                  <label for="" class="form-label">Select Date<span class="text-danger">*</span></label>
                  <input type="date" name="table[date]" class="form-control datepicker-field" onkeydown="return false"  placeholder="Select date" required>
               </div>
               <div class="form__group">
                  <label for="" class="form-label">Select Time<span class="text-danger">*</span></label>
                  <input type="time" name="table[time]" class="form-control" placeholder="Select time" required>
               </div>
               <div class="form__group">
                  <label for="" class="form-label">Number of Persons </label>
                  <input type="number" max="100" min="1" class="form-control checknumberper" name="table[persons]" placeholder="Number of persons">
                  <!-- <select name="" id="" class="form-select">
                     <option value="">Number of persons</option>
                     <option value="">1 - 2 persons</option>
                     <option value="">2 - 5 persons</option>
                     <option value="">5 - 10 persons</option>
                  </select> -->
               </div>
               <div class="form__group">
                  <label for="" class="form-label">Contact Number <span class="text-danger contact_number">*</span></label>
                  <div class="input-group">
                     <select class="form-control country-code" name="" style="max-width: 120px;">
                        <option value="+1" selected >USA (+1)</option>
                     </select>
                     <input type="tel" name="table[phone]" pattern="[0-9+\-\s]{10,15}" 
            class="form-control checkphone" placeholder="Phone Number" required>
                  </div>
               </div>
               <div class="form__group">
                  <div class="btn__group">
                     <button type="submit" class="l__button l__button--primary">Book now</button>
                     <!-- <button class="l__button l__button--secondary">Cancel</button> -->
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>