<div class="modal fade bookingForm" id="bookacatering" tabindex="-1" aria-labelledby="bookatableModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered modal-xl">
      <div class="modal-content">
         <div class="modal-body">
            <form action="{{ route('site.catering.booking') }}" method="post" class="form" id="bookingcateringForm">
               @csrf
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class='bx bx-x'></i></button>
               <h5>Reservation</h5>
               <input name="catering[namecatering]" value="" id="namecatering" type="hidden">
               <h2>book a catering service</h2>
               <div class="form__group">
                  <label for="" class="form-label">Your Full Name <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="catering[name]" placeholder="Your Full Name" required>
               </div>
               <div class="form__group">
                  <label for="" class="form-label">Your Email <span class="text-danger">*</span></label>
                  <input type="email" class="form-control" name="catering[email]" placeholder="Your Email" required>
               </div>

                     <div class="form__group">
                  <label for="" class="form-label">Contact Number <em class="text-danger">*</em><span class="invalid-feedback phone-error-catering"> Please enter a valid 10-digit US phone number</span></label>
                  <div class="input-group">
                     <select class="form-control country-code" name="catering[countrycode]" style="max-width: 120px;">
                        <option value="+1" selected>USA (+1)</option>
                     </select>
                     <input type="tel" name="catering[phone]" pattern="[0-9+\-\s]{10,15}"
                        class="form-control checkphone cateinput" placeholder="Phone Number" required>
                  </div>
               </div>
               <div class="form__group">
                  <label for="" class="form-label">Select Date <span class="text-danger">*</span></label>
                  <input type="date" class="form-control datepicker-field" name="catering[date]" placeholder="Select date" onkeydown="return false" required>
               </div>
               <div class="form__group">
                  <label for="" class="form-label">Select time <span class="text-danger">*</span></label>
                  <input type="time" class="form-control" name="catering[time]" placeholder="Select time" required>
               </div>
               <div class="form__group">
                  <label for="" class="form-label">Number of Persons<span class="text-danger small no_person"></span></label>
                  <input type="number" max="100" class="form-control checknumberper" name="catering[persons]" placeholder="Number of Persons" required>

                  <!-- <select name="Number_of_persons" id="" class="form-select">
                     <option value="">Number of persons</option>
                     <option value="">1 - 2 persons</option>
                     <option value="">2 - 5 persons</option>
                     <option value="">5 - 10 persons</option>
                  </select> -->
               </div>
         
               <div class="form__group">
                  <div class="btn__group">
                     <button type="submit" class="l__button l__button--primary">Book now</button>

                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>

@push('footer')

<script>
   $('.bookacatering').click(function(e) {
      e.preventDefault();
      var name = $(this).data('name');
      $('#namecatering').val(name);
      $('#bookacatering .modal-body h2').text('Book a ' + name);
      $('#bookacatering').modal('show');


      
   });
</script>


<script>
   $(document).ready(function() {
      // US Phone Number Validation

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
      $('.cateinput').on('input', function() {
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


      $('#bookingcateringForm').on('submit', function(e) {
         const phoneValue = $('.cateinput').val();
         const countryCode = $('.country-code').val();

         // Combine country code and phone number for validation
         const fullNumber = countryCode + phoneValue;

         if (!validateUSPhone(phoneValue) && !validateUSPhone(fullNumber)) {
            e.preventDefault();
            $('.cateinput').addClass('is-invalid');
            $('.phone-error-catering').show();

            // Scroll to phone field
            $('.cateinput')[0].scrollIntoView({
               behavior: 'smooth',
               block: 'center'
            });
         } else {
            $('.cateinput').removeClass('is-invalid');
            $('.phone-error-catering').hide();
         }
      });

      // Validate on form submission

      // Real-time validation on blur
      // $('.cateinput').on('blur', function() {
      //     if ($(this).val() && !validateUSPhone($(this).val())) {
      //         $(this).addClass('is-invalid');
      //         $('.phone-error-catering').show();
      //     } else {
      //         $(this).removeClass('is-invalid');
      //         $('.phone-error-catering').hide();
      //     }
      // });

      // Clear validation when modal is closed
      $('#bookacatering').on('hidden.bs.modal', function() {
         $('#bookingcateringForm')[0].reset();
         $('.cateinput').removeClass('is-invalid');
         $('.phone-error-catering').hide();
      });

      // Validate on country code change
      // $('.country-code').on('change', function() {
      //     if ($('.cateinput').val()) {
      //         $('.cateinput').trigger('blur');
      //     }
      // });
   });
</script>
@endpush