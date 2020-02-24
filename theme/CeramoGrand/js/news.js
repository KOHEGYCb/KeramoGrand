function drawNews() {
	var min_height = 68;

	var element_width = 400;
	var element_height = 500;
	var element_margin = 25;


	var news = document.getElementById('news');

	var elements = Array();
	for (var i = 1; i < news.children.length; i++) {
		elements.push(news.children[i]);
	}

	var news_width = news.clientWidth;
	var amount_elements_in_row = Math.floor(news_width/(element_width+element_margin*2));
	var amount_rows = Math.ceil(elements.length / amount_elements_in_row);

	var elements_left = elements.length;
	for (var i = 0; i < amount_rows; i++) {
		if (elements_left < amount_elements_in_row) {
			var newMargin = Math.floor((news_width - elements_left*(element_width+element_margin*2)) / 2)+25;
			elements[i*amount_elements_in_row].style.marginLeft = newMargin + "px";
			// var newMargin = Math.floor((news_width - elements_left*element_width) / elements_left / 2);
			// for (var j = 0; j < elements_left; j++) {
			// 	elements[i*amount_elements_in_row+j].style.marginLeft = newMargin + "px";
			// 	elements[i*amount_elements_in_row+j].style.marginRight = newMargin + "px";
			// }
			elements_left = 0;
		}else{
			var newMargin = Math.floor((news_width - amount_elements_in_row*(element_width+element_margin*2)) / 2)+25;
			elements[i*amount_elements_in_row].style.marginLeft = newMargin + "px";
			// var newMargin = Math.floor((news_width - amount_elements_in_row*element_width) / amount_elements_in_row / 2);
			// for (var j = 0; j < amount_elements_in_row; j++) {
			// 	elements[i*amount_elements_in_row+j].style.marginLeft = newMargin + "px";
			// 	elements[i*amount_elements_in_row+j].style.marginRight = newMargin + "px";
			// }
			elements_left -= amount_elements_in_row;
		}
	}

	news.style.height = min_height + amount_rows * (element_height+element_margin*2) + "px";
}

window.addEventListener('load', drawNews);
$(window).on('resize', drawNews);