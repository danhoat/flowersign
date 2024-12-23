jQuery(document).ready( function($){

    var mediaUploader_woo;

    $('#upload-button-woo').on('click',function(e) {
        e.preventDefault();
        if( mediaUploader_woo ){
            mediaUploader_woo.open();
            return;
        }

        mediaUploader_woo = wp.media.frames.file_frame = wp.media({
            title: 'Choose an Image',
            button: { text: 'Choose Image'},
            multiple: false
        });

        mediaUploader_woo.on('select', function(){
            attachment = mediaUploader_woo.state().get('selection').first().toJSON();
            $('#category-meta-woo').val(attachment.url);
            $('#category-header-preview').attr('src', ''+ attachment.url + '' );
        });

        mediaUploader_woo.open();
    });    

});