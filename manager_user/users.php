<?php 

class User {
  private $_id;
  private $_nom;
  private $_prenom;

  
}

$db = new PDO('mysql:host=localhost;dbname=event_time', 'root', 'root');
$manager = new UsersManager($db);
