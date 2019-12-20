function openMenu() {
    if (isMenuOpen) {
        document.getElementById("nav").style.top = -1000;
        isMenuOpen = !isMenuOpen;
    } else {
        document.getElementById("nav").style.height = document.body.clientHeight - 71 - 60;
        document.getElementById("nav").style.top = 71;
        document.getElementById("place").style.height = 0;
        isMenuOpen = !isMenuOpen;
    }
}

var isMenuOpen = false;
var btn_addSQLCol = document.getElementById('btn_menu');
btn_addSQLCol.addEventListener('click', openMenu, false);

// var btnKol = document.getElementById('kollections');
// btnKol.addEventListener('click', toogleKol, false);

