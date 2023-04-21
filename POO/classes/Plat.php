<?php
class Plat {
    public $id;
    public $nom;
    public $description;
    public $prix;
    public $categorie;

    public function __construct($id, $nom, $description, $prix, $categorie) {
        $this->id = $id;
        $this->nom = $nom;
        $this->description = $description;
        $this->prix = $prix;
        $this->categorie = $categorie;
    }

    public function afficher() {
        echo $this->id . " " . $this->nom . " : " . $this->description . " (" . $this->prix . "€) " . $this->categorie;
    }
}