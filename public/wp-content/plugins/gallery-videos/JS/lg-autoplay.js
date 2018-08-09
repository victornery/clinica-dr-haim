(function($, window, document, undefined) {
	var Totalsoft_Autoplay = jQuery('.Totalsoft_Autoplay').val();
	if(Totalsoft_Autoplay=='true'){
		Totalsoft_Autoplay=true;
	}else{
		Totalsoft_Autoplay=false;
	}
    'use strict';
    var defaults = {
        autoplay: Totalsoft_Autoplay,
        pause: 5000,
        progressBar: true,
        fourceAutoplay: false,
        autoplayControls: true,
        appendAutoplayControlsTo: '.lg-toolbar'
    };
    var Autoplay = function(element) {
        this.core = $(element).data('lightGallery');
        this.$el = $(element);
        if (this.core.$items.length < 2) {
            return false;
        }
        this.core.s = $.extend({}, defaults, this.core.s);
        this.interval = false;
        this.fromAuto = true;
        this.canceledOnTouch = false;
        this.fourceAutoplayTemp = this.core.s.fourceAutoplay;
        if (!this.core.doCss()) {
            this.core.s.progressBar = false;
        }
        this.init();
        return this;
    };

    Autoplay.prototype.init = function() {
        var _this = this;
        if (_this.core.s.autoplayControls) {
            _this.controls();
        }
        if (_this.core.s.progressBar) {
            _this.core.$outer.find('.lg').append('<div class="lg-progress-bar"><div class="lg-progress"></div></div>');
        }
        _this.progress();
        if (_this.core.s.autoplay) {
            _this.startlAuto();
        }
        _this.$el.on('onDragstart.lg.tm touchstart.lg.tm', function() {
            if (_this.interval) {
                _this.cancelAuto();
                _this.canceledOnTouch = true;
            }
        });
        _this.$el.on('onDragend.lg.tm touchend.lg.tm onSlideClick.lg.tm', function() {
            if (!_this.interval && _this.canceledOnTouch) {
                _this.startlAuto();
                _this.canceledOnTouch = false;
            }
        });
    };
    Autoplay.prototype.progress = function() {
        var _this = this;
        var _$progressBar;
        var _$progress;
        _this.$el.on('onBeforeSlide.lg.tm', function() {
            if (_this.core.s.progressBar && _this.fromAuto) {
                _$progressBar = _this.core.$outer.find('.lg-progress-bar');
                _$progress = _this.core.$outer.find('.lg-progress');
                if (_this.interval) {
                    _$progress.removeAttr('style');
                    _$progressBar.removeClass('lg-start');
                    setTimeout(function() {
                        _$progress.css('transition', 'width ' + (_this.core.s.speed + _this.core.s.pause) + 'ms ease 0s');
                        _$progressBar.addClass('lg-start');
                    }, 20);
                }
            }
            if (!_this.fromAuto && !_this.core.s.fourceAutoplay) {
                _this.cancelAuto();
            }
            _this.fromAuto = false;
        });
    };
    Autoplay.prototype.controls = function() {
        var _this = this;
        var _html = '<i class="totCircl totalsoft totalsoft-play-circle-o lg-iconn"></i>';
        $(this.core.s.appendAutoplayControlsTo).append(_html);
		var x=0;
        _this.core.$outer.find('.totCircl').on('click.lg', function() {
			if($('.totCircl').hasClass('totalsoft-play-circle-o')){
				x=0;
			}else{
				x=1;
			}
			x++;
			if(x%2==1){
				jQuery('.totCircl').removeClass('totalsoft-play-circle-o');
				jQuery('.totCircl').addClass('totalsoft-pause-circle-o');
			}else if($('.totCircl').hasClass('totalsoft-pause-circle-o')){
				jQuery('.totCircl').addClass('totalsoft-play-circle-o');
				jQuery('.totCircl').removeClass('totalsoft-pause-circle-o');
			}
            if ($(_this.core.$outer).hasClass('lg-show-autoplay')) {
                _this.cancelAuto();
                _this.core.s.fourceAutoplay = false;
            } else {
                if (!_this.interval) {
                    _this.startlAuto();
                    _this.core.s.fourceAutoplay = _this.fourceAutoplayTemp;
                }
            }
        });
    };
    Autoplay.prototype.startlAuto = function() {
        var _this = this;
        _this.core.$outer.find('.lg-progress').css('transition', 'width ' + (_this.core.s.speed + _this.core.s.pause) + 'ms ease 0s');
        _this.core.$outer.addClass('lg-show-autoplay');
        _this.core.$outer.find('.lg-progress-bar').addClass('lg-start');
		jQuery('.totCircl').removeClass('totalsoft-play-circle-o');
		jQuery('.totCircl').addClass('totalsoft-pause-circle-o');
        _this.interval = setInterval(function() {
            if (_this.core.index + 1 < _this.core.$items.length) {
                _this.core.index++;
            } else {
                _this.core.index = 0;
            }
            _this.fromAuto = true;
            _this.core.slide(_this.core.index, false, false);
        }, _this.core.s.speed + _this.core.s.pause);
    };
    Autoplay.prototype.cancelAuto = function() {
        clearInterval(this.interval);
        this.interval = false;
        this.core.$outer.find('.lg-progress').removeAttr('style');
        this.core.$outer.removeClass('lg-show-autoplay');
        this.core.$outer.find('.lg-progress-bar').removeClass('lg-start');
    };
    Autoplay.prototype.destroy = function() {
        this.cancelAuto();
        this.core.$outer.find('.lg-progress-bar').remove();
    };
    $.fn.lightGallery.modules.autoplay = Autoplay;
})(jQuery, window, document);