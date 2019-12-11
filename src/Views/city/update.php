<?php
$city = $data['city'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Mettre à jour la ville <?= $city->getName() ?></title>
</head>

<body>
	<?php require_once('../src/Views/header.php') ?>
	<div class="container">
		<div class="row">
			<div class="col-6 mt-5" style="margin: auto;">
				<div class="card bg-light">
					<div class="card-header">
						<h3><b>Mettre à jour la ville <?= $city->getName() ?></b></h3>
					</div>
					<div class="card-body">
						<div class="row">
							<form class="col-12" method="POST" action="/city/update/<?= $city->getCity_Id() ?>">
								<div class="form-group">
									<label for="inputAddress">Nom</label>
									<input type="text" class="form-control" name="nom" placeholder="France" value="<?= $city->getName() ?>">
								</div>
								<div class="form-group">
									<label for="inputAddress">Code du pays</label>
									<input type="text" class="form-control" name="code" placeholder="FRA" value="<?= $city->getCountryCode() ?>">
								</div>
								<div class="form-group">
									<label for="inputAddress">District</label>
									<input type="text" class="form-control" name="district" placeholder="Rhône" value="<?= $city->getDistrict() ?>">
								</div>
								<div class="form-group">
									<label for="inputAddress">Population</label>
									<input type="text" class="form-control" name="population" placeholder="154255268" value="<?= $city->getPopulation() ?>">
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