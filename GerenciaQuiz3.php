<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style/style.css" />
    <title>Gerenciar Conta</title>
</head>

<body>
    <?php
           $con = mysqli_connect("localhost", "root", "", "aulaphp");
           if(!$con){
               die('<h1>Erro.</h1>');           
           }
           ?>
    <header>
        <div class="navbar navbar-dark bg-dark shadow-sm">
            <div class="container d-flex justify-content-between">
                <strong class="navbar-brand d-flex align-items-center">A.U.F.F</strong>
            </div>
        </div>
    </header>
    <form action="" method='POST' name="formulario">
    <section class="text-center">
        <div class="container">
            <!-- Chama pop-up novo quiz -->
            <div style="margin-top: 30px; margin-bottom: 10px; float: left;">
                <a href="#openModal" class="btn btn-success"><b>Criar Quiz</b></a>
            </div>

            <!-- POP-UP novo quiz -->
            <div id="openModal" class="modalDialog">
                <div>
                    <a href="#close" title="Close" class="close">X</a>
                    <form action="">
                        <p><b>Novo Quiz</b></p>
                        <input type="text" placeholder="Nome do Quiz" class="noBorder" name="nome" id="nome" autofocus
                            required /><br>
                        <input type="number" placeholder="Quantidade de perguntas" class="noBorder" name="qtd" id="qtd" autofocus
                        required /><br>
                        <a href="#close" id="criar" class="btn btn-sm btn-success" onclick="function()">Criar</a>
                    </form>
                </div>
            </div>

            <!-- Cria Tabela -->
                <table id="tbl" class="table" style="margin-top: 20px;">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome do Quiz</th>
                            <th scope="col">Data de Criação</th>
                            <th scope="col">Quantidade de Perguntas</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                </table>
            </div>
    </section>
</form>
    <script>
        //Funcao adiciona uma nova linha na tabela
        $('#criar').click(function(){
            var nome = 'abc';
            var data_string = 'def';
            var qtd = 5;
            $.ajax({
            type: 'POST',
            url: '/aps/insert.php',                
            data: {nome:nome,data_string:data_string,qtd:qtd},
            success: function(data) {
                console.log('dados enviados');
            }  
            });
        });
        // funcao remove uma linha da tabela
        function removeLinha(linha) {
            var i = linha.parentNode.parentNode.rowIndex;
            document.getElementById('tbl').deleteRow(i);
        }            
    </script>
</body>

</html>