<?php
include("config.php");
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
          <style>
      .hero {
        height: 300px;
      }
    </style>
</head>
<body>
  
</body>
</html>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-body-tertiary border-bottom">
  <div class="container">
    <a class="navbar-brand fw-bold" href="#">Reio Autod</a>
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
      <form class="d-flex" role="search" >
        
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"/>
        <button class="btn btn-outline-secondary" type="submit"><i class="bi bi-search"></i></button>
      </form>
    </div>
  </div>
</nav>
<!-- navbar -->
 <!-- hero-plokk -->
    <div class="container py-4">
      <div class="hero bg-body-tertiary p-4">
        <div class="row h-100">
          <div class="col-sm-6">
            <h1 class="fw-bold">Rendi<br>auto<br>soodsalt</h1>
            <p class="text-secondary">Lai valik autosid igaks olukorraks</p>
            <button class="btn btn-dark"> Vaata autosid</button>
          </div>
          <div class="col-sm-6">
        <img class="imgage-fluid h-100" src="https://picsum.photos/600/250" alt="autopilt">
          </div>
        </div>
        </div>
      </div>
    </div>

<?php
$paring = 'SELECT * FROM cars LIMIT 4'; 
$valjund = mysqli_query($yhendus, $paring);
 


?>

<!-- card -->
<div class="container">
  <div class="row g-4">
    <?php
while($rida = mysqli_fetch_row($valjund)){
    ?>
    <div class="col-sm-3">
      <div class="card" style="width: 18rem;">
  <img src="https://picsum.photos/600/350" class="card-img-top" alt="Auto">
  <div class="card-body">
    <div class="row">
  <h5>
    <?php
print_r($rida[1]. "<br>"); 
    ?>
</h5>
    <div class="col text-end"><i class="bi bi-suit-heart-fill"></i></div>
    </div>
    <p class="card-text text-secondary"><?php echo($rida[2]. "<br>") ?>
    <p class="card-text">
      Mootor:<?php echo($rida[3]. "<br>") ?> 
      Kütus: <?php echo($rida[4]. "<br>") ?>
      Hind: <?php echo($rida[5]. "<br>") ?>
      </p>
    <a href="#" class="btn btn-dark w-100">Rendi</a>
  </div>
</div>
    </div>
    <?php
}
    ?>
    <!-- card -->

  <ul class="pagination py-4 justify-content-center">
    <li class="page-item disabled"><span class="page-link link-dark border-secondary">Eelmine</span></li>
    <li class="page-item active"><span class="page-link bg-dark text-white border-dark">1</span></li>
    <li class="page-item"><a class="page-link link-dark border-secondary" href="#">2</a></li>
    <li class="page-item"><a class="page-link link-dark border-secondary" href="#">3</a></li>
    <li class="page-item"><a class="page-link link-dark border-secondary" href="#">Järgmine</a></li>
  </ul>
</nav>