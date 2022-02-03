function limparCampos(temTextArea) {
  $('input').val('')

  if (temTextArea) {
    $('textarea').val('')
  }
}

function mostraMensagem(mensagem, classe) {
  let bgColor = classe == 'SUCCESS' ? '#7fff7f' : '#ff7f7f'
  let color = classe == 'SUCCESS' ? '#006600' : '#990000'

  $('body').prepend(
    `<div id="notificacao" style="position: fixed; background-color: ${bgColor};
    font-size: 20px; top: 90%; left: 1vw; z-index: 9999; 
    height: 70px; color: ${color}; display: flex; align-items: center;" class="p-4">${mensagem}</h1>`,
  )

  $('#notificacao').fadeIn('slow')

  setTimeout(removeMensagem, 2000)
}

function removeMensagem() {
  $('#notificacao').fadeOut('slow')
}

function conferirCamposNulos(campos) {
  let retorno = false

  campos.forEach(function (key) {
    if (document.getElementById(key).value == '') {
      retorno = true
    }
  })

  return retorno
}

function formataData(data) {
  return data < 10 ? '0' + data : data
}
