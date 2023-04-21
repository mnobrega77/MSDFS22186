
<?php
require 'Personnage.class.php';

// use Personnage;


    $p = new Personnage();

    $p->setNom("Lebowski");
    $p->setPrenom("Jeff");

    print_r ($p);
    echo($p->getNom());
    


