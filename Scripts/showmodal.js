// Vérifier si le modal doit être affiché
console.log("Checking if modal should be shown")
var modalShown = localStorage.getItem('modalShown');
console.log("modalShown cookie value: " + modalShown)

if (!modalShown) {
  // Afficher le modal
  console.log("Modal should be shown")
  var modalTriggerBtn = document.getElementById('modalTriggerBtn');
  modalTriggerBtn.click();
  
}

// Gérer le bouton Ne plus afficher
var modalCloseBtn = document.getElementById('modalCloseBtn');
modalCloseBtn.addEventListener('click', function() {
  // Effacer le cookie et empêcher le modal de s'afficher à nouveau
  localStorage.removeItem('modalShown');
  console.log("Removing modalShown cookie")
});

// Gérer le bouton OK
var modalUnderstoodBtn = document.getElementById('modalUnderstoodBtn');
// Enregistrer dans les cookies que le modal a été affiché
console.log("Setting modalShown cookie")
localStorage.setItem('modalShown', true);
modalUnderstoodBtn.addEventListener('click', function() {
  // Fermer le modal
  var modalInstance = bootstrap.Modal.getInstance(document.getElementById('staticBackdrop'));
  modalInstance.hide();
  console.log("Hiding modal")
});

// Fonction pour désactiver les boutons pendant un certain temps
function disableButtonsForSeconds(seconds) {
    // Désactiver les boutons
    document.getElementById('modalCloseBtn').disabled = true;
    document.getElementById('modalUnderstoodBtn').disabled = true;
    document.getElementById('modalWaitingText').style.display = "block";
    // Réactiver les boutons après un certain délai
    setTimeout(function() {
        document.getElementById('modalCloseBtn').disabled = false;
        document.getElementById('modalUnderstoodBtn').disabled = false;
        document.getElementById('modalWaitingText').style.display = "none";
    }, seconds * 1000); // Convertir les secondes en millisecondes
}
// Appeler la fonction pour désactiver les boutons pendant 7 secondes au chargement de la page
window.onload = function() {
    disableButtonsForSeconds(10);
};
