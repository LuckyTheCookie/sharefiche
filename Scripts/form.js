document.getElementById('interestForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const classe = document.getElementById('class').value;

    const webhook = 'https://discord.com/api/webhooks/1300579131229999195/NvDHue2xPFBEZygBs45WK9fO_Nme0RM6A63PTicxvLJVqbgQIVGisbMLVDZN3sYcGKuq';

    const embed = {
        title: "Nouvelle personne intéressée !",
        color: 0xec3750,
        fields: [
            { name: "Nom", value: name },
            { name: "Classe", value: classe },
            { name: "Email", value: email },
        ],
        timestamp: new Date()
    };

    fetch(webhook, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ embeds: [embed] }),
    })
    .then(response => {
        if (response.ok) {
            alert('Merci pour votre intérêt ! Nous vous contacterons bientôt.');
            this.reset();
        } else {
            alert('Une erreur est survenue. Veuillez réessayer plus tard.');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Une erreur est survenue. Veuillez réessayer plus tard.');
    });
});