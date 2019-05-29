<?php

function chargerClasse($class){
  require $class . '.php';
}

spl_autoload_register('chargerClasse');

$db = new PDO('mysql:host=localhost;dbname=event_time','root','redactedredactedgolousisi94');
$manager = new CommentairesManager($db);

$eventId = $_GET['event'];

$inputValue = $_POST['comment'];

$Comments = $manager->getList();
$lastComment = $Comments[count($Comments)-1]->id();


$commentaire = new Commentaires([
  'id' => $lastComment+1,
  'eventId' => $eventId,
  'content' => $inputValue,
  'userId' => '40'
]);

$manager->add($commentaire);

header('Location: comment.php?event='.$eventId);

?>