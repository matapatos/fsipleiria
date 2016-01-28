function scrollToAnchor(id){
	var aTag = jQuery(id);
	jQuery('html,body').animate({scrollTop: aTag.offset().top},'slow');
}
