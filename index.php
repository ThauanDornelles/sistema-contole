<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Portal</title>
    <link rel="stylesheet" href="css/index/style.css" />
    <link rel="stylesheet" href="css/geral.css" />
    <script
      src="https://kit.fontawesome.com/4bed44fa76.js"
      crossorigin="anonymous"
    ></script>
    <link
      rel="stylesheet"
      href="plugins/bootstrap-5.1.3-dist/css/bootstrap.min.css"
    />
  </head>
  <body>
    <div id="navbar"></div>
    <div class="container main-content">
      <div class="row">
        <div class="col-md-4">
          <div class="cards-navegacao">
            <h4 class="titulo-card text-center">
              Receitas
            </h4>
            <p class="descricao-card">
              Mussum Ipsum, cacilds vidis litro abertis. Quem num gosta di mim
              que vai caçá sua turmis! Admodum accumsan disputationi eu sit.
            </p>
            <div class="container-botoes-navegacao">
              <button
                onclick="abrirLink('views/receitas/receitas')"
                class="botao btn btn-primary"
              >
                <i class="fas fa-eye"></i>
              </button>
              <button
                onclick="abrirLink('views/receitas/cadastroReceitas')"
                class="botao btn btn-primary"
              >
                <i class="fas fa-plus"></i>
              </button>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="cards-navegacao">
            <h4 class="titulo-card text-center">
              Despesas
            </h4>
            <p class="descricao-card">
              Mussum Ipsum, cacilds vidis litro abertis. Quem num gosta di mim
              que vai caçá sua turmis! Admodum accumsan disputationi eu sit.
            </p>
            <div class="container-botoes-navegacao">
              <button
                onclick="abrirLink('views/despesas/despesas')"
                class="botao btn btn-primary"
              >
                <i class="fas fa-eye"></i>
              </button>
              <button
                onclick="abrirLink('views/despesas/cadastroDespesas')"
                class="botao btn btn-primary"
              >
                <i class="fas fa-plus"></i>
              </button>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="cards-navegacao">
            <h4 class="titulo-card text-center">
              Controle de Pastagens
            </h4>
            <p class="descricao-card">
              Mussum Ipsum, cacilds vidis litro abertis. Quem num gosta di mim
              que vai caçá sua turmis! Admodum accumsan disputationi eu sit.
            </p>
            <div class="container-botoes-navegacao">
              <button
                onclick="abrirLink('views/pastagem/pastagem')"
                class="botao btn btn-primary"
              >
                <i class="fas fa-eye"></i>
              </button>
              <button
                onclick="abrirLink('views/pastagem/cadastroPastagem')"
                class="botao btn btn-primary"
              >
                <i class="fas fa-plus"></i>
              </button>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-4">
          <div class="cards-navegacao">
            <h4 class="titulo-card text-center">
              Controle de Mineralização
            </h4>
            <p class="descricao-card">
              Mussum Ipsum, cacilds vidis litro abertis. Quem num gosta di mim
              que vai caçá sua turmis! Admodum accumsan disputationi eu sit.
            </p>
            <div class="container-botoes-navegacao">
              <button
                onclick="abrirLink('views/mineralizacao/mineralizacao')"
                class="botao btn btn-primary"
              >
                <i class="fas fa-eye"></i>
              </button>
              <button
                onclick="abrirLink('views/mineralizacao/cadastroMineralizacao')"
                class="botao btn btn-primary"
              >
                <i class="fas fa-plus"></i>
              </button>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="cards-navegacao">
            <h4 class="titulo-card text-center">
              Controle de Produção
            </h4>
            <p class="descricao-card">
              Mussum Ipsum, cacilds vidis litro abertis. Quem num gosta di mim
              que vai caçá sua turmis! Admodum accumsan disputationi eu sit.
            </p>
            <div class="container-botoes-navegacao">
              <button
                onclick="abrirLink('views/producao/producao')"
                class="botao btn btn-primary"
              >
                <i class="fas fa-eye"></i>
              </button>
              <button
                onclick="abrirLink('views/producao/cadastroProducao')"
                class="botao btn btn-primary"
              >
                <i class="fas fa-plus"></i>
              </button>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="cards-navegacao">
            <h4 class="titulo-card text-center">
              Controle de Ocorrências
            </h4>
            <p class="descricao-card">
              Mussum Ipsum, cacilds vidis litro abertis. Quem num gosta di mim
              que vai caçá sua turmis! Admodum accumsan disputationi eu sit.
            </p>
            <div class="container-botoes-navegacao">
              <button
                onclick="abrirLink('views/ocorrencias/ocorrencias')"
                class="botao btn btn-primary"
              >
                <i class="fas fa-eye"></i>
              </button>
              <button
                onclick="abrirLink('views/ocorrencias/cadastroOcorrencias')"
                class="botao btn btn-primary"
              >
                <i class="fas fa-plus"></i>
              </button>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-4">
          <div class="cards-navegacao">
            <h4 class="titulo-card text-center">
              Controle de Pesagens
            </h4>
            <p class="descricao-card">
              Mussum Ipsum, cacilds vidis litro abertis. Quem num gosta di mim
              que vai caçá sua turmis! Admodum accumsan disputationi eu sit.
            </p>
            <div class="container-botoes-navegacao">
              <button
                onclick="abrirLink('views/pesagens/pesagens')"
                class="botao btn btn-primary"
              >
                <i class="fas fa-eye"></i>
              </button>
              <button
                onclick="abrirLink('views/pesagens/cadastroPesagens')"
                class="botao btn btn-primary"
              >
                <i class="fas fa-plus"></i>
              </button>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="cards-navegacao">
            <h4 class="titulo-card text-center">
              Controle Reprodutivo
            </h4>
            <p class="descricao-card">
              Mussum Ipsum, cacilds vidis litro abertis. Quem num gosta di mim
              que vai caçá sua turmis! Admodum accumsan disputationi eu sit.
            </p>
            <div class="container-botoes-navegacao">
              <button
                onclick="abrirLink('views/reprodutivo/reprodutivo')"
                class="botao btn btn-primary"
              >
                <i class="fas fa-eye"></i>
              </button>
              <button
                onclick="abrirLink('views/reprodutivo/cadastroReprodutivo')"
                class="botao btn btn-primary"
              >
                <i class="fas fa-plus"></i>
              </button>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="cards-navegacao">
            <h4 class="titulo-card text-center">
              Controle de Nascimento
            </h4>
            <p class="descricao-card">
              Mussum Ipsum, cacilds vidis litro abertis. Quem num gosta di mim
              que vai caçá sua turmis! Admodum accumsan disputationi eu sit.
            </p>
            <div class="container-botoes-navegacao">
              <button
                onclick="abrirLink('views/nascimento/nascimento')"
                class="botao btn btn-primary"
              >
                <i class="fas fa-eye"></i>
              </button>
              <button
                onclick="abrirLink('views/nascimento/cadastroNascimento')"
                class="botao btn btn-primary"
              >
                <i class="fas fa-plus"></i>
              </button>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-4">
          <div class="cards-navegacao">
            <h4 class="titulo-card text-center">
              Controle Sanitário
            </h4>
            <p class="descricao-card">
              Mussum Ipsum, cacilds vidis litro abertis. Quem num gosta di mim
              que vai caçá sua turmis! Admodum accumsan disputationi eu sit.
            </p>
            <div class="container-botoes-navegacao">
              <button
                onclick="abrirLink('views/sanitario/sanitario')"
                class="botao btn btn-primary"
              >
                <i class="fas fa-eye"></i>
              </button>
              <button
                onclick="abrirLink('views/sanitario/cadastroSanitario')"
                class="botao btn btn-primary"
              >
                <i class="fas fa-plus"></i>
              </button>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="cards-navegacao">
            <h4 class="titulo-card text-center">
              Movimentação Interna do Rebanho
            </h4>
            <p class="descricao-card">
              Mussum Ipsum, cacilds vidis litro abertis. Quem num gosta di mim
              que vai caçá sua turmis! Admodum accumsan disputationi eu sit.
            </p>
            <div class="container-botoes-navegacao">
              <button
                onclick="abrirLink('views/movimentacao/movimentacao')"
                class="botao btn btn-primary"
              >
                <i class="fas fa-eye"></i>
              </button>
              <button
                onclick="abrirLink('views/movimentacao/cadastroMovimentacao')"
                class="botao btn btn-primary"
              >
                <i class="fas fa-plus"></i>
              </button>
            </div>
          </div>
        </div>

        <div class="col-md-4"></div>
      </div>
    </div>

    <script
      type="text/javascript"
      src="plugins/bootstrap-5.1.3-dist/js/bootstrap.min.js"
    ></script>
    <script
      src="https://code.jquery.com/jquery-3.6.0.min.js"
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
      crossorigin="anonymous"
    ></script>
    <script type="text/javascript" src="js/index.js"></script>
    <script type="text/javascript" src="js/navbar.js"></script>
    <script type="text/javascript" src="js/rotas.js"></script>
  </body>
</html>
