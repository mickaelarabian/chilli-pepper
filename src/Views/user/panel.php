<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Panel - <?= $_SESSION['user_Name'] ?></title>
</head>

<body>
    <?php require_once('../src/Views/header.php') ?>
    <div class="container">
        <div class="card bg-light mb-3 shadow-sm p-3 mb-5 rounded border-0">
            <div class="card-body text-center">
                <h3><b>Bienvenue <?= $_SESSION['user_Name'] ?></b></h3>
            </div>
        </div>
    </div>
</body>

</html>