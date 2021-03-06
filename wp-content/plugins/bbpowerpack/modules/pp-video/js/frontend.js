;(function( $ ) {

	PPVideo = function( settings ) {
		this.id			= settings.id;
		this.type		= settings.type;
		this.aspectRatio = settings.aspectRatio;
		this.lightbox 	= settings.lightbox;
		this.overlay	= settings.overlay;
		this.node		= $('.fl-node-' + this.id);

		this._init();
	};

	PPVideo.prototype = {
		_init: function() {
			if ( this.lightbox ) {
				this._initLightbox();
			} else if ( this.overlay ) {
				this._inlinePlay();
			}
		},

		_inlinePlay: function() {
			if ( this.node.find( '.pp-video-iframe' ).length > 0 ) {
				var videoFrame = this.node.find( '.pp-video-iframe' );

				videoFrame.data( 'src', videoFrame.data('src').replace('&autoplay=1', '') );
				videoFrame.data( 'src', videoFrame.data('src').replace('autoplay=1', '') );
			}

			this.node.find('.pp-video-image-overlay').on('click', $.proxy(function() {
				this.node.find( '.pp-video-image-overlay' ).fadeOut(800, function() {
					this.remove();
				});

				if ( this.node.find( '.pp-video-player' ).length > 0 ) {
					this.node.find( '.pp-video-player' )[0].play();

					return;
				}

				var lazyLoad = this.node.find( '.pp-video-iframe' ).data( 'src' );

				if ( lazyLoad ) {
					this.node.find( '.pp-video-iframe' ).attr( 'src', lazyLoad );
				}

				var iframeSrc = this.node.find( '.pp-video-iframe' )[0].src.replace('&autoplay=0', '');
				iframeSrc = iframeSrc.replace('autoplay=0', '');

				var src = iframeSrc.split('#');
				iframeSrc = src[0] + '&autoplay=1';

				if ( 'undefined' !== typeof src[1] ) {
					iframeSrc += '#' + src[1];
				}
				this.node.find( '.pp-video-iframe' )[0].src = iframeSrc;
			}, this));
		},

		_initLightbox: function() {
			var id = this.id;
			var options = {
				modal			: false,
				enableEscapeButton: true,
				type: 'inline',
				baseClass		: 'fancybox-' + id,
				buttons			: [
					'close'
				],
				wheel			: false,
				touch			: false,
				afterLoad		: function(current, previous) {
					$('.fancybox-' + id).find('.fancybox-bg').addClass('fancybox-' + id + '-overlay');
					if ( $('.fancybox-' + id).find( '.pp-video-iframe' ).length > 0 ) {
						var iframeSrc = $('.fancybox-' + id).find( '.pp-video-iframe' )[0].src.replace('&autoplay=0', '');
						iframeSrc = iframeSrc.replace('autoplay=0', '');

						var src = iframeSrc.split('#');
						iframeSrc = src[0] + '&autoplay=1';

						if ( 'undefined' !== typeof src[1] ) {
							iframeSrc += '#' + src[1];
						}
						$('.fancybox-' + id).find( '.pp-video-iframe' )[0].src = iframeSrc;
						setTimeout(function() {
							$('.fancybox-' + id).trigger('focus');
						}, 1200);
					}

					$(document).trigger( 'pp_video_lightbox_after_load', [ $('.fancybox-' + id), id ] );
				},
				iframe: {
					preload: false
				},
				keys : {
					close  : [27],
				}
			};

			var wrapperClasses = 'pp-aspect-ratio-' + this.aspectRatio;

			this.node.find('.pp-video-image-overlay').on('click', function(e) {
				e.stopPropagation();
				$.fancybox.open($('<div class="'+wrapperClasses+'"></div>').html( $(this).find('.pp-video-lightbox-content').html() ), options);
			});

			$(document).on('keyup', function(e) {
				if ( e.keyCode === 27 ) {
					$.fancybox.close();
				}
			});
		},
	};

})(jQuery);