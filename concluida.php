<?php

    // Inicia ou retoma uma sessão
    if(!isset($_SESSION)){
        session_start();
    }

    // Verificar se a tarefa exites
    if(isset($_SESSION['tarefas'])){
        //recebe o id da tarefa que será marcada como concluida
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            foreach($_SESSION['tarefas'] as $i => $item){
                if($item['id'] == $id){
                    $_SESSION['tarefas'][$i]['estado'] = true; //Coloca o estado como true para marcar a tarefa como concluida
                }    
            } 
        } #fim (isset($_GET['id']))
    } #fim (isset($_SESSION['tarefas']))

    //Redireciona para página "tarefas.php"
    header("Location:tarefas.php");
?>