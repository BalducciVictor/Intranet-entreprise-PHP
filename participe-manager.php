<?php
class ParticipationManager
{
  private $_db; // Instance de PDO

  public function __construct($db)
  {
    $this->setDb($db);
  }

  public function add(Participation $participe)
  {
    $q = $this->_db->prepare('INSERT INTO participation (id, accepter, refuser, maybe) VALUES(:id, :accepter, :refuser, :maybe)');

    $q->bindValue(':id', $participe->id());
    $q->bindValue(':accepter', $participe->accepter(), PDO::PARAM_BOOL);
    $q->bindValue(':refuser', $participe->refuser(), PDO::PARAM_BOOL);
    $q->bindValue(':maybe', $participe->maybe(), PDO::PARAM_BOOL);

    $q->execute();
  }

  public function delete(Participation $participe)
  {
    $this->_db->exec('DELETE FROM participation WHERE id = '.$participe->id());
  }

  public function get($id)
  {
    $id = (int) $id;

    $q = $this->_db->query('SELECT id, accepter, refuser, maybe FROM participation WHERE id = '.$id);
    $donnees = $q->fetch(PDO::FETCH_ASSOC);

    return new Participation($donnees);
  }

  public function getList()
  {
    $participe = [];

    $q = $this->_db->query('SELECT id, title, texte, imageUrl FROM participation ORDER BY id');

    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {
      $participe[] = new Event($donnees);
    }

    return $participe;
  }

  public function update(Event $participe)
  {
    $q = $this->_db->prepare('UPDATE participation SET id = :id, accepter = :accepter, refuser = :refuser, maybe = :maybe WHERE id = :id');

    $q->bindValue(':id', $participe->id(), PDO::PARAM_INT);
    $q->bindValue(':accepter', $participe->accepter(), PDO::PARAM_BOOL);
    $q->bindValue(':refuser', $participe->refuser(), PDO::PARAM_BOOL);
    $q->bindValue(':maybe', $participe->maybe(), PDO::PARAM_BOOL);

    $q->execute();
  }
  public function setDb(PDO $db)
  {
    $this->_db = $db;
  }
}