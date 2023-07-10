<?php
require 'AbstractManager.php';

class UserManager extends AbstractManager
{
    public function getAllUsers() : array
    {
        $query = $this->db->prepare('SELECT * FROM `users`');
        if ($query->execute()) {
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $errorInfo = $query->errorInfo();
            echo 'Erreur de requête SQL : ' . $errorInfo[2];
            return []; // Retourner un tableau vide en cas d'erreur
        }
    }
    
    public function getUserById(int $id) : User
    {
        $query = $this->db->prepare('SELECT * FROM `users` WHERE `id` = '.$id);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }
    
    public function insertUser(User $user) : void
    {
        if($user->getEmail() && $user->getUsersname() && $user->getPassword())
        {
            $query = $this->db->prepare('INSERT INTO users (email, username, password) VALUES ('.$user->getEmail.', '.$user->getUsersname.', '.$user->getPassword.');');
            $query->execute();
            $query->fetch(PDO::FETCH_ASSOC);
        }
    }
    
    public function editUser(User $user) : void
    {
        $query = $this->db->prepare('UPDATE users SET email = '.$user->email.', usersname = '.$user->usersname.', password = '.$user->password.' WHERE id = '.$_SESSION['id'].';');
        $query->execute();
    }

}


?>