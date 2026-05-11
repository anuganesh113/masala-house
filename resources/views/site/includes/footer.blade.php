<!-- Google Tag Manager (noscript) -->
<!-- <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K8WJ7LSJ"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript> -->


<script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="{{ asset('site-assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('site-assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('site-assets/js/main.js') }}"></script>
<script src="https://code.jquery.com/ui/1.14.2/jquery-ui.js"></script>
<!-- <script>
  const today = new Date().toISOString().split('T')[0];
  const dateInputs = document.querySelectorAll('.datepicker-field');
  dateInputs.forEach(input => {
    input.setAttribute('min', today);
  });
</script> -->

<script>
$(function() {
    $(".datepicker-field").datepicker({
        minDate: new Date()
    }).attr('readonly', true);  // lowercase readonly is fine
    
    // Also prevent keyboard on mobile
    $(".datepicker-field").on('touchstart', function(e) {
        this.blur();
    });
})
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const now = new Date();
    const hours = now.getHours().toString().padStart(2, '0');
    const minutes = now.getMinutes().toString().padStart(2, '0');

    const elements = document.getElementsByClassName('currentTimeInput');

    for (let i = 0; i < elements.length; i++) {
        elements[i].value = `${hours}:${minutes}`;
    }
});
</script>

<script>
   $('.checkphone').on('keyup', function() {
      let value = this.value.replace(/\D/g, '');
      if (value.length > 0 && value.length < 10) {
         // $('.contact_number').html('<span class="text-danger">Please enter a valid 10-digit phone number!</span>');
      } else if (value.length === 10) {
         $('.contact_number').html('');
       }
   });

$('.checkphone').on('input', function() {
    let value = this.value.replace(/\D/g, '');
    // If more than 10 digits, slice to 10 and show alert
    if (value.length > 10) {
      //   alert('Phone number cannot exceed 10 digits!');
        this.value = value.slice(0, 10);
    }
    else if (value.length === 10) {
        this.value = value;
    }
    else {
        this.value = value;
    }
});

   $('.checknumberper').on('keyup', function() {
      // Remove any non-digit characters
      let value = this.value.replace(/\D/g, '');
      if (value === '') {
         this.value = '';
         return;
      }
      // Convert to number for comparison
      let numValue = parseInt(value, 10);
      // Check if value is more than 400
      if (numValue > 400) {
         // alert('Number of persons cannot be more than 400!');

         $('.no_person').html('Number of persons cannot be more than 400!');
         // If value > 400, keep only first 2 digits
         if (value.length > 2) {
            this.value = value.slice(0, 2);

         } else {
            this.value = value; // Keep as is if it's less than 400
         }
      }
      // If value is between 1-99, keep as is
      else if (numValue <= 99) {
          $('.no_person').html('');
         // Allow up to 3 digits for numbers 1-99
         this.value = value.slice(0, 3);
      }
      // If value is exactly 400
      else if (numValue === 400) {
         this.value = value.slice(0, 3);
          $('.no_person').html('');
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
<script>
  @if(Session::has('success'))
        toastr.success("{{ Session::get('success') }}", "Success!");
    @endif
    // Configure Toastr options (optional)
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
</script>
@stack('footer')
</body>
</head>