jQuery(function($){

	// on upload button click
	$('body').on( 'click', '.misha-upl', function(e){

		e.preventDefault();

		var button = $(this),
		custom_uploader = wp.media({
			title: 'Insert image',
			library : {
				// uploadedTo : wp.media.view.settings.post.id, // attach to the current post?
				type : 'image'
			},
			button: {
				text: 'Use this image' // button label text
			},
			multiple: false
		}).on('select', function() { // it also has "open" and "close" events
			var attachment = custom_uploader.state().get('selection').first().toJSON();
			button.before('<img class="img" src="' + attachment.url + '">').next().show().next().val(attachment.id);
			$('#upload_image').val(attachment.url);
			$("a").removeClass("btn-upload");
			$(".misha-rmv").removeClass("inv");
		}).open();
	
	});

	// on remove button click
	$('body').on('click', '.misha-rmv', function(e){

		e.preventDefault();

		var button = $(this);
		button.next().val('');
		button.hide().prev().html('');
		$('img').remove(".img");
	});

// jQuery(document).ready(function($){
//     var custom_uploader;
//     $('#upload_image_button').click(function(e) {
//         e.preventDefault();
//         //If the uploader object has already been created, reopen the dialog
//         if (custom_uploader) {
//             custom_uploader.open();
//             return;
//         }
//         //Extend the wp.media object
//         custom_uploader = wp.media.frames.file_frame = wp.media({
//             title: 'Choose Image',
//             button: {
//                 text: 'Choose Image'
//             },
//             multiple: false
//         });
//         //When a file is selected, grab the URL and set it as the text field's value
//         custom_uploader.on('select', function() {
//             attachment = custom_uploader.state().get('selection').first().toJSON();
//             $('#upload_image').val(attachment.url);
//         });
//         //Open the uploader dialog
//         custom_uploader.open();
//     });
});
