<?php
require_once '../src/Models/Entities/City.php';
require_once '../src/Models/Entities/Country.php';
require_once '../src/Models/Singleton.php';

class DAOCity
{

    private $cnx;

    function __construct($cnx)
    {
        $this->cnx = $cnx;
    }

    /**
     * Renvoie une ville à partir de son id
     * @param String $id
     * @return City
     */
    public function find($id): City
    {
        $SQL = "SELECT * FROM city WHERE City_Id = :id";
        $preparedStatement = $this->cnx->prepare($SQL);
        $preparedStatement->bindValue("id", $id);
        $preparedStatement->execute();
        $city = $preparedStatement->fetchObject("City");
        return $city;
    }

    /**
     * Supprime les données de la ville par son id
     * @param City $city
     * @return Void
     */
    public function remove(City $city): void
    {
        $SQL = "DELETE FROM city WHERE City_Id = :id";
        $preparedStatement = $this->cnx->prepare($SQL);
        $preparedStatement->bindValue("id", $city->getCity_Id());
        $preparedStatement->execute();
    }

    /**
     * Insert une ville avec l'ensemble de ses données
     * @param City $city
     * @return Void
     */
    public function save(City $city): void
    {
        $SQL = "INSERT INTO city (Name, CountryCode, District, Population) VALUES (:Name, :CountryCode, :District, :Population)";
        $preparedStatement = $this->cnx->prepare($SQL);
        $preparedStatement->bindValue("Name", $city->getName());
        $preparedStatement->bindValue("CountryCode", $city->getCountryCode());
        $preparedStatement->bindValue("District", $city->getDistrict());
        $preparedStatement->bindValue("Population", $city->getPopulation());
        $preparedStatement->execute();
    }

    /**
     * Met à jour les données de la ville
     * @param City $city
     * @return Void
     */
    public function update(City $city): void
    {
        $SQL = "UPDATE city SET City_Id = :City_Id, Name = :Name, CountryCode = :CountryCode, District = :District, Population = :Population WHERE City_Id = :City_Id";
        $preparedStatement = $this->cnx->prepare($SQL);
        $preparedStatement->bindValue("City_Id", $city->getCity_Id());
        $preparedStatement->bindValue("Name", $city->getName());
        $preparedStatement->bindValue("CountryCode", $city->getCountryCode());
        $preparedStatement->bindValue("District", $city->getDistrict());
        $preparedStatement->bindValue("Population", $city->getPopulation());
        $preparedStatement->execute();
    }

    /**
     * Récupère toutes les infos de toutes les villes
     * @return Array
     */
    public function findAll(): array
    {
        $cities = [];
        $SQL = "SELECT * FROM city";
        $preparedStatement = $this->cnx->prepare($SQL);
        $preparedStatement->execute();
        while ($city = $preparedStatement->fetchObject("City")) {
            $cities[] = $city;
        }
        return $cities;
    }

    /**
     * Compte le nombre de résultat
     * @return Int $result
     */
    public function count(): int
    {
        $SQL = "SELECT COUNT(*) as nbr FROM city";
        $preparedStatement = $this->cnx->prepare($SQL);
        $preparedStatement->execute();
        $result = $preparedStatement->fetch();
        return $result['nbr'];
    }

    /**
     * Récupère toutes les villes d'un pays
     * @param Country $country
     * @return Array
     */
    public function findFromCountry(Country $country): array
    {
        $SQL = "SELECT * FROM city WHERE CountryCode = (SELECT Code FROM country WHERE Country_Id = :id)";
        $preparedStatement = $this->cnx->prepare($SQL);
        $preparedStatement->bindValue("id", $country->getCountry_Id());
        $preparedStatement->execute();
        while ($city = $preparedStatement->fetchObject("City")) {
            $cities[] = $city;
        }
        return $cities;
    }

    /**
     * Récupère toutes les filles qui ont ce nom
     * @param String $name
     * @return Array
     */
    public function findbyName(string $name): array
    {
        $SQL = "SELECT * FROM city WHERE Name = :name";
        $preparedStatement = $this->cnx->prepare($SQL);
        $preparedStatement->bindValue("name", $name);
        $preparedStatement->execute();
        while ($city = $preparedStatement->fetchObject("City")) {
            $cities[] = $city;
        }
        return $cities;
    }

    /**
     * Récupère toutes les villes qui commence par le paterne
     * @param String $pattern
     * @return Array
     */
    public function findbyNameStartingWith(string $pattern): array
    {
        $cities = [];
        $pattern = "$pattern%";
        $SQL = "SELECT * FROM city WHERE Name like :pattern";
        $preparedStatement = $this->cnx->prepare($SQL);
        $preparedStatement->bindValue("pattern", $pattern);
        $preparedStatement->execute();
        while ($city = $preparedStatement->fetchObject("City")) {
            $cities[] = $city;
        }
        return $cities;
    }
}
