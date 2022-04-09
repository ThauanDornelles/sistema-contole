window.onload = () => {
    consultarDespesaGeral()
  }
  
  async function excluirDespesa() {
    let id = document.getElementById('inputExcluir').value
  
    let dados = {
      function: 'excluir',
      id: id,
    }
  
    await $.ajax({
      url: 'http://localhost/sistema-contole/controllers/despesasController.php',
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
  
    consultarDespesaGeral()
  }

//   $despesas->setDespesa($_POST['despesa']);
//     $despesas->setQuantidade($_POST['quantidade']);
//     $despesas->setData($_POST['data']);
//     $despesas->setTipo($_POST['tipo']);
//     $despesas->setFase($_POST['fase']);
//     $despesas->setValorUnitario($_POST['valorUnitario']);
//     $despesas->setValorTotal($_POST['valorTotal']);
//     $despesas->setObservacao(
  
  async function editarDespesa() {
    let id = document.getElementById('inputEditar').value,
      despesa = document.getElementById('alterar-despesa').value,
      quantidade = document.getElementById('alterar-quantidade').value,
      tipo = document.getElementById('alterar-tipo').value,
      fase = document.getElementById('alterar-fase').value,
      data = document.getElementById('alterar-data').value,
      valorUnitario = document.getElementById('alterar-valor-unitario').value,
      valorTotal = document.getElementById('alterar-valor-total').value,
      observacao = document.getElementById('alterar-observacao').value,

      conferirValores = [
        'alterar-despesa',
        'alterar-quantidade',
        'alterar-tipo',
        'alterar-fase',
        'alterar-data',
        'alterar-valor-unitario',
        'alterar-valor-total'
      ],
      isEmpty = conferirCamposNulos(conferirValores)
  
    if (!isEmpty) {
      let dados = {
        function: 'editar',
        id: id,
        despesa: despesa,
        quantidade: quantidade,
        tipo: tipo,
        fase: fase,
        data: data,
        valorUnitario: valorUnitario,
        valorTotal: valorTotal,
        observacao: observacao
      }
  
      await $.ajax({
        url:
          'http://localhost/sistema-contole/controllers/despesasController.php',
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
  
      consultarDespesaGeral()
    } else {
      mostraMensagem('Preencha todos os campos', 'ERROR')
    }
  }
  
  async function cadastrarDespesa() {
    let despesa = document.getElementById('inserir-despesa').value,
      quantidade = document.getElementById('inserir-quantidade').value,
      tipo = document.getElementById('inserir-tipo').value,
      fase = document.getElementById('inserir-fase').value,
      data = document.getElementById('inserir-data').value,
      valorUnitario = document.getElementById('inserir-valor-unitario').value,
      valorTotal = document.getElementById('inserir-valor-total').value,
      observacao = document.getElementById('inserir-observacao').value,

      conferirValores = [
        'inserir-despesa',
        'inserir-quantidade',
        'inserir-tipo',
        'inserir-fase',
        'inserir-data',
        'inserir-valor-unitario',
        'inserir-valor-total'
      ],
      isEmpty = conferirCamposNulos(conferirValores)
  
    if (!isEmpty) {
      let dados = {
        function: 'inserir',
        despesa: despesa,
        quantidade: quantidade,
        tipo: tipo,
        fase: fase,
        data: data,
        valorUnitario: valorUnitario,
        valorTotal: valorTotal,
        observacao: observacao
      }
  
      await $.ajax({
        url:
          'http://localhost/sistema-contole/controllers/despesasController.php',
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
  
      consultarDespesaGeral()
    } else {
      mostraMensagem('Preencha todos os campos antes de salvar', 'ERROR')
    }
  }
  
  async function consultarDespesaGeral(filtro = null) {
    let dados = { function: 'consultarGeral', filtro: '' }
  
    dados.filtro = filtro ? JSON.stringify(filtro) : ''
  
    $.ajax({
      url: 'http://localhost/sistema-contole/controllers/despesasController.php',
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
  
  function consultarDespesa(id) {
    let dados = { function: 'consultar', id: id }
  
    return $.ajax({
      url: 'http://localhost/sistema-contole/controllers/despesasController.php',
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
          ${item.despesa}
        </h4>
        <ul class="list-group">
          <li class="list-group-item data">Data: ${formataData(item.data)}</li>
          <li class="list-group-item quantidade">Quantidade: ${item.quantidade}</li>
          <li class="list-group-item tipo">Tipo: ${
            item.tipo
          }</li>
          <li class="list-group-item fase">Fase: ${item.fase}</li>
          <li class="list-group-item valor-unitario">Valor Unitário: ${item.valorUnitario}</li>
          <li class="list-group-item valor-unitario">Valor Total: ${item.valorTotal}</li>
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
    let dados = await consultarDespesa(id)
    dados = dados[0]
  
    populaInputEditar(id)
  
    document.getElementById('alterar-despesa').value = dados.despesa
    document.getElementById('alterar-quantidade').value = dados.quantidade
    document.getElementById('alterar-tipo').value = dados.tipo
    document.getElementById('alterar-fase').value = dados.fase
    document.getElementById('alterar-data').value = dados.data
    document.getElementById('alterar-valor-unitario').value = dados.valorUnitario
    document.getElementById('alterar-valor-total').value = dados.valorTotal
    document.getElementById('alterar-observacao').value = dados.observacao
  }
  
  function pesquisar() {
    let despesa = document.getElementById('despesa').value,
        tipo = document.getElementById('tipo').value,
        fase = document.getElementById('fase').value,
        quantidadeInicial = document.getElementById('quantidadeInicial').value,
        quantidadeFinal = document.getElementById('quantidadeFinal').value,
        dataInicial = document.getElementById('dataInicial').value,
        dataFinal = document.getElementById('dataFinal').value,
        valorUnitarioInicial = document.getElementById('valorUnitarioInicial').value,
        valorUnitarioFinal = document.getElementById('valorUnitarioFinal').value,
        valorTotalInicial = document.getElementById('valorTotalInicial').value,
        valorTotalFinal = document.getElementById('valorTotalFinal').value
  
    let filtro = {
      despesa: despesa,
      fase: fase,
      tipo: tipo,
      quantidadeInicial: quantidadeInicial,
      quantidadeFinal: quantidadeFinal,
      dataInicial: dataInicial,
      dataFinal: dataFinal,
      valorUnitarioInicial: valorUnitarioInicial,
      valorUnitarioFinal: valorUnitarioFinal,
      valorTotalInicial: valorTotalInicial,
      valorTotalFinal: valorTotalFinal,
    }
  
    consultarDespesaGeral(filtro)
  
    mostraMensagem('Pesquisa concluída', 'SUCCESS')
  }
  
  
  