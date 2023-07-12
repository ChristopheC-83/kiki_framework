// affichage des mots de passe

const mdpMasque = document.querySelector(".fa-eye-slash")
const mdpVisible = document.querySelector(".fa-eye")
const password = document.querySelector("#password")
const passwordCreerCompte = document.querySelector(".passwordCreerCompte")



mdpMasque.addEventListener("click", ()=>{
    mdpMasque.classList.add("dnone")
    mdpVisible.classList.remove("dnone")
    password.type="text"

})
mdpVisible.addEventListener("click", ()=>{
    mdpMasque.classList.remove("dnone")
    mdpVisible.classList.add("dnone")
    password.type="password"

})