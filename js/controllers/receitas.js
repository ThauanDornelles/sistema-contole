window.onload = () => {
  consultarReceitas()
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

  consultarReceitas()
}

async function editarReceita() {
  let id = document.getElementById('inputEditar').value,
    receita = document.getElementById('alterar-receitas').value,
    quantidade = document.getElementById('alterar-quantidade').value,
    peso = document.getElementById('alterar-peso').value,
    valorUnitario = document.getElementById('alterar-valorUnitario').value,
    valorTotal = document.getElementById('alterar-valorTotal').value,
    data = document.getElementById('alterar-data').value,
    observacao = document.getElementById('alterar-observacao').value,
    conferirValores = [
      'alterar-receitas',
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

    consultarReceitas()
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

    consultarReceitas()
  } else {
    mostraMensagem('Preencha todos os campos antes de salvar', 'ERROR')
  }
}

async function consultarReceitas() {
  let dados = { function: 'consultar' }

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
              <button onclick="populaInputEditar('${
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
