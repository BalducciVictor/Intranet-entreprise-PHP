<?php
class EventManager
{
  private $_db; // Instance de PDO

  public function __construct($db)
  {
    $this->setDb($db);
  }

  public function add(Event $events)
  {
    $q = $this->_db->prepare('INSERT INTO events(id, title, texte, imageUrl) VALUES(:id, :title, :texte, :imageUrl)');

    $q->bindValue(':id', $events->id());
    $q->bindValue('title', $events->title(), PDO::PARAM_INT);
    $q->bindValue('text', $events->text(), PDO::PARAM_INT);
    $q->bindValue(':imageUrl', $events->imageUrl(), PDO::PARAM_INT);

    $q->execute();
  }

  public function delete(Event $events)
  {
    $this->_db->exec('DELETE FROM events WHERE id = '.$events->id());
  }

  public function get($id)
  {
    $id = (int) $id;

    $q = $this->_db->query('SELECT id, title, texte, imageUrl FROM events WHERE id = '.$id);
    $donnees = $q->fetch(PDO::FETCH_ASSOC);

    return new Event($donnees);
  }

  public function getList()
  {
    $events = [];

    $q = $this->_db->query('SELECT id, title, texte, imageUrl FROM events ORDER BY id');

    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {
      $events[] = new Event($donnees);
    }

    return $events;
  }

  public function update(Event $events)
  {
    $q = $this->_db->prepare('UPDATE events SET id = :id, title = :title, texte = :texte, imageUrl = :imageUrl WHERE id = :id');

    $q->bindValue(':id', $events->id(), PDO::PARAM_INT);
    $q->bindValue(':title', $events->title(), PDO::PARAM_INT);
    $q->bindValue(':texte', $events->texte(), PDO::PARAM_INT);
    $q->bindValue(':imageUrl', $events->imageUrl(), PDO::PARAM_INT);

    $q->execute();
  }
  public function setDb(PDO $db)
  {
    $this->_db = $db;
  }
}