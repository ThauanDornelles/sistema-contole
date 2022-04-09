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
            Nome do Relatório:
          </label>
            <input required="required" type="text" class="form-control" id="nome" placeholder="Relatório Mensal de Bois" />
        </div>
      </div>
        <div class="col-md-2 mt-2">
            <button class="btn btn-primary mt-4">Salvar Relatório</button>
        </div>
    </div>
  </div>

  <div class="container historico-cards-container">
    <h3 class="p-3 text-center">Itens do Relatório</h2>
    <div class="row" id="itensCadastrados">
      <!-- HTML sendo feito pelo Javascript -->
        <table class="table table-bordered">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Número do Brinco</th>
                <th scope="col">Número Mãe</th>
                <th scope="col">Espécie</th>
                <th scope="col">Quantidade</th>
                <th scope="col">Data</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <th scope="row">1</th>
                <td><input type="text" class="form-control" /></td>
                <td><input type="text" class="form-control" /></td>
                <td><input type="text" class="form-control" /></td>
                <td><input type="text" class="form-control" /></td>
                <td><input type="text" class="form-control" /></td>
                </tr>
                <tr>
                <th scope="row">2</th>
                <td><input type="text" class="form-control" /></td>
                <td><input type="text" class="form-control" /></td>
                <td><input type="text" class="form-control" /></td>
                <td><input type="text" class="form-control" /></td>
                <td><input type="text" class="form-control" /></td>
                </tr>
                <tr>
                <th scope="row">3</th>
                <td><input type="text" class="form-control" /></td>
                <td><input type="text" class="form-control" /></td>
                <td><input type="text" class="form-control" /></td>
                <td><input type="text" class="form-control" /></td>
                <td><input type="text" class="form-control" /></td>
                </tr>
                <tr>
                <th scope="row">4</th>
                <td><input type="text" class="form-control" /></td>
                <td><input type="text" class="form-control" /></td>
                <td><input type="text" class="form-control" /></td>
                <td><input type="text" class="form-control" /></td>
                <td><input type="text" class="form-control" /></td>
                </tr>
                <tr>
                <th scope="row">5</th>
                <td><input type="text" class="form-control" /></td>
                <td><input type="text" class="form-control" /></td>
                <td><input type="text" class="form-control" /></td>
                <td><input type="text" class="form-control" /></td>
                <td><input type="text" class="form-control" /></td>
                </tr>
                <tr>
                <th scope="row">6</th>
                <td><input type="text" class="form-control" /></td>
                <td><input type="text" class="form-control" /></td>
                <td><input type="text" class="form-control" /></td>
                <td><input type="text" class="form-control" /></td>
                <td><input type="text" class="form-control" /></td>
                </tr>
                <tr>
                <th scope="row">7</th>
                <td><input type="text" class="form-control" /></td>
                <td><input type="text" class="form-control" /></td>
                <td><input type="text" class="form-control" /></td>
                <td><input type="text" class="form-control" /></td>
                <td><input type="text" class="form-control" /></td>
                </tr>
            </tbody>
        </table>
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
    
  <style>
        table input {
            border: none !important;
            outline: none !important;
        }

        textarea:focus, table input:focus{
            outline:0px !important;
            -webkit-appearance:none !important;
        }
    </style>

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