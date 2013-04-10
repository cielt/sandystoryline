var Storyline = {};
jQuery(document).ready(function($) {
	//hashchange triggers event
	//add listener to window

/*
	jQuery("a.storyline").colorbox({
		rel:'storyline'
	});
*/	
	
	 
	jQuery("a.storyline").colorbox({
		href : jQuery(this).attr('href'),
		rel:'storyline',
		maxWidth : '100%',
		maxHeight : '100%',
		current : 'Sandy Storyline',
		previous : '&larr;',
		next : '&rarr;',
		fixed : true,
		onLoad : function(){ 
			console.log("cb onLoad called"); 
			updateHash(jQuery(this).attr('hash'));
		}
	});
	
	//BBQ for lightboxes
	// mapping of url-to-container for caching purposes.
	var cache = {
		// If url is '' (no fragment), display this div's content.
		'': jQuery('.bbq-default')
	};
	
	var updateHash = function(newHash){
		console.log("updateHash called : "+newHash);
		window.location.hash = newHash;
	}

	// bind event to window.onhashchange -- when history state changes,
	// get url from the hash and displays either our cached content or fetch
	// new content to be displayed.
	jQuery(window).bind( 'hashchange', function(e) {
		var activeHash = window.location.hash; //or first
		console.log('hashchange event fired :'+activeHash);
		
		// iterate over <a> elts; set class to "current" if href matches; remove it otherwise
		jQuery("a.storyline").each(function(){
			var hash = jQuery(this).attr( "hash" );

			if ( hash === activeHash ) {
				//launch colorbox
				jQuery.colorbox({
					href : jQuery(this).attr('href'),
					rel:'storyline',
					maxWidth : '100%',
					maxHeight : '100%',
					previous : '&larr;',
					next : '&rarr;',
					fixed : true,
				});
				jQuery(this).addClass( "current" );
			} else {
				jQuery(this).removeClass( "current" );
			}

		});


	});
	
	jQuery(window).trigger('hashchange');

});