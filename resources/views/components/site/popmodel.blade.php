<!-- <div class="modal fade" id="{{$id}}popupModal" tabindex="-1" aria-labelledby="popupModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
         <div class="modal-body">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="float: right;"></button>
            
         
            <h2>{{data_get($page, "name")}}</h2>
             <a href="" target="_blank" > 
            <img src="{{ asset(sprintf('%s%s', \App\Enums\UploadFilePath::PAGES_PATH, data_get($page, 'metadata.breadcrumbs'))) }}" alt="{{data_get($page, "name")}}" class="img-fluid mb-3">
            </a>
         </div>
      </div>
   </div>
</div>

@push('footer')
<script>
      document.addEventListener('DOMContentLoaded', function() {
        var modal = new bootstrap.Modal(document.getElementById('{{$id}}popupModal'));
        modal.show();
    });

    </script>
    @endpush -->