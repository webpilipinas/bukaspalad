/*
 * 	Character Count Plugin - jQuery plugin
 * 	Dynamic character count for text areas and input fields
 *	written by Alen Grakalic	
 *	http://cssglobe.com/post/7161/jquery-plugin-simplest-twitterlike-dynamic-character-count-for-textareas
 *
 *	Copyright (c) 2009 Alen Grakalic (http://cssglobe.com)
 *	Dual licensed under the MIT (MIT-LICENSE.txt)
 *	and GPL (GPL-LICENSE.txt) licenses.
 *
 *	Built for jQuery library
 *	http://jquery.com
 *
 */
 
(function($) {

	$.fn.charCount = function(options){
	  
		// default configuration properties
		var defaults = {	
			allowed: 140,		
			warning: 25,
			css: 'counter',
			counterElement: 'span',
			cssWarning: 'warning',
			cssExceeded: 'exceeded',
			cssOk: 'ok',
			cssDefault: 'default',
			counterText: '',
			cssWarningFunction: function() {},
			cssExceededFunction: function() {},
			cssOkFunction: function() {},
		}; 
			
		var options = $.extend(defaults, options); 
		
		function calculate(monitor, counter){
			var count = monitor.val().length;
			var offset = checkPostForURL(monitor.val());
			if( offset ) {
				count = count - offset;
			}

			var available = options.allowed - count;
			if(available <= options.warning && available >= 0){
				counter.removeClass().addClass(options.cssDefault).addClass(options.cssWarning);
				options.cssWarningFunction();
			} else if(available < 0){
				counter.removeClass().addClass(options.cssDefault).addClass(options.cssExceeded);
				options.cssExceededFunction();
			} else {
				counter.removeClass().addClass(options.cssDefault).addClass(options.cssOk);
				options.cssOkFunction();
			}

			counter.html(options.counterText + available);
		};

		function checkPostForURL(post) {
		    var matches = new Array();
		    var urlexp = new RegExp("(^|[ \t\r\n])((http|https):(([A-Za-z0-9$_.+!*(),;/?:@&~=-])|%[A-Fa-f0-9]{2}){2,}(#([a-zA-Z0-9][a-zA-Z0-9$_.+!*(),;/?:@&~=%-]*))?([A-Za-z0-9$_+!*();/?:~-]))","g");
		    
		    if ( post != undefined ){
		        if ( urlexp.test(post) ){
		               var offset = 0;
		               //$('.shortenlinks').show();
		               matches = post.match(urlexp);
		    
		               //$('#linkstoshort').html('');
		    
		               $.each(matches,function(){
		                var matchlen = this.length;
		                var matchoffset = matchlen - 21;
		    
		                offset = offset + matchoffset;  
		                //$('#linkstoshort').append('<li>'+this+'</li>');
		            });
		    
		            return offset;
		        }
		    }
		 }
				
		this.each(function() {
			counter = this;
			monitor = options.monitor;
			calculate($(monitor), $(counter));
			$(monitor).keyup(function(){calculate($(monitor), $(counter))});
			$(monitor).change(function(){calculate($(monitor), $(counter))});
		});
	  
	};

})(jQuery);
