<?php
$country = $data['country'];
$languages = $data['languages'];
$cities = $data['cities'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $country->getName() ?></title>
</head>

<body>
    <?php require_once('../src/Views/header.php') ?>
    <div class="container">
        <div class="card bg-light mb-3 shadow-sm p-3 mb-5 rounded border-0">
            <div class="card-body">
                <h3><b><?= $country->getName() ?></b></h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <h4 class="card-title mb-4"><b>Information sur le pays</b></h4>
                        <p class="card-text"><b>Nom local:</b> <?= $country->getLocalName() ?></p>
                        <p class="card-text"><b>Code:</b> <?= $country->getCode() ?></p>
                        <p class="card-text"><b>Région:</b> <?= $country->getRegion() ?></p>
                        <p class="card-text"><b>Continent:</b> <?= $country->getContinent() ?></p>
                        <p class="card-text"><b>Superficie:</b> <?= $country->getSurfaceArea() ?> km²</p>
                        <p class="card-text"><b>Date d'indépendance:</b> <?= $country->getInDepYear() ?></p>
                        <p class="card-text"><b>Population:</b> <?= $country->getPopulation() ?> habitants</p>
                        <p class="card-text"><b>Espérance de vie:</b> <?= $country->getLifeExpectancy() ?> ans</p>
                        <p class="card-text"><b>Forme de gouvernement:</b> <?= $country->getGovernmentForm() ?></p>
                        <p class="card-text"><b>Chef de l'etat:</b> <?= $country->getHeadOfState() ?></p>
                    </div>
                    <div class="col-6">
                        <div class="col-12">
                        <h4 class="card-title mb-4"><b>Drapeau National</b></h4>
                            <img width="85%" src="<?= $country->getImage1() ?>" alt="">
                        </div>
                        <div class="col-12">
                            <a class="btn btn-primary btn-sm mt-5" href="/city/details/<?= $country->getCapital() ?>" role="button">Découvrir sa capitale</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card bg-light mb-3 shadow-sm p-3 mb-5 rounded border-0">
            <div class="card-body">
                <h5><b>Langues parlées par le pays</b></h5>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Langue</th>
                            <th scope="col">Officiel</th>
                            <th scope="col">Pourcentage</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($languages as $key => $language) { ?>
                            <tr>
                                <th scope="row"><?= $language->getCountryLanguage_Id() ?></th>
                                <td><?= $language->getLanguage() ?></td>
                                <td> <?php
                                            if ($language->getIsOfficial() == 'T') { ?>
                                        <span class="badge badge-primary">Officiel</span>
                                    <?php
                                        } else { ?>
                                        <span class="badge badge-secondary">Non Officiel</span>
                                    <?php } ?>

                                </td>
                                <td><?= $language->getPercentage() ?> %</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card bg-light mb-3 shadow-sm p-3 mb-5 rounded border-0">
            <div class="card-body">
                <h5><b>Les villes du pays</b></h5>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Code</th>
                            <th scope="col">Nom</th>
                            <th scope="col">District</th>
                            <th scope="col">Population</th>
                            <th scope="col"> <?php
                            if(Auth::haspermission(Permission::CAN_CREATE)){ ?>
                                <a title="Ajouter une ville" href="/city/add"><i style="color:#17a2b8;" class="fas fa-plus"></i></a> <?php
                            } ?>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($cities as $key => $city) { ?>
                            <tr>
                                <th scope="row"><?= $city->getCity_Id() ?></th>
                                <td><a href="/city/details/<?= $city->getCity_Id() ?>"><?= $city->getName() ?></a></td>
                                <td><?= $city->getDistrict() ?></td>
                                <td><?= $city->getPopulation() ?></td>
                                <td> <?php
                                if(Auth::haspermission(Permission::CAN_UPDATE)){ ?>
                                    <a title="Modifier la ville" href="/city/update/<?= $city->getCity_Id() ?>"><i style="color: green;"class="fas fa-pen"></i></a> <?php
                                }
                                    if(Auth::haspermission(Permission::CAN_DELETE)){ ?>
                                    <a title="Supprimer la ville" href="/city/delete/<?= $city->getCity_Id() ?>"><i style="color:red;" class="fas fa-trash-alt"></i></a> <?php
                                    } ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>