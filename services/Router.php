<?php

require './controllers/UserController.php';

function checkRoute(string $route) : void 
{
    $userController = new UserController(); //connection a la base de donné
    if($route === "user-create")
    {
        $userController->create();
    }
    else if($route === "user-edit")
    {
        $userController->edit();
    }
    else
    {
        $userController->index();
    }
}

?>