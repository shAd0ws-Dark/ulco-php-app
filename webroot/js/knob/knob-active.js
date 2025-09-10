(function ($) {
 "use strict";
    /*---------------------
       Circular Bars - Knob
    --------------------- */	
	  if(typeof($.fn.knob) != 'undefined') {
		$('.knob').each(function () {
		  var $this = $(this),
			  knobVal = $this.attr('data-rel');
	
		  $this.knob({
			'draw' : function () { 
			  $(this.i).val(this.cv + '%')
			}
		  });
		  
		  $this.appear(function() {
			$({
			  value: 0
			}).animate({
			  value: knobVal
			}, {
			  duration : 1000,
			  easing   : 'swing',
			  step     : function () {
				$this.val(Math.abs(this.value).toFixed(3)).trigger('change');
			  }
			});
		  }, {accX: 0, accY: -150});
		});
    }	

})(jQuery);