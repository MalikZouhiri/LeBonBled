<?php session_start(); 
    if($_SESSION['login']!='admin'){
        header('Location:index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"> 
        <meta charset="utf-8">
        <title>LeBonBled: Liste des inscrits</title>
        <meta name="generator" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
        <link rel="shortcut icon" href="/bootstrap/img/favicon.ico">
        <link rel="apple-touch-icon" href="/bootstrap/img/apple-touch-icon.png">
        <link rel="apple-touch-icon" sizes="72x72" href="/bootstrap/img/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="114x114" href="/bootstrap/img/apple-touch-icon-114x114.png">
        <link href="Inclusion/footer.css" rel="stylesheet">
        
        <style type="text/css">
            body {  padding-top: 50px;}
        </style>
    </head>
    
    
    <body>      
<?php include("Inclusion/gestion.php"); ?>
<?php include("Inclusion/footer.php"); ?>   
<div class="container">
    <div class="text-center">
         <h1 class="">Consultation de la liste des inscrits </h1>
		 <center>
		 <?php
			include("configuration.php");
			$connexion=connexion();
			$sql="SELECT id,nom,tel,mail FROM utilisateurs";
			$requete=mysqli_query($connexion,$sql);
			echo "<br /> <br /><table class='table table-striped'><tr><td style='background-color:gray;padding-right:100px;border-right:1px solid white;'><p style='color:white'>Nom</p></td><td style='border-right:1px solid white;background-color:gray;padding-right:100px;'><p style='color:white'>Téléphone</p></td><td style='background-color:gray;padding-right:100px;border-right:1px solid white;'><p style='color:white'>Adresse mail</p></td><td align='center' style='background-color:gray;'><p style='color:red'>Supp.</p></td></tr>";
			while($data=mysqli_fetch_array($requete))
			{
				if($data[1]!='admin'){
                     echo "<tr><td>".$data[1]."</td><td>".$data[2]."</td><td>".$data[3]."</td><td align='center'><a href='liste_inscrit.php?id=".$data[0]."'><img src='Image/delete.png'/></a></tr>";
                }
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
<script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type='text/javascript' src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<script type='text/javascript' src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.1/angular.min.js"></script>      
    </body>
</html>
