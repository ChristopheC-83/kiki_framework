// Menu burger responsive

const spanBurger1 = document.querySelector(".spanBurger1");
const spanBurger2 = document.querySelector(".spanBurger2");
const spanBurger3 = document.querySelector(".spanBurger3");
const hamburger = document.querySelector(".hamburger");
const voletMenu = document.querySelector(".voletMenu");

let menuOpen = 0;

hamburger.addEventListener("click", ()=>{
    if (menuOpen===0){
        menuOpen=1
        spanBurger1.classList.add("spanBurger1Open")
        spanBurger2.classList.add("spanBurger2Open")
        spanBurger3.classList.add("spanBurger3Open")
        voletMenu.classList.add("voletMenuOpen")
        voletMenu.classList.remove("dnone")
    } else {
        menuOpen = 0
        spanBurger1.classList.remove("spanBurger1Open")
        spanBurger2.classList.remove("spanBurger2Open")
        spanBurger3.classList.remove("spanBurger3Open")
        voletMenu.classList.remove("voletMenuOpen")
        voletMenu.classList.add("dnone")
    }
    console.log(menuOpen)
})


// Récupérer le lien actif en utilisant l'URL de la page
const url = window.location.href;
const lienActif = document.querySelector('.navigation a[href="' + url + '"]');

// Ajouter la classe "active" au lien actif
if (lienActif) {
  lienActif.classList.add('lienActif');
}