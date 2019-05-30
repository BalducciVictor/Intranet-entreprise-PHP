<?php
class CommentairesManager
{ 
  private $_db; // Instance de PDO

  public function __construct($db)
  {
    $this->setDb($db);
  }

  public function add(Commentaires $content)
  {
    $q = $this->_db->prepare('INSERT INTO commentaires(id, content, userId, eventId) VALUES(:id, :content, :userId, :eventId)');

    $q->bindValue(':id', $content->id());
    $q->bindValue(':content', $content->content(), PDO::PARAM_STR);
    $q->bindValue(':userId', $content->userId(), PDO::PARAM_INT);
    $q->bindValue(':eventId', $content->eventId(), PDO::PARAM_INT);

    $q->execute();
  }

  public function delete(Commentaires $content)
  {
    $this->_db->exec('DELETE FROM commentaires WHERE id = '.$content->id());
  }

  public function get($id)
  {
    $id = (int) $id;

    $q = $this->_db->query('SELECT id, content, userId, eventId FROM commentaires WHERE id = '.$id);
    $donnees = $q->fetch(PDO::FETCH_ASSOC);

    return new Commentaires($donnees);
  }

  public function getEventComs($event) {
    $content = [];
    $q = $this->_db->query('SELECT id, content, userId, eventId FROM commentaires WHERE eventId = '.$event);
    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {
      $content[] = new Commentaires($donnees);
    }

    return $content;
  }

  public function getList()
  {
    $content = [];

    $q = $this->_db->query('SELECT id, content, userId, eventId FROM commentaires ORDER BY id');

    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {
      $content[] = new Commentaires($donnees);
    }

    return $content;
  }

  public function update(Commentaires $content)
  {
    $q = $this->_db->prepare('UPDATE commentaires SET id = :id, content = :content, userId = :userId, eventId = :eventId WHERE id = :id');

    $q->bindValue(':id', $content->id(), PDO::PARAM_INT);
    $q->bindValue(':content', $content->content(), PDO::PARAM_STR);
    $q->bindValue(':userId', $content->userId(), PDO::PARAM_INT);
    $q->bindValue(':eventId', $content->eventId(), PDO::PARAM_INT);

    $q->execute();
  }

  public function getUserName($userId){
    $q = $this->_db->query('SELECT nom FROM users INNER JOIN commentaires ON users.id = commentaires.userId WHERE commentaires.userId ='.$userId);
    $donnees = $q->fetch(PDO::FETCH_ASSOC);
    return $donnees['nom'];
  }

  public function setDb(PDO $db)
  {
    $this->_db = $db;
  }
}