<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $subject = $_POST['subject'];

    $table_name = "fiches_" . $subject;

    $sql = "DELETE FROM $table_name WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        echo "Fiche supprimée avec succès.";
    } else {
        echo "Erreur lors de la suppression de la fiche.";
    }
}
?>
