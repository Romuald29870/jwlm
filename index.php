<?php

	require_once("auth.php");
	require_once("header.php");
	include("navbar.php");
	
	if(isset($_GET['ajoutAdresse']))
	{
	  require_once("ajoutAdresse.php");
	}
	elseif(isset($_GET['modifAdresse']))
	{
	  require_once("modifAdresse.php");
	}
	elseif(isset($_GET['editAdresse']))
	{
	  require_once("editAdresse.php");
	}
	elseif(isset($_GET['assignAdresse']))
	{
	  require_once("assignAdresse.php");
	}
	elseif(isset($_GET['imprimTerritoire']))
	{
	  require_once("territoires.php");
	}
	elseif(isset($_GET['carteTerritoires']))
	{
	  require_once("carte_territoires.php");
	}
	elseif(isset($_GET['carteLangues']))
	{
	  require_once("carte_langues.php");
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
    <script src="js/jquery.js"></script>
    <script>window.jQuery || document.write('<script src="/assets/js/vendor/jquery.js"><\/script>')</script>
    <script src="/assets/js/vendor/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
  </body>
</html>

