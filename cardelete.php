<form method="GET">
        <?php
session_start();
if ($_SESSION['tuvastamine'] !== 'Admin') {
  header('Location: adminlogin.php');
  exit();
}

?>
<?php
require_once("config.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $paring = "DELETE FROM cars WHERE id = $id";
    $valjund = mysqli_query($yhendus, $paring);
}



?>
</form>