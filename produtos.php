<?php
    require_once 'modelo/produtos.php';
    $objProd = new Produtos();
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Controle</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top">
            <!-- Brand -->
            <a class="navbar-brand" href="index.html">Doceria Doce Sabor
            </a>

            <!-- Toggler/collapsibe Button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="funcionario.php">Funcionario</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cliente.php">Cliente</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="produtos.php">Produtos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="vendas.php">Vendas</a>
                </li>      
                </ul>
            </div>
        </nav>
        
        <div class="container">
            <br>
            <br>
            <br>
            <div class="row">
            
                <h3>Produtos</h3>
                <table class="table table-striped">            
                        <thead>  
                            <tr>
                                <th colspan="5">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalCadastrar">Novo</button>
                                </th>
                            </tr>              
                            <tr>
                                <th>Id</th>
                                <th>Nome</th>
                                <th>Quantidade</th>
                                <th>Valor</th>
                                <th>Editar</th>
                                <th>Deletar</th>
                            </tr>                
                        </thead>
                        <tbody>
                            <?php
                                $query = "select * from produto";  
                                $stmt = $objProd->runQuery($query);
                                $stmt->execute();
                                while($objProd = $stmt->fetch(PDO::FETCH_ASSOC)){                    
                            ?>
                                    <tr>
                                        <td><?php echo($objProd['id']) ?></td>
                                        <td><?php  echo($objProd['nome']) ?></td>
                                        <td><?php echo($objProd['quantidade']) ?></td>
                                        <td><?php echo($objProd['valor']) ?></td>
                                        <td>
                                        <button type="button" class="btn btn-info"
                                            data-toggle="modal" data-target="#myModalEditar"
                                            data-id="<?php echo($objProd['id']) ?>"
                                            data-nome="<?php echo($objProd['nome']) ?>"
                                            data-quantidade="<?php echo($objProd['quantidade']) ?>"
                                            data-valor="<?php echo($objProd['valor']) ?>">
                                            Editar
                                        </button>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-danger"
                                                data-toggle="modal" data-target="#myModalDeletar"
                                                data-id="<?php echo($objProd['id']) ?>"
                                                data-nome="<?php echo($objProd['nome']) ?>">
                                                    Deletar
                                            </button>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                        </tbody>
                </table>

            </div>
        </div>

        <!-- The Modal Cadastrar-->
        <div class="modal" id="myModalCadastrar">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header" style="background-color: black; color:white">
                        <h4 class="modal-title">Cadastrar Produto</h4>
                        <button type="button" class="close" data-dismiss="modal" style="color:white">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                            <form action="controle/ctr_produtos.php" method="POST">
                                <input type="hidden" name="insert">
                                <div class="form-group">
                                    <label for="">Nome</label>
                                    <input type="text" class="form-control" name="txtNome" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Quantidade</label>
                                    <input type="text" class="form-control" name="txtQuantidade" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Valor</label>
                                    <input type="text" class="form-control" name="txtValor" required>
                                </div>
                                <button type="submit" class="btn btn-success">Enviar</button>
                            </form>
                    </div>
                </div>
            </div>
        </div>


        <!-- The Modal Deletar-->
        <div class="modal" id="myModalDeletar">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header" style="background-color: black; color:white">
                        <h4 class="modal-title">Deletar Produto</h4>
                        <button type="button" class="close" data-dismiss="modal" style="color:white">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                            <form action="controle/ctr_produtos.php" method="POST">
                                <input type="hidden" name="delete" id="recipient-id">
                                <div class="form-group">
                                    <label for="">Nome</label>
                                    <input type="text" class="form-control" name="txtNome" id="recipient-nome" readonly>
                                </div>
                            
                                <button type="submit" class="btn btn-success">Enviar</button>
                            </form>
                    </div>
                </div>
            </div>
        </div>


        <!-- The Modal Editar-->
        <div class="modal" id="myModalEditar">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header" style="background-color: black; color:white">
                        <h4 class="modal-title">Editar Produto</h4>
                        <button type="button" class="close" data-dismiss="modal" style="color:white">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                            <form action="controle/ctr_produtos.php" method="POST">
                                <input type="hidden" name="editar" id="recipient-id">
                                <div class="form-group">
                                    <label for="">Nome</label>
                                    <input type="text" class="form-control" name="txtNome" id="recipient-nome">
                                </div>
                                <div class="form-group">
                                    <label for="">Quantidade</label>
                                    <input type="text" class="form-control" name="txtQuantidade" id="recipient-quantidade">
                                </div>
                                <div class="form-group">
                                    <label for="">Valor</label>
                                    <input type="text" class="form-control" name="txtValor" id="recipient-valor">
                                </div>
                                <button type="submit" class="btn btn-success">Enviar</button>
                            </form>
                    </div>
                </div>
            </div>
        </div>


        </div>
        </div>

        <script>
            $('#myModalDeletar').on('show.bs.modal', function(event){
                var button = $(event.relatedTarget)
                var recipientId = button.data('id');
                var recipientNome = button.data('nome')

                var modal = $(this)
                modal.find('#recipient-id').val(recipientId);
                modal.find('#recipient-nome').val(recipientNome);
            })
        </script>

        <script>
            $('#myModalEditar').on('show.bs.modal', function(event){
                var button = $(event.relatedTarget)
                var recipientId = button.data('id')
                var recipientNome = button.data('nome')
                var recipientQuantidade = button.data('quantidade')
                var recipientValor = button.data('valor')

                var modal = $(this)
                modal.find('#recipient-id').val(recipientId)
                modal.find('#recipient-nome').val(recipientNome)
                modal.find('#recipient-quantidade').val(recipientQuantidade)
                modal.find('#recipient-valor').val(recipientValor)
            })
        </script>

    </body>
</html>