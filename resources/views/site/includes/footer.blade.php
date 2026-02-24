<script src="{{ asset('site-assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('site-assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('site-assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('site-assets/js/main.js') }}"></script>

<script>
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