<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Questão</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        .navbar-fixed-bottom {
            position: fixed;
            bottom: 0;
            left: 0;
        }
    </style>
</head>

<body>
    <div class="jumbotron text-center" id="nQuestao">
            <h3>Pergunta: ... ... ...?</h3>
    </div>

    <div id="questao" style=" text-align: justify; padding-right: 50px; padding-left: 50px">

    </div>

    <form style="width: 600px">
        <ul>
            <li class="list-group-item"><input id="primeiro" type="radio" name="alternativa" value="1" required="">
                <label for="primeiro">String da alternativa - A</label></li>
            <li class="list-group-item"><input id="segundo" type="radio" name="alternativa" value="2" required="">
                <label for="segundo">String da alternativa - B</label></li>
        </ul>
        <div style="text-align: right;right:0px;">
            <a type="submit" class="btn btn-success" onclick="getResposta()" href="status.html">Próxima</a>
        </div>
    </form>
    <footer class="footer navbar-fixed-bottom">
            <img src="img/logo.jpg">
        </footer>
        
    <script src="js/Pergunta.js"></script>

</body>

</html>