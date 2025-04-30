<?php
require_once("../sql/bdd.php");
class mdpModele extends BDD
// Déclare une classe `mdpModele` qui hérite de la classe `BDD`. 
// Cela signifie que `mdpModele` peut utiliser les fonctionnalités définies dans `BDD`.
    {
        private $mdp; // Déclare une propriété privée `$mdp` qui pourrait être utilisée pour stocker un mot de passe. 
        // Elle est privée, donc accessible uniquement à l'intérieur de cette classe.

        public function __construct()  // Déclare un constructeur pour initialiser la classe `mdpModele`.
        {
            parent :: __construct(); // Appelle le constructeur de la classe parente (`BDD`). 
            // Cela initialise la connexion à la base de données définie dans la classe `BDD`.
        }

        public function verifyUser($email) // Déclare une méthode publique `verifyUser` qui vérifie si un utilisateur avec un email donné existe dans la base de données.
        {
            $requete = "SELECT * FROM users WHERE email = :email";  // Prépare une requête SQL pour sélectionner toutes les colonnes d'un utilisateur ayant l'email spécifié.
            $select = $this->bdd->prepare($requete); // Utilise l'objet `$bdd` (hérité de `BDD`) pour préparer la requête. 
            // Cela protège contre les injections SQL en utilisant des paramètres liés.
            $select->bindParam(":email", $email);  // Lie la valeur de la variable `$email` au paramètre nommé `:email` dans la requête. 
            // Cela permet de sécuriser la requête.
            $select->execute();  // Exécute la requête SQL préparée.
            return $select->fetch(); // Retourne la première ligne trouvée dans les résultats de la requête (sous forme de tableau associatif ou booléen false si aucun résultat).
        }
        
    }