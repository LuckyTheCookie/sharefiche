// Define the array of unusable items

var unusable = [ 
    "francais",
    "nsi",
    "anglais",
];

// Add the class "card-disabled" to the unusable items (getElementsById)

for (var i = 0; i < unusable.length; i++) {
    var card = document.getElementById(unusable[i]);
    card.classList.add("card-disabled");
}