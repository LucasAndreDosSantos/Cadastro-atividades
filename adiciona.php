<?php
    include_once "dados.php";
    //Inicia ou retoma uma sessão
    if(!isset($_SESSION)){
        session_start();
    }

    //"Pega" a lista de tarefas da sessão caso ela exista ou cria uma nova
    $tarefas = isset($_SESSION['tarefas'])? $_SESSION['tarefas']: array();

    //verificar se  a tarefa existe
    if(isset ($_GET['nome'])){
        $id = count($tarefas); //O id da nova tarefa será o da última posição do array "tarefas"
        $nova_tarefa = array('id' => $id, 'nome' => $_GET['nome'], 'estado' => false); //Define o array da nova tarefa

        array_push($tarefas, $nova_tarefa); //Adiciona a nova tarefa ao final do vetor
        $_SESSION['tarefas'] = $tarefas; //"Salva" o estado vetor na sessão
    }

    //redireciona para página tarefas.php
    header("Location:tarefas.php");
?>