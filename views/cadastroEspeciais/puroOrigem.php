<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Controle de Puros Origens</title>
    <link rel="stylesheet" href="../../css/geral.css" />
    <link rel="stylesheet" href="../../css/cadastroReceitas/style.css" />
    <script src="https://kit.fontawesome.com/4bed44fa76.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../plugins/bootstrap-5.1.3-dist/css/bootstrap.min.css" />
</head>

<body>
    <div id="navbar"></div>
    <h1 class="text-center titulo-pagina">Cadastro de Puros Origens</h1>
    <div class="container tela-cadastro">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group mb-3">
                    <label for="numeroBrinco" class="form-label">
                        Número do Brinco:
                    </label>
                    <input required="required" type="text" class="form-control" id="numeroBrinco" placeholder="235638" />
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group mb-3">
                    <label for="numeroPai" class="form-label">
                        Número do Pai:
                    </label>
                    <input required="required" type="text" class="form-control" id="numeroPai" placeholder="235638" />
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group mb-3">
                    <label for="numeroMae" class="form-label">
                        Número da Mãe:
                    </label>
                    <input required="required" type="text" class="form-control" id="numeroMae" placeholder="235638" />
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2">
                <div class="form-group mb-3">
                    <label for="pesoInicial" class="form-label">
                        Peso Inicial (kg):
                    </label>
                    <input required="required" type="text" class="form-control" id="pesoInicial" placeholder="23" />
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group mb-3">
                    <label for="pesoFinal" class="form-label">
                        Peso Final (kg):
                    </label>
                    <input required="required" type="text" class="form-control" id="pesoFinal" placeholder="23" />
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group mb-3">
                    <label for="dataInicial" class="form-label">
                        Data de Nascimento Inicial:
                    </label>
                    <input required="required" type="date" class="form-control" id="dataInicial" />
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group mb-3">
                    <label for="dataFinal" class="form-label">
                        Data de Nascimento Final:
                    </label>
                    <input required="required" type="date" class="form-control" id="dataFinal" />
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
                    <h5 class="modal-title" id="exampleModalLabel">Editar Puro Origem</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="inputEditar" />
                    <form>
                        <div class="row">
                            <div class="col-md-4 col-xs-12">
                                <div class="mb-3">
                                    <label for="alterar-numero-brinco" class="col-form-label">Número do Brinco:</label>
                                    <input type="text" class="form-control" id="alterar-numero-brinco">
                                </div>
                            </div>
                            <div class="col-md-4 col-xs-12">
                                <div class="mb-3">
                                    <label for="alterar-numero-pai" class="col-form-label">Número do Pai:</label>
                                    <input type="text" class="form-control" id="alterar-numero-pai">
                                </div>
                            </div>
                            <div class="col-md-4 col-xs-12">
                                <div class="mb-3">
                                    <label for="alterar-numero-mae" class="col-form-label">Número da Mãe:</label>
                                    <input type="text" class="form-control" id="alterar-numero-mae">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3 col-xs-12">
                                <div class="mb-3">
                                    <label for="alterar-peso" class="col-form-label">Peso:</label>
                                    <input type="text" class="form-control" id="alterar-peso">
                                </div>
                            </div>
                            <div class="col-md-3 col-xs-12">
                                <div class="mb-3">
                                    <label for="alterar-data" class="col-form-label">Data de Nascimento:</label>
                                    <input type="date" class="form-control" id="alterar-data">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" onclick="editar()" class="btn btn-primary">Editar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalCadastrar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cadastrar Puro Origem</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4 col-xs-12">
                            <div class="mb-3">
                                <label for="inserir-numero-brinco" class="col-form-label">Número do Brinco:</label>
                                <input type="text" class="form-control" id="inserir-numero-brinco">
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-12">
                            <div class="mb-3">
                                <label for="inserir-numero-pai" class="col-form-label">Número do Pai:</label>
                                <input type="text" class="form-control" id="inserir-numero-pai">
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-12">
                            <div class="mb-3">
                                <label for="inserir-numero-mae" class="col-form-label">Número da Mãe:</label>
                                <input type="text" class="form-control" id="inserir-numero-mae">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3 col-xs-12">
                            <div class="mb-3">
                                <label for="inserir-peso" class="col-form-label">Peso (kg):</label>
                                <input type="text" class="form-control" id="inserir-peso">
                            </div>
                        </div>
                        <div class="col-md-3 col-xs-12">
                            <div class="mb-3">
                                <label for="inserir-data" class="col-form-label">Data de Nascimento:</label>
                                <input type="date" class="form-control" id="inserir-data">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button onclick="cadastrar()" class="btn btn-primary botao-salvar">Salvar</button>
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
                    <button type="button" onclick="excluir()" class="btn btn-danger">Excluir</button>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="../../plugins/bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script type="text/javascript" src="../../js/controllers/puroOrigem.js"></script>
    <script type="text/javascript" src="../../js/geral.js"></script>
    <script type="text/javascript" src="../../js/index.js"></script>
    <script type="text/javascript" src="../../js/components/navbar.js"></script>
    <script type="text/javascript" src="../../js/rotas.js"></script>

</body>

</html>