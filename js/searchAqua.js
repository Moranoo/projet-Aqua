//pour la barre de recherche dans la page cards.php

const searchBar = document.querySelector("#searchAqua");//séléction de la barre de recherche

searchBar.addEventListener("keyup", (e) => {//écoute de l'évènement "keyup" (lorsqu'on retire le doigt d'une touche appuyée )
    const searchedLetters = e.target.value;//on cible la valeur de l'évènement
    console.log(searchedLetters)
    const cards = document.querySelectorAll(".card");//on sélectionne toutes les cartes de la page
     filterElement(searchedLetters, cards);
});

function filterElement(letters, elements) {
  if(letters.length >0)
        for(let i = 0; i<elements.length; i++){
            if(elements[i].textContent.toLowerCase().includes(letters)) {  //La méthode includes() permet de déterminer si un tableau contient une valeur et renvoie true si c'est le cas, false sinon.
                elements[i].style.display = "block";
            }else{
                elements[i].style.display = "none";
            }
        }
    }      
