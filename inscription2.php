<?php
	if(isset($_SESSION['login']))
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
        
        <!--[if lt IE 9]>
          <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <link rel="shortcut icon" href="/bootstrap/img/favicon.ico">
        <link rel="apple-touch-icon" href="/bootstrap/img/apple-touch-icon.png">
        <link rel="apple-touch-icon" sizes="72x72" href="/bootstrap/img/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="114x114" href="/bootstrap/img/apple-touch-icon-114x114.png">
        
        <style type="text/css">
            body {  
			padding-top: 50px;
			background-color: #525252;
			}
			.centered-form{
				margin-top: 60px;
			}

<<<<<<< HEAD
	<head>
		<title>Page d'inscription</title>
	</head>
	
	<body>
		<center>
		<h1>Vous inscrire</h1>
		<?php
			$i=1;
			if($i==1)
			{
		?>
		<form action="" method="post">
			<table>
			<tr>
				<th><input type="text" id="login" placeholder="Login"/></th>
			</tr>
			<tr>
				<th><input type="password" id="password" placeholder="Password"/></th>
			</tr>
			<tr>
				<th><input type="text" id="tel" placeholder="Telephone"/></th>
			</tr>
			<tr>
				<th><input type="text" id="mail" placeholder="Email"/></th>
			</tr>
			<tr>
				<th><input type="submit" id="Ok" /></th>
			</tr>
			</table>
		</form>
		<?php
			}
		?>
=======
			.centered-form .panel{
				background: rgba(255, 255, 255, 0.8);
				box-shadow: rgba(0, 0, 0, 0.3) 20px 20px 20px;
			}
		</style>
    </head>
    
    
    <body>
<?php include("Inclusion/gestion.php"); ?>
  
<div class="container">
        <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
        	<div class="panel panel-default">
        		<div class="panel-heading">
			    		<h3 class="panel-title">Inscrivez vous sur LeBonBled <small> C'est gratuit !</small></h3>
			 			</div>
			 			<div class="panel-body">
			    		<form action="" methode="POST">
			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			                <input type="text" name="login" id="login" class="form-control input-sm" placeholder="Login"/>
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="text" name="tel" id="tel" class="form-control input-sm" placeholder="Téléphone"/>
			    					</div>
			    				</div>
			    			</div>

			    			<div class="form-group">
			    				<input type="email" name="mail" id="mail" class="form-control input-sm" placeholder="Adresse email"/>
			    			</div>

			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="password" name="password" id="password" class="form-control input-sm" placeholder="Password"/>
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="password" name="password_2" id="password_2" class="form-control input-sm" placeholder="Confirmer Password"/>
			    					</div>
			    				</div>
			    			</div>
			    			
			    			<input type="submit" value="S'inscrire" class="btn btn-info btn-block"/>
			    		
			    		</form>
			    	</div>
	    		</div>
    		</div>
    	</div>
    </div>
<!-- /.container -->        
        <script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>


        <script type='text/javascript' src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>



<script type='text/javascript' src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.1/angular.min.js"></script>
		
		<?php
			//TRAITEMENT INSCRIPTION
			if(1)
			{
				if(!empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST['tel']) && !empty($_POST['mail']))
				{
					include("configuration.php");
					$mdp1=$_POST['password'];
					$mdp2=$_POST['password_2'];
					if($mdp1!=$mdp2)
					{
						echo "<p style='color:red;'>Les deux mots de passe doivent être identiques";
					}
					else
					{
					$connexion=connexion($_POST['password']);
					$password_md5=md5($_POST['password']);
					$sql="INSERT INTO utilisateurs(nom,tel,password,mail) VALUE('{$_POST['login']}','{$_POST['tel']}','{$password_md5}','{$_POST['mail']}')";
					$requete=mysqli_query($connexion,$sql) or die("Ay problème requète!"+ mysql_error());
					$i=0;
					echo "Merci de votre inscription ".$_POST['login'];
					}
				}
				else
				{
					echo "<p style='color:red;'>Tout les champs doivent être saisis";
				}
			}
			else
			{
				echo "Ay problème !!!!!";
			}
		?>
	</body>
</html>