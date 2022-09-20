// variable globale qui contient notre chronomètre actuellement en cours
let chronoF = null;

/**********************************************
 * Bloc qui représente le chronomètre du filtre
 *********************************************/



$(".filter_timer").click(function() {
    // On ajoute le title à notre modal avant tout
    $("#modal-label").html("Timer changement filtre");


    // date d'écheance récupérer sur l'attribut data-timer
    let echeanceF = $(this).data("timer");

    // timestamp en millisecondes de la date d'écheance
    let date_echeanceF = new Date(echeanceF).getTime();

    // on arrête l'ancien chronomètre, puis on en lance un nouveau
    clearInterval(chrono);
    clearInterval(chronoF);



    chronoF = setInterval(function() {
        // timestamp en millisecondes de maintenant
        let todayF = new Date().getTime();

        //on définit l'écart de temps entre la date d'échéance et aujourd'hui
        let differenceF = date_echeanceF - todayF;

        //on définit le nombre de jours après la date d'échéance

        let depJourF = Math.abs(Math.floor(differenceF / (1000 * 60 * 60 * 24)))

        // timestamps en millisecondes pour 1 jour, heure, minute et seconde
        let ts_jourF = 1000 * 60 * 60 * 24;
        let ts_heureF = 1000 * 60 * 60;
        let ts_minuteF = 1000 * 60;
        let ts_secondeF = 1000;

        // calcul des jours, heures, minutes et secondes
        let jourF = Math.floor(differenceF / ts_jourF);
        let heuresF = Math.floor((differenceF % ts_jourF) / ts_heureF);
        let minutesF = Math.floor((differenceF % ts_heureF) / ts_minuteF);
        let secondesF = Math.floor((differenceF % ts_minuteF) / ts_secondeF);



        // on injecte le chrono dans le corps du modal
        $(".modal-body").html(`Echéance dans => ${jourF} jours :  ${heuresF} heures :  ${minutesF} minutes :  ${secondesF} secondes`).css('color', 'green');;
        //changement couleur texte suivant nombre de jours restants
        if (jourF < 10) {
            $(".modal-body").css('color', 'red');

        }
        if (jourF > 10 && jourF <= 15) {
            $(".modal-body").css('color', 'orange');
        }

        // si le chrono est expiré, on affiche un message
        if (differenceF < 0) {
            clearInterval(chronoF);
            $(".modal-body").html(`Expiré depuis ${depJourF} jour(s) !`);
        }
    }, 200); // moins d'une seconde pour éviter le delai lorsqu'on clique sur un nouveau lien

})