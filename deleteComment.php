
<?php

// Chargement des classes si besoin

require_once 'assets/config/bootstrap.php';

/////

$commentId = $_GET['comment'];
$eventId = $_GET['event'];
$userId = $_GET['user'];


// Instance PDO + appel au Manager avec cette instance

$manager = new CommentairesManager($db);

/////

$manager->delete($commentId);

/////

header('Location: comment.php?event='.$eventId.'&user='.$userId);
