function drawCatalogs() {
	var min_height = 68;

	var element_width = 400;
	var element_height = 500;
	var element_margin = 25;


	var catalogs = document.getElementById('catalog');

	var elements = Array();
	for (var i = 0; i < catalogs.children.length; i++) {
		elements.push(catalogs.children[i]);
	}

	var catalogs_width = catalogs.clientWidth;
	var amount_elements_in_row = Math.floor(catalogs_width/(element_width+element_margin*2));
	var amount_rows = Math.ceil(elements.length / amount_elements_in_row);

	var elements_left = elements.length;
	for (var i = 0; i < amount_rows; i++) {
		if (elements_left < amount_elements_in_row) {
			var newMargin = Math.floor((catalogs_width - elements_left*(element_width+element_margin*2)) / 2)+25;
			elements[i*amount_elements_in_row].style.marginLeft = newMargin + "px";
			elements_left = 0;
		}else{
			var newMargin = Math.floor((catalogs_width - amount_elements_in_row*(element_width+element_margin*2)) / 2)+25;
			elements[i*amount_elements_in_row].style.marginLeft = newMargin + "px";
			elements_left -= amount_elements_in_row;
		}
	}

	catalogs.style.height = min_height + amount_rows * (element_height+element_margin*2) + "px";
}

window.addEventListener('load', drawCatalogs);
$(window).on('resize', drawCatalogs);