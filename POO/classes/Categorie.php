<?php
class Categorie {
public $id;
private $nom;
public $description;


public function __construct($id=0, $nom="", $description="") {
$this->id = $id;

$this->nom = $nom;
$this->description = $description;
}

    /**
     * @return mixed|string
     */
    public function getNom()
    {
        return $this->nom;
    }
public function afficher() {
echo $this->id . " " . $this->nom . " : " . $this->description;
}


public function __toString(){
    return $this->id . " - " .$this->nom;
}

}