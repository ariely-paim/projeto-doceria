<?php
    require_once 'conexao.php';

    class Vendas{
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

        public function insert($quantidade, $data, $id_funcionario, $id_cliente, $id_produto){
            try{
                $sql = "insert into venda(quantidade, data, id_funcionario, id_cliente, id_produto)
                        values(:quantidade, :data, :id_funcionario, :id_cliente, :id_produto)";
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(":quantidade", $quantidade);
                $stmt->bindParam(":data", $data);
                $stmt->bindParam(":id_funcionario", $id_funcionario);
                $stmt->bindParam(":id_cliente", $id_cliente);
                $stmt->bindParam(":id_produto", $id_produto);
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
                $sql = "delete from venda where id = :id";
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

        public function editar($quantidade, $data, $id_funcionario, $id_cliente, $id_produto, $id){
            try{
                $sql = "UPDATE venda SET
                        quantidade = :quantidade,
                        data = :data,
                        id_funcionario = :id_funcionario,
                        id_cliente = :id_cliente,
                        id_produto = :id_produto
                        WHERE id = :id";

                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(":quantidade", $quantidade);
                $stmt->bindParam(":data", $data);
                $stmt->bindParam(":id_funcionario", $id_funcionario);
                $stmt->bindParam(":id_cliente", $id_cliente);
                $stmt->bindParam(":id_produto", $id_produto);
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
