<?php
require 'config/config.php';
require 'elements/header.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = trim($_POST['user']);
    $pwd = trim($_POST['pwd']);

    if (empty($user) || empty($pwd)) {
        echo "Remplissez tous les champs.";
    } else {
        $query = $pdo->prepare("SELECT * FROM members WHERE username = ?");
        $query->execute([$user]);
        $foundUser = $query->fetch();

        if ($foundUser && password_verify($pwd, $foundUser['password'])) {
            $_SESSION['user_logged'] = $foundUser['id'];
            $_SESSION['username'] = $foundUser['username'];
            header("Location: index.php");
        } else {
            echo "Erreur d'authentification.";
        }
    }
}
?>

<form method="POST">
    <label for="user">Nom d'utilisateur:</label>
    <input type="text" name="user" id="user" required><br>
    <label for="pwd">Mot de passe:</label>
    <input type="password" name="pwd" id="pwd" required><br>
    <button type="submit">Se connecter</button>
</form>

<?php include 'elements/footer.php'; ?>
