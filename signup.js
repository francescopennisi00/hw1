function onCheckUsernameJson(json) {

    if (json.exists === true) {
        const form = document.querySelector("form");
        const input_username = form.username;
        const span = input_username.parentNode.parentNode.querySelector("span");
        span.textContent = "Username già in uso!";
        span.classList.remove("hidden");
        statusForm.username = false;   //impostando questo valore a false impedisco l'invio del submit fino a successiva verifica
    }
    else statusForm.username = true;

}


function onCheckEmailJson(json) {

    if (json.exists === true) {
        const form = document.querySelector("form");
        const input_email = form.email;
        const span = input_email.parentNode.parentNode.querySelector("span");
        span.textContent = "Email non disponibile perchè già in uso!";
        span.classList.remove("hidden");
        statusForm.email = false;   //impostando questo valore a false impedisco l'invio del submit fino a successiva verifica
    }
    else statusForm.email = true;

}


function onResponse(response) {
    return response.json();
}

function controllaStato() {

    for(const key in statusForm) {
        if (statusForm[key] === false)
           return false;
    }

    return true;

}

function onSubmit(event) {

    const ris = controllaStato();  //se tutti i campi dell'array di stato sono true allora ritorna true, altrimemnti false
    if(ris === true) {
        const form = event.currentTarget;
        if (!form.allow.checked) {
            const span = form.allow.parentNode.parentNode.querySelector("span");
            span.textContent = "Necessario acconsentire al trattamento dati per continuare";
            span.classList.remove("hidden");
            event.preventDefault();
        }
    }
    else {
        event.preventDefault(); //nel caso in cui appaiono ancora messaggi di errore relativi ai vari input il form non viene inviato
        const span = form.allow.parentNode.parentNode.querySelector("span");
        span.textContent = "Dati inseriti non validi";
        span.classList.remove("hidden");
    } 

}

function checkNameSurname(event) {

    const input = event.currentTarget;

    //controllo che il nome/cognome inserito sia composto di sole lettere e che sia maiuscolo e nel caso visualizzo un messaggio di errore
    //preg_match in php, test in js
    const espressione_nome = /^[A-Za-z ]{2,30}$/;
    if(!espressione_nome.test(input.value)) {
        const span = input.parentNode.parentNode.querySelector("span");
        span.textContent = "Non valido!";
        span.classList.remove("hidden");
        statusForm.nome_cognome = false;
    }
    else if(/^[A-Z]$/.test(input.value[0]) === false) {
        const span = input.parentNode.parentNode.querySelector("span");
        span.textContent = "Deve essere maiuscolo!";
        span.classList.remove("hidden");
        statusForm.nome_cognome = false;
    }
    else statusForm.nome_cognome = true;
}

function checkEmail(event) {

    const input = event.currentTarget;

    //controllo che l'email sia del formato giusto 
    const espressione_email = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if(!espressione_email.test(input.value)) {
        const span = input.parentNode.parentNode.querySelector("span");
        span.textContent = "Email non valida!";
        span.classList.remove("hidden");
        statusForm.email = false;
    }
    else {
        fetch("check_email.php?param="+encodeURIComponent(input.value)).then(onResponse).then(onCheckEmailJson);
    };
}

function checkUserName(event) {

    const input = event.currentTarget;

    //sono ammessi username di massimo 20 caratteri alfanumerici e con il solo underscore come carattere speciale
    if(!/^[a-zA-Z0-9_]{1,20}$/.test(input.value)) {
        const span = input.parentNode.parentNode.querySelector("span");
        span.textContent = "Sono ammesse lettere, numeri e underscore. Max 15 caratteri!";
        span.classList.remove("hidden");
        statusForm.username = false;
    }
    else {
        fetch("check_username.php?param="+encodeURIComponent(input.value)).then(onResponse).then(onCheckUsernameJson)
    };
}

function checkPassword(event) {

    const input = event.currentTarget;

    //la password deve essere di almeno 8 caratteri, in caso contrario memorizzo l'errore (sotto forma di stringa) in un array
    if (input.value.length < 8) {
        const span = input.parentNode.parentNode.querySelector("span");
        span.textContent = "La password è troppo corta: inserire una password di almeno 8 caratteri!";
        span.classList.remove("hidden");
        statusForm.password = false;
    }
    else statusForm.password = true;

}

function checkConfirmPassword(event) {

    const input_ConfPass = event.currentTarget;
    const form = document.querySelector("form");
    const input_pass = form.password;

    //controllo che le due password (la prima e quella di conferma) inserite siano identiche (POSSIBILMENTE DA SISTEMARE CON HASH)
    if (input_ConfPass.value !== input_pass.value) {
        const span = input_ConfPass.parentNode.parentNode.querySelector("span");
        span.textContent = "La password di conferma non coincide con la precedente!";
        span.classList.remove("hidden");
        statusForm.confirm_password = false;
    }
    else statusForm.confirm_password = true;

}

function onFocus(event) {

    const input = event.currentTarget;

    //nascondo il messaggio di errore relativo all'input in focus se presente
    const span = input.parentNode.parentNode.querySelector("span");
    span.classList.add("hidden");
}

const form = document.querySelector("form");

form.nome.addEventListener("blur",checkNameSurname);
form.nome.addEventListener("focus",onFocus);

form.cognome.addEventListener("blur",checkNameSurname);
form.cognome.addEventListener("focus",onFocus);

form.email.addEventListener("blur",checkEmail);
form.email.addEventListener("focus",onFocus);

form.username.addEventListener("blur",checkUserName);
form.username.addEventListener("focus",onFocus);

form.password.addEventListener("blur",checkPassword);
form.password.addEventListener("focus",onFocus);

form.conferma_password.addEventListener("blur",checkConfirmPassword);
form.conferma_password.addEventListener("focus",onFocus);

form.addEventListener("submit",onSubmit);

//array globale che definisce se il form può essere inviato (se tutto l'array è true allora il form può essere inviato)
let statusForm = {

    'nome_cognome': false,
    'email': false,
    'username': false,
    'password': false,
    'confirm_password': false

};

