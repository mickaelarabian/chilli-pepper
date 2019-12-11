<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Ajouter un pays</title>
</head>

<body>
	<?php require_once('../src/Views/header.php') ?>
	<div class="container">
		<div class="row">
			<div class="col-6 mt-5" style="margin: auto;">
				<div class="card bg-light">
					<div class="card-header">
						<h3><b>Ajouter un pays</b></h3>
					</div>
					<div class="card-body">
						<div class="row">
							<form class="col-12" method="post" action="/country/add">
								<div class="form-group">
									<label for="inputAddress">Code du pays</label>
									<input type="text" class="form-control" name="code" placeholder="FRA" minlength="3" maxlength="3" required>
								</div>
								<div class="form-group">
									<label for="inputAddress">Nom</label>
									<input type="text" class="form-control" name="name" placeholder="France" required>
								</div>
								<div class="form-group">
									<label for="inputAddress">Continent</label>
									<select class="form-control" name="continent" required>
										<option value="Asia">Asia</option>
										<option value="Europe">Europe</option>
										<option value="North America">North America</option>
										<option value="South America">South America</option>
										<option value="Africa">Africa</option>
										<option value="Antarctica">Antarctica</option>
										<option value="Oceania">Oceania</option>
									</select>
								</div>
								<div class="form-group">
									<label for="inputAddress">Region</label>
									<input type="text" class="form-control" name="region" placeholder="Europe" required>
								</div>
								<div class="form-group">
									<label for="inputAddress">Surface</label>
									<input type="text" class="form-control" name="surfaceArea" placeholder="154255268" required>
								</div>
								<div class="form-group">
									<label for="inputAddress">Population</label>
									<input type="text" class="form-control" name="population" placeholder="159859765" required>
								</div>
								<div class="form-group">
									<label for="inputAddress">Espérance de vie</label>
									<input type="text" class="form-control" name="lifeExpectancy" placeholder="87" required>
								</div>
								<div class="form-group">
									<label for="inputAddress">Nom local</label>
									<input type="text" class="form-control" name="localName" placeholder="159859765" required>
								</div>
								<div class="form-group">
									<label for="inputAddress">Forme de gouvernement</label>
									<input type="text" class="form-control" name="governmentForm" placeholder="159859765" required>
								</div>
								<div class="form-group">
									<label for="inputAddress">Chef d'état</label>
									<input type="text" class="form-control" name="headOfState" placeholder="Emmanuel Macron" required>
								</div>
								<div class="form-group">
									<label for="inputAddress">Code 2</label>
									<input type="text" class="form-control" name="code2" placeholder="FR" maxlength="2" minlength="2" required>
								</div>
								<button type="submit" class="btn btn-primary">Ajouter le pays</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>