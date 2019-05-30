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
$commentaires = array_reverse($manager->getEventComs($eventId));

// Get the name of the actual user

$userManager = new UsersManager($db);
$userId = $_GET['user'];
$userName = $userManager->get($userId)->nom();

?>


<form action="sendComment.php?event=<?php echo htmlspecialchars($eventId)?>&user=<?php echo htmlspecialchars($userId)?>" method="post" class="d-flex flex-column align-items-center card p-2 event-container">
  <label for="comment">Ajouter un commentaire</label>
  <textarea name="comment" cols="50" rows="5"></textarea>
  <input class="mt-2 btn btn-primary" type="submit" value="Envoyer">
</form>

<?php

foreach ($commentaires as $key => $value) {
  ?>
  <div class="event-container w-50 bg-light m-3 d-flex flex-column justify-content-center align-items-center shadow card border-0">
    <p class="text-center "><?php echo htmlspecialchars($value->content()) ?></p> 
    <div class="w-50 d-flex flex-row justify-content-between">
      <p class="text-center m-0">Auteur : <?php echo htmlspecialchars($manager->getUserName($value->userId())) ?></p>
      <?php
      if ($userId == $value->userId()) {
      ?>
        <a href="deleteComment.php?comment=<?php echo htmlspecialchars($value->id())?>&event=<?php echo htmlspecialchars($eventId)?>&user=<?php echo htmlspecialchars($userId)?>">Supprimer mon commentaire</a>
      <?php
      }
      ?>
    </div>
  </div>

<?php
}
?>


</body>