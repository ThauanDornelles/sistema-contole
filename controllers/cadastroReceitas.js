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
    await addDoc(collection(db, 'receitas'), objeto)
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
  let receitas = document.getElementById('receitas').value,
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
    let dadosInsert = {
      receitas: receitas,
      quantidade: quantidade,
      peso: peso,
      valorUnitario: valorUnitario,
      valor: valor,
      data: Date.parse(data),
      observacao: observacao,
    }

    inserirColecao(dadosInsert)

    await consultarDados()
  } else {
    mostraMensagem('Preencha todos os campos antes de salvar', 'ERROR')
  }
}

async function consultarDados() {
  const receitas = query(collection(db, 'receitas'), limit(6))
  const querySnapshot = await getDocs(receitas)

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
          ${item.receitas}
        </h4>
        <ul class="list-group">
          <li class="list-group-item">Data: ${dataFormatada}</li>
          <li class="list-group-item">Quantidade: ${item.quantidade}</li>
          <li class="list-group-item">Peso (arrobas): ${item.peso}</li>
          <li class="list-group-item">Valor Unitário: R$ ${
            item.valorUnitario
          }</li>
          <li class="list-group-item">Valor: R$ ${item.valor}</li>
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
