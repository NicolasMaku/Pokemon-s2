<?php
    function logBd(){
        static $bdd = null;

        if ($bdd == null) {
            $database = mysqli_connect("localhost", 'replicator','root','pokemon', 3306);
//            $database = mysqli_connect("localhost", 'replicator','root','pokemon', 3306);
        }

        return $database;
    }

    function customSessionStart() {
        include "DBSessionHandler.php";

        $host = 'localhost'; // Adresse du serveur MySQL
        $dbname = 'cluster'; // Nom de la base de données
        $username = 'root'; // Nom d'utilisateur MySQL
        $password = 'root'; // Mot de passe MySQL


        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

        $handler = new DBSessionHandler(($pdo));
        session_set_save_handler($handler, true);

        ini_set('session.gc_maxlifetime', 1440);

        session_start();



    }
?>