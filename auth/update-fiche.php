<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $description = $_POST['description'];
    $numero_lecon = $_POST['numero_lecon'];
    $lien_visualiser = $_POST['lien_visualiser'];
    $lien_download = $_POST['lien_download'];
    $subject = $_POST['subject'];

    $table_name = "fiches_" . $subject;

    // Vérifier si une nouvelle image a été téléchargée
    if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
        $image = $_FILES['image']['name'];
        $target = "../uploads/" . basename($image);
        $chemin_image = $target; // Chemin complet de l'image

        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            // Mettre à jour avec la nouvelle image et son chemin
            $sql = "UPDATE $table_name SET nom = :nom, description = :description, numero_lecon = :numero_lecon, 
                    chemin_image = :chemin_image, lien_visualiser = :lien_visualiser, lien_download = :lien_download 
                    WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':chemin_image', $chemin_image); // Mise à jour du chemin de l'image

            // Débogage: confirmer le chemin de l'image
            echo "Chemin de l'image mis à jour: " . $chemin_image;
        } else {
            echo "Erreur lors du téléchargement de l'image.";
            exit;
        }
    } else {
        // Mise à jour sans changer l'image
        $sql = "UPDATE $table_name SET nom = :nom, description = :description, numero_lecon = :numero_lecon, 
                lien_visualiser = :lien_visualiser, lien_download = :lien_download WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        
        // Débogage: informer qu'il n'y a pas eu de téléchargement d'image
        echo "Aucune nouvelle image téléchargée.";
    }

    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':numero_lecon', $numero_lecon);
    $stmt->bindParam(':lien_visualiser', $lien_visualiser);
    $stmt->bindParam(':lien_download', $lien_download);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        echo "Fiche mise à jour avec succès.";
    } else {
        echo "Erreur lors de la mise à jour de la fiche.";
    }
}
?>
