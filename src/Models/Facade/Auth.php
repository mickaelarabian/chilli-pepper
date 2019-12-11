<?php
require_once '../src/Models/Entities/Permission.php';
require_once '../src/Models/DAO/DAOUser.php';

class Auth
{
    /**
     * Verifie si l'utilisateur est connecté
     *
     * @return boolean
     */
    public function isLogged()
    {
        return isset($_SESSION['user_Id']) ? true : false;
    }

    //vérifie si il a la permission
    /**
     * Undocumented function
     *
     * @param $p
     * @return boolean
     */
    public function hasPermission($p)
    {
        $permissions = (isset($_SESSION['user_Permissions'])) ? $_SESSION['user_Permissions'] : null ;
        return $p & $permissions;
    }

    //inscrit l'user
    /**
     * Undocumented function
     *
     * @param User $user
     * @return void
     */
    public function addUser($user)
    {
        $DAOUser = new DAOUser(Singleton::getInstance()->cnx);
        $DAOUser->save($user);
        $user = $DAOUser->findByLogin($user->getLogin());
        $DAOUser->saveDefaultUserRole($user);
    }

    /**
     * Connecte l'user
     *
     * @param string $login
     * @param string $password
     * @return void
     */
    public function logUser($login, $password)
    {
        $DAOUser = new DAOUser(Singleton::getInstance()->cnx);
        $user = $DAOUser->findByLogin($login);
        if ($user->getPassword() == $password) {
            $roles = $DAOUser->findRolesFromUser($user);
            $permissions = 0;
            foreach ($roles as $role) {
                $permissions += $role->getPermissions();
            }
            $_SESSION['user_Id'] = $user->getUser_Id();
            $_SESSION['user_Name'] = $user->getName();
            $_SESSION['user_Permissions'] = $permissions;
            header('Location: /');
            exit;
        } else {
            header('Location: /user/login');
        }
    }

    /**
     * Deconnecte l'utilisateur
     *
     * @return void
     */
    public function logout()
    {
        session_destroy();
        header('Location: /');
    }
}
