function resizeGallery(){
	var amount = 1;
	var galleryWidth = document.documentElement.clientWidth;

	var galleryElements = document.getElementById('gallery').children;


	if (galleryWidth > 700){
		amount++;
	}
	if (galleryWidth > 1200){
		amount++;
	}
	if (galleryWidth > 1600){
		amount++;
	}
	if (galleryWidth > 1750){
		// amount++;
	}

	for (var i = galleryElements.length - 1; i >= 0; i--) {
		galleryElements[i].style.width = galleryWidth/amount + "px";
		galleryElements[i].style.height = galleryWidth/(amount * 3) + "px";
	}
}

resizeGallery();
$(window).on('resize', function () {
    resizeGallery();
});

var galleryElements = document.getElementById('gallery').children;
for (var i = galleryElements.length - 1; i >= 0; i--) {
	if (galleryElements[i].getAttribute('color') === "w"){
		galleryElements[i].style.color = "#d6d6d6";
		galleryElements[i].style.borderColor = "#d6d6d6"
	}
	if (galleryElements[i].getAttribute('color') === "b"){
		galleryElements[i].style.color = "#201f24"
		galleryElements[i].style.borderColor = "#201f24"
	}
}