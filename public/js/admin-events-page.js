$( '#add-event' ).on( 'click', function () {
	$( '.close-modal' ).attr( 'data-scroll', $( this ).offset().top - 100 );
	$( '#modal' ).show();
} );

$( '.create-course-btn' ).on( 'click', function () {
	$( '#create_event' ).submit();
} );

$( '.show-more-event' ).on( 'click', function () {
	$( '.close-modal' ).attr( 'data-scroll', ( $( this ).offset().top - 700 ) );
	var newModal = $( '#modal' ).clone( true ).attr( 'id', 'modal-view' );
	var desc = $( this ).prev( '.desc-no-show' ).html();
	$( '#modal' ).after( newModal );
	$( '#modal-view > .modal-content > .copy' ).html( '' );
	$( '#modal-view > .modal-content > .copy' ).html( '<p>' + desc + '</p>' );
	$( '#modal-view > .modal-content > .copy > #teams-table' ).attr( 'id', 'new-table' ).DataTable( {
		"pageLength": 1,
		"lengthMenu": [ 1, 5, 10, 15, 50, 100 ]
	} );
	newModal.show();
} );

$( 'input:radio[name="type"]' ).change(
	function () {
		console.log( $( this ).val() );
		if ( $( this ).is( ':checked' ) && $( this ).val() == 'is_team' ) {
			$( '.team-capacity' ).fadeIn();
		} else {
			$( '.team-capacity' ).fadeOut();
		}
	} );