
<?php

require_once('Categorie.php');

        $host = 'localhost';
        $db_username = 'admin';
        $db_password = 'Afpa1234';
        $db_name = 'oop';
        $db_charset = 'utf8mb4';

        $dsn = "mysql:host=$host;dbname=$db_name;charset=$db_charset";
        

        try{
            $db = new PDO($dsn, $db_username, $db_password);

            //Secho "Connected successfully";
        }
        catch(PDOException $e){
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }

$request = $db->query("select * from categorie");
$categories = $request->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Categorie");

foreach ($categories as $categorie) {
    $categorie->afficher();
    
}