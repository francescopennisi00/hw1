function onClassificaJson(json) {

    //svuoto la classifica (lasciando la prima barra visibile)
    const sezioneClassifica = document.querySelector("#classifica");
    const div_Squadra = sezioneClassifica.querySelectorAll('div');
    for (blocco of div_Squadra) {
        blocco.innerHTML = '';
    }

    //stampo in console l'oggetto ritornato
    console.log(json);

    //itero 20 volte poichè le squadre di Serie A sono 20 (anche l'array standings ha dimensione 20)
    for(let i=0;i<20;i++) {

        const squadra = json.data.standings[i];
        const nome_squadra = squadra.team.abbreviation
        const logo = squadra.team.logos[0].href;
        const numeroPartite = squadra.stats[3].value;
        const numVittorie = squadra.stats[0].value;
        const numSconfitte = squadra.stats[1].value;
        const numPareggi = squadra.stats[2].value;
        const golFatti = squadra.stats[4].value;
        const golSubiti = squadra.stats[5].value;
        const diffGoal = squadra.stats[9].value;
        const punti = squadra.stats[6].value;

        const div_Squadra = document.createElement('div');
        const span_Nome_Logo = document.createElement('span');
        const span_Stats = document.createElement('span');

        //inserisco la posizione accanto al logo
        const pos = document.createElement('a');
        pos.textContent = i+1;
        span_Nome_Logo.appendChild(pos);

        const img_logo = document.createElement('img');
        img_logo.src = logo;
        span_Nome_Logo.appendChild(img_logo);

        const name = document.createElement('a');
        name.textContent = nome_squadra;
        span_Nome_Logo.appendChild(name);

        const PG = document.createElement('a');
        PG.textContent = numeroPartite;
        span_Stats.appendChild(PG);

        const V = document.createElement('a');
        V.textContent = numVittorie;
        span_Stats.appendChild(V);

        const S = document.createElement('a');
        S.textContent = numSconfitte;
        span_Stats.appendChild(S);

        const P = document.createElement('a');
        P.textContent = numPareggi;
        span_Stats.appendChild(P);

        const GF = document.createElement('a');
        GF.textContent = golFatti;
        span_Stats.appendChild(GF);

        const GS = document.createElement('a');
        GS.textContent = golSubiti;
        span_Stats.appendChild(GS);

        const DG = document.createElement('a');
        DG.textContent = diffGoal;
        span_Stats.appendChild(DG);

        const PT = document.createElement('a');
        PT.textContent = punti;
        span_Stats.appendChild(PT);

        div_Squadra.appendChild(span_Nome_Logo);
        div_Squadra.appendChild(span_Stats);
        sezioneClassifica.appendChild(div_Squadra);

    }
}


function onCalendarioJson(json) {

    console.log(json);  //stampo il json restituito 

    //svuoto la sezione risultati 
    const sezioneRisultati = document.querySelector("#calendario");
    const divPartita = sezioneRisultati.querySelectorAll('div');
    for (blocco of divPartita) {
        blocco.innerHTML = '';
    }

    for (let i=0;i<json.length;i++) {

        const competizione = json[i].competizione;
        const giornata = json[i].giornata;
        const data = json[i].data_partita;
        const orario = json[i].orario;
        const stadio = json[i].stadio;
        const logoC = json[i].logo_casa;
        const nomeC = json[i].casa;
        const golC = json[i].punteggio_casa;
        const golT = json[i].punteggio_trasferta;
        const nomeT = json[i].trasferta;
        const logoT = json[i].logo_trasferta;

        const bloccoPartita = document.createElement("div");
        bloccoPartita.classList.add("bloccoPartita");

        const bloccoInfoPartita = document.createElement("div");
        bloccoInfoPartita.classList.add("bloccoInfoPartita");

        const spanCompetizione = document.createElement("span");
        spanCompetizione.textContent = competizione.toUpperCase();  //porto in maiuscolo la stringa della competizione
        bloccoInfoPartita.appendChild(spanCompetizione);

        const spanGiornata = document.createElement("span");
        spanGiornata.textContent = giornata;
        bloccoInfoPartita.appendChild(spanGiornata);

        const spanDataOra = document.createElement("span");
        spanDataOra.textContent = data + " - " + orario.substr(0,5);   //estraggo l'orario solo fino ai minuti
        bloccoInfoPartita.appendChild(spanDataOra);

        const spanStadio = document.createElement("span");
        spanStadio.textContent = stadio;
        bloccoInfoPartita.appendChild(spanStadio);

        const bloccoRisultato = document.createElement("div");
        bloccoRisultato.classList.add("bloccoRisultato");

        const imageC = document.createElement("img");
        imageC.src = logoC;
        bloccoRisultato.appendChild(imageC);

        const spanNomeC = document.createElement("span");
        spanNomeC.textContent = nomeC.toUpperCase();  //porto in maiuscolo la stringa del nome della squadra di casa
        bloccoRisultato.appendChild(spanNomeC);

        const spanGol = document.createElement("span");
        spanGol.textContent = golC + " - " + golT;
        bloccoRisultato.appendChild(spanGol);

        const spanNomeT = document.createElement("span");
        spanNomeT.textContent = nomeT.toUpperCase();   //porto in maiuscolo la stringa del nome della squadra di casa
        bloccoRisultato.appendChild(spanNomeT);

        const imageT = document.createElement("img");
        imageT.src = logoT;
        bloccoRisultato.appendChild(imageT);

        bloccoPartita.appendChild(bloccoInfoPartita);
        bloccoPartita.appendChild(bloccoRisultato);

        sezioneRisultati.appendChild(bloccoPartita);
    }

}


function onResponse(response) {
    return response.json();
}


//effettuo la fetch al server locale per l'ottenimento della classifica
fetch("classifica.php").then(onResponse).then(onClassificaJson);

//effettuo la fetch al server locale per l'ottenimento del calendario
fetch("calendario.php").then(onResponse).then(onCalendarioJson);