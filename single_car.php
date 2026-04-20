<!doctype html>
<html lang="et">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Auto</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<?php
include("config.php");
session_start();
$id = $_GET["id"];

// võta auto andmed
$paring = "SELECT * FROM cars WHERE id=$id";
$valjund = mysqli_query($yhendus, $paring);
$rida = mysqli_fetch_row($valjund);

// --- BRONEERIMINE ---
if(isset($_POST['rent'])){

    $user_id = $_SESSION['user_id'];
    $car_id = $_POST['car_id'];
    $algus = $_POST['date'];
    $lopp = $_POST['date1'];

    if($lopp < $algus){
        echo "<div class='alert alert-danger'>Vale kuupäev!</div>";
    } else {

        $price = $rida[5];

        $days = (strtotime($lopp) - strtotime($algus)) / (60*60*24);
        $days = max(1, $days);

        $total = $days * $price;

        $insert = "INSERT INTO Reservation
        (user_id, car_id, start_date, end_date, total_price, status)
        VALUES
        ('$user_id','$car_id','$algus','$lopp','$total','pending')";

        mysqli_query($yhendus, $insert);

        echo "<div class='alert alert-success'>Broneering tehtud! Hind: $total €</div>";
    }
}
?>
<body class="bg-light">

<div class="container my-5">

<div class="card shadow-sm">
<div class="row">

<div class="col-md-6 p-4">

<h3><?php echo $rida[1]; ?></h3>
<p class="text-muted"><?php echo $rida[2]; ?></p>

<ul>
<li>Mootor: <?php echo $rida[3]; ?></li>
<li>Kütus: <?php echo $rida[4]; ?></li>
<li>Käigukast: <?php echo $rida[8]; ?></li>
<li>Kohad: <?php echo $rida[9]; ?></li>
<li>Aasta: <?php echo $rida[7]; ?></li>
<li><?php echo $rida[10]; ?></li>
<li>Status: <?php echo $rida[11]; ?></li>
</ul>

<h4><?php echo $rida[5]; ?> €/päev</h4>

<form method="POST">

<input type="hidden" name="car_id" value="<?php echo $rida[0]; ?>">

<p>
<label>Algus kuupäev</label>
<input type="date" name="date" required>
</p>

<p>
<label>Lõpp kuupäev</label>
<input type="date" name="date1" required>
</p>

<button class="btn btn-dark w-100" type="submit" name="rent">
Rendi
</button>

</form>

</div>

<div class="col-md-6">
<img src="https://loremflickr.com/800/500/car" class="img-fluid">
</div>

</div>
</div>

</div>

</body>
</html>