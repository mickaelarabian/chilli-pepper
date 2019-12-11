<?php
require_once '../src/Models/Facade/Auth.php';
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <a class="navbar-brand" href="/"><i class="fas fa-globe-americas"></i></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/country/show">Countries</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/city/show">Cities</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0 mr-5" action="/result/<?= $retVal = (isset($_GET['search'])) ? $_GET['search'] : null ; ?>" methode="get">
            <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search France, Fra, F" aria-label="Search">
            <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Search</button>
        </form>
        <form class="form-inline my-2 my-lg-0 ml-5">
            <?php
            if (Auth::isLogged()) {
                ?>
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/user/panel"><i class="fas fa-user"></i> <?=$_SESSION['user_Name']?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/user/logout">Deconnexion</a>
                    </li>
                </ul>
            <?php
            } else {
                ?>
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/user/login">Connexion</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/user/signup">Inscription</a>
                    </li>
                </ul>
            <?php
            }

            ?>
        </form>
    </div>
</nav>