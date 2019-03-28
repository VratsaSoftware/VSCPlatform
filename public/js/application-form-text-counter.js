$( 'textarea[name="suitable_candidate"]' ).on( 'keyup', function () {
	symbolCount( this, $( '#candidate-label' ) );
} );

$( 'textarea[name="suitable_training"]' ).on( 'keyup', function () {
	symbolCount( this, $( '#training-label' ) );
} );

$( 'textarea[name="accompliments"]' ).on( 'keyup', function () {
	symbolCount( this, $( '#accompliments-label' ) );
} );

$( 'textarea[name="expecatitions"]' ).on( 'keyup', function () {
	symbolCount( this, $( '#expecatitions-label' ) );
} );

function symbolCount( element, label ) {

	var len = element.value.length;
	var lbl = label;

	if ( len < 100 || len > 500 ) {
		$( lbl ).css( 'color', '#f00' );
	} else {
		$( lbl ).css( 'color', '#1C8800' );
	}
	lbl.text( 'символа :' + len );
}