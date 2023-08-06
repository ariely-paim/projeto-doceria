<?php
    require_once '../modelo/funcionario.php';
    $objFunc = new Funcionario();

    if(isset($_POST['validar'])){
        $login = $_POST['txtLogin'];
        $senha = $_POST['txtSenha'];

        //echo $login; exit;

        if($objFunc->validar($login, $senha)){
            $objFunc->redirect('../funcionario.php');
        }else{
            $objFunc->redirect('../index.php');
        }
    }

    if(isset($_POST['insert'])){
        $nome = $_POST['txtNome'];
        $cpf = $_POST['txtCpf'];
        $login = $_POST['txtLogin'];
        $senha = $_POST['txtSenha'];
        if($objFunc->insert($nome, $cpf, $login, $senha)){
            $objFunc->redirect('../funcionario.php');
        }
    }

    if(isset($_POST['delete'])){
        $id = $_POST['delete'];
        if($objFunc->deletar($id)){
            $objFunc->redirect('../funcionario.php');
        }
    }

    if(isset($_POST['editar'])){
        $id = $_POST['editar'];
        $nome = $_POST['txtNome'];
        $cpf = $_POST['txtCpf'];
        $login = $_POST['txtLogin'];
        $senha = $_POST['txtSenha'];
        if($objFunc->editar($nome, $cpf, $login, $senha, $id)){
            $objFunc->redirect('../funcionario.php');
        }
    }

?>