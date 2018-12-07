$(function() {
	$('.js-description_readmore').moreLines({
		linecount: 10, 
		baseclass: 'b-description',
		basejsclass: 'js-description',
		classspecific: '_readmore',    
		buttontxtmore: "Покажи всички",               
		buttontxtless: "Скрии",
		animationspeed: 250 
	});
});