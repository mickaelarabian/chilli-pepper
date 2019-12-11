<?php
require_once '../src/Models/Entities/User.php';
require_once '../src/Models/Entities/Role.php';
require_once '../src/Models/Singleton.php';

class DAOUser
{

    private $cnx;

    function __construct($cnx)
    {
        $this->cnx = $cnx;
    }

    /**
     * Renvoie un user à partir de son id
     * @param String $id
     * @return User
     */
    public function find($id): User
    {
        $SQL = "SELECT * FROM user WHERE User_Id = :id";
        $preparedStatement = $this->cnx->prepare($SQL);
        $preparedStatement->bindValue("id", $id);
        $preparedStatement->execute();
        $user = $preparedStatement->fetchObject("User");
        return $user;
    }

    /**
     * Supprime les données d'un user par son id
     * @param User $user
     * @return Void
     */
    public function remove(User $user): void
    {
        $SQL = "DELETE FROM user WHERE User_Id = :id";
        $preparedStatement = $this->cnx->prepare($SQL);
        $preparedStatement->bindValue("id", $user->getUser_Id());
        $preparedStatement->execute();
    }

    /**
     * Insert un user avec l'ensemble de ses données
     * @param User $user
     * @return Void
     */
    public function save(User $user): void
    {
        $SQL = "INSERT INTO user (Name, Login, Password) VALUES (:Name, :Login, :Password)";
        $preparedStatement = $this->cnx->prepare($SQL);
        $preparedStatement->bindValue("Name", $user->getName());
        $preparedStatement->bindValue("Login", $user->getLogin());
        $preparedStatement->bindValue("Password", $user->getPassword());
        $preparedStatement->execute();
    }

    /**
     * Insert le role par defaut de l'user en simple visiteur
     * @param User $user
     * @return Void
     */
    public function saveDefaultUserRole(User $user): void
    {
        $SQL = "INSERT INTO user_role (User_Id, Role_Id) VALUES (:User_Id, :Role_Id)";
        $preparedStatement = $this->cnx->prepare($SQL);
        $preparedStatement->bindValue("User_Id", $user->getUser_Id());
        $preparedStatement->bindValue("Role_Id", 1);
        $preparedStatement->execute();
    }

    /**
     * Met à jour les données d'un user
     * @param User $user
     * @return Void
     */
    public function update(User $user): void
    {
        $SQL = "UPDATE user SET User_Id = :User_Id, Name = :Name, Login = :Login, Password = :Password WHERE User_Id = :User_Id";
        $preparedStatement = $this->cnx->prepare($SQL);
        $preparedStatement->bindValue("User_Id", $user->getUser_Id());
        $preparedStatement->bindValue("Name", $user->getName());
        $preparedStatement->bindValue("Login", $user->getLogin());
        $preparedStatement->bindValue("Password", $user->getPassword());
        $preparedStatement->execute();
    }

    /**
     * Récupère toutes les infos de tous les users
     * @return Array
     */
    public function findAll(): array
    {
        $users = [];
        $SQL = "SELECT * FROM user";
        $preparedStatement = $this->cnx->prepare($SQL);
        $preparedStatement->execute();
        while ($user = $preparedStatement->fetchObject("User")) {
            $users[] = $user;
        }
        return $users;
    }

    /**
     * Compte le nombre de résultat
     * @return Int $result
     */
    public function count(): int
    {
        $SQL = "SELECT COUNT(*) as nbr FROM user";
        $preparedStatement = $this->cnx->prepare($SQL);
        $preparedStatement->execute();
        $result = $preparedStatement->fetch();
        return $result['nbr'];
    }

    /**
     * Récupère le user qui a ce login
     * @param String $login
     * @return User
     */
    public function findByLogin(string $login): User
    {
        $SQL = "SELECT * FROM user WHERE Login = :login";
        $preparedStatement = $this->cnx->prepare($SQL);
        $preparedStatement->bindValue("login", $login);
        $preparedStatement->execute();
        $user = $preparedStatement->fetchObject("User");
        return $user;
    }

    /**
     * Récupère tous les roles d'un user
     * @param User $user
     * @return Array
     */
    public function findRolesFromUser(User $user): array
    {
        $roles = [];
        $SQL = "SELECT user_role.Role_Id, role.Role_Name, role.Permissions FROM role, user_role WHERE user_role.User_Id = :id AND role.Role_Id = user_role.Role_Id";
        $preparedStatement = $this->cnx->prepare($SQL);
        $preparedStatement->bindValue("id", $user->getUser_Id());
        $preparedStatement->execute();
        while ($role = $preparedStatement->fetchObject("Role")) {
            $roles[] = $role;
        }
        return $roles;
    }
}
