<?php 

class Users {
  private $_id;
  private $_nom;

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

    public function id(){
      return $this->_id;
    }
    public function nom(){
      return $this->_nom;
    }


    // Déclaration des setters

    public function setId($id){
      $id = (int) $id;
      if ($id > 0) {
        $this->_id = $id;
      }
    }
    public function setNom($nom){
      if (is_string($nom)) {
        $this->_nom = $nom;
      }
    }
   
}