// Menu burger responsive

const spanBurger1 = document.querySelector(".spanBurger1");
const spanBurger2 = document.querySelector(".spanBurger2");
const spanBurger3 = document.querySelector(".spanBurger3");
const hamburger = document.querySelector(".hamburger");
const voletMenu = document.querySelector(".voletMenu");
const overlay = document.querySelector(".overlay");

let menuOpen = 0;

function closeMenu() {
  menuOpen = 0;
  spanBurger1.classList.remove("spanBurger1Open");
  spanBurger2.classList.remove("spanBurger2Open");
  spanBurger3.classList.remove("spanBurger3Open");
  voletMenu.classList.remove("voletMenuOpen");
  voletMenu.classList.add("dnone");
  overlay.classList.add("dnone");
}

if(hamburger){
hamburger.addEventListener("click", () => {
  if (menuOpen === 0) {
    menuOpen = 1;
    spanBurger1.classList.add("spanBurger1Open");
    spanBurger2.classList.add("spanBurger2Open");
    spanBurger3.classList.add("spanBurger3Open");
    voletMenu.classList.add("voletMenuOpen");
    voletMenu.classList.remove("dnone");
    overlay.classList.remove("dnone");
  } else {
    closeMenu();
  }
  console.log(menuOpen);
});}
if (overlay) {
  overlay.addEventListener("click", () => {
    closeMenu();
  });
}

// Récupérer le lien actif en utilisant l'URL de la page
const url = window.location.href;
const lienActif = document.querySelector('.navigation a[href="' + url + '"]');

// Ajouter la classe "active" au lien actif
if (lienActif) {
  lienActif.classList.add("lienActif");
}
