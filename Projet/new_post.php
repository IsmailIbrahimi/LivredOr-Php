<?php
require 'config/config.php';
require 'elements/header.php';

session_start();

if (!isset($_SESSION['user_logged'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $msgContent = trim($_POST['content']);

    if (empty($msgContent)) {
        echo "Le message est vide.";
    } else {
        $query = $pdo->prepare("INSERT INTO posts (user_id, message) VALUES (?, ?)");
        if ($query->execute([$_SESSION['user_logged'], $msgContent])) {
            header("Location: index.php");
        } else {
            echo "Erreur lors de l'envoi du message.";
        }
    }
}
?>

<form method="POST">
    <textarea name="content" placeholder="Écrivez votre message ici..." required></textarea><br>
    <button type="submit">Envoyer</button>
</form>

<?php include 'elements/footer.php'; ?>
