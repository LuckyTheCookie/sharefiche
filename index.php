<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fiches de Révision</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">    <!-- Styles personnalisés -->
    <link href="style.css" rel="stylesheet">
</head>
<body>



<!-- ==================================================== -->
<!-- Header -->
<!-- ==================================================== -->

<!-- Showed only if the user is connected -->
<div class="container mt-3" id="connected-container">
    <h2 class="to-the-center title" id="welcome"></h2>
    <h3 class="to-the-center description" id="randomgreetings"></h3>
    <div class="to-the-center">
        <a href="./auth/logout.php" class="btn btn-primary">Déconnexion</a>
    </div>
    <div class="to-the-center mt-3" id="adminbutton" style="display: none;">
        <a href="./auth/administrator.php" class="btn btn-secondary">Espace administrateur</a>
    </div>
</div>

<!-- Introduction -->
<div class="container mt-3" id="intro">
    <h1 class="to-the-center title">Fiches de Révision</h1>
    <h2 class="to-the-center description">Vous pouvez consulter et télécharger mes fiches de révision de première ici</h2>
    <h3 class="to-the-center text-muted">Les fiches sont hébérgées sur un serveur Google Drive à mes frais et sont disponibles au téléchargement depuis Github :)</h3>
</div>


<div class="container mt-3 mb-3" id="content">
    <!-- Showed only if the user is not connected -->
    <div id="unregistered" style="display: none;">
        <div class="alert alert-warning text-center" role="alert">
            <p>Hey, vous ne semblez pas être connecté<p>
            <div class="mt-3">
                <a href="./login" class="btn btn-primary">Connexion</a>
                <a href="./register" class="btn btn-secondary" id="registerbutton">Inscription</a>
            </div>
        </div>
    </div>

    <!-- Showed if an error occured during the login process -->
    <div class="alert alert-danger to-the-center visually-hidden" role="alert" id="login-error">
        Une erreur est survenue, veuillez réessayer
    </div>

    <!-- <div class="alert alert-primary to-the-center visually-hidden" role="alert" id="premium">
        <p class="mb-0"><strong>Lucas</strong> vous a offert un accès <strong>premium</strong>, profitez-en !</p>
    </div> -->


    <!-- ==================================================== -->
    <!-- Contenu principal -->
    <!-- ==================================================== -->
    <div class="row mt-4 row-cols-2 row-cols-sm-2 row-cols-md-3 row-cols-lg-4"> 
        <div class="col" id="ad">
            <div class="hackclub-promo">
                <div class="card-body d-flex flex-column">
                    <h3 class="card-title">Rejoignez Hackclub</h3>
                    <p class="card-text flex-grow-1">Un club de programmation pour les lycéens</p>
                    <a href="https://urlr.me/D6dzT" class="cta-button mt-auto">Découvrir</a>
                </div>
            </div>
        </div>
        <div class="col" id="allemand">
            <a href="subject?matiere=allemand" class="card text-center matiere-card">
                <img class="card-img-top" src="Assets/deutsch.bretzel.png" alt="Card image cap" >
                <div class="card-body">
                    <h5 class="card-title">Allemand [1G_All1]</h5>
                </div>
            </a>
        </div>
        <div class="col" id="francais">
            <a href="subject?matiere=francais" class="card text-center matiere-card">
                <img class="card-img-top" src="Assets/francais.books.png" alt="Card image cap" >
                <div class="card-body">
                    <h5 class="card-title">Français</h5>
                </div>
                <div class="card-footer">
                    <p class="newstext mb-0">Nouvelles fiches</p>
                </div>
            </a>
        </div>
        <div class="col" id="physique">
            <a href="subject?matiere=physique" class="card text-center matiere-card">
                <img class="card-img-top" src="Assets/physics.bottle.png" alt="Card image cap" >
                <div class="card-body">
                    <h5 class="card-title">Physique</h5>
                </div>
            </a>
        </div>
        <div class="col" id="es">
            <a href="subject?matiere=enseignement scientifique" class="card text-center matiere-card">
                <img class="card-img-top" src="Assets/es.microscope.webp" alt="Card image cap" >
                <div class="card-body">
                    <h5 class="card-title">Enseignement Scientifique</h5>
                </div>
                <div class="card-footer">
                    <p class="newstext mb-0">Nouveau</p>
                </div>
            </a>
        </div>
        <div class="col" id="hg">
            <a href="subject?matiere=histoire" class="card text-center matiere-card">
                <img class="card-img-top" src="Assets/history.helmet.webp" alt="Card image cap" >
                <div class="card-body">
                    <h5 class="card-title">Histoire</h5>
                </div>
                <div class="card-footer">
                    <p class="newstext mb-0">Nouveau</p>
                </div>
            </a>
        </div>
        <!--  <div class="col" id="nsi">
            <a href="./Subjects/snt.php" class="card text-center matiere-card">
                <img class="card-img-top" src="Assets/snt.computer.png" alt="Card image cap" >
                <div class="card-body">
                    <h5 class="card-title">NSI</h5>
                </div>
            </a>
        </div>
        <div class="col" id="anglais">
            <a href="./Subjects/anglais.php" class="card text-center matiere-card">
                <img class="card-img-top" src="Assets/anglais.flag.uk.png" alt="Card image cap" >
                <div class="card-body">
                    <h5 class="card-title">Anglais [1G_ANG1 et EURO]</h5>
                </div>
            </a>
        </div> -->
        <div class="col" id="maths">
            <a href="subject?matiere=maths" class="card text-center matiere-card">
                <img class="card-img-top" src="Assets/maths.books.png" alt="Card image cap" >
                <div class="card-body">
                    <h5 class="card-title">Maths</h5>
                </div>
            </a>
        </div>
    </div>
</div>

<!-- ==================================================== -->
<!-- Bannissement -->
<!-- ==================================================== -->

<div class="container mt-3 visually-hidden" id="ban">
    <div class="alert alert-danger" role="alert">
        <h1 class="to-the-center">Vous avez été banni</h1>
        <p class="to-the-center">ERROR CODE : Your account has been flagged by automated moderation and has been banned from the website.</p>
        <p class="to-the-center">Je suis un bot et je peux faire des erreurs, si vous pensez qu'il s'agit d'une erreur, veuillez contacter l'administrateur du site.</p>
    </div>
</div>


<!-- ==================================================== -->
<!-- Footer -->
<!-- ==================================================== -->
<div class="container mt-5 mb-3">
    <div class="title">Avertissement</div>
        <div class="to-the-center">
            <p>Ces fiches de révisions ne vous garantissent en aucun cas de meilleurs résultats aux examens.<br>Elles sont fournies à but éducatif et peuvent contenir des erreurs. Je ne suis en aucun cas responsable de vos erreurs, à vous de vérifier la véracité des informations avant de les utiliser.</p>
        </div>
        <div class="to-the-center">
            <p>Copyright © 2024 Lucas THIEBAUT - <a href="/terms">Mentions légales</a></p>
        </div>
        <div class="to-the-center">
            <p>Site hébergé avec amour par <a href="https://github.com/Radalium/">Sunny</a></p>
        </div> 
</div>

<!-- ==================================================== -->
<!-- MODULES COMPLEMENTAIRES -->
<!-- ==================================================== -->

<!-- Modal Home -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="to-the-center modal-title fs-5" id="staticBackdropLabel">VEUILLEZ LIRE CE TEXTE ATTENTIVEMENT S'IL VOUS PLAIT</h1>
        </div>
        <div class="modal-body">
            <p>En utilisant ce site, vous comprenez que :</p>
            <ul>
                <li>Ces fiches de révisions ne vous garantissent pas forcément de meilleurs résultats aux examens.</li>
                <li>Elles sont fournies à but éducatif et <strong>peuvent contenir des erreurs.</strong></li>
                <li><strong>Je ne suis en aucun cas responsable de vos erreurs, à vous de vérifier la véracité des informations avant de les utiliser.</strong></li>
            </ul>
            <p>Site en version beta, des erreurs peuvent être présentes. Merci de me les signaler si vous en trouvez.</p>
            <p>Copyright © 2024 Lucas THIEBAUT - <a href="/terms">Mentions légales</a></p>
            <p>Site hébergé avec amour par <a href="https://github.com/Radalium/">Sunny</a></p>
        </div>
        <div class="modal-footer">
          <p>En fermant cette fenêtre, vous acceptez les conditions d'utilisation de ce site sans réserve.</p>
          <p class="text-muted" id="modalWaitingText">Vous devez patienter 10 secondes avant de fermer cet avertissement</p>
          <button id="modalCloseBtn" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
          <button id="modalUnderstoodBtn" type="button" class="btn btn-primary">Ne plus afficher</button>
        </div>
      </div>
    </div>
</div>


<!-- Show an affiliation modal with my profil picture centered, a title and a description. Add also a button to close the modal and to see my GitHub profile. The subtitle should be the username of the user who invited the visitor. -->
<div class="modal fade" id="affiliationModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="affiliationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="to-the-center modal-title fs-5" id="affiliationModalLabel">Bienvenue !</h1>
        </div>
        <div class="modal-body">
            <h2 class="to-the-center title">Salut, moi c'est Lucas !</h2>
            <div class="to-the-center">
                <img src="https://avatars.githubusercontent.com/u/85549951?v=4&size=128" class="rounded-circle" alt="Lucas THIEBAUT" width="150" height="150">
            </div>
            <br>
            <p class="to-the-center">Si vous ne me connaissez pas, je suis Lucas en 1G1, l'auteur de ce site</p>
            <p class="to-the-center">Je suis passionné par l'informatique et le développement web. J'ai créé ce site pour partager mes fiches de révisions de première avec vous.</p>
        </div>
        <div class="modal-footer">
          <button id="affiliationModalCloseBtn" type="button" class="btn btn-primary" data-bs-dismiss="modal">Fermer</button>
          <a href="https://github.com/LuckyTheCookie" class="btn btn-secondary">Github</a> 
        </div>
        </div>
    </div>
</div>

<!-- ==================================================== -->

<!-- AUTO LAUNCH MODAL - DO NOT REMOVE -->
<button id="modalTriggerBtn" style="display: none;" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    AUTO LAUNCH MODAL - DO NOT REMOVE
</button>

<button id="AfModalTriggerBtn" style="display: none;" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#affiliationModal">
    AUTO LAUNCH AFFILIATION MODAL - DO NOT REMOVE
</button>

<!-- ==================================================== -->


<!-- Affiliation Modal by getting the URL parameter "?from=", for example: "school.lthb.fr?from=affiliation&username=Lucas" -->
<?php
if (isset($_GET['from']) && !empty($_GET['from'])) {
    $from = htmlspecialchars($_GET['from'], ENT_QUOTES, 'UTF-8');
    if ($from == "affiliation") {
        // Output the script to handle the URL parameters
        echo "<script>
            (function() {
                // Function to get URL parameters
                function getUrlParams() {
                    const params = {};
                    const queryString = window.location.search.substring(1);
                    const regex = /([^&=]+)=([^&]*)/g;
                    let m;
                    while (m = regex.exec(queryString)) {
                        params[decodeURIComponent(m[1])] = decodeURIComponent(m[2]);
                    }
                    return params;
                }

                // Function to remove URL parameters
                function removeUrlParams() {
                    const url = window.location.protocol + '//' + window.location.host + window.location.pathname;
                    window.history.replaceState({}, document.title, url);
                }

                // Get URL parameters
                const params = getUrlParams();

                // Sanitize the parameters
                const sanitize = (str) => {
                    const temp = document.createElement('div');
                    temp.textContent = str;
                    return temp.innerHTML;
                };

                // Update the DOM elements with sanitized parameters
                if (params['username']) {
                    const sanitizedUsername = sanitize(params['username']);
                    document.getElementById('affiliationModalLabel').innerHTML = 'Bienvenue ! Tu as été invité par ' + sanitizedUsername;
                    document.getElementById('registerbutton').href = './register?from=affiliation&username=' + encodeURIComponent(sanitizedUsername);
                }

                // Remove URL parameters
                removeUrlParams();
            })();
        </script>";
        echo "<script src='./Scripts/affiliationmodal.js'></script>";
    }
}
?>

<!-- ==================================================== -->
<!-- SCRIPTS -->
<!-- ==================================================== -->
<!-- jQuery and Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="./Scripts/remainingdays.js"></script>
<script src="./Scripts/randomgreetings.js"></script>
<script src="./Scripts/checkconnection.js"></script>
<script>checkConnection("home");</script>

<script src="./Scripts/showmodal.js"></script>


</body>
</html>


<!-- ==================================================== -->
<!-- AUTHENTICATION -->
<!-- ==================================================== -->
<?php

include './auth/config.php';

if (isset($_COOKIE['token']) && !empty($_COOKIE['token'])) {
    $token = htmlspecialchars($_COOKIE['token'], ENT_QUOTES, 'UTF-8');

    $sql = "SELECT username FROM users WHERE token = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $username = htmlspecialchars($row['username'], ENT_QUOTES, 'UTF-8');
    }
}

// If the username is set, set the div with id "welcome" to "display: block" and the container with id "connected-container" to "display: block"
// Add the username to the welcome message
if (isset($username)) {
    echo "<script>document.getElementById('welcome').style.display = 'block';</script>";
    echo "<script>document.getElementById('welcome').innerHTML = 'Bienvenue, " . htmlspecialchars($username) . " !';</script>";
    echo "<script>document.getElementById('connected-container').style.display = 'block';</script>";
    echo "<script>document.getElementById('intro').style.display = 'none';</script>";
}
else {
    echo "<script>document.getElementById('welcome').style.display = 'none';</script>";
    echo "<script>document.getElementById('connected-container').style.display = 'none';</script>";
    # Replace all cards with style "cards" to ".card-disabled" to disable them
    echo "<script>var cards = document.getElementsByClassName('matiere-card'); for (var i = 0; i < cards.length; i++) { cards[i].classList.add('card-disabled'); }</script>";
}

//If the token exist but does not match any user, display the #login-error alert
if (isset($token) && !isset($username)) {
    echo "<script>document.getElementById('login-error').style.display = 'block';</script>";
}

//Verify if the user is premium (is_premium = true) (else hide the #premium div = false or null or not set)
if (isset($username)) {
    $sql = "SELECT premium FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $premium = $row['premium'];
    }

    if ($premium == '$2y$10$BvD2Mkak5tbIuD1k2Rg8GuZ8uA92b8xdGovEcdl1Us5nSgDNRKy2y') {
        echo "<script>document.getElementById('premium').classList.remove('visually-hidden');</script>";
    }
}

if (isset($username)) {
    $sql = "SELECT deactivated FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $deactivated = $row['deactivated'];
    }

    if ($deactivated == "true") {
        echo "<script>document.getElementById('ban').classList.remove('visually-hidden');</script>";
        echo "<script>document.getElementById('content').style.display = 'none';</script>";
    }
    if ($deactivated == "false") {
        echo "<script>console.log('User is not banned');</script>";
    }
}

// Show admin button if user is "lucky"
if (isset($username) && $username == "lucky") {
    echo "<script>document.getElementById('adminbutton').style.display = 'block';</script>";
}

// Close the connection
$conn->close();

?>
