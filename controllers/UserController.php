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
        $allUsers = $this->manager->getAllUsers();
        $this->render('index', $allUsers);
    }
    
    public function create(array $post = null)
    {
        if(isset($_POST['email'], $_POST['username'], $_POST['password']))
        {
            $user = new User($_POST['email'], $_POST['username'], $_POST['password']);
            $this->manager->insertUser($user);
            $allUsers = $this->manager->getAllUsers();
            $this->render('index', $allUsers);
        }else{
            $allUsers = $this->manager->getAllUsers();
            $this->render('create', $allUsers);
        }
        
    }
    
    public function edit(array $post = null)
    {
        if(isset($_POST['email'], $_POST['username'], $_POST['password'], $_SESSION['id']))
        {
            $user = new User($_SESSION['id'], $_POST['email'], $_POST['username'], $_POST['password']);
            $this->manager->editUser($user);
            $allUsers = $this->manager->getAllUsers();
            $this->render('index', $allUsers);
        }else{
            $allUsers = $this->manager->getAllUsers();
            $this->render('edit', $allUsers);
        }
        
    }
}

?>