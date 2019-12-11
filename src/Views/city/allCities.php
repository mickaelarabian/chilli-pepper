<?php
$cities = $data['cities'];
$page = $data['page'];
$result = $data['result'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Les villes du monde</title>
</head>

<body>
    <?php require_once('../src/Views/header.php') ?>
    <div class="container">
        <h1>Les villes du monde</h1>
        <p>[<?= $result ?> résultats]</p> Page <?= $page ?>
        <table class="table table-striped shadow-sm p-3 mb-5 bg-white rounded border-0">
            <thead class="bg-dark">
                <tr scope="row" style="color:rgba(255,255,255,.5);">
                    <th scope="col">Code</th>
                    <th scope="col">Nom</th>
                    <th scope="col">District</th>
                    <th scope="col">Population</th>
                    <th scope="col">
                        <?php
                        if (Auth::haspermission(Permission::CAN_CREATE)) { ?>
                            <a title="Ajouter une ville" href="/city/add"><i style="color:#17a2b8;" class="fas fa-plus"></i></a> <?php
                           } ?>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cities as $city) { ?>

                    <tr>
                        <th scope="row"><?= $city->getCountryCode() ?></th>
                        <td><a href="/city/details/<?= $city->getCity_Id() ?>"><?= $city->getName() ?></a></td>
                        <td><?= $city->getDistrict() ?></td>
                        <td><?= $city->getPopulation() ?></td>
                        <td>
                            <?php
                            if (Auth::haspermission(Permission::CAN_UPDATE)) { ?>
                                <a title="Modifier la ville" href="/city/update/<?= $city->getCity_Id() ?>"><i style="color: green;" class="fas fa-pen"></i></a> <?php
                            }
                            if (Auth::haspermission(Permission::CAN_DELETE)) { ?>
                                <a title="Supprimer la ville" href="/city/delete/<?= $city->getCity_Id() ?>"><i style="color:red;" class="fas fa-trash-alt"></i></a> <?php
                            } ?>
                        </td>
                    </tr>

                <?php } ?>

            </tbody>
        </table>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</body>

</html>