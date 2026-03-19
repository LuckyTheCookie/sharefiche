<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username']; 
    $deactivated = 'false';
    $table_name = "users";

    // Insérer le string premium dans la table users là où le username est égal à $username
    $sql = "UPDATE $table_name SET deactivated = :deactivated WHERE username = :username";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':deactivated', $deactivated);
        $stmt->bindParam(':username', $username);

        if ($stmt->execute()) {
            echo "Utilisateur mis à jour avec succès.";
        } else {
            echo "Erreur lors de la mise à jour de l'utilisateur.";
        }
}
?>
