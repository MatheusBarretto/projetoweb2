<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Buscas</title>
</head>
<body>
    
</body>
</html>
    <?php
        require_once "conexao/conexao.php";

        try{   
            // CONFIGURAÇÃO DA BUSCA
            $termoBusca = isset($_POST['pesquisa']) ? $_POST['pesquisa'] : '';
            $condicaoBuscar = '';
            echo $termoBusca;

            if(!empty($termoBusca)){
                $condicaoBuscaSalas = " WHERE descricao LIKE :termo ";
                $condicaoBuscaMoveis = " WHERE descricao LIKE :termo ";
            }
            // CONSULTA PARA CONTAR O TOTAL DE REGISTROS --> SALAS
            $sqlCountSalas = " SELECT COUNT(*) as total FROM tbsalas" . $condicaoBuscaSalas;
            $stmtCountSalas = $conn->prepare($sqlCountSalas);   
            
            
            
            if(!empty($termoBusca)){
                $termoParam = '%' . $termoBusca . '%';
                $stmtCountSalas->bindParam(':termo', $termoParam, PDO::PARAM_STR);
            }
            
            $stmtCountSalas->execute();
            $totalRegistros = $stmtCountSalas->fetch(PDO::FETCH_ASSOC)['total'];
            echo "<h1> SALAS ENCONTRADAS: " . $totalRegistros . "</h1>";

            $sqlSalas = "SELECT * FROM tbsalas " . $condicaoBuscaSalas;
            $selectSalas = $conn->prepare($sqlSalas);

            if(!empty($termoBusca)){
                $termoParam = '%' . $termoBusca . '%';
                $selectSalas->bindParam(':termo', $termoParam, PDO::PARAM_STR);
            }
            
            $selectSalas->execute();
            
            $salasEncontradas = $selectSalas->FetchALL(PDO::FETCH_ASSOC);
            echo "<h1> LISTAGEM: </h1>";
            echo var_dump($salasEncontradas); 

////////////////////////////////////////////////////---DIVISÃO---////////////////////////////////////////////////////////////////

            $termoBusca = isset($_POST['pesquisa']) ? $_POST['pesquisa'] : '';
            $condicaoBuscar = '';
            echo $termoBusca;

            if(!empty($termoBusca)){
                $condicaoBuscaSalas = " WHERE descricao LIKE :termo ";
                $condicaoBuscaMoveis = " WHERE descricao LIKE :termo ";
            }
            // CONSULTA PARA CONTAR O TOTAL DE REGISTROS --> SALAS
            $sqlCountMoveis = " SELECT COUNT(*) as total FROM tbmoveis" . $condicaoBuscaMoveis;
            $stmtCountMoveis = $conn->prepare($sqlCountMoveis);   
            
            
            
            if(!empty($termoBusca)){
                $termoParam = '%' . $termoBusca . '%';
                $stmtCountMoveis->bindParam(':termo', $termoParam, PDO::PARAM_STR);
            }
            
            $stmtCountMoveis->execute();
            $totalRegistros = $stmtCountMoveis->fetch(PDO::FETCH_ASSOC)['total'];
            echo "<h1> MOVEIS ENCONTRADOS: " . $totalRegistros . "</h1>";

            $sqlMoveis = "SELECT * FROM tbmoveis " . $condicaoBuscaMoveis;
            $selectMoveis = $conn->prepare($sqlMoveis);

            if(!empty($termoBusca)){
                $termoParam = '%' . $termoBusca . '%';
                $selectMoveis->bindParam(':termo', $termoParam, PDO::PARAM_STR);
            }   
            
            $selectMoveis->execute();
            
            $moveisEncontrados = $selectMoveis->FetchALL(PDO::FETCH_ASSOC);
            echo "<h1> LISTAGEM: </h1>";
            echo var_dump($moveisEncontrados);


        }catch(PDOException $e){
            echo "<div class='alert alert-danger'>Erro: " .$e->getMessage(). "</div>";
        }

