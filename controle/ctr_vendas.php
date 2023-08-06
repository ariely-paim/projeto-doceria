<?php
    require_once '../modelo/vendas.php';
    $objVend = new Vendas();

    if(isset($_POST['insert'])){
        $quantidade = $_POST['txtQuantidade'];
        $data = $_POST['txtData'];
        $id_funcionario = $_POST['txtId_Funcionario'];
        $id_cliente = $_POST['txtId_Cliente'];
        $id_produto = $_POST['txtId_Produto'];
        if($objVend->insert($quantidade, $data, $id_funcionario, $id_cliente, $id_produto)){
            $objVend->redirect('../vendas.php');
        }
    }

    if(isset($_POST['delete'])){
        $id = $_POST['delete'];
        if($objVend->deletar($id)){
            $objVend->redirect('../vendas.php');
        }
    }

    if(isset($_POST['editar'])){
        $id = $_POST['editar'];
        $quantidade = $_POST['txtQuantidade'];
        $data = $_POST['txtData'];
        $id_funcionario = $_POST['txtId_Funcionario'];
        $id_cliente = $_POST['txtId_Cliente'];
        $id_produto = $_POST['txtId_Produto'];
        if($objVend->editar($quantidade, $data, $id_funcionario, $id_cliente, $id_produto, $id)){
            $objVend->redirect('../vendas.php');
        }
    }

?>