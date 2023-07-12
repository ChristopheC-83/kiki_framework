// appararition modif mail
const btnModifMail = document.getElementById("btn_modif_mail");
const divModifMail = document.getElementById("modif_mail");

btnModifMail.addEventListener("click", () => {
  if (divModifMail.classList.contains("dnone")) {
    divModifMail.classList.remove("dnone");
    divModifMdp.classList.add("dnone");
    divSuppressionCompte.classList.add("dnone");
  } else {
    divModifMail.classList.add("dnone");
  }
});

// appararition modif mdp
const btnModifMdp = document.getElementById("btn_modif_mdp");
const divModifMdp = document.getElementById("modif_mdp");

btnModifMdp.addEventListener("click", () => {
  if (divModifMdp.classList.contains("dnone")) {
    divModifMdp.classList.remove("dnone");
    divModifMail.classList.add("dnone");
    divSuppressionCompte.classList.add("dnone");
  } else {
    divModifMdp.classList.add("dnone");
  }
});

// appararition btn modif mdp
const newPassword = document.querySelector("#newPassword");
const verifNewPassword = document.querySelector("#verifNewPassword");
const btn_validation_modif_mdp = document.querySelector(
  "#btn_validation_modif_mdp"
);
const msg_psw_diff = document.querySelector("#msg_psw_diff");

newPassword.addEventListener("keyup", () => {
  verificationPassword();
});
verifNewPassword.addEventListener("keyup", () => {
  verificationPassword();
});

function verificationPassword() {
  if (newPassword.value === verifNewPassword.value) {
    btn_validation_modif_mdp.classList.remove("btn_disable");
    msg_psw_diff.classList.add("dnone");
  } else {
    btn_validation_modif_mdp.classList.add("btn_disable");
    if (newPassword.value !== "" && verifNewPassword.value !== "") {
      msg_psw_diff.classList.remove("dnone");
    } else {
      msg_psw_diff.classList.add("dnone");
    }
  }
}

// suppression compte
const btnSuppCompte = document.getElementById("btn_suppression_compte");
const divSuppressionCompte = document.getElementById("suppression_compte");

btnSuppCompte.addEventListener("click", () => {
  if (divSuppressionCompte.classList.contains("dnone")) {
    divSuppressionCompte.classList.remove("dnone");
    divModifMdp.classList.add("dnone");
    divModifMail.classList.add("dnone");
  } else {
    divSuppressionCompte.classList.add("dnone");
  }
});

// affichage mdp

const mdpMasque = document.querySelector(".fa-eye-slash")
const mdpVisible = document.querySelector(".fa-eye")
const oldPassword = document.querySelector("#oldPassword")

mdpMasque.addEventListener("click", ()=>{
  mdpMasque.classList.add("dnone")
  mdpVisible.classList.remove("dnone")
  oldPassword.type="text"
  newPassword.type="text"
  verifNewPassword.type="text"

})
mdpVisible.addEventListener("click", ()=>{
  mdpMasque.classList.remove("dnone")
  mdpVisible.classList.add("dnone")
  oldPassword.type="password"
  newPassword.type="password"
  verifNewPassword.type="password"

})

//modale changement image par image site
const btn_modif_img_site = document.querySelector("#btn_modif_img_site")
const overlay_img_site = document.querySelector(".overlay_img_site")

btn_modif_img_site.addEventListener("click", ()=>{
  overlay_img_site.classList.remove("dnone")
})

overlay_img_site.addEventListener("click", ()=>{
  overlay_img_site.classList.add("dnone")
})