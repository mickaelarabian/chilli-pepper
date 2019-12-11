<?php

require_once '../src/Renderer.php';
require_once '../src/Models/DAO/DAOCountry.php';
require_once '../src/Models/DAO/DAOCountryLanguage.php';
require_once '../src/Models/DAO/DAOCity.php';
require_once '../src/Models/Entities/Country.php';

class CountryController
{

    public function display($id = null)
    {
        $DAOCountry = new DAOCountry(Singleton::getInstance()->cnx);
        $DAOCountryLanguage = new DAOCountryLanguage(Singleton::getInstance()->cnx);
        $DAOCity = new DAOCity(Singleton::getInstance()->cnx);
        $country = $DAOCountry->find($id);
        $languages = $DAOCountryLanguage->findFromCountry($country);
        $cities = $DAOCity->findFromCountry($country);
        $data = compact('country', 'languages', 'cities');
        echo Renderer::render('/country/country.php', $data);
    }

    public function displayFromContinent($name = null, $page = 1)
    {
        $DAOCountry = new DAOCountry(Singleton::getInstance()->cnx);
        $countries = $DAOCountry->findFromContinent($name);
        $page = htmlspecialchars($page);
        $data = compact('countries', 'page', 'name');
        echo Renderer::render('/country/countries.php', $data);
    }

    public function displayAll($page = 1)
    {
        $DAOCountry = new DAOCountry(Singleton::getInstance()->cnx);
        $countries = $DAOCountry->findAll();
        $result = $DAOCountry->count();
        $page = htmlspecialchars($page);
        $data = compact('countries', 'page', 'result');
        echo Renderer::render('/country/allCountries.php', $data);
    }

    public function displayUpdate($id)
    {
        if (!Auth::haspermission(Permission::CAN_UPDATE)) {
            header('Location: /country/show');
            exit;
        }
        $DAOCountry = new DAOCountry(Singleton::getInstance()->cnx);
        $country = $DAOCountry->find($id);
        $data = compact('country');
        echo Renderer::render('/country/update.php', $data);
    }

    public function actionUpdate($id)
    {
        if (!Auth::haspermission(Permission::CAN_UPDATE)) {
            header('Location: /country/show');
            exit;
        }
        $DAOCountry = new DAOCountry(Singleton::getInstance()->cnx);
        $country = $DAOCountry->find($id);
        $country->setCode(htmlspecialchars($_POST['code']));
        $country->setName(htmlspecialchars($_POST['name']));
        $country->setContinent(htmlspecialchars($_POST['continent']));
        $country->setRegion(htmlspecialchars($_POST['region']));
        $country->setSurfaceArea(htmlspecialchars($_POST['surfaceArea']));
        $country->setPopulation(htmlspecialchars($_POST['population']));
        $country->setLifeExpectancy(htmlspecialchars($_POST['lifeExpectancy']));
        $country->setLocalName(htmlspecialchars($_POST['localName']));
        $country->setGovernmentForm(htmlspecialchars($_POST['governmentForm']));
        $country->setHeadOfState(htmlspecialchars($_POST['headOfState']));
        $DAOCountry->update($country);
        header('Location: /country/show');
    }

    public function displayAdd()
    {
        if (!Auth::haspermission(Permission::CAN_CREATE)) {
            header('Location: /country/show');
            exit;
        }
        echo Renderer::render('/country/add.php');
    }

    public function actionAdd()
    {
        if (!Auth::haspermission(Permission::CAN_CREATE)) {
            header('Location: /country/show');
            exit;
        }
        $DAOCountry = new DAOCountry(Singleton::getInstance()->cnx);
        $country = new Country();
        $country->setCode(htmlspecialchars($_POST['code']));
        $country->setName(htmlspecialchars($_POST['name']));
        $country->setContinent(htmlspecialchars($_POST['continent']));
        $country->setRegion(htmlspecialchars($_POST['region']));
        $country->setSurfaceArea(htmlspecialchars($_POST['surfaceArea']));
        $country->setPopulation(htmlspecialchars($_POST['population']));
        $country->setLifeExpectancy(htmlspecialchars($_POST['lifeExpectancy']));
        $country->setLocalName(htmlspecialchars($_POST['localName']));
        $country->setGovernmentForm(htmlspecialchars($_POST['governmentForm']));
        $country->setHeadOfState(htmlspecialchars($_POST['headOfState']));
        $country->setCode2(htmlspecialchars($_POST['code2']));
        $DAOCountry->save($country);
        header('Location: /country/show');
    }

    public function actionDelete($id = null)
    {
        if (!Auth::haspermission(Permission::CAN_DELETE)) {
            header('Location: /country/show');
            exit;
        }
        $DAOCountry = new DAOCountry(Singleton::getInstance()->cnx);
        $DAOCity = new DAOCity(Singleton::getInstance()->cnx);
        $DAOCountryLanguage = new DAOCountryLanguage(Singleton::getInstance()->cnx);
        $country = $DAOCountry->find($id);
        $cities = $DAOCity->findFromCountry($country);
        foreach ($cities as $city) {
            $DAOCity->remove($city);
        }
        $countryLanguages = $DAOCountryLanguage->findFromCountry($country);
        foreach ($countryLanguages as $countryLanguage) {
            $DAOCountryLanguage->remove($countryLanguage);
        }
        $DAOCountry->remove($country);
        header('Location: /country/show');
    }
}
