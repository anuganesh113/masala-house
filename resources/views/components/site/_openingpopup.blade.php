<h2 class="openinghours">ALL Hours</h2>
<div class="modal fade" id="openinghours" tabindex="-1" aria-labelledby="openinghoursLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
         <div class="modal-body">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="float: right;"><i class='bx bx-x'></i></button>
             
            <div class="openinghourspop heading">
               {!! data_get($setting, 'metadata.opening_hours') !!}
              </div>
         </div>
             
                  <div class="">
                              <button type="button" class="l__button l__button--primary openpop-btn" data-bs-dismiss="modal" aria-label="Close" 
                              style="float: right;">Close</i></button>

                  </div>
             
      </div>

   </div>
</div>
 @push('footer')
<script>
   $('.openinghours').click(function(e) {
      e.preventDefault();
      var name = $(this).data('name');
     $('<style>.openinghourspop h6::before { content: inherit !important; }</style>').appendTo('head');
     $('<style>.openinghourspop h5::before { content: inherit !important; }</style>').appendTo('head');
     $('<style>.openinghourspop h5::after { content: inherit !important; }</style>').appendTo('head');
      $('#openinghours').modal('show');
   });
</script>



 @endpush