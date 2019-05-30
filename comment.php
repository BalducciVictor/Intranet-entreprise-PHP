<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>EvenTime</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
</head>
<body class="d-flex flex-column align-items-center">


<?php 

include 'header.php';

function chargerClasse($class){
  require './class/' .$class . '.php';
}

spl_autoload_register('chargerClasse');


// Loop over the comments list, with event parameter



$db = new PDO('mysql:host=localhost;dbname=event_time','root','redactedredactedgolousisi94');
$manager = new CommentairesManager($db);


// 

$eventId = $_GET['event'];
$commentaires = $manager->getEventComs($eventId);

// Get the name of the actual user

$userManager = new UsersManager($db);
$userId = $_GET['user'];
$userName = $userManager->get($userId)->nom();

echo $manager->getUserName($userId);

?>


<form action="sendComment.php?event=<?php echo $eventId?>&user=<?php echo $userId?>" method="post">
  <label for="comment">Ajouter un commentaire</label>
  <input type="text" name="comment">
  <input type="submit" value="Envoyer">
</form>

<?php

foreach ($commentaires as $key => $value) {
  ?>
  <div class="event-container w-50 bg-light m-3 d-flex flex-column justify-content-center align-items-center shadow card border-0">
    <p class="text-center "><?php echo $value->content() ?></p>
    <div class="w-50 d-flex flex-row justify-content-between">
      <p class="text-center m-0">Auteur : <?php echo $manager->getUserName($value->userId()) ?></p>
      <?php
      if ($userId == $value->userId()) {
      ?>
        <a href="">Supprimer mon commentaire</a>
      <?php
      }
      ?>
    </div>
  </div>

<?php
}
?>


</body>