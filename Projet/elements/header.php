<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Ibrahimi Ismail">
    <meta name="description" content="Projet Livre d'Or PHP">
    <title>Livre d'Or</title>
</head>
<body>
<header>
    <h1>Livre d'Or</h1>
    <nav>
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <?php if (isset($_SESSION['user_logged'])): ?>
                <li><a href="new_post.php">Ajouter un message</a></li>
                <li><a href="disconnect.php">Déconnexion</a></li>
            <?php else: ?>
                <li><a href="login.php">Connexion</a></li>
                <li><a href="signup.php">Inscription</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>
