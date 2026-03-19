<?php
include '../config.php';
// Disconnect the user by destroying all data
session_start();
// Destroy token cookie
if (isset($_COOKIE['token'])) {
    unset($_COOKIE['token']); 
    setcookie('token', '', -1, '/');}
session_destroy();
header('Location: ../');
exit();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGOUT</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Custom styles -->
    <link href="../style.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-3">
        <h2 class="title to-the-center">LOGOUT</h2>
        <p class="to-the-center">Déconnexion Réussie</p>
    </div>
</body>




</html>

