<?php
include 'config.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            session_regenerate_id(true);
            $_SESSION['username'] = $username;

            $token = bin2hex(random_bytes(32));
            
            // Mise à jour du token et de la dernière connexion
            $sql = "UPDATE users SET token = ?, lastlogin = CURRENT_TIMESTAMP WHERE username = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $token, $username);
            $stmt->execute();

            setcookie('token', $token, time() + 3600, "/");
            header("Location: ./");
            exit;
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No user found.";
    }
}
?>

<DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">    <!-- Styles personnalisés -->
    <link href="style.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-3">
        <h2 class="title to-the-center">LOGIN</h2>
    </div>

    <div class="container mt-3">
        <form method="post" action="">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>

        <p class="text-muted mt-3">Vous n'avez pas encore de compte ? <a href="register">S'inscrire</a></p>
    </div>
</body>
</html>
