<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Movimentação Interna Rebanho</title>    
    <link rel="stylesheet" href="../../css/geral.css" />
    <link rel="stylesheet" href="../../css/cadastroReceitas/style.css" />
    <script src="https://kit.fontawesome.com/4bed44fa76.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../plugins/bootstrap-5.1.3-dist/css/bootstrap.min.css" />
    <script
      src="https://kit.fontawesome.com/4bed44fa76.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
  <div id="navbar"></div>
  <h1 class="text-center titulo-pagina">Cadastro de Movimentação Interna do Rebanho</h1>
  <div class="container tela-cadastro">  
  <div class="row">

<div class="col-md-2">
  <div class="form-group mb-3">
    <label for="data" class="form-label">
      Data Inicial:
    </label>
    <input type="date" class="form-control" id="dataInicial" />
  </div>
</div>

<div class="col-md-2">
  <div class="form-group mb-3">
    <label for="data" class="form-label">
      Data Final:
    </label>
    <input type="date" class="form-control" id="dataFinal" />
  </div>
</div>

<div class="col-md-2">
  <div class="form-group mb-3">
    <label for="numero" class="form-label">
      Número Inicial:
    </label>
    <input type="number" class="form-control" id="numeroInicial" placeholder="2" />
  </div>
</div>

<div class="col-md-2">
  <div class="form-group mb-3">
    <label for="numero" class="form-label">
      Número Final:
    </label>
    <input type="number" class="form-control" id="numeroFinal" placeholder="7" />
  </div>
</div>

<div class="col-md-2">
  <div class="form-group mb-3">
    <label for="peso" class="form-label">
      Peso inicial:
    </label>
    <input type="number" class="form-control" id="pesoInicial" placeholder="23" />
  </div>
</div>

<div class="col-md-2">
  <div class="form-group mb-3">
    <label for="peso" class="form-label">
      Peso Final:
    </label>
    <input type="number" class="form-control" id="pesoFinal" placeholder="43" />
  </div>
</div>

<div class="col-md-2">
  <div class="form-group mb-3">
    <label for="origem" class="form-label">
      Fase de Origem:
    </label>
    <input type="text" class="form-control" id="faseOrigem" placeholder="Recria" />
  </div>
</div>

<div class="col-md-2">
  <div class="form-group mb-3">
    <label for="destino" class="form-label">
      Fase de Destino:
    </label>
    <input type="text" class="form-control" id="faseDestino" placeholder="Engorda" />
  </div>
</div>
</div>
<div class="row">
      <div class="d-flex flex-row-reverse">
        <button onclick="pesquisar()" class="btn btn-primary botao-pesquisar">Pesquisar</button>
        <button onclick="exportarXlsx()" class="btn btn-primary botao-pesquisar botao-exportar">Exportar</button>
      </div>
    </div>
</div>

<div class="container historico-cards-container">
  <h3 class="p-3 text-center">Últimos itens cadastrados:</h2>
  <div class="row" id="itensCadastrados">
    <!-- HTML sendo feito pelo Javascript -->
  </div> 
</div>

  <div class="botao-cadastrar">
    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#modalCadastrar">
      <i class="fas fa-plus"></i>
    </button>
  </div>

  <!-- Modais -->
  <div class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar Receita</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" id="inputEditar" />
          <form>
            <div class="row">
              <div class="col-md-3">
                <div class="form-group mb-3">
                  <label for="numero" class="form-label">
                    Número:
                  </label>
                  <input type="number" class="form-control" id="alterar-numero" placeholder="2" />
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group mb-3">
                  <label for="data" class="form-label">
                    Data Inicial:
                  </label>
                  <input type="date" class="form-control" id="alterar-data" />
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group mb-3">
                  <label for="peso" class="form-label">
                    Peso:
                  </label>
                  <input type="text" class="form-control" id="alterar-peso" />
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group mb-3">
                  <label for="fase-origem" class="form-label">
                    Fase Origem:
                  </label>
                  <input type="text" class="form-control" id="alterar-fase-origem" />
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group mb-3">
                  <label for="fase-destino" class="form-label">
                    Fase Destino:
                  </label>
                  <input type="text" class="form-control" id="alterar-fase-destino" />
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="button" onclick="editarMovimentacao()" class="btn btn-primary">Editar</button>
        </div>
      </div>
    </div>
  </div>
  
  <div class="modal fade" id="modalCadastrar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cadastrar Movimentação Interna</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-3">
              <div class="form-group mb-3">
                <label for="numero" class="form-label">
                  Número:
                </label>
                <input type="number" class="form-control" id="inserir-numero" placeholder="2" />
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group mb-3">
                <label for="data" class="form-label">
                  Data Inicial:
                </label>
                <input type="date" class="form-control" id="inserir-data" />
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group mb-3">
                <label for="peso" class="form-label">
                  Peso:
                </label>
                <input type="text" class="form-control" id="inserir-peso" />
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group mb-3">
                <label for="fase-origem" class="form-label">
                  Fase Origem:
                </label>
                <input type="text" class="form-control" id="inserir-fase-origem" />
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group mb-3">
                <label for="fase-destino" class="form-label">
                  Fase Destino:
                </label>
                <input type="text" class="form-control" id="inserir-fase-destino" />
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button onclick="cadastrarMovimentacao()" class="btn btn-primary botao-salvar">Salvar</button>
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
          <button type="button" onclick="excluirMovimentacao()" class="btn btn-danger">Excluir</button>
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript" src="../../js/controllers/movimentacao.js"></script>
  <script type="text/javascript" src="../../js/geral.js"></script>
  <script type="text/javascript" src="../../js/index.js"></script>
  <script type="text/javascript" src="../../js/components/navbar.js"></script>
  <script type="text/javascript" src="../../js/rotas.js"></script>
  <script type="text/javascript" src="../../plugins/bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</body>
</html>
