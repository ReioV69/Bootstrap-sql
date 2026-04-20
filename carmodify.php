<?php include("config.php"); ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Autorent</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
      <style>
      .hero {
        height: 300px;
      }
    </style>
  </head>
  <body>
        <?php
session_start();
if ($_SESSION['tuvastamine'] !== 'Admin') {
  header('Location: adminlogin.php');
  exit();
}

?>
<form method="GET">
<?php 

if(isset($_GET["id"])){
    $id = $_GET['id'];
    $paring = "SELECT * FROM cars WHERE id=$id";
    $tulemus = mysqli_query($yhendus, $paring);
    $car = mysqli_fetch_assoc($tulemus);
}
  ?>
  
<!-- menüü -->
  <nav class="navbar navbar-expand-lg bg-body-tertiary  border-bottom">
  <div class="container">
    <a class="navbar-brand fw-bold" href="#">Autorent admin</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
      </ul>
<div class="d-grid gap-2  d-md-flex justify-content-md-end">
  <button class="btn btn-outline-secondary me-md-2" type="button">Logout</button>
</div>
    </div>
  </div>
</nav>

  </body>
  <div class="container my-3">
    <div class="row">
<h4>Lisa auto</h4>
<form action="carmodify.php" method="GET" enctype="multipart/form-data">
<?php

if(isset($_GET['id'])){
      $id = $_GET["id"];
      $mark = $_GET['mark'];
      $model = $_GET['model'];
      $engine = $_GET['engine'];
      $fuel = $_GET['fuel'];
      $price = $_GET['price'];
      $year = $_GET['year'];
      $transmission = $_GET['transmission'];
      $seats = $_GET['seats'];
      $description = $_GET['description'];
      $status = $_GET['status'];

      $paring = "UPDATE cars SET mark = '".$mark."', model = '".$model."', engine = '".$engine."', fuel = '".$fuel."', price = '".$price."', year = '".$year."', transmission = '".$transmission."', seats = '".$seats."', description = '".$description."', status = '".$status."' WHERE cars.id = ".$id."";

$valjund = mysqli_query($yhendus, $paring);
 $tulemus = mysqli_affected_rows($yhendus);
}
?>


        <div class="d-grid btn-group  my-2 justify-content-md-end">
  <button onclick="window.location.href='index.php';"class="btn btn-outline-secondary me-4" type="button">Tagasi</button>
</div>


    <div class="row">
 

<input type="hidden" name="id" value="<?=$car['id'];?>">
<div class="card">
<div class="container bordered-tertiary ">

<h4></h4>



<div class="row">

  

<div class="col-md-6 mb-3">
<label class="form-label">Mark</label>
<input type="text" class="form-control" id="mark" name="mark" value="<?=$car['mark'];  ?>" required>
</div>




<div class="col-md-6 mb-3">
<label class="form-label">Model</label>
<input type="text" class="form-control" id="model" name="model" value="<?=$car['model'];  ?>" required>
</div>


<div class="col-md-6 mb-3">
<label class="form-label">Mootor</label>
<input type="text" class="form-control" id="engine" name="engine" value="<?=$car['engine'];  ?>" required>
</div>


<div class="col-md-6 mb-3">
<label class="form-label">Fuel</label>
<select class="form-select" name="fuel" id="fuel" value="<?=$car['fuel'];  ?>" required>
<option selected>Vali</option>
<option>Bensiin</option>
<option>Diisel</option>
<option>Hybrid</option>
<option>Electric</option>
</select>
</div>


<div class="col-md-6 mb-3">
<label class="form-label">Hind (€ / päev)</label>
<input type="number" class="form-control" id="price" name="price" value="<?=$car['price'];  ?>" required>
</div>
<div class="col-md-6 mb-3">
<label class="form-label">Aasta</label>
<input type="number" class="form-control" id="year" name="year" value="<?=$car['year'];  ?>" required>
</div>

<div class="col-md-6 mb-3">
<label class="form-label">Käigukast</label>
<input type="text" name="transmission" id="transmission" value="<?=$car['transmission'];  ?>" required>
<option selected>Vali</option>
<option>Automaat</option>
<option>Manuaal</option>
<option>CVT</option>
</input>
</div>

<div class="col-md-6 mb-3">
<label class="form-label">Istekohad</label>
<input type="number" min="1" max="8" id="seats" class="form-control" name="seats" value="<?=$car['seats'];  ?>" required>
</div>
<div class="col-md-6 mb-3">
<label class="form-label">Description</label>
<input type="text" class="form-control"  id="description" name="description"  value="<?=$car['description'];  ?>" required>
</div>
<div class="col-md-6 mb-3">
<label class="form-label">status</label>
<input type="text" name="status" id="status" value="<?=$car['status'];  ?> " required>

<option>vaba</option>
<option>hoolduses</option>
<option>rendidud</option>

</input>
</div>
<div class="col-md-6 mb-3">
<label class="form-label">Auto pilt</label>
<input type="file" class="form-control" id="image" name="image" value="<?=$car['image'];  ?>" required>
<small class="text-muted">Lubatud formaadid: JPG, PNG, WEBP</small>
</div>

</div>

<hr>

<input class="btn btn-dark my-2" type="submit" class="btn btn-success" value="Salvesta">
<input class="btn btn-danger my-2" type="reset" value="Tühista">


</div>
</form>
</div>       
</html>