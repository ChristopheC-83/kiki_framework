// on choisit le formulaire sur lequel on agit
// si confirmation dans la fenetre => on passe à l'étape suivante

function confirmation(formulaire) {
    if (confirm("Confirmez-vous la modification ?")) {
      formulaire.submit();
    } else {
      document.location.reload();
    }
  }
function confirmationSupp(formulaire) {
    if (confirm("Confirmez-vous la modification ?")) {
      formulaire.submit();
    } else {
      document.location.reload();
    }
  }