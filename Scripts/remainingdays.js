// Obtenir la date actuelle
var currentDate = new Date();

// Sélectionner tous les éléments de date avec la classe "date"
var dateElements = document.querySelectorAll(".date");

// Parcourir chaque élément de date
dateElements.forEach(function(element) {
  // Récupérer le texte de l'élément
  var dateString = element.textContent;

  // Extraire le jour et le mois de la chaîne de date
  var dateParts = dateString.trim().split(" ");
  var day = parseInt(dateParts[0], 10);
  var monthName = dateParts[1];
  
  // Obtenir l'index du mois à partir de son nom
  var months = ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"];
  var month = months.indexOf(monthName);

  // Créer une nouvelle date avec l'année actuelle, le mois et le jour
  var targetDate = new Date(currentDate.getFullYear(), month, day);

  // Calculer la différence en millisecondes entre la date cible et la date actuelle
  var timeDiff = targetDate.getTime() - currentDate.getTime();

  // Convertir la différence en jours
  var daysRemaining = Math.ceil(timeDiff / (1000 * 3600 * 24));

  // Afficher le nombre de jours restants sur l'élément de date
  if (daysRemaining === 0) {
    element.textContent = "Aujourd'hui";
  } else if (daysRemaining === 1) {
    element.textContent = "Demain";
  } else if (daysRemaining < 0) {
    element.textContent = "Cet examen s'est déroulé il y a " + Math.abs(daysRemaining) + " jours";
  }
  
  else {
    element.textContent = daysRemaining + " jours restants";
  }

});