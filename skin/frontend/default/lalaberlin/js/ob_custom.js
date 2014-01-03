

$j = jQuery.noConflict();

jQuery(function () {

  	$j('a.menu-close').click(function(event) {
      event.preventDefault();
  		$j('.btn-menu').removeClass('active');
  		$j('.menu-button').addClass('active');
  		$j('#menu-main').css('position', 'absolute');
  		console.log('yooo', jQuery(this));
  	});

  	$j('.menu-button').click(function(event) {
      event.preventDefault();
  		$j('.btn-menu').addClass('active');
  		$j(this).removeClass('active');
  		$j('#menu-main').css('position', 'fixed');
  		console.log('yeee', jQuery(this));
  	});

});



jQuery(window).load(function() {
  var wHeight = jQuery('.home-top-slider .divSimpleSlider a:first-child').height() + 20;
  var orW = jQuery('#news').width();
  var orH = orW / 2.426;
  jQuery('.tiles').css('height', orH+'px');
  jQuery('.home-top-slider').css('height', wHeight+'px');

  var slideR = jQuery('.home-top-slider').width() / jQuery('.home-top-slider').height();

  jQuery(window).on('resize', function() {
    updateViewCovers(slideR);
  });

});


function updateViewCovers(slideR) {

  //console.log(slideR);
  //console.log(jQuery('.home-top-slider').width());

  var sH = Math.floor(jQuery('.home-top-slider').width() / slideR);
  
  var newW = jQuery('#news').width();
  var newH = newW / 2.426;
  jQuery('.tiles').css('height', newH+'px');
  jQuery('.home-top-slider').css('height', sH+'px');
}





