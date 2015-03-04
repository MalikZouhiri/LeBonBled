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
            body {  
			padding-top: 50px;
			}
			.form-signin {
			  max-width: 330px;
			  padding: 15px;
			  margin: 0 auto;
			}
			.form-signin .form-signin-heading,
			.form-signin .checkbox {
			  margin-bottom: 10px;
			}
			.form-signin .checkbox {
			  font-weight: normal;
			}
			.form-signin .form-control {
			  position: relative;
			  height: auto;
			  -webkit-box-sizing: border-box;
				 -moz-box-sizing: border-box;
					  box-sizing: border-box;
			  padding: 10px;
			  font-size: 16px;
			}
			.form-signin .form-control:focus {
			  z-index: 2;
			}
			.form-signin input[type="text"] {
			  margin-bottom: -1px;
			  border-bottom-right-radius: 0;
			  border-bottom-left-radius: 0;
			}
			.form-signin input[type="password"] {
			  margin-bottom: 10px;
			  border-top-left-radius: 0;
			  border-top-right-radius: 0;
			}
		</style>
    </head>   
    <body  >
<?php include("Inclusion/gestion.php"); ?>
    <div class="container">
      <form class="form-signin" action="" method="POST">
        <h2 class="form-signin-heading">Connectez vous</h2>
        <label for="inputNom" class="sr-only">Nom (pseudonyme)</label>
        <input type="text" required="required" class="form-control" name="inputnom" id="inputnom" placeholder="Pseudonyme" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" required="required" name="inputPassword" id="inputPassword" class="form-control" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block" name="ok" type="submit">Sign in</button>
      </form>
	  <?php
	if(isset($_POST['ok']))
	{
		$login=$_POST['inputnom'];
		$mdp=md5($_POST['inputPassword']);
		$connexion=mysql_connect("localhost","root","");
		$ok=mysql_select_db("test");
		$requete="SELECT * FROM utilisateurs WHERE nom ='$login' AND password ='$mdp'";
		$sql = mysql_query($requete) or die(mysql_error());
		if(mysql_num_rows($sql)==1)
		{
			session_start();
			$_SESSION['login'] = $login;
			header('Location:index.php');
		}
		else
		{
			echo '<center><font color="red">Nom d\'utilisateur et/ou mot de passe incorrecte.</font> </center>';
		}
	}
?>
    </div> <!-- /container -->
        
        <script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script type='text/javascript' src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
		<script type='text/javascript' src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.1/angular.min.js"></script>     
	 <?php include("Inclusion/footer.php"); ?>   
    </body>
</html>
