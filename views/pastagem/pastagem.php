<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Cadastro de Pastagem</title>
  <link rel="stylesheet" href="../../css/geral.css" />
  <link rel="stylesheet" href="../../css/cadastroReceitas/style.css" />
  <script src="https://kit.fontawesome.com/4bed44fa76.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../../plugins/bootstrap-5.1.3-dist/css/bootstrap.min.css" />
</head>

<body>
  <div id="navbar"></div>
  <h1 class="text-center titulo-pagina">Cadastro do Controle de Pastagem</h1>
  <div class="container tela-cadastro">
    <div class="row">
      <div class="col-md-2">
        <div class="form-group mb-3">
          <label for="dataEntrada" class="form-label">
            Data De Entrada:
          </label>
          <input type="date" class="form-control" id="dataEntrada" />
        </div>
      </div>

      <div class="col-md-2">
        <div class="form-group mb-3">
          <label for="dataSaida" class="form-label">
            Data De Saída:
          </label>
          <input type="date" class="form-control" id="dataSaida" />
        </div>
      </div>

      <div class="col-md-2">
        <div class="form-group mb-3">
          <label for="lote" class="form-label">
            Lote:
          </label>
          <input type="text" class="form-control" id="lote" placeholder="Recria 2" />
        </div>
      </div>

      <div class="col-md-3">
        <div class="form-group mb-3">
          <label for="qtdAnimais" class="form-label">
            Número de Animais:
          </label>
          <input type="number" class="form-control" id="qtdAnimais" placeholder="150" />
        </div>
      </div>

      
      <div class="col-md-3">
        <div class="form-group mb-3">
          <label for="area" class="form-label">
            Área(ha):
          </label>
          <input type="number" class="form-control" id="area" placeholder="25" />
        </div>
      </div>
</div>

    <div class="row">
      <div class="col-md-2">
        <div class="form-group mb-3">
          <label for="alturaEntrada" class="form-label">
            Altura de Entrada:
          </label>
          <input type="text" class="form-control" id="alturaEntrada" placeholder="80" />
        </div>
      </div>

      <div class="col-md-2">
        <div class="form-group mb-3">
          <label for="alturaSaida" class="form-label">
            Altura de Saída:
          </label>
          <input type="text" class="form-control" id="alturaSaida" placeholder="40" />
        </div>
      </div>

    <div class="col-md-3">
      <div class="form-group mb-3">
        <label for="lotacao" class="form-label">
          Taxa de Lotação(UA/ha):
        </label>
        <input type="number" class="form-control" id="lotacao" placeholder="4" />
      </div>
    </div>
    <div class="col-md-3">
      <div class="form-group mb-3">
        <label for="peso" class="form-label">
          Peso Médio do Lote(Kg/cab):
        </label>
        <input type="number" class="form-control" id="peso" placeholder="23" />
      </div>
    </div>
    <div class="col-md-2 d-flex mt-3 flex-row-reverse align-items-center">
      <button class="btn btn-primary botao-salvar">Salvar</button>
    </div>
  </div>
  </div>
  </div>

  <div class="container historico-cards-container">
    <h3 class="p-3 text-center">Últimos itens cadastrados:</h2>
      <div class="row" id="itensCadastrados">
        
      </div>
  </div>
  </div>

  <script type="text/javascript" src="../../plugins/bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script type="text/javascript" src="../../js/index.js"></script>
  <script type="text/javascript" src="../../js/navbar.js"></script>
  <script type="text/javascript" src="../../js/rotas.js"></script>
</body>

</html>