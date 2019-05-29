<?php 

function chargerClasse($class){
  require $class . '.php';
}


spl_autoload_register('chargerClasse');

// Loop over the comments list, with event parameter



$db = new PDO('mysql:host=localhost;dbname=event_time','root','redactedredactedgolousisi94');
$manager = new CommentairesManager($db);

$eventId = $_GET['event'];
$commentaires = $manager->getEventComs($eventId);

foreach ($commentaires as $key => $value) {
  echo $value->content();
}

?>


<form action="sendComment.php?event=<?php echo $eventId?>" method="post">
  <label for="comment">Ajouter un commentaire</label>
  <input type="text" name="comment">
  <input type="submit" value="Envoyer">
</form>


<?php