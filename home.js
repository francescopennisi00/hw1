function onNewsClick(event) {

    //CREO UN FORM INVISIBILE AL CUI INTERNO INSERISCO L'ID DELLA NOTIZIA PER PASSARLA AL SERVER TRAMITE POST (CON INPUT TYPE HIDDEN)
    //IN MODO DA POTER GENERARE LA PAGINA WEB DINAMICA PER LA NOTIZIA

    const notizia = event.currentTarget;

    const Vform = document.createElement("form");
    Vform.classList.add("hidden");
    Vform.action = "news.php";
    Vform.method = 'post';

    const input_id = document.createElement("input");
    input_id.type = 'hidden';
    input_id.name = 'id_notizia';

    input_id.value = notizia.dataset.idNotizia; 

    Vform.appendChild(input_id);

    const sezione_notizie = document.querySelector("#main");
    sezione_notizie.appendChild(Vform);

    Vform.submit();  //attivo il submit per passare alla pagina web della notizia

}


function generaNotizie(json,sezione) {
    for (notizia of json) {

        const immagine_src = notizia.immagine;
        const title = notizia.titolo;
        const dataPubblicazione = notizia.data_pubblicazione;
        const oraPubblicazione = notizia.ora_pubblicazione.slice(0,5);  //estraggo l'orario fino al minuto

        const divNotizia = document.createElement("div");

        const immagine = document.createElement("img");
        immagine.src = immagine_src;
        divNotizia.appendChild(immagine);

        const PTitolo = document.createElement("p");
        PTitolo.textContent = title;
        PTitolo.dataset.idNotizia = notizia.id;   //serve come input hidden del form per generare la pagina della notizia
        PTitolo.addEventListener('click',onNewsClick);  //al click avviene il reindirizzamento verso la pagina web (generata dinamicamente) della notizia
        divNotizia.appendChild(PTitolo);

        const EMTime = document.createElement("em");
        EMTime.textContent = dataPubblicazione + " | " + oraPubblicazione;
        divNotizia.appendChild(EMTime);

        sezione.appendChild(divNotizia);
    }
}


function AggiornaNotizieJson(json) {

    console.log(json);  //stampo il json restituito

    //svuoto la sezione notizie
    const sezione_notizie = document.querySelector("#main");
    sezione_notizie.innerHTML = '';

    generaNotizie(json,sezione_notizie);
}


function onResponse(response) {
    return response.json();
}


function aggiornaNotizie() {
    //richiesta dell'elenco delle notizie
    fetch("aggiorna_notizie.php").then(onResponse).then(AggiornaNotizieJson);
}


function onSearchJson(json) {

    //stampo il json restituito
    console.log(json);

    //svuoto la lista delle notizie cercate
    const sez_notizie_trovate = document.querySelector("#sez_notizie_trovate");
    sez_notizie_trovate.innerHTML = "";

    //mostro il titolo della sezione delle notizie cercate
    document.querySelector("#titolo_ric").classList.remove("hidden");

    if (json.length === 0) {
        console.log("PROVA JSON A LUNGHEZZA NULLA");
        //mostro il messaggio "nessuna notizia trovata"
        const avviso = document.querySelector("#ric_null");
        avviso.textContent = "Nessuna notizia trovata";
        avviso.classList.remove("hidden");
    }
    else generaNotizie(json,sez_notizie_trovate);
}


function onSubmit(event) {

    const form = event.currentTarget;

    if (form.object.value === "") {
        const errore = document.querySelector("#errore");
        errore.classList.remove("hidden");
        errore.textContent = "Errore! Barra di ricerca vuota";
    }
    else {
        //NASCONDO TUTTE QUELLO CHE E' COLLEGATO ALLA RICERCA DELLE NOTIZIE TANTO VERRA' MOSTRATO DOPO CHE LA FETCH AVRA' AVUTO SUCCESSO
        document.querySelector("#titolo_ric").classList.add("hidden");
        document.querySelector("#ric_null").classList.add("hidden");
        // Invia richiesta con POST
        const form_data = {method: 'post', body: new FormData(form)};
        fetch("ricerca.php", form_data).then(onResponse).then(onSearchJson);
    }

    //impedisci submit
    event.preventDefault();
}


function onFocusSearch(event) {
    const errore = document.querySelector("#errore");
    errore.classList.add("hidden");
    errore.textContent = "";
}


//carica all'apertura l'elenco delle notizie
aggiornaNotizie();

//associo un handler per il submit del form
const form = document.forms['search'];
form.addEventListener('submit',onSubmit);

//al focus sulla barra di ricerca il messaggio di errore sparisce
form.object.addEventListener("click",onFocusSearch);



