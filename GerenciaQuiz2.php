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
                        <p><b>Novo Quiz</b></p>
                        <input type="text" placeholder="Nome do Quiz" class="noBorder" name="nome" id="nome" autofocus
                            required /><br>
                        <input type="number" placeholder="Quantidade de perguntas" class="noBorder" name="qtd" id="qtd" autofocus
                        required /><br>
                        <a href="#close" id="criar" class="btn btn-sm btn-success">Criar</a>
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
    <script>
        var contador = 0; // contador para iteração com os games
        var contador_iniciar = 0; // contador para definir um id unico para cada botao iniciar
        var table_data = "";
        // ao carregar a pagina, faz um GET via AJAX + PHP para pegar os dados de quaisquer games já criados
        $(document).ready(function(){
            $.ajax({
            url : '/aps/get.php', 
            type : 'GET',
            async: false, // deve ser síncrono pois a página precisa primeiramente verificar os dados no banco MySQL
            success : function(data){
                 table_data = jQuery.parseJSON(data); // dados retornados em JSON convertidos para um array JavaScript
            }
        });
        // vai adicionando os games pelos dados obtidos no vetor...
        for (var array = 1; array < table_data.length; array++) {
            var tabela = document.getElementById('tbl');
            var numeroLinhas = tabela.rows.length;
            var linha = tabela.insertRow(numeroLinhas);
            var celula1 = linha.insertCell(0);
            var celula2 = linha.insertCell(1);
            var celula3 = linha.insertCell(2);
            var celula4 = linha.insertCell(3);
            var celula5 = linha.insertCell(4);
            celula1.innerHTML = "<a type='button' class='btn btn-success' href='Pergunta.html' onclick='passId(this)' id='iniciar_" + contador_iniciar +"'><b>Iniciar</b></a>";
            celula2.innerHTML = "<td>" + table_data[array] + "</td>";
            celula3.innerHTML = "<td>" + table_data[array+1] + "</td>";
            celula4.innerHTML = "<td>"+ table_data[array+2] + "</td>";
            celula5.innerHTML = "<td>" + "<a href='EdicaoPergunta.html' class='btn btn-sm btn-outline-secondary'>Cadastrar Perguntas</a> " +  "<button type='button' id='deletar_" + contador + "' onclick='removerLinha(this)' class='btn btn-sm btn-outline-secondary'>Excluir</button>" + "</td>";
            array = array + 3;
            contador = contador+1;
            contador_iniciar = contador+1;
        }
        
})

        //Funcao adiciona uma nova linha na tabela
        $('#criar').click(function(){ // função para criar um game... os games estão em uma tabela
            var tabela = document.getElementById('tbl');
            var numeroLinhas = tabela.rows.length;
            var linha = tabela.insertRow(numeroLinhas);
            var data = new Date();
            var data_string = data.getDate() + '/' + (data.getMonth() + 1) + '/' + data.getFullYear();
            var nome = document.getElementById('nome').value;
            var qtd = document.getElementById('qtd').value;
            var celula1 = linha.insertCell(0);
            var celula2 = linha.insertCell(1);
            var celula3 = linha.insertCell(2);
            var celula4 = linha.insertCell(3);
            var celula5 = linha.insertCell(4);
            celula1.innerHTML = "<a type='button' class='btn btn-success' href='Pergunta.html' onclick='passId(this)' id='iniciar_" + contador_iniciar +"'><b>Iniciar</b></a>";
            celula2.innerHTML = "<td>" + nome + "</td>";
            celula3.innerHTML = "<td>" + data.getDate() + '/' + (data.getMonth() + 1) + '/' + data.getFullYear(); + "</td>";
            celula4.innerHTML = "<td>"+ document.getElementById('qtd').value+"</td>";
            celula5.innerHTML = "<td>" +
                "<a href='EdicaoPergunta.html' class='btn btn-sm btn-outline-secondary'>Cadastrar Perguntas</a> " +
                "<button type='button' id='deletar_" + contador + "' onclick='removerLinha(this)' class='btn btn-sm btn-outline-secondary'>Excluir</button>" +
                "</td>"
            contador = contador + 1; // contador para o id do botão deletar
            contador_iniciar = contador_iniciar+1; // contador para o id do botão iniciar
            $.ajax({ // função AJAX que envia os dados do game para PHP e em seguida é inserido no banco MySQL
            type: 'POST',
            url: '/aps/insert.php',                
            data: {nome:nome,data_string:data_string,qtd:qtd},
            success: function(data) {
                console.log('dados enviados.');
            }  
            })
        })
        // funcao remove uma linha da tabela
        function removerLinha(linha){
            var id = linha.parentNode.parentNode.rowIndex;
            console.log(id);
            document.getElementById('tbl').deleteRow(id);
            contador_iniciar = contador_iniciar-1;
            $.ajax({ // também deleta o game do banco de dados passando o ID via POST.
            type: 'POST',
            url: '/aps/delete.php',                
            data: {id:id},
            success: function(data) {
                console.log('dados deletados.');
            }  
            })
        }
        // função para criar o cookie que contém o ID do game quando o usuário clica em 'iniciar'
        // essa função serve justamente para na página de perguntas, conseguirmos capturar as perguntas referentes ao respectivo game     
        function passId(linha){ 
            var id = linha.parentNode.parentNode.rowIndex;
            eraseCookie('btn_id'); // se já existir algum cookie com esse nome, apaga
            createCookie('btn_id', id, 1); // cria o cookie
        }
        // função que cria cookie
        function createCookie(name,value,days) {
            if (days) {
                var date = new Date();
                date.setTime(date.getTime()+(days*24*60*60*1000));
                var expires = "; expires="+date.toGMTString();
            }
            else var expires = "";
            document.cookie = name+"="+value+expires+"; path=/";
        }
        // funcao que lê cookie
        function readCookie(name) {
            var nameEQ = name + "=";
            var ca = document.cookie.split(';');
            for(var i=0;i < ca.length;i++) {
                var c = ca[i];
                while (c.charAt(0)==' ') c = c.substring(1,c.length);
                if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
            }
            return null;
        }
        // funcao que apaga cookie
        function eraseCookie(name) {
            createCookie(name,"",-1);
        }     
    </script>
</body>
</html>