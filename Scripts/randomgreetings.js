// Show a random greeting message :)

// Define an array of greeting messages
var greetings = [
    "C'est un plaisir de te revoir ! 😊",
    "Ravi de te revoir ! 😄",
    "Quel plaisir de te revoir ! 🥰",
    "Tu m'as manqué ! 🥺",
    "Comment vas-tu aujourd'hui ? 😊",
    "Que vas-tu faire aujourd'hui ? 😊",
    "Que vas-tu étudier aujourd'hui ? 📚",
    "Quel est ton objectif aujourd'hui ? 🎯",
];

// Get a random greeting message
var greeting = greetings[Math.floor(Math.random() * greetings.length)];

// Show the greeting message
document.getElementById("randomgreetings").innerHTML = greeting;