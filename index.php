<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Portal</title>
  <link rel="stylesheet" href="css/index/style.css" />
  <link rel="stylesheet" href="css/geral.css" />
  <script src="https://kit.fontawesome.com/4bed44fa76.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="plugins/bootstrap-5.1.3-dist/css/bootstrap.min.css" />
</head>

<body>
  <div id="navbar"></div>
   <div class="container main-content">
    <div class="row">
      <div class="col-md-4">
        <buttom onclick="abrirLink('views/receitas/receitas.php')">
          <div class="cards-navegacao">
            <h4 class="titulo-card text-center">
              Receitas
            </h4>
        </buttom>
      </div>
    </div>

  <div class="col-md-4">
    <buttom onclick="abrirLink('views/movimentacao/movimentacao.php')">
      <div class="cards-navegacao">
        <h4 class="titulo-card text-center">
          Movimentação Interna do Rebanho
        </h4>
     </buttom>
    </div>
   </div>

   <div class="col-md-4">
      <buttom onclick="abrirLink('views/despesas/despesas.php')">
        <div class="cards-navegacao">
          <h4 class="titulo-card text-center">
            Despesas
          </h4>
      </buttom>
    </div>
  </div>
  </div>

  <div class="row">
    <div class="col-md-3">
      <buttom onclick="abrirLink('views/pastagem/pastagem.php')">
        <div class="cards-navegacao">
          <h4 class="titulo-card text-center">
            Controles de Pastagens
          </h4>
      </buttom>
    </div>
  </div>


  <div class="col-md-3">
    <buttom onclick="abrirLink('views/mineralizacao/mineralizacao.php')">
      <div class="cards-navegacao">
        <h4 class="titulo-card text-center">
          Controles de Mineralização
        </h4>
    </buttom>
   </div>
  </div>

  <div class="col-md-3">
    <buttom onclick="abrirLink('views/producao/producao.php')">
      <div class="cards-navegacao">
        <h4 class="titulo-card text-center">
          Controles de Produção
        </h4>
    </buttom>
   </div>
  </div>

  <div class="col-md-3">
    <buttom onclick="abrirLink('views/ocorrencias/ocorrencias.php')">
      <div class="cards-navegacao">
        <h4 class="titulo-card text-center">
          Controles de Ocorrências
        </h4>
     </buttom>
    </div>
   </div>
  </div>

  <div class="row">
    <div class="col-md-3">
      <buttom onclick="abrirLink('views/pesagens/pesagens.php')">
        <div class="cards-navegacao">
          <h4 class="titulo-card text-center">
            Controles de Pesagens
          </h4>
      </buttom>
    </div>
  </div>

  <div class="col-md-3">
    <buttom onclick="abrirLink('views/reprodutivo/reprodutivo.php')">
      <div class="cards-navegacao">
        <h4 class="titulo-card text-center">
          Controles Reprodutivos
        </h4>
      </div>
    </buttom>
  </div>

  <div class="col-md-3">
    <buttom onclick="abrirLink('views/nascimento/nascimento.php')">
      <div class="cards-navegacao">
        <h4 class="titulo-card text-center">
          Controles de Nascimentos
        </h4>
      </div>
    </buttom>
  </div>


  <div class="col-md-3">
    <buttom onclick="abrirLink('views/sanitario/sanitario.php')">
      <div class="cards-navegacao">
        <h4 class="titulo-card text-center">
          Controles Sanitários
        </h4>
       </buttom>
      </div>
     </div>
   </div>
  </div>

  <script type="text/javascript" src="plugins/bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script type="text/javascript" src="js/index.js"></script>
  <script type="text/javascript" src="js/components/navbar.js"></script>
  <script type="text/javascript" src="js/rotas.js"></script>
</body>

</html>