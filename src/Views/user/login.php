<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Connexion</title>
</head>

<body>
	<?php require_once('../src/Views/header.php') ?>
	<div class="container pt-5">
		<div class="col-6" style="margin:auto;">
			<div class="card bg-light mb-3 shadow-sm p-3 mb-5 rounded border-0">
				<div class="card-body">
					<h3><b>Connectez-vous</b></h3>
				</div>
				<div class="card-body">
					<form method="post" action="/user/login">
						<div class="form-group">
							<label for="exampleInputEmail1">Login</label>
							<input type="email" class="form-control" name="login" aria-describedby="emailHelp" placeholder="exemple@gmail.com" autofocus required>
							<small id="emailHelp" class="form-text text-muted">We'll never share your login with anyone else.</small>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Password</label>
							<input type="password" class="form-control" name="password" placeholder="Password" required>
						</div>
						<button type="submit" class="btn btn-primary">Se connecter</button>
						<div class="text-right">
							<p>Pas encore de compte ? <a href="/user/signup">Inscrivez-vous</a></p>
						</div>
					</form>
				</div>
			</div>
		</div>

	</div>
</body>

</html>