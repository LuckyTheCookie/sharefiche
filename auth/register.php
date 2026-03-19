<?php
include 'config.php';
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $username = strtolower($_POST['username']);
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $affiliation = $_POST['affiliation'];
        // If affiliation is not set, set it to "home"
        if (empty($affiliation)) {
            $affiliation = "home";
        }

        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "User already exists";
        } else {
            $sql = "INSERT INTO users (username, password, affiliate) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sss", $username, $password, $affiliation);
            if ($stmt->execute()) {
                header("Location: ./login");
            } else {
                echo "Error: " . $stmt->error;
            }
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTER</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">    <!-- Styles personnalisés -->
    <link href="style.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-3">
        <h2 class="title to-the-center">INSCRIPTION</h2>
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
            <?php
            if (isset($_GET['from']) && !empty($_GET['from'])) {                
                $from = htmlspecialchars($_GET['from'], ENT_QUOTES, 'UTF-8');
                if ($from == "affiliation") {
                    echo '<div class="mb-3">
                        <label for="affiliation" class="form-label">Invité par :</label>
                        <input type="text" class="form-control" id="affiliation" name="affiliation" value="' . htmlspecialchars($_GET['username'], ENT_QUOTES, 'UTF-8') . '" readonly>
                    </div>';
                }
            }
            ?>
            <button type="submit" class="btn btn-primary">S'inscrire</button>
        </form>

        <div class="mt-3 text-muted">
            <p>Déjà inscrit ? <a href="login">Connectez-vous</a></p>
        </div>
    </div>
</body>
</html>

<script>
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
        const url = window.location.protocol + "//" + window.location.host + window.location.pathname;
        window.history.replaceState({}, document.title, url);
    }

    // Get URL parameters
    const params = getUrlParams();

    // Populate form fields with URL parameters
    if (params['affiliation']) {
        document.getElementById('affiliation').value = params['affiliation'];
    }
    // Remove URL parameters
    removeUrlParams(); //
</script>