( function( $ ) {
	
	$( function() {
		// set height home-list-item
		var height = 300;
		$.each($('.home-list-posts'), function(){
			if ( $(this).children('.columns').outerHeight() > height )
			{
				height = $(this).children('.columns').outerHeight();
			}
		});
		$('.home-list-posts .columns').css({'height':height});

	    var share_button_top = new Share(".share-button", {
			title: "Share Button Multiple Element Test",
			ui: {
				flyout: "bottom center"
			},
			networks: {
				facebook: {
					app_id: "602752456409826",
				}
			}
		});

	} );

	
} )( jQuery );