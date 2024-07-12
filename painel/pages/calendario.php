<?php
  //$mes = isset($_GET['mes']) ? (int)$_GET['mes'] : date('m', time());
  //$ano = isset($_GET['ano']) ? (int)$_GET['ano'] : date('Y', time());

  $mes = date('m', time());
  $ano = date('Y', time());

  if ($mes > 12) {
    $mes = 12;
  } else if ($mes < 1) {
    $mes = 1;
  }

  $numeroDias = cal_days_in_month(CAL_GREGORIAN, $mes, $ano);
  $diaInicialDoMes = date('N', strtotime("$ano-$mes-01"));

  $diaDeHoje = date('d', time());
  $diaDeHoje = "$ano-$mes-$diaDeHoje";
  
  $meses = array(
    'Janeiro',
    'Fevereiro',
    'Março',
    'Abril',
    'Maio',
    'Junho',
    'Julho',
    'Agosto',
    'Setembro',
    'Outubro',
    'Novembro',
    'Dezembro',
  );

  $nomeMes = $meses[(int)$mes - 1];
?>
<section class="calendario">
  <h1 class="title">Calendário e Agenda | <b><?php echo $nomeMes; ?> / <?php echo $ano ?></b></h1>
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
        $n = 1;
        $z = 0;
        $numeroDias+=$diaInicialDoMes;
        while($n <= $numeroDias) {
          if ($diaInicialDoMes === 7 && $z !== $diaInicialDoMes) {
            $z = 7;
            $n = 8;
          }
          if ($n % 7 === 1) {
            echo '<tr>';
          }
          if ($z >= $diaInicialDoMes) {
            $dia = $n - $diaInicialDoMes;
            if ($dia < 10) {
              $dia = str_pad($dia, strlen($dia)+1, '0', STR_PAD_LEFT);
            }
            $atual = "$ano-$mes-$dia";
            if ($atual !== $diaDeHoje) {
              echo '<td>'.$dia.'</td>';
            } else {
              echo '<td class="day-selected">'.$dia.'</td>';

            }
          } else {
            echo '<td></td>';
            $z++;
          }
          if ($n % 7 === 0) {
            echo '</tr>';
          }
          $n++;
        }
      ?>
    </tr>
  </table>

  <form action="" method="post">
    <h2 class="title">Adicionar tarefa para <?php echo date('d/m/Y', time()); ?></h2>
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