<script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.js"></script>

<script src="{{ asset('site-assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('site-assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('site-assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('site-assets/js/main.js') }}"></script>
<script>
   $('.checkphone').on('input', function() {
      // Remove any non-digit characters
      let value = this.value.replace(/\D/g, '');

      if (value.length > 9) {
         alert('Phone number cannot exceed 9 digits!');
         this.value = value.slice(0, 9);
      } else {
         return false;
      }
   });

   $('.checknumberper').on('input', function() {
      // Remove any non-digit characters
      let value = this.value.replace(/\D/g, '');

      if (parseInt(value) >= 50) {
         alert('No of persons cannot More than 50!');
         value = value.slice(0, 10);
      }

      this.value = value;
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