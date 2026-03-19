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
</script>