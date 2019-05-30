<?php
class EventsManager
{
  private $_db; // Instance de PDO

  public function __construct($db)
  {
    $this->setDb($db);
  }

  public function add(Events $events)
  {
    $q = $this->_db->prepare('INSERT INTO events(id, title, texte, imageUrl) VALUES(:id, :title, :texte, :imageUrl)');

    $q->bindValue(':id', $events->id());
    $q->bindValue(':title', $events->title(), PDO::PARAM_STR);
    $q->bindValue(':text', $events->text(), PDO::PARAM_STR);
    $q->bindValue(':imageUrl', $events->imageUrl(), PDO::PARAM_STR);

    $q->execute();
  }

  // All methods for the CRUD

  // This one is for delete

  public function delete(Events $events)
  {
    $this->_db->exec('DELETE FROM events WHERE id = '.$events->id());
  }

  // This one is for getting a single data 

  public function get($id)
  {
    $id = (int) $id;

    $q = $this->_db->query('SELECT id, title, texte, imageUrl FROM events WHERE id = '.$id);
    $donnees = $q->fetch(PDO::FETCH_ASSOC);

    return new Events($donnees);
  }

  // This one is for gettinf all data events

  public function getList()
  {
    $events = [];

    $q = $this->_db->query('SELECT id, title, texte, imageUrl FROM events ORDER BY id');

    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {
      $events[] = new Events($donnees);
    }

    return $events;
  }

  // This one is for Updating a sinlge data, selected by his ID

  public function update(Events $events)
  {
    $q = $this->_db->prepare('UPDATE events SET id = :id, title = :title, texte = :texte, imageUrl = :imageUrl WHERE id = :id');

    $q->bindValue(':id', $events->id(), PDO::PARAM_INT);
    $q->bindValue(':title', $events->title(), PDO::PARAM_STR);
    $q->bindValue(':texte', $events->texte(), PDO::PARAM_STR);
    $q->bindValue(':imageUrl', $events->imageUrl(), PDO::PARAM_STR);

    $q->execute();
  }

  // Set the PDO instance to the _db variable

  public function setDb(PDO $db)
  {
    $this->_db = $db;
  }
}

