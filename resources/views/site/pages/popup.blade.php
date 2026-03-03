<div class="modal fade" id="popupModal" tabindex="-1" aria-labelledby="popupModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
         <div class="modal-body">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="float: right;"><i class='bx bx-x'></i></button>
            
         
            <h2>{{ data_get($popup, 'title') }}</h2>
            <a href="{{ data_get($popup, 'link') }}" target="_blank" >
            <img src="{{ asset(sprintf('%s%s', \App\Enums\UploadFilePath::POPUPS_PATH, data_get($popup, 'image'))) }}" alt="Catering Service" class="img-fluid mb-3">
            </a>
            
            
        
         </div>
      </div>
   </div>
</div>

@push('footer')
<script>

</script>
@endpush