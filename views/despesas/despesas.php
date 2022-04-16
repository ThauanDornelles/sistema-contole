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
  <script src="https://kit.fontawesome.com/4bed44fa76.js" crossorigin="anonymous"></script>
</head>

<body>
  <div id="navbar"></div>
  <h1 class="text-center titulo-pagina">Cadastro de Despesas</h1>
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

      <div class="col-md-4">
        <div class="form-group mb-3">
          <label for="despesas" class="form-label">
            Despesa:
          </label>
          <input type="text" class="form-control" id="despesa" placeholder="ivermectina..." />
        </div>
      </div>

      <div class="col-md-2">
        <div class="form-group mb-3">
          <label for="quantidade" class="form-label">
            Quantidade Inicial:
          </label>
          <input type="number" class="form-control" id="quantidadeInicial" placeholder="2" />
        </div>
      </div>

      <div class="col-md-2">
        <div class="form-group mb-3">
          <label for="quantidade" class="form-label">
            Quantidade Final:
          </label>
          <input type="number" class="form-control" id="quantidadeFinal" placeholder="2" />
        </div>
      </div>

      <div class="col-md-2">
        <div class="form-group mb-3">
          <label for="tipo" class="form-label">
            Tipo:
          </label>
          <input type="text" class="form-control" id="tipo" placeholder="Concentrado" />
        </div>
      </div>

      <div class="col-md-2">
        <div class="form-group mb-3">
          <label for="valorUnitario" class="form-label">
            Valor Un. Inicial:
          </label>
          <input type="text" class="form-control" id="valorUnitarioInicial" placeholder="60.00" />
        </div>
      </div>

      <div class="col-md-2">
        <div class="form-group mb-3">
          <label for="valorUnitario" class="form-label">
            Valor Un. Final:
          </label>
          <input type="text" class="form-control" id="valorUnitarioFinal" placeholder="60.00" />
        </div>
      </div>

      <div class="col-md-2">
        <div class="form-group mb-3">
          <label for="valor" class="form-label">
            Valor Total Inicial:
          </label>
          <input type="text" class="form-control" id="valorTotalInicial" placeholder="120.00" />
        </div>
      </div>

      <div class="col-md-2">
        <div class="form-group mb-3">
          <label for="valor" class="form-label">
            Valor Total Final:
          </label>
          <input type="text" class="form-control" id="valorTotalFinal" placeholder="120.00" />
        </div>
      </div>

      <div class="col-md-2">
        <div class="form-group mb-3">
          <label for="fase" class="form-label">
            Fase:
          </label>
          <input type="text" class="form-control" id="fase" placeholder="Engorda" />
        </div>
      </div>
    </div>
    <div class="row mt-3">
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
              <div class="col-md-4">
                <div class="form-group mb-3">
                  <label for="data" class="form-label">
                    Data:
                  </label>
                  <input type="date" class="form-control" id="alterar-data" />
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group mb-3">
                  <label for="despesas" class="form-label">
                    Despesa:
                  </label>
                  <input type="text" class="form-control" id="alterar-despesa" placeholder="ivermectina..." />
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group mb-3">
                  <label for="quantidade" class="form-label">
                    Quantidade:
                  </label>
                  <input type="number" class="form-control" id="alterar-quantidade" placeholder="2" />
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group mb-3">
                  <label for="tipo" class="form-label">
                    Tipo:
                  </label>
                  <input type="text" class="form-control" id="alterar-tipo" placeholder="Concentrado" />
                </div>
              </div>

              <div class="col-md-2">
                <div class="form-group mb-3">
                  <label for="valorUnitario" class="form-label">
                    Valor Unitário (R$):
                  </label>
                  <input type="text" class="form-control" id="alterar-valor-unitario" placeholder="60.00" />
                </div>
              </div>

              <div class="col-md-2">
                <div class="form-group mb-3">
                  <label for="valor" class="form-label">
                    Valor Total(R$):
                  </label>
                  <input type="text" class="form-control" id="alterar-valor-total" placeholder="120.00" />
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group mb-3">
                  <label for="fase" class="form-label">
                    Fase:
                  </label>
                  <input type="text" class="form-control" id="alterar-fase" placeholder="Engorda" />
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="observacao">Observação:</label>
                  <textarea class="form-control" id="alterar-observacao" rows="2"></textarea>
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="button" onclick="editarDespesa()" class="btn btn-primary">Editar</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="modalCadastrar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cadastrar Movimentação Interna</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group mb-3">
                <label for="data" class="form-label">
                  Data:
                </label>
                <input type="date" class="form-control" id="inserir-data" />
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group mb-3">
                <label for="despesas" class="form-label">
                  Despesa:
                </label>
                <input type="text" class="form-control" id="inserir-despesa" placeholder="ivermectina..." />
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group mb-3">
                <label for="quantidade" class="form-label">
                  Quantidade:
                </label>
                <input type="number" class="form-control" id="inserir-quantidade" placeholder="2" />
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group mb-3">
                <label for="tipo" class="form-label">
                  Tipo:
                </label>
                <input type="text" class="form-control" id="inserir-tipo" placeholder="Concentrado" />
              </div>
            </div>

            <div class="col-md-2">
              <div class="form-group mb-3">
                <label for="valorUnitario" class="form-label">
                  Valor Unitário (R$):
                </label>
                <input type="text" class="form-control" id="inserir-valor-unitario" placeholder="60.00" />
              </div>
            </div>

            <div class="col-md-2">
              <div class="form-group mb-3">
                <label for="valor" class="form-label">
                  Valor Total(R$):
                </label>
                <input type="text" class="form-control" id="inserir-valor-total" placeholder="120.00" />
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group mb-3">
                <label for="fase" class="form-label">
                  Fase:
                </label>
                <input type="text" class="form-control" id="inserir-fase" placeholder="Engorda" />
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="observacao">Observação:</label>
                <textarea class="form-control" id="inserir-observacao" rows="2"></textarea>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button onclick="cadastrarDespesa()" class="btn btn-primary botao-salvar">Salvar</button>
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
          <button type="button" onclick="excluirDespesa()" class="btn btn-danger">Excluir</button>
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript" src="../../js/controllers/despesas.js"></script>
  <script type="text/javascript" src="../../js/geral.js"></script>
  <script type="text/javascript" src="../../js/index.js"></script>
  <script type="text/javascript" src="../../js/components/navbar.js"></script>
  <script type="text/javascript" src="../../js/rotas.js"></script>
  <script type="text/javascript" src="../../plugins/bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</body>

</html>