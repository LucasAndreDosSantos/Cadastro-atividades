<?php 
    //Inicia ou retoma uma sessão
    if(!isset($_SESSION))
    session_start();

    //Verifica se o vetor de tarefas já existe na sessão
    if(isset($_SESSION['tarefas'])){
        $tarefas = $_SESSION['tarefas'];  
    
    } else {  //Caso não exista, o vetor é criado vazio
        $tarefas = array();
        $_SESSION[tarefas] = $tarefas;
    }
?>