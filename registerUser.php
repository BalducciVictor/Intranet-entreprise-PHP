<?php

function chargerClasse($class){
  require 'class/' .$class . '.php';
}

spl_autoload_register('chargerClasse');

$userName = $_POST['userName'];

<<<<<<< HEAD
echo $userName;

$db = new PDO('mysql:host=localhost:8889;dbname=event_time','root','root');
=======
$db = new PDO('mysql:host=localhost;dbname=event_time','root','redactedredactedgolousisi94');
>>>>>>> 4a281c3bbd0ad853aba9f381fc19a94aacf1ff47

$manager = new UsersManager($db);

$allUsers = $manager->getList();


foreach ($allUsers as $key => $value) {
  if ($value->nom() == $userName) {
    header('Location: eventsView.php?user='.$value->id());
  }
}

echo 'Vous n\'êtes pas enregistrés dans la base de donnée, demandez à l\'équipe technique de vous enregistrer'; 