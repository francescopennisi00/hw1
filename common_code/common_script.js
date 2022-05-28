function onMenuClick(event) {           
    const tre_barre = event.currentTarget;
    const menu = document.querySelector("#menu_view");
    tre_barre.classList.add("hidden");
    menu.classList.remove("hidden");
    menu.classList.add("menu_view");  //classe che contiene lo stile di questo menù 
}

function chiudiMenu(event) {                      
    const menu = document.querySelector("#menu_view");
    menu.classList.add("hidden");
    menu.classList.remove("menu_view");
    const tre_barre = document.querySelector("#menu");
    tre_barre.classList.remove("hidden");
}

//al click sulle tre barre orizzontali nella mobile view viene visualizzato il menù   
const menu = document.querySelector("#menu");
menu.addEventListener("click",onMenuClick);

//associo un handler al click su "chiudi menù"     
const chiudi_menu = document.querySelector("#menu_view em");
chiudi_menu.addEventListener("click",chiudiMenu);