<?php


class Personnage
{
    
    private $nom;
    private $prenom;
    private $age;
    private $sexe;
    
    public function getNom()
    {
        return $this->nom;
    }
    public function setNom($nom)
    {
        $this->nom = $nom;
        return $this;
    }
    

    public function getPrenom()
    {
        return $this->prenom;
    }
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    public function getAge()
    {
        return $this->age;
    }
    public function setAge($age)
    {
        $this->age = $age;
    }

    public function getSexe()
    {
        return $this->prenom;
    }
    public function setSexe($sexe)
    {
        $this->sexe = $sexe;
        return $this;
    }

    
}