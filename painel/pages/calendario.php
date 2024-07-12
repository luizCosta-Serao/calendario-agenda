<section class="calendario">
  <h1 class="title">Calendário e Agenda</h1>
  <table class="calendario-table">
    <tr class="colunas-table">
      <td>Domingo</td>
      <td>Segunda</td>
      <td>Terça</td>
      <td>Quarta</td>
      <td>Quinta</td>
      <td>Sexta</td>
      <td>Sábado</td>
    </tr>
    <tr>
      <?php
        for ($i=1; $i <= 6; $i++) { 
      ?>
        <td><?php echo $i; ?></td>
      <?php } ?>
      <td class="day-selected">7</td>
    </tr>
  </table>

  <form action="" method="post">
    <h2 class="title">Adicionar tarefa para 19/09/2024</h2>
    <input type="text" name="tarefa">
    <input type="hidden" name="data" value="2024-09-01">
    <input type="submit" name="acao" value="Cadastrar">
  </form>

  <div class="box-tarefas">
    <h2 class="title">Tarefas de 19/09/2024</h2>
    <?php
      for ($i=0; $i < 6; $i++) { 
    ?>
      <div class="box-tarefa-single">
        <h3>Ir ao médico</h3>
      </div>
    <?php } ?>
  </div>
</section>