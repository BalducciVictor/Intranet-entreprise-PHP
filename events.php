<?php

class events {

    // Déclaration des attributs de la classe

    private $_id; 
    private $_title;
    private $_texte;
    private $_imageUrl;

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
    public function title(){
      return $this->_title;
    }
    public function texte(){
      return $this->_texte;
    }
    public function imageUrl(){
      return $this->_imageUrl;
    }

    // Déclaration des setters

    public function setId($id){
      $id = (int) $id;
      if ($id > 0) {
        $this->_id = $id;
      }
    }
    public function settitle($title){
      if (is_string($title)) {
        $this->_title = $title;
      }
    }
    public function settexte($texte){
      if (is_string($texte)) {
        $this->_texte = $texte;
      }
    }
    public function setImageUrl($url){
      if (is_string($url)) {
        $this->_imageUrl = $url;
      }
    }
}


