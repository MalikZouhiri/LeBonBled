<?php 
	session_start();
	if(!isset($_SESSION['login']))
	{
		header('Location:index.php'); 
	}
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
    <div class="text-center">
         <h1 class="">Annonces </h1>
		 	 <?php
			include ('configuration.php');
			$connexion = connexion();
			

			if(isset($_GET['id']))
			{
				$sql="SELECT * FROM annonce WHERE id={$_GET['id']}";
				$requete=mysqli_query($connexion, $sql);
			
				$result=mysqli_fetch_array($requete);
				
					
				echo "<h2>".$result['titre'].$result['prix']."</h2><br/>";
				echo "<i>Posté le ".$result['date_publication']."par ".$result['proprietaire']."</i><br/><br/>";
				echo '<img src="'.$result['photo'].'" width="200" height="200"/><br/><br/>';
				echo $result['description'];
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
