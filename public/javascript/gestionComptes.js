// affichage des mots de passe

const mdpMasque = document.querySelector(".fa-eye-slash")
const mdpVisible = document.querySelector(".fa-eye")
const passwordCreerCompte = document.querySelector(".passwordCreerCompte")

mdpMasque.addEventListener("click", ()=>{
  mdpMasque.classList.add("dnone")
  mdpVisible.classList.remove("dnone")
  passwordCreerCompte.type="text"

})
mdpVisible.addEventListener("click", ()=>{
  mdpMasque.classList.remove("dnone")
  mdpVisible.classList.add("dnone")
  passwordCreerCompte.type="password"

})