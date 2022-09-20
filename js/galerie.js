//pour commander la modale des photos de la galerie

let allGridItems = [...document.getElementsByClassName("grid-item")];/*un tableau qui utilise le "spread operator" on va prendre chaque item de la nodeList qu'on va mettre dans un tableau */
let popupBg = document.getElementById("popup-bg"); /*on récupère le popup background */
let popupImg = document.getElementById("popup-img");/*on récupère le popup image */


let widthScreen = document.documentElement.clientWidth || window.innerWidth ;
 if(widthScreen > 767) { //le script ne fonctionnera que à partir d'une largeur d'écran de 768 pixels


const openPopup = (e) => {
    let clickedImageSrc = e.target.src;
    popupBg.classList.add("active"); //c'est l'image clickée qui recevra la classe active
    popupImg.src = clickedImageSrc;
};

 const closePopup = () => {
    popupBg.classList.remove("active");
};


allGridItems.forEach((el) => el.addEventListener("click", openPopup));/*pour chacun des éléments on écoute l'évènement au click pour appeler la fonction "openpopup" */

popupImg.addEventListener("click", (e) => e.stopPropagation()); //en cas de second click on arrête les script
popupBg.addEventListener("click", closePopup); //puis on enlève la classe active à l'image qui se referme
}