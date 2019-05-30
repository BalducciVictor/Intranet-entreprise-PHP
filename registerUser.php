<?php

require_once 'assets/config/bootstrap.php';

$userName = $_POST['userName'];

$manager = new UsersManager($db);

$allUsers = $manager->getList();


foreach ($allUsers as $key => $value) {
  if ($value->nom() == $userName) {
    header('Location: eventsView.php?user='.$value->id());
  }
}

echo 'Vous n\'êtes pas enregistrés dans la base de donnée, demandez à l\'équipe technique de vous enregistrer'; 