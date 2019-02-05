$( function () {
	$( "#tabs" ).tabs();
	$( '#ui-id-2' ).on( 'click', function () {
		$( '.program-info' ).stop( true, true ).fadeOut( 50 ).fadeIn( 100 );
		$( '.program-info-img' ).stop( true, true ).fadeOut( 50 ).fadeIn( 100 );
		$( '.program-info-img' ).removeClass( 'finished-php' );
		$( '.lvl-info' ).removeClass( 'finished-php' );
		$( '.clear-tick > img' ).removeClass( 'finished-tick' );
		$( '.clear-tick > img' ).hide();
	} );

	$( '#ui-id-1' ).on( 'click', function () {
		$( '.program-info' ).stop( true, true ).fadeOut( 50 ).fadeIn( 100 );
		$( '.program-info-img' ).stop( true, true ).fadeOut( 50 ).fadeIn( 100 );
		$( '.program-info-img' ).removeClass( 'finished-php' );
		$( '.lvl-info' ).removeClass( 'finished-php' );
		$( '.clear-tick > img' ).removeClass( 'finished-tick' );
		$( '.clear-tick > img' ).hide();
	} );
	if ( $( window ).width() > 1200 ) {
		$( '.lvl-info' ).mouseenter( function () {
			$( this ).stop().animate( {
				top: '-5%'
			}, "fast" );

			$( this ).siblings().next( 'div' ).stop().animate( {
				top: '-5%'
			}, "fast" );


			if ( !$( this ).next( 'div' ).find( 'img' ).is( ':visible' ) ) {
				$( this ).next( 'div' ).find( 'img' ).fadeIn( 'fast' );
			}
			if ( $( ".clear-tick > img:visible" ).length > 3 ) {
				if ( $( '.program-info-img' ).hasClass( 'info-marketing' ) ) {
					$( '.program-info-img' ).addClass( 'finished-marketing' );
				}
				if ( $( '.lvl-info' ).hasClass( 'lvl-marketing' ) ) {
					$( '.lvl-info' ).addClass( 'finished-marketing' );
				}
				if ( $( '.clear-tick' ).hasClass( 'tick-marketing' ) ) {
					$( '.clear-tick > img' ).addClass( 'finished-tick-marketing' ).fadeIn( 'fast' );
				}
				$( '.program-info-img' ).addClass( 'finished-php' );
				$( '.lvl-info' ).addClass( 'finished-php' );
				$( '.clear-tick > img' ).addClass( 'finished-tick' ).fadeIn( 'fast' );
			}
		} );

		$( '.lvl-info' ).mouseleave( function () {
			$( this ).stop().animate( {
				top: '5%'
			}, "fast" );

			$( this ).siblings().next( 'div' ).stop().animate( {
				top: '5%'
			}, "fast" );
		} );

		$( '.program-info-img' ).mouseenter( function () {
			$( this ).stop().animate( {
				top: '-5%'
			}, "fast" );

			$( this ).siblings().prev( 'div' ).stop().animate( {
				top: '-5%'
			}, "fast" );

			if ( !$( this ).prev( 'div' ).find( 'img' ).is( ':visible' ) ) {
				$( this ).prev( 'div' ).find( 'img' ).fadeIn( 'fast' );
			}
			if ( $( ".clear-tick > img:visible" ).length > 3 ) {
				if ( $( '.program-info-img' ).hasClass( 'info-marketing' ) ) {
					$( '.program-info-img' ).addClass( 'finished-marketing' );
				}
				if ( $( '.lvl-info' ).hasClass( 'lvl-marketing' ) ) {
					$( '.lvl-info' ).addClass( 'finished-marketing' );
				}
				if ( $( '.clear-tick' ).hasClass( 'tick-marketing' ) ) {
					$( '.clear-tick > img' ).addClass( 'finished-tick-marketing' ).fadeIn( 'fast' );
				}
				$( '.program-info-img' ).addClass( 'finished-php' );
				$( '.lvl-info' ).addClass( 'finished-php' );
				$( '.clear-tick > img' ).addClass( 'finished-tick' );
			}
		} );

		$( '.program-info-img' ).mouseleave( function () {
			$( this ).stop().animate( {
				top: '5%'
			}, "fast" );

			$( this ).siblings().prev( 'div' ).stop().animate( {
				top: '5%'
			}, "fast" );
		} );
	}
} );