import { app } from '../js/firebase.js'

import {
  collection,
  getFirestore,
  getDocs,
  query,
  doc,
  deleteDoc,
  where,
} from 'https://www.gstatic.com/firebasejs/9.6.5/firebase-firestore.js'

const db = getFirestore(app)

// export async function consultar() {
//   let dadoReceitas = confereValorNumero(
//       document.getElementById('receitas').value,
//     ),
//     quantidadeInicial = confereValorNumero(
//       document.getElementById('quantidadeInicial').value,
//     ),
//     quantidadeFinal = confereValorNumero(
//       document.getElementById('quantidadeFinal').value,
//     ),
//     pesoInicial = confereValorNumero(
//       document.getElementById('pesoInicial').value,
//     ),
//     pesoFinal = confereValorNumero(document.getElementById('pesoFinal').value),
//     valorUnitarioInicial = confereValorNumero(
//       document.getElementById('valorUnitarioInicial').value,
//     ),
//     valorUnitarioFinal = confereValorNumero(
//       document.getElementById('valorUnitarioFinal').value,
//     ),
//     valorInicial = confereValorNumero(
//       document.getElementById('valorInicial').value,
//     ),
//     valorFinal = confereValorNumero(
//       document.getElementById('valorFinal').value,
//     ),
//     dataInicial = confereValorNumero(
//       document.getElementById('dataInicial').value,
//       true,
//     ),
//     dataFinal = confereValorNumero(
//       document.getElementById('dataFinal').value,
//       true,
//     )

//   const receitas = query(
//     collection(db, 'receitas'),
//     where('receitas', confereValorFiltro(dadoReceitas), dadoReceitas),
//     where(
//       'quantidade',
//       confereValorFiltro(dadoReceitas, true),
//       quantidadeInicial,
//     ),
//     where(
//       'quantidade',
//       confereValorFiltro(dadoReceitas, true),
//       quantidadeFinal,
//     ),
//     where('valor', confereValorFiltro(dadoReceitas, true), valorInicial),
//     where('valor', confereValorFiltro(dadoReceitas, true), valorFinal),
//     where(
//       'valorUnitario',
//       confereValorFiltro(dadoReceitas, true),
//       valorUnitarioInicial,
//     ),
//     where(
//       'valorUnitario',
//       confereValorFiltro(dadoReceitas, true),
//       valorUnitarioFinal,
//     ),
//     where('peso', confereValorFiltro(dadoReceitas, true), pesoInicial),
//     where('peso', confereValorFiltro(dadoReceitas, true), pesoFinal),
//     where('data', confereValorFiltro(dadoReceitas, true), dataInicial),
//     where('data', confereValorFiltro(dadoReceitas, true, true), dataFinal),
//   )
//   const querySnapshot = await getDocs(receitas)

//   document.getElementById('itensCadastrados').innerHTML = ''

//   querySnapshot.forEach((doc) => {
//     let item = doc.data()
//     item['id'] = doc.id
//     let date = new Date(item.data)
//     let dataFormatada = `${formataData(date.getDate())}/${formataData(
//       date.getMonth() + 1,
//     )}/${formataData(date.getFullYear())}`

//     populaItem(item, dataFormatada)
//   })
// }

export async function consultar() {
  const receitas = query(collection(db, 'receitas'))
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
      <div class="card-item" id="${item.id}">
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
    </div>
  `)
}

export const editar = 'qu'

export const apagar = 'qu'

export const exportar = 'qu'

window.onload = () => {
  consultar()
}
