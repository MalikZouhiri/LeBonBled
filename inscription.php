<?php
	if(isset($_SESSION['login']))
	{
		header('Location:index.php');
	}
?>
<!doctype html5>
<html>

	<head>
		<title>Page d'inscription</title>
	</head>
	
	<body>
		<center>
		<h1>Vous inscrire</h1>
		
		<form action="" method="post">
			<table>
			<tr>
				<th><input type="text" name="login" placeholder="Login"/></th>
			</tr>
			<tr>
				<th><input type="password" name="password" placeholder="Password"/></th>
			</tr>
			<tr>
				<th><input type="text" name="tel" placeholder="Telephone"/></th>
			</tr>
			<tr>
				<th><input type="text" name="mail" placeholder="Email"/></th>
			</tr>
			<tr>
				<th><input type="submit" name="Ok" /></th>
			</tr>
			</table>
		</form>
		
		
		<?php
			//TRAITEMENT INSCRIPTION
			if(isset($_POST['login']) && isset($_POST['password']) && isset($_POST['tel']) && isset($_POST['mail']) && isset($_POST['ok']))
			{
				if(!empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST['tel']) && !empty($_POST['mail']))
				{
					include("configuration.php");
					$connexion=connexion();
					$sql="SELECT COUNT(*) FROM utilisateur WHERE login=\"{$_POST['login']}\" and password=\"{$_POST['password']}\";";
					$requete=mysqli_query($connexion,$sql);// or die("probleme!");
					$result=mysqli_fetch_row($requete);
					if($result[0]==1)
					{
						session_start();
						$_SESSION['login']=$_POST['login'];
						header("Location:home.php");
						exit();
					}

				}
			}
	

		?>
		</center>
	</body>
</html>