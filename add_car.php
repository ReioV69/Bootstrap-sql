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
<form action="add_car.php" method="POST" enctype="multipart/form-data">
<?php
include("config.php");
var_dump($_POST);
// if(!empty($_POST["mark"]) && !empty($_POST["model"]) && !empty($_POST["price"]) && !empty($_POST["engine"]) && !empty($_POST["fuel"]) && !empty($_POST["image"]) && !empty($_POST["year"]) && !empty($_POST["transmission"])&& !empty($_POST["seats"]) && !empty($_POST["description"]) && !empty($_POST["status"])){

if(!empty($_POST["mark"])){
    $mark = $_POST["mark"];
    $model = $_POST["model"];
    $price = $_POST["price"];
    $engine = $_POST["engine"];
    $fuel = $_POST["fuel"];
    $image = $_POST["image"];
    $year = $_POST["year"];
    $transmission = $_POST["transmission"];
    $seats = $_POST["seats"];
    $description = $_POST["description"];
    $status = $_POST["status"];


$paring = "INSERT INTO `cars`(mark, model, engine, fuel, price, image, year, transmission, seats, description, status) 
VALUES ('".$mark."', '".$model."', '".$engine."', '".$fuel."', '".$price."', '".$image."', '".$year."', '".$transmission."', '".$seats."', '".$description."','".$status."')";
var_dump($paring);
if($result = mysqli_query($yhendus, $paring)) {
  $result = 'Data saved';
   header('Location: admin.php');
} else {
  $result = 'No data saved';
}
$affected = mysqli_affected_rows($yhendus);
echo $result . '.'.'Affected rows:'. $affected;
  }
mysqli_close($yhendus);
?>


        <div class="d-grid btn-group  my-2 justify-content-md-end">
  <button onclick="window.location.href='index.php';"class="btn btn-outline-secondary me-4" type="button">Tagasi</button>
</div>
    <div class="row">
 


<div class="card">
<div class="container bordered-tertiary ">

<h4></h4>



<div class="row">


<div class="col-md-6 mb-3">
  <label class="form-label">Mark</label>
<input type="text" class="form-control" name="mark" required>
</div>


<div class="col-md-6 mb-3">
<label class="form-label">Mudel</label>
<input type="text" class="form-control" name="model" required>
</div>


<div class="col-md-6 mb-3">
<label class="form-label">Mootor</label>
<input type="text" class="form-control" name="engine" required>
</div>


<div class="col-md-6 mb-3">
<label class="form-label">Kütus</label>
<select class="form-select" name="fuel" required>
<option selected>Vali</option>
<option>Bensiin</option>
<option>Diisel</option>
<option>Hybrid</option>
<option>Electric</option>
</select>
</div>


<div class="col-md-6 mb-3">
<label class="form-label">Hind (€ / päev)</label>
<input type="number" class="form-control" name="price" required>
</div>
<div class="col-md-6 mb-3">
<label class="form-label">Aasta</label>
<input type="text" class="form-control" name="year" required>
</div>

<div class="col-md-6 mb-3">
<label class="form-label">Käigukast</label>
<select class="form-select" name="transmission" required>
<option selected>Vali</option>
<option>Automaat</option>
<option>Manuaal</option>
<option>CVT</option>
</select>
</div>

<div class="col-md-6 mb-3">
<label class="form-label">Istekohad</label>
<input type="number" min="1" max="8" class="form-control" name="seats" required>
</div>
<div class="col-md-6 mb-3">
<label class="form-label">Description</label>
<input type="text" class="form-control" name="descripiton" required>
</div>
<div class="col-md-6 mb-3">
<label class="form-label">status</label>
<select class="form-select" name="status" required>
<option selected>Vali</option>
<option>Vaba</option>
<option>Renditud</option>
<option>Hoolduses</option>
</select>
</div>
<div class="col-md-6 mb-3">
<label class="form-label">Auto pilt</label>
<input type="file" class="form-control"  name="image" required>
<small class="text-muted">Lubatud formaadid: JPG, PNG, WEBP</small>
</div>

</div>

<hr>
<form action="add_car.php" method="POST">
<input class="btn btn-dark my-2" type="Submit" name="insert" value="Insert">
<input class="btn btn-danger my-2" type="reset" value="Tühista">

</form>

</div>
</form>
</div>       
</html>