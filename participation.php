<?php
 
class participation {

  private $_accepter;
  private $_refuser;
  private $_maybe;

  // Déclaration du constructeur

  public function __construct($data){
    $this->hydrate($data); // On appelle la fonction d'hydration dès l'instanciation de la classe
  }

  // Hydratation de l'objet

  public function hydrate(array $data){
    foreach ($data as $key => $value) { // Pour chaque objet du tableau data
      $method = 'set'.ucfirst($key); // Premier caractère en upperCase, method = setKey
      if (method_exists($this, $method)) { // Si la methode existe
        $this->$method($value); // On appelle la methode en lui passant la valeur du tableau data correspondant 
      }
    }
  }

  // Déclaration des getters

  public function accepter(){
    return $this->_accepter;
  }
  public function refuser(){
    return $this->_refuser;
  }
  public function maybe(){
    return $this->_maybe;
  }

  // Déclaration des setters

  public function setAccepter($accepter){
    $accepeter = (int) $accepter;
    if ($accepter > 0) {
      $this->_accepter = $accepter;
    }
  }
  public function setRefuser($refuser){
    if (is_string($refuser)) {
      $this->_refuser = $refuser;
    }
  }
  public function setMaybe($maybe){
    if (is_string($maybe)) {
      $this->_maybe = $maybe;
    }
  }
}