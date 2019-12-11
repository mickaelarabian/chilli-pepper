<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Inscription</title>
</head>

<body>
	<?php require_once('../src/Views/header.php') ?>
	<div class="container pt-5">
		<div class="col-6" style="margin:auto;">
			<div class="card bg-light mb-3 shadow-sm p-3 mb-5 rounded border-0">
				<div class="card-body">
					<h3><b>Inscrivez-vous</b></h3>
				</div>
				<div class="card-body">
					<form action="/user/signup" method="post">
						<div class="form-group">
							<label for="exampleInputEmail1">Name</label>
							<input type="text" class="form-control" name="name" aria-describedby="emailHelp" placeholder="Name" autofocus required>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Login</label>
							<input type="email" class="form-control" name="login" aria-describedby="emailHelp" placeholder="exemple@gmail.com" required>
							<small id="emailHelp" class="form-text text-muted">We'll never share your login with anyone else.</small>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Password</label>
							<input type="password" class="form-control" name="password" placeholder="Password" required>
						</div>
						<button type="submit" class="btn btn-primary">S'inscrire</button>
						<div class="text-right">
							<p>Déjà inscrit ? <a href="/user/login">Connectez-vous</a></p>
						</div>
					</form>
				</div>
			</div>
		</div>

	</div>
</body>

</html>