<?php
require_once('index.php');

$host = 'localhost';
        $db_username = 'admin';
        $db_password = 'Afpa1234';
        $db_name = 'oop';
        $db_charset = 'utf8mb4';

        $dsn = "mysql:host=$host;dbname=$db_name;charset=$db_charset";
        

        try{
            $db = new PDO($dsn, $db_username, $db_password);

            //echo "Connected successfully";
        }
        catch(PDOException $e){
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }

        // la fonction isset() vérifiera que ces données existent.
if ( !isset($_POST['inputEmail'], $_POST['inputPassword']) ) {
	
	exit('Vous devez entrer votre email et votre mot de passe!');
}else{
    $email = $_POST['inputEmail'];
	$password = $_POST['inputPassword'];
}

// Preparons la requête sql
    $stmt = $db->prepare('SELECT id, nom_prenom, password FROM utilisateur WHERE email = :email LIMIT 1'); 

	
	$stmt->bindParam(':email', $email);
	$stmt->execute();
	$user = $stmt->fetch();
    // var_dump($user);

    if($user){
        if(
            // password_verify($password, $user["password"])
            $password===$user["password"]
            ){
            $_SESSION['auth'] = $user;
            $_SESSION['flash']['success'] = "Bonjour " .$user["nom_prenom"]. ". Vous êtes maintenant connecté";
            
            header('Location: profil.php');
        exit();
        }else{
            $_SESSION['flash']['danger'] = 'Les données envoyées sont invalides';

            header('Location: index.php');
         }
    }


