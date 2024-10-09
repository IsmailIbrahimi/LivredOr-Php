<?php
require 'config/config.php';
require 'elements/header.php';

session_start();

$query = $pdo->prepare("SELECT posts.message, posts.date_posted, members.username FROM posts JOIN members ON posts.user_id = members.id ORDER BY posts.date_posted DESC");
$query->execute();
$allPosts = $query->fetchAll();

if (isset($_SESSION['user_logged']) && isset($_SESSION['username'])) {
    echo "Salut, " . htmlspecialchars($_SESSION['username']) . "! <a href='disconnect.php'>Déconnexion</a><br>";
    echo "<a href='new_post.php'>Écrire un message</a><br><br>";
} else {
    echo "Bienvenue, invité ! <a href='login.php'>Connectez-vous</a> ou <a href='signup.php'>Inscrivez-vous</a><br><br>";
}

foreach ($allPosts as $post) {
    echo "<p><b>" . htmlspecialchars($post['username']) . ":</b> " . htmlspecialchars($post['message']) . "<br>" . $post['date_posted'] . "</p><br>";
}

include 'elements/footer.php';
?>
