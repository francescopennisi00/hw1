function onUnlikeJson(json) {

    //stampo in console il json ricevuto (numero like aggiornato del post)
    console.log(json);

    const nlikes = json[0].nlikes;  
    const postid =json[0].id;
    const listaPost = document.querySelectorAll(".post");
    for (post of listaPost) {
        const id = post.dataset.idPost;
        //la seguente condizione sarà verificata per il solo post a cui si è messo like (essendo l'id del post primary key)
        if (id === postid) {
            const parentNodeEm = post.querySelector(".spanlike");
            const em = parentNodeEm.querySelector("em");
            em.textContent = nlikes;
            //qui aggiungo l'event listener dell'unlike al click sul cuore nero
            const img_cuore = parentNodeEm.querySelector("img");
            img_cuore.addEventListener("click",likePost);
            img_cuore.removeEventListener("click",unlikePost);
        } 
    }
    
}       

function unlikePost(event) {

    //coloro il cuore (tasto like del post) di nero
    const img = event.currentTarget;
    img.src="images/like.png";

    const formdata = new FormData();
    formdata.append("postid",img.parentNode.parentNode.parentNode.dataset.idPost);
    fetch("unlike_post.php",{method:"post",body:formdata}).then(onResponse).then(onUnlikeJson);
}


function onLikeJson(json) {

    //stampo in console il json ricevuto (numero like aggiornato del post)
    console.log(json);

    const nlikes = json[0].nlikes;  
    const postid =json[0].id;
    const listaPost = document.querySelectorAll(".post");
    for (post of listaPost) {
        const id = post.dataset.idPost;
        //la seguente condizione sarà verificata per il solo post a cui si è messo like (essendo l'id del post primary key)
        if (id === postid) {
            const parentNodeEm = post.querySelector(".spanlike");
            const em = parentNodeEm.querySelector("em");
            em.textContent = nlikes;
            //qui dovrei aggiungere l'event listener dell'unlike al click sul cuore rosso
            const img_cuore = parentNodeEm.querySelector("img");
            img_cuore.addEventListener("click",unlikePost);
            img_cuore.removeEventListener("click",likePost);
        }
    }

}


function likePost(event) {

    //coloro il cuore (tasto like del post) di rosso
    const img = event.currentTarget;
    img.src="images/likered.png";

    const formdata = new FormData();
    formdata.append("postid",img.parentNode.parentNode.parentNode.dataset.idPost);
    fetch("like_post.php",{method:"post",body:formdata}).then(onResponse).then(onLikeJson);
}


function chiudiBarraCommenti(event) {
    //CHIUDO LA BARRA DEI COMMENTI E LA CANCELLO IN MODO CHE AL SUCCESSIVO CLICK QUESTA VENGA RIGENERATA
    const variable = event.currentTarget;
    const elenco_commenti = variable.parentNode;  
    elenco_commenti.innerHTML = "";
    elenco_commenti.classList.add("hidden"); //nascondo nuovamente l'elenco

    //consento di far ricomparire l'elenco degli utenti cliccando nuovamente sul numero di like
    const post = elenco_commenti.parentNode;
    const parentEm_nlikes = post.querySelector(".spanlike");
    const em_nlikes = parentEm_nlikes.querySelector("em");
    em_nlikes.addEventListener("click",likesView); 

    //consento di aprire i commenti al click sull'icona dei commenti
    const spancomments = post.querySelector(".spancomments");
    const icona_commento = spancomments.querySelector("img");
    icona_commento.addEventListener("click",mostraCommenti);

}


function onEliminaCommentoJson(json) {

    //stampo il json ricevuto
    console.log(json);

    //AGGIORNA IL NUMERO DI COMMENTI ACCANTO ALL'ICONA E VISUALIZZO I COMMENTI (DOPO AVER ELIMINATO IL COMMENTO SELEZIONATO)

    //recupero i dati del json
    const  idpost = json[0].id;
    const ncomments = json[0].ncomments;

    const listaPost = document.querySelectorAll(".post");
    for (post of listaPost) {
        //la condizione seguente sarà verificata una sola volta poichè l'id del post è una chiave primaria
        if (post.dataset.idPost === idpost) {
            const spancomments = post.querySelector(".spancomments");
            const em_ncomments = spancomments.querySelector("em");
            em_ncomments.textContent = ncomments;

            //svuoto la barra dei commenti
            const elenco_commenti = post.querySelector(".elenco_commenti");
            elenco_commenti.innerHTML = "";

            //chiamo la fetch per la visualizzazione dei commenti
            const formdata = new FormData();
            formdata.append("postid",idpost);
            fetch("show_comments.php",{method: "post",body: formdata}).then(onResponse).then(onCommentsJson);
        }
    }

}


function eliminaCommento(event) {

    const a_elimina = event.currentTarget;
    const divCommento = a_elimina.parentNode;

    const idpost = divCommento.dataset.postId;
    const idcommento = divCommento.dataset.commentId;

    const formdata = new FormData();
    formdata.append("postid",idpost);
    formdata.append("commentid",idcommento);
    fetch("elimina_commento.php",{method: "post",body: formdata}).then(onResponse).then(onEliminaCommentoJson);

}


function onCommentsJson(json) {

    //stampo il json ricevuto
    console.log(json);

    const postid = json[0].id_post;
    const listapost = document.querySelectorAll(".post");
    for (post of listapost) {

        //la condizione che segue sarà verificata solo una volta essendo l'id del primary key della tabella posts
        if(post.dataset.idPost === postid) {

            const elenco_commenti = post.querySelector(".elenco_commenti");
            elenco_commenti.classList.remove("hidden");   //permetto la visualizzazione dell'elenco degli utenti che hanno messo like

            const header_chiudi = document.createElement("header");
            header_chiudi.classList.add("header_chiudi_commenti");
            header_chiudi.textContent = "Chiudi";
            //event listener per la chiusura dell'elenco like
            header_chiudi.addEventListener("click",chiudiBarraCommenti);
            elenco_commenti.appendChild(header_chiudi);
                    
            const header = document.createElement("header");
            header.classList.add("header_commenti");
            header.textContent = "Commenti";
            elenco_commenti.appendChild(header);

            //itero nel json
            for (commento of json) {

                //conservo i dati prelevati dal server in delle variabili
                const id_commento = commento.id_comm;
                const id_post = commento.id_post;
                const id_user = commento.id_user;
                const username = commento.username;
                const time = commento.time;
                const testo = commento.testo;
                const elimina = commento.elimina;  //booleno che se true indica che il commento è stato scritto dall'utente loggato
            
                //visualizzo il commento
            
                const divCommento = document.createElement("div");

                //servono per la cancellazione del commento
                divCommento.dataset.commentId = id_commento; 
                divCommento.dataset.postId = id_post;

                divCommento.classList.add("div_commento");
            
            
                //controllo che lo username non sia undefined (lo è quando non ci sono commenti)
                if (username !== undefined) {

                    const divUserTime = document.createElement("div");
                    divUserTime.classList.add("barra_user_time_comment");

                    const aUserName = document.createElement("a");
                    aUserName.dataset.idUser = id_user;
                    aUserName.classList.add("underline");
                    aUserName.textContent = "@"+username;
                    //event listener per generare al click sullo username la pagina del profilo dell'utente
                    aUserName.addEventListener("click",userPage); 
                    divUserTime.appendChild(aUserName);

                    const aTime = document.createElement("a");
                    aTime.textContent = time;
                    divUserTime.appendChild(aTime);
    
                    divCommento.appendChild(divUserTime);
                }
            
            
                const pText = document.createElement("p");
                pText.classList.add("p_comment");
                pText.textContent = testo;
                divCommento.appendChild(pText);
            
                //inserisco l'opzione di eliminazione del commento solo se è satato scritto dall'utente loggato
                if (elimina === true) {
                    const a = document.createElement("a");
                    a.classList.add("elimina_com");
                    a.textContent = "Elimina commento";
                    a.addEventListener("click",eliminaCommento); //associo un event listener al click sull'etichetta "Elimina commento" per eliminare il commento selezionato
                    divCommento.appendChild(a);
                    }

                elenco_commenti.appendChild(divCommento);
                            
            }
            
            

            const form_container = document.createElement("div");
            form_container.classList.add("comment_form_container");

            const form = document.createElement("form");
            form.method = "post";

            const textarea = document.createElement("textarea");

            textarea.name = "area_commento";
            textarea.placeholder = "Inserisci un commento...";

            form.appendChild(textarea);

            const button = document.createElement("input");
            button.type = "submit";
            button.name = "pubblica_commento";
            button.value = "Pubblica";
            form.appendChild(button);

            //aggiungo un event listener per l'invio del form
            form.addEventListener("submit",pubblicaCommento);

            form_container.appendChild(form);

            elenco_commenti.appendChild(form_container);

            //impedisco di far ricomparire l'elenco degli utenti cliccando nuovamente sul numero di like 
            const spanlike = post.querySelector(".spanlike");
            const em_n_likes = spanlike.querySelector("em");
            em_n_likes.removeEventListener("click",likesView);
            //impedisco anche la visualizzazione dei commenti
            const spancomments = post.querySelector(".spancomments");
            icona_commento = spancomments.querySelector("img");
            icona_commento.removeEventListener("click",mostraCommenti);
        }

    }
}
  

function mostraCommenti(event) {
    //ricavo l'id del post si cui si vogliono visualizzare i commenti per passarlo al server con post tramite fetch
    const icona_commento = event.currentTarget;
    const post = icona_commento.parentNode.parentNode.parentNode;
    const idpost = post.dataset.idPost;
    const formdata = new FormData();
    formdata.append("postid",idpost);
    fetch("show_comments.php",{method: "post",body: formdata}).then(onResponse).then(onCommentsJson);
}


function userPage(event) {

    //CREO UN FORM INVISIBILE AL CUI INTERNO INSERISCO L'ID DELL'UTENTE PER PASSARLA AL SERVER TRAMITE POST (CON INPUT TYPE HIDDEN)
    //IN MODO DA POTER GENERARE LA PAGINA WEB DINAMICA PER IL PROFILO DELL'UTENTE

    const aUsername = event.currentTarget;

    const Vform = document.createElement("form");
    Vform.classList.add("hidden");
    Vform.action = "user_page.php";
    Vform.method = 'post';

    const input_id = document.createElement("input");
    input_id.type = 'hidden';
    input_id.name = 'id_user';

    input_id.value = aUsername.dataset.idUser; 

    Vform.appendChild(input_id);

    const sezione_post = document.querySelector("#main");
    sezione_post.appendChild(Vform);

    Vform.submit();  //attivo il submit per passare alla pagina web del profilo dell'utente

}


function onVerLikeJson(json) {

    //stampo il json ricevuto
    console.log(json);

    const postid = json.id_post;
    const bool = json.like; //se true l'utente loggato ha messo like al post, altrimenti è a false
    const listaPost = document.querySelectorAll(".post");

    if (bool === true) {
        for (post of listaPost) {
            if (post.dataset.idPost === postid) {
                //tale condizione sarà verificata per un solo post
                //aggiungo l'event listener per l'unlike
                const spanlike = post.querySelector(".spanlike");
                const imglike = spanlike.querySelector("img");
                imglike.src="images/likered.png";
                imglike.addEventListener("click",unlikePost);
                imglike.removeEventListener("click",likePost);
            }
        }
    }
    else {
        for (post of listaPost) {
            if (post.dataset.idPost === postid) {
                //tale condizione sarà verificata per un solo post
                //aggiungo l'event listener per l'unlike
                const spanlike = post.querySelector(".spanlike");
                const imglike = spanlike.querySelector("img");
                imglike.src="images/like.png";
                imglike.addEventListener("click",likePost);
                imglike.removeEventListener("click",unlikePost);
            }
        }
    }
}


function chiudiElencoLike(event) {
    //CHIUDO LA BARRA DEI LIKE E LA CANCELLO IN MODO CHE AL SUCCESSIVO CLICK QUESTA VENGA RIGENERATA
    const variable = event.currentTarget;
    const elenco_like = variable.parentNode;
    elenco_like.innerHTML = "";
    elenco_like.classList.add("hidden"); //nascondo nuovamente l'elenco
    //consento di far ricomparire l'elenco degli utenti cliccando nuovamente sul numero di like 
    const post = elenco_like.parentNode;
    const parentEm_nlikes = post.querySelector(".spanlike");
    const em_nlikes = parentEm_nlikes.querySelector("em");
    em_nlikes.addEventListener("click",likesView); 
    //consento di aprire i commenti al click sull'icona dei commenti
    const spancomments = post.querySelector(".spancomments");
    const icona_commento = spancomments.querySelector("img");
    icona_commento.addEventListener("click",mostraCommenti);

}


function onLikesViewJson(json) {

    //stampo in console il json ricevuto
    console.log(json);
    
    //tutti gli elementi dell'array json hanno come campo l'id del post (uguale), a patto che il json non sia vuoto
    if (json.length !== 0) {
        const postid = json[0].postid;  
        const listaPost = document.querySelectorAll(".post");
        for (post of listaPost) {
            //l'if seguente sarà verificato solo una volta poichè postid è primary key
            if (post.dataset.idPost === postid) {

                const elenco_like = post.querySelector(".elenco_like");
                elenco_like.classList.remove("hidden");   //permetto la visualizzazione dell'elenco degli utenti che hanno messo like

                const header_chiudi = document.createElement("header");
                header_chiudi.classList.add("header_chiudi_like");
                header_chiudi.textContent = "Chiudi";
                //event listener per la chiusura dell'elenco
                header_chiudi.addEventListener("click",chiudiElencoLike);
                elenco_like.appendChild(header_chiudi);
                    
                const header = document.createElement("header");
                header.classList.add("header_utenti_like");
                header.textContent = "Utenti a cui piace";
                elenco_like.appendChild(header);

                for(user of json) {

                    const postid = user.postid;
                    const username = user.username;
                    const userid = user.userid; 

                    const a_user_like = document.createElement("a");
                    a_user_like.dataset.idUser = userid;
                    a_user_like.classList.add("underline");
                    //event listener per generare al click sullo username la pagina del profilo dell'utente
                    a_user_like.addEventListener("click",userPage);
                    a_user_like.textContent = username;
                    elenco_like.appendChild(a_user_like);
            
                }

                //impedisco di far ricomparire l'elenco degli utenti cliccando nuovamente sul numero di like 
                const spanlike = post.querySelector(".spanlike");
                const em_n_likes = spanlike.querySelector("em");
                em_n_likes.removeEventListener("click",likesView);
                //impedisco anche la visualizzazione dei commenti
                const spancomments = post.querySelector(".spancomments");
                icona_commento = spancomments.querySelector("img");
                icona_commento.removeEventListener("click",mostraCommenti);
                
            }
        }
    }
    
}


function likesView(event) {

    const nlikes = event.currentTarget;
    const idpost = nlikes.parentNode.parentNode.parentNode.dataset.idPost;
    const formdata = new FormData();
    formdata.append("postid",idpost);
    fetch("show_likes.php",{method: "post",body: formdata}).then(onResponse).then(onLikesViewJson);
    
}


function onCreatedCommentJson(json) {

    //stampo il json ricevuto
    console.log(json);

    //AGGIORNA IL NUMERO DI COMMENTI ACCANTO ALL'ICONA E VISUALIZZO IL COMMENTO APPENA PUBBLICATO (INSIEME A TUTTI GLI ALTRI)

    //recupero i dati del json
    const  idpost = json[0].id;
    const ncomments = json[0].ncomments;

    const listaPost = document.querySelectorAll(".post");
    for (post of listaPost) {
        //la condizione seguente sarà verificata una sola volta poichè l'id del post è una chiave primaria
        if (post.dataset.idPost === idpost) {
            const spancomments = post.querySelector(".spancomments");
            const em_ncomments = spancomments.querySelector("em");
            em_ncomments.textContent = ncomments;

            //DEVO NASCONDERE LA BARRA DI INSETIMENTO DEL COMMENTO (CIOE' ELIMINARLA)    
            const barra_commenti = post.querySelector(".elenco_commenti");
            barra_commenti.innerHTML = "";


            //chiamo la fetch per la visualizzazione dei commenti
            const formdata = new FormData();
            formdata.append("postid",idpost);
            fetch("show_comments.php",{method: "post",body: formdata}).then(onResponse).then(onCommentsJson);
        }
    }
 
}


function pubblicaCommento(event) {

    const form = event.currentTarget;
    const textarea = form.querySelector("textarea");

    event.preventDefault(); //impedisco l'invio dei dati al server (in questo caso la ricarica della pagina) poichè voglio usare una fetch, in quanto asincrona 

    //compio le operazioni solo se è stato scritto qualcosa nell'area di testo 
    if (textarea.value.length !== 0) {
        const postid = form.parentNode.parentNode.parentNode.dataset.idPost;
        const contenuto = form.area_commento.value;
        const formdata = new FormData();
        formdata.append("postid",postid);
        formdata.append("contenuto",contenuto);
        fetch("create_comment.php",{method: "post",body: formdata}).then(onResponse).then(onCreatedCommentJson);
    }
}



function onPostsJson(json) {

    //stampo in console il json ricevuto
    console.log(json);

    if(json.length === 0) {
        const sezione_post = document.querySelector("#main");

        const div = document.createElement("div");
        div.textContent = "Nessun post da visualizzare";

        sezione_post.appendChild(div);

    }

    for(const post of json) {

        const idpost = post.id_post;
        const iduser = post.id_user;
        const username = post.username;
        const tempo = post.time;
        const contenuto = post.content;
        const nlikes = post.nlikes;
        const ncomments = post.ncomments;

        const sezione_post = document.querySelector("#main");
        
        const divPost = document.createElement("div");
        divPost.classList.add("post");
        divPost.dataset.idPost = idpost;

        const divUserTime = document.createElement("div");
        divUserTime.classList.add("barra_user_time");

        const aUserName = document.createElement("a");
        aUserName.dataset.idUser = iduser;
        aUserName.classList.add("underline");
        aUserName.textContent = "@"+username;
        //event listener per generare al click sullo username la pagina del profilo dell'utente
        aUserName.addEventListener("click",userPage); 
        divUserTime.appendChild(aUserName);

        const aTime = document.createElement("a");
        aTime.textContent = tempo;
        divUserTime.appendChild(aTime);

        divPost.appendChild(divUserTime);

        const pText = document.createElement("p");
        pText.classList.add("p_post");
        pText.textContent = contenuto;
        divPost.appendChild(pText);

        const divLikCom = document.createElement("div");
        divLikCom.classList.add("barra_like_comments");

        const spanLikesComments = document.createElement("span");
        spanLikesComments.classList.add("likecomments");

        const spanLikes = document.createElement("span");
        spanLikes.classList.add("spanlike");

        const imgLike = document.createElement("img");
        imgLike.src = "images/like.png";  //potrebbe essere cambiata se l'utente loggato ha già messo like al post (vedere fetch più avanti)
        spanLikes.appendChild(imgLike);
        const numberLikes = document.createElement("em");
        numberLikes.textContent = nlikes;
        numberLikes.addEventListener("click",likesView);  //al click sul numero di like visualizza gli utenti che hanno messo like
        spanLikes.appendChild(numberLikes);

        spanLikesComments.appendChild(spanLikes);

        const spanComments = document.createElement("span");
        spanComments.classList.add("spancomments");

        const imgComments = document.createElement("img");
        imgComments.src = "images/comment.png";
        spanComments.appendChild(imgComments);
        //event listener per mostrare i commenti (e permettere all'utente loggato di commentare)
        imgComments.addEventListener("click",mostraCommenti);
        const numberComments = document.createElement("em");
        numberComments.textContent = ncomments;
        spanComments.appendChild(numberComments);

        spanLikesComments.appendChild(spanComments);

        divLikCom.appendChild(spanLikesComments);

        divPost.appendChild(spanLikesComments);

        const div_elenco_like = document.createElement("div");
        div_elenco_like.classList.add("elenco_like");
        div_elenco_like.classList.add("hidden");
        divPost.appendChild(div_elenco_like);
        
        const div_elenco_commenti = document.createElement("div");
        div_elenco_commenti.classList.add("elenco_commenti");
        div_elenco_commenti.classList.add("hidden");  
        divPost.appendChild(div_elenco_commenti);

        sezione_post.appendChild(divPost);

        //chiamo la fetch per vedere se l'utente ha già messo like al post
        const formdata = new FormData();
        formdata.append("postid", idpost);
        fetch("verifica_like.php",{method: "post",body: formdata}).then(onResponse).then(onVerLikeJson);

    }

}


function onResponse(response) {
    return response.json();
}



function aggiornaPost() {
    fetch("fetch_post.php").then(onResponse).then(onPostsJson);  
}

//CARICO INIZIALMENTE I 100 POST PIU' RECENTI
aggiornaPost();

//event listener per generare al click sullo username la pagina del profilo dell'utente
const listaUsername = document.querySelectorAll(".underline");
for (a of listaUsername) {
    a.addEventListener("click",userPage);   
}

//aggiungo event listener (funzione userPage) al button su cui è riportato lo username per generare la pagina del profilo dell'utente
const buttonUser = document.querySelector("#user_button");
buttonUser.addEventListener("click",userPage);