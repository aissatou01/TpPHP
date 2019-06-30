<?php

class CategorieDAO
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
    
    public function add(Categorie $categorie)
    {
        $req = $this->connexion->prepare('INSERT INTO Categorie VALUES(:id, :libelle)');
        $req->execute(['id' => '', 'libelle'=>$categorie->getLibelle()]);

    }

    public function getAll()
    {
        $req = $this->connexion->query('SELECT * FROM Categorie');

        while($data = $req->fetch(PDO::FETCH_ASSOC))
        {
            $categories [] = new Categorie($data['id'], $data['libelle']);
        }
        
        return $categories;

    }
    
}