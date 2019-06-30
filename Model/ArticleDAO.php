<?php

class ArticleDAO 
{
    private $connexion;

    public function __construct($connexion)
    {
        $this->setConnexion($connexion);
    }

    /**
     * Set the value of connexion
     *
     * @return  self
     */ 
    public function setConnexion($connexion)
    {
        $this->connexion = $connexion;

        return $this;
    }

    public function add(Article $article)
    {
        $requete = $this->connexion->prepare('INSERT INTO Article (titre, contenu, dateCreation, dateModification, categorie) 
                                VALUES(:titre, :contenu, NOW(), NOW(), :categorie) ');
        $requete->execute([
            'titre' => $article->getTitre(),
            'contenu' => $article->getContenu(),
            'categorie' => $article->getCategorie()
        ]);
    }

    public function getAll()
    {
        $requete = $this->connexion->query('SELECT * FROM Article');

        while($data = $requete->fetch(PDO::FETCH_ASSOC))
        {
            $articles [] = new Article($data['id'], $data['titre'], $data['contenu'], $data['dateCreation'], $data['dateModification'], $data['categorie']);
        }
        
        return $articles;
    }

    public function getArticleByCategory($category)
    {
        $category = (int) $category;

        $requete = $this->connexion->prepare('SELECT * FROM Article WHERE categorie = :categorie');
        
        $requete->execute(['categorie'=>$category]);

        $articles = [];

        while($data = $requete->fetch(PDO::FETCH_ASSOC))
        {
            $articles [] = new Article($data['id'], $data['titre'], $data['contenu'], $data['dateCreation'], $data['dateModification'], $data['categorie']);
        }
        
        return $articles;
    }

    public function getById($id)
    {
        $id = (int) $id;

        $req = $this->connexion->prepare('SELECT * FROM Article WHERE id = :id');
        $req->execute(['id' => $id]);

        $data = $req->fetchAll(PDO::FETCH_ASSOC);
        $article = new Article($data[0]['id'], $data[0]['titre'], $data[0]['contenu'], $data[0]['dateCreation'], $data[0]['dateModification'], $data[0]['categorie']);
        return $article;
    }
}