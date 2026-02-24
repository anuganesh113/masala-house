function deleteAdmins(id){
    if (confirm(`Are You Sure Want To Delete ?`)) {
        $.ajax({
            url: `/admin/admins/${id}`,
            method: `DELETE`
        })
        .done(function(response){

            if (response.success) {
                $(`tr#admins-${id}`).fadeOut("slow", function(){
                    $(this).remove();
                });
            }
            showAlertMessage({ message: response.message, success: true });
        })
        .fail(function(error){
            showAlertMessage({ message: error.responseJSON.message });
        });
    }
}


function deleteActivities(id){
    if (confirm(`Are You Sure Want To Delete ?`)) {
        $.ajax({
            url: `/admin/activities/${id}`,
            method: `DELETE`
        })
        .done(function(response){

            if (response.success) {
                $(`tr#activities-${id}`).fadeOut("slow", function(){
                    $(this).remove();
                });
            }
            showAlertMessage({ message: response.message, success: true });
        })
        .fail(function(error){
            showAlertMessage({ message: error.responseJSON.message });
        });
    }
}


function deleteAdvertises(id){
    if (confirm(`Are You Sure Want To Delete ?`)) {
        $.ajax({
            url: `/admin/advertises/${id}`,
            method: `DELETE`
        })
        .done(function(response){

            if (response.success) {
                $(`tr#advertises-${id}`).fadeOut("slow", function(){
                    $(this).remove();
                });
            }
            showAlertMessage({ message: response.message, success: true });
        })
        .fail(function(error){
            showAlertMessage({ message: error.responseJSON.message });
        });
    }
}


function deleteAmenities(id){
    if (confirm(`Are You Sure Want To Delete ?`)) {
        $.ajax({
            url: `/admin/amenities/${id}`,
            method: `DELETE`
        })
        .done(function(response){

            if (response.success) {
                $(`tr#amenities-${id}`).fadeOut("slow", function(){
                    $(this).remove();
                });
            }
            showAlertMessage({ message: response.message, success: true });
        })
        .fail(function(error){
            showAlertMessage({ message: error.responseJSON.message });
        });
    }
}


function deleteBanners(id){
    if(confirm(`Are You Sure Want To Delete ?`)){
        $.ajax({
            url: `/admin/banners/${id}`,
            method: `DELETE`
        })
        .done(function(response){
            if (response.success) {
                $(`tr#banners-${id}`).fadeOut("slow", function(){
                    $(this).remove();
                });
            }
            showAlertMessage({ message: response.message, success: true });
        })
        .fail(function(error){
            showAlertMessage({ message: error.responseJSON.message });
        });
    }
}


function deleteBlogs(id){
    if (confirm(`Are You Sure Want To Delete ?`)) {
        $.ajax({
            url: `/admin/blogs/${id}`,
            method: `DELETE`
        })
        .done(function(response){

            if (response.success) {
                $(`tr#blogs-${id}`).fadeOut("slow", function(){
                    $(this).remove();
                });
            }
            showAlertMessage({ message: response.message, success: true });
        })
        .fail(function(error){
            showAlertMessage({ message: error.responseJSON.message });
        });
    }
}


function deleteBrands(id){
    if (confirm(`Are You Sure Want To Delete ?`)) {
        $.ajax({
            url: `/admin/brands/${id}`,
            method: `DELETE`
        })
        .done(function(response){

            if (response.success) {
                $(`tr#brands-${id}`).fadeOut('slow', function(){
                    $(this).remove();
                });
            }
            showAlertMessage({ message: response.message, success: true });
        })
        .fail(function(error){
            showAlertMessage({ message: error.responseJSON.message });
        });
    }
}


function deleteCareer(id){
    if (confirm(`Are You Sure Want To Delete ?`)) {
        $.ajax({
            url: `/admin/career/${id}/delete`,
        })
        .done(function(response){

            if (response.success) {
                $(`tr#career-${id}`).fadeOut("slow", function(){
                    $(this).remove();
                });
            }
            showAlertMessage({ message: response.message, success: true });
        })
        .fail(function(error){
            showAlertMessage({ message: error.responseJSON.message });
        });
    }
}


function deleteCategories(id){
    if (confirm(`Are You Sure Want To Delete ?`)) {
        $.ajax({
            url: `/admin/categories/${id}`,
            method: `DELETE`
        })
        .done(function(response){

            if (response.success) {
                $(`tr#categories-${id}`).fadeOut("slow", function(){
                    $(this).remove();
                });
            }
            showAlertMessage({ message: response.message, success: true });
        })
        .fail(function(error){
            showAlertMessage({ message: error.responseJSON.message });
        });
    }
}


function deleteContact(id){
    if (confirm(`Are You Sure Want To Delete ?`)) {
        $.ajax({
            url: `/admin/contact/${id}/delete`,
        })
        .done(function(response){

            if (response.success) {
                $(`tr#contact-${id}`).fadeOut("slow", function(){
                    $(this).remove();
                });
            }
            showAlertMessage({ message: response.message, success: true });
        })
        .fail(function(error){
            showAlertMessage({ message: error.responseJSON.message });
        });
    }
}


function deleteInquiry(id){
    if (confirm(`Are You Sure Want To Delete ?`)) {
        $.ajax({
            url: `/admin/inquiry/${id}/delete`,
        })
        .done(function(response){

            if (response.success) {
                $(`tr#inquiry-${id}`).fadeOut("slow", function(){
                    $(this).remove();
                });
            }
            showAlertMessage({ message: response.message, success: true });
        })
        .fail(function(error){
            showAlertMessage({ message: error.responseJSON.message });
        });
    }
}

function deleteFAQS(id){
    if (confirm(`Are You Sure Want To Delete ?`)) {
        $.ajax({
            url: `/admin/faqs/${id}`,
            method: `DELETE`
        })
        .done(function(response){
            if (response.success) {
                $(`tr#faqs-${id}`).fadeOut("slow", function(){
                    $(this).remove();
                });
            }
            showAlertMessage({ message: response.message, success: true });
        })
        .fail(function(error){
            showAlertMessage({ message: error.responseJSON.message });
        });
    }
}


function deleteFacilities(id){
    if (confirm(`Are You Sure Want To Delete ?`)) {
        $.ajax({
            url: `/admin/facilities/${id}`,
            method: `DELETE`
        })
        .done(function(response){
            if (response.success) {
                $(`tr#facilities-${id}`).fadeOut("slow", function(){
                    $(this).remove();
                });
            }
            showAlertMessage({ message: response.message, success: true });
        })
        .fail(function(error){
            showAlertMessage({ message: error.responseJSON.message });
        });
    }
}

function deleteGalleries(id){
    if (confirm(`Are You Sure Want To Delete ?`)) {
        $.ajax({
            url: `/admin/galleries/${id}`,
            method: `DELETE`
        })
        .done(function(response){
            if (response.success) {
                $(`tr#galleries-${id}`).fadeOut("slow", function(){
                    $(this).remove();
                });
            }
            showAlertMessage({ message: response.message, success: true });
        })
        .fail(function(error){
            showAlertMessage({ message: error.responseJSON.message });
        });
    }
}

function deleteGalleriesImage(album, gallery){
    if (confirm(`Are You Sure Want To Delete ?`)) {
        $.ajax({
            url: `/admin/gallery/${album}/${gallery}/delete`,
        })
        .done(function(response){
            if (response.success) {
                $(`div#gallery-${gallery}`).fadeOut("slow", function(){
                    $(this).remove();
                });
            }
            showAlertMessage({ message: response.message, success: true });
        })
        .fail(function(error){
            showAlertMessage({ message: error.responseJSON.message });
        });
    }
}


function deleteMenus(id){
    if (confirm(`Are You Sure Want To Delete ?`)) {
        $.ajax({
            url: `/admin/menus/${id}`,
            method: `DELETE`
        })
        .done(function(response){
            if (response.success) {
                $(`tr#menus-${id}`).fadeOut("slow", function(){
                    $(this).remove();
                });
            }
            showAlertMessage({ message: response.message, success: true });
        })
        .fail(function(error){
            showAlertMessage({ message: error.responseJSON.message });
        });
    }
}


function deletePages(id){
    if (confirm(`Are You Sure Want To Delete ?`)) {
        $.ajax({
            url: `/admin/pages/${id}`,
            method: `DELETE`
        })
        .done(function(response){
            if (response.success) {
                $(`tr#pages-${id}`).fadeOut("slow", function(){
                    $(this).remove();
                });
            }
            showAlertMessage({ message: response.message, success: true });
        })
        .fail(function(error){
            showAlertMessage({ message: error.responseJSON.message });
        });
    }
}


function deleteServices(id){
    if (confirm(`Are You Sure Want To Delete ?`)) {
        $.ajax({
            url: `/admin/services/${id}`,
            method: `DELETE`
        })
        .done(function(response){
            if (response.success) {
                $(`tr#services-${id}`).fadeOut("slow", function(){
                    $(this).remove();
                });
            }
            showAlertMessage({ message: response.message, success: true });
        })
        .fail(function(error){
            showAlertMessage({ message: error.responseJSON.message });
        });
    }
}

function deletePageGalleriesImage(page, image){
    if (confirm(`Are You Sure Want To Delete ?`)) {

        $.ajax({
            url: `/admin/pages/${page}/delete-image`,
            data: {image: image},
            method: `DELETE`
        })
        .done(function(response){
            if (response.success) {
                $(`div#images-${image.split('.')[0]}`).fadeOut("slow", function(){
                    $(this).remove();
                });
            }
            showAlertMessage({ message: response.message, success: true });
        })
        .fail(function(error){
            showAlertMessage({ message: error.responseJSON.message });
        });
    }
}


function deleteTestimonials(id){
    if (confirm(`Are You Sure Want To Delete ?`)) {
        $.ajax({
            url: `/admin/testimonials/${id}`,
            method: `DELETE`
        })
        .done(function(response){

            if (response.success) {
                $(`tr#testimonials-${id}`).fadeOut("slow", function(){
                    $(this).remove();
                });
            }
            showAlertMessage({ message: response.message, success: true });
        })
        .fail(function(error){
            showAlertMessage({ message: error.responseJSON.message });
        });
    }
}
