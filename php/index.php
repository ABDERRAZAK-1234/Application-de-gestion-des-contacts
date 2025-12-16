<?php 
  require "db.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Application-de-gestion-des-contacts</title>
</head>

<body>
  <nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand text-primary fs-3 fw-bold">CONNECT FLOW</a>
      <form class="d-flex justify-content-between">
        <a class="btn btn-outline-success" href="connexion.php" type="submit">Se connecter</a>
        <a href="sinscrire.php" type="button" class="btn btn-info ms-4">S’inscrire</a>
      </form>
    </div>
  </nav>
  <div>
    <div class="text-center ">
      <img src="../img/Online-connection-amico.svg" class="rounded w-25" alt="...">
    </div>
  </div>

</body>

</html>