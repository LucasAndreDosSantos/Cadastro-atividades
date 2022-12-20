<?php
    //Inicia ou retoma
    if(!isset($_SESSION))
        session_start();
    
    //verificar se existe a tarefa
    if(isset($_SESSION['tarefas'])){

        //recebe o id da tarefa que será excluída
        if(isset($_GET['id'])){
            $id = $_GET['id'];

            //Procura o item com id da tarefa a ser eliminada no array
            foreach($_SESSION['tarefas'] as $i => $item){
                if($item['id'] == $id){
                    unset($_SESSION['tarefas'][$i]); //Elimina o item com o id correspondente 
                }    
            }
        }#fim if(isset($_GET['id']))
    }

    //Redireciona para página "tarefas.php"
    header("Location:tarefas.php");
?>