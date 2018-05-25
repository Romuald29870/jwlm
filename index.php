<?php
	require_once("auth.php");
  	require_once("header.php");
  	include("navbar.php");


	if(isset($_GET['ajoutAdresse']))
	{
	  require_once("ajoutAdresse.php");
	}
	elseif(isset($_GET['supprAdresse']))
	{
	  echo "page en cours de construction";
	}
	elseif(isset($_GET['modifAdresse']))
	{
	  echo "page en cours de construction";
	}
	elseif(isset($_GET['territoires']))
	{
	  require_once("territoires.php");
	}
	elseif(isset($_GET['carte']))
	{
	  require_once("carte.php");
	}
	else
	{
	  echo "<h1>Bienvenue sur le site de gestion des adresses de Brest</h1>";
	}

?>

	</div class='row'>
		<div class='col-md-12'><div style='height:20px'></div></div>
	</div>
      

    </main><!-- /.container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="/assets/js/vendor/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
  </body>
</html>

