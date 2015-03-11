<style type="text/css">

.navbar-green {
    background-color: #16B84E;
    border-color: #16B84E;
}

.text-green {
    color: #ffffff;
}
</style>

<?php
echo'
<div class="navbar navbar-green navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="icon-bar"></span>
 <span class="icon-bar"></span>
 <span class="icon-bar"></span>
            </button> <a class="navbar-brand text-green" href="index.php">LeBonBled</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class=""><a class="text-green" href="index.php">Accueil</a>
                </li>
                <li><a class="text-green" href="recherche.php">Recherche</a>
                </li>
                <li><a class="text-green" href="publier.php">Publier une annonce</a>
                </li>';
				if(isset($_SESSION['login']))
				{
					if($_SESSION['login']=='admin'){
                        echo'<li><a class="text-green" href="liste_inscrit.php">Panel Admin</a></li>
                        <li><a class="text-green" href="deconexion.php">Deconnexion</a></li>';
                    }
                    else{
                        echo'<li><a class="text-green" href="compte.php">Mon Compte</a></li>
                        <li><a class="text-green" href="deconexion.php">Deconnexion</a></li>';
                    }
				}
				else
				{
				    echo'<li><a class="text-green" href="inscription.php">Inscription</a></li>
					<li><a class="text-green" href="connexion.php">Connexion</a></li>';
				}
			echo'
            </ul>
        </div>
        <!--/.nav-collapse -->
    </div>
</div>';
?>