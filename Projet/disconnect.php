<?php
session_start();
session_destroy();
echo "Vous avez été déconnecté. <a href='index.php'>Retour à l'accueil</a>";
?>
