<?php
require 'config/config.php';
require 'elements/header.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $newUser = trim($_POST['new_user']);
    $newPwd = trim($_POST['new_pwd']);
    $pwdHash = password_hash($newPwd, PASSWORD_DEFAULT);

    if (empty($newUser) || empty($newPwd)) {
        echo "Tous les champs doivent être remplis.";
    } else {
        $query = $pdo->prepare("INSERT INTO members (username, password) VALUES (?, ?)");
        if ($query->execute([$newUser, $pwdHash])) {
            echo "Inscription réussie ! <a href='login.php'>Connectez-vous ici</a>";
        } else {
            echo "Erreur lors de l'inscription.";
        }
    }
}
?>

<form method="POST">
    <label for="new_user">Nom d'utilisateur:</label>
    <input type="text" name="new_user" id="new_user" required><br>
    <label for="new_pwd">Mot de passe:</label>
    <input type="password" name="new_pwd" id="new_pwd" required><br>
    <button type="submit">S'inscrire</button>
</form>

<?php include 'elements/footer.php'; ?>
