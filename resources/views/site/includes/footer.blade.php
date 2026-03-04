<script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.js"></script>

<script src="{{ asset('site-assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('site-assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('site-assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('site-assets/js/main.js') }}"></script>
<script>

   $('.checkphone').on('keyup', function() {
      let value = this.value.replace(/\D/g, '');
      if (value.length > 0 && value.length < 10) {
         $('.contact_number').html('<span class="text-danger">Please enter a valid 10-digit phone number!</span>');
      } else if (value.length === 10) {
         $('.contact_number').html('');
       }
   });



$('.checkphone').on('input', function() {
    let value = this.value.replace(/\D/g, '');
    // If more than 10 digits, slice to 10 and show alert
    if (value.length > 10) {
        alert('Phone number cannot exceed 10 digits!');
        this.value = value.slice(0, 10);
    } 
    else if (value.length === 10) {
        this.value = value;
    }
    else {
        this.value = value;
    }
});

   $('.checknumberper').on('input', function() {
      // Remove any non-digit characters
      let value = this.value.replace(/\D/g, '');
      if (value === '') {
         this.value = '';
         return;
      }
      // Convert to number for comparison
      let numValue = parseInt(value, 10);
      // Check if value is more than 100
      if (numValue > 100) {
         alert('Number of persons cannot be more than 100!');
         // If value > 100, keep only first 2 digits
         if (value.length > 2) {
            this.value = value.slice(0, 2);
         } else {
            this.value = value; // Keep as is if it's less than 100
         }
      }
      // If value is between 1-99, keep as is
      else if (numValue <= 99) {
         // Allow up to 3 digits for numbers 1-99
         this.value = value.slice(0, 3);
      }
      // If value is exactly 100
      else if (numValue === 100) {
         this.value = value.slice(0, 3);
      }
   });
   // When the user scrolls the page, execute myFunction
   window.onscroll = function() {
      myFunction();
   };

   // Get the header
   var header = document.getElementById("myHeader");

   // Add the sticky class to the header when you scroll 100px down
   function myFunction() {
      if (window.pageYOffset > 500) {
         header.classList.add("sticky");
      } else {
         header.classList.remove("sticky");
      }
   }
</script>

@stack('footer')


</body>
</head>