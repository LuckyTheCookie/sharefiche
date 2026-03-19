<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrator</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">    <!-- Styles personnalisés -->
    <link href="../style.css" rel="stylesheet">
</head>
<body>

<div class="maintenance-banner to-the-center">
    <p>Ce site est désormais fermé pendant les vacances scolaires</p>
</div>

<!-- ==================================================== -->
<!-- AUTHENTICATION -->
<!-- ==================================================== -->
<?php
include 'config.php';

// Récupérer le token de l'utilisateur
$token = isset($_COOKIE['token']) ? $_COOKIE['token'] : '';

// Validation et nettoyage du token
$token = htmlspecialchars($token, ENT_QUOTES, 'UTF-8');

$sql = "SELECT * FROM users WHERE token = :token AND rank = :rank LIMIT 1";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':token', $token, PDO::PARAM_STR);
$rank = 'admin';
$stmt->bindParam(':rank', $rank, PDO::PARAM_STR);
$stmt->execute(); 
echo "<script>console.log('".$stmt->rowCount()."');</script>";

// Vérifier si un utilisateur admin a été trouvé
if ($stmt->rowCount() === 1) {
    // Accès autorisé - console.log("Accès autorisé");
    echo "<script>console.log('Accès autorisé');</script>";
} else {
    // Accès refusé
    echo "Accès refusé.";

    // Rediriger l'utilisateur vers la page d'accueil
    header("Location: ../");
    exit;
}
?>


<!-- ==================================================== -->
<!-- Header -->
<!-- ==================================================== -->

<!-- Introduction -->
<div class="container mt-3" id="intro">
    <h1 class="to-the-center title">Fiches de Révision</h1>
    <h2 class="to-the-center description">Administration</h2>
</div>

<!-- ==================================================== -->
<!-- Container -->
<!-- ==================================================== -->

<div class="container mt-3 mb-3">
    <a href="../" class="btn btn-secondary mb-3">Retour</a>
    <div class="accordion" id="accordionExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                    <p class="description mb-0">Ajouter une fiche de révision</p>
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <form method="post" action="add-fiche.php" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom</label>
                            <input type="text" class="form-control" id="nom" name="nom" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="numero_lecon" class="form-label">Numéro de la leçon</label>
                            <input type="number" class="form-control" id="numero_lecon" name="numero_lecon" required>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" class="form-control" id="image" name="image" required>
                        </div>
                        <div class="mb-3">
                            <label for="lien_visualiser" class="form-label
                            ">Lien pour visualiser</label>
                            <input type="text" class="form-control" id="lien_visualiser" name="lien_visualiser" required>
                        </div>
                        <div class="mb-3">
                            <label for="lien_download" class="form-label">Lien pour télécharger</label>
                            <input type="text" class="form-control" id="lien_download" name="lien_download" required>
                        </div>
                        <div class="mb-3">
                            <label for="subject" class="form-label">Matière</label>
                            <select class="form-select" id="subject" name="subject" required>
                                <option value="mathematiques">Mathématiques</option>
                                <option value="physiquechimie">Physique-Chimie</option>
                                <option value="francais">Français</option>
                                <option value="anglais">Anglais</option>
                                <option value="allemand">Allemand</option>
                                <option value="histoire">Histoire</option>
                                <option value="geographie">Géographie</option>
                                <option value="svt">SVT</option>
                                <option value="emc">EMC</option>
                                <option value="ses">SES</option>
                                <option value="nsi">NSI</option>
                            </select>
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                    </form>
                </div>
            </div>
        </div></div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    <p class="description mb-0">Modifier une fiche de révision</p>
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <form method="post" action="update-fiche.php" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="id" class="form-label">ID</label>
                            <input type="number" class="form-control" id="id" name="id" required>
                        </div>
                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom</label>
                            <input type="text" class="form-control" id="nom" name="nom" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="numero_lecon" class="form-label">Numéro de la leçon</label>
                            <input type="number" class="form-control" id="numero_lecon" name="numero_lecon" required>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" class="form-control" id="image" name="image" required>
                        </div>
                        <div class="mb-3">
                            <label for="lien_visualiser" class="form-label
                            ">Lien pour visualiser</label>
                            <input type="text" class="form-control" id="lien_visualiser" name="lien_visualiser" required>
                        </div>
                        <div class="mb-3">
                            <label for="lien_download" class="form-label">Lien pour télécharger</label>
                            <input type="text" class="form-control" id="lien_download" name="lien_download" required>
                        </div>
                        <div class="mb-3">
                            <label for="subject" class="form-label">Matière</label>
                            <select class="form-select" id="subject" name="subject" required>
                                <option value="mathematiques">Mathématiques</option>
                                <option value="physiquechimie">Physique-Chimie</option>
                                <option value="francais">Français</option>
                                <option value="anglais">Anglais</option>
                                <option value="allemand">Allemand</option>
                                <option value="histoire">Histoire</option>
                                <option value="geographie">Géographie</option>
                                <option value="svt">SVT</option>
                                <option value="emc">EMC</option>
                                <option value="ses">SES</option>
                                <option value="nsi">NSI</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Modifier</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    <p class="description mb-0">Supprimer une fiche de révision</p>
                </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <form method="post" action="delete-fiche.php">
                        <div class="mb-3">
                            <label for="id" class="form-label">ID</label>
                            <input type="number" class="form-control" id="id" name="id" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Supprimer</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingFour">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        <p class="description mb-0">Ajouter le premium à un utilisateur</p>
                    </button>
            </h2>
            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <form method="post" action="add-premium.php">
                        <div class="mb-3">
                            <label for="username" class="form-label">Nom d'utilisateur</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingFive">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                    <p class="description mb-0">Bannir un utilisateur</p>
                </button>
            </h2>
            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <form method="post" action="ban-user.php">
                        <div class="mb-3">
                            <label for="username" class="form-label">Nom d'utilisateur</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Bannir</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingSix">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                    <p class="description mb-0">Débannir un utilisateur</p>
                </button>
            </h2>
            <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <form method="post" action="unban-user.php">
                        <div class="mb-3">
                            <label for="username" class="form-label">Nom d'utilisateur</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Débannir</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


    












<!-- ==================================================== -->
<!-- SCRIPTS -->
<!-- ==================================================== -->
<!-- jQuery and Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<!-- <script src="./Scripts/showmodal.js"></script> -->

</body>
</html>




