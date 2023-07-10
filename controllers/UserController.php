<?php

require 'AbstractController.php';
require 'managers/UserManager.php';
require 'models/User.php';

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
        if(isset($_POST['email'], $_POST['username'], $_POST['password']))
        {
            $user = new User($_POST['email'], $_POST['username'], $_POST['password']);
            $this->manager->insertUser($user);
        }
        $this->render('create', []);
    }
    
    public function edit(array $post = null)
    {
        
        if(isset($_POST['email'], $_POST['usersname'], $_POST['password']))
        {
            $this->manager->editUser();
        }
        $this->render('edit', []);
    }
}

?>