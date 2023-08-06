<?php
    require_once '../modelo/cliente.php';
    $objCliente = new Cliente();

    if(isset($_POST['insert'])){
        $nome = $_POST['txtNome'];
        $cpf = $_POST['txtCpf'];
        $telefone = $_POST['txtTelefone'];
        if($objCliente->insert($nome, $cpf, $telefone)){
            $objCliente->redirect('../cliente.php');
        }
    }

    if(isset($_POST['delete'])){
        $id = $_POST['delete'];
        if($objCliente->deletar($id)){
            $objCliente->redirect('../cliente.php');
        }
    }

    if(isset($_POST['editar'])){
        $id = $_POST['editar'];
        $nome = $_POST['txtNome'];
        $cpf = $_POST['txtCpf'];
        $telefone = $_POST['txtTelefone'];
        if($objCliente->editar($nome, $cpf, $telefone, $id)){
            $objCliente->redirect('../cliente.php');
        }
    }

?>