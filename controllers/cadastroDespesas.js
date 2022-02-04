import { app } from '../js/firebase.js'

import {
  collection,
  getFirestore,
  getDocs,
  query,
  addDoc,
  limit,
} from 'https://www.gstatic.com/firebasejs/9.6.5/firebase-firestore.js'

const db = getFirestore(app)

async function inserirColecao(objeto) {
  try {
    await addDoc(collection(db, 'despesas'), objeto)
      .then(() => {
        mostraMensagem('Item inserido com sucesso', 'SUCCESS')
        limparCampos(true)
      })
      .catch((err) => {
        console.log(err)
      })
  } catch (e) {
    mostraMensagem('Erro ao inserir item', 'ERROR')
    console.error('Error ao inserir o documento: ', e)
  }
}

export async function cadastrar() {
  let despesas = document.getElementById('despesas').value,
    quantidade = document.getElementById('quantidade').value,
    tipo = document.getElementById('tipo').value,
    valorUnitario = document.getElementById('valorUnitario').value,
    valor = document.getElementById('valor').value,
    data = document.getElementById('data').value,
    fase = document.getElementById('fase').value,
    observacao = document.getElementById('observacao').value,
    conferirValores = [
      'despesas',
      'quantidade',
      'tipo',
      'valorUnitario', 
      'valor', 
      'data', 
      'fase',
    ],
    isEmpty = conferirCamposNulos(conferirValores)

  if (!isEmpty) {
    let dadosInsert = {
      despesas: despesas,
      quantidade: quantidade,
      tipo: tipo,
      valorUnitario: valorUnitario,
      valor: valor,
      data: Date.parse(data),
      fase: fase,
      observacao: observacao,
    }

    inserirColecao(dadosInsert)

    await consultarDados()
  } else {
    mostraMensagem('Preencha todos os campos antes de salvar', 'ERROR')
  }
}

async function consultarDados() {
  const despesas = query(collection(db, 'despesas'), limit(6))
  const querySnapshot = await getDocs(despesas)

  document.getElementById('itensCadastrados').innerHTML = ''

  querySnapshot.forEach((doc) => {
    let item = doc.data()
    item['id'] = doc.id
    let date = new Date(item.data)
    let dataFormatada = `${formataData(date.getDate())}/${formataData(
      date.getMonth() + 1,
    )}/${formataData(date.getFullYear())}`

    populaItem(item, dataFormatada)
  })
}

function populaItem(item, dataFormatada) {
  $('#itensCadastrados').append(`
    <div class="col-md-4">
      <div class="card-item">
        <h4 class="titulo-card text-center">
          ${item.despesas}
        </h4>
        <ul class="list-group">
          <li class="list-group-item">Data: ${dataFormatada}</li>
          <li class="list-group-item">Quantidade: ${item.quantidade}</li>
          <li class="list-group-item">Tipo: ${item.tipo}</li>
          <li class="list-group-item">Valor Unitário: R$ ${
            item.valorUnitario
          }</li>
          <li class="list-group-item">Valor: R$ ${item.valor}</li>
          <li class="list-group-item">Fase: ${item.fase}</li>
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
