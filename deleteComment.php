
<?php

// Chargement des classes si besoin

function chargerClasse($class){
  require './class/' .$class . '.php';
}

spl_autoload_register('chargerClasse');

/////




