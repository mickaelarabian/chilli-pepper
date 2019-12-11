<?php

require_once '../src/Renderer.php';
require_once '../src/Models/DAO/DAOCountry.php';

class PageController
{

    public function display()
    {
        echo Renderer::render('world.php');
    }

    public function search()
    {
        $DAOCountry = new DAOCountry(Singleton::getInstance()->cnx);
        $search = htmlspecialchars($_GET['search']);
        $countries = $DAOCountry->findbyNameStartingWith($search);
        $data = compact('countries', 'search');
        echo Renderer::render('search.php', $data);
    }

    public function notFound()
    {
        echo Renderer::render('notFound.php');
    }
}
