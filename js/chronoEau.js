// variable globale qui contient notre chronomètre actuellement en cours
let chrono = null;

/**********************************************
 * Bloc qui représente le chronomètre de l'eau
 *********************************************/



$(".water_timer").click(function() {
    // On ajoute le title à notre modal avant tout
    $("#modal-label").html("Timer changement eau");



    // date d'écheance récupérer sur l'attribut data-timer
    let echeance = $(this).data("timer");

    // timestamp en millisecondes de la date d'écheance
    let date_echeance = new Date(echeance).getTime();

    // on arrête l'ancien chronomètre, puis on en lance un nouveau
    clearInterval(chrono);
    clearInterval(chronoF);



    chrono = setInterval(function() {
        // timestamp en millisecondes de maintenant
        let today = new Date().getTime();

        //on définit l'écart de temps entre la date d'échéance et aujourd'hui
        let difference = date_echeance - today;

        //on définit le nombre de jours après la date d'échéance

        let depJour = Math.abs(Math.floor(difference / (1000 * 60 * 60 * 24)))

        // timestamps en millisecondes pour 1 jour, heure, minute et seconde
        let ts_jour = 1000 * 60 * 60 * 24;
        let ts_heure = 1000 * 60 * 60;
        let ts_minute = 1000 * 60;
        let ts_seconde = 1000;

        // calcul des jours, heures, minutes et secondes
        var jour = Math.floor(difference / ts_jour);
        let heures = Math.floor((difference % ts_jour) / ts_heure);
        let minutes = Math.floor((difference % ts_heure) / ts_minute);
        let secondes = Math.floor((difference % ts_minute) / ts_seconde);


        // on injecte le chrono dans le corps du modal
        $(".modal-body").html(`Echéance dans => ${jour} jours :  ${heures} heures :  ${minutes} minutes :  ${secondes} secondes`).css('color', 'green');
        //changement couleur texte suivant nombre de jours restants
        if (jour < 3) {
            $(".modal-body").css('color', 'red');

        }
        if (jour > 2 && jour <= 5) {
            $(".modal-body").css('color', 'orange');
        }
        // si le chrono est expiré, on affiche, un message
        if (difference < 0) {
            clearInterval(chrono);
            $(".modal-body").html(`Expiré depuis ${depJour} jour(s) !`);
        }
    }, 200); // moins d'une seconde pour éviter le delai lorsqu'on clique sur un nouveau lien

})