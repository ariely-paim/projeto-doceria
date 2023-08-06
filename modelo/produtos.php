<?php
    require_once 'conexao.php';

    class Produtos{
        private $conn;

        public function __construct()
        {
            $dataBase = new dataBase();
            $db = $dataBase->dbConnection();
            $this->conn = $db;
        }

        public function runQuery($sql){
            $stmt = $this->conn->prepare($sql);
            return $stmt;
        }

        public function insert($nome, $quantidade, $valor){
            try{
                $sql = "insert into produto(nome, quantidade, valor)
                        values(:nome, :quantidade, :valor)";
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(":nome", $nome);
                $stmt->bindParam(":quantidade", $quantidade);
                $stmt->bindParam(":valor", $valor);
                $stmt->execute();
                return $stmt;
            }catch(PDOException $e){
                echo("Error: ".$e->getMessage());
            }finally{
                $this->conn = null;
            }
        }

        public function deletar($id){
            try{
                $sql = "delete from produto where id = :id";
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(":id", $id);
                $stmt->execute();
                return $stmt;
            }catch(PDOException $e){
                echo("Error: ".$e->getMessage());
            }finally{
                $this->conn = null;
            }
        }

        public function editar($nome, $cpf, $id){
            try{
                $sql = "UPDATE produto SET
                        nome = :nome,
                        quantidade = :quantidade,
                        valor = :valor,
                        WHERE id = :id";

                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(":nome", $nome);
                $stmt->bindParam(":quantidade", $quantidade);
                $stmt->bindParam(":valor", $valor);
                $stmt->bindParam(":id", $id);

                $stmt->execute();
                return $stmt;

            }catch(PDOException $e){
                echo("Error: ".$e->getMessage());
            }finally{
                $this->conn = null;
            }
        }

        public function redirect($url){
            header("Location: $url");
        }

    }

?>
