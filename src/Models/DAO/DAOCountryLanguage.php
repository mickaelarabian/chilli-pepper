<?php
require_once '../src/Models/Entities/CountryLanguage.php';
require_once '../src/Models/Singleton.php';

class DAOCountryLanguage
{

    private $cnx;
    function __construct($cnx)
    {
        $this->cnx = $cnx;
    }


    /**
     * Récupère toutes les infos sur une langue par son id
     * @param String $id
     * @return CountryLanguage
     */
    public function find($id): CountryLanguage
    {
        $SQL = "SELECT * FROM countrylanguage WHERE CountryLanguage_Id = :id";
        $preparedStatement = $this->cnx->prepare($SQL);
        $preparedStatement->bindValue("id", $id);
        $preparedStatement->execute();
        $language = $preparedStatement->fetchObject("CountryLanguage");
        return $language;
    }

    /**
     * Supprime une langue à partir de son id
     * @param CountryLanguage $countryLanguage
     */
    public function remove(CountryLanguage $countryLanguage) : void
    {
        $SQL = "DELETE FROM countrylanguage WHERE CountryLanguage_Id = :id";
        $preparedStatement = $this->cnx->prepare($SQL);
        $preparedStatement->bindValue("id", $countryLanguage->getCountryLanguage_Id());
        $preparedStatement->execute();
    }

    /**
     * Ajoute une langue
     * @param CountryLanguage $language
     */
    public function save(CountryLanguage $language) : void
    {
        $SQL = "INSERT INTO countrylanguage VALUES (:CountryCode, :Language, :IsOfficial, :Percentage)";
        $preparedStatement = $this->cnx->prepare($SQL);
        $preparedStatement->bindValue("CountryCode", $language->getCountryCode());
        $preparedStatement->bindValue("Language", $language->getLanguage());
        $preparedStatement->bindValue("IsOfficial", $language->getIsOfficial());
        $preparedStatement->bindValue("Percentage", $language->getPercentage());
        $preparedStatement->execute();
    }

    /**
     * Met à jour les données d'une langue
     * @param CountryLanguage $langue
     * @return Void
     */
    public function update(CountryLanguage $langue): void
    {
        $SQL = "UPDATE countrylanguage SET CountryLanguage_Id = :CountryLanguage_Id, CountryCode = :CountryCode, Language = :Language, IsOfficial = :IsOfficial, Percentage = :Percentage WHERE CountryLanguage_Id = :CountryLanguage_Id";
        $preparedStatement = $this->cnx->prepare($SQL);
        $preparedStatement->bindValue("CountryLanguage_Id", $langue->getCountryLanguage_Id());
        $preparedStatement->bindValue("CountryCode", $langue->getCountryCode());
        $preparedStatement->bindValue("Language", $langue->getLanguage());
        $preparedStatement->bindValue("IsOfficial", $langue->getIsOfficial());
        $preparedStatement->bindValue("Percentage", $langue->getPercentage());
        $preparedStatement->execute();
    }

    /**
     * Récupère les infos sur toutes les langues
     * @return Array
     */
    public function findAll(): array
    {
        $languages = [];
        $SQL = "SELECT * FROM countrylanguage";
        $preparedStatement = $this->cnx->prepare($SQL);
        $preparedStatement->execute();
        while ($language = $preparedStatement->fetchObject("Countrylanguage")) {
            $languages[] = $language;
        }
        return $languages;
    }

    /**
     * Retourne le nombre de résultat
     * @return Int $result
     */
    public function count(): int
    {
        $SQL = "SELECT COUNT(*) as nbr FROM countrylanguage";
        $preparedStatement = $this->cnx->prepare($SQL);
        $preparedStatement->execute();
        $result = $preparedStatement->fetch();
        return $result['nbr'];
    }

    /**
     * Retourne les langues d'un pays
     * @param Country $country
     * @return Array
     */
    public function findFromCountry(Country $country): array
    {
        $languages = [];
        $SQL = "SELECT * FROM countrylanguage WHERE CountryCode = (SELECT Code FROM country WHERE Country_Id = :id)";
        $preparedStatement = $this->cnx->prepare($SQL);
        $preparedStatement->bindValue("id", $country->getCountry_Id());
        $preparedStatement->execute();
        while ($language = $preparedStatement->fetchObject("CountryLanguage")) {
            $languages[] = $language;
        }
        return $languages;
    }

    /**
     * Récupère une langue à partir de son nom
     * @param String $language
     * @return CountryLanguage
     */
    public function findbyName(string $language): CountryLanguage
    {
        $SQL = "SELECT * FROM countrylanguage WHERE Language = :language";
        $preparedStatement = $this->cnx->prepare($SQL);
        $preparedStatement->bindValue("language", $language);
        $preparedStatement->execute();
        $language = $preparedStatement->fetchObject("CountryLanguage");
        return $language;
    }

    /**
     * Récupère toutes les langues qui commence par le paterne
     * @param String $pattern
     * @return Array
     */
    public function findbyNameStartingWith(string $pattern): array
    {
        $languages = [];
        $pattern = "$pattern%";
        $SQL = "SELECT * FROM countrylanguage WHERE Name like :pattern";
        $preparedStatement = $this->cnx->prepare($SQL);
        $preparedStatement->bindValue("pattern", $pattern);
        $preparedStatement->execute();
        while ($language = $preparedStatement->fetchObject("CountryLanguage")) {
            $languages[] = $language;
        }
        return $languages;
    }
}
