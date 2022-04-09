<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatórios</title>
    <link rel="stylesheet" href="../../css/geral.css" />
    <link rel="stylesheet" href="../../css/cadastroReceitas/style.css" />
    <script src="https://kit.fontawesome.com/4bed44fa76.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../plugins/bootstrap-5.1.3-dist/css/bootstrap.min.css" />
</head>
<body>
<div id="navbar"></div>
  <h1 class="text-center titulo-pagina">Relatórios</h1>
  <div class="container tela-cadastro">
  <div class="row">
      <div class="col-md-4">
        <div class="form-group mb-3">
          <label for="receitas" class="form-label">
            Nome:
          </label>
          <input required="required" type="text" class="form-control" id="nome" placeholder="Bezerros..." />
        </div>
      </div>

      <div class="col-md-2">
        <div class="form-group mb-3">
          <label for="quantidadeInicial" class="form-label">
            Quantidade inicial:
          </label>
          <input required="required" type="number" class="form-control" id="quantidadeInicial" placeholder="2" />
        </div>
      </div>

      <div class="col-md-2">
        <div class="form-group mb-3">
          <label for="quantidadeFinal" class="form-label">
            Quantidade final:
          </label>
          <input required="required" type="number" class="form-control" id="quantidadeFinal" placeholder="2" />
        </div>
      </div>

      <div class="col-md-2">
        <div class="form-group mb-3">
          <label for="pesoInicial" class="form-label">
            Peso inicial (arrobas):
          </label>
          <input required="required" type="number" class="form-control" id="pesoInicial" placeholder="23" />
        </div>
      </div>

      <div class="col-md-2">
        <div class="form-group mb-3">
          <label for="pesoFinal" class="form-label">
            Peso final (arrobas):
          </label>
          <input required="required" type="number" class="form-control" id="pesoFinal" placeholder="23" />
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="modalExcluir" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Excluir item</h5>
          <button type="button" class="btn-close" id="closeModalExcluir" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body mt-3">
          <input type="hidden" id="inputExcluir" />
          <p>Deseja excluir o item?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="button" onclick="excluirReceita()" class="btn btn-danger">Excluir</button>
        </div>
      </div>
    </div>
  </div>
    
  <script type="text/javascript" src="../../plugins/bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    
  <script type="text/javascript" src="../../js/controllers/relatorios.js"></script>
  <script type="text/javascript" src="../../js/geral.js"></script>
  <script type="text/javascript" src="../../js/index.js"></script>
  <script type="text/javascript" src="../../js/components/navbar.js"></script>
  <script type="text/javascript" src="../../js/rotas.js"></script>
</body>
</html>