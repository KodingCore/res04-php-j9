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
        
        var_dump("ol1");
        if(isset($_POST['email'], $_POST['username'], $_POST['password']))
        {
            var_dump("ol");
            $user = new User($_POST['email'], $_POST['username'], $_POST['password']);
            $this->manager->insertUser($user);
        }
        $this->render('create', []);
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