<?php
require_once '../../Database/Conexao.php';
require_once '../../Models/Receitas.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Cadastro de Receitas</title>
  <link rel="stylesheet" href="../../css/geral.css" />
  <link rel="stylesheet" href="../../css/cadastroReceitas/style.css" />
  <script src="https://kit.fontawesome.com/4bed44fa76.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../../plugins/bootstrap-5.1.3-dist/css/bootstrap.min.css" />
</head>

<body>
  <div id="navbar"></div>
  <h1 class="text-center titulo-pagina">Cadastro de Receitas</h1>
  <div class="container tela-cadastro">
    <div class="row">
      <div class="col-md-2">
        <div class="form-group mb-3">
          <label for="receitas" class="form-label">
            Receitas:
          </label>
          <input required="required" type="text" class="form-control" id="receitas" placeholder="Bezerros..." />
        </div>
      </div>

      <div class="col-md-2">
        <div class="form-group mb-3">
          <label for="quantidade" class="form-label">
            Quantidade:
          </label>
          <input required="required" type="number" class="form-control" id="quantidade" placeholder="2" />
        </div>
      </div>

      <div class="col-md-2">
        <div class="form-group mb-3">
          <label for="peso" class="form-label">
            Peso (arrobas):
          </label>
          <input required="required" type="number" class="form-control" id="peso" placeholder="23" />
        </div>
      </div>

      <div class="col-md-2">
        <div class="form-group mb-3">
          <label for="valorUnitario" class="form-label">
            Valor Unitário (R$):
          </label>
          <input required="required" type="text" class="form-control" id="valorUnitario" placeholder="60.00" />
        </div>
      </div>

      <div class="col-md-2">
        <div class="form-group mb-3">
          <label for="valor" class="form-label">
            Valor (R$):
          </label>
          <input required="required" type="text" class="form-control" id="valor" placeholder="120.00" />
        </div>
      </div>

      <div class="col-md-2">
        <div class="form-group mb-3">
          <label for="data" class="form-label">
            Data:
          </label>
          <input required="required" type="date" class="form-control" id="data" />
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label for="observacao">Observação:</label>
          <textarea required="required" class="form-control" id="observacao" rows="2"></textarea>
        </div>
      </div>
    </div>

    <div class="row mt-3">
      <div class="d-flex flex-row-reverse">
        <button onclick="control.cadastrar()" class="btn btn-primary botao-salvar">Salvar</button>
      </div>
    </div>
  </div>

  <div class="container historico-cards-container">
    <h3 class="p-3 text-center">Últimos itens cadastrados:</h2>
      <div class="row" id="itensCadastrados">
        <!-- HTML sendo feito pelo Javascript -->
      </div>
  </div>

  <script type="text/javascript" src="../../plugins/bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <!-- <script type="module">
    import { cadastrar } from "../../controllers/cadastroReceitas.js"
    control.cadastrar = cadastrar
  </script> -->
  <script type="text/javascript" src="../../js/cadastroReceitas.js"></script>
  <script type="text/javascript" src="../../js/geral.js"></script>
  <script type="text/javascript" src="../../js/index.js"></script>
  <script type="text/javascript" src="../../js/navbar.js"></script>
  <script type="text/javascript" src="../../js/rotas.js"></script>
</body>

</html>