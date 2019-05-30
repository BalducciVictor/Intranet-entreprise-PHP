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
    require $class . '.php';
  }
  
  spl_autoload_register('chargerClasse');
  

  $db = new PDO('mysql:host=localhost;dbname=event_time','root','redactedredactedgolousisi94');

  $manager = new EventsManager($db);

  $events = $manager->getList();

  $userId = $_GET['user'];




//  Tous les events listé depuis la BDD


      foreach ($events as $key => $value) {
    ?>
      
      <div class="event-container w-75 bg-light m-3 d-flex flex-column justify-content-center align-items-center shadow card border-0">
        <h2 class="text-center m-5"><?php echo $value->title() ?></h2>
        <p class="text-center "><?php echo $value->texte() ?></p>
        <img class="w-50" src="<?php echo $value->imageUrl() ?>">
        <a href="comment.php?event=<?php echo $value->id()?>&user=<?php echo $userId?>">Commentaires</a>
      </div>


    <?php
      }
    ?>

</body>    