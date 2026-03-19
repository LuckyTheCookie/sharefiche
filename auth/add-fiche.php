<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST['nom'];
    $description = $_POST['description'];
    $numero_lecon = $_POST['numero_lecon'];
    $lien_visualiser = $_POST['lien_visualiser'];
    $lien_download = $_POST['lien_download'];
    $subject = $_POST['subject'];

    // Gestion de l'upload de l'image
    $image = $_FILES['image']['name'];
    $target = "../uploads/" . basename($image);
    $chemin_image = $target;

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        // Insérer les données dans la table spécifique
        $table_name = "fiches_" . $subject;
        $sql = "INSERT INTO $table_name (nom, description, numero_lecon, chemin_image, lien_visualiser, lien_download) 
                VALUES (:nom, :description, :numero_lecon, :chemin_image, :lien_visualiser, :lien_download)";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':numero_lecon', $numero_lecon);
        $stmt->bindParam(':chemin_image', $chemin_image); // Remplacer image par chemin_image
        $stmt->bindParam(':lien_visualiser', $lien_visualiser);
        $stmt->bindParam(':lien_download', $lien_download);

        if ($stmt->execute()) {
            echo "Fiche ajoutée avec succès.";
        } else {
            echo "Erreur lors de l'ajout de la fiche.";
        }
    } else {
        echo "Erreur lors du téléchargement de l'image.";
    }
}
?>
