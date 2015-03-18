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
		$description = mysql_real_escape_string($_POST['description']);
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
			<div class="container">
			<h2>Poster une annonce</h2>
  <form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
      <label for="titre">Titre de l'annonce :</label>
      <input type="titre" class="form-control" id="titre" name="titre" placeholder="Titre">
    </div>
    <div class="form-group">
      <label for="prix">Prix :</label>
      <input type="prix" class="form-control" id="prix" name="prix" placeholder="Prix">
    </div>
	<div class="form-group">
      <label for="description">Description de l'annonce </label>
      <textarea type="description" class="form-control" id="description" name="description" placeholder="Description"> </textarea>
    </div>
	<div class="form-group">
      <label for="image">Formats acceptés : PNG, JPG, BMP </label>
      <input type="file" class="" id="photo" name="photo" />
    </div>

    <input type="submit" class="btn btn-success" name="ok" value="Envoyer l'annonce" />
  </form>
</div>


			<?php
				include("Inclusion/footer.php");
			?>
		</body>
	</html>
<?php
}
?>