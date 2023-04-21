<?php
class PlatSpecial extends Plat {
    public $specialite;

    public function __construct($id, $nom, $description, $prix, $categorie, $specialite) {
        parent::__construct($id, $nom, $description, $prix, $categorie);
        $this->specialite = $specialite;
    }

    public function afficher() {
        echo $this->nom . " : " . $this->description . " (" . $this->prix . "€)";
        echo " Spécialité : " . $this->specialite;
    }
}