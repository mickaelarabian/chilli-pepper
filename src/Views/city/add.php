<?php
$countries = $data['countries'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Ajouter une ville</title>
</head>

<body>
	<?php require_once('../src/Views/header.php') ?>
	<div class="container">
		<div class="row">
			<div class="col-6 mt-5" style="margin: auto;">
				<div class="card bg-light">
					<div class="card-header">
						<h3><b>Ajouter une ville</b></h3>
					</div>
					<div class="card-body">
						<div class="row">
							<form method="POST" action="/city/add" class="col-12">
								<div class="form-group">
									<label for="inputAddress">Nom</label>
									<input type="text" class="form-control" name="nom" placeholder="Lyon" required>
								</div>
								<div class="form-group">
									<label for="inputAddress">Code du pays</label>
									<select class="form-control" name="code" required>
										<?php
										foreach ($countries as $country) {
											?>
											<option value="<?= $country->getCode() ?>"><?= $country->getName() ?></option>
										<?php
										}
										?>
									</select>
								</div>
								<div class="form-group">
									<label for="inputAddress">District</label>
									<input type="text" class="form-control" name="district" placeholder="Rhône" required>
								</div>
								<div class="form-group">
									<label for="inputAddress">Population</label>
									<input type="text" class="form-control" name="population" placeholder="154255268" required>
								</div>
								<button type="submit" class="btn btn-primary">Ajouter la ville</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>