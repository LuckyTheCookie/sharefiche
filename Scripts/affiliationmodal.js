document.addEventListener('DOMContentLoaded', function() {
    console.log("AF Modal should be shown")
    var modalTriggerBtn = document.getElementById('AfModalTriggerBtn');
    if (modalTriggerBtn) {
        modalTriggerBtn.click();
    } else {
        console.error("Modal trigger button not found");
    }    

    // Gérer le bouton Fermer
    var modalCloseBtn = document.getElementById('affiliationModalCloseBtn');
    modalCloseBtn.addEventListener('click', function() {
    // Fermer le modal
    var modalInstance = bootstrap.Modal.getInstance(document.getElementById('affiliationModalLabel'));
    modalInstance.hide();
    console.log("Hiding modal")
    });
});
    