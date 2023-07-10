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
        if($user->getEmail() && $user->getUsername() && $user->getPassword())
        {
            $hash = password_hash($user->getPassword(), PASSWORD_DEFAULT);
            $query = $this->db->prepare('INSERT INTO users (email, username, password) VALUES (?, ?, ?)');
            $query->execute([$user->getEmail(), $user->getUsername(), $hash]);
            $query->fetch(PDO::FETCH_ASSOC);
        }
    }
    
    public function editUser(User $user) : void
    {
        $hash = password_hash($user->getPassword(), PASSWORD_DEFAULT);
        $user->setPassword($hash);
        $query = $this->db->prepare('UPDATE users SET email = ?, username = ?, password = ? WHERE id = ?');
        $query->execute([$user->getEmail(), $user->getUsername(), $user->getPassword(), $_SESSION['id']]);

    }

}


?>