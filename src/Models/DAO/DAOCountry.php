<?php
require_once '../src/Models/Entities/Country.php';
require_once '../src/Models/Singleton.php';

class DAOCountry
{

    private $cnx;
    function __construct($cnx)
    {
        $this->cnx = $cnx;
    }

    /**
     * renvoie un pays à partir de son id
     * @param $id
     * @return Country
     */
    public function find($id): Country
    {
        $SQL = "SELECT * FROM country WHERE Country_Id = :id";
        $preparedStatement = $this->cnx->prepare($SQL);
        $preparedStatement->bindValue("id", $id);
        $preparedStatement->execute();
        $country = $preparedStatement->fetchObject("Country");
        return $country;
    }

    /**
     * Supprime un pays à partir de son id
     * @param Country $country
     * @return Void
     */
    public function remove(Country $country) : void
    {
        $SQL = "DELETE FROM country WHERE Country_Id = :id";
        $preparedStatement = $this->cnx->prepare($SQL);
        $preparedStatement->bindValue("id", $country->getCountry_Id());
        $preparedStatement->execute();
    }

    /**
     * Ajoute un pays
     * @param Country $country
     * @return Void
     */
    public function save(Country $country) : void
    {
        $SQL = "INSERT INTO country (Code, Name, Continent, Region, SurfaceArea, IndepYear, Population, LifeExpectancy, GNP, GNPOld, LocalName, GovernmentForm, HeadOfState, Capital, Code2, Image1, Image2) VALUES (:Code, :Name, :Continent, :Region, :SurfaceArea, :IndepYear, :Population, :LifeExpectancy, :GNP, :GNPOld, :LocalName, :GovernmentForm, :HeadOfState, :Capital, :Code2, :Image1, :Image2)";
        $preparedStatement = $this->cnx->prepare($SQL);
        $preparedStatement->bindValue("Code", $country->getCode());
        $preparedStatement->bindValue("Name", $country->getName());
        $preparedStatement->bindValue("Continent", $country->getContinent());
        $preparedStatement->bindValue("Region", $country->getRegion());
        $preparedStatement->bindValue("SurfaceArea", $country->getSurfaceArea());
        $preparedStatement->bindValue("IndepYear", $country->getInDepYear());
        $preparedStatement->bindValue("Population", $country->getPopulation());
        $preparedStatement->bindValue("LifeExpectancy", $country->getLifeExpectancy());
        $preparedStatement->bindValue("GNP", $country->getGNP());
        $preparedStatement->bindValue("GNPOld", $country->getGNPOld());
        $preparedStatement->bindValue("LocalName", $country->getLocalName());
        $preparedStatement->bindValue("GovernmentForm", $country->getGovernmentForm());
        $preparedStatement->bindValue("HeadOfState", $country->getHeadOfState());
        $preparedStatement->bindValue("Capital", $country->getCapital());
        $preparedStatement->bindValue("Code2", $country->getCode2());
        $preparedStatement->bindValue("Image1", $country->getImage1());
        $preparedStatement->bindValue("Image2", $country->getImage2());
        $preparedStatement->execute();
    }

    /**
     * Met a jour un pays a partir de son id
     * @param Country $country
     * @return Void
     */
    public function update(Country $country): void
    {
        $SQL = "UPDATE country SET Country_Id = :Country_Id, Code = :Code, Name = :Name, Continent = :Continent, Region = :Region, SurfaceArea = :SurfaceArea, IndepYear = :IndepYear, Population = :Population, LifeExpectancy = :LifeExpectancy, GNP = :GNP, GNPOld = :GNPOld, LocalName = :LocalName, GovernmentForm = :GovernmentForm, HeadOfState = :HeadOfState, Capital = :Capital, Code2 = :Code2, Image1 = :Image1, Image2 = :Image2 WHERE Country_Id = :Country_Id";
        $preparedStatement = $this->cnx->prepare($SQL);
        $preparedStatement->bindValue("Country_Id", $country->getCountry_Id());
        $preparedStatement->bindValue("Code", $country->getCode());
        $preparedStatement->bindValue("Name", $country->getName());
        $preparedStatement->bindValue("Continent", $country->getContinent());
        $preparedStatement->bindValue("Region", $country->getRegion());
        $preparedStatement->bindValue("SurfaceArea", $country->getSurfaceArea());
        $preparedStatement->bindValue("IndepYear", $country->getInDepYear());
        $preparedStatement->bindValue("Population", $country->getPopulation());
        $preparedStatement->bindValue("LifeExpectancy", $country->getLifeExpectancy());
        $preparedStatement->bindValue("GNP", $country->getGNP());
        $preparedStatement->bindValue("GNPOld", $country->getGNPOld());
        $preparedStatement->bindValue("LocalName", $country->getLocalName());
        $preparedStatement->bindValue("GovernmentForm", $country->getGovernmentForm());
        $preparedStatement->bindValue("HeadOfState", $country->getHeadOfState());
        $preparedStatement->bindValue("Capital", $country->getCapital());
        $preparedStatement->bindValue("Code2", $country->getCode2());
        $preparedStatement->bindValue("Image1", $country->getImage1());
        $preparedStatement->bindValue("Image2", $country->getImage2());
        $preparedStatement->execute();
    }

    /**
     * Affiche toutes les informations sur tout les pays
     * @return array
     */
    public function findAll(): array
    {
        $countries = [];
        $SQL = "SELECT * FROM country";
        $preparedStatement = $this->cnx->prepare($SQL);
        $preparedStatement->execute();
        while ($country = $preparedStatement->fetchObject("Country")) {
            $countries[] = $country;
        }
        return $countries;
    }

    /**
     * Compte le nombre de résultats
     * @return Int
     */
    public function count(): int
    {
        $SQL = "SELECT COUNT(*) as nbr FROM country";
        $preparedStatement = $this->cnx->prepare($SQL);
        $preparedStatement->execute();
        $result = $preparedStatement->fetch();
        return $result['nbr'];
    }

    /**
     * Récupère le pays d'une ville
     * @param String $code
     * @return Country
     */
    public function findFromCodeIso(string $code): Country
    {
        $SQL = "SELECT * FROM country WHERE code2 = :code";
        $preparedStatement = $this->cnx->prepare($SQL);
        $preparedStatement->bindValue("code", $code);
        $preparedStatement->execute();
        $country = $preparedStatement->fetchObject("Country");
        return $country;
    }

    /**
     * Récupère un pays à partir de son nom
     * @param String $name
     * @return Country
     */
    public function findbyName(string $name): Country
    {
        $SQL = "SELECT * FROM country WHERE Name = :name";
        $preparedStatement = $this->cnx->prepare($SQL);
        $preparedStatement->bindValue("name", $name);
        $preparedStatement->execute();
        $country = $preparedStatement->fetchObject("Country");
        return $country;
    }

    /**
     * Récupère tous les pays du continent
     * @param String $name
     * @return Array
     */
    public function findFromContinent(string $name): array
    {
        $SQL = "SELECT * FROM country WHERE Continent = :name";
        $preparedStatement = $this->cnx->prepare($SQL);
        $preparedStatement->bindValue("name", $name);
        $preparedStatement->execute();
        while ($country = $preparedStatement->fetchObject("Country")) {
            $countries[] = $country;
        }
        return $countries;
    }

    /**
     * Récupère tous les pays qui commence par $pattern
     * @param String $pattern
     * @return Array
     */
    public function findbyNameStartingWith(string $pattern): array
    {
        $countries = [];
        $pattern = "$pattern%";
        $SQL = "SELECT * FROM country WHERE Name like :pattern";
        $preparedStatement = $this->cnx->prepare($SQL);
        $preparedStatement->bindValue("pattern", $pattern);
        $preparedStatement->execute();
        while ($country = $preparedStatement->fetchObject("Country")) {
            $countries[] = $country;
        }
        return $countries;
    }
}
