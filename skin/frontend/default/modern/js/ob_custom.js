

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



jQuery(document).ready(function() {
  var orW = jQuery('#news').width();
  var orH = orW / 2.426;
  jQuery('.tiles').css('height', orH+'px');
});


function updateViewCovers() {
  var newW = jQuery('#news').width();
  var newH = newW / 2.426;
  jQuery('.tiles').css('height', newH+'px');
}

jQuery(window).on('resize', function() {
  updateViewCovers();
});



