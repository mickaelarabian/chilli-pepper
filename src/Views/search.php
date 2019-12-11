<?php
$search = strtoupper($data['search']);
$contries = $data['countries'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Les pays començant par "<?= $search ?>"</title>
</head>

<body>
    <?php require_once('../src/Views/header.php') ?>
    <div class="container">
        <h1>Les pays començant par "<?= $search ?>"</h1>
        <table class="table table-striped shadow-sm p-3 mb-5 bg-white rounded border-0">
            <thead class="bg-dark">
                <tr scope="row" style="color:rgba(255,255,255,.5);">
                    <th scope="col">Id</th>
                    <th scope="col">Code</th>
                    <th scope="col">Drapeau</th>
                    <th class="col-1" scope="col">Nom</th>
                    <th scope="col">Region</th>
                    <th scope="col">Surface</th>
                    <th scope="col">Population</th>
                    <th scope="col"> <?php
                    if(Auth::haspermission(Permission::CAN_UPDATE)){ ?>
                        <a title="Ajouter un pays" href="/country/add"><i style="color:#17a2b8;" class="fas fa-plus"></i> <?php
                   } ?>
                   </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($contries as $key => $Country) { ?>

                    <tr>
                        <th scope="row"><?= $Country->getCountry_Id() ?></th>
                        <th scope="row"><?= $Country->getCode() ?></th>
                        <td><img width="30px" src="<?= $Country->getImage1() ?>" alt=""></td>
                        <td><a href="/country/details/<?= $Country->getCountry_Id() ?>"><?= $Country->getName() ?></a></td>
                        <td><?= $Country->getRegion() ?></td>
                        <td><?= $Country->getSurfaceArea() ?> km²</td>
                        <td><?= $Country->getPopulation() ?></td>
                        <td> <?php
                        if(Auth::haspermission(Permission::CAN_UPDATE)){ ?>
                            <a title="Modifier le pays" href="/country/update/<?= $Country->getCountry_Id() ?>"><i style="color: green;"class="fas fa-pen"></i></a> <?php
                        }
                        if(Auth::haspermission(Permission::CAN_DELETE)){ ?>
                            <a title="Supprimer le pays" href="/country/delete/<?= $Country->getCountry_Id() ?>"><i style="color:red;" class="fas fa-trash-alt"></i></a> <?php
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