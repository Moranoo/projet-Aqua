<?php

include_once('../class/Database.php');


$bdd = new Database('localhost', 'abysses', 'root', '');

$conn = $bdd->connect();

class newAqua
{
    public static function list(int $current_page, int $limit = 10)
    { global $conn;
        if($current_page < 1){
            throw new Exception("[ValueError] : La valeur minimale est 0");
        }

        $offset = $current_page * $limit - $limit;

        try{
      
            $sql = "SELECT * FROM aquariums LIMIT $offset, $limit";
            $select = $conn->prepare($sql);
            $select->execute();

            return $select->fetchAll(PDO::FETCH_ASSOC);

        }catch(PDOException $e){
            throw new PDOException($e->getMessage());
        }
    }
}