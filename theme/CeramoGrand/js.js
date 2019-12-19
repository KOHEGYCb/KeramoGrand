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

function toogleKol() {
    
}

var isMenuOpen = false;
var btn_addSQLCol = document.getElementById('btn_menu');
btn_addSQLCol.addEventListener('click', openMenu, false);


//document.getElementById("nav").style.height = document.body.clientHeight - 71 - 60;
//        document.getElementById("nav").style.top = 71;