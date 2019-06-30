<?php

require_once("Controller/BlogController.php");

$controller = new BlogController();

if(isset($_GET['action']))
{
    if($_GET['action'] == 'accueil')
    {
        $controller->index();
    }
}
else if(isset($_GET['categorie']))
{
    $controller->article();
}
else if(isset($_GET['id']))
{
    $controller->getArticle();
}

//$controller->index();

