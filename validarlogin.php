<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validação</title>
</head>
<body>
    <?php
    try{
        require_once ('conexao/conexao.php');
        $calculo = 10/0;
        echo $calculo;

    }catch(\Throwable $th){
        echo "<h2>" .$th->getMessage(). "</h2>";
        $mensagem_log = "\n Mensagem de log:" .$th->getMessage();
        $caminho_log = "log/arquivodemensagem.log";
        error_log($mensagem_log, 3, $caminho_log);
    }
    
    ?>
</body> 
</html>