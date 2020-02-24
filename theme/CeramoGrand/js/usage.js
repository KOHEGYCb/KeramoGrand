

var selectUsage = document.getElementById('usage');
selectUsage.addEventListener('click', selectUsageListner, false);

var selectUsageElement=selectUsage.value;

var gallery = document.getElementById('gallery');

function selectUsageListner() {
	if (selectUsageElement !== selectUsage.value){
		selectUsageElement = selectUsage.value;
		console.log(selectUsageElement);

		var list = new Array();
		for (var i = 0; i < gallery.children.length; i++) {
			if (gallery.children[i].attributes["usage"]) {
				gallery.children[i].style.display = "none";
				if (gallery.children[i].attributes["usage"].nodeValue.indexOf(selectUsageElement) >= 0){
					gallery.children[i].style.display = "block";
					console.log(i + " " + (gallery.children[i].attributes["usage"].nodeValue));
				}
			}
		}
	}
}


// Init fancybox
$().fancybox({
  selector : '.gallery_list a:visible',
  thumbs   : {
    autoStart : true
  }
});

// Simple filter
$('#usage').on('change', function() {
  var $visible, val = this.value;
  
  if (val) {
    $visible = $('.gallery_list a').hide().filter('.' + val);
    
  } else {
    $visible = $('.gallery_list a');
  }
  
  $visible.show();
});