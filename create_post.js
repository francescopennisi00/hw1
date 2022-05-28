function onUserDataJson(json) {  

    //stampo in console il json ricevuto
    console.log(json);

    //salvo i dati del json in delle variabili
    const nome = json["name"];
    const cognome = json["surname"];
    const username = json["username"];

    //mostro i dati nella pagina

    const section = document.querySelector("section div");  

    const a = document.createElement("a");
    a.textContent = nome + " " + cognome + " - @" + username;
    section.appendChild(a);

}

function onResponse(response) {
    return response.json();
}

function pubblicaPost(event) {

    const form = document.querySelector("#textarea");
    const textarea = document.querySelector("textarea");

    //se la textarea non è vuota può essere inviato il form
    if (textarea.value.length !== 0) {
        form.submit();
    }

}

//associo un handler al click su bottone "Pubblica"
const button = document.querySelector("main header button");
button.addEventListener("click",pubblicaPost);

//all'apertura della pagina visualizza i dati dell'utente loggato
fetch("mostra_dati_utente.php").then(onResponse).then(onUserDataJson);