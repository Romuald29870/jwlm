<?php

require_once("login.php");


if(isset($_POST['password']))
{	
	
	// Hachage du mot de passe
	$pass_hash = sha1($_POST['password']);
	$login = $_POST['login'];

	// Vérification des identifiants
	$query="SELECT id FROM user WHERE login = '$login' AND password = '$pass_hash'";

	$result = $conn->query($query) or die(mysql_error());
	$rows = mysqli_num_rows($result);

    if($rows==0)
    {
	    header('Location: connexion.php');
  		exit();
    }
	
	else
	{
    	session_start();
    	$_SESSION['login'] = $login;
    	header('Location: index.php');
  		exit();
	}
}

require_once("header.php");

?>

<body>
	<main role="main" class="container">
	<h2>JWLM-BREST</h2>
      <form class="form-signin" action="" method="post">
        <h3 class="form-signin-heading">Please sign in</h3>
        <label for="login" class="sr-only">Login</label>
        <input name="login" id="inputLogin" class="form-control" placeholder="Login" required="" autofocus="">
        <label for="inputPassword" class="sr-only">Password</label>
        <input name="password" id="inputPassword" class="form-control" placeholder="Password" required="" type="password">
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>
    </main>
</body>
</html>  

    