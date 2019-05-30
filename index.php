

<!-- header('Content-type: text/html; charset=utf-8'); -->

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>EvenTime</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Ramabhadra|Roboto&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/styleHome.css">
</head>
<body class="">

<?php
include 'header.php';
?>

<div class="form-connexion">
  <div class="form-methode">
    <form action="registerUser.php" method="post">
    <p class="">Connexion à EvenTime</p>
      <label for="username">Username</label>
      <input type="text" name="userName">
      <br>
      <input type="submit" value="Connexion">
    </form>
  </div>  
</div>

</body>
</html>


