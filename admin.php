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
<!-- menüü -->
  <nav class="navbar navbar-expand-lg bg-body-tertiary  border-bottom">
  <div class="container">
    <a class="navbar-brand fw-bold" href="#">Autorent admin</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Autod</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Reserveeringud</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Kasutajad</a>
        </li>

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
<h4>Autod</h4>
<h5>Halda autorendi autode nimekirja</h5>

        <div class="d-grid btn-group  my-2 justify-content-md-end">
  <a href="add_car.php" class="btn btn-dark me-4">Lisa auto</a>
</div>
    <div class="row">


<?php

$paring = 'SELECT * FROM cars'; 



$paring .= ' LIMIT 8';
$valjund = mysqli_query($yhendus, $paring);
// var_dump($valjund);

?>        
  <table class="table table-bordered">
  <thead>
    <tr class="border border-tertiary">
      <th scope="col"><strong>Pilt</strong></th>
      <th scope="col"><strong>Auto</strong></th>
      <th scope="col"><strong>Mootor</strong></th>
      <th scope="col"><strong>Kütus</strong></th>
      <th scope="col"><strong>Hind</strong></th>
      <th scope="col"><strong>Kirjeldus</strong></th>
      <th scope="col"><strong>Tegevused</strong></th>
    </tr>
  </thead>
  <tbody>
<?php
    while($rida = mysqli_fetch_row($valjund)){ 
     
    ?>
    <tr>
      <th scope="row"><img src="https://loremflickr.com/50/40/<?php echo $rida[1]; ?>" class="card-img-top" alt="auto"></th>
      <td><?php echo $rida[1]; ?></td>
      <td><?php echo $rida[3]; ?></td>
      <td><?php echo $rida[4]; ?></td>
      <td><?php echo $rida[5]; ?></td>
      <td style="max-width:150px;"><?php echo $rida[10];?></td>
      <td><div class="btn-group d-md-flex justify-content-md-center my-5  ">
  <button class="btn btn-outline-primary " type="button">Muuda</button>
<a onclick="return ConfirmDelete()" href="cardelete.php?id=<?php echo $rida[0]; ?>"  class="btn btn-outline-danger">Kustuta</a>
</div></td>
      
    </tr>
<?php
    }

?>
  </tbody>
</table>
</div>
</div>
</div>

<script>
  function ConfirmDelete()
{
  return confirm("Are you sure you want to delete?");
}
</script>
</html>