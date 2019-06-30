<?php

require_once("Model/Article.php");
require_once("Model/Categorie.php");
require_once("Model/ArticleDAO.php");
require_once("Model/CategorieDAO.php");

class BlogController 
{
    private $allArticles;
    private $allCategories;
    private $articleDAO;
    private $categorieDAO;

    public function __construct()
    {
        $connexion = new PDO('mysql:host=localhost;dbname=mglsi_news', 'root', '');

        $this->articleDAO = new ArticleDAO($connexion);  
        $this->categorieDAO = new CategorieDAO($connexion);  

        $this->allArticles = $this->articleDAO->getAll();
        $this->allCategories = $this->categorieDAO->getAll();
    }

    public function index()
    {
        require_once('Views/index.php');
    }

    public function article()
    {
        $this->allArticles = $this->articleDAO->getArticleByCategory($_GET['categorie']);
        require_once('Views/index.php');
    }

    public function getArticle()
    {
        $article = $this->articleDAO->getById($_GET['id']);
        require_once('Views/article.php');
    }
}