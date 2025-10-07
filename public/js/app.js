$(document).ready(function () {
  $.ajaxSetup({
    headers : {
      'X-CSRF-Token' : document.head.querySelector('meta[name="csrf-token"]').content
    }
  });

  /*
  * Atenção ao campo 'translation'
  * N => Apenas Numeros ==> pattern: /[0-9]/
  * L => Apenas Letras ==> pattern: /[A-Za-z]/
  * T => Todos os Caracteres ==> pattern: /[A-Za-z0-9]/
  */
  $('.cpf_mask').mask('NNN.NNN.NNN-NN', {
    translation: {
      N: {pattern: /[0-9]/}
    },
    reverse: false,
  });

  /*Retirada de mascara ao enviar*/
  $('form').on('submit', function (event) {
      $('input').unmask();
      $('textarea').unmask();
  });

  /*Modificação para os botões de salvar, atualizar e deletar*/
  $('.salvar').on('click', function(){
    if(this.form.reportValidity()){
      this.setAttribute('disabled', 'disabled');
      this.innerHTML = '<span class="spinner-border spinner-border-sm" aria-hidden="true"></span> Salvando...';
      this.form.submit();
    }
  });

  $('.atualizar').on('click', function(){
    if(this.form.reportValidity()){
      this.setAttribute('disabled', 'disabled');
      this.innerHTML = '<span class="spinner-border spinner-border-sm" aria-hidden="true"></span> Atualizando...';
      this.form.submit();
    }
  });

  $('.deletar').on('click', function(){
    if(this.form.reportValidity()){
      this.setAttribute('disabled', 'disabled');
      this.innerHTML = '<span class="spinner-border spinner-border-sm" aria-hidden="true"></span> Removendo...';
      this.form.submit();
    }
  });
  /*Fim das modificações de botão de salvar, atualizar e deletar*/

  /*Configuração para exibir notificações*/
  const toast = document.getElementById('toast')
  if(toast) {
    const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toast)
    toastBootstrap.show()
  }

  /*Configuração do select2 padrão*/
  let option_select2 = {
    theme: 'bootstrap-5',
    allowClear: true,
    placeholder: 'Selecione...',
    width: '100%',
    language: "pt-BR",
  };
  $('.select2').select2(option_select2);

  /*Configuração para habilitar escrita do select2 em modais*/
  $('body').on('shown.bs.modal', '.modal', function() {
    $(this).find('select').each(function() {
      if(this.attributes.modal_id !== undefined){
        let dropdownParent = $('#'+this.attributes.modal_id.value);
        if(Object.values(this.classList).includes('select2')){
          $(this).select2({
            ...option_select2,
            dropdownParent: dropdownParent,
          });
        }
      }
    });
  });
})

/*Exibi o card de notificação para o caso de erro*/
function set_error_message(message) {
  $("#toast-body")[0].innerHTML = message
  const toast = document.getElementById('toast_error')
  if(toast){
    const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toast)
    toastBootstrap.show()
  }
}
