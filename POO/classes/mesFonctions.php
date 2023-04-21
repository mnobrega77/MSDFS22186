<?php
// Inclusion des fichiers Plat.php, Categorie.php, PlatSpecial.php
require_once('Categorie.php');
require_once('Plat.php');
require_once('PlatSpecial.php');

// Création d'une instance de la classe Categorie
$categoriePizza = new Categorie(1, "Pizzas", "Les meilleures pizzas du monde !");

// Création d'une instance de la classe Plat
//$platMargherita = new Plat(1, "Margherita", "Tomate, mozzarella, basilic", 9.50, $categoriePizza);

// Création d'une instance de la classe PlatSpecial
//$calzone = new PlatSpecial(1, "Calzone", "Tomate, mozzarella, jambon, champignons", 12.50, $categoriePizza, "Spécialité du chef");

echo $categoriePizza->getNom();
// Affichage des propriétés des objets
//$categoriePizza->afficher() ;
echo "\n";

// Affiche "1 Pizzas : Les meilleures pizzas du monde !"
//$platMargherita->afficher();
echo "\n";
// Affiche "1 Margherita : Tomate, mozzarella, basilic (9.5€) 1 - Pizzas"
//$calzone->afficher();
echo "\n";