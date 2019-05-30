

<!-- header('Content-type: text/html; charset=utf-8'); -->

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>EvenTime</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
</head>
<body class="d-flex flex-column align-items-center">


  <?php

  include 'header.php';

  



  ?>



  <form action="registerUser.php" method="post" class="conect-form card p-5">
    <div class="form-group">
      <label for="username">Username</label>
      <input type="text" name="userName" class="form-control">
    </div>

    <br>

    <input type="submit" value="Valider" class="btn btn-primary mb-2">
  </form>





</body>
</html>


