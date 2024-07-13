$(function() {
  $('td').click(function() {
    $('td').removeClass('day-selected');
    $(this).addClass('day-selected');
    let novoDia = $(this).attr('dia').split('-');
    novoDia = novoDia[2]+'/'+novoDia[1]+'/'+novoDia[0];
    trocarDatas($(this).attr('dia'), novoDia)

    aplicarEventos($(this).attr('dia'), 'exibir');
  })

  $('#inserirTarefa').submit(function(e) {
    e.preventDefault();
    aplicarEventos($('.day-selected').attr('dia'), 'inserir');
  })

  function trocarDatas(notFormatado, formatado) {
    $('input[type="hidden"]').attr('value', notFormatado);
    $('form h2.title').html('Adicionar Tarefa(s) para: '+formatado);
    $('.box-tarefas h2.title').html('Tarefas para: '+formatado);
  }

  function aplicarEventos(data, type) {
    let tarefa = ''
    if (type === 'inserir') {
      tarefa = $('#inserirTarefa input[name="tarefa"]').val();
    }
    $('.box-tarefa-single').remove();
    $.ajax({
      url: 'http://localhost/sistema-calendario-e-agenda/painel/ajax/calendario.php',
      method: 'post',
      data: {
        tarefa,
        data,
        type,
      },
      dataType: 'json'
    }).done(function(data) {
        tarefa = $('#inserirTarefa input[name="tarefa"]').val('');
        data.forEach(element => {
          $('.box-tarefas h2.title').after(`
            <div class="box-tarefa-single">
              <h3>${element.tarefa}</h3>
            </div>
          `)
        });
    })
  }
})