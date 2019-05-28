<?php

class commentaires {

    // Déclaration des attributs de la classe

    private $_id;
    private $_content;
    private $_userId;

    // Déclaration du constructeur

    public function __construct($data){
      $this->hydrate($data); // On appelle la fonction d'hydratation dès l'instanciation de la classe
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
    public function content(){
      return $this->_content;
    }
    public function userId(){
      return $this->_userId;
    }

    // Déclaration des setters

    public function setId($id){
      $id = (int) $id;
      if ($id > 0) {
        $this->_id = $id;
      }
    }
    public function setContent($content){
      if (is_string($content)) {
        $this->_content = $content;
      }
    }
    public function setUserId($userId){
      $userId = (int) $userId;
      if ($userId > 0) {
        $this->_userId = $userId;
      }
    }
}

?>

<form action="commentaires.php" method="post">
  <label for="comment">Ajouter un commentaire</label>
  <input type="text" name="comment" value="">
  <input type="submit" value="Valider">
</form>