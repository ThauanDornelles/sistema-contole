<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Controle de receita</title>
  <link rel="stylesheet" href="../../css/geral.css" />
  <link rel="stylesheet" href="../../css/cadastroReceitas/consulta.css" />
  <link rel="stylesheet" href="../../css/cadastroReceitas/style.css" />
  <script src="https://kit.fontawesome.com/4bed44fa76.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../../plugins/bootstrap-5.1.3-dist/css/bootstrap.min.css" />
</head>

<body>
  <div id="navbar"></div>
  <h1 class="text-center titulo-pagina">Consulta de Receitas</h1>
  <div class="container tela-cadastro">
    <div class="row">
      <div class="col-md-4">
        <div class="form-group mb-3">
          <label for="receitas" class="form-label">
            Receitas:
          </label>
          <input required="required" type="text" class="form-control" id="receitas" placeholder="Bezerros..." />
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

    <div class="row">
      <div class="col-md-2">
        <div class="form-group mb-3">
          <label for="valorUnitarioInicial" class="form-label">
            Valor Un. inicial (R$):
          </label>
          <input required="required" type="text" class="form-control" id="valorUnitarioInicial" placeholder="60.00" />
        </div>
      </div>

      <div class="col-md-2">
        <div class="form-group mb-3">
          <label for="valorUnitarioFinal" class="form-label">
            Valor Un. final (R$):
          </label>
          <input required="required" type="text" class="form-control" id="valorUnitarioFinal" placeholder="60.00" />
        </div>
      </div>

      <div class="col-md-2">
        <div class="form-group mb-3">
          <label for="valorInicial" class="form-label">
            Valor inicial (R$):
          </label>
          <input required="required" type="text" class="form-control" id="valorInicial" placeholder="120.00" />
        </div>
      </div>

      <div class="col-md-2">
        <div class="form-group mb-3">
          <label for="valorFinal" class="form-label">
            Valor final (R$):
          </label>
          <input required="required" type="text" class="form-control" id="valorFinal" placeholder="120.00" />
        </div>
      </div>

      <div class="col-md-2">
        <div class="form-group mb-3">
          <label for="dataInicial" class="form-label">
            Data inicial:
          </label>
          <input required="required" type="date" class="form-control" id="dataInicial" />
        </div>
      </div>

      <div class="col-md-2">
        <div class="form-group mb-3">
          <label for="dataFinal" class="form-label">
            Data final:
          </label>
          <input required="required" type="date" class="form-control" id="dataFinal" />
        </div>
      </div>
    </div>

    <div class="row mt-3">
      <div class="d-flex flex-row-reverse">
        <button onclick="control.consultar()" class="btn btn-primary botao-pesquisar">Pesquisar</button>
        <button onclick="control.Exportar()" class="btn btn-primary botao-pesquisar botao-exportar">Exportar</button>
      </div>
    </div>
  </div>
  </div>

  <div class="container historico-cards-container">
    <h3 class="p-3 text-center">Itens cadastrados</h2>
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
              <div class="col-md-6 col-xs-12">
                <div class="mb-3">
                  <label for="input-receita" class="col-form-label">Receita:</label>
                  <input type="text" class="form-control" id="alterar-receita">
                </div>
              </div>
              <div class="col-md-3 col-xs-12">
                <div class="mb-3">
                  <label for="input-quantidade" class="col-form-label">Quantidade:</label>
                  <input type="number" class="form-control" id="alterar-quantidade">
                </div>
              </div>
              <div class="col-md-3 col-xs-12">
                <div class="mb-3">
                  <label for="input-data" class="col-form-label">Data:</label>
                  <input type="date" class="form-control" id="alterar-data">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-3 col-xs-12">
                <div class="mb-3">
                  <label for="input-peso" class="col-form-label">Peso (arrobas):</label>
                  <input type="text" class="form-control" id="alterar-peso">
                </div>
              </div>
              <div class="col-md-3 col-xs-12">
                <div class="mb-3">
                  <label for="input-valor-unitario" class="col-form-label">Valor Unitário (R$):</label>
                  <input type="text" class="form-control" id="alterar-valorUnitario">
                </div>
              </div>
              <div class="col-md-3 col-xs-12">
                <div class="mb-3">
                  <label for="input-valor-total" class="col-form-label">Valor total (R$):</label>
                  <input type="text" class="form-control" id="alterar-valorTotal">
                </div>
              </div>
            </div>
            
            <div class="mb-3">
              <label for="message-text" class="col-form-label">Observação:</label>
              <textarea class="form-control" id="alterar-observacao"></textarea>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="button" onclick="editarReceita()" class="btn btn-primary">Editar</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="modalCadastrar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cadastrar Receita</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group mb-3">
                <label for="receitas" class="form-label">
                  Receitas:
                </label>
                <input required="required" type="text" class="form-control" id="inserir-receitas" placeholder="Bezerros..." />
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group mb-3">
                <label for="quantidade" class="form-label">
                  Quantidade:
                </label>
                <input required="required" type="number" class="form-control" id="inserir-quantidade" placeholder="2" />
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group mb-3">
                <label for="data" class="form-label">
                  Data:
                </label>
                <input required="required" type="date" class="form-control" id="inserir-data" />
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-3">
              <div class="form-group mb-3">
                <label for="peso" class="form-label">
                  Peso (arrobas):
                </label>
                <input required="required" type="number" class="form-control" id="inserir-peso" placeholder="23" />
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group mb-3">
                <label for="valorUnitario" class="form-label">
                  Valor Unitário (R$):
                </label>
                <input required="required" type="text" class="form-control" id="inserir-valorUnitario" placeholder="60.00" />
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group mb-3">
                <label for="valor" class="form-label">
                  Valor (R$):
                </label>
                <input required="required" type="text" class="form-control" id="inserir-valorTotal" placeholder="120.00" />
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="observacao">Observação:</label>
                <textarea required="required" class="form-control" id="inserir-observacao" rows="2"></textarea>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button onclick="cadastrarReceita()" class="btn btn-primary botao-salvar">Salvar</button>
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

  <script type="text/javascript" src="../../js/controllers/receitas.js"></script>
  <script type="text/javascript" src="../../js/geral.js"></script>
  <script type="text/javascript" src="../../js/index.js"></script>
  <script type="text/javascript" src="../../js/navbar.js"></script>
  <script type="text/javascript" src="../../js/rotas.js"></script>

</body>

</html>