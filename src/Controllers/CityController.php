<?php

require_once '../src/Renderer.php';
require_once '../src/Models/DAO/DAOCity.php';
require_once '../src/Models/Entities/City.php';
require_once '../src/Models/Facade/Auth.php';

class CityController
{

    public function display($id = null)
    {
        $DAOCity = new DAOCity(Singleton::getInstance()->cnx);
        $city = $DAOCity->find($id);
        $data = compact('city');
        echo Renderer::render('/city/city.php', $data);
    }

    public function displayAll($page = 1)
    {
        $DAOCity = new DAOCity(Singleton::getInstance()->cnx);
        $result = $DAOCity->count();
        $page = htmlspecialchars($page);
        $cities = $DAOCity->findAll();
        $data = compact('cities', 'result', 'page');
        echo Renderer::render('/city/allCities.php', $data);
    }

    public function displayUpdate($id)
    {
        if (!Auth::haspermission(Permission::CAN_UPDATE)) {
            header('Location: /city/show');
            exit;
        }
        $DAOCity = new DAOCity(Singleton::getInstance()->cnx);
        $city = $DAOCity->find($id);
        $data = compact('city');
        echo Renderer::render('/city/update.php', $data);
    }

    public function actionUpdate($id)
    {
        if (!Auth::haspermission(Permission::CAN_UPDATE)) {
            header('Location: /city/show');
            exit;
        }
        $DAOCity = new DAOCity(Singleton::getInstance()->cnx);
        $city = $DAOCity->find($id);
        $city->setName(htmlspecialchars($_POST['nom']));
        $city->setCountryCode(htmlspecialchars($_POST['code']));
        $city->setDistrict(htmlspecialchars($_POST['district']));
        $city->setPopulation(htmlspecialchars($_POST['population']));
        $DAOCity->update($city);
        header('Location: /city/show');
    }

    public function displayAdd()
    {
        if (!Auth::haspermission(Permission::CAN_CREATE)) {
            header('Location: /city/show');
            exit;
        }
        $DAOCountry = new DAOCountry(Singleton::getInstance()->cnx);
        $countries = $DAOCountry->findAll();
        $data = compact('countries');
        echo Renderer::render('/city/add.php', $data);
    }

    public function actionAdd()
    {
        if (!Auth::haspermission(Permission::CAN_CREATE)) {
            header('Location: /city/show');
            exit;
        }
        $DAOCity = new DAOCity(Singleton::getInstance()->cnx);
        $city = new City();
        $city->setName(htmlspecialchars($_POST['nom']));
        $city->setCountryCode(htmlspecialchars($_POST['code']));
        $city->setDistrict(htmlspecialchars($_POST['district']));
        $city->setPopulation(htmlspecialchars($_POST['population']));
        $DAOCity->save($city);
        header('Location: /city/show');
    }

    public function actionDelete($id = null)
    {
        if (!Auth::haspermission(Permission::CAN_DELETE)) {
            header('Location: /city/show');
            exit;
        }
        $DAOCity = new DAOCity(Singleton::getInstance()->cnx);
        $city = $DAOCity->find($id);
        $DAOCity->remove($city);
        header('Location: /city/show');
    }
}
