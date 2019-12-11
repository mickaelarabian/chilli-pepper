<?php
$country = $data['country'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Mettre à jour le pays</title>
</head>

<body>
	<?php require_once('../src/Views/header.php') ?>
	<div class="container">
		<div class="row">
			<div class="col-6 mt-5" style="margin: auto;">
				<div class="card bg-light">
					<div class="card-header">
						<h3><b>Mettre à jour le pays <?= $country->getName() ?></b></h3>
					</div>
					<div class="card-body">
						<div class="row">
							<form class="col-12" method="POST" action="/country/update/<?= $country->getCountry_Id() ?>">
								<div class="form-group">
									<label for="inputAddress">Code du pays</label>
									<input type="text" class="form-control" name="code" placeholder="FRA" value="<?= $country->getCode() ?>">
								</div>
								<div class="form-group">
									<label for="inputAddress">Nom</label>
									<input type="text" class="form-control" name="name" placeholder="France" value="<?= $country->getName() ?>">
								</div>
								<div class="form-group">
									<label for="inputAddress">Continent</label>
									<input type="text" class="form-control" name="continent" placeholder="Europe" value="<?= $country->getContinent() ?>">
								</div>
								<div class="form-group">
									<label for="inputAddress">Region</label>
									<input type="text" class="form-control" name="region" placeholder="Auvergne" value="<?= $country->getRegion() ?>">
								</div>
								<div class="form-group">
									<label for="inputAddress">Surface</label>
									<input type="text" class="form-control" name="surfaceArea" placeholder="1542568" value="<?= $country->getSurfaceArea() ?>">
								</div>
								<div class="form-group">
									<label for="inputAddress">Population</label>
									<input type="text" class="form-control" name="population" placeholder="159859765" value="<?= $country->getPopulation() ?>">
								</div>
								<div class="form-group">
									<label for="inputAddress">Espérance de vie</label>
									<input type="text" class="form-control" name="lifeExpectancy" placeholder="88" value="<?= $country->getLifeExpectancy() ?>">
								</div>
								<div class="form-group">
									<label for="inputAddress">Nom local</label>
									<input type="text" class="form-control" name="localName" placeholder="159859765" value="<?= $country->getLocalName() ?>">
								</div>
								<div class="form-group">
									<label for="inputAddress">Forme de gouvernement</label>
									<input type="text" class="form-control" name="governmentForm" placeholder="159859765" value="<?= $country->getGovernmentForm() ?>">
								</div>
								<div class="form-group">
									<label for="inputAddress">Chef d'état</label>
									<input type="text" class="form-control" name="headOfState" placeholder="Emmanuel Macron" value="<?= $country->getHeadOfState() ?>">
								</div>
								<button type="submit" class="btn btn-primary">Mettre à jour</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>