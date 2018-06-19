	<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="#">JWLM</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href=".">Home <span class="sr-only">(current)</span></a>
          </li>
        	<li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Adresses</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="?ajoutAdresse">Ajouter</a>
              <a class="dropdown-item" href="?modifAdresse">Modifier/Suprimer</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?territoires">Territoires</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?carte">Cartes linguistiques</a>
          </li>         
        </ul>
        <img src="/img/avatar.png" width="42"/>
        <span class="navbar-text">
    		<?php echo $_SESSION['login']."&nbsp;"?>
  		</span>
        <a class="navbar-text" href="deconnexion.php" style='text-decoration: underline'>déconnexion</a>
      </div>
    </nav>
