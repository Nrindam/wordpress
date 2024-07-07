jQuery(document).ready(function($) {
    // Function to handle "See More" button click
    $('.seemore_bt a').on('click', function(e) {
        e.preventDefault();
        var $button = $(this);
        var $gallery = $button.closest('.gallery_section');
        var $hiddenImages = $gallery.find('.hidden-image');

        // Toggle visibility of hidden images
        $hiddenImages.toggleClass('show');
        $button.text($hiddenImages.hasClass('show') ? 'See Less' : 'See More');
    });
});
