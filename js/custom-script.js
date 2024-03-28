jQuery(document).ready(function($) {
    $('#upload_about_us_left_image_button').click(function(e) {
        e.preventDefault();

        // Create a new media uploader instance
        var custom_uploader = wp.media({
            title: 'Choose Image',
            button: {
                text: 'Choose Image'
            },
            multiple: false
        });

        // When an image is selected, run a callback
        custom_uploader.on('select', function() {
            var attachment = custom_uploader.state().get('selection').first().toJSON();

            // Set the URL of the selected image to the text input
            $('#about_us_left_image').val(attachment.url);

            // Display the preview of the selected image
            $('#about_us_left_image_preview').html('<img src="' + attachment.url + '" style="max-width: 100px;" />');
        });

        // Open the media uploader
        custom_uploader.open();
    });
});
