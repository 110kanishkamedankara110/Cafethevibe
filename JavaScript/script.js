var clickCount = 0;

function showMenu() {
    let element = document.getElementById("left-menu");
    let button = document.getElementById("more");

    if (clickCount == 0) {
        element.style.marginLeft = "0";
        button.style.backgroundImage = "url('Resources/Images/8155520_close_delete_remove_cancel_trash_icon.png')";
        clickCount = 1;
    } else {
        element.style.marginLeft = "-100%";
        button.style.backgroundImage = "url('Resources/Images/3844438_hamburger_menu_more_navigation_icon.png')";



        clickCount = 0;
    }
}

function loadMenu() {


    let r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            let text = r.responseText;
            document.getElementById("aboutmain").innerHTML = text;

        }
    };
    r.crossDomain = true;
    r.withCredentials = true;
    r.open("GET", "http://cafethevibecpannel.epizy.com/menu.php", true);
    r.setRequestHeader("Access-Control-Allow-Origin", '*');

    r.send();


}