//animation basiques titres de page
const titreH1 = document.querySelector(".animTitres h1")
const titreH2 = document.querySelector(".animTitres h2")

titreH1.addEventListener("click", ()=>
    gsap.from(titreH1, {rotate:360, duration : 0.5})
)
gsap.from(titreH1, {x:-100, duration :1.5, opacity:0})
gsap.from(titreH2, {y:20,duration :1, opacity:0, delay:0.75})




// Gestion alertes :
window.onload = function() {
    const alerte = document.querySelectorAll(".alert");
    const alerteArray = Array.from(alerte);
    gsap.to(alerteArray, { y: -30, duration: 2, autoAlpha: 0, delay: 3, stagger : 1});
  };