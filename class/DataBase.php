<?php

class Database
{
    private string $host;
    private string $dbname;
    private string $user;
    private string $password;
    public ?PDO $connection = null;

//Chaine de connection
    public function __construct(string $host, string $dbname, string $user, string $password)  //Crée une instance PDO qui représente une connexion à la base
    {
        //Sécurisation des variables de connection
        $this->host = htmlspecialchars($host);
        $this->dbname = htmlspecialchars($dbname);
        $this->user = htmlspecialchars($user);
        $this->password = htmlspecialchars($password);
    }

    /**
     * Fonction qui se connecte à une base de données
     * @return PDO
     * @throws PDOException|Exception
     */

    public function connect(): PDO  
    {
        if(!is_null($this->connection)){
            throw new Exception('Une connexion est déjà active');
        }

        try{
            $dsn = "mysql:dbname=".$this->dbname.";host=".$this->host;
            $this->connection = new PDO($dsn, $this->user, $this->password);

            return $this->connection;
        }catch(PDOException $e){
            throw new PDOException($e->getMessage());
        }
    }
}