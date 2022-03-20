window.onload = () => {
  consultarReceitasGeral()
}

async function excluirReceita() {
  let id = document.getElementById('inputExcluir').value

  let dados = {
    function: 'excluir',
    id: id,
  }

  await $.ajax({
    url: 'http://localhost/sistema-contole/controllers/receitasController.php',
    type: 'POST',
    data: dados,
    cache: false,
    dataType: 'json',
    success: function (dados) {
      mostraMensagem('Item excluído', 'SUCCESS')
      fecharModal('modalExcluir')
    },
    error: function (e) {
      mostraMensagem('Não foi possível excluir o item', 'ERROR')
      console.log('erro')
      console.log(e)
    },
  })

  consultarReceitasGeral()
}

async function editarReceita() {
  let id = document.getElementById('inputEditar').value,
    receita = document.getElementById('alterar-receita').value,
    quantidade = document.getElementById('alterar-quantidade').value,
    peso = document.getElementById('alterar-peso').value,
    valorUnitario = document.getElementById('alterar-valorUnitario').value,
    valorTotal = document.getElementById('alterar-valorTotal').value,
    data = document.getElementById('alterar-data').value,
    observacao = document.getElementById('alterar-observacao').value,
    conferirValores = [
      'alterar-receita',
      'alterar-quantidade',
      'alterar-peso',
      'alterar-valorUnitario',
      'alterar-valorTotal',
      'alterar-data',
    ],
    isEmpty = conferirCamposNulos(conferirValores)

  if (!isEmpty) {
    let dados = {
      function: 'editar',
      id: id,
      receita: receita,
      quantidade: quantidade,
      peso: peso,
      valorUnitario: valorUnitario,
      valor: valorTotal,
      data: data,
      observacao: observacao,
    }

    await $.ajax({
      url:
        'http://localhost/sistema-contole/controllers/receitasController.php',
      type: 'POST',
      data: dados,
      cache: false,
      dataType: 'json',
      success: function (dados) {
        mostraMensagem('Item alterado', 'SUCCESS')
        fecharModal('modalEditar')
      },
      error: function (e) {
        mostraMensagem('Não foi possível alterar o item', 'ERROR')
        console.log('erro')
        console.log(e)
      },
    })

    consultarReceitasGeral()
  } else {
    mostraMensagem('Preencha todos os campos', 'ERROR')
  }
}

async function cadastrarReceita() {
  let receita = document.getElementById('inserir-receitas').value,
    quantidade = document.getElementById('inserir-quantidade').value,
    peso = document.getElementById('inserir-peso').value,
    valorUnitario = document.getElementById('inserir-valorUnitario').value,
    valorTotal = document.getElementById('inserir-valorTotal').value,
    data = document.getElementById('inserir-data').value,
    observacao = document.getElementById('inserir-observacao').value,
    conferirValores = [
      'inserir-receitas',
      'inserir-quantidade',
      'inserir-peso',
      'inserir-valorUnitario',
      'inserir-valorTotal',
      'inserir-data',
    ],
    isEmpty = conferirCamposNulos(conferirValores)

  if (!isEmpty) {
    let dados = {
      function: 'inserir',
      receita: receita,
      quantidade: quantidade,
      peso: peso,
      valorUnitario: valorUnitario,
      valor: valorTotal,
      data: data,
      observacao: observacao,
    }

    await $.ajax({
      url:
        'http://localhost/sistema-contole/controllers/receitasController.php',
      type: 'POST',
      data: dados,
      cache: false,
      dataType: 'json',
      success: function (dados) {
        mostraMensagem('Item cadastrado', 'SUCCESS')
        fecharModal('modalCadastrar')
      },
      error: function (e) {
        mostraMensagem('Não foi possível inserir o item', 'ERROR')
        console.log('erro')
        console.log(e)
      },
    })

    consultarReceitasGeral()
  } else {
    mostraMensagem('Preencha todos os campos antes de salvar', 'ERROR')
  }
}

async function consultarReceitasGeral(filtro = null) {
  let dados = { function: 'consultarGeral', filtro: '' }

  dados.filtro = filtro ? JSON.stringify(filtro) : ''

  $.ajax({
    url: 'http://localhost/sistema-contole/controllers/receitasController.php',
    type: 'post',
    data: dados,
    dataType: 'json',
    cache: false,
    success: function (dados) {
      construirItens(dados)
    },
    error: function (e) {
      console.log(e)
    },
  })
}

function consultarReceita(id) {
  let dados = { function: 'consultar', id: id }

  return $.ajax({
    url: 'http://localhost/sistema-contole/controllers/receitasController.php',
    type: 'post',
    data: dados,
    dataType: 'json',
    cache: false,
    success: function (data) {
      return data
    },
    error: function (e) {
      console.log(e)
    },
  })
}

async function construirItens(dados) {
  document.getElementById('itensCadastrados').innerHTML = ''

  dados.forEach((item) => {
    populaItem(item)
  })
}

async function populaItem(item) {
  $('#itensCadastrados').append(`
  <div class="col-md-4">
    <div class="card-item" id="card-${item.id}">
      <h4 class="titulo-card text-center">
        ${item.receita}
      </h4>
      <ul class="list-group">
        <li class="list-group-item data">Data: ${item.data}</li>
        <li class="list-group-item quantidade">Quantidade: ${
          item.quantidade
        }</li>
        <li class="list-group-item peso">Peso (arrobas): ${item.peso}</li>
        <li class="list-group-item valorUnitario">Valor Unitário: R$ ${
          item.valorUnitario
        }</li>
        <li class="list-group-item valorTotal">Valor: R$ ${item.valorTotal}</li>
        <li class="list-group-item observacao">Observação: ${
          item.observacao == '' ? 'Nenhuma observação' : item.observacao
        }</li>
        <li class="list-group-item">
          <div style="display: flex; justify-content: space-between;">
              <button onclick="abrirModalEditar('${
                item.id
              }')" type="button" class="btn icones-botao botao-editar" data-bs-toggle="modal" data-bs-target="#modalEditar">
                  <i class="fas fa-edit"></i> <span>Editar</span>
              </button>
              <button onclick="populaInputExcluir('${
                item.id
              }')" type="button" class="btn icones-botao botao-excluir" data-bs-toggle="modal" data-bs-target="#modalExcluir">
                  <i class="fas fa-trash"></i> <span>Excluir</span>
              </button>
          </div>
        </li>
      </ul>
    </div>
  </div>`)
}

async function abrirModalEditar(id) {
  let dados = await consultarReceita(id)
  dados = dados[0]

  populaInputEditar(id)

  document.getElementById('alterar-receita').value = dados.receita
  document.getElementById('alterar-quantidade').value = dados.quantidade
  document.getElementById('alterar-peso').value = dados.peso
  document.getElementById('alterar-valorUnitario').value = dados.valorUnitario
  document.getElementById('alterar-valorTotal').value = dados.valorTotal
  document.getElementById('alterar-data').value = dados.data
  document.getElementById('alterar-observacao').value = dados.observacao
}

function pesquisar() {
  let receita = document.getElementById('receitas').value,
    quantidadeInicial = document.getElementById('quantidadeInicial').value,
    quantidadeFinal = document.getElementById('quantidadeFinal').value,
    pesoInicial = document.getElementById('pesoInicial').value,
    pesoFinal = document.getElementById('pesoFinal').value,
    valorUnitarioInicial = document.getElementById('valorUnitarioInicial')
      .value,
    valorUnitarioFinal = document.getElementById('valorUnitarioFinal').value,
    valorInicial = document.getElementById('valorInicial').value,
    valorFinal = document.getElementById('valorFinal').value,
    dataInicial = document.getElementById('dataInicial').value,
    dataFinal = document.getElementById('dataFinal').value

  let filtro = {
    receita: receita,
    quantidadeInicial: quantidadeInicial,
    quantidadeFinal: quantidadeFinal,
    pesoInicial: pesoInicial,
    pesoFinal: pesoFinal,
    valorUnitarioInicial: valorUnitarioInicial,
    valorUnitarioFinal: valorUnitarioFinal,
    valorTotalInicial: valorInicial,
    valorTotalFinal: valorFinal,
    dataInicial: dataInicial,
    dataFinal: dataFinal,
  }

  consultarReceitasGeral(filtro)

  mostraMensagem('Pesquisa concluída', 'SUCCESS')
}


