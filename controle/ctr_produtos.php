<?php
    require_once '../modelo/produtos.php';
    $objProd = new Produtos();

    if(isset($_POST['insert'])){
        $nome = $_POST['txtNome'];
        $quantidade = $_POST['txtQuantidade'];
        $valor = $_POST['txtValor'];
        if($objProd->insert($nome, $quantidade, $valor)){
            $objProd->redirect('../produtos.php');
        }
    }

    if(isset($_POST['delete'])){
        $id = $_POST['delete'];
        if($objProd->deletar($id)){
            $objProd->redirect('../produtos.php');
        }
    }

    //O editar não esta carregando os dados no modal
    if(isset($_POST['editar'])){
        $id = $_POST['editar'];
        $nome = $_POST['txtNome'];
        $quantidade = $_POST['txtQuantidade'];
        $valor = $_POST['txtValor'];
        if($objProd->editar($nome, $quantidade, $valor, $id)){
            $objProd->redirect('../produtos.php');
        }
    }

?>
