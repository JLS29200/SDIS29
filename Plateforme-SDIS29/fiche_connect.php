<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
	<head>
		<title>Connexion à son espace personnel - SDIS29</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link href="assets/CSS/style.css" rel="stylesheet" type="text/css" />
		<link rel="shortcut icon" href="images/logosdis29.gif" type="image/png" />
	</head>
	<body>
		<div id="container">
			<img class="logog" src="images/logo2.jpg" alt="Logo" width="91%"  height="72px"/>
			<img class="logod" src="images/logosdis29.gif" alt="Logo"  width="60px"  height="72px" />
			<div id="banner">
				<img src="images/main-image.jpg" alt="Main Image" />
			</div>
			<div id="nav">
				<?php include 'assets/affichages/menu.php'; ?>
			</div>
		</div>
		<div id="content">
			<div id="left">
				<form id="connexion" name="connexion" method="post" action="/assets/connexion/users-connect.php">
					<div class="login">
						<div class="logg">
							<label for="login"> Login  </label>
							<br>
							<br>
							<label for="mdp">Mot  de  passe </label>
						</div>
						<div class="logd">
							: 
							<input type="text" id="login" name="login" value="<?php echo $_GET['login'];?>" size="10">
							<br>
							<br>
							: 
							<input type="password" id="mdp" name="mdp" size="10" class="text" >
							<br/>
							<br/>
							<br/>
						</div>
						<div class="connexion">
							<input type="submit" value="Connexion" class="boutons" />
							<br/>
							<br/>
							<input type="checkbox" id="memo_connect" name="memo_connect" value="True"/>
							Se souvenir de moi.
							<br/>
							<br/>
							<!-- Affichage du message de connexion, mot de passe éronné, connexion refusée et déconnecté -->
							<?php
							     if(isset($_GET['message'])){
							         echo $_GET['message'];
							     }
							?>
						</div>
					</div>
				</form>
				<br/>
				<br/>
			</div>
			<div style="clear:both"></div>
		</div>
		<div id="footer">
			<?php include 'assets/affichages/footer.php'; ?>
		</div>
	</div>
</body>
</html>

