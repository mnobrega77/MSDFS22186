<?php
require_once('index.php');


//la partie connexion pdo à la base; normalement vous l'avez dans un fichier, mais ici c'est juste pour simplifier les choses 
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

// Preparons la requête sql; vous l'aurez compris, il s'agit d'une requête que l'on peut/doit mettre dans le fichier dao.php et returner un user (ou null)
//Mais encore une fois, j'ai fait au plus simple

    $stmt = $db->prepare('SELECT id, nom_prenom, password FROM utilisateur WHERE email = :email LIMIT 1'); 

	
	$stmt->bindParam(':email', $email);
	$stmt->execute();
	$user = $stmt->fetch();
    // var_dump($user);

    
    //Là, enfin, on vérifie qu'il y a une utilisateur avec le mail saisi dans notre base de données, et s'il y en a un, 
    //on compare son mot de passe avec le mot de passe de la colonne correspondante dans la table;
    //N'oubliez pas d'utiliser password_hash() quand l'utilisateur s'inscrit et password_verify() quand il tente de se connecter!
    //L'exemple ci-dessous compare juste deux chaînes de caractères en clair (!!! pour les test ça va, mais il faut hacher les mots de passe!)

    if($user){
        if(
            // password_verify($password, $user["password"])
            $password===$user["password"]
            )
        {
            $_SESSION['auth'] = $user;
            $_SESSION['flash']['success'] = "Bonjour " .$user["nom_prenom"]. ". Vous êtes maintenant connecté";
            
            header('Location: profil.php');
            exit();
        }else{
            $_SESSION['flash']['danger'] = 'Les données envoyées sont invalides';

            header('Location: index.php');
         }
    }else{
            $_SESSION['flash']['danger'] = 'Authentification impossible!';

            header('Location: index.php');
         }
    


