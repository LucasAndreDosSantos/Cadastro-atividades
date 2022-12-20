<?php
        include_once "dados.php";

        //Inicia ou retoma uma sessão
        if(!isset($_SESSION)) {
            session_start();
        }
        
        //"Pega" a lista de tarefas da sessão caso ela exista
        $tarefas = isset($_SESSION['tarefas'])? $_SESSION['tarefas']:NULL;  
    
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <!-- Meta tags Obrigatórias -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

        <title>Lista de tarefas</title>
    </head>
    <body>
        <!--Título-->
        <div class="jumbotron bg-transparent">
            <div class="container">
                <h1 class="display-6 text-primary text-center">Minhas Tarefas</h1>
            </div>
        </div>
        
        <!-- Área para adicionar a tarefa -->
        <div class="container">
            <form method="GET" action="adiciona.php">
                <div class="form-group row">
                    <div class="col">
                    </div>

                    <div class="col-8">
                        <input type="text" class="form-control" placeholder="Título..." name="nome" required>
                    </div>
                    
                    <div class="col">
                        <input type="submit" class="btn btn-outline-primary" value="Adicionar">
                    </div>
                    <div class="col">
                    </div>
                </div>
            </form>
        </div>

        <!-- Mensagem de nenhuma tarefa -->
        <?php if ($tarefas == NULL) {?>
            <div class="container">
                <div class="alert alert-info text-center" role="alert">
                    <h3> Nenhuma tarefa no momento </h3>
                </div>
            </div>

        <?php 
        } else {?>

            <!-- Tabela de tarefas -->
            <div class="container col-8">
                <table class="table table-hover" width=400px>
                    <tbody>
                        <?php foreach($tarefas as $item){
                             $linkConcluir = "concluida.php?id=".$item['id'];
                             $linkExcluir = "excluir.php?id=".$item['id'];        
                        ?> 
                            <tr>
                                <!-- Verifica se a tarefa foi marcada como concluída ou não -->
                                <?php if($item['estado'] == false){ ?>
                                    <td><a type="button" href=<?php echo $linkConcluir;?> class="btn btn-outline-primary" role="button">&#10003</button></td>
                                    <td><?= $item['nome'];?></td>
                                    <td align="right"><a type="button" href=<?php echo $linkExcluir;?> class="btn btn-outline-primary" role="button">&#10008</button></td>

                                <?php }else{ ?>
                                    <td><a type="button" href=<?php echo $linkConcluir;?> class="btn btn-outline-secondary" role="button">&#10003</button></td>
                                    <td><del><?= $item['nome'];?></del></td>
                                    <td align="right"><a type="button" href=<?php echo $linkExcluir;?> class="btn btn-outline-secondary" role="button">&#10008</button></td>
                                <?php } # fim if($item['estado'] == false)...else?>
                            </tr>
                        <?php } #fim foreach?>
                    </tbody>
                </table>
            </div>
        <?php } #fim if(tabela == NULL)...else?>

        <!-- JavaScript (Opcional) -->
        <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>