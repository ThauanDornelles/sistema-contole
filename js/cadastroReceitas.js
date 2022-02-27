async function cadastrar() {
  let receita = document.getElementById('receitas').value,
    quantidade = document.getElementById('quantidade').value,
    peso = document.getElementById('peso').value,
    valorUnitario = document.getElementById('valorUnitario').value,
    valor = document.getElementById('valor').value,
    data = document.getElementById('data').value,
    observacao = document.getElementById('observacao').value,
    conferirValores = [
      'receitas',
      'quantidade',
      'peso',
      'valorUnitario',
      'valor',
      'data',
    ],
    isEmpty = conferirCamposNulos(conferirValores)

  if (!isEmpty) {
    let dados = {
      function: 'inserir',
      receita: receita,
      quantidade: quantidade,
      peso: peso,
      valorUnitario: valorUnitario,
      valor: valor,
      data: data,
      observacao: observacao,
    }

    console.log(dados)

    await $.ajax({
      url:
        'http://localhost/sistema-contole/controllers/receitasController.php',
      type: 'POST',
      data: dados,
      cache: false,
      dataType: 'json',
      success: function (dados) {
        mostraMensagem('Item cadastrado', 'SUCCESS')
      },
      error: function (e) {
        console.log('erro')
        console.log(e)
      },
    })

    consultarDados()
  } else {
    mostraMensagem('Preencha todos os campos antes de salvar', 'ERROR')
  }
}

async function consultarDados() {
  let dados = { function: 'consultar' }

  $.ajax({
    url: 'http://localhost/sistema-contole/controllers/receitasController.php',
    type: 'post',
    data: dados,
    dataType: 'json',
    cache: false,
    success: function (dados) {
      construirItens(dados)
      console.log(dados)
    },
    error: function (e) {
      console.log(e)
    },
  })
}

function construirItens(dados) {
  document.getElementById('itensCadastrados').innerHTML = ''

  dados.forEach((item) => {
    populaItem(item)
  })
}

function populaItem(item) {
  $('#itensCadastrados').append(`
    <div class="col-md-4">
      <div class="card-item">
        <h4 class="titulo-card text-center">
          ${item.receita}
        </h4>
        <ul class="list-group">
          <li class="list-group-item">Data: ${item.data}</li>
          <li class="list-group-item">Quantidade: ${item.quantidade}</li>
          <li class="list-group-item">Valor Unitário: R$ ${
            item.valorUnitario
          }</li>
          <li class="list-group-item">Valor: R$ ${item.valorTotal}</li>
          <li class="list-group-item">Observação: ${
            item.observacao == '' ? 'Nenhuma observação' : item.observacao
          }</li>        
        </ul>
      </div>
    </div>
  `)
}

window.onload = () => {
  consultarDados()
}
