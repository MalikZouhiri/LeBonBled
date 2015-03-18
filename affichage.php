<?php 
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"> 
        <meta charset="utf-8">
        <title>LeBonBled</title>
        <meta name="generator" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
		<link href="Inclusion/footer.css" rel="stylesheet">
        
        <!--[if lt IE 9]>
          <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <link rel="shortcut icon" href="/bootstrap/img/favicon.ico">
        <link rel="apple-touch-icon" href="/bootstrap/img/apple-touch-icon.png">
        <link rel="apple-touch-icon" sizes="72x72" href="/bootstrap/img/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="114x114" href="/bootstrap/img/apple-touch-icon-114x114.png">
        
        <style type="text/css">
            body {  padding-top: 50px;
			}
        </style>
    </head>

    
    <body  >      
<?php include("Inclusion/gestion.php"); ?>
<div class="container">
    <div class="row">
         <h1 class="">Annonce</h1>
		 	 <?php
			include ('configuration.php');
			$connexion = connexion();
			

			if(isset($_GET['id']))
			{
				// Données de l'annonce
				
				echo "<div class=\"col-md-10\" text-center>";
				$sql="SELECT * FROM annonce WHERE id={$_GET['id']}";
				$requete=mysqli_query($connexion, $sql);
				$result=mysqli_fetch_array($requete);
				
				
				echo "<h2>".$result['titre']."\t".$result['prix']."&euro;</h2><br/>";
				echo "<i>Posté le ".$result['date_publication']." par ".$result['proprietaire']."</i><br/><br/>";
				echo '<img src="'.$result['photo'].'" width="200" height="200"/><br/><br/>';
				echo $result['description'];
				
				echo "</div>";
				
				
				// Coordonnées du propriétaire
				echo "<div class=\"col-md-2\">";
				
				
				echo "<h2> Coordonnées du propriétaire </h2><br><br>";
				$nom = $result['proprietaire'];
				$sql2 = "SELECT * from utilisateurs where nom = '$nom'";
				$requete2 = mysqli_query($connexion, $sql2);
				$result2=mysqli_fetch_array($requete2);
				$pseudo = $result2['nom'];
				$mail = $result2['mail'];
				$tel = $result2['tel'] ;
				echo "Utilisateur : $pseudo<br>";
				echo "Mail : $mail <br>";
				echo "Tél : $tel <br>";
				echo"</div>";
				
			}
			?>
    </div>
</div>
<!-- /.container -->
        
        <script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>


        <script type='text/javascript' src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>



<script type='text/javascript' src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.1/angular.min.js"></script>
 <?php include("Inclusion/footer.php"); ?>          
    </body>
</html>
