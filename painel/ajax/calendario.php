<?php
  include('../../config.php');

  if (Painel::isLogin() === false) {
    die('Você não está logado!');
  }
  header('Content-Type: application/json');

  if (isset($_POST['type']) && $_POST['type'] === 'exibir') {
    $data = $_POST['data'];
    $tarefasParaDia = MySql::connect()->prepare("SELECT * FROM `agenda` WHERE data = ?");
    $tarefasParaDia->execute(array($data));
    if ($tarefasParaDia->rowCount() >= 1) {
      $tarefasParaDia = $tarefasParaDia->fetchAll();
      echo json_encode($tarefasParaDia);
    } else {
      echo json_encode('Ocorreu um problema ao exibir as tarefas do dia');
    }
  }


?>