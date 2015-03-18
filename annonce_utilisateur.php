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
        <title>LeBonBled: Gestion - Annonces</title>
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
<?php include("Inclusion/footer.php");
      include("configuration.php");
?>   
<?php
    if(isset($_GET['nom']) && isset($_GET['action']) && isset($_GET['id']) )
    {
        $nom= mysql_real_escape_string($_GET['nom']);
        $nom=trim($nom);
        if($_GET['action']=="pause"){
            $connexion2=connexion();
            $id= mysql_real_escape_string($_GET['id']);
            $id=trim($id);
            $sql2="UPDATE annonce SET active = '0' WHERE id=".$id;
            $requete2=mysqli_query($connexion2,$sql2);
            header("Refresh:0; url=annonce_utilisateur.php?nom=".$nom);        }       
        if($_GET['action']=="resume"){
            $connexion2=connexion();
            $id= mysql_real_escape_string($_GET['id']);
            $id=trim($id);
            $sql2="UPDATE annonce SET active = '1' WHERE id=".$id;
            $requete2=mysqli_query($connexion2,$sql2);
            header("Refresh:0; url=annonce_utilisateur.php?nom=".$nom);        }       
        if($_GET['action']=="supp"){
            $connexion2=connexion();
            $id= mysql_real_escape_string($_GET['id']);
            $id=trim($id);
            $sql2="DELETE FROM annonce WHERE id=".$id;
            $requete2=mysqli_query($connexion2,$sql2);
            header("Refresh:0; url=annonce_utilisateur.php?nom=".$nom);        }       
    }
?>  
<div class="container">
    <div class="text-center">
         <?php 
            $nom= mysql_real_escape_string($_GET['nom']);
            $nom=trim($nom);
         ?>
         <h1 class="">Annonces de <?php echo $nom; ?></h1>
		 <center>
		 <?php
			$connexion=connexion();
			$sql="SELECT * FROM annonce where proprietaire = '".$nom."'";
			$requete=mysqli_query($connexion,$sql);
			echo "<br /> <br />
            <table class='table table-striped'>
            <tr>
                <td style='background-color:gray;padding-right:100px;border-right:1px solid white;'>
                    <p style='color:white'>Titre</p></td><td style='border-right:1px solid white;background-color:gray;padding-right:100px;'>
                    <p style='color:white'>Date de Publication</p></td><td style='background-color:gray;padding-right:100px;border-right:1px solid white;'>
                    <p style='color:white'>Description</p></td><td align='center' style='background-color:gray;'>
                    <p style='color:red'>Actions</p></td>
                </td>
            </tr>";
			while($data=mysqli_fetch_array($requete))
			{
                     echo "<tr>
                     <td>".$data[1]."</td>
                     <td>".$data[3]."</td>
                     <td>".$data[4]."</td>
                     <td align='center'>";
                     if($data[7]==1){
                        echo "<a href='annonce_utilisateur.php?nom=".$nom."&action=pause&id=".$data[0]."'><img title='Desactiver annonce' src='Image/pause.gif'/></a>                        
                     ";}
                     if($data[7]==0){
                        echo "<a href='annonce_utilisateur.php?nom=".$nom."&action=resume&id=".$data[0]."'><img title='Activer l'annonce src='Image/play.png'/></a>
                     ";}
                     echo "<a href='annonce_utilisateur.php?nom=".$nom."&action=supp&id=".$data[0]."'><img title='Supprimer annonce' src='Image/delete.png'/></a></tr>";
			}
			echo "</table>";
		 ?>
		</center>
    </div>
</div>   
<script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type='text/javascript' src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<script type='text/javascript' src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.1/angular.min.js"></script>      
    </body>
</html>
