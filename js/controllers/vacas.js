window.onload = () => {
    consultarGeral()
  }
  
  async function excluir() {
    let id = document.getElementById('inputExcluir').value
  
    let dados = {
      function: 'excluir',
      id: id,
    }
  
    await $.ajax({
      url: 'http://localhost/sistema-contole/controllers/vacasController.php',
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
  
    consultarGeral()
  }
  
  async function editar() {
    let id = document.getElementById('inputEditar').value,
      numeroBrinco = document.getElementById('alterar-numero-brinco').value,
      numeroPai = document.getElementById('alterar-numero-pai').value,
      numeroMae = document.getElementById('alterar-numero-mae').value,
      peso = document.getElementById('alterar-peso').value,
      data = document.getElementById('alterar-data').value,
      conferirValores = [
        'alterar-numero-brinco',
        'alterar-numero-pai',
        'alterar-numero-mae',
        'alterar-peso',
        'alterar-data',
      ],
      isEmpty = conferirCamposNulos(conferirValores)
  
    if (!isEmpty) {
      let dados = {
        function: 'editar',
        id: id,
        numeroBrinco: numeroBrinco,
        numeroPai: numeroPai,
        numeroMae: numeroMae,
        peso: peso,
        data: data
      }
  
      await $.ajax({
        url:
          'http://localhost/sistema-contole/controllers/vacasController.php',
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
  
      consultarGeral()
    } else {
      mostraMensagem('Preencha todos os campos', 'ERROR')
    }
  }
  
  async function cadastrar() {
    let numeroBrinco = document.getElementById('inserir-numero-brinco').value,
        numeroPai = document.getElementById('inserir-numero-pai').value,
        numeroMae = document.getElementById('inserir-numero-mae').value,
        peso = document.getElementById('inserir-peso').value,
        data = document.getElementById('inserir-data').value,
        conferirValores = [
        'inserir-numero-brinco',
        'inserir-numero-pai',
        'inserir-numero-mae',
        'inserir-peso',
        'inserir-data',
        ],
        isEmpty = conferirCamposNulos(conferirValores)
  
    if (!isEmpty) {
        let dados = {
            function: 'inserir',
            numeroBrinco: numeroBrinco,
            numeroPai: numeroPai,
            numeroMae: numeroMae,
            peso: peso,
            data: data
          }
  
      await $.ajax({
        url:
          'http://localhost/sistema-contole/controllers/vacasController.php',
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
  
      consultarGeral()
    } else {
      mostraMensagem('Preencha todos os campos antes de salvar', 'ERROR')
    }
  }
  
  async function consultarGeral(filtro = null) {
    let dados = { function: 'consultarGeral', filtro: '' }
  
    dados.filtro = filtro ? JSON.stringify(filtro) : ''
  
    $.ajax({
      url: 'http://localhost/sistema-contole/controllers/vacasController.php',
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
  
  function consultar(id) {
    let dados = { function: 'consultar', id: id }
  
    return $.ajax({
      url: 'http://localhost/sistema-contole/controllers/vacasController.php',
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
          ${item.numeroBrinco}
        </h4>
        <ul class="list-group">
          <li class="list-group-item data">Data de Nascimento: ${formataData(item.data)}</li>
          <li class="list-group-item peso">Peso: ${
            item.peso
          }</li>
          <li class="list-group-item fase-origem">Número do Pai: ${item.numeroPai}</li>
          <li class="list-group-item fase-origem">Número da Mãe: ${item.numeroMae}</li>
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
    let dados = await consultar(id)
    dados = dados[0]
  
    populaInputEditar(id)
  
    document.getElementById('alterar-numero-brinco').value = dados.numeroBrinco
    document.getElementById('alterar-numero-pai').value = dados.numeroPai
    document.getElementById('alterar-numero-mae').value = dados.numeroMae
    document.getElementById('alterar-peso').value = dados.peso
    document.getElementById('alterar-data').value = dados.data
  }
  
  function pesquisar() {
    let numeroBrinco = document.getElementById('numeroBrinco').value,
        numeroPai = document.getElementById('numeroPai').value,
        numeroMae = document.getElementById('numeroMae').value,
        pesoInicial = document.getElementById('pesoInicial').value,
        pesoFinal = document.getElementById('pesoFinal').value,
        dataInicial = document.getElementById('dataInicial').value,
        dataFinal = document.getElementById('dataFinal').value
  
    let filtro = {
        numeroBrinco: numeroBrinco,
        numeroPai: numeroPai,
        numeroMae: numeroMae,
        pesoInicial: pesoInicial,
        pesoFinal: pesoFinal,
        dataInicial: dataInicial,
        dataFinal: dataFinal,
    }
  
    consultarGeral(filtro)
  
    mostraMensagem('Pesquisa concluída', 'SUCCESS')
  }
  
  
  