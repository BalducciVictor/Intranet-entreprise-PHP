<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>EvenTime</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>


  <?php

  include 'header.php';

  function chargerClasse($class){
    require $class . '.php';
  }

  spl_autoload_register('chargerClasse');




  ?>


  <ul class="w-12 p-2 card">
    <!-- Ici on va devoir boucler pour créer la liste des events depuis la base de données
          La boucle se fera dans le Manager de Events et on aura plus qu'a appeler la methode ici.
          On fera la même chose pour les commentaires de chaques events ensuite.
    -->
  <ul>
  
  </ul>

  





</body>
</html>


