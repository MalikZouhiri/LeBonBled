<?php 
session_start();

if(!isset($_SESSION['login']))
{
include("Inclusion/gestion.php");
?>
	<html>
		<head>
			
			<meta http-equiv="content-type" content="text/html; charset=UTF-8"> 
			<meta charset="utf-8">
			<title>Publier votre annonce</title>
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
			<link href="Inclusion/footer.css" rel="stylesheet">
			
			<style type="text/css">
				body {  padding-top: 60px;
				}
			</style>
		</head>
		<body>
			<br>
			<p class="lead text-center">Pas connecté. Redirection dans 3 secondes. </p>
		</body>
		
	</html>
<?php
include("Inclusion/footer.php");
header("Refresh:3;url=./connexion.php");
}
else
{
	include ('configuration.php');
	$connexion = connexion();

	function upload($index,$destination,$maxsize,$extensions)
	{
	   //Test1: fichier correctement uploadé
		 if (!isset($_FILES[$index]) OR $_FILES[$index]['error'] > 0) return FALSE;
	   //Test2: taille limite
		 if ($maxsize !== FALSE AND $_FILES[$index]['size'] > $maxsize) return FALSE;
	   //Test3: extension
		 $ext = substr(strrchr($_FILES[$index]['name'],'.'),1);
		 if ($extensions !== FALSE AND !in_array($ext,$extensions)) return FALSE;
	   //Déplacement
		 return move_uploaded_file($_FILES[$index]['tmp_name'],$destination);
	}

	if (isset($_POST["ok"]))
	{
		$titre = $_POST['titre'];
		$prix = $_POST['prix'];
		$description = $_POST['description'];
		$login = $_SESSION['login'];
		
		$sql = "select max(id) from annonce";
		$result = mysqli_query($connexion,$sql);
		$idmax = mysqli_fetch_array($result);
		$bada = $idmax[0]+1;
		
		$strarray = explode("/",$_FILES['photo']['type']);
		$str = $strarray[1];
		$adr = "Image/$bada.$str";
		
		$upload = upload('photo',$adr,FALSE,array('png','bmp','jpg','jpeg'));
		if ($upload) "Upload de l'icone réussi!<br />";
		$truc = FALSE;
				
		$sql = "INSERT INTO annonce (titre, prix, description, proprietaire, photo) VALUES ('$titre', $prix, '$description', '$login', '$adr')";
		$result = mysqli_query($connexion,$sql)or die ("SA MARCHE PA ".mysqli_error($connexion)." ADR : ".$adr);
		
	}

	?>
	<!DOCTYPE html>
	<html>
		<head>
			
			<meta http-equiv="content-type" content="text/html; charset=UTF-8"> 
			<meta charset="utf-8">
			<title>Publier votre annonce</title>
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
			<link href="Inclusion/footer.css" rel="stylesheet">
			
			<style type="text/css">
				body {  padding-top: 60px;
				}
			</style>
		</head>
		<body>
			<?php
				include("Inclusion/gestion.php");
			?>
			
			<form action="" method="POST" enctype="multipart/form-data">
				<label for="titre"> Titre de l'annonce : <input type="text" name="titre"/></label><br>
				<label for="prix"> Prix : <input type="number" name="prix"/>€</label><br>
				<label for="description"> Description de l'annonce :<br>
				<textarea rows="10" cols="50" name="description"></textarea></label><br>
				<label for="image"><input type="file" name="photo"/> Formats acceptés : PNG, JPG, BMP</label><br>
				<label for="envoyer"><input type="submit" value="Envoyer l'annonce" name="ok" class="btn btn-success"></label>
			</form>
			
			<?php
				include("Inclusion/footer.php");
			?>
		</body>
	</html>
<?php
}
?>