///////////////////////////////		
// Set Variables
///////////////////////////////

var container = jQuery('.thumbs.masonry');
var colWidth;
var gridGutter = 20;

///////////////////////////////		
// iPad and iPod Detection
///////////////////////////////
	
function isMobile(){
    return (
        (navigator.userAgent.match(/Android/i)) ||
		(navigator.userAgent.match(/webOS/i)) ||
		(navigator.userAgent.match(/iPhone/i)) ||
		(navigator.userAgent.match(/iPod/i)) ||
		(navigator.userAgent.match(/iPad/i)) ||
		(navigator.userAgent.match(/BlackBerry/))
    );
}


///////////////////////////////		
// Isotope Browser Check
///////////////////////////////

function isotopeAnimationEngine(){
	if(jQuery.browser.mozilla || jQuery.browser.msie){
		return "jquery";
	}else{
		return "css";
	}
}


///////////////////////////////
// Project Filtering 
///////////////////////////////

function projectFilterInit() {
	
	jQuery('#filterNav a').click(function(){
		var selector = jQuery(this).attr('data-filter');
		var container = jQuery('.thumbs.masonry');		
		container.isotope({
			filter: selector,			
			hiddenStyle : {
		    	opacity: 0,
		    	scale : 1
			},
			resizable: false
			
		});
	
		if ( !jQuery(this).hasClass('selected') ) {
			jQuery(this).parents('#filterNav').find('.selected').removeClass('selected');
			jQuery(this).addClass('selected');
		}
	
		return false;
	});	
}

///////////////////////////////
// Isotope Grid Resize
///////////////////////////////

function setColumns()
{	
	var columns;	
	if(container.width() < 480) {
	    columns = 2;
		gridGutter = 10;
	} else if(container.width() < 700) {
	    columns = 3;
		gridGutter = 20;	
	} else {
	    columns = 4;
		gridGutter = 20;
	}
	
	colW = Math.floor(container.width() / columns);
	jQuery('.thumbs.masonry .project.small').each(function(id){
		jQuery(this).css('width',colW-gridGutter+'px');
	});
}

function gridResize() {	
	setColumns();
	container.isotope({
		resizable: false,
		masonry: {
			columnWidth: colW
		}
	});		
}


///////////////////////////////
// Project thumbs 
///////////////////////////////

function projectThumbInit() {
	
	if(!isMobile()) {		
	
		jQuery(".project.small .inside a").hover(
			function() {
				jQuery(this).find('img:last').stop().fadeTo("fast", .1);
				jQuery(this).find('img:last').attr('title','');	
			},
			function() {
				jQuery(this).find('img:last').stop().fadeTo("fast", 1);	
		});
			
		jQuery(".project.small .inside").hover(	
			function() {				
				jQuery(this).find('.title').stop().fadeTo("fast", 1);
				jQuery(this).find('img:last').attr('title','');				
			},
			function() {				
				jQuery(this).find('.title').stop().fadeTo("fast", 0);							
		});
		
	}	
	
	var container = jQuery('.thumbs.masonry');
	setColumns();
	container.isotope({		
		resizable: false,
		masonry: {
			columnWidth: colW
		}
	});	
	gridResize();
	jQuery(".project.small").css("opacity", "1");
}
	
	
jQuery.noConflict();
jQuery(window).load(function(){		
	projectThumbInit();	
	projectFilterInit();
	jQuery(".videoContainer").fitVids();
	
	jQuery(window).smartresize(function(){
		gridResize();
	});
	
	jQuery('img').attr('title','');	
	
});