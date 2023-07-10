<?php
session_start();

require './services/Router.php';

if(isset($_GET['id']))
{
    $_SESSION['id'] = $_GET['id'];
}

if(isset($_GET["route"]))
{
    checkRoute($_GET["route"]);
}
else
{
    checkRoute("");
}

?>