window.onload = () => {
    consultarMovimentacaoGeral()
  }
  
  async function excluirMovimentacao() {
    let id = document.getElementById('inputExcluir').value
  
    let dados = {
      function: 'excluir',
      id: id,
    }
  
    await $.ajax({
      url: 'http://localhost/sistema-contole/controllers/movimentacaoController.php',
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
  
    consultarMovimentacaoGeral()
  }
  
  async function editarMovimentacao() {
    let id = document.getElementById('inputEditar').value,
      numero = document.getElementById('alterar-numero').value,
      peso = document.getElementById('alterar-peso').value,
      data = document.getElementById('alterar-data').value,
      faseOrigem = document.getElementById('alterar-fase-origem').value,
      faseDestino = document.getElementById('alterar-fase-destino').value,
      conferirValores = [
        'alterar-numero',
        'alterar-peso',
        'alterar-data',
        'alterar-fase-destino',
        'alterar-fase-origem',
      ],
      isEmpty = conferirCamposNulos(conferirValores)
  
    if (!isEmpty) {
      let dados = {
        function: 'editar',
        id: id,
        numero: numero,
        peso: peso,
        data: data,
        faseOrigem: faseOrigem,
        faseDestino: faseDestino
      }
  
      await $.ajax({
        url:
          'http://localhost/sistema-contole/controllers/movimentacaoController.php',
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
  
      consultarMovimentacaoGeral()
    } else {
      mostraMensagem('Preencha todos os campos', 'ERROR')
    }
  }
  
  async function cadastrarMovimentacao() {
    let numero = document.getElementById('inserir-numero').value,
      peso = document.getElementById('inserir-peso').value,
      data = document.getElementById('inserir-data').value,
      faseOrigem = document.getElementById('inserir-fase-origem').value,
      faseDestino = document.getElementById('inserir-fase-destino').value,
      conferirValores = [
        'inserir-numero',
        'inserir-peso',
        'inserir-data',
        'inserir-fase-destino',
        'inserir-fase-origem',
      ],
      isEmpty = conferirCamposNulos(conferirValores)
  
    if (!isEmpty) {
      let dados = {
        function: 'inserir',
        numero: numero,
        peso: peso,
        data: data,
        faseOrigem: faseOrigem,
        faseDestino: faseDestino
      }
  
      await $.ajax({
        url:
          'http://localhost/sistema-contole/controllers/movimentacaoController.php',
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
  
      consultarMovimentacaoGeral()
    } else {
      mostraMensagem('Preencha todos os campos antes de salvar', 'ERROR')
    }
  }
  
  async function consultarMovimentacaoGeral(filtro = null) {
    let dados = { function: 'consultarGeral', filtro: '' }
  
    dados.filtro = filtro ? JSON.stringify(filtro) : ''
  
    $.ajax({
      url: 'http://localhost/sistema-contole/controllers/movimentacaoController.php',
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
  
  function consultarMovimentacao(id) {
    let dados = { function: 'consultar', id: id }
  
    return $.ajax({
      url: 'http://localhost/sistema-contole/controllers/movimentacaoController.php',
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
          ${item.numero}
        </h4>
        <ul class="list-group">
          <li class="list-group-item data">Data: ${formataData(item.data)}</li>
          <li class="list-group-item peso">Peso: ${
            item.peso
          }</li>
          <li class="list-group-item fase-origem">Fase Origem: ${item.origem}</li>
          <li class="list-group-item fase-destino">Fase Destino: ${
            item.destino
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
    let dados = await consultarMovimentacao(id)
    dados = dados[0]
  
    populaInputEditar(id)
  
    document.getElementById('alterar-numero').value = dados.numero
    document.getElementById('alterar-peso').value = dados.peso
    document.getElementById('alterar-data').value = dados.data
    document.getElementById('alterar-fase-origem').value = dados.origem
    document.getElementById('alterar-fase-destino').value = dados.destino
  }
  
  function pesquisar() {
    let numeroInicial = document.getElementById('numeroInicial').value,
      numeroFinal = document.getElementById('numeroFinal').value,
      pesoInicial = document.getElementById('pesoInicial').value,
      pesoFinal = document.getElementById('pesoFinal').value,
      dataInicial = document.getElementById('dataInicial').value,
      dataFinal = document.getElementById('dataFinal').value,
      origem = document.getElementById('faseOrigem').value,
      destino = document.getElementById('faseDestino').value
  
    let filtro = {
      numeroInicial: numeroInicial,
      numeroFinal: numeroFinal,
      pesoInicial: pesoInicial,
      pesoFinal: pesoFinal,
      dataInicial: dataInicial,
      dataFinal: dataFinal,
      faseOrigem: origem,
      faseDestino: destino
    }
  
    consultarMovimentacaoGeral(filtro)
  
    mostraMensagem('Pesquisa concluída', 'SUCCESS')
  }
  
  
  