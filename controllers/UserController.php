<?php

require 'AbstractController.php';
require 'managers/UserManager.php';

class UserController extends AbstractController
{
    private UserManager $manager;
    
    public function __construct()
    {
        $this->manager = new UserManager("kevincorvaisier_phpj9", "3306", "db.3wa.io", "kevincorvaisier", "04646b679a4ab0a202f8007ea81fe675");
    }
    
    public function index()
    {
        $this->manager->getAllUsers();
        $this->render('index', []);
        
    }
    
    public function create(array $post = null)
    {
        $this->render('create', []);
        if(isset($_POST['email'], $_POST['usersname'], $_POST['password']))
        {
            //créer un nouvel utilisateur ici
            $this->manager->insertUser();
        }
        
    }
    
    public function edit(array $post = null)
    {
        $this->render('edit', []);
        if(isset($_POST['email'], $_POST['usersname'], $_POST['password']))
        {
            $this->manager->editUser();
        }
    }
}

?>