<?php
$city = $data['city'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>La ville de <?= $city->getName() ?></title>
</head>

<body>
    <?php require_once('../src/Views/header.php') ?>
    <div class="container">
        <div class="card bg-light mb-3 shadow-sm p-3 mb-5 rounded border-0">
            <div class="card-body">
                <h3><b>La ville de <?= $city->getName() ?></b></h3>
            </div>
            <div class="card-body">
                <h4 class="card-title mb-4"><b>Information sur la ville</b></h4>
                <p class="card-text">Département: <?= $city->getDistrict() ?></p>
                <p class="card-text">Population: <?= $city->getPopulation() ?> habitants</p>
            </div>
        </div>
    </div>
</body>

</html>