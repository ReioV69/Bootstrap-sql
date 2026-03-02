<!doctype html>
<html lang="et">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Auto d</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg bg-body-tertiary  border-bottom">
  <div class="container">
    <a class="navbar-brand fw-bold" href="#">Autorent</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Avaleht</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Autod</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Hinnad</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Kontakt</a>
        </li>

      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Otsi..." aria-label="Search" name="search">
        <button class="btn btn-outline-secondary" type="submit"><i class="bi bi-search"></i></button>
      </form>
    </div>
  </div>
</nav>

<!-- SISU -->
 <?php
 require_once "config.php";
$id = $_GET["id"];
  $paring = 'SELECT * FROM cars WHERE id='.$id.' ';
  $valjund = mysqli_query($yhendus, $paring);
  $rida = mysqli_fetch_row($valjund); 

?>
<div class="container my-5">

 <div class="card shadow-sm">
  <div class="row g-0">

    <!-- Info -->
    <div class="col-md-6">
      <div class="card-body p-4">

        <h3><?php echo($rida[1]. "<br>")  ?></h3>
        <p class="text-muted mb-4"><?php echo($rida[2]. "<br>")  ?></p>

        <ul class="list-unstyled mb-4">
          <li><strong>Mootor: <?php echo $rida[3]; ?></strong></li>
          <li><strong>Kütus:<?php echo $rida[4]; ?></strong></li>
          <li><strong>Käigukast:<?php echo $rida[8]; ?></strong></li>
          <li><strong>Kohad:</strong> 5</li>
        </ul>

        <h4 class="mb-3">269 € / päev</h4>
        <button class="btn btn-dark w-100">Rendi</button>

      </div>
    </div>
    <!-- Pilt -->
    <div class="col-md-6">
      <img src="https://loremflickr.com/800/500/audi"
           class="img-fluid h-100 object-fit-cover rounded-start"
           alt="Auto pilt">
    </div>

  </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>