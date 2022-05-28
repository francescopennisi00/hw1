CREATE DATABASE hw1;

USE hw1;

CREATE TABLE notizia (
	id INTEGER AUTO_INCREMENT PRIMARY KEY,
    immagine VARCHAR(255),
    titolo VARCHAR(255) NOT NULL,
    informazione VARCHAR(3000) NOT NULL,
    fonte VARCHAR(255),
    data_pubblicazione DATE NOT NULL,
    ora_pubblicazione TIME NOT NULL
) Engine = InnoDB;

INSERT INTO notizia (immagine,titolo,informazione,fonte,data_pubblicazione,ora_pubblicazione) VALUES (
    "images/origi.jpg", 
    "Milan, Origi sempre più vicino: niente rinnovo unilaterale col Liverpool, sarà addio",
    "Stando a quanto riportato da The Athletic l'attaccante del Liverpool Divock Origi lascerà certamente i Reds a fine stagione: ad attenderlo c'è infatti un contratto con il Milan, che lo tessererà a parametro zero. Il belga non ha raggiunto il numero di presenze minime che avrebbero attivato una clausola per un rinnovo annuale automatico, ulteriore conferma dell'addio in direzione Serie A.",
    "Simone Lorini",
    current_date(),
    current_time()
);

INSERT INTO notizia (immagine,titolo,informazione,fonte,data_pubblicazione,ora_pubblicazione) VALUES (
    "images/ibrahimovic.jpg",
    "Nosotti su Ibrahimovic: 'Questo Milan senza di lui non ci sarebbe stato'",
    "Intervenuto ai microfoni di Sky Sport, Marco Nosotti ha parlato di Ibrahimovic. Queste le sue parole: 'Forse non c'è bisogno come primo centravanti, forse non si deve costruire la squadra intorno a lui ma è una figura fondamentale all'interno dello spogliatoio del Milan. E' stato bravissimo Ibrahimovic a definire i ruoli. Questo Milan però senza Ibrahimovic non ci sarebbe stato perchè entrato molto bene in questo gruppo ed è stato da stimolo negli allenamenti'",
    "Pietro Andrigo per Milannews.it",
    current_date(),
    current_time()
);

INSERT INTO notizia (immagine,titolo,informazione,fonte,data_pubblicazione,ora_pubblicazione) VALUES (
    "images/leao.png",
    "Sorriso, potenza e quel marchio di fabbrica: il mondo leggero di Rafa Leao",
    "Su Rafael Leao in questi anni se ne sono dette di tutti i colori: tante critiche, alcune giuste e altre meno, poca pazienza e troppa ingenerosità nei confronti di un diamante grezzo che sta iniziando a splendere di una luce sempre più accecante. Quest'anno i numeri in Serie A del portoghese non lasciano nessuno spiraglio, neanche agli haters più incalliti: 10 gol e 7 assist in 32 match di campionato. Per un esterno offensivo di 22 anni, 23 fra un mese, sono dati eccezionali. 

Nell'importantissima sfida di domenica sera contro il Verona di Tudor, tutto il popolo rossonero si è potuto rifare gli occhi ancora una volta guardando le giocate di Rafa: mai banale, potente, imprendibile e soprattutto efficace. Due assist per la doppietta di Sandro Tonali, due passaggi vincenti che sono arrivati dopo la solita incontenibile corsa palla al piede con quello che ormai è diventato un marchio di fabbrica dell'ex Lille: corsa ciondolante, accenno di doppio passo, o 'stepover' come direbbero quelli bravi, e poi gas a manetta. Vedendolo sembra semplicissimo, come se fosse la cosa più naturale del mondo: la verità è che per Leao è davvero la cosa più naturale del mondo, lo si capisce dal sorriso che ha stampato in faccia mentre supera, di solito con la seconda o terza falcata, l'inerme avversario. Sembra facile, ma non lo è. Non è facile farlo sistematicamente, non è facile farlo senza che diventi un esercizio di stile e non è facile farlo in un campionato in cui giocatori così pericolosi vengono raddoppiati o, spesso, triplicati.

Eppure Rafa va, parte e se ne frega, un po' come ha fatto con tutte le critiche di questi anni: è il nuovo Niang, non è da Milan, pensa solo alla musica, non ha la testa, e via dicendo. Parole al vento, bruciate dalla velocità e dal talento esplosivo del portoghese. Che quest'anno ha imparato a rendere utile quello che lo fa divertire. Nei precedenti due anni in rossonero abbiamo visti tanti colpi di genio da parte del numero 17, ma spesso troppo isolati nel tempo e mai continui nel corso della partita. La società, nelle figure di Maldini e Massara, evidentemente non ha mai avuto dubbi e ha continuato a riporre fiducia nel classe '99, così come lo ha fatto Pioli e lo hanno fatto i suoi compagni. Rafa ha sentito l'amore e ha capito: quest'anno non è solo bello da vedere, è anche, e soprattutto, efficace. Il MIlan se lo gode, lui è concentratissimo su questo finale di stagione al cardiopalma, pronto più che mai ad aiutare i suoi compagni verso un sogno. Il tutto sempre con la leggerezza del suo mondo e quel sorriso a trentadue denti.",
    "Manuel Del Vecchio per Milannews.it",
    current_date(),
    current_time()
);

INSERT INTO notizia (immagine,titolo,informazione,fonte,data_pubblicazione,ora_pubblicazione) VALUES (
    "images/uefa.jpg",
    "Nuova Champions dal 2024, l'ECA approva la riforma delle competizioni UEFA",
    "Era plausibile arrivasse, ma l'ECA ha ora approvato le riforme della UEFA alle competizioni dei club maschili europei dopo il 2024, che oggi sono diventate ufficiali grazie al Comitato Esecutivo della UEFA. 'L'ECA ha collaborato con la UEFA da quando le riforme sono state avviate per la prima volta alcuni anni fa, per garantire l'evoluzione più equilibrata e progressiva delle competizioni per club. In qualità di voce rappresentativa dei club che partecipano a queste competizioni, l'ECA sostiene da tempo le riforme per rendere il calcio per club in tutte le competizioni europee più sostenibile, inclusivo e di successo'.
'L'ECA ritiene che il formato e le decisioni di accesso concordate oggi all'ExCo della UEFA raggiungano una serie di obiettivi importanti, tra cui:
Conferma di un formato nuovo di zecca e innovativo sotto forma del nuovo sistema di campionati in tutte e tre le competizioni: UEFA Champions League, UEFA Europa League e UEFA Europa Conference League;
Crescita da 96 a 108 squadre partecipanti con un buon equilibrio tra squadre provenienti da tutti i paesi, inclusi almeno 37 campioni nazionali che accedono alle competizioni europee maschili;
Più opportunità per tutti i club, grandi e piccoli, di giocare ed essere visti sulla scena europea in più settimane di partite di calcio europee, inclusa una settimana esclusiva per ogni competizione;
Un'attenzione generale al merito sportivo, sia nazionale che europeo, garantendo al contempo che ogni competizione mantenga il proprio entusiasmo sportivo unico e il proprio valore commerciale, a vantaggio dell'intera piramide calcistica europea'.

'L'accordo raggiunto sull'elenco di accesso e sul calendario delle competizioni significa che le competizioni dal nuovo look avranno il miglior inizio di vita, risultato di approfondite consultazioni tra UEFA ed ECA nel corso di diversi anni che garantiscono il rispetto dei legittimi interessi di tutte le parti interessate. Spinto dall'interesse collettivo piuttosto che dall'interesse personale. Il nuovo formato offre anche l'opportunità di una crescita futura del calcio europeo in modo sostenibile, responsabile e inclusivo.
La decisione ha fatto seguito alla riunione del Comitato Esecutivo dell'ECA di ieri a Madrid dove la versione finale delle riforme della UEFA è stata approvata dall'ECA'.",
    "Andrea Losapio",
    current_date(),
    current_time()
);

INSERT INTO notizia (immagine,titolo,informazione,fonte,data_pubblicazione,ora_pubblicazione) VALUES (
    "images/verona-milan-esultanza.jpg",
    "Milan, contro il Verona è arrivata la quarta vittoria in campionato dopo lo svantaggio iniziale",
    "Come riportato da Opta, il Milan ha vinto quattro gare in questo campionato dopo essere andato in svantaggio, due di queste contro il Verona. Le altre il 24 aprile contro la Lazio e il 5 febbraio contro l’Inter.",
    "Antonio Tiziano Palmieri per Milannews.it",
    current_date(),
    current_time()
);

INSERT INTO notizia (immagine,titolo,informazione,fonte,data_pubblicazione,ora_pubblicazione) VALUES (
    "images/xavi.png",
    "Xavi chiama Kessie: 'Busquets non è eterno e ci serve un giocatore in quel ruolo'",
    "Xavi Hernandez, allenatore del Barcellona, ha parlato in conferenza stampa della necessità di rafforzare la squadra dopo la stagione difficile che i Blaugrana hanno attraversato. Xavi dice: “L’assenza di Busquets è pesante. In squadra non abbiamo un sostituto con le stesse caratteristiche. Dobbiamo cercar un equilibrio diverso quando non c'è Busquets. Abbiamo diverse opzioni e per il futuro dobbiamo cercare una soluzione. Busquets non è eterno, ci siamo passati tutti. Quindi è importante che il club pianifichi anche in questa direzione. Ho sempre detto che il Barça deve avere almeno due giocatori per ogni ruolo come minimo. E ho già detto che ci sono ruoli nei quali siamo scoperti in questo senso. Sarà importante pianificare con attenzione il futuro”. In pratica il tecnico del Barcellona non vede l’ora di abbracciare Franck Kessie, attuale centrocampista del Milan.",
    "Antonio Tiziano Palmieri per Milannews.it",
    current_date(),
    current_time()
);

INSERT INTO notizia (immagine,titolo,informazione,fonte,data_pubblicazione,ora_pubblicazione) VALUES (
    "images/investcorp.jpeg",
    "Cessione Milan, Investcorp pronta a rilanciare: la situazione",
    "L’entrata di RedBird nella trattativa per l’acquisto del Milan ha rallentato inevitabilmente i dialoghi tra Investcorp ed il fondo a stelle e strisce. Come abbiamo appreso negli scorsi giorni, la proposta da 1.1 miliardi di euro da parte dell’azienda di Cardinale è tenuta in forte considerazione dalla famiglia Singer, poiché Elliott non vorrebbe far ricadere centinaia di milioni di euro di debito (la prima proposta dal Bahrein, infatti, è di 800 milioni per equity e 400 di prestiti) su una società appena ristrutturata per non influenzare la credibilità dell’investitore (e per motivi di rating, indicatore di andamento aziendale, e di stabilità della stessa).

Ma, stando a quanto appreso dalla nostra redazione da fonti del Bahrein, il gruppo di Muhammad Al-Ardhi sarebbe pronto a far recapitare un’altra offerta alle sedi londinesi della famiglia Singer, dato che questo investimento è diventato una priorità per gli arabi (che vorrebbero portare i propri asset da 40 a 100 miliardi nel prossimo decennio). Ovviamente, per i motivi sopracitati, la proposta di Investcorp dovrà necessariamente avere una parte 'cash' decisamente più alta ed almeno un dimezzamento dei debiti – che, in ogni caso, non dovranno pesare sul bilancio del Milan. Sicuramente, si andrà sulle lunghe poiché il fondo americano vuole, in primis, aspettare la fine del campionato per avere maggiore chiarezza sulla contabilità di quest’anno e, poi, per favorire l’ingresso di nuovi investitori (con maggiori garanzie) per la cessione del club.",
    "Nicholas Reitano per Milannews.it",
    current_date(),
    current_time()
);


INSERT INTO notizia (immagine,titolo,informazione,fonte,data_pubblicazione,ora_pubblicazione) VALUES (
    "images/nkunku.png",
    "L'Equipe - Milan e non solo: Nkunku piace a mezza Europa. Ma il Lipsia spara alto",
    "La grande stagione di Christopher Nkunku non sta passando sotto traccia, per questo le big d'Europa si stanno già muovendo per portare a casa il giocatore. Il fantasista francese del Lipsia è cercato da molti club, come Chelsea, Manchester United e Barcellona. Oltre a queste squadre, anche il Milan segue la situazione legata all'ex PSG. Le altre richieste del Lipsia, che non ha bisogno di vendere, complicano le trattative per l'acquisto del classe '97.",
    "Gianluigi Torre per Milannews.it",
    current_date(),
    current_time()
);

INSERT INTO notizia (immagine,titolo,informazione,fonte,data_pubblicazione,ora_pubblicazione) VALUES (
    "images/sassuolo-milan-03.jpg",
    "Il Milan è campione d'Italia! Sassuolo battuto 0-3, il tricolore torna ai rossoneri 11 anni dopo",
    "Il Milan vince 0-3 in casa del Sassuolo (doppietta di Giroud, terzo gol firmato Kessié) e torna campione d’Italia a distanza di 11 anni!
     In una Reggio Emilia assediata dai tifosi del Diavolo e colorata di rossonero, Pioli si affida alle certezze e ripropone l’undici di sette giorni fa. La partenza, escludendo un tentativo di Berardi dalla lunga distanza, è un monologo rossonero purissimo: il Milan è affamato e inizia attaccando prepotentemente. Dopo grandi chance per Leao, Tomori e Saelemaekers, è Giroud a portare avanti i suoi e spianare la strada verso lo Scudetto, concludendo al meglio un’azione nata grazie ad un errore in impostazione del Sassuolo con Ayhan, rifinita da Leao e portata in rete con un mancino che passa sotto le gambe di Consigli da parte del francese. Il Diavolo ha ufficialmente aperto l’autostrada per la festa e a percorrerla a tutta velocità c’è sempre Leao. Chi se non lui? Il secondo assist di serata è destinato a Giroud, il terzo a Kessie per il mancino da fuori area che suggella al meglio il suo addio (per certi versi tratteggiato dalle polemiche) con destinazione Barcellona. Del Sassuolo minime tracce: i neroverdi si rendono pericolosi soprattutto da palla ferma, con Maignan che nel finale di frazione, salvando su Frattesi, dimostra come il premio di miglior portiere del campionato ricevuto nel pre-partita sia meritato.
     Con una tavola così tanto imbandita e la saliva alla bocca con l’appetito che aumenta d’intensità all’avvicinarsi del bottino, l’unico rischio reale per il Milan è quello di rilassarsi eccessivamente, pur potendo contare sulla considerevole dote di quattro gol di scorta da difendere nei 45 minuti conclusivi: il mancino di Berardi in apertura di ripresa è senza dubbio un avvertimento. Niente di serio, avrebbe detto qualcuno in vena di citazioni: il Milan gestisce bene, abbassa i ritmi e non presta il fianco al Sassuolo. Ecco che a prendersi il centro della scena sono allora le emozioni, come quelle che governano l’ingresso di Ibrahimovic per la sua probabile ultima apparizione da punta rossonera. Un addio da campione d’Italia, il suo, a differenza di quelli di Peluso e Magnanelli con i neroverdi, comunque sentiti. Più il tempo scorre, più le briglie si sciolgono: a mettere alle spalle anche la scaramanzia ci pensa Pioli a otto dal novantesimo, infiammando i suoi tifosi sulle tribune. Aspettando e cercando il gol nostalgico di Ibrahimovic (trovato, ma annullato per fuorigioco) è invece Traoré ad andare più vicino di tutti al gol, con un palo che esalta per l’ennesima volta le doti di Maignan. C’è addirittura il recupero (2 minuti), ad allungare la festa di Pioli e della sua gente. Il Milan torna campione d’Italia, lo Scudetto è della Milano rossonera.",
    "Dimitri Conti",
    current_date(),
    current_time()
);

INSERT INTO notizia (immagine,titolo,informazione,fonte,data_pubblicazione,ora_pubblicazione) VALUES (
    "images/tonali--leao.jpeg",
    "Milan Campione d'Italia, gli uomini Scudetto: Maignan-Leao fenomeni, cuore Tonali, Ibra-Giroud infiniti...",
    "In ogni trionfo che si rispetti c'è sempre una squadra che va elogiata in tutto e per tutto, ma ci sono anche singoli che, per singolari ed eccezionali qualità, la trascinano al prestigioso traguardo. Nel Milan fresco Campione d'Italia 2021-2022, in particolare, sono 5 i calciatori che hanno fatto la differenza in questa grandissima cavalcata Scudetto:

    - Maignan: numero 1 fra i pali senza averlo sulla schiena. La partenza di Donnarumma doveva togliere 10 punti al Milan, lui ne fa guadagnare una ventina con parate super, gioco coi piedi da centrocampista e leadership assodata. Ribadisco: numero 1.

    - Leao: l'altro fenomeno del gruppo oltre a Maignan, probabilmente - per ruolo - il più luccicante. Chiude la stagione con numeri buonissimi sia in fatto di gol che di assist, ai quali si aggiungono dribbling e giocate da fuoriclasse assoluto. È stata la stagione della sua esplosione: in campo non lo ha fermato praticamente nessuno e in futuro, con un Leao così e meglio di così, chi potrà fermare il Milan?!. Meravigliao.

    - Tonali: già nelle prime partite stagionali si era capito quanto fosse cresciuto rispetto all'annata passata, ma poi si è confermato nel tempo con prestazioni. a tutto campo praticamente sempre sul 7 o più. I gol importantissimi a Bergamo, a Roma contro la Lazio e a Verona sono valsi un pezzo di Scudetto, ma lui di mestiere fa il centrocampista quindi bisognerebbe aggiungere tanto di più. Anzi no, basta dire due parole: vecchio cuore.

    - Giroud: arrivato per dare il cambio a Ibrahimovic, ha giocato da titolare per tutto il girone di ritorno. Non impressiona per qualità e comunione nel gioco della squadra, ma è implacabilmente decisivo: la doppietta nel derby di ritorno (quello che spacca il campionato) la ciliegina su una torta che comprende tutti gli scalpi delle big, i goal di Reggio Emilia (chiude in doppia cifra di reti) e un milanismo evidente. Spallata.

    - Ibrahimovic: aveva detto a luglio 2020 che con lui da inizio campionato il Milan avrebbe lottato per lo Scudetto e... aveva ragione. Già, perché anche se non è più stato determinante sul campo come un tempo, Zlatan è stato colui che, con il suo arrivo e la sua mentalità, ha portato in due anni il Milan dal sesto posto ad essere Campione d'Italia. Infinito.",
    "Antonello Gioia per Milannews.it",
    current_date(),
    current_time()
);

INSERT INTO notizia (immagine,titolo,informazione,fonte,data_pubblicazione,ora_pubblicazione) VALUES (
    "images/giroud-gol-sasmil.jpeg",
    "Olivier Giroud, l’uomo del destino che ha spezzato la maledizione della 9",
    "Se hai il destino dalla tua parte, non serve molto per far sì che le stelle brillino nel tuo cielo. Questo è il caso di Oliver Giroud, l’uomo del destino, dello scudetto, per il Milan. Sono bastati appena due palloni al francese per dare il via alla festa tricolore del Diavolo. Due palloni tramutati in gol contro un Sassuolo che più dello sparring partner contro un Milan così non può fare.

    In questa stagione, nei momenti decisivi come questo, Stefano Pioli ha sempre saputo di poter contare sul proprio numero 9. In barba a tutte le maledizioni del mondo. Due gol nel Derby del 5 febbraio, uno con la Roma, uno contro il Napoli e un altro in casa della Lazio: ecco il ruolino di marcia dell’ex Chelsea in questa stagione.

    Oggi, dunque, non poteva toccare che a lui aprire le danze, stappare lo spumante e dare il via alla festa. Giroud, l’uomo del destino che ha spezzato la maledizione della 9.",
    "Luca Bargellini",
    current_date(),
    current_time()
);


INSERT INTO notizia (immagine,titolo,informazione,fonte,data_pubblicazione,ora_pubblicazione) VALUES (
    "images/scudetto-milan-2022.jpg",
    "Milan Campione d'Italia, emozioni e valori di un gruppo che ha dimostrato che 'volere è potere'",
    "Scrivere. Cancellare. Scrivere. Cancellare. Mettere (rosso)nero su bianco pensieri e stati d'animo mentre le braccia e le dita sono intorpidite dalla pelle d'oca non è facile. Le emozioni sono i colori della vita e la cromaticità del tifo rossonero, sempre vivo e sgargiante, è passata dai freddi tratti di ottavi e decimi posti alla caldissima pennellata di un tricolore meritato. Con una costante: l'amore per il rosso come il fuoco e per il nero della paura incussa agli avversari. Per celebrare la cavalcata del Milan il soggetto da utilizzare non è 'loro' bensì un 'noi': il concetto di famiglia, rimarcato dagli stessi protagonisti, conferma come la vittoria dello scudetto rossonero sia il frutto dell'impegno di un corpo unico, la squadra e i tifosi sempre insieme ad ogni latitudine, contro tutto e tutti. Nel rassettare i pensieri in questo tsunami di gioia e lacrime, scorrono le immagini di una stagione ricca di momenti indimenticabili. Come archeologi delle emozioni, sotto i leggendari strati di attimi come le reti di Giroud nel derby, della parata di Maignan con la Fiorentina o della rete di Tonali con la Lazio, possiamo scorgere picchi di milanismo inestimabili come la vicinanza della squadra dopo l'infortunio di Kjaer, il tutt'uno tra la squadra e i tifosi nell'Olimpico laziale o gli abbracci di Maldini e Massara in tribuna come veri cuori rossoneri. Come noi e voi che, dopo anni difficili, torniamo meritatamente a trionfare per un gruppo di ragazzi dal cuore incredibile. Questa vittoria è il frutto dell'impegno, della meritocrazia ed è la testimonianza che progettare con intelligenza rende possibile la frase 'volere è potere'. Ecco, quindi, che la nostra esigenza di cercare modelli a cui ispirarci, deve portare il tifo milanista a emulare nella quotidianità i valori di questo gruppo. Una rosa di ragazzi giovani, forti e volenterosi che, nonostante le difficoltà, non si sono abbattuti ma guidati da un Uomo con la U maiuscola come Stefano Pioli hanno raggiunto il loro obbiettivo. Ibrahimovic ha detto che a Milano si ricordano chi vince e non chi arriva secondo. Vero? No, è verissimo ma è altrettanto innegabile che il tifo rossonero scolpisce nella memoria chi ha a cuore la maglia milanista. Questi ragazzi lo hanno dimostrato nell'animo e in campo e la vittoria dello scudetto ne è stata la diretta e meritata conseguenza.",
    "Pietro Andrigo per Milannews.it",
    current_date(),
    current_time()
);



CREATE TABLE squadra (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    nome_completo VARCHAR(255) NOT NULL,
    nome_abbreviato VARCHAR(255) NOT NULL,
    logo VARCHAR(255)
);

INSERT INTO squadra (nome_completo,nome_abbreviato,logo) VALUES ("Atalanta","ATA","https://a.espncdn.com/i/teamlogos/soccer/500/105.png");
INSERT INTO squadra (nome_completo,nome_abbreviato,logo) VALUES ("Bologna","BOL",'https://a.espncdn.com/i/teamlogos/soccer/500/107.png');
INSERT INTO squadra (nome_completo,nome_abbreviato,logo) VALUES ("Cagliari","CAG",'https://a.espncdn.com/i/teamlogos/soccer/500/2925.png');
INSERT INTO squadra (nome_completo,nome_abbreviato,logo) VALUES ("Empoli","EMP",'https://a.espncdn.com/i/teamlogos/soccer/500/2574.png');
INSERT INTO squadra (nome_completo,nome_abbreviato,logo) VALUES ("Fiorentina","FIO",'https://a.espncdn.com/i/teamlogos/soccer/500/109.png');
INSERT INTO squadra (nome_completo,nome_abbreviato,logo) VALUES ("Genoa","GEN",'https://a.espncdn.com/i/teamlogos/soccer/500/3263.png');
INSERT INTO squadra (nome_completo,nome_abbreviato,logo) VALUES ("Inter","INT",'https://a.espncdn.com/i/teamlogos/soccer/500/110.png');
INSERT INTO squadra (nome_completo,nome_abbreviato,logo) VALUES ("Juventus","JUV",'https://a.espncdn.com/i/teamlogos/soccer/500/111.png');
INSERT INTO squadra (nome_completo,nome_abbreviato,logo) VALUES ("Lazio","LAZ",'https://a.espncdn.com/i/teamlogos/soccer/500/112.png');
INSERT INTO squadra (nome_completo,nome_abbreviato,logo) VALUES ("Milan","MIL",'https://a.espncdn.com/i/teamlogos/soccer/500/103.png');
INSERT INTO squadra (nome_completo,nome_abbreviato,logo) VALUES ("Napoli","NAP",'https://a.espncdn.com/i/teamlogos/soccer/500/114.png');
INSERT INTO squadra (nome_completo,nome_abbreviato,logo) VALUES ("Roma","ROM",'https://a.espncdn.com/i/teamlogos/soccer/500/104.png');
INSERT INTO squadra (nome_completo,nome_abbreviato,logo) VALUES ("Salernitana","SAL",'https://a.espncdn.com/i/teamlogos/soccer/500/3240.png');
INSERT INTO squadra (nome_completo,nome_abbreviato,logo) VALUES ("Sampdoria","SAM",'https://a.espncdn.com/i/teamlogos/soccer/500/2734.png');
INSERT INTO squadra (nome_completo,nome_abbreviato,logo) VALUES ("Sassuolo","SAS",'https://a.espncdn.com/i/teamlogos/soccer/500/3997.png');
INSERT INTO squadra (nome_completo,nome_abbreviato,logo) VALUES ("Spezia","SPE",'https://a.espncdn.com/i/teamlogos/soccer/500/4056.png');
INSERT INTO squadra (nome_completo,nome_abbreviato,logo) VALUES ("Torino","TOR",'https://a.espncdn.com/i/teamlogos/soccer/500/239.png');
INSERT INTO squadra (nome_completo,nome_abbreviato,logo) VALUES ("Udinese","UDI",'https://a.espncdn.com/i/teamlogos/soccer/500/118.png');
INSERT INTO squadra (nome_completo,nome_abbreviato,logo) VALUES ("Venezia","VEN",'https://a.espncdn.com/i/teamlogos/soccer/500/17530.png');
INSERT INTO squadra (nome_completo,nome_abbreviato,logo) VALUES ("Hellas Verona","VER",'https://a.espncdn.com/i/teamlogos/soccer/500/119.png');
INSERT INTO squadra (nome_completo,nome_abbreviato,logo) VALUES ("Liverpool","LIV",'https://a.espncdn.com/i/teamlogos/soccer/500/364.png');
INSERT INTO squadra (nome_completo,nome_abbreviato,logo) VALUES ("Atletico Madrid","ATL",'https://a.espncdn.com/i/teamlogos/soccer/500/1068.png');
INSERT INTO squadra (nome_completo,nome_abbreviato,logo) VALUES ("Porto","POR",'https://a.espncdn.com/i/teamlogos/soccer/500/437.png');

CREATE TABLE partite_Milan (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    competizione VARCHAR(255),
    giornata VARCHAR(255),
    data_partita DATE NOT NULL,
    orario TIME NOT NULL,
    stadio VARCHAR(255) NOT NULL,
    id_casa INTEGER NOT NULL,
    id_trasferta INTEGER NOT NULL,
    punteggio_casa INTEGER,
    punteggio_trasferta INTEGER,
    INDEX indx_c(id_casa),
    INDEX indx_t(id_trasferta),
    FOREIGN KEY (id_casa) REFERENCES squadra (id),
    FOREIGN KEY (id_trasferta) REFERENCES squadra (id)
) Engine = InnoDB;

INSERT INTO partite_Milan (competizione,giornata,data_partita,orario,stadio,id_casa,id_trasferta,punteggio_casa,punteggio_trasferta) VALUES ("Serie A","1° Giornata","2021-08-23","20:45:00","Stadio Luigi Ferraris",14,10,0,1);
INSERT INTO partite_Milan (competizione,giornata,data_partita,orario,stadio,id_casa,id_trasferta,punteggio_casa,punteggio_trasferta) VALUES ("Serie A","2° Giornata","2021-08-29","20:45:00","Stadio San Siro",10,3,4,1);
INSERT INTO partite_Milan (competizione,giornata,data_partita,orario,stadio,id_casa,id_trasferta,punteggio_casa,punteggio_trasferta) VALUES ("Serie A","3° Giornata","2021-09-12","18:00:00","Stadio San Siro",10,9,2,0);
INSERT INTO partite_Milan (competizione,giornata,data_partita,orario,stadio,id_casa,id_trasferta,punteggio_casa,punteggio_trasferta) VALUES ("Champions League","1° Giornata","2021-09-15","21:00:00","Anfield",21,10,3,2);
INSERT INTO partite_Milan (competizione,giornata,data_partita,orario,stadio,id_casa,id_trasferta,punteggio_casa,punteggio_trasferta) VALUES ("Serie A","4° Giornata","2021-09-19","20:45:00","Allianz Stadium",8,10,1,1);
INSERT INTO partite_Milan (competizione,giornata,data_partita,orario,stadio,id_casa,id_trasferta,punteggio_casa,punteggio_trasferta) VALUES ("Serie A","5° Giornata","2021-09-21","20:45:00","Stadio San Siro",10,19,2,0);
INSERT INTO partite_Milan (competizione,giornata,data_partita,orario,stadio,id_casa,id_trasferta,punteggio_casa,punteggio_trasferta) VALUES ("Serie A","6° Giornata","2021-09-25","15:00:00","Stadio Alberto Picco",16,10,1,2);
INSERT INTO partite_Milan (competizione,giornata,data_partita,orario,stadio,id_casa,id_trasferta,punteggio_casa,punteggio_trasferta) VALUES ("Champions League","2° Giornata","2021-09-28","21:00:00","Stadio San Siro",10,22,1,2);
INSERT INTO partite_Milan (competizione,giornata,data_partita,orario,stadio,id_casa,id_trasferta,punteggio_casa,punteggio_trasferta) VALUES ("Serie A","7° Giornata","2021-10-03","20:45:00","Gewiss Stadium",1,10,2,3);
INSERT INTO partite_Milan (competizione,giornata,data_partita,orario,stadio,id_casa,id_trasferta,punteggio_casa,punteggio_trasferta) VALUES ("Serie A","8° Giornata","2021-10-16","20:45:00","Stadio San Siro",10,20,3,2);
INSERT INTO partite_Milan (competizione,giornata,data_partita,orario,stadio,id_casa,id_trasferta,punteggio_casa,punteggio_trasferta) VALUES ("Champions League","3° Giornata","2021-10-19","21:00:00","Estádio do Dragão",23,10,1,0);
INSERT INTO partite_Milan (competizione,giornata,data_partita,orario,stadio,id_casa,id_trasferta,punteggio_casa,punteggio_trasferta) VALUES ("Serie A","9° Giornata","2021-10-23","20:45:00","Stadio Renato Dall'Ara",2,10,2,4);
INSERT INTO partite_Milan (competizione,giornata,data_partita,orario,stadio,id_casa,id_trasferta,punteggio_casa,punteggio_trasferta) VALUES ("Serie A","10° Giornata","2021-10-26","20:45:00","Stadio San Siro",10,17,1,0);
INSERT INTO partite_Milan (competizione,giornata,data_partita,orario,stadio,id_casa,id_trasferta,punteggio_casa,punteggio_trasferta) VALUES ("Serie A","11° Giornata","2021-10-31","20:45:00","Stadio Olimpico",12,10,1,2);
INSERT INTO partite_Milan (competizione,giornata,data_partita,orario,stadio,id_casa,id_trasferta,punteggio_casa,punteggio_trasferta) VALUES ("Champions League","4° Giornata","2021-11-03","18:45:00","Stadio San Siro",10,23,1,1);
INSERT INTO partite_Milan (competizione,giornata,data_partita,orario,stadio,id_casa,id_trasferta,punteggio_casa,punteggio_trasferta) VALUES ("Serie A","12° Giornata","2021-11-07","20:45:00","Stadio San Siro",10,7,1,1);
INSERT INTO partite_Milan (competizione,giornata,data_partita,orario,stadio,id_casa,id_trasferta,punteggio_casa,punteggio_trasferta) VALUES ("Serie A","13° Giornata","2021-11-20","20:45:00","Stadio Artemio Franchi",5,10,4,3);
INSERT INTO partite_Milan (competizione,giornata,data_partita,orario,stadio,id_casa,id_trasferta,punteggio_casa,punteggio_trasferta) VALUES ("Champions League","5° Giornata","2021-11-24","21:00:00","Wanda Metropolitano",22,10,0,1);
INSERT INTO partite_Milan (competizione,giornata,data_partita,orario,stadio,id_casa,id_trasferta,punteggio_casa,punteggio_trasferta) VALUES ("Serie A","14° Giornata","2021-11-28","15:00:00","Stadio San Siro",10,15,1,3);
INSERT INTO partite_Milan (competizione,giornata,data_partita,orario,stadio,id_casa,id_trasferta,punteggio_casa,punteggio_trasferta) VALUES ("Serie A","15° Giornata","2021-12-01","20:45:00","Stadio Luigi Ferraris",6,10,0,3);
INSERT INTO partite_Milan (competizione,giornata,data_partita,orario,stadio,id_casa,id_trasferta,punteggio_casa,punteggio_trasferta) VALUES ("Serie A","16° Giornata","2021-12-04","15:00:00","Stadio San Siro",10,13,2,0);
INSERT INTO partite_Milan (competizione,giornata,data_partita,orario,stadio,id_casa,id_trasferta,punteggio_casa,punteggio_trasferta) VALUES ("Champions League","6° Giornata","2021-12-07","21:00:00","Stadio San Siro",10,21,1,2);
INSERT INTO partite_Milan (competizione,giornata,data_partita,orario,stadio,id_casa,id_trasferta,punteggio_casa,punteggio_trasferta) VALUES ("Serie A","17° Giornata","2021-12-11","20:45:00","Dacia Arena",18,10,1,1);
INSERT INTO partite_Milan (competizione,giornata,data_partita,orario,stadio,id_casa,id_trasferta,punteggio_casa,punteggio_trasferta) VALUES ("Serie A","18° Giornata","2021-12-19","20:45:00","Stadio San Siro",10,11,0,1);
INSERT INTO partite_Milan (competizione,giornata,data_partita,orario,stadio,id_casa,id_trasferta,punteggio_casa,punteggio_trasferta) VALUES ("Serie A","19° Giornata","2021-12-22","20:45:00","Stadio Carlo Castellani",4,10,2,4);
INSERT INTO partite_Milan (competizione,giornata,data_partita,orario,stadio,id_casa,id_trasferta,punteggio_casa,punteggio_trasferta) VALUES ("Serie A","20° Giornata","2022-01-06","18:30:00","Stadio San Siro",10,12,3,1);
INSERT INTO partite_Milan (competizione,giornata,data_partita,orario,stadio,id_casa,id_trasferta,punteggio_casa,punteggio_trasferta) VALUES ("Serie A","21° Giornata","2022-01-09","12:30:00","Stadio Pier Luigi Penzo",19,10,0,3);
INSERT INTO partite_Milan (competizione,giornata,data_partita,orario,stadio,id_casa,id_trasferta,punteggio_casa,punteggio_trasferta) VALUES ("Coppa Italia","Ottavi di finale","2022-01-13","21:00:00","Stadio San Siro",10,6,3,1);
INSERT INTO partite_Milan (competizione,giornata,data_partita,orario,stadio,id_casa,id_trasferta,punteggio_casa,punteggio_trasferta) VALUES ("Serie A","22° Giornata","2022-01-17","18:30:00","Stadio San Siro",10,16,1,2);
INSERT INTO partite_Milan (competizione,giornata,data_partita,orario,stadio,id_casa,id_trasferta,punteggio_casa,punteggio_trasferta) VALUES ("Serie A","23° Giornata","2022-01-23","20:45:00","Stadio San Siro",10,8,0,0);
INSERT INTO partite_Milan (competizione,giornata,data_partita,orario,stadio,id_casa,id_trasferta,punteggio_casa,punteggio_trasferta) VALUES ("Serie A","24° Giornata","2022-02-05","18:00:00","Stadio Giuseppe Meazza",7,10,1,2);
INSERT INTO partite_Milan (competizione,giornata,data_partita,orario,stadio,id_casa,id_trasferta,punteggio_casa,punteggio_trasferta) VALUES ("Coppa Italia","Quarti di finale","2022-02-09","21:00:00","Stadio San Siro",10,9,4,0);
INSERT INTO partite_Milan (competizione,giornata,data_partita,orario,stadio,id_casa,id_trasferta,punteggio_casa,punteggio_trasferta) VALUES ("Serie A","25° Giornata","2022-02-13","12:30:00","Stadio San Siro",10,14,1,0);
INSERT INTO partite_Milan (competizione,giornata,data_partita,orario,stadio,id_casa,id_trasferta,punteggio_casa,punteggio_trasferta) VALUES ("Serie A","26° Giornata","2022-02-19","20:45:00","Stadio Arechi",13,10,2,2);
INSERT INTO partite_Milan (competizione,giornata,data_partita,orario,stadio,id_casa,id_trasferta,punteggio_casa,punteggio_trasferta) VALUES ("Serie A","27° Giornata","2022-02-25","18:50:00","Stadio San Siro",10,18,1,1);
INSERT INTO partite_Milan (competizione,giornata,data_partita,orario,stadio,id_casa,id_trasferta,punteggio_casa,punteggio_trasferta) VALUES ("Coppa Italia","Semifinale Andata","2022-03-01","21:00:00","Stadio San Siro",10,7,0,0);
INSERT INTO partite_Milan (competizione,giornata,data_partita,orario,stadio,id_casa,id_trasferta,punteggio_casa,punteggio_trasferta) VALUES ("Serie A","28° Giornata","2022-03-06","20:45:00","Stadio Diego Armando Maradona",11,10,0,1);
INSERT INTO partite_Milan (competizione,giornata,data_partita,orario,stadio,id_casa,id_trasferta,punteggio_casa,punteggio_trasferta) VALUES ("Serie A","29° Giornata","2022-03-12","20:45:00","Stadio San Siro",10,4,1,0);
INSERT INTO partite_Milan (competizione,giornata,data_partita,orario,stadio,id_casa,id_trasferta,punteggio_casa,punteggio_trasferta) VALUES ("Serie A","30° Giornata","2022-03-19","20:45:00","Unipol Domus",3,10,0,1);
INSERT INTO partite_Milan (competizione,giornata,data_partita,orario,stadio,id_casa,id_trasferta,punteggio_casa,punteggio_trasferta) VALUES ("Serie A","31° Giornata","2022-04-04","20:45:00","Stadio San Siro",10,2,0,0);
INSERT INTO partite_Milan (competizione,giornata,data_partita,orario,stadio,id_casa,id_trasferta,punteggio_casa,punteggio_trasferta) VALUES ("Serie A","32° Giornata","2022-04-10","20:45:00","Stadio Olimpico Grande Torino",17,10,0,0);
INSERT INTO partite_Milan (competizione,giornata,data_partita,orario,stadio,id_casa,id_trasferta,punteggio_casa,punteggio_trasferta) VALUES ("Serie A","33° Giornata","2022-04-15","21:00:00","Stadio San Siro",10,6,2,0);
INSERT INTO partite_Milan (competizione,giornata,data_partita,orario,stadio,id_casa,id_trasferta,punteggio_casa,punteggio_trasferta) VALUES ("Coppa Italia","Semifinale Ritorno","2022-04-19","21:00:00","Stadio Giuseppe Meazza",7,10,3,0);
INSERT INTO partite_Milan (competizione,giornata,data_partita,orario,stadio,id_casa,id_trasferta,punteggio_casa,punteggio_trasferta) VALUES ("Serie A","34° Giornata","2022-04-24","20:45:00","Stadio Olimpico",9,10,1,2);
INSERT INTO partite_Milan (competizione,giornata,data_partita,orario,stadio,id_casa,id_trasferta,punteggio_casa,punteggio_trasferta) VALUES ("Serie A","35° Giornata","2022-05-01","15:00:00","Stadio San Siro",10,5,1,0);
INSERT INTO partite_Milan (competizione,giornata,data_partita,orario,stadio,id_casa,id_trasferta,punteggio_casa,punteggio_trasferta) VALUES ("Serie A","36° Giornata","2022-05-08","20:45:00","Stadio Marcantonio Bentegodi",20,10,1,3);
INSERT INTO partite_Milan (competizione,giornata,data_partita,orario,stadio,id_casa,id_trasferta,punteggio_casa,punteggio_trasferta) VALUES ("Serie A","37° Giornata","2022-05-15","18:00:00","Stadio San Siro",10,1,2,0);
INSERT INTO partite_Milan (competizione,giornata,data_partita,orario,stadio,id_casa,id_trasferta,punteggio_casa,punteggio_trasferta) VALUES ("Serie A","38° Giornata","2022-05-22","18:00:00","Mapei Stadium",15,10,0,3);


CREATE TABLE users (
   id INTEGER AUTO_INCREMENT PRIMARY KEY,
   name VARCHAR(255) NOT NULL,
   surname VARCHAR(255) NOT NULL,
   email VARCHAR(255) NOT NULL UNIQUE,
   username VARCHAR(255) NOT NULL UNIQUE,
   password VARCHAR(255) NOT NULL
) Engine = InnoDB;

CREATE TABLE cookies (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    hash VARCHAR(255) NOT NULL,
    id_user INTEGER NOT NULL,
    time BIGINT NOT NULL,  /*deve contenere un intervallo di tempo espresso in secondi, quindi sono richiesti 8 byte*/
    INDEX ind_user (id_user),
    FOREIGN KEY(id_user) REFERENCES users(id) ON UPDATE CASCADE ON DELETE CASCADE
) Engine = InnoDB;

CREATE TABLE posts (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    id_user INTEGER NOT NULL,
    time TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    nlikes INTEGER,
    ncomments INTEGER,
    content VARCHAR(3000), 
    FOREIGN KEY (id_user) REFERENCES users (id) ON UPDATE CASCADE ON DELETE CASCADE
) Engine = InnoDB;

CREATE TABLE likes (
    userid INTEGER NOT NULL,
    postid INTEGER NOT NULL,
    INDEX indx_user(userid),
    index indx_post(postid),
    FOREIGN KEY(userid) REFERENCES users(id) ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY(postid) REFERENCES posts(id) ON UPDATE CASCADE ON DELETE CASCADE,
    PRIMARY KEY(userid, postid)
) Engine = InnoDB;

DELIMITER //
CREATE TRIGGER likes_trigger
AFTER INSERT ON likes
FOR EACH ROW
BEGIN
UPDATE posts 
SET nlikes = nlikes + 1
WHERE id = new.postid;
END //
DELIMITER ;   

DELIMITER //
CREATE TRIGGER unlikes_trigger
AFTER DELETE ON likes
FOR EACH ROW
BEGIN
UPDATE posts 
SET nlikes = nlikes - 1
WHERE id = old.post;
END //
DELIMITER ; 

CREATE TABLE comments (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    userid INTEGER NOT NULL,
    postid INTEGER NOT NULL,
    time TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    text VARCHAR(1000),
    INDEX indx_user(userid),
    INDEX indx_post(postid),
    FOREIGN KEY(userid) REFERENCES users(id) ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY(postid) REFERENCES posts(id) ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE = InnoDB;

DELIMITER //
CREATE TRIGGER comments_trigger
AFTER INSERT ON comments
FOR EACH ROW
BEGIN
UPDATE posts 
SET ncomments = ncomments + 1
WHERE id = new.postid; 
END //
DELIMITER ;

DELIMITER //
CREATE TRIGGER delete_comments_trigger
AFTER DELETE ON comments
FOR EACH ROW
BEGIN
UPDATE posts 
SET ncomments = ncomments - 1
WHERE id = old.postid;
END //
DELIMITER ;

