<?php

try {
  // instance PDO
  $db = new PDO (

    DB_SGBD . ':host=' . DB_HOST . ';dbname=' . DB_NAME . ';', // voir dans le fichier param.php
    DB_USER,
    DB_PASS,
    [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
    ]
  );
  
} catch (Exception $e) {

  die('Erreur de connection à la Base de Données: ' . $e -> getMessage());
}