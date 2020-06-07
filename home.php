<?php
    session_start();

    if (empty($_SESSION)) {
        header("Location: index.php");
    }

    require_once("libs/conexao.php");

    $sqlProdutos = "SELECT produto.id_produto,
                           produto.nome,
                           produto.preco,
                           produto.quantidade,
                           categorias.nome as nome_categoria
                      FROM produto
                     INNER JOIN categorias
                        ON id = id_categoria
                        WHERE produto.quantidade > 0;";

    $resultProdutos = mysqli_query($conexao, $sqlProdutos) or die("Erro: ".mysqli_error($conexao));

    $aProdutos = mysqli_fetch_all($resultProdutos, MYSQLI_ASSOC);
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Loja</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg" style="background-color: #e3f2fd;">
  <a class="navbar-brand" href="#">E Commerce </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav"><li class="nav-item active">
    <a class="nav-link" href="#">Comprar</a> 
</li>
<li class="nav-item">
    <a class="nav-link" href="produto.php">Cadastra-se</a>
</li>
</ul>
</div>
</nav>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col"></th>
                    
                        <th scope="col">Nome</th>
                        <th scope="col">Preço</th>
                        <th scope="col">Quantidade</th>
                        <th scope="col">Categoria do produto</th>
                        <th scope="col">Comprar</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($aProdutos as $aProduto) : ?>
                        <tr>
                            <th scope="row"><?= $aProduto["id_produto"] ?></th>
                            <td><?= $aProduto["nome"] ?></td>
                            <td><?= $aProduto["preco"] ?></td>
                            <td><?= $aProduto["quantidade"] ?></td>
                            <td><?= $aProduto["nome_categoria"] ?></td>
                            <td><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal" onclick="document.getElementById('id_produto').value = <?= $aProduto['id_produto'] ?>">Comprar</button></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Finalizar Compra</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="functions/comprar.php" method="post">
        <input type="hidden" name="id_produto" id="id_produto">
        <div class="modal-body">
                <div class="form-group">
                    <label for="quantidade">Quantidade</label>
                    <input type="text" class="form-control" id="quantidade" name="quantidade">
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Comprar</button>
        </div>
      </form>
    </div>
  </div>
</div>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
    crossorigin="anonymous"></script>
</body>

</html>