<?php
  include('../../config.php');

  if (Painel::isLogin() === false) {
    die('Você não está logado!');
  }
  header('Content-Type: application/json');

  if (isset($_POST['type']) && $_POST['type'] === 'exibir') {
    $data = $_POST['data'];
    $tarefasParaDia = MySql::connect()->prepare("SELECT * FROM `agenda` WHERE data = ? ORDER BY id DESC");
    $tarefasParaDia->execute(array($data));
    if ($tarefasParaDia->rowCount() >= 1) {
      $tarefasParaDia = $tarefasParaDia->fetchAll();
      echo json_encode($tarefasParaDia);
    } else {
      echo json_encode('Ocorreu um problema ao exibir as tarefas do dia');
    }
  }

  if (isset($_POST['type']) && $_POST['type'] === 'inserir') {
    $data = $_POST['data'];
    $tarefa = $_POST['tarefa'];
    $inserirTarefa = MySql::connect()->prepare("INSERT INTO `agenda` VALUES (null, ?, ?)");
    $inserirTarefa->execute(array($tarefa, $data));

    $tarefasParaDia = MySql::connect()->prepare("SELECT * FROM `agenda` WHERE data = ? ORDER BY id DESC");
    $tarefasParaDia->execute(array($data));
    if ($tarefasParaDia->rowCount() >= 1) {
      $tarefasParaDia = $tarefasParaDia->fetchAll();
      echo json_encode($tarefasParaDia);
    } else {
      echo json_encode('Ocorreu um problema ao exibir as tarefas do dia');
    }
  }

?>