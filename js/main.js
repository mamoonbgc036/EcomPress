const add_button = document.getElementById( 'img-upload-button' );
const remove_button = document.getElementById('img-delete-button');
const img = document.getElementById('image-tag');
const hidden = document.getElementById('img-hidden-field');
const customUploader = wp.media({
	title: 'Select an Image',
	button: {
		text: 'Use this Image'
	},
	multiple: false,
});
add_button.addEventListener( 'click', function(){
	if (customUploader){
		customUploader.open();
	}
});

customUploader.on( 'select', function(){
	const attachment = customUploader.state().get('selection').first().toJSON();
	img.setAttribute( 'src', attachment.url );
	img.setAttribute( 'style', 'width: 100%' );
	hidden.setAttribute( 'value', JSON.stringify( [ { id: attachment.id, url: attachment.url } ] ) );
} );

remove_button.addEventListener( 'click', function(){
	img.removeAttribute( 'src' );
	img.removeAttribute( 'style' );
	hidden.removeAttribute( 'value' );
} )