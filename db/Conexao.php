<?php


     class Conexao{

        public $conn;

        public function __construct()
        {
            try{
                $this->conn = new PDO('mysql:host=localhost;dbname=sistema_login', 'root', 'root');
                echo "conecatado!";
            }catch(PDOException $e){
                echo "Erro ao conectar no banco: ".$e->getMessage();
            }
        }
    }
?>