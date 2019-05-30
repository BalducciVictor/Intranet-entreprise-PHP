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

<a href="index.php" class="position-absolute text-white flex-0 retour">Retour</a>
<?php

  include 'header.php';

  require_once 'assets/config/bootstrap.php';
  
  $manager = new EventsManager($db);

  $events = $manager->getList();

  $userId = $_GET['user'];




//  Tous les events listé depuis la BDD


      foreach ($events as $key => $value) {
    ?>
      
      <div class="event-container w-75 m-3 d-flex flex-column justify-content-center align-items-center shadow card border-0">
        <h2 class="text-center m-5"><?php echo utf8_encode($value->title()) ?></h2>
        <p class="text-center "><?php echo utf8_encode($value->texte())?></p>
        <img class="w-50" src="<?php echo htmlspecialchars($value->imageUrl()) ?>">
        <a class="m-4" href="comment.php?event=<?php echo htmlspecialchars($value->id())?>&user=<?php echo htmlspecialchars($userId)?>">Commentaires</a>
      </div>


    <?php
      }
    ?>

</body>    