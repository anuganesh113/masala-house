<div class="modal fade bookingForm" id="bookatableModal" tabindex="-1" aria-labelledby="bookatableModalLabel"
   aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered modal-xl">
      <div class="modal-content">
         <div class="modal-body">
            <form action="{{ route('site.table.book') }}" method="post" class="form" id="bookingtableForm">
               @csrf
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                     class='bx bx-x'></i></button>
               <h5>Reservation</h5>
               <h2>book a table</h2>
               <input type="hidden" class="form-control" name="table[booked]" value="Table Book Reservation Inquire"  placeholder="Your Full name" >
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
                  <input type="date"  name="table[date]" class="form-control datepicker-field" placeholder="Select date" 
       required>
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
                  <label for="" class="form-label">Contact Number <em class="text-danger">*</em><span class="invalid-feedback phone-error-table"> Please enter a valid 10-digit US phone number</span></label>
                  <div class="input-group">
                     <select class="form-control country-code" name="table[countrycode]" style="max-width: 120px;">
                        <option value="+1" selected>USA (+1)</option>
                     </select>
                     <input type="tel" name="table[phone]" pattern="[0-9+\-\s]{10,15}"
                        class="form-control checkphone tablepopup" placeholder="Phone Number" required>
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

@push('footer')

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
      $('.tablepopup').on('input', function() {
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


      $('#bookingtableForm').on('submit', function(e) {
         const phoneValue = $('.tablepopup').val();
         const countryCode = $('.country-code').val();

         // Combine country code and phone number for validation
         const fullNumber = countryCode + phoneValue;

         if (!validateUSPhone(phoneValue) && !validateUSPhone(fullNumber)) {
            e.preventDefault();
            $('.tablepopup').addClass('is-invalid');
            $('.phone-error-table').show();

            // Scroll to phone field
            $('.tablepopup')[0].scrollIntoView({
               behavior: 'smooth',
               block: 'center'
            });
         } else {
            $('.tablepopup').removeClass('is-invalid');
            $('.phone-error-table').hide();
         }
      });

      // Validate on form submission

      // Real-time validation on blur
      // $('.tablepopup').on('blur', function() {
      //     if ($(this).val() && !validateUSPhone($(this).val())) {
      //         $(this).addClass('is-invalid');
      //         $('.phone-error-table').show();
      //     } else {
      //         $(this).removeClass('is-invalid');
      //         $('.phone-error-table').hide();
      //     }
      // });

      // Clear validation when modal is closed
      $('#bookatableModel').on('hidden.bs.modal', function() {
         $('#bookingtableForm')[0].reset();
         $('.tablepopup').removeClass('is-invalid');
         $('.phone-error-table').hide();
      });

      // Validate on country code change
      // $('.country-code').on('change', function() {
      //     if ($('.tablepopup').val()) {
      //         $('.tablepopup').trigger('blur');
      //     }
      // });
   });
</script>
@endpush