
<?php

// Chargement des classes si besoin

function chargerClasse($class){
  require './class/' .$class . '.php';
}

spl_autoload_register('chargerClasse');

/////

$commentId = $_GET['comment'];
$eventId = $_GET['event'];
$userId = $_GET['user'];


// Instance PDO + appel au Manager avec cette instance

$db = new PDO('mysql:host=localhost;dbname=event_time','root','redactedredactedgolousisi94');
$manager = new CommentairesManager($db);

/////

$manager->delete($commentId);

/////

header('Location: comment.php?event='.$eventId.'&user='.$userId);
