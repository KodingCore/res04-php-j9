<?php

class UserController extends AbstractController
{
    private UserManager $manager;
    
    public function index()
    {
        // $this->dataConnector();
        $query = $db->prepare('SELECT * FROM `users`');
        $query->execute();
        $this->manager = $query->fetch(PDO::FETCH_ASSOC);
        
        $this->render('users/index.phtml', $this->manager);
    }
    
    public function create(array $post)
    {
        if(isset($_POST['email'], $_POST['usersname'], $_POST['password']))
        {
            // $this->dataConnector();
            $query = $db->prepare('INSERT INTO users (email, username, password) VALUES ($_POST["email"], $_POST["usersname"], $_POST["password"]);');
            $query->execute();
            $this->manager = $query->fetch(PDO::FETCH_ASSOC);
        
            $this->render('users/create.phtml', $this->manager);
        }
        
    }
    
    public function edit(array $post)
    {
        if(isset($_POST['email'], $_POST['usersname'], $_POST['password']))
        {
            // $this->dataConnector();
            $query = $db->prepare('UPDATE users SET email = '.$_POST['email'].', usersname = '.$_POST['usersname'].', password = '.$_POST['password'].' WHERE id = '.$_SESSION['id'].';');
            $query->execute();
            $userEdit = $query->fetch(PDO::FETCH_ASSOC);
            
            $this->render('users/edit.phtml', $this->manager);
        }
    }
    
    // public function dataConnector()
    // {
    //     $host = "db.3wa.io";
    //     $port = "3306";
    //     $dbname = "kevincorvaisier_phpj6";
    //     $connexionString = "mysql:host=$host;port=$port;dbname=$dbname";
        
    //     $log = "kevincorvaisier";
    //     $password = "04646b679a4ab0a202f8007ea81fe675";
        
    //     $db = new PDO(
    //         $connexionString,
    //         $log,
    //         $password
    //     );
    // }
}

?>