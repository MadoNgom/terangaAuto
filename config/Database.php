<?php
 
class Database{
    // Les propriétées de connexion à la base de données
    private $host = "localhost";
    private $dbname = "TérangaAuto";
    private $username = "root";
    private $password = "";
    public $connexion;

    // Connexion à la base de données
    public function getConnexion()
    {
        $this->connexion = null;

        try {
             // Créez une connexion PDO
        $this->connexion = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname, $this->username, $this->password);
        $this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Gestion des erreurs PDO
        $this->connexion->exec("set names utf8"); // Encodage UTF-8

        } catch (PDOException $exception) {
            echo "Erreur de connexion : " . $exception->getMessage();
        }

        return $this->connexion;
    }
    public function connexion($tel, $pwd){
        try {
            // Préparez la requête de sélection
            $query = "SELECT * FROM `User` WHERE tel=?";
            $selection = $this->connexion->prepare($query);
    
            // Exécutez la requête en passant l'tel
            $selection->execute([$tel]);
            $result = $selection->fetch(PDO::FETCH_ASSOC);
    
            // Vérifiez si l'utilisateur a été trouvé et si le mot de passe correspond
            if ($result && password_verify($pwd, $result['pwd'])) {
                // Retournez les résultats de la requête
                return $result;
            } else {
                // Aucun utilisateur correspondant ou mot de passe incorrect
                return NULL;
            }
        } catch (PDOException $exception) {
            echo "Erreur de connexion : " . $exception->getMessage();
            // En cas d'erreur lors de la sélection dans la base de données, retournez NULL ou gérez l'erreur selon
            return NULL;
        }
    }
}

 
