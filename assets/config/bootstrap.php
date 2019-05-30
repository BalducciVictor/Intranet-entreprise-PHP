<?php

require_once __DIR__ . '/param.php';

require_once __DIR__ . '/bdd.php';

// autoLoad permettant de charger les classes à chaque besoins 

function chargerClasse($class){
  require 'class/' .$class . '.php';
}

spl_autoload_register('chargerClasse');
