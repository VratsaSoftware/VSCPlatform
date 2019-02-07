$( function () {
	var showed = false;
	$( '.b-description_readmore_button' ).on( 'click', function () {
		if ( !showed ) {
			var appear = 100;
			$( '.sponsors-logos>div:nth-child(n+5)' ).each( function ( k, v ) {
				if ( $( this ).find( 'img' ).length ) {
					$( this ).find( 'img' ).attr( 'src', $( this ).attr( 'data-img' ) );
				}
				$( this ).stop( true, true ).delay( appear ).fadeIn( 'slow' );
				appear += 100;
			} );
			setTimeout( function () {
				$( '.b-description_readmore_button' ).html( 'Скрии' );
				showed = true;
			}, appear );

		} else {
			var disappear = $( '.sponsors-logos>div:nth-child(n+5)' ).length * 100;
			setTimeout( function () {
				$( '.b-description_readmore_button' ).html( 'Покажи още' );
				showed = false;
				if ( $( this ).find( 'img' ).length ) {
					$( this ).find( 'img' ).attr( 'src', ' ' );
				}
			}, disappear * 2 );
			$( '.sponsors-logos>div:nth-child(n+5)' ).each( function ( k, v ) {
				$( this ).stop( true, true ).delay( disappear ).fadeOut( 'slow' );
				disappear -= 100;
			} );
		}
	} );
} );