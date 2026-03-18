// Lors du chargement de la page, vérifier si un token est présent dans un cookie
// Si non, afficher une notification pour inviter l'utilisateur à se connecter (id = "unregistered")

function getCookie(name) {
    const value = `; ${document.cookie}`;
    const parts = value.split(`; ${name}=`);    
    if (parts.length === 2) return parts.pop().split(';').shift();
    return "";
}

function checkConnection(page) {
    if (page === "home") {
        // On récupère le cookie
        let token = getCookie("token");
        // Si le cookie n'existe pas
        if (token === "") {
            // On affiche la notification
            document.getElementById("unregistered").style.display = "block";
        }
    }
    if (page === "subject") {
        // On récupère le cookie
        let token = getCookie("token");
        // Si le cookie n'existe pas
        if (token === "") {
            // Rediriger vers la page d'accueil
            window.location.href = "./";
        }
    }
}


