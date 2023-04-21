<?php
class Employe
{
    private $nom;
    private $prenom;
    private $dateEmbauche;
    private $fonction;
    private $salaire;
    private $service;

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @return mixed
     */
    public function getDateEmbauche()
    {
        return $this->dateEmbauche;
    }

    /**
     * @param mixed $dateEmbauche
     */
    public function setDateEmbauche($dateEmbauche)
    {
        $this->dateEmbauche = $dateEmbauche;
    }

    /**
     * @return mixed
     */
    public function getFonction()
    {
        return $this->fonction;
    }

    /**
     * @param mixed $fonction
     */
    public function setFonction($fonction)
    {
        $this->fonction = $fonction;
    }

    /**
     * @return mixed
     */
    public function getSalaire()
    {
        return $this->salaire;
    }

    /**
     * @param mixed $salaire
     */
    public function setSalaire($salaire)
    {
        $this->salaire = $salaire;
    }

    /**
     * @return mixed
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * @param mixed $service
     */
    public function setService($service)
    {
        $this->service = $service;
    }



    public function getAnciennete($param){
        $d = new DateTime();
        $d->setDate($d->format('Y'), '11', '30');
        echo($d->format('d/m/Y') ."\n");
        $date = $d;
        $par = DateTime::createFromFormat('d/m/Y', $param);
        // echo($par->format('d/m/y'));
        $anc = $date->diff($par);
        return $anc->format('%y');
    }

    public function getPrime($slBrut, $anc)
    {
        $prime = 0.05 * $slBrut + (0.02 * $slBrut) * $anc;
        return $prime;
    }

}
//create new employee
$p = new Employe;
$p->setSalaire(30000);
$p->setDateEmbauche('18/03/2021');
$slBrut = $p->getSalaire();
$anc = $p->getAnciennete($p->getDateEmbauche());

echo($p->getAnciennete('18/03/2021'));
//echo($p->getPrime($slBrut, $anc));