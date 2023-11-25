<?php
require "../../app_lista_de_tarefas/tarefa.model.php";
require "../../app_lista_de_tarefas/tarefa.service.php";
require "../../app_lista_de_tarefas/conexao.php";

    $acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;
    if ($acao == "iserir"){
        
       
        $tarefa = new Tarefa();
        $tarefa->__set('tarefa', $_POST['tarefa']);

        $conexao = new Conexao();

        $tarefasevice = new TarefaService($conexao , $tarefa);
        $tarefasevice->inserir();

        header('location: nova_tarefa.php?inclusao=1');
    } elseif($acao == 'recuperar'){
        $tarefa = new Tarefa();
        $conexao = new Conexao();

        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefas = $tarefaService->recuperar();
    }
?>