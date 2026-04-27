@push('header')
<style>
      /* @media (max-width: 400px) {

}
      @media (max-width: 500px) {
}
      @media (max-width: 768px) {
}
      @media (max-width: 991px) {
}
      @media (max-width: 1200px) {

} */
.learnpopmore{
   margin-left: -22px;
   margin-right: 5px;
   color: #ff5e00;
}
.learnpopmorearrow{
  
    bottom: 15px;
    position: relative;
    left: 37px;
    font-size: x-large;
    color: #ff5e00;
}
.learnpopmorecricle{
       border-radius: 100%;
    padding: 20px 0;
    background: #ffffff;
    /* box-shadow: inset 0 3 5 8px #ff5e00; */
    box-shadow: 0px 4px #ff5e00;
        position: relative;
    z-index: 1;
}
.learnpopmorecricle a:hover{
    color: #ff5e00;
}
.learnpopmorecriclediv{
       position: relative;
    bottom: 24px;
}

</style>
@endpush

<div class="modal fade" id="popupModal" tabindex="-1" aria-labelledby="popupModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content br-25">
         <div class="modal-body" style="margin-bottom: -40px;z-index: 6;">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="float: right;"></button>
            
         
            <h2 class="text-center" ><a class="orange" style="text-decoration: auto;" href="{{ data_get($popup, 'link') }}" target="_blank" >{{ data_get($popup, 'title') }}</a></h2>
            <a href="{{ data_get($popup, 'link') }}" target="_blank" >
            <img src="{{ asset(sprintf('%s%s', \App\Enums\UploadFilePath::POPUPS_PATH, data_get($popup, 'image'))) }}" alt="Catering Service" class="img-fluid mb-3">
          
               <div class="text-center learnpopmorecriclediv" >
               <em  class="learnpopmorecricle" >
             
               <a href="{{ data_get($popup, 'link') }}" target="_blank" class="learnpopmore" >  <i class="fa-solid fa-angle-down learnpopmorearrow"  ></i> MORE</a>
               </em>
            </div>
              </a>
         
         
        
         </div>

      </div>
   </div>
</div>

@push('footer')
<script>

</script>
@endpush