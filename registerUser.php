<?php

function chargerClasse($class){
  require 'class/' .$class . '.php';
}

spl_autoload_register('chargerClasse');

$userName = $_POST['userName'];

echo $userName;

$db = new PDO('mysql:host=localhost;dbname=event_time','root','redactedredactedgolousisi94');

$manager = new UsersManager($db);

$allUsers = $manager->getList();


foreach ($allUsers as $key => $value) {
  if ($value->nom() == $userName) {
    header('Location: eventsView.php?user='.$value->id());
  }
}