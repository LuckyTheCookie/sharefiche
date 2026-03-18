<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fiches de Révision</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="./style.css" rel="stylesheet">
</head>
<body>
    <div class="banner text-center" role="alert" id="greetings"></div>

    <div class="container mt-3" id="intro">
        <?php
        include './auth/config.php';
        
        $matiere = isset($_GET['matiere']) ? $_GET['matiere'] : 'Erreur';
        $matiere_titre = ucfirst($matiere);
        echo "<h1 class='title text-center'>$matiere_titre</h1>";
        
        $sql = "SELECT * FROM fiches WHERE matiere = ? ORDER BY course_name ASC";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $matiere);
        $stmt->execute();
        $result = $stmt->get_result();

        $fiches = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $fiches[] = $row;
            }
        }
        ?>
    </div>

    <div class="container mt-3">
        <a href="../" class="btn btn-secondary mb-3">Retour</a>
        <div class="accordion" id="accordionExample">
        <?php
        $current_course = '';
        $course_counter = 0; // Compteur pour générer des IDs uniques

        // Fonction pour générer un ID sûr
        function generateSafeId($string) {
            return 'course_' . preg_replace('/[^a-z0-9]+/', '_', strtolower($string));
        }

        foreach ($fiches as $fiche) {
            if ($fiche['course_name'] != $current_course) {
                if ($current_course != '') {
                    echo '</div></div></div></div>';
                }
                $current_course = $fiche['course_name'];
                $course_id = generateSafeId($current_course);
                $course_counter++;

                echo '
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading' . $course_id . '">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse' . $course_id . '" aria-expanded="false" aria-controls="collapse' . $course_id . '">
                            <p class="description mb-0">' . htmlspecialchars($current_course) . '</p>
                        </button>
                    </h2>
                    <div id="collapse' . $course_id . '" class="accordion-collapse collapse" aria-labelledby="heading' . $course_id . '" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="row row-cols-2 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 mb-3">';
            }

            echo '
                <div class="col">
                    <div class="card mb-3 mt-3 card-fixed-height card-anim">
                        <img class="card-img-top" src="' . $fiche['chemin_image'] . '" alt="' . $fiche['nom'] . '" >
                        <div class="card-body">
                            <h5 class="card-title">' . $fiche['nom'] . '</h5>
                            <p class="card-text">' . $fiche['description'] . '</p>
                        </div>
                        <div class="card-footer">';
            
            
            if ($fiche['lien_visualiser']) {
                $visualiser_text = $fiche['type'] == 'flashcard' ? 'Apprendre' : ($fiche['type'] == 'video' ? 'Voir la vidéo' : 'Visualiser');
                echo '<a href="' . $fiche['lien_visualiser'] . '" class="btn btn-primary" style="margin-right: 5px;">' . $visualiser_text . '</a>';
            }

            if ($fiche['lien_download']) {
                if ($fiche['lien_visualiser']) {
                    echo '<a href="' . $fiche['lien_download'] . '" class="btn btn-secondary style="margin-right: 5px;" target="_blank">Télécharger</a>';
                }
                else {
                    echo '<a href="' . $fiche['lien_download'] . '" class="btn btn-primary" style="margin-right: 5px;" target="_blank">Télécharger</a>';
                }
            }
            
            
            if ($fiche['dyslexic']) {
                if (($fiche['lien_visualiser'] && $fiche['lien_download']) || $fiche['lien_download']) {
                    echo '<div class="mt-2">';
                    echo '<a href="' . $fiche['dyslexic'] . '" class="btn btn-secondary style="margin-top: 5px;">Version dyslexique</a>';
                    echo '</div>';
                }
                else {
                    echo '<a href="' . $fiche['dyslexic'] . '" class="btn btn-secondary style="margin-top: 5px;">Version dyslexique</a>';
                }
            }
            
            echo '
                        </div>
                    </div>
                </div>';
        }

        if ($current_course != '') {
            echo '</div></div></div></div>';
        }
        ?>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./Scripts/checkconnection.js"></script>
    <script>
        checkConnection("subject");
    </script>
</body>
</html>

<?php
include './auth/config.php';

$token = $_COOKIE['token'];
$sql = "SELECT username FROM users WHERE token = ?";

if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $stmt->bind_result($username);
    if ($stmt->fetch()) {
        echo "<script>document.getElementById('greetings').innerHTML = 'Vous êtes connecté en tant que, " . htmlspecialchars($username) . " :)';</script>";
    }
    $stmt->close();
}

$conn->close();
?>
