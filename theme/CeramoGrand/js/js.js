function openMenu() {
	var nav = document.getElementById("nav");
    if (isMenuOpen) {
        nav.style.top = "-2000px";
        isMenuOpen = !isMenuOpen;
    } else {
    	
    	nav.style.height = "" + (document.documentElement.clientHeight - 71 - 60) + "px";
    	// nav.style.minHeight = "" + (document.body.offsetWidth - 71 - 60) + "px";
        nav.style.top = "71px";
        // document.getElementById("place").style.height = 0;
        isMenuOpen = !isMenuOpen;
    }
}

var isMenuOpen = false;
var btn_addSQLCol = document.getElementById('btn_menu');
btn_addSQLCol.addEventListener('click', openMenu, false);


removeHref(document.getElementsByClassName('open'));

function removeHref(open){
    for (var i = 0; i < open.length; i++){
      open[i].firstChild.removeAttribute('href');
    }
}

document.getElementById('content').style.minHeight = "" + (document.documentElement.clientHeight - document.getElementsByClassName("header")[0].clientHeight - document.getElementsByClassName("footer")[0].clientHeight - 32) + "px";

