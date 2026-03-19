<footer class="m-grid__item m-footer ">
    <div class="m-container m-container--fluid m-container--full-height m-page__container">
        <div class="m-stack m-stack--flex-tablet-and-mobile m-stack--ver m-stack--desktop">
            <div class="m-stack__item m-stack__item--left m-stack__item--middle m-stack__item--last">
                <span class="m-footer__copyright">
                    {{ date('Y') }} &copy;
                    <a href="javascript:;" class="m-link">
                        CopyRights To {{ env('APP_NAME') }}
                    </a>
                </span>
            </div>
        </div>
    </div>
</footer>

<div id="alertMessage"></div>

<div id="m_scroll_top" class="m-scroll-top bg-primary" title="Scroll Top">
    <i class="la la-arrow-up"></i>
</div>

<script>
    isIE = false || !!document.documentMode;
    if(isIE == true){
        document.getElementById("error-msg").style.display = "block";
    }
</script>

@stack("footer")
@include('_helpers._summernote')
<script type="text/javascript" src="{{ asset('admin-assets/js/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('admin-assets/js/vendors.bundle.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin-assets/js/scripts.bundle.js') }}" type="text/javascript"></script>

<script src="{{ asset('admin-assets/js/toastr.js') }}" type="text/javascript"></script>

<script src="{{ asset('admin-assets/custom-js/backend-script.js') }}" type="text/javascript"></script>
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
{{--<script>
    $(document).ready(function(){
        $(`.select2`).select2({
            closeOnSelect: false
        });
    });
</script>--}}

</body>
</html>
