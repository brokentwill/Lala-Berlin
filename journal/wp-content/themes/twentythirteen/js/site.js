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


		$('.home-page-recent-articles-image', '.home-page-recent-articles').hover(function(){
			$(this).children('.a-view-more').show();
			$(this).children('img').css({'opacity':0.6});
		}, function(){
			$(this).children('.a-view-more').hide();
			$(this).children('img').css({'opacity':1});
		});

		$('.soundcloud-spotify-player-iframe').hover(function(){
			$(this).children('.icon-play-img').show();
			$(this).children('img').css({'opacity':0.6});
		}, function(){
			$(this).children('.icon-play-img').hide();
			$(this).children('img').css({'opacity':1});
		});



		// Stop
		$('.large-soundcloud-spotify-player').on('click', '.if-click-stop', function() {
			$(this).parents('.large-soundcloud-spotify-player').children('.soundcloud-spotify-player-iframe').empty().append('<img src="'+$(this).data('img')+'" /><a class="if-click-play icon-play-img" href="javascript:;" data-id="'+$(this).data('id')+'" data-class="'+$(this).data('class')+'" data-src="'+$(this).data('src')+'" ></a>');
			$(this).parents('.large-soundcloud-spotify-player').children('.soundcloud-spotify-player-bottom-stop').hide();
			$(this).parents('.large-soundcloud-spotify-player').children('.soundcloud-spotify-player-bottom-play').show();
			return false;
		});

		/*Play*/
		$('.large-soundcloud-spotify-player').on('click', '.if-click-play', function() {
				$(this).parents('.large-soundcloud-spotify-player').children('.soundcloud-spotify-player-bottom-play').hide();
				$(this).parents('.large-soundcloud-spotify-player').children('.soundcloud-spotify-player-bottom-stop').show();
				$(this).parents('.large-soundcloud-spotify-player').children('.soundcloud-spotify-player-iframe').empty().append('<iframe id="iframe-'+($(this).data('id'))+'" scrolling="no" frameborder="no" src="'+$(this).data('src')+'" class="'+$(this).data('class')+'"></iframe>');
			return false;
		});

		var option_resize = ['.home-page-recent-articles-top .large-recent-articles', '.home-page-recent-articles-bottom .large-recent-articles', '.home-page-recent-articles-middle .large-recent-articles', '.page-category .large-recent-articles'];
		window.onload = function () {
			setTimeout(function(){
				// Remove control nav home-page-facebocks
				$('.flex-direction-nav','.home-page-facebocks ').remove();
				intiHeight(option_resize);
			}, 1);
		};
		intiHeight(option_resize);
		// window resize
		$(window).resize(function(){
			intiHeight(option_resize);
		});

		// resize image
		function intiHeight( opt ){
			if ( opt.length )
			{
				for (var i = 0; i < opt.length; i++)
				{
					$(opt[i]).css({'height':'auto'});
				};
				for (var i = 0; i < opt.length; i++)
				{
					var _h = 50;
					$.each($(opt[i]), function(){
						if ( $(this).outerHeight() > _h )
						{
							_h = $(this).outerHeight();
						}
					});
					$(opt[i]).height(_h);
				};
			}
		}

		$.fn.loadmore = function(option){

			var that = this;
			/* --- Default option --*/
			var setting = $.extend({
					url: 'wp-ajax.php',
					type: 'post',
					dataType: 'json',
					data:{},
					success: function(resp){},
					beforeSend: function(resp){loading()},
					complete : function(resp){
						loading(1);
						if ( typeof(resp) != 'undefined' && typeof(resp.responseText) != 'undefined' )
						{
							resp = JSON.parse(resp.responseText);
							setting.data.date_last = resp.date_last;
							intiHeight(option_resize);
						}
					},
					error: function(){}
				}, option );


			return this.each(function(){
				$(this).click(function(){
					ajax();
					return false;
				});
			});

			function ajax(){
				$.ajax(setting)
			};

			function loading(i){
				i = (typeof(i) == 'undefined' ? false : true);
				if ( i )
				{
					$('#loading-loadmore').remove();
				}
				else
				{
					$('body').append('<div id="loading-loadmore"></div>');
				}
			}
		};

		$(".bcd-menu-icon a:not('.a-home')").on('click',function (e) {
            $(this).closest('#bdc').toggleClass('expland');
            e.stopImmediatePropagation();
        });

        $(".bcd-menu-icon a.a-home").on('click',function (e) {
            $(this).closest('#navbar02').toggleClass('home-expland');
            e.stopImmediatePropagation();
        });

        $("#navbar .top-bar .toggle-topbar a").on('click',function (e) {
        	if ( $("#navbar .top-bar").hasClass('expanded') )
        	{
        		$("#navbar .top-bar").removeClass('expanded');
        	}
        	else
        	{
        		$("#navbar .top-bar").addClass('expanded');
        	}
            return false;
        });



		$('.load-more').loadmore({
			data: {
				'loadmore': 1,
				'date_last' : $('.home-page-bottom-load-more > a.load-more').data('date')
			},
			success: function(resp){
				if ( typeof(resp) != 'undefined' && typeof(resp.status) != 'undefined' && resp.status && typeof(resp.html) )
				{
					$('.home-page-recent-articles.home-page-recent-articles-bottom').children('.row').append(resp.html);
					$('.home-page-recent-articles-image').hover(function(){
						$(this).children('.a-view-more').show();
						$(this).children('img').css({'opacity':0.6});
					}, function(){
						$(this).children('.a-view-more').hide();
						$(this).children('img').css({'opacity':1});
					});
					if (resp.end){
						$('.home-page-bottom-load-more > a.load-more').parent().hide();
					}
					$('.home-page-bottom-load-more > a.load-more').attr('data-date', resp.date_last);



				}
				else
				{
					$('.home-page-bottom-load-more > a.load-more').parent().hide();
				}
			}
		});


		// flexslideshow
		$('.control-design-left, .control-design-right').click(function(){
			var i = $('.control-page-active').data('active'), total = $('.control-page-total').data('total');
			var control = $(this).data('control');
			if ( control == 'pre' )
			{
				i = (parseInt(i) > 1) ? (parseInt(i) - 1) : 1;
			}
			else
			{
				i = (parseInt(i) < total) ? (parseInt(i) + 1) : total;
			}
			$('.image-gallery-single-post .control-page-active').data('active', i).empty().append(i);
			$('.image-gallery-single-post .flex-control-nav').find('li').eq((i-1)).children('a').click();
		});

		$.zoom_img = function(t, p){

			var pr = $.extend({
				ind: 0,
				total: $('.images-zoom-wrap ul li', t).length
			}, p);

			var fn = {
				init: function(){
					this.loading();
				},
				loading: function(i){
					i = (typeof(i) == 'undefined' ? false : true);
					if ( i )
					{
						$('#loading-loadmore').remove();
					}
					else
					{
						$('body').append('<div id="loading-loadmore"></div>');
					}
				},
				show: function(){
					$('.images-zoom-wrap ul li img').attr('src','');
					var item = $('.images-zoom-wrap ul li.item-'+pr.ind);
		            $('.images-zoom-wrap').show();
		            var url = item.find('img').attr('data-src');
		            item.find('img').attr('src', url);
		            item.find('img').load(function() {

		                $(window).scrollTop(0);
		                $('.page').css('margin-top', '0');
		                $('body').css('overflow', 'hidden');
		                $(this).css('width', $(window).width());
		                item.fadeIn('slow');
		                $('.btn-handler').fadeIn('slow');
		            });


		            $('.product-next-prev').css('position', 'normal');
		            $('.product-shop').css('position', 'normal');
				},
				event: function(){
					var my = this;
					$('ul.row li', t).hover(function(){
						$(this).addClass('cursor-feature');
						$(this).click(function(){
							pr.ind = $(this).data('ind');
							my.loading();
							setTimeout(function(){
								my.loading(true);
								my.show();
							}, 500);
						})
					}, function(){
						$(this).removeClass('cursor-feature');
					});


					$('.btn-handler #view-prev-zoom, .btn-handler #view-next-zoom').click(function(){
						my.loading();
						var control = $(this).data('control');
						if ( control == 'pre' )
						{
							pr.ind = ( pr.ind > 0 ) ? (pr.ind - 1) : 0;
						}
						else
						{
							pr.ind = ( pr.ind < (pr.total-1) ) ? (pr.ind + 1) : (pr.total-1);
						}
						setTimeout(function(){
							my.loading(true);
							my.show();
						}, 500);
					});
					$('.btn-handler .close-icon', t).click(function(){
						$('body').css('overflow', 'visible');
			            $('.images-zoom-wrap ul li').hide();
			            $('.btn-handler').hide();
			            $('.images-zoom-wrap').fadeOut('2000');
			            $('.images-zoom-wrap ul li img').each(function() {
			                $(this).attr('src', '');
			            });
					});
				}
			}

			fn.event();

			t.pr = pr;
			t.fn = fn;
			return t;
		}

		$.fn.zoom = function(p){
			return this.each(function(){
				$.zoom_img(this, p);
			});
		}

		$('.single-post-gallery-feature').zoom();

		function moveBox(e, img) {

            var imgH = img.height();
            var wH = $(window).height();
            var range = imgH - wH;
            var ratio = range / wH;
            var speed = e.clientY * ratio;
            // TweenLite.to(img, 1.2, { css: { top: '-' + speed, ease : Cubic.easeOut }});
            TweenLite.to(img, 1, { css: { transform:'translate3d(0px,' + '-'+speed+'px' + ', 0px)', ease:Cubic.easeOut }});
        }


        $('.images-zoom-wrap ul li img').mousemove(function(ev) {
            moveBox(ev, $(this));
        });

	} );


} )( jQuery );
