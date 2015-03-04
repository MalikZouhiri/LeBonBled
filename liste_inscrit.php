<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"> 
        <meta charset="utf-8">
        <title>LeBonBled: Liste des inscrits</title>
        <meta name="generator" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
        
        <!--[if lt IE 9]>
          <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <link rel="shortcut icon" href="/bootstrap/img/favicon.ico">
        <link rel="apple-touch-icon" href="/bootstrap/img/apple-touch-icon.png">
        <link rel="apple-touch-icon" sizes="72x72" href="/bootstrap/img/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="114x114" href="/bootstrap/img/apple-touch-icon-114x114.png">
        
        <style type="text/css">
            body {  padding-top: 50px;}
        </style>
    </head>
    
    
    <body  >      
<?php include("Inclusion/gestion.php"); ?>
<div class="container">
    <div class="text-center">
         <h1 class="">Consultation de la liste des inscrits </h1>
		 <center>
		 <?php
			include("configuration.php");
			$connexion=connexion();
			$sql="SELECT id,nom,tel,mail FROM utilisateurs";
			$requete=mysqli_query($connexion,$sql);
			echo "<table><tr><td style='background-color:gray;padding-right:100px;border-right:1px solid white;'>Nom</td><td style='border-right:1px solid white;background-color:gray;padding-right:100px;'>Téléphone</td><td style='background-color:gray;padding-right:100px;'>Adresse mail</td></tr>";
			while($data=mysqli_fetch_array($requete))
			{
				echo "<tr><td>".$data[1]."</td><td>".$data[2]."</td><td>".$data[3]."</td><td><a href='liste_inscrit.php?id=".$data[0]."'><img src='Image/delete.png'/></a></tr>";
			}
			echo "</table>";
		 ?>
		</center>
    </div>
</div>

<?php
	if(isset($_GET['id']))
	{
		$connexion2=connexion();
		$sql2="DELETE FROM utilisateurs WHERE id=".$_GET['id'];
		$requete2=mysqli_query($connexion2,$sql2);
		header('Location:liste_inscrit.php');
		
	}
?>
<!-- /.container -->
        
        <script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>


        <script type='text/javascript' src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>



<script type='text/javascript' src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.1/angular.min.js"></script>
        
    </body>
</html>
