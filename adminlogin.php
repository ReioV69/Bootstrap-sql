<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://phptutorial.net/app/css/style.css">
    <title>Login</title>
</head>
<body>

 <?php
 include('config.php');
 
	session_start();
    if($_SERVER["REQUEST_METHOD"] == "POST"){
	
    if ($rida[1] == "Admin") {
	  header('Location: admin.php');
	  }
      else{
        header('Location: index.php');
      }
	  //kontrollime kas väljad on täidetud
	if (!empty($_POST['email']) && !empty($_POST['password_hash'])) {
	
    //eemaldame kasutaja sisestusest kahtlase pahna
		$login = htmlspecialchars(trim($_POST['email']));
		$password_hash = htmlspecialchars(trim($_POST['password_hash']));
		//SIIA UUS KONTROLL
		$sool = 'taiestisuvalinetekst';
		$kryp = crypt($password_hash, $sool);

		//kontrollime kas andmebaasis on selline kasutaja ja parool
		$paring = "SELECT * FROM users WHERE email='$login' AND password_hash='$password_hash'";
		$valjund = mysqli_query($yhendus, $paring);
        $rida = mysqli_fetch_row($valjund);
        $pass2 =$rida[6];
        $hashed_password = password_verify($password_hash, $pass2);
        var_dump($hashed_password);
        var_dump($rida);
		//kui on, siis loome sessiooni ja suuname
		if (mysqli_num_rows($valjund)==1) {
			$_SESSION['tuvastamine'] = $rida[1];
			header('Location: admin.php');
		} else {
			echo "kasutaja või parool on vale";
		}
	}
    }
 ?>

<main>
    <form method="post">
        <h1>Login</h1>
        <div>
            <input type="text" name="email">
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" name="password_hash">
        </div>
        <section>
            <button type="submit">Login</button>
            <a href="register.php">Register</a>
        </section>
    </form>
</main>
</body>

</html>