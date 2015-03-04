<?php 
include ('configuration.php');
$connexion = connexion();

function upload($index,$destination,$maxsize=FALSE,$extensions=FALSE)
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
	//$titre = $_POST['titre'];
	
	echo $titre;
	echo $prix;
	echo $description;
	$sql = "select max(id) from annonce";
	$result = mysqli_query($connexion,$sql);
	$idmax = mysqli_fetch_array($data);
	$bada = $idmax[0]+1;
	
	$upload = upload('photo','Image/'.$bada.'.jpg',2048,array('png','bmp','jpg','jpeg'));
	if ($upload) "Upload de l'icone réussi!<br />";
	
	echo"Image/".$bada.'.jpg';
	
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
				<input type="textarea" name="description"/></label><br>
			<label for="photo"><input type="file" name="photo"/> Formats acceptés : PNG, JPG, BMP</label><br>
			<label for="envoyer"><input type="submit" value="Envoyer l'annonce" name="ok"></label>
		</form>
		
		<?php
			include("Inclusion/footer.php");
		?>
	</body>
</html>
