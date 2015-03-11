<?php
echo'
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="icon-bar"></span>
 <span class="icon-bar"></span>
 <span class="icon-bar"></span>

            </button> <a class="navbar-brand" href="index.php">LeBonBled</a>

        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a class="" href="index.php">Accueil</a>
                </li>
                <li><a class="" href="recherche.php">Recherche</a>
                </li>
                <li><a class="" href="publier.php">Publier une annonce</a>
                </li>';
				if(isset($_SESSION['login']))
				{
					if($_SESSION['login']=='admin'){
                        echo'<li><a class="" href="liste_inscrit.php">Panel Admin</a></li>
                        <li><a class="" href="deconexion.php">Deconnexion</a></li>';
                    }
                    else{
                        echo'<li><a class="" href="compte.php">Mon Compte</a></li>
                        <li><a class="" href="deconexion.php">Deconnexion</a></li>';
                    }
				}
				else
				{
				    echo'<li><a class="" href="inscription.php">Inscription</a></li>
					<li><a class="" href="connexion.php">Connexion</a></li>';
				}
			echo'
            </ul>
        </div>
        <!--/.nav-collapse -->
    </div>
</div>';
?>