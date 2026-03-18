<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username']; 
    $premium = '$2y$10$BvD2Mkak5tbIuD1k2Rg8GuZ8uA92b8xdGovEcdl1Us5nSgDNRKy2y';
    $table_name = "users";

    // Insérer le string premium dans la table users là où le username est égal à $username
    $sql = "UPDATE $table_name SET premium = :premium WHERE username = :username";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':premium', $premium);
        $stmt->bindParam(':username', $username);

        if ($stmt->execute()) {
            echo "L'utilisateur " . $username . " est maintenant un membre premium.";
        } else {
            echo "Erreur lors de la mise à jour de l'utilisateur.";
        }
}
?>

