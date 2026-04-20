<script>
    $(document).ready(function() {
        $('.summernote_reg').summernote({
            height: 300,

            callbacks: {
                onImageUpload: function(files) {
                    uploadImage(files[0]);
                }
            }
        });

        //   function uploadImage(file) {
        //       let data = new FormData();
        //       data.append("image", file);
        //       data.append("_token", "{{ csrf_token() }}");

        //       $.ajax({
        //           url: "", // Route for upload
        //           method: "POST",
        //           data: data,
        //           contentType: false,
        //           processData: false,
        //           success: function(url) {
        //               $('.summernote_reg').summernote('insertImage', url);
        //           },
        //           error: function(data) {
        //               console.log(data);
        //               alert('Image upload failed');
        //           }
        //       });
        //   }
    });
</script>