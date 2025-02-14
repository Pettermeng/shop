$(document).ready(function () {

    // Action Remove Data
    $(document).on('click', '.btn-remove', function () {
        let id = $(this).attr('data-id')
        $('.remove-id').val(id)
    })

    // Active Menu
    $(document).ready(function() {
        $(".menu li").removeClass("active"); // Remove active class from all
        $(".menu li[data-page='" + currentPage + "']").addClass("active"); // Add active class to the matching item
    });

})