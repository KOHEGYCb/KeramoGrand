function resizeGallery(){
	var galleryWidth = document.documentElement.clientWidth;

	var galleryElements = document.getElementById('gallery').children;

	for (var i = galleryElements.length - 1; i >= 0; i--) {
		galleryElements[i].style.width = galleryWidth/3 + "px";
		galleryElements[i].style.height = galleryWidth/9 + "px";
	}
}

resizeGallery();
$(window).on('resize', function () {
    resizeGallery();
});