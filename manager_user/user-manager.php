<?php
class UsersManager
{
  private $_db; // Instance de PDO

  public function __construct($db)
  {
    $this->setDb($db);
  }

  public function add(Users $user)
  {
    $q = $this->_db->prepare('INSERT INTO users(id, nom, prenom) VALUES(:id, :nom, :prenom)');

    $q->bindValue(':id', $user->id());
    $q->bindValue(':nom', $user->nom(), PDO::PARAM_INT);
    $q->bindValue(':prenom', $user->prenom(), PDO::PARAM_INT);

    $q->execute();
  }

  public function delete(Users $user)
  {
    $this->_db->exec('DELETE FROM users WHERE id = '.$user->id());
  }

  public function get($id)
  {
    $id = (int) $id;

    $q = $this->_db->query('SELECT id, nom, prenom FROM users WHERE id = '.$id);
    $donnees = $q->fetch(PDO::FETCH_ASSOC);

    return new Users($donnees);
  }

  public function getList()
  {
    $user = [];

    $q = $this->_db->query('SELECT id, nom, prenom FROM users ORDER BY nom');

    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {
      $user[] = new Users($donnees);
    }

    return $user;
  }

  public function update(Users $user)
  {
    $q = $this->_db->prepare('UPDATE users SET id = :id, nom = :nom, prenom = :prenom WHERE id = :id');

    $q->bindValue(':id', $user->id(), PDO::PARAM_INT);
    $q->bindValue(':nom', $user->nom(), PDO::PARAM_INT);
    $q->bindValue(':prenom', $user->prenom(), PDO::PARAM_INT);

    $q->execute();
  }
  public function setDb(PDO $db)
  {
    $this->_db = $db;
  }
}