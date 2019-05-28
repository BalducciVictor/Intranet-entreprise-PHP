<?php
class ContentManager
{
  private $_db; // Instance de PDO

  public function __construct($db)
  {
    $this->setDb($db);
  }

  public function add(Content $content)
  {
    $q = $this->_db->prepare('INSERT INTO commentaires(id, content, userId) VALUES(:id, :content, :userId)');

    $q->bindValue(':id', $content->id());
    $q->bindValue(':content', $content->content(), PDO::PARAM_INT);
    $q->bindValue(':userId', $content->userId(), PDO::PARAM_INT);

    $q->execute();
  }

  public function delete(Content $content)
  {
    $this->_db->exec('DELETE FROM commentaires WHERE id = '.$content->id());
  }

  public function get($id)
  {
    $id = (int) $id;

    $q = $this->_db->query('SELECT id, content, userId FROM commentaires WHERE id = '.$id);
    $donnees = $q->fetch(PDO::FETCH_ASSOC);

    return new Content($donnees);
  }

  public function getList()
  {
    $content = [];

    $q = $this->_db->query('SELECT id, content, userId FROM commentaires ORDER BY content');

    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {
      $content[] = new Content($donnees);
    }

    return $content;
  }

  public function update(Content $content)
  {
    $q = $this->_db->prepare('UPDATE commentaires SET id = :id, content = :content, userId = :userId WHERE id = :id');

    $q->bindValue(':id', $content->id(), PDO::PARAM_INT);
    $q->bindValue(':content', $content->content(), PDO::PARAM_INT);
    $q->bindValue(':userId', $content->userId(), PDO::PARAM_INT);

    $q->execute();
  }
  public function setDb(PDO $db)
  {
    $this->_db = $db;
  }
}